<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 13 April 2008
  * @copyright by FaberHost.com
  
  * sistem dengan unlimited category level
  * Checked : 28 Februari 2013
*************************************/
 
require_once("../../config.inc.php");
// require_once("../../include/js/delete.js");

//*** Security ACCESS LEVEL 
$akses_level_page = access_level_page($fh_usergroupid, $db);

$tabel_utama = "gallery3_category";
$primary_key = "categoryid";
$nama_tpl = "gallery3_category_";
$judul_halaman = "Kategori Failitas";

if ($fh_userid && $akses_level_page)
{	$category = new categoryunlimited();
    
	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
  	$smarty->assign('title' , $judul_halaman); 
  	// $smarty->display($nama_tpl.'header.tpl');
	
	
	//*** Add New Menu
    if (isset($_POST["insertmenu"])) {
	    $_POST['categoryparentid'] = ''; 
        $tmp_data = $category->insert_menu($_POST, $tabel_utama);
        if ($tmp_data["msg2"] == "") $action="insert";
        else $action="view";
    }


	//*** Edit Menu
    if (isset($_POST["editmenu"])) { 
        $tmp_data = $category->edit_menu($_POST, $tabel_utama);
        if ($tmp_data["msg2"] == "") {
            $_GET["categoryid"] = $tmp_data["data_categoryid"];
            $action="detail";
        }
        else $action="view";
    }


	//*** MAIN CODE 
	switch ($action){
	case "view"   :
	  $tmp_category = $category->select_deep(0,"----",$tabel_utama);
	  
	  $smarty->assign('msg' , $tmp_data["msg"]);
	  $smarty->assign('strukturcategory' , $tmp_category);
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	

	case "insert" :
      $tmp_category = $category->select_deep_core(0,"----", $tmp_data["data_categoryparentid"], $tabel_utama);
	
      $optarray_categorystatus = enum($tabel_utama.".categorystatus");
      $smarty->assign('optarray_categorystatus' , $optarray_categorystatus);
 	  $smarty->assign('flag1' , 'insert');

	  $smarty->assign('msg' , $tmp_data["msg"]);
	  $smarty->assign('categoryparentid' , $tmp_data["categoryparentid"]);
      $smarty->assign('categoryname' , $tmp_data["categoryname"]);
      $smarty->assign('categoryname_en' , $tmp_data["categoryname_en"]);
      $smarty->assign('categorystatus' , $tmp_data["categorystatus"]);
      $smarty->assign('strukturcategory' , $tmp_category);
      $smarty->display($nama_tpl.'insert.tpl');
	break;


	case "detail" :
      if ((isset($_GET["categoryid"])) and (ctype_digit($_GET["categoryid"])) and ($_GET["categoryid"] > 0))  {
            $SQL = "SELECT      *
                         FROM        ".$tabel_utama."
                         WHERE      ".$primary_key." = '".$_GET["categoryid"]."'";
            $RS = $db->Execute($SQL);
            $tmp_category = $category->select_deep_core(0,"----", $RS->fields["categoryparentid"],$tabel_utama);
            $optarray_categorystatus = enum($tabel_utama.".categorystatus");
            $smarty->assign('optarray_categorystatus' , $optarray_categorystatus);
            $smarty->assign('flag1' , 'edit');
            $smarty->assign('msg' , $tmp_data["msg"]);

            $smarty->assign('categoryid' , $RS->fields["categoryid"]);
            $smarty->assign('categoryparentid' , $RS->fields["categoryparentid"]);
            $smarty->assign('categoryname' , $RS->fields["categoryname"]);
            $smarty->assign('categoryname_en' , $RS->fields["categoryname_en"]);
            $smarty->assign('categorystatus' , $RS->fields["categorystatus"]);
            $smarty->assign('strukturcategory' , $tmp_category);
            $smarty->display($nama_tpl.'insert.tpl');
      }
	break;

	case "delete" :
      if ((isset($_GET["categoryid"])) and (ctype_digit($_GET["categoryid"])) and ($_GET["categoryid"] > 0))  {
	  
            $SQL = "SELECT 		    *
                         FROM			    ".$tabel_utama."
                         WHERE			".$primary_key." = ".$_GET['categoryid'];
		   $RS  = $db->Execute($SQL);

		   if ($RS->fields["categoryid"] != '')
		   { 	$tmp_data["msg"] = "Category ".$RS->fields["categoryname"]." has been deleted<br>";
				insert_log('Delete', $judul_halaman , 'Delete Category: '.$RS->fields["categoryname"]); 
		        $SQL1 = "DELETE FROM		".$tabel_utama."
                              WHERE			    ".$primary_key." = ".$RS->fields["categoryid"];
                $db->Execute($SQL1);
		   } else { $tmp_data["msg"] = "Sorry, there is no record in our database<br>"; }
	
	  
            $tmp_category = $category->select_deep(0,"----", $tabel_utama);
	  
            $smarty->assign('msg' , $tmp_data["msg"]);
            $smarty->assign('strukturcategory' , $tmp_category);
            $smarty->display($nama_tpl.'list.tpl');
      }
	break;



	case "up" :
      if ((isset($_GET["categoryid"])) and (ctype_digit($_GET["categoryid"])) and ($_GET["categoryid"] > 0))  {
            //*** Menu Current yang ingin dirubah
            $SQL = "SELECT      *
                         FROM        ".$tabel_utama."
                         WHERE      ".$primary_key." = '".$_GET["categoryid"]."'";
            $RS = $db->Execute($SQL);
            
            //*** Menu Target yang dirubah
            $SQL2 = "SELECT      *
                         FROM        ".$tabel_utama."
                         WHERE      categoryparentid = '".$RS->fields["categoryparentid"]."'
                                                AND categoryprioritas < '".$RS->fields["categoryprioritas"]."'
                          ORDER BY  categoryprioritas DESC";
            $RS2 = $db->Execute($SQL2);
            
            if (($RS2->fields["categoryprioritas"] != "") && ($RS2->fields["categoryprioritas"]  !=  $RS->fields["categoryprioritas"])) 
            {  $SQL3 =  "UPDATE        ".$tabel_utama."
                              SET               categoryprioritas = '".$RS2->fields["categoryprioritas"]."'
                              WHERE          ".$primary_key." = ".$RS->fields["categoryid"];
               $db->Execute($SQL3);
               
               $SQL3 =  "UPDATE         ".$tabel_utama."
                              SET               categoryprioritas = '".$RS->fields["categoryprioritas"]."'
                              WHERE          ".$primary_key." = ".$RS2->fields["categoryid"];
               $db->Execute($SQL3);
               
               $tmp_data["msg"] = "The Category Order has been changed<br>"; 
            
            } else { $tmp_data["msg"] = "The Category is already on the top Level Menu<br>"; }

            $tmp_category = $category ->select_deep(0,"----", $tabel_utama);
            
            $smarty->assign('msg' , $tmp_data["msg"]);
            $smarty->assign('strukturcategory' , $tmp_category);
            $smarty->display($nama_tpl.'list.tpl');

      }
	break;



	case "down" :
      if ((isset($_GET["categoryid"])) and (ctype_digit($_GET["categoryid"])))  {
            //*** Menu Current yang ingin dirubah
            $SQL = "SELECT      *
                         FROM        ".$tabel_utama."
                         WHERE      ".$primary_key." = '".$_GET["categoryid"]."'";
            $RS = $db->Execute($SQL);
            
            //*** Menu Target yang dirubah
            $SQL2 = "SELECT         *
                          FROM            ".$tabel_utama."
                          WHERE          categoryparentid = '".$RS->fields["categoryparentid"]."'
                                                    AND categoryprioritas > '".$RS->fields["categoryprioritas"]."'
                          ORDER BY      categoryprioritas ASC";
            $RS2 = $db->Execute($SQL2);
            
            if (($RS2->fields["categoryprioritas"] != "") && ($RS2->fields["categoryprioritas"]  !=  $RS->fields["categoryprioritas"])) 
            {  $SQL3 =  "UPDATE     ".$tabel_utama."
                              SET           categoryprioritas = '".$RS2->fields["categoryprioritas"]."'
                              WHERE      ".$primary_key." = ".$RS->fields["categoryid"];
               $db->Execute($SQL3);
               
               $SQL3 =  "UPDATE         ".$tabel_utama."
                              SET               categoryprioritas = '".$RS->fields["categoryprioritas"]."'
                              WHERE          ".$primary_key." = ".$RS2->fields["categoryid"];
               $db->Execute($SQL3);
               
               $tmp_data["msg"] = "The Category Order has been changed<br>"; 
            
            } else { $tmp_data["msg"] = "The Category is already on the bottom Level Menu<br>"; }

            $tmp_category = $category->select_deep(0,"----", $tabel_utama);
            
            $smarty->assign('msg' , $tmp_data["msg"]);
            $smarty->assign('strukturcategory' , $tmp_category);
            $smarty->display($nama_tpl.'list.tpl');

      }
	break;

	}
}
?>