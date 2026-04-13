<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 17 November 2012
  * @copyright by FaberHost.com
  * Versi : 1.0
  
*************************************/
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

//*** Security ACCESS LEVEL *************************/
$akses_level_page = access_level_page($fh_usergroupid, $db);
$access_level_type = access_level_type($fh_usergroupid, $db); //** by: Bambang Riswanto at 2013

if ($fh_userid && $akses_level_page)
{	$teks_parameter = "";

	if (!(isset($_GET["orderfield"])))  $orderfield="fh_themesid";
	else 
	{ $orderfield=$_GET["orderfield"];
	  if ((!($orderfield=="fh_themesdir")) || (!($orderfield=="fh_themesstatus"))) $orderfield="fh_themesid"; 
	}


    //*** Kalau update status dari List View
    if ($_GET["status"] == "show") {
	  if ((isset($_GET["data_themesid"])) and (ctype_digit($_GET["data_themesid"]))) 
	  {     
            if (!$access_level_type->edit) akses_level_die();
			$temp_themesid = $_GET["data_themesid"];
			$SQL1 = "UPDATE		fh_themes
                     SET		fh_themesstatus = 'Hidden'";
            $db   -> Execute($SQL1);

            $SQL1 = "UPDATE		fh_themes
                     SET		fh_themesstatus = 'Show'
                     WHERE      fh_themesid='".$temp_themesid."' ";
            $db   -> Execute($SQL1);
			insert_log ('Show', 'Themes' , 'Edit Active Themes ID = '.$temp_themesid);
        }
    }

    if ( (isset($_POST["insert"])) || (isset($_POST["edit"])) ) { 
		if ((isset($_POST["edit"]))) $data_themesid = trim($_POST["data_themesid"]);
		$data_themesdir = $_POST["data_themesdir"];
		if ($data_themesdir == "") { $msg.="Please input themes directory name<br>"; }
			
		if ($msg==""){ 
    		if (isset($_POST["insert"])){ 
				if (!$access_level_type->add) akses_level_die();
				$SQL1 =  "INSERT INTO 	fh_themes (fh_themesdir, fh_themesstatus)
                          VALUES		('" . $data_themesdir. "', 'Hidden' )";
				$db -> Execute($SQL1);
				
				insert_log ('Insert', 'Themes' , 'Insert New Themes = '.$data_themesdir );
				$final_message = "Your Themes : ".stripslashes($data_themesdir)." has been inserted<br>";

            } else {
				if (!$access_level_type->edit) akses_level_die();
  			    $SQL1 = "UPDATE		fh_themes
                         SET		fh_themesdir = '".$data_themesdir."'
                         WHERE		fh_themesid = ".$data_themesid;
				$db   -> Execute($SQL1);
				
				insert_log ('Edit', 'Themes' , 'Edit Themes = '.$data_themesdir );
				$final_message = "Your Themes : ".stripslashes($data_themesdir)." has been updated<br>";
            }
        } else { 
            $data_themesdir = ""; 
            if(isset($_POST["insert"])) $action="insert"; else  $action="detail"; 
       }
    }

    //*** Proses Delete *****************//
	if (isset($_POST["del"])) 
	{  
       if (!$access_level_type->edit) akses_level_die();
	   $delete=$_POST["delete"];
	   $tmp_flag=0;
       for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 	*
                 FROM		fh_themes
                 WHERE		fh_themesid = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if (($RS->fields["fh_themesid"] != '') && ($RS->fields["fh_themesstatus"] != 'Show'))
		 { insert_log ('Delete', 'Themes' , 'Delete Themes = '.$RS->fields["fh_themesdir"]);
		   $SQL1 = "DELETE FROM		fh_themes
                    WHERE			fh_themesid = ".$delete[$i];
           $RS1  = $db->Execute($SQL1);
		 } else {$tmp_flag=1;}
	   }
       $action = "view";
	   if ($tmp_flag == 0) $final_message = "Themes has been deleted<br>"; 
	   else $final_message = "Themes can't be deleted, please change status Show to another themes first<br>"; 
	}



	//*** Seting Header ************************//
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , 'Themes'); 
	$smarty->assign('title_search' , 'Themes Name'); 
	// $smarty->display('themes_header.tpl');
	

	//*** MAIN CODE *******************************//
	switch ($action) {
	case "view" :
    $SQL = "SELECT 		*
            FROM		fh_themes
            WHERE 		fh_themesdir like '%".$search."%'
            ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["fh_themesid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                    FROM			fh_themes
                    WHERE 	        fh_themesdir like '%".$search."%'
                    ORDER BY		" . $orderfield . " " . $order . " 	  
                    LIMIT			" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_themesid[$i] = $RS->fields["fh_themesid"];
                $list_themesdir[$i] = $RS->fields["fh_themesdir"];
                $list_themesstatus[$i] = $RS->fields["fh_themesstatus"];  
                        
                $RS->MoveNext();
                $i++;
			}
		} else $msg = "Sorry, There is no record in our database<br>";
	  } else $msg = "Sorry, There is no record in our database<br>";

	  $smarty->assign('view', array(
	  	        'msg' => $msg,
	  	        'final_message' => $final_message,
	  	        'page' => $page,
	  	        'order' => $order,
	  	        'orderfield' => $orderfield,
	  	        'search'  => $search,
	  	        'action' => $action,
	  	        'pagination' => $pagination,
				'asc_text' => 'action='.$action.'&page='.$page.'&search='.$search.'&order=asc', 
				'desc_text' => 'action='.$action.'&page='.$page.'&search='.$search.'&order=desc', 
				'normal_text' => 'action='.$action.'&page='.$page.'&search='.$search.'&order='.$orderfield, 
				'data_themesid' => $list_themesid,
				'data_themesdir' => $list_themesdir,
				'data_themesstatus' => $list_themesstatus));
	  $smarty->display('themes_list.tpl');
	break;
	
	case "detail" :
	case "insert" :
  	
	  if ((isset($_GET["data_themesid"])) and (ctype_digit($_GET["data_themesid"]))) 
	  {   $data_themesid = $_GET["data_themesid"];
            $SQL = "SELECT 		*
                    FROM		fh_themes
                    WHERE		fh_themesid = ".$data_themesid;
            $RS  = $db->Execute($SQL);	   	  
	  	  
            $data_themesid = $RS->fields["fh_themesid"];
            $data_themesdir =  $RS->fields["fh_themesdir"];
            $data_themesstatus = $RS->fields["fh_themesstatus"];
          
		    if ($RS->fields["fh_themesid"] == '') $msg = "There is no record in our database";
	  } 

      $optarray = enum("fh_themes.fh_themesstatus");
	  
	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_themesid' , $data_themesid);
	  $smarty->assign('data_themesdir' , $data_themesdir);
	  $smarty->assign('data_themesstatus' , $data_themesstatus);
	  $smarty->assign('optarray' , $optarray);
	  $smarty->display('themes_insert.tpl');
	break;
	}
}
?>