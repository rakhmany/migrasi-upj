<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 13 April 2008
  * @copyright by FaberHost.com

  * Tabel Terkait adalah :
  * Tabel User dan Tabel Group

*************************************/
 
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");
error_reporting(0);

//***************************** Security ACCESS LEVEL *************************/
$akses_level_page = access_level_page($fh_usergroupid, $db);
$access_level_type = access_level_type($fh_usergroupid, $db); //** by: Bambang Riswanto at 2013

if ($fh_userid && $akses_level_page)
{ /***************************** seting orderfield **************************/
  if (!(isset($_GET["orderfield"])))  $orderfield="fh_usergroupid";
  else 
  { $orderfield=$_GET["orderfield"];
    if (!($orderfield=="fh_usergroupname")) $orderfield="fh_usergroupid"; 
  }
  $teks_parameter = "";


  //****************************  Proses Insert ataupun Edit ***************//
  if ((isset($_POST["insert"])) || (isset($_POST["edit"])))
  { if (isset($_POST["edit"])) $data_fh_usergroupid = trim($_POST["data_fh_usergroupid"]);

    //** Ambil semua inputan user **/
    $data_fh_usergroupname  = trim($_POST["data_fh_usergroupname"]);
    $optmenu = $_POST["optmenu"];
    $opttype = $_POST["opttype"];

    //** Validasi inputan user **//
    if ($data_fh_usergroupname=="") { $msg.="Please input User Group Name<br>"; } 
    else {
      $SQL = "SELECT    *
              FROM      fh_usergroup
              WHERE     fh_usergroupname='".trim($data_fh_usergroupname)."'";
      $RS  = $db->Execute($SQL);

      if ($RS->fields["fh_usergroupid"]!= "") 
      { if ((isset($_POST["insert"])) && ($RS->fields["fh_usergroupname"]== $data_fh_usergroupname)) 
        { $msg.="Group Name is already used. Please use another Group Name<br>"; }
        else
        { if ($RS->fields["fh_usergroupid"]!= $data_fh_usergroupid)
          { $msg.="Group Name is already used. Please use another Group Name<br>"; }
        }
      }
    }
    if (count($optmenu)==0) $msg.="Please give an access right to User Group<br>";

    //** Kalau inputan VALID then execute the process **//
    if ($msg=="")
    { if (isset($_POST["insert"])) 
      {   
          if (!$access_level_type->add) akses_level_die();
		  $SQL1 =  "INSERT INTO		fh_usergroup (fh_usergroupname)
                    VALUES 			('".$data_fh_usergroupname."')";
		  $db   -> Execute($SQL1);

          //*** Insert Menu Akses nya
		  $SQL1 = "SELECT    	last_insert_id() 
                   AS           fh_usergroupid";
          $RS1 = $db->Execute($SQL1);

          for($i=0; $i<count($optmenu); $i++)
          { $SQL1 =  "INSERT INTO	fh_menu_akses (fh_menuid, fh_groupid, fh_aksestype)
                      VALUES 		(".$optmenu[$i]." , ".$RS1->fields['fh_usergroupid']." , '".implode('-',$opttype[$optmenu[$i]])."')";
            $db   -> Execute($SQL1); 	  	   
          }
		  insert_log ('Add', 'User Group' , 'Add User Group = '.$data_fh_usergroupname );

      } else {
          if (!$access_level_type->edit) akses_level_die();
		  /* */ $SQL1 =  "UPDATE    	fh_usergroup 
                    SET         fh_usergroupname = '".$data_fh_usergroupname."'
                    WHERE     	fh_usergroupid = ".$data_fh_usergroupid;
          $db   -> Execute($SQL1);

          $SQL1 =  "DELETE FROM   	 fh_menu_akses
                    WHERE            fh_groupid = ".$data_fh_usergroupid;
          $db   -> Execute($SQL1);

          for($i=0; $i<count($optmenu); $i++)
          { $SQL1 =  "INSERT INTO   	fh_menu_akses (fh_menuid, fh_groupid, fh_aksestype)
                      VALUES         	(".$optmenu[$i]." , ".$data_fh_usergroupid." , '".implode('-',$opttype[$optmenu[$i]])."')";
            $db   -> Execute($SQL1);
          }
		  insert_log ('Edit', 'User Group' , 'Edit User Group = '.$data_fh_usergroupname );
		  
		  if ($data_fh_usergroupid == $fh_usergroupid) { $smarty->assign("reload_menu", 1); }
		  //print_r($_POST);
		 //echo(implode('-',$opttype[$optmenu[0]]));
      }
      
      $action="view";
    } else { (isset($_POST["insert"])) ? $action="insert" : $action="detail"; }
  }


  //***************************************  Proses Delete *****************//
  if (isset($_POST["del"])) 
  {   
      if (!$access_level_type->delete) akses_level_die();
	  
	  $delete=$_POST["delete"];
	  for($i=0; $i<count($delete); $i++)
      { $SQL = "SELECT    	*
                FROM       	fh_usergroup
                WHERE		fh_usergroupid = ".$delete[$i];
        $RS  = $db->Execute($SQL);

        if ($RS->fields["fh_usergroupid"] != '')
        { //*** Hapus juga useradmin account 
          $SQL = "SELECT    *
                  FROM     	fh_user
                  WHERE    	fh_usergroupid = ".$RS->fields["fh_usergroupid"];
          $RS1  = $db->Execute($SQL);

          if ($RS1->fields["fh_userid"] != "")
          { while (!$RS1->EOF) {
			  insert_log ('Delete', 'User Admin' , 'Delete Username = '.$RS1->fields["fh_username"].", UserID = ".$RS1->fields["fh_userid"] );
              $RS1->MoveNext();
            }

            $SQL1 = "DELETE FROM    fh_user
                     WHERE          fh_usergroupid = ".$RS->fields["fh_usergroupid"];
            $db->Execute($SQL1);

            //*** Hapus juga usergroup di menuakses
            $SQL1 = "DELETE FROM    	fh_menu_akses
                     WHERE              fh_groupid = ".$RS->fields["fh_usergroupid"];
            $db->Execute($SQL1);
          }

          //*** Hapus untuk usergroup
		  insert_log ('Delete', 'User Group' , 'Delete User Group = '.$RS->fields["fh_usergroupname"].", UserGroupID = ".$RS->fields["fh_usergroupid"] );
          $SQL1 = "DELETE FROM    	fh_usergroup
                   WHERE            fh_usergroupid = ".$delete[$i];
          $db->Execute($SQL1);
        }
      }
  }

  //********************************* Seting Header ************************//
  $smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
  $smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
  $smarty->assign('title' , 'Master User Group'); 
  $smarty->assign('title_search' , 'User Group'); 
  // $smarty->display('usergroupheader.tpl');


  //****************************** MAIN CODE *******************************//
  switch ($action) {
  case "view"   :
    $SQL = "SELECT      *
            FROM        fh_usergroup
            WHERE       fh_usergroupname like '%".$search."%'
            ORDER BY   	" . $orderfield . " " . $order;
    $RS =$db->Execute($SQL);

    if ($RS->fields["fh_usergroupid"] != "")
    { $total_jumlah_record = $RS->RecordCount();
      $total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
      $teks_parameter = "&action=".$action."&order=".$order."&search=".$search."&orderfield=".$orderfield;

      if ($page != 0 ) {
        if ($page > $total_jumlah_page) $page=$total_jumlah_page; 
        $pagination = pagination($page, $total_jumlah_page, $teks_parameter);

        $SQL = "SELECT     	 	*
                FROM     	    fh_usergroup
                WHERE          	fh_usergroupname like '%".$search."%'
                ORDER BY     	" . $orderfield . " " . $order . "
                LIMIT           " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
        $RS = $db->Execute($SQL);

        $i=0;
        while (!$RS->EOF) {
          $fh_usergroupidku_temp[$i] = $RS->fields["fh_usergroupid"];
          $fh_usergroupname_temp[$i] = $RS->fields["fh_usergroupname"];
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
              'action' => $action,
              'pagination' => $pagination,
              'fh_usergroupid_temp' => $fh_usergroupidku_temp,
              'fh_usergroupname_temp' => $fh_usergroupname_temp));
    $smarty->display('usergrouplist.tpl');
  break;

  
  case "insert" :
  case "detail" :
    $SQL = "SELECT    *
            FROM      fh_menu_kategori order by fh_kategorimenuid asc";
    $RS  = $db->Execute($SQL);

    if ($RS->fields["fh_kategorimenuid"] != "")
    {  $i=0;
       while (!$RS->EOF) {
         $SQL  = "SELECT    *
                  FROM      fh_menu
                  WHERE     fh_kategorimenuid = ".$RS->fields["fh_kategorimenuid"];
         $RS2  = $db->Execute($SQL);

         if ($RS2->fields["fh_menuid"] != "")
         {  $j=0;
            $list_kategorimenuid[$i] = $RS->fields["fh_kategorimenuid"];
            $list_kategorimenuname[$i] = $RS->fields["fh_name"];
            while (!$RS2->EOF) {
              $list_menuname[$i][$j] = $RS2->fields["fh_name"];
              $list_menuid[$i][$j] = $RS2->fields["fh_menuid"];
              $list_aksestype[$i][$j] = array('A','E','D');
              $j++;
              $RS2->MoveNext();
            }
          
            $i++;
         }
         $RS -> MoveNext();
       }
    }
    
    
    if ((isset($_GET["data_fh_usergroupid"])) and (ctype_digit($_GET["data_fh_usergroupid"]))) 
	{   $data_fh_usergroupid=$_GET["data_fh_usergroupid"]; 
	  
        $SQL = "SELECT      *
                FROM	    fh_menu_akses
                WHERE	    fh_groupid = ".$data_fh_usergroupid;
        $RS  = $db->Execute($SQL);
	      
        if ($RS->fields["fh_menuid"] != "")
        {	$i=0;
            while (!$RS -> EOF) {
                $optmenu[$i] = $RS->fields["fh_menuid"];
				$temp_opttype[$i] = explode('-',$RS->fields["fh_aksestype"]);
				$ii =0;
				while ( $ii < count($temp_opttype[$i]) ) {
                $opttype[$RS->fields["fh_menuid"]][$ii] = $temp_opttype[$i][$ii];
				$ii++;
				}
                $i++;
                $RS->MoveNext();
	        }	      
        }
	  
	    $SQL = "SELECT  	*
                FROM	    fh_usergroup
                WHERE		fh_usergroupid = ".$data_fh_usergroupid;
        $RS  = $db->Execute($SQL);
		
		$data_fh_usergroupid = $RS->fields["fh_usergroupid"];
	  	$data_fh_usergroupname = $RS->fields["fh_usergroupname"];
        if ($RS->fields["fh_usergroupid"] == '') $msg = "There is no record in our database";
    } 
    // print_r($optmenu);
    // print_r($opttype);
    $smarty->assign('msg' , $msg);
    $smarty->assign('data_fh_usergroupid' , $data_fh_usergroupid);
	$smarty->assign('data_fh_usergroupname' 	, $data_fh_usergroupname);
	$smarty->assign('list_kategorimenuid' , $list_kategorimenuid);
    $smarty->assign('list_kategorimenuname' , $list_kategorimenuname);
    $smarty->assign('list_menuid' , $list_menuid);
    $smarty->assign('list_menuname' , $list_menuname);
    $smarty->assign('list_aksestype' , $list_aksestype);
    $smarty->assign('optmenu' , $optmenu);
    $smarty->assign('opttype' , $opttype);
    $smarty->display('usergroupinsert.tpl');
  break;

	}
}
?>