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

$tabel_utama = "popup_banner";
$primary_key = "pbanner_id";
$priority_key = "priority";

$tabel_ukuran = "popup_banner_ukuran";
$primary_key_ukuran = "ukuranid";

$nama_tpl = "popup_banner_";
$judul_halaman = "Popup Banner";
//$path_file_image = "../../../images/highlight/";
$path_file_image = BASE_DIR_UPLOAD_MODULE."banner-popup/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'banner-popup/');

//*** Cek Folder dan chmod 777
cek_mod_dir($path_file_image);


//*** Ambil Config Besar Image
$SQL = "SELECT          *
             FROM            ".$tabel_ukuran."
             LIMIT             0,1";
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
	  if (!(($orderfield=="pbanner_id") || ($orderfield=="pbanner_date") || ($orderfield=="pbanner_title") || ($orderfield=="priority")|| ($orderfield=="status"))) $orderfield="priority"; 
	}
	if (!(isset($_GET["order"])))  $order="ASC";


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
		if ((isset($_POST["edit"]))) $data_pbanner_id = trim($_POST["data_pbanner_id"]);
		$data_pbanner_date = $_POST["data_pbanner_date"];
		$data_pbanner_date_end = $_POST["data_pbanner_date_end"];
		$data_pbanner_title = $_POST["data_pbanner_title"];
		$data_pbanner_title_en = $_POST["data_pbanner_title_en"];
		$data_pbanner_shortdesc = $_POST["data_pbanner_shortdesc"];
		$data_pbanner_shortdesc_en = $_POST["data_pbanner_shortdesc_en"];
		$data_pbanner_url = $_POST["data_pbanner_url"];
		$data_pbanner_pic = $_FILES["data_pbanner_pic"];
        $data_pbanner_status = $_POST["data_pbanner_status"];
        $data_pbanner_priority = maxPriority($priority_key,$tabel_utama) + 1;

        //*** Proses validasi
        if ($data_pbanner_date == "") {$data_pbanner_date = date("d-m-Y"); }
        if ($data_pbanner_date_end == "") {$data_pbanner_date = '00-00-0000'; }
		if ($_FILES["data_pbanner_pic"]["name"] != "") {
            $handle = new Upload($_FILES["data_pbanner_pic"]);
            if ($handle->uploaded) {
                if (!($handle-> file_is_image)) { $msg.= "Invalid image<br>";}
                else {
                    $handle->image_resize = true;
                    if ($widthimage>0) $handle->image_x = $widthimage;
                    if ($heightimage>0) $handle->image_y = $heightimage;
                }
            } 
		}  else {  if ($_POST["insert"]) {$msg .= "Please input Main Image<br>";}  }
		if ($data_pbanner_title == "") { $msg.="Please input Title (EN)<br>"; }
		if ($data_pbanner_title_en == "") { $msg.="Please input Title (ID)<br>"; }
		if ($data_pbanner_priority == "") { $data_pbanner_priority="1"; }
		else {
            if (!is_numeric($data_pbanner_priority)) $msg .= "Please input Priority in Numeric<br>";
		}
			
		//*** Jika tidak ada error
		if ($msg==""){
//            $db->debug=1;
		    $tmp = explode('-', $data_pbanner_date);
		    $data_pbanner_date = $tmp[2]."-".$tmp[1]."-".$tmp[0];
		    $tmp2 = explode('-', $data_pbanner_date_end);
            $tmp_data_pbanner_date_end = $tmp2[2]."-".$tmp2[1]."-".$tmp2[0];

    		if (isset($_POST["insert"])){ 
				$SQL1 =  "INSERT INTO 	".$tabel_utama." (pbanner_date,  pbanner_date_end,  pbanner_title,  pbanner_title_en,   pbanner_shortdesc,   pbanner_shortdesc_en, pbanner_url, status, priority)
                               VALUES			('" . $data_pbanner_date . "' , '" . $tmp_data_pbanner_date_end . "' , '" . $db->escape($data_pbanner_title) . "' , '" . $db->escape($data_pbanner_title_en) . "', '" . $db->escape($data_pbanner_shortdesc) . "', '" . $db->escape($data_pbanner_shortdesc_en) . "',  '" . $data_pbanner_url . "','" . $data_pbanner_status . "', '" . $data_pbanner_priority . "' )";
				$db   -> Execute($SQL1);
				$tmp_pbanner_id = $db->Insert_Id();
				
                if ($_FILES["data_pbanner_pic"]["name"] != "") {
                    $handle->file_new_name_body = 'highlight'.$tmp_pbanner_id;
                    $handle->Process($path_file_image);
                    $SQL1 = "UPDATE		 	".$tabel_utama."
                                  SET				pbanner_pic = '".$handle->file_dst_name."'
                                  WHERE			".$primary_key." = ".$tmp_pbanner_id;
                    $db -> Execute($SQL1);
               }

				insert_log('Add', $judul_halaman , 'Add Popup Banner : '.$data_pbanner_title); 
				$final_message = "Your Popup Banner : ".stripslashes($data_pbanner_title)." has been inserted<br>";
            } else {

				 $SQL = "SELECT      *
                              FROM         ".$tabel_utama."
                              WHERE       ".$primary_key." = ".$data_pbanner_id;
                $RS = $db->Execute($SQL);
                $tmp_pbanner_pic= $RS->fields["pbanner_pic"];
                
                //*** Upload image baru
                if ($_FILES["data_pbanner_pic"]["name"] != "") {
                    //*** hapus file lama jika ada
                    if ($RS->fields["pbanner_pic"] != "") { @unlink($path_file_image.$RS->fields["pbanner_pic"]); } 
                    $handle->file_new_name_body = 'highlight'.$data_pbanner_id;
                    $handle->Process($path_file_image);
                    $tmp_pbanner_pic = $handle->file_dst_name;
                } 
                
                $SQL1 = "UPDATE		 	    ".$tabel_utama."
                              SET			pbanner_date = '".$data_pbanner_date."', 
                                            pbanner_date_end = '".$tmp_data_pbanner_date_end."', 
                                            pbanner_title = '".$db->escape($data_pbanner_title) ."', 
                                            pbanner_title_en = '".$db->escape($data_pbanner_title_en) ."', 
                                            pbanner_shortdesc = '".$db->escape($data_pbanner_shortdesc) ."', 
                                            pbanner_shortdesc_en = '".$db->escape($data_pbanner_shortdesc_en) ."', 
                                            pbanner_url = '".$data_pbanner_url."',
                                            pbanner_pic = '".$tmp_pbanner_pic."',
                                            status = '".$data_pbanner_status."'
                              WHERE			".$primary_key." = ".$data_pbanner_id;
				$db   -> Execute($SQL1);
				
				insert_log('Edit', $judul_halaman , 'Edit Popup Banner : '.$data_pbanner_title); 
				$final_message = "Your Popup Banner : ".stripslashes($data_pbanner_title)." has been updated<br>";
            }
        } else { 
            $data_pbanner_pic = ""; 
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
		   
		 if ($RS->fields["pbanner_id"] != '')
		 {  insert_log('Delete', $judul_halaman , 'Delete Popup Banner : '.$RS->fields["pbanner_title"].', id : '.$RS->fields["pbanner_id"]); 
            if ($RS->fields["pbanner_pic"] != "" ) {  unlink($path_file_image.$RS->fields["pbanner_pic"]);  }
		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "Popup Banner has been deleted<br>";
	}
	

	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'Popup Banner Title');
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
                WHERE 	pbanner_title like '%".$search."%'
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["pbanner_id"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                         FROM			    ".$tabel_utama."
                         WHERE 	        pbanner_title like '%".$search."%'
                         ORDER BY		" . $orderfield . " " . $order . " 	  
                         LIMIT			    " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_pbanner_id[$i] = $RS->fields["pbanner_id"];
                $list_pbanner_date[$i] = date("d-m-Y" , strtotime($RS->fields["pbanner_date"]));
                $list_pbanner_date_end[$i] = date("d-m-Y" , strtotime($RS->fields["pbanner_date_end"]));
                $list_pbanner_title[$i] = stripslashes($RS->fields["pbanner_title"]);
                $list_pbanner_title_en[$i] = stripslashes($RS->fields["pbanner_title_en"]);
                $list_pbanner_pic[$i] = $RS->fields["pbanner_pic"];
                $list_pbanner_url[$i] = $RS->fields["pbanner_url"];
                $list_pbanner_status[$i] = $RS->fields["status"];
                $list_pbanner_priority[$i] = $RS->fields["priority"];
                        
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

				'data_pbanner_id' => $list_pbanner_id,
				'data_pbanner_title' => $list_pbanner_title,
				'data_pbanner_pic' => $list_pbanner_pic,
				'data_pbanner_url' => $list_pbanner_url,
				'data_pbanner_status' => $list_pbanner_status,
				'data_pbanner_priority' => $list_pbanner_priority,
				'data_pbanner_date'	=> $list_pbanner_date,
				'data_pbanner_date_end'	=> $list_pbanner_date_end));
