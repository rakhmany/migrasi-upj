<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 1 Maret 2012
  * @copyright by FaberHost.com
  * Versi : 1.0
  
  * Banner Tidak di Resized
  * Checked : 8 Maret 2013
  
*************************************/
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

$tabel_utama = "b_banner";
$primary_key = "bannerid";
$priority_key = "priority";

$tabel_ukuran = "b_banner_ukuran";
$primary_key_ukuran = "ukuranid";

$nama_tpl = "b_banner_";
$judul_halaman = "Banner Management";
$path_file_image = BASE_DIR_UPLOAD_MODULE."b_banner/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'b_banner/');

$optarray_status = enum($tabel_utama.".status");
$smarty->assign('optarray_status' , $optarray_status);

$optarray_type = enum($tabel_utama.".type");
$smarty->assign('optarray_type' , $optarray_type);

$default_size = 'Home Right Center';
$smarty->assign('default_size' , $default_size);
//*** Ambil Config Besar Image
$SQL = "SELECT          *
             FROM		".$tabel_ukuran."
			 WHERE 		label = '".$default_size."'";
$RS = $db->Execute($SQL);
$widthimage = $RS->fields["width"];
$heightimage = $RS->fields["height"];

//*** Ambil Config Besar Image 2
/*$SQL = "SELECT          *
             FROM		".$tabel_ukuran."
			 WHERE 		ukuranid = '2'";
$RS2 = $db->Execute($SQL);
$widthimage2 = $RS2->fields["width"];
$heightimage2 = $RS2->fields["height"];*/

$SQL = "UPDATE ".$tabel_utama." SET status = 'Hidden' WHERE bannerdate < '".date("Y-m-d")."'";
$db->Execute($SQL);

//*** Fungsi tambahan
function maxPriority($key,$table) {
	global $cfg,$db;
	$SQL= "SELECT MAX(".$key.") AS maxpr FROM ".$table."";
	$RS	= $db->Execute($SQL);
	if ($RS->RecordCount()>0) {
		return $RS->fields['maxpr'];
	} else {return 1;}
}

function getResizeByType($key) {
	global $conf,$db,$tabel_ukuran;
	$SQL= "SELECT width, height FROM ".$tabel_ukuran." WHERE label = '". trim($key) ."'";
	$RS	= $db->Execute($SQL);
	if ($RS->RecordCount()>0) {
		return $RS->fields;
	} else {return false;}
}

//*** Security ACCESS LEVEL 
$akses_level_page = access_level_page($fh_usergroupid, $db);

