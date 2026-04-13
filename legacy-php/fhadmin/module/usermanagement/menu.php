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
	if (!(isset($_GET["orderfield"])))  $orderfield="fh_menuid";
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!((($orderfield=="fh_kategorimenuid")) ||  (($orderfield=="fh_name")) ||  (($orderfield=="fh_url")))) $orderfield="fh_menuid"; 
	}
		
	//****************************  Proses Insert ataupun Edit ***************//
	if ((isset($_POST["insert"])) || (isset($_POST["edit"])))
	{ if (isset($_POST["edit"])) $data_fh_menuid = trim($_POST["data_fh_menuid"]);
	
	  $data_fh_name = $_POST["data_fh_name"];
	  $data_fh_kategorimenuid = $_POST["data_fh_kategorimenuid"];

	  if ($data_fh_name == "") { $msg.="Please input Menu Name<br>"; }

	  if ($msg=="")
	  {    
		   if (!$access_level_type->edit) akses_level_die();
		   $SQL1 =  "UPDATE		 	fh_menu
                     SET			fh_name='".$data_fh_name."',
                                    fh_kategorimenuid = '".$data_fh_kategorimenuid."'
                     WHERE			fh_menuid = ".$data_fh_menuid;
		   $db   -> Execute($SQL1);

		   insert_log ('Edit', 'Seting Menu CMS' , 'Edit Menu CMS = '.$data_fh_name.', ID Menu CMS = '.$data_fh_menuid );
		
           $action="view";			  	  
	  } else $action="detail";
	}
	
	 
	//********************************* Seting Header ************************//
    $SQL = "SELECT      *
            FROM        fh_menu_kategori";
    $RS = $db->Execute($SQL);
    $i=0;
    while (!$RS->EOF) {
        $search_fh_kategorimenuid[$i] = $RS->fields["fh_kategorimenuid"];
        $search_fh_name[$i] = $RS->fields["fh_name"];
        $i++;
        $RS->MoveNext();
    }             
	
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , 'Management Menu CMS'); 
  	$smarty->assign('search_fh_kategorimenuid' , $search_fh_kategorimenuid); 
  	$smarty->assign('search_fh_name' , $search_fh_name); 
	// $smarty->display('menuheader.tpl');
	
	//****************************** MAIN CODE *******************************//
	switch ($action){
	case "view" :
	  switch ($orderfield) {
        case "fh_menuid" : $tmp_orderfield = "M.fh_menuid"; break;
        case "fh_name" : $tmp_orderfield = "M.fh_name"; break;
        case "fh_url" : $tmp_orderfield = "M.fh_url"; break;
        case "fh_kategorimenuid"  :   $tmp_orderfield = "C.fh_kategorimenuid"; break;
      }  

      if ($search1 == "") {
      $SQL = "SELECT 	    *
              FROM		    fh_menu M
              LEFT JOIN     fh_menu_kategori C
              ON            M.fh_kategorimenuid = C.fh_kategorimenuid
              WHERE 	    M.fh_name like '%".$search."%'
              ORDER BY	    " . $tmp_orderfield . " " . $order;
      } else {
      $SQL = "SELECT 	    *
              FROM		    fh_menu M
              LEFT JOIN     fh_menu_kategori C
              ON            M.fh_kategorimenuid = C.fh_kategorimenuid
              WHERE 	    M.fh_name like '%".$search."%'
								AND C.fh_kategorimenuid = '".$search1."'
              ORDER BY	    " . $tmp_orderfield . " " . $order;
      }

	  $RS =$db->Execute($SQL);
	  if ($RS->fields["fh_kategorimenuid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search."&search1=".$search1;
      	
		if ($page != 0 ) {
	      if ($page > $total_jumlah_page) $page=$total_jumlah_page; 
    	  $pagination = pagination($page, $total_jumlah_page, $teks_parameter);
   	  
            if ($search1 == "") {
                $SQL = "SELECT 	        M.fh_menuid, C.fh_kategorimenuid, C.fh_name as kategoriname, M.fh_name, M.fh_url
                        FROM		    fh_menu M
                        LEFT JOIN       fh_menu_kategori C
                        ON              M.fh_kategorimenuid = C.fh_kategorimenuid
                        WHERE 	        M.fh_name like '%".$search."%'
                        ORDER BY	    " . $tmp_orderfield . " " . $order." 
                        LIMIT			" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			} else {
                $SQL = "SELECT 	        M.fh_menuid, C.fh_kategorimenuid, C.fh_name as kategoriname, M.fh_name, M.fh_url
                        FROM		    fh_menu M
                        LEFT JOIN       fh_menu_kategori C
                        ON              M.fh_kategorimenuid = C.fh_kategorimenuid
                        WHERE 	        M.fh_name like '%".$search."%'
											AND C.fh_kategorimenuid = '".$search1."'
                        ORDER BY	    " . $tmp_orderfield . " " . $order." 
                        LIMIT			" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
            }

	      $RS = $db->Execute($SQL);
	  	
	      $i=0;
	      while (!$RS->EOF) {
	  	    $fh_menuid_temp[$i] = $RS->fields["fh_menuid"];
	  	    $fh_name_temp[$i] = $RS->fields["fh_name"];
		    $fh_kategorimenuid_temp[$i] = $RS->fields["fh_kategorimenuid"];
	  	    $fh_kategoriname_temp[$i] = $RS->fields["kategoriname"];
	  	    $fh_url_temp[$i] = $RS->fields["fh_url"];
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
	  	        'search1' => $search1,
	  	        'action'	=> $action,
	  	        'pagination' => $pagination,
	  	        
	  	  		'fh_url_temp' => $fh_url_temp,
	  	  		'fh_menuid_temp' => $fh_menuid_temp,
	  	  		'fh_kategorimenuid_temp' => $fh_kategorimenuid_temp,
	  	  		'fh_kategoriname_temp' => $fh_kategoriname_temp,
	  	  		'fh_name_temp' => $fh_name_temp));
	  $smarty->display('menulist.tpl');
	break;
	
	
	case "detail" :
	  if ((isset($_GET["data_fh_menuid"])) and (ctype_digit($_GET["data_fh_menuid"]))) 
	  {   $data_fh_menuid=$_GET["data_fh_menuid"];

		  $SQL = "SELECT 	*
                  FROM		fh_menu
                  WHERE		fh_menuid = ".$data_fh_menuid;
	  	  $RS  = $db->Execute($SQL);	   	  
		  if ($RS->fields["fh_menuid"] == '') $msg = "There is no record in our database";
          else {
                $data_fh_menuid = $RS->fields["fh_menuid"];
                $data_fh_name = $RS->fields["fh_name"];
                $data_fh_kategorimenuid = $RS->fields["fh_kategorimenuid"];
                $data_fh_url = $RS->fields["fh_url"];
          }

		  $SQL = "SELECT 	    *
                  FROM		    fh_menu_kategori";
          $RS = $db->Execute($SQL);
          $i=0;
          while (!$RS->EOF) {
            $menukategoriid[$i] = $RS->fields["fh_kategorimenuid"];
            $menuname[$i] = $RS->fields["fh_name"];
            $i++;
            $RS->MoveNext();
          }
	  }

	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_fh_kategorimenuid' , $data_fh_kategorimenuid);
	  $smarty->assign('data_fh_menuid' , $data_fh_menuid);
	  $smarty->assign('data_fh_name' , $data_fh_name);
	  $smarty->assign('data_fh_url' , $data_fh_url);
	  $smarty->assign('menukategoriid' , $menukategoriid);
	  $smarty->assign('menuname' , $menuname);
	  $smarty->display('menuinsert.tpl');
	break;
	}
}
?>