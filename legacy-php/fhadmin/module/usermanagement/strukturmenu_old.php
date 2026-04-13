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
require_once("../../include/js/delete.js");

//***************************** Security ACCESS LEVEL *************************/
$akses_level_page = access_level_page($fh_usergroupid, $db);
$path_image = "../../../images/";
$width_imagelist = $basic->fields["fh_widthstatisbanner"];
$height_imagelist = $basic->fields["fh_heightstatisbanner"];
$judul_halaman = "Structure Menu";

if ($fh_userid && $akses_level_page)
{	$fh_structuremenu = new fh_structuremenu();
    
	//********************************* Seting Header ************************//
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
  	$smarty->assign('title' , 'Structure Menu'); 
  	$smarty->display('strukturmenuheader.tpl');
	
	//*** Add New Menu
    if (isset($_POST["insertmenu"])) { 
        $tmp_data = $fh_structuremenu->insert_menu($_POST, $_FILES, $path_image, $width_imagelist, $height_imagelist);
        if ($tmp_data["msg2"] == "") $action="insert";
        else $action="view";
    }

	//*** Edit Menu
    if (isset($_POST["editmenu"])) { 
        $tmp_data = $fh_structuremenu->edit_menu($_POST, $_FILES, $path_image, $width_imagelist, $height_imagelist);
        if ($tmp_data["msg2"] == "") {
            $_GET["coremenu"] = $tmp_data["data_fh_strukturid"];
            $action="detail";
        }
        else $action="view";
    }
    
    //*** Delete Banner
    if (isset($_POST["delbanner"])) {
        $SQL = "SELECT 		*
                      FROM			fh_struktur_menu
                      WHERE	    fh_strukturid = ".$_POST["fh_strukturid"];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["fh_strukturid"] != '')
		 {  //**** Untuk check domain dimasukkan ke userlog
            insert_log('Delete', $judul_halaman , 'Delete Statis Page Name : '.$RS->fields["fh_menu_name"]); 
            if ($RS->fields["fh_content_banner"] != "") { @unlink($path_image."".$RS->fields["fh_content_banner"]); }

           $SQL1 = "UPDATE		 	fh_struktur_menu
                         SET				    fh_content_banner = '' 
                         WHERE			fh_strukturid = ".$_POST["fh_strukturid"];
           $db   -> Execute($SQL1);
           $tmp_data["msg"] = "Banner has been deleted<br>";
		 }   
    }
	
	//****************************** MAIN CODE *******************************//
	switch ($action){
	case "view"   :
	  $tmp_menu = $fh_structuremenu->select_deep(0,"----");
	  
	  $smarty->assign('msg' , $tmp_data["msg"]);
	  $smarty->assign('strukturmenu' , $tmp_menu);
	  $smarty->display('strukturmenulist.tpl');
	break;
	
	
	case "insert" :
      $tmp_menu = $fh_structuremenu->select_deep_core(0,"----", $tmp_data["data_coremenu"]);
	
      $optarray_strukturparenttipe = enum("fh_struktur_menu.fh_strukturparenttipe");
      $optarray_strukturcontentstatus = enum("fh_struktur_menu.fh_strukturstatus");
      $optarray_strukturcontenttipe = enum("fh_struktur_menu.fh_strukturtipe");
       
      if ($tmp_data["data_fh_strukturparenttipe"] == "") $tmp_data["data_fh_strukturparenttipe"] = "Parent";

      $smarty->assign('optarray_strukturparenttipe' , $optarray_strukturparenttipe);
      $smarty->assign('optarray_strukturcontenttipe' , $optarray_strukturcontenttipe);
      $smarty->assign('optarray_strukturcontentstatus' , $optarray_strukturcontentstatus);
 	  $smarty->assign('flag1' , 'insert');

	  $smarty->assign('msg' , $tmp_data["msg"]);
	  $smarty->assign('fh_strukturparenttipe' , $tmp_data["data_fh_strukturparenttipe"]);
	  $smarty->assign('fh_strukturcontenttipe' , $tmp_data["data_fh_strukturcontenttipe"]);
      $smarty->assign('fh_strukturcontentstatus' , $tmp_data["data_fh_strukturstatus"]);
      $smarty->assign('fh_menu_pageheader' , $tmp_data["data_fh_menu_pageheader"]);
      $smarty->assign('fh_menu_metakeyword' , $tmp_data["data_fh_menu_metakeyword"]);
      $smarty->assign('fh_menu_metadescription' , $tmp_data["data_fh_menu_metadescription"]);
      $smarty->assign('fh_menu_name' , $tmp_data["data_fh_menu_name"]);
      $smarty->assign('fh_content_title' , $tmp_data["data_fh_content_title"]);
      $smarty->assign('fh_content_description' , $tmp_data["data_fh_content_description"]);
      $smarty->assign('fh_modulefilename' , $tmp_data["data_fh_modulefilename"]);
	  $smarty->assign('strukturmenu' , $tmp_menu);
	  $smarty->assign('width_imagelist' , $width_imagelist);
	  $smarty->assign('height_imagelist' , $height_imagelist);
	  $smarty->assign('path_image' , $path_image);
	  
      $smarty->display('strukturmenuinsert.tpl');
	break;

	
	case "detail" :
      if ((isset($_GET["coremenu"])) and (ctype_digit($_GET["coremenu"])) and ($_GET["coremenu"] > 0))  {
	  
            $SQL = "SELECT      *
                         FROM        fh_struktur_menu
                         WHERE      fh_strukturid = '".$_GET["coremenu"]."'";
            $RS = $db->Execute($SQL);
            
            $tmp_menu = $fh_structuremenu->select_deep_core(0,"----", $RS->fields["fh_strukturparent"]);
            $optarray_strukturparenttipe = enum("fh_struktur_menu.fh_strukturparenttipe");
            $optarray_strukturcontentstatus = enum("fh_struktur_menu.fh_strukturstatus");
            $optarray_strukturcontenttipe = enum("fh_struktur_menu.fh_strukturtipe");
            
            $smarty->assign('optarray_strukturparenttipe' , $optarray_strukturparenttipe);
            $smarty->assign('optarray_strukturcontenttipe' , $optarray_strukturcontenttipe);
            $smarty->assign('optarray_strukturcontentstatus' , $optarray_strukturcontentstatus);
            $smarty->assign('flag1' , 'edit');
            $smarty->assign('msg' , $tmp_data["msg"]);

            $smarty->assign('fh_strukturid' , $RS->fields["fh_strukturid"]);
            $smarty->assign('fh_strukturparenttipe' , $RS->fields["fh_strukturparenttipe"]);
            $smarty->assign('fh_strukturcontenttipe' , $RS->fields["fh_strukturtipe"]);
            $smarty->assign('fh_strukturcontentstatus' , $RS->fields["fh_strukturstatus"]);
            $smarty->assign('fh_menu_pageheader' , $RS->fields["fh_menu_pageheader"]);
            $smarty->assign('fh_menu_metakeyword' , $RS->fields["fh_menu_metakeyword"]);
            $smarty->assign('fh_menu_metadescription' , $RS->fields["fh_menu_metadescription"]);
            $smarty->assign('fh_menu_name' , $RS->fields["fh_menu_name"]);
            $smarty->assign('fh_content_banner' , $RS->fields["fh_content_banner"]);
            $smarty->assign('fh_content_title' , $RS->fields["fh_content_titlename"]);
            $smarty->assign('fh_content_description' , $RS->fields["fh_content_description"]);
            $smarty->assign('fh_modulefilename' , $RS->fields["fh_modulefilename"]);
            $smarty->assign('strukturmenu' , $tmp_menu);
            $smarty->assign('width_imagelist' , $width_imagelist);
            $smarty->assign('height_imagelist' , $height_imagelist);
            $smarty->assign('path_image' , $path_image);
            $smarty->display('strukturmenuinsert.tpl');
      }
	break;


	case "delete" :
      if ((isset($_GET["coremenu"])) and (ctype_digit($_GET["coremenu"])) and ($_GET["coremenu"] > 0))  {
	  
            $SQL = "SELECT 		    *
                         FROM			    fh_struktur_menu
                         WHERE			fh_strukturid = ".$_GET['coremenu'];
		   $RS  = $db->Execute($SQL);

		   if ($RS->fields["fh_strukturid"] != '')
		   { 	$tmp_data["msg"] = "Menu ".$RS->fields["fh_menu_name"]." has been deleted<br>";
		    
		        $SQL1 = "INSERT INTO		fh_userlog (fh_userid, fh_usergroupid, fh_pagetitle, fh_action, fh_description, fh_date)
                               VALUES			    (".$fh_userid." , ".$fh_usergroupid." , 'Structure Menu' , 'Delete' , 'Delete Menu : ".$RS->fields["fh_menu_name"]."' , now())";
                $db  -> Execute($SQL1);

		        if ($RS->fields["fh_content_banner"] != "") { @unlink($path_image."".$RS->fields["fh_content_banner"]);  }
		        
		        $SQL1 = "DELETE FROM		fh_struktur_menu
                              WHERE			    fh_strukturid = ".$RS->fields["fh_strukturid"];
                $db->Execute($SQL1);
                
		   } else { $tmp_data["msg"] = "Sorry, there is no record in our database<br>"; }
	
	  
            $tmp_menu = $fh_structuremenu->select_deep(0,"----");
	  
            $smarty->assign('msg' , $tmp_data["msg"]);
            $smarty->assign('strukturmenu' , $tmp_menu);
            $smarty->display('strukturmenulist.tpl');

      }
	break;


	case "up" :
      if ((isset($_GET["coremenu"])) and (ctype_digit($_GET["coremenu"])) and ($_GET["coremenu"] > 0))  {
            //*** Menu Current yang ingin dirubah
            $SQL = "SELECT      *
                         FROM        fh_struktur_menu
                         WHERE      fh_strukturid = '".$_GET["coremenu"]."'";
            $RS = $db->Execute($SQL);
            
            //*** Menu Target yang dirubah
            $SQL2 = "SELECT      *
                         FROM        fh_struktur_menu
                         WHERE      fh_strukturparent = '".$RS->fields["fh_strukturparent"]."'
                                                AND fh_strukturprioritas < '".$RS->fields["fh_strukturprioritas"]."'
                          ORDER BY  fh_strukturprioritas DESC";
            $RS2 = $db->Execute($SQL2);
            
            if (($RS2->fields["fh_strukturprioritas"] != "") && ($RS2->fields["fh_strukturprioritas"]  !=  $RS->fields["fh_strukturprioritas"])) 
            {  $SQL3 =  "UPDATE fh_struktur_menu set 
                                    fh_strukturprioritas = '".$RS2->fields["fh_strukturprioritas"]."'
                              WHERE fh_strukturid = ".$RS->fields["fh_strukturid"];
               $db->Execute($SQL3);
               
               $SQL3 =  "UPDATE fh_struktur_menu set 
                                    fh_strukturprioritas = '".$RS->fields["fh_strukturprioritas"]."'
                              WHERE fh_strukturid = ".$RS2->fields["fh_strukturid"];
               $db->Execute($SQL3);
               
               $tmp_data["msg"] = "The Menu Order has been changed<br>"; 
            
            } else { $tmp_data["msg"] = "The Menu is already on the top Level Menu<br>"; }

            $tmp_menu = $fh_structuremenu->select_deep(0,"----");
            
            $smarty->assign('msg' , $tmp_data["msg"]);
            $smarty->assign('strukturmenu' , $tmp_menu);
            $smarty->display('strukturmenulist.tpl');

      }
	break;



	case "down" :
      if ((isset($_GET["coremenu"])) and (ctype_digit($_GET["coremenu"])))  {
            //*** Menu Current yang ingin dirubah
            $SQL = "SELECT      *
                         FROM        fh_struktur_menu
                         WHERE      fh_strukturid = '".$_GET["coremenu"]."'";
            $RS = $db->Execute($SQL);
            
            //*** Menu Target yang dirubah
            $SQL2 = "SELECT      *
                         FROM        fh_struktur_menu
                         WHERE      fh_strukturparent = '".$RS->fields["fh_strukturparent"]."'
                                                AND fh_strukturprioritas > '".$RS->fields["fh_strukturprioritas"]."'
                          ORDER BY  fh_strukturprioritas ASC";
            $RS2 = $db->Execute($SQL2);
            
            if (($RS2->fields["fh_strukturprioritas"] != "") && ($RS2->fields["fh_strukturprioritas"]  !=  $RS->fields["fh_strukturprioritas"])) 
            {  $SQL3 =  "UPDATE fh_struktur_menu set 
                                    fh_strukturprioritas = '".$RS2->fields["fh_strukturprioritas"]."'
                              WHERE fh_strukturid = ".$RS->fields["fh_strukturid"];
               $db->Execute($SQL3);
               
               $SQL3 =  "UPDATE fh_struktur_menu set 
                                    fh_strukturprioritas = '".$RS->fields["fh_strukturprioritas"]."'
                              WHERE fh_strukturid = ".$RS2->fields["fh_strukturid"];
               $db->Execute($SQL3);
               
               $tmp_data["msg"] = "The Menu Order has been changed<br>"; 
            
            } else { $tmp_data["msg"] = "The Menu is already on the bottom Level Menu<br>"; }

            $tmp_menu = $fh_structuremenu->select_deep(0,"----");
            
            $smarty->assign('msg' , $tmp_data["msg"]);
            $smarty->assign('strukturmenu' , $tmp_menu);
            $smarty->display('strukturmenulist.tpl');

      }
	break;

	}
}
?>