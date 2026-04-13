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
//error_reporting(E_ALL);
$tabel_utama = "b_home_link";
$primary_key = "homelink_id";
$priority_key = "priority";

$tabel_ukuran = "b_home_link_ukuran";
$primary_key_ukuran = "ukuranid";

$nama_tpl = "b_home_link_";
$judul_halaman = "Home Link";
//$path_file_image = "../../../images/homelink/";
$path_file_image = BASE_DIR_UPLOAD_MODULE."homelink/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'homelink/');
cek_mod_dir($path_file_image);

//*** Cek Folder dan chmod 777
cek_mod_dir($path_file_image);


//*** Ambil Config Besar Image
$SQL = "SELECT          *
             FROM		".$tabel_ukuran."
             LIMIT		0,1";
$RS = $db->Execute($SQL);
$widthimage = $RS->fields["width"];
$heightimage = $RS->fields["height"];


//*** Fungsi tambahan
function maxPriority($key,$table) {
	global $cfg,$db;
	$SQL= "SELECT MAX(".$key.") AS maxpr FROM ".$table."";
	$RS	= $db->Execute($SQL);
	if ($RS->RecordCount()>0) {
		return $RS->fields['maxpr'];
	} else {return 1;}
}

//*** Security ACCESS LEVEL 
$akses_level_page = access_level_page($fh_usergroupid, $db);

