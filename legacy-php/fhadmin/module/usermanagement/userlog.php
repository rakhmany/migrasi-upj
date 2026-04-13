<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 13 April 2008
  * @copyright by FaberHost.com

  * Tabel Terkait adalah :
  * Tabel User dan Tabel Group dan Tabel Userlog
 
*************************************/
 
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

//***************************** Security ACCESS LEVEL *************************/
$akses_level_page = access_level_page($fh_usergroupid, $db);
$access_level_type = access_level_type($fh_usergroupid, $db); //** by: Bambang Riswanto at 2013

if ($fh_userid && $akses_level_page)
{	/***************************** seting orderfield **************************/
	if (!(isset($_GET["orderfield"])))  $orderfield="fh_userlogid";
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!((($orderfield=="fh_userid")) ||  (($orderfield=="fh_usergroupid")) || (($orderfield=="fh_pagetitle")) || (($orderfield=="fh_date")) || (($orderfield=="fh_description")) || (($orderfield=="fh_action")))) $orderfield="fh_userlogid"; 
	}
	$teks_parameter = "";

	//***************************************  Proses Delete *****************//
	if (isset($_POST["del"])) 
	{  
	   if (!$access_level_type->delete) akses_level_die();
	   $delete=$_POST["delete"];
	   for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 	*
                 FROM		fh_userlog
                 WHERE		fh_userlogid = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["fh_userid"] != '')
		 { insert_log ('Delete', 'UserLog' , 'Delete Logfile = '.$RS->fields["fh_userlogid"]);
		   $SQL1 = "DELETE FROM		fh_userlog
                    WHERE			fh_userlogid = ".$delete[$i];
	       $RS1  = $db->Execute($SQL1);
		 }   
	   }
	}
	 
	//********************************* Seting Header ************************//
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
  	$smarty->assign('title' , 'Master User Log'); 
  	$smarty->assign('title_search' , 'Keyword'); 
 	// $smarty->display('userlogheader.tpl');
	
	
	//****************************** MAIN CODE *******************************//
	switch ($action){
	case "view" :
	  $SQL = "SELECT 	    *
              FROM		    fh_userlog
              WHERE 	    fh_description like '%".$search."%'  
              ORDER BY		" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  if ($RS->fields["fh_usergroupid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;

    	if ($page != 0 ) {
	      if ($page > $total_jumlah_page) $page=$total_jumlah_page; 
    	  $pagination = pagination($page, $total_jumlah_page, $teks_parameter);
   	  
	      $SQL = "SELECT 		*
                  FROM			fh_userlog
                  WHERE 		fh_description like '%".$search."%'
                  ORDER BY		" . $orderfield . " " . $order . " 	  
                  LIMIT			" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
	      $RS = $db->Execute($SQL);
	  	
	      $i=0;
	      while (!$RS->EOF) {
		    $SQL = "SELECT 		* 
                    FROM		fh_usergroup
                    WHERE		fh_usergroupid = ".$RS->fields["fh_usergroupid"];
	  	    $RS1 = $db->Execute($SQL);
	  	  
	  	    $SQL = "SELECT 	* 
                    FROM		fh_user
                    WHERE		fh_userid = ".$RS->fields["fh_userid"];
	  	    $RS2 = $db->Execute($SQL);
	  	  
		    $fh_userlogid_temp[$i] = $RS->fields["fh_userlogid"];
	  	    $fh_userid_temp[$i] = $RS->fields["fh_userid"];
	  	    $fh_username_temp[$i] = $RS2->fields["fh_username"];
	  	    $fh_usergroupid_temp[$i] = $RS->fields["fh_usergroupid"];
	  	    $fh_usergroupname_temp[$i] = $RS1->fields["fh_usergroupname"];
	  	    $fh_pagetitle_temp[$i] = $RS->fields["fh_pagetitle"];
	  	    $fh_action_temp[$i] = $RS->fields["fh_action"];
	  	    $fh_description_temp[$i] = $RS->fields["fh_description"];
	  	    $fh_date_temp[$i] = convert_tanggalwaktu($RS->fields["fh_date"]);
	  	    $RS->MoveNext();
	  	    $i++;
	  	    }
	    } else $msg = "Sorry, There is no record in our database<br>";
	  } else $msg = "Sorry, There is no record in our database<br>";

	  $smarty->assign('view', array(
	  	        'msg'  => $msg,
	  	        'page' => $page,
	  	        'order' => $order,
	  	        'orderfield' => $orderfield,
	  	        'search' => $search,
	  	        'action'	=> $action,
	  	        'pagination' => $pagination,
	  	  		'fh_userlogid_temp' => $fh_userlogid_temp,
	  			'fh_userid_temp' => $fh_userid_temp,
	  			'fh_username_temp' => $fh_username_temp,
	  			'fh_usergroupid_temp' => $fh_usergroupid_temp,
	  			'fh_usergroupname_temp'	=> $fh_usergroupname_temp,
	  			'fh_pagetitle_temp' => $fh_pagetitle_temp,
	  			'fh_action_temp' => $fh_action_temp,
	  			'fh_description_temp'	=> $fh_description_temp,
	  			'fh_date_temp' => $fh_date_temp));
	  $smarty->display('userloglist.tpl');
	break;
	
	}
}
?>