if ($fh_userid && $akses_level_page)
{	$teks_parameter = "";

	//*** Sorting
	if (!(isset($_GET["orderfield"])))  $orderfield="bannerid";
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!(($orderfield=="bannerid") || ($orderfield=="bannerdate") || ($orderfield=="bannertitle") || ($orderfield=="priority")|| ($orderfield=="status"))) $orderfield="bannerid"; 
	}
	if (!(isset($_GET["order"])))  $order="DESC";

    //*** Proses insert dan edit
    if ( (isset($_POST["insert"])) || (isset($_POST["edit"])) ) { 
		if ((isset($_POST["edit"]))) $data_bannerid = trim($_POST["data_bannerid"]);
		$data_bannerdate = $_POST["data_bannerdate"];
		$data_bannertitle = $_POST["data_bannertitle"];
		$data_bannertitle_en = $_POST["data_bannertitle_en"];
		$data_bannershortdesc = $_POST["data_bannershortdesc"];
		$data_bannershortdesc_en = $_POST["data_bannershortdesc_en"];
		$data_bannerurl = $_POST["data_bannerurl"];
		$data_bannerpic = $_FILES["data_bannerpic"];
        $data_bannerstatus = $_POST["data_bannerstatus"];
        $data_bannertype = $_POST["data_bannertype"];
        $data_bannerpriority = maxPriority($priority_key,$tabel_utama) + 1;

		
        //*** Proses validasi
        if ($data_bannertype == "") { $data_bannertype = $default_size;/*$msg.="Please input Banner Type<br>";*/ }
        $resize = getResizeByType($data_bannertype);
        if ($data_bannerdate == "") { $msg.="Please input Date Expired<br>"; }
		if ($data_bannertitle == "") { $msg.="Please input Title (ID)<br>"; }
		if ($data_bannertitle_en == "") { $msg.="Please input Title (EN)<br>"; }
		if ($data_bannerpic["name"] != "") {
            $handle = new Upload($_FILES["data_bannerpic"]);
            if ($handle->uploaded) {
                if ( !($handle-> file_is_image) ) { $msg .= "Invalid image<br>"; }
                else {
                    $handle->image_resize = true;
					if ($resize["width"] > 0) $handle->image_x = $resize["width"];
					if ($resize["height"] > 0) $handle->image_y = $resize["height"];
                }
            } 
		}  else {  if ($_POST["insert"]) {$msg .= "Please input Banner Image<br>";}  }
		
		//*** Jika tidak ada error
		if ($msg==""){ 
		    $tmp = explode('-', $data_bannerdate);
		    $data_bannerdate = $tmp[2]."-".$tmp[1]."-".$tmp[0];

    		if (isset($_POST["insert"])){ 
				$SQL1 =  "INSERT INTO		".$tabel_utama." (bannerdate,  bannertitle,  bannertitle_en,   bannershortdesc,   bannershortdesc_en, bannerurl, type, status, priority)
                               VALUES		('" . $data_bannerdate . "' , '" . $db->escape($data_bannertitle) . "' , '" . $db->escape($data_bannertitle_en) . "', '" . $db->escape($data_bannershortdesc) . "', '" . $db->escape($data_bannershortdesc_en) . "',  '" . $data_bannerurl . "','" . $data_bannertype . "', '" . $data_bannerstatus . "', '" . $data_bannerpriority . "' )";
				$db   -> Execute($SQL1);
				$tmp_bannerid = $db->Insert_Id();
				
                if ($data_bannerpic["name"] != "") {
                    $handle->file_new_name_body = 'banner'.$tmp_bannerid;
                    $handle->Process($path_file_image);
                    $SQL1 = "UPDATE		 	".$tabel_utama."
                                  SET		bannerpic = '".$handle->file_dst_name."'
                                  WHERE		".$primary_key." = ".$tmp_bannerid;
                    $db -> Execute($SQL1);
               }

				insert_log('Add', $judul_halaman , 'Add Banner: '.$data_bannertitle); 
				$final_message = "Your Banner : ".stripslashes($data_bannertitle)." has been inserted<br>";
            } else {

				$SQL = "SELECT			*
                              FROM		".$tabel_utama."
                              WHERE		".$primary_key." = ".$data_bannerid;
                $RS = $db->Execute($SQL);
                $tmp_bannerpic= $RS->fields["bannerpic"];
                
                //*** Upload image baru
                if ($data_bannerpic["name"] != "") {
                    //*** hapus file lama jika ada
                    if ($RS->fields["bannerpic"] != "") { @unlink($path_file_image.$RS->fields["bannerpic"]); } 
                    $handle->file_new_name_body = 'banner'.$data_bannerid;
                    $handle->Process($path_file_image);
                    $tmp_bannerpic = $handle->file_dst_name;
                }
                
                $SQL1 = "UPDATE			".$tabel_utama."
                              SET		bannerdate = '".$data_bannerdate."', 
										bannertitle = '".$db->escape($data_bannertitle) ."', 
										bannertitle_en = '".$db->escape($data_bannertitle_en) ."', 
										bannershortdesc = '".$db->escape($data_bannershortdesc) ."', 
										bannershortdesc_en = '".$db->escape($data_bannershortdesc_en) ."', 
										bannerurl = '".$data_bannerurl."',
										bannerpic = '".$tmp_bannerpic."',
										type = '".$data_bannertype."',
										status = '".$data_bannerstatus."'
                              WHERE		".$primary_key." = ".$data_bannerid;
				$db   -> Execute($SQL1);
				
				insert_log('Edit', $judul_halaman , 'Edit Banner : '.$data_bannertitle); 
				$final_message = "Your Banner : ".stripslashes($data_bannertitle)." has been updated<br>";
            }
        } else { 
            $data_bannerpic = ""; 
            if(isset($_POST["insert"])) $action="insert"; else  $action="detail"; 
       }
    }


    //*** Proses Delete 
	if (isset($_POST["del"])) 
	{  $delete=$_POST["delete"];
       for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 		*
                      FROM		".$tabel_utama."
                      WHERE		".$primary_key." = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["bannerid"] != '')
		 {  insert_log('Delete', $judul_halaman , 'Delete Banner : '.$RS->fields["bannertitle"].', id : '.$RS->fields["bannerid"]); 
            if ($RS->fields["bannerpic"] != "" ) {  unlink($path_file_image.$RS->fields["bannerpic"]);  }
		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE		".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "Banner has been deleted<br>";
	}
	

	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'Banner Title');
	$smarty->assign('search' , $search); 
	$smarty->assign('search1' , $search1); 
	$smarty->assign('search2' , $search2); 
	$smarty->assign('width' , $widthimage); 
	$smarty->assign('height' , $heightimage); 