if ($fh_userid && $akses_level_page)
{	$teks_parameter = "";

	//*** Sorting
	if (!(isset($_GET["orderfield"])))  $orderfield="priority";
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!(($orderfield=="homelink_id") || ($orderfield=="created_at") || ($orderfield=="homelink_title") || ($orderfield=="priority")|| ($orderfield=="status"))) $orderfield="priority"; 
	}
	if (!(isset($_GET["order"])))  $order="asc";


	//*** Seting Konstanta Resize Image
	if ($_POST["setwidth"]) {
        $widthimage_temp = $_POST["width"];
        $heightimage_temp = $_POST["height"];
        if ((ctype_digit($widthimage_temp)) && (ctype_digit($heightimage_temp))) {
            $SQL = "UPDATE      ".$tabel_ukuran."
                        SET             width = '".$widthimage_temp."',
                                           height = '".$heightimage_temp."'";
            $db->Execute($SQL);
            //*** Copy variabel nya ke konstanta
            $widthimage = $widthimage_temp;
            $heightimage = $heightimage_temp;
            $final_message = "Your Resize Variable has been updated : width = ".$widthimage." and height = ".$heightimage."<br>";
            insert_log('Edit', $judul_halaman , 'Edit Resize Variable : Width = '.$widthimage.' And Height = '.$heightimage); 
        } else { $final_message = "Please input your valid variable<br>"; }
	}


    //*** Proses insert dan edit
    if ( (isset($_POST["insert"])) || (isset($_POST["edit"])) ) { 
		if ((isset($_POST["edit"]))) $data_homelink_id = trim($_POST["data_homelink_id"]);
		$data_created_at = $_POST["data_created_at"];
		$data_homelink_title = $_POST["data_homelink_title"];
		$data_homelink_title_en = $_POST["data_homelink_title_en"];
		$data_homelink_url = $_POST["data_homelink_url"];
		$data_homelink_pic = $_FILES["data_homelink_pic"];
        $data_homelink_status = $_POST["data_homelink_status"];
        $data_homelink_priority = maxPriority($priority_key,$tabel_utama) + 1;

        //*** Proses validasi
		if ($_FILES["data_homelink_pic"]["name"] != "") {
            $handle = new Upload($_FILES["data_homelink_pic"]);
            if ($handle->uploaded) {
                if (!($handle-> file_is_image)) { $msg.= "Invalid image<br>";}
                else {
                    $handle->image_resize = true;
                    if ($widthimage>0) $handle->image_x = $widthimage;
                    if ($heightimage>0) $handle->image_y = $heightimage;
                }
            } 
		}  else {  if ($_POST["insert"]) {$msg .= "Please input Main Logo<br>";}  }
		if ($data_homelink_title == "") { $msg.="Please input Title (ID)<br>"; }
		if ($data_homelink_title_en == "") { $msg.="Please input Title (EN)<br>"; }
		if ($data_homelink_priority == "") { $data_homelink_priority="1"; }
		else {
            if (!is_numeric($data_homelink_priority)) $msg .= "Please input Priority in Numeric<br>";
		}
			
		//*** Jika tidak ada error
		if ($msg=="") {
    		if (isset($_POST["insert"])) {
				$SQL1 =  "INSERT INTO 	".$tabel_utama." (homelink_title, homelink_title_en, homelink_url, status, priority)
								VALUES			('" . $db->escape($data_homelink_title) . "' , '" . $db->escape($data_homelink_title_en) . "',  '" . $data_homelink_url . "','" . $data_homelink_status . "', '" . $data_homelink_priority . "' )";
				$db   -> Execute($SQL1);
				$tmp_homelink_id = $db->Insert_Id();
				
                if ($_FILES["data_homelink_pic"]["name"] != "") {
                    $handle->file_new_name_body = 'homelink_icon_'.time().'_'.$tmp_homelink_id;
                    $handle->Process($path_file_image);
                    $SQL1 = "UPDATE		 	".$tabel_utama."
                                  SET		homelink_pic = '".$handle->file_dst_name."'
                                  WHERE		".$primary_key." = ".$tmp_homelink_id;
                    $db -> Execute($SQL1);
				}

				insert_log('Add', $judul_halaman , 'Add Home Link : '.$data_homelink_title); 
				$final_message = "Your Home Link : ".stripslashes($data_homelink_title)." has been inserted<br>";
            } else {

				$SQL = "SELECT			*
                              FROM		".$tabel_utama."
                              WHERE		".$primary_key." = ".$data_homelink_id;
                $RS = $db->Execute($SQL);
                $tmp_homelink_pic= $RS->fields["homelink_pic"];
                
                //*** Upload image baru
                if ($_FILES["data_homelink_pic"]["name"] != "") {
                    //*** hapus file lama jika ada
                    if ($RS->fields["homelink_pic"] != "") { @unlink($path_file_image.$RS->fields["homelink_pic"]); } 
                    $handle->file_new_name_body = 'homelink_icon'.time().'_'.$data_homelink_id;
                    $handle->Process($path_file_image);
                    $tmp_homelink_pic = $handle->file_dst_name;
                } 
                
                $SQL1 = "UPDATE		 	".$tabel_utama."
                              SET		created_at = '".$data_created_at."', 
										homelink_title = '".$db->escape($data_homelink_title) ."', 
										homelink_title_en = '".$db->escape($data_homelink_title_en) ."',
										homelink_url = '".$data_homelink_url."',
										homelink_pic = '".$tmp_homelink_pic."',
										status = '".$data_homelink_status."'
                              WHERE		".$primary_key." = ".$data_homelink_id;
				$db   -> Execute($SQL1);
				
				insert_log('Edit', $judul_halaman , 'Edit Home Link : '.$data_homelink_title); 
				$final_message = "Your Home Link : ".stripslashes($data_homelink_title)." has been updated<br>";
            }
        } else { 
            $data_homelink_pic = ""; 
            $data_homelink_pic2 = ""; 
            if(isset($_POST["insert"])) $action="insert"; else  $action="detail"; 
       }
    }


    //*** Proses Delete 
	if (isset($_POST["del"])) 
	{  $delete=$_POST["delete"];
       for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 		*
                      FROM			".$tabel_utama."
                      WHERE		".$primary_key." = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["homelink_id"] != '')
		 {  insert_log('Delete', $judul_halaman , 'Delete Home Link : '.$RS->fields["homelink_title"].', id : '.$RS->fields["homelink_id"]); 
            if ($RS->fields["homelink_pic"] != "" ) {  @unlink($path_file_image.$RS->fields["homelink_pic"]);  }
		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "Home Link has been deleted<br>";
	}
	

	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'Highlight homelink_ Title');
	$smarty->assign('width' , $widthimage); 
	$smarty->assign('height' , $heightimage);
	// $smarty->display($nama_tpl.'header.tpl');
	

	//*** Change Order Code
	$chorder = isset($_GET["chorder"])?$_GET["chorder"]:'';
	switch ($chorder) {

		case "up" :
		  if ((isset($_GET[$primary_key])) and (ctype_digit($_GET[$primary_key])) and ($_GET[$primary_key] > 0))  {
				//*** Menu Current yang ingin dirubah
				$SQL = "SELECT      *
							 FROM        ".$tabel_utama."
							 WHERE      ".$primary_key." = '".$_GET[$primary_key]."'";
				$RS = $db->Execute($SQL);
				
				//*** Menu Target yang dirubah
				$SQL2 = "SELECT      *
							 FROM        ".$tabel_utama."
							 WHERE      ".$priority_key." < '".$RS->fields[$priority_key]."'
							  ORDER BY  ".$priority_key." DESC";
				$RS2 = $db->Execute($SQL2);
				
				if (($RS2->fields[$priority_key] != "") && ($RS2->fields[$priority_key]  !=  $RS->fields[$priority_key])) 
				{  $SQL3 =  "UPDATE ".$tabel_utama." set 
										".$priority_key." = '".$RS2->fields[$priority_key]."'
								  WHERE ".$primary_key." = ".$RS->fields[$primary_key];
				   $db->Execute($SQL3);
				   
				   $SQL3 =  "UPDATE ".$tabel_utama." set 
										".$priority_key." = '".$RS->fields[$priority_key]."'
								  WHERE ".$primary_key." = ".$RS2->fields[$primary_key];
				   $db->Execute($SQL3);
				   
				   $tmp_data["msg"] = "The Order has been changed<br>"; 
				
				} else { $tmp_data["msg"] = "The order is already on the top Level<br>"; }
				
				
				$final_message = $tmp_data["msg"];
				$action="view";
		  }
		break;



		case "down" :
		  if ((isset($_GET[$primary_key])) and (ctype_digit($_GET[$primary_key])))  {
				//*** Menu Current yang ingin dirubah
				$SQL = "SELECT      *
							 FROM        ".$tabel_utama."
							 WHERE      ".$primary_key." = '".$_GET[$primary_key]."'";
				$RS = $db->Execute($SQL);
				
				//*** Menu Target yang dirubah
				$SQL2 = "SELECT      *
							 FROM        ".$tabel_utama."
							 WHERE      ".$priority_key." > '".$RS->fields[$priority_key]."'
							  ORDER BY  ".$priority_key." ASC";
				$RS2 = $db->Execute($SQL2);
				
				if (($RS2->fields[$priority_key] != "") && ($RS2->fields[$priority_key]  !=  $RS->fields[$priority_key])) 
				{  $SQL3 =  "UPDATE ".$tabel_utama." set 
										".$priority_key." = '".$RS2->fields[$priority_key]."'
								  WHERE ".$primary_key." = ".$RS->fields[$primary_key];
				   $db->Execute($SQL3);
				   
				   $SQL3 =  "UPDATE ".$tabel_utama." set 
										".$priority_key." = '".$RS->fields[$priority_key]."'
								  WHERE ".$primary_key." = ".$RS2->fields[$primary_key];
				   $db->Execute($SQL3);
				   
				   $tmp_data["msg"] = "The Order has been changed<br>"; 
				
				} else { $tmp_data["msg"] = "The Order is already on the bottom Level<br>"; }

				
				$final_message = $tmp_data["msg"];
				$action="view";

		  }
		break;
	}

	//*** MAIN CODE 
	switch ($action) {
	case "view" :
    $SQL = "SELECT 	*
                FROM		".$tabel_utama."
                WHERE 	homelink_title like '%".$search."%'
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["homelink_id"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                         FROM			    ".$tabel_utama."
                         WHERE 	        homelink_title like '%".$search."%'
                         ORDER BY		" . $orderfield . " " . $order . " 	  
                         LIMIT			    " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_homelink_id[$i] = $RS->fields["homelink_id"];
                $list_created_at[$i] = date("d-m-Y" , strtotime($RS->fields["created_at"]));
                $list_homelink_title[$i] = stripslashes($RS->fields["homelink_title"]);
                $list_homelink_title_en[$i] = stripslashes($RS->fields["homelink_title_en"]);
                $list_homelink_pic[$i] = $RS->fields["homelink_pic"];
                $list_homelink_url[$i] = $RS->fields["homelink_url"];
                $list_homelink_status[$i] = $RS->fields["status"];
                $list_homelink_priority[$i] = $RS->fields["priority"];
                        
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

				'data_homelink_id' => $list_homelink_id,
				'data_homelink_title' => $list_homelink_title,
				'data_homelink_title_en' => $list_homelink_title_en,
				'data_homelink_pic' => $list_homelink_pic,
				'data_homelink_url' => $list_homelink_url,
				'data_homelink_status' => $list_homelink_status,
				'data_homelink_priority' => $list_homelink_priority,
				'data_created_at'	=> $list_created_at));
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
	  if ((isset($_GET["data_homelink_id"])) and (ctype_digit($_GET["data_homelink_id"]))) 
	  {   $data_homelink_id = $_GET["data_homelink_id"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_homelink_id;
            $RS  = $db->Execute($SQL);	   	  
	  	  
            $data_homelink_id = $RS->fields["homelink_id"];
            $data_homelink_title =  stripslashes($RS->fields["homelink_title"]);
            $data_homelink_title_en =  stripslashes($RS->fields["homelink_title_en"]);
            $data_homelink_pic = $RS->fields["homelink_pic"];
            $data_homelink_url = $RS->fields["homelink_url"];
            $data_homelink_status = $RS->fields["status"];
            $data_homelink_priority = $RS->fields["priority"];
	  	    $data_created_at = date("d-m-Y" , strtotime($RS->fields["created_at"]));
          
		    if ($RS->fields["homelink_id"] == '') $msg = "There is no record in our database";
	  } 
	  
	  if ($data_created_at == '') $data_created_at = date("d-m-Y");
	  
      $optarray = enum("b_home_link.status");
	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_homelink_id' , $data_homelink_id);
	  $smarty->assign('data_created_at' , $data_created_at);
	  $smarty->assign('data_homelink_title' , $data_homelink_title);
	  $smarty->assign('data_homelink_title_en' , $data_homelink_title_en);
	  $smarty->assign('data_homelink_url' , $data_homelink_url);
	  $smarty->assign('data_homelink_status' , $data_homelink_status);
	  $smarty->assign('data_homelink_priority' , $data_homelink_priority);
	  $smarty->assign('data_homelink_pic' , $data_homelink_pic);
	  $smarty->assign('optarray' , $optarray);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
}
?>