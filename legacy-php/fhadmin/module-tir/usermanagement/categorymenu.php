<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 25 Desember 2008
  * @copyright by FaberHost.com

*************************************/
 
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

//***************************** Security ACCESS LEVEL *************************/
$akses_level_page = access_level_page($fh_usergroupid, $db);
$access_level_type = access_level_type($fh_usergroupid, $db); //** by: Bambang Riswanto at 2013

if ($fh_userid && $akses_level_page)
{	/***************************** seting orderfield **************************/
	if (!(isset($_GET["orderfield"])))  $orderfield="fh_kategorimenuid";
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!((($orderfield=="fh_kategorimenuid")) ||  (($orderfield=="fh_name")))) $orderfield="fh_kategorimenuid"; 
	}
		
	//****************************  Proses Insert ataupun Edit ***************//
	if ((isset($_POST["insert"])) || (isset($_POST["edit"])))
	{ if (isset($_POST["edit"])) $data_fh_kategorimenuid = trim($_POST["data_fh_kategorimenuid"]);
	
	  $data_fh_name = trim($_POST["data_fh_name"]);

	  if ($data_fh_name == "") { $msg.="Please input Menu Category Name<br>"; }

	  if ($msg=="")
	  { if (isset($_POST["insert"])) 
	  	{ 
		   if (!$access_level_type->add) akses_level_die();
		   $SQL1 =  "INSERT INTO 	fh_menu_kategori (fh_name)
                    VALUES			('".$data_fh_name."')";
		   $db   -> Execute($SQL1);
		   insert_log ('Add', 'Seting Category Menu CMS' , 'Add Category Menu CMS = '.$data_fh_name );

		   }  else  {  
		   if (!$access_level_type->edit) akses_level_die();
		   $SQL1 =  "UPDATE		fh_menu_kategori
                     SET		fh_name='".$data_fh_name."'
                     WHERE		fh_kategorimenuid = ".$data_fh_kategorimenuid;
		   $db   -> Execute($SQL1);

		   insert_log ('Edit', 'Seting Category Menu CMS' , 'Edit Category Menu CMS = '.$data_fh_name.', ID Menu Category CMS = '.$data_fh_kategorimenuid );
		} 
		$action="view";			  	  
	  } else $action="detail";
	}
	
	//***************************************  Proses Delete *****************//
	if (isset($_POST["del"])) 
	{  
	   
	   if (!$access_level_type->delete) akses_level_die();
	   $delete=$_POST["delete"];
	   
	   for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 		*
                 FROM			fh_menu_kategori
                 WHERE			fh_kategorimenuid = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["fh_kategorimenuid"] != '')
		 {  insert_log ('Delete', 'Seting Category Menu CMS' , 'Delete Category Menu CMS = '.$RS->fields["fh_name"].', ID = '.$RS->fields["fh_kategorimenuid"]);
            $SQL2 = "SELECT 	*
                     FROM		fh_menu
                     WHERE 		fh_kategorimenuid = '".$delete[$i]."'";
           $RS2 = $db->Execute($SQL2);
	       while (!$RS2->EOF) {
               $SQL4 = "DELETE FROM		fh_menu_akses
                        WHERE			fh_menuid = ".$RS2->fields["fh_menuid"];
               $db->Execute($SQL4);
                
               $SQL4 = "DELETE FROM		fh_menu
                        WHERE			fh_menuid = ".$RS2->fields["fh_menuid"];
               $db->Execute($SQL4);

               $RS2->MoveNext();
	  	   }
        
		   $SQL1 = "DELETE FROM		fh_menu_kategori
	     	   	    WHERE			fh_kategorimenuid = ".$delete[$i];
	       $RS1  = $db->Execute($SQL1);
	    	 
		 }   
	   }
	}
	 
	//********************************* Seting Header ************************//
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>');
	$smarty->assign('title' , 'Category Menu CMS'); 
	// $smarty->display('categorymenuheader.tpl');
	
	//****************************** MAIN CODE *******************************//
	switch ($action){
	case "view" :
	  $SQL = "SELECT 	    *
              FROM		    fh_menu_kategori
              WHERE 	    fh_name like '%".$search."%'	  	   	  
              ORDER BY		" . $orderfield . " " . $order;

	  $RS =$db->Execute($SQL);
	  if ($RS->fields["fh_kategorimenuid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;
      	
		if ($page != 0 ) {
	      if ($page > $total_jumlah_page) $page=$total_jumlah_page; 
    	  $pagination = pagination($page, $total_jumlah_page, $teks_parameter);
   	  
	      $SQL = "SELECT 	    *
                  FROM		    fh_menu_kategori
                  WHERE 		fh_name like '%".$search."%'
                  ORDER BY		" . $orderfield . " " . $order . " 	  
                  LIMIT		    " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
	      $RS = $db->Execute($SQL);
	  	
	      $i=0;
	      while (!$RS->EOF) {
		    $fh_kategorimenuid_temp[$i] = $RS->fields["fh_kategorimenuid"];
	  	    $fh_name_temp[$i] = $RS->fields["fh_name"];
	  	    $RS->MoveNext();
	  	    $i++;
	  	  }
	    } else $msg = "Sorry, There is no record in our database<br>";
	  } else $msg = "Sorry, There is no record in our database<br>";

	  $smarty->assign('view', array(
	  	        'msg' => $msg,
	  	        'page' => $page,
	  	        'order' => $order,
	  	        'orderfield' => $orderfield,
	  	        'search' => $search,
	  	        'action'	=> $action,
	  	        'pagination' => $pagination,
	  	        
	  	  		'fh_kategorimenuid_temp' => $fh_kategorimenuid_temp,
	  	  		'fh_name_temp' => $fh_name_temp));
	  $smarty->display('categorymenulist.tpl');
	break;
	
	
	case "insert" :
	case "detail" :
	  if ((isset($_GET["data_fh_kategorimenuid"])) and (ctype_digit($_GET["data_fh_kategorimenuid"]))) 
	  {   $data_fh_kategorimenuid=$_GET["data_fh_kategorimenuid"];

		  $SQL = "SELECT 	*
                  FROM		fh_menu_kategori
                  WHERE		fh_kategorimenuid = ".$data_fh_kategorimenuid;
	  	  $RS  = $db->Execute($SQL);	   	  
		  if ($RS->fields["fh_kategorimenuid"] == '') $msg = "There is no record in our database";
          else {
                $data_fh_kategorimenuid = $RS->fields["fh_kategorimenuid"];
                $data_fh_name = $RS->fields["fh_name"];
          }
	  }

	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_fh_kategorimenuid' , $data_fh_kategorimenuid);
	  $smarty->assign('data_fh_name' , $data_fh_name);
	  $smarty->display('categorymenuinsert.tpl');
	break;
	}
}
?>