//	$smarty->assign('width2' , $widthimage2);
//	$smarty->assign('height2' , $heightimage2);
	// $smarty->display($nama_tpl.'header.tpl');
	
	//*** MAIN CODE 
	switch ($action) {
	case "view" :
	$tmp_search_sql = "";
    if ($search1 != "") { $tmp_search_sql .= " AND type = '".$search1."' ";}
    if ($search2 != "") { $tmp_search_sql .= " AND status = '".$search2."' ";}
	
    $SQL = "SELECT			*
                FROM		".$tabel_utama."
                WHERE		bannertitle like '%".$search."%'
				".$tmp_search_sql."
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["bannerid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                         FROM		".$tabel_utama."
                         WHERE		bannertitle like '%".$search."%'
						 ".$tmp_search_sql."
                         ORDER BY	" . $orderfield . " " . $order . " 	  
                         LIMIT		" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_bannerid[$i] = $RS->fields["bannerid"];
                $list_bannerdate[$i] = date("d-m-Y" , strtotime($RS->fields["bannerdate"]));
                $list_bannertitle[$i] = stripslashes($RS->fields["bannertitle"]);
                $list_bannertitle_en[$i] = stripslashes($RS->fields["bannertitle_en"]);
                $list_bannerpic[$i] = $RS->fields["bannerpic"];
                $list_bannerurl[$i] = $RS->fields["bannerurl"];
                $list_bannerstatus[$i] = $RS->fields["status"];
                $list_bannertype[$i] = $RS->fields["type"];
                $list_bannerpriority[$i] = $RS->fields["priority"];

                $SQL = "SELECT			$primary_key
                            FROM		".$tabel_utama."
                            WHERE		".$primary_key." = '".$RS->fields["bannerid"]."' AND bannerdate < '".date("Y-m-d")."'";
                $RS2 = $db->Execute($SQL);

                $list_is_expired[$i] = (($RS2->fields[$primary_key] != '') ? 1 : 0 );
				
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

				'data_bannerid' => $list_bannerid,
				'data_bannertitle' => $list_bannertitle,
				'data_bannertitle_en' => $list_bannertitle_en,
				'data_bannerpic' => $list_bannerpic,
				'data_bannerurl' => $list_bannerurl,
				'data_bannerstatus' => $list_bannerstatus,
				'data_bannertype' => $list_bannertype,
				'data_bannerpriority' => $list_bannerpriority,
				'data_bannerdate'	=> $list_bannerdate,
				'data_is_expired'	=> $list_is_expired));
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
	  if ((isset($_GET["data_bannerid"])) and (ctype_digit($_GET["data_bannerid"]))) 
	  {   $data_bannerid = $_GET["data_bannerid"];
            $SQL = "SELECT			*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_bannerid;
            $RS  = $db->Execute($SQL);	   	  
	  	  
            $data_bannerid = $RS->fields["bannerid"];
            $data_bannertitle = stripslashes($RS->fields["bannertitle"]);
            $data_bannertitle_en = stripslashes($RS->fields["bannertitle_en"]);
            $data_bannershortdesc = stripslashes($RS->fields["bannershortdesc"]);
            $data_bannershortdesc_en = stripslashes($RS->fields["bannershortdesc_en"]);
            $data_bannerpic = $RS->fields["bannerpic"];
            $data_bannerurl = $RS->fields["bannerurl"];
            $data_bannerstatus = $RS->fields["status"];
            $data_bannertype = $RS->fields["type"];
            $data_bannerpriority = $RS->fields["priority"];
	  	    $data_bannerdate = date("d-m-Y" , strtotime($RS->fields["bannerdate"]));
          
		    if ($RS->fields["bannerid"] == '') $msg = "There is no record in our database";
	  } 

	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_bannerid' , $data_bannerid);
	  $smarty->assign('data_bannerdate' , $data_bannerdate);
	  $smarty->assign('data_bannertitle' , $data_bannertitle);
	  $smarty->assign('data_bannertitle_en' , $data_bannertitle_en);
	  $smarty->assign('data_bannershortdesc' , $data_bannershortdesc);
	  $smarty->assign('data_bannershortdesc_en' , $data_bannershortdesc_en);
	  $smarty->assign('data_bannerurl' , $data_bannerurl);
	  $smarty->assign('data_bannerstatus' , $data_bannerstatus);
	  $smarty->assign('data_bannertype' , $data_bannertype);
	  $smarty->assign('data_bannerpriority' , $data_bannerpriority);
	  $smarty->assign('data_bannerpic' , $data_bannerpic);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
}
?>