//	  $smarty->assign('path_file_image' , $path_file_image);
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
	  if ((isset($_GET["data_pbanner_id"])) and (ctype_digit($_GET["data_pbanner_id"]))) 
	  {   $data_pbanner_id = $_GET["data_pbanner_id"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_pbanner_id;
            $RS  = $db->Execute($SQL);	   	  
	  	  
            $data_pbanner_id = $RS->fields["pbanner_id"];
            $data_pbanner_title =  stripslashes($RS->fields["pbanner_title"]);
            $data_pbanner_title_en =  stripslashes($RS->fields["pbanner_title_en"]);
            $data_pbanner_shortdesc =  stripslashes($RS->fields["pbanner_shortdesc"]);
            $data_pbanner_shortdesc_en =  stripslashes($RS->fields["pbanner_shortdesc_en"]);
            $data_pbanner_pic = $RS->fields["pbanner_pic"];
            $data_pbanner_url = $RS->fields["pbanner_url"];
            $data_pbanner_status = $RS->fields["status"];
            $data_pbanner_priority = $RS->fields["priority"];
	  	    $data_pbanner_date = date("d-m-Y" , strtotime($RS->fields["pbanner_date"]));
	  	    $data_pbanner_date_end = date("d-m-Y" , strtotime($RS->fields["pbanner_date_end"]));

		    if ($RS->fields["pbanner_id"] == '') $msg = "There is no record in our database";
	  } 
	  
	  if ($data_pbanner_date == '') $data_pbanner_date = date("d-m-Y");
	  
      $optarray = enum("popup_banner.status");
	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_pbanner_id' , $data_pbanner_id);
	  $smarty->assign('data_pbanner_date' , $data_pbanner_date);
	  $smarty->assign('data_pbanner_date_end' , $data_pbanner_date_end);
	  $smarty->assign('data_pbanner_title' , $data_pbanner_title);
	  $smarty->assign('data_pbanner_title_en' , $data_pbanner_title_en);
	  $smarty->assign('data_pbanner_shortdesc' , $data_pbanner_shortdesc);
	  $smarty->assign('data_pbanner_shortdesc_en' , $data_pbanner_shortdesc_en);
	  $smarty->assign('data_pbanner_url' , $data_pbanner_url);
	  $smarty->assign('data_pbanner_status' , $data_pbanner_status);
	  $smarty->assign('data_pbanner_priority' , $data_pbanner_priority);
	  $smarty->assign('data_pbanner_pic' , $data_pbanner_pic);
//	  $smarty->assign('path_file_image' , $path_file_image);
	  $smarty->assign('optarray' , $optarray);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
}
?>