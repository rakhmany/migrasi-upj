<?php
/**************************************************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 1 Februari 2013
  * @copyright by FaberHost.com

  * Tabel Terkait adalah :
  * Tabel Latest_highlights dan Latest_highlights_kataterkait
  * Aplikasi berita dengan sistem berita terkait dan konfigurasi image
  * Terdapat Ratio Resized
  * checked : 8 Maret 2013
 
**************************************************************************/

require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

$tabel_utama = "latest_highlights";
$primary_key = "newsid";

$tabel_ukuran = "latest_highlights_ukuran";
$primary_key_ukuran = "ukuranid";

$nama_tpl = "latest_highlights_";
$judul_halaman = "Latest Highlights";
//$path_image = "../../../images/news/";
$path_image = BASE_DIR_UPLOAD_MODULE."highlights/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'highlights/');
$smarty->assign('path_image' , BASE_URL_UPLOAD_MODULE.'highlights/');

cek_mod_dir($path_image);

//*** Ambil Config Resized Image
$SQL = "SELECT          *
             FROM            ".$tabel_ukuran."
             LIMIT             0,1";
$RS = $db->Execute($SQL);
$widthimage = $RS->fields["width"];
$heightimage = $RS->fields["height"];
$ratioresized= $RS->fields["ratioresized"];

$optarray_ratioresized = enum($tabel_ukuran.".ratioresized");
$smarty->assign('optarray_ratioresized' , $optarray_ratioresized);

$optarray_status = enum($tabel_utama.".newsstatus");
$smarty->assign('optarray_status' , $optarray_status);

//*** Security ACCESS LEVEL  
$akses_level_page = access_level_page($fh_usergroupid, $db);
if ($fh_userid && $akses_level_page)
{	//*** seting orderfield 
	if (!(isset($_GET["orderfield"])))  $orderfield= $primary_key;
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!(($orderfield=="newsid") || ($orderfield=="newsdate") || ($orderfield=="newstitle") )) $orderfield=$primary_key; 
	}
	$teks_parameter = "";

	//*** Seting Konstanta Resize Image
	if ($_POST["setwidth"]) {
        $widthimage_temp = $_POST["width"];
        $heightimage_temp = $_POST["height"];
        $ratioresized_temp = $_POST["ratioresized"];
        if ((ctype_digit($widthimage_temp)) && (ctype_digit($heightimage_temp))) {
            $SQL = "UPDATE      ".$tabel_ukuran."
                        SET             width = '".$widthimage_temp."',
                                           height = '".$heightimage_temp."',
                                           ratioresized = '".$ratioresized_temp."'";
            $db->Execute($SQL);
            //*** Copy variabel nya ke konstanta
            $widthimage = $widthimage_temp;
            $heightimage = $heightimage_temp;
            $ratioresized = $ratioresized_temp;
            $final_message = "Your Resize Variable has been updated : width = ".$widthimage." and height = ".$heightimage." and Ratio = '".$ratioresized."'<br>";
            insert_log('Edit', $judul_halaman , 'Edit Resize Variable : Width = '.$widthimage.' And Height = '.$heightimage.' And Ratio = '.$ratioresized); 
        } else { $final_message = "Please input your valid variable<br>"; }
	}



    //*** Inset dan Edit
	if ( (isset($_POST["insert"])) || (isset($_POST["edit"])) ) { 
		if ((isset($_POST["edit"]))) $data_newsid = trim($_POST["data_newsid"]);
		$data_metatag = $_POST["data_metatag"];
		$data_metakeyword = $_POST["data_metakeyword"];
		$data_metadescription = $_POST["data_metadescription"];
		$data_newsdate = $_POST["data_newsdate"];
		$data_newstitle	= $_POST["data_newstitle"];
		$data_newsshortdesc	= $_POST["data_newsshortdesc"];
		$data_newsdescription = $_POST["data_newsdescription"];
		$data_newstitle_en	= $_POST["data_newstitle_en"];
		$data_newsshortdesc_en	= $_POST["data_newsshortdesc_en"];
		$data_newsdescription_en = $_POST["data_newsdescription_en"];
		$data_newsstatus = $_POST["data_newsstatus"];
		$data_kataterkait = $_POST["data_kataterkait"]; 
        $data_kataterkaitloop = count($data_kataterkait);
        $data_mainimage = $_FILES["data_mainimage"];
        
        //*** validasi
        if ($data_newsdate == "") {$data_newsdate = 	date("d-m-Y"); }
        if ($data_newstitle == "") { $msg.="Please input News Title (EN)<br>"; }
		if ($data_newsshortdesc == "") { $msg.="Please input Short Description (EN)<br>"; }
		if ($data_newsdescription == "") { $msg.="Please input Description (EN)<br>"; }
        if ($data_newstitle_en == "") { $msg.="Please input News Title (ID)<br>"; }
		if ($data_newsshortdesc_en == "") { $msg.="Please input Short Description (ID)<br>"; }
		if ($data_newsdescription_en == "") { $msg.="Please input Description (ID)<br>"; }

		if ($_FILES["data_mainimage"]["name"] != "") {
            $handle = new Upload($_FILES["data_mainimage"]);
            if ($handle->uploaded) {
                if (!($handle-> file_is_image)) { $msg.= "Invalid image<br>";}
                else {
                    $handle->image_resize = true;
                    if ($ratioresized == 'Yes') $handle->image_ratio = true;
                    if ($widthimage>0) $handle->image_x = $widthimage;
                    if ($heightimage>0) $handle->image_y = $heightimage;
                    $handle->image_text = $basic->fields["fh_companyweb"];
                    $handle->image_text_color = '#FFFFFF';
                    $handle->image_text_font = 3;
                    $handle->image_text_background = '#000000';
                    $handle->image_text_background_opacity  = 70;
                    $handle->image_text_position = 'BR';
                    $handle->image_text_padding_x  = 10;
                    $handle->image_text_padding_y  = 2;
                }
            } 
		}/*   else { 
            if ($_POST["insert"]) {$msg .= "Please input Main Image<br>";} 
		} */
		
		if ($msg==""){ 
		    $tmp = explode('-', $data_newsdate);
		    $data_newsdate = $tmp[2]."-".$tmp[1]."-".$tmp[0];
			
    		if (isset($_POST["insert"])){ 
				$SQL1 =  "INSERT INTO 	".$tabel_utama." (metatag, metakeyword, metadescription, newsdate, newstitle, newsshortdesc, newsdescription, newstitle_en, newsshortdesc_en, newsdescription_en, newsstatus)
                               VALUES			('".$db->escape($data_metatag)."','".$db->escape($data_metakeyword)."','".$db->escape($data_metadescription)."','" . $data_newsdate . "', '".$db->escape($data_newstitle)."', '".$db->escape($data_newsshortdesc)."', '".$db->escape($data_newsdescription)."', '".$db->escape($data_newstitle_en)."', '".$db->escape($data_newsshortdesc_en)."', '".$db->escape($data_newsdescription_en)."', '".$data_newsstatus."')";
				$db   -> Execute($SQL1);
				$lastid = $db->Insert_ID();

                for($i=0;$i<count($data_kataterkait);$i++){
                    $SQL = "INSERT INTO `latest_highlights_kataterkait`  (".$primary_key.", `kataterkait`) 	
                                VALUES ('".$lastid."', '".$data_kataterkait[$i]."')";
                    $db   -> Execute($SQL);
                }

				if ($_FILES["data_mainimage"]["name"] != "") {
				//*** Proses Upload IMAGE
				$handle->file_new_name_body = 'img'.$lastid;
                $handle->Process($path_image);
                $SQL1 = "UPDATE		 	".$tabel_utama."
                              SET				newsmainimage = '".$handle->file_dst_name."'
                              WHERE			".$primary_key." = ".$lastid;
                $db -> Execute($SQL1);
				}
				insert_log('Add', $judul_halaman , 'Add News : '.$data_newstitle); 
				$final_message = "Your News : ".stripslashes($data_newstitle)." has been inserted<br>";
				
            } else {
				 $SQL = "SELECT      *
                              FROM         ".$tabel_utama."
                              WHERE       ".$primary_key." = ".$data_newsid;
                $RS = $db->Execute($SQL);
                $tmp_newsmainimage = $RS->fields["newsmainimage"];
                
                //*** Upload image baru
                if ($_FILES["data_mainimage"]["name"] != "") {
                     //*** hapus file lama jika ada
                    if ($RS->fields["newsmainimage"] != "") {
                        @unlink($path_image.$RS->fields["newsmainimage"]);
                    } 
                    
                    $handle->file_new_name_body = 'img'.$data_newsid;
                    $handle->Process($path_image);
                    $tmp_newsmainimage = $handle->file_dst_name;
                } 
                
                $SQL1 = "UPDATE		 	    ".$tabel_utama."
                              SET			newsdate = '".$data_newsdate."', 
                                            metatag = '".$db->escape($data_metatag)."',
                                            metakeyword = '".$db->escape($data_metakeyword)."',
                                            metadescription = '".$db->escape($data_metadescription)."',
                                            newstitle = '".$db->escape($data_newstitle)."', 
                                            newsshortdesc = '".$db->escape($data_newsshortdesc)."', 
                                            newsdescription = '".$db->escape($data_newsdescription)."',
                                            newstitle_en = '".$db->escape($data_newstitle_en)."', 
                                            newsshortdesc_en = '".$db->escape($data_newsshortdesc_en)."', 
                                            newsdescription_en = '".$db->escape($data_newsdescription_en)."',
                                            newsmainimage = '".$tmp_newsmainimage."',
                                            newsstatus = '".$data_newsstatus."'
                              WHERE			".$primary_key." = ".$data_newsid;
				$db -> Execute($SQL1);
				
				//*** Kata Terkait
				$SQL1 = "DELETE FROM		latest_highlights_kataterkait
                              WHERE			    ".$primary_key." = ".$data_newsid;
                $db->Execute($SQL1);
                
                for($i=0;$i<count($data_kataterkait);$i++){
                    $SQL = "INSERT INTO `latest_highlights_kataterkait`  (".$primary_key.", `kataterkait`) 	
                                VALUES ('".$data_newsid."', '".$data_kataterkait[$i]."')";
                    $db -> Execute($SQL);
                }
                
				insert_log('Edit', $judul_halaman , 'Edit News : '.$data_newstitle); 
				$final_message = "Your News : ".stripslashes($data_newstitle)." has been updated<br>";
            }
            
        } else { if(isset($_POST["insert"])) $action="insert"; else  $action="detail"; }
    }
    
    
    //*** Hapus Image
    if (isset($_POST["delimage"])) {
        $SQL = "SELECT      *
                    FROM         ".$tabel_utama."
                    WHERE       ".$primary_key." = ".$_POST["data_newsid"];
        $RS = $db->Execute($SQL);
        if ($RS->fields["newsmainimage"] != "") {
            @unlink($path_image.$RS->fields["newsmainimage"]);
        }
		$SQL1 = "UPDATE		 	".$tabel_utama."
                      SET				newsmainimage = ''
                      WHERE			".$primary_key." = ".$_POST["data_newsid"];
		$db   -> Execute($SQL1);
        insert_log('Delete', $judul_halaman , 'Delete Image News ID : '.$_POST["data_newsid"]); 
    }


    //*** Proses Delete 
	if (isset($_POST["del"])) 
	{  $delete=$_POST["delete"];
       for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 		*
                      FROM			".$tabel_utama."
                      WHERE		".$primary_key." = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["newsid"] != '')
		 {  insert_log('Delete', $judul_halaman , 'Delete News : '.$RS->fields["newstitle"].', id : '.$RS->fields["newsid"]); 
            if ($RS->fields["newsmainimage"] != "") {
                @unlink($path_image.$RS->fields["newsmainimage"]);
            }

		    $SQL1 = "DELETE FROM		latest_highlights_kataterkait
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);

		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "News has been deleted<br>";
	}
	
	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'News');
	$smarty->assign('search' ,$search); 
	$smarty->assign('search1' ,$search1); 
	$smarty->assign('width' , $widthimage); 
	$smarty->assign('height' , $heightimage); 
	$smarty->assign('ratioresized' , $ratioresized); 
	// $smarty->display($nama_tpl.'header.tpl');
	

	//*** MAIN CODE 
	switch ($action) {
	case "view" :
	$tmp_sql = "";
	if ($search1 != "") $tmp_sql .= " AND newsstatus='".$search1."'";

    $SQL = "SELECT 	*
                FROM		".$tabel_utama."
                WHERE 	(newstitle like '%".$search."%'
                                   OR newsshortdesc like '%".$search."%'
                                   OR newsdescription like '%".$search."%'
								   OR newstitle_en like '%".$search."%'
                                   OR newsshortdesc_en like '%".$search."%'
                                   OR newsdescription_en like '%".$search."%')
                                   ".$tmp_sql."
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["newsid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search."&search1=".$search1;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                         FROM			    ".$tabel_utama."
                         WHERE 	        (newstitle like '%".$search."%'
                                                            OR newsshortdesc like '%".$search."%'
                                                            OR newsdescription like '%".$search."%'
															OR newstitle_en like '%".$search."%'
                                                            OR newsshortdesc_en like '%".$search."%'
                                                            OR newsdescription_en like '%".$search."%')
                                                            ".$tmp_sql."
                         ORDER BY		" . $orderfield . " " . $order . " 	  
                         LIMIT			    " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_newsid[$i] = $RS->fields["newsid"];
                $list_newstitle[$i] = stripslashes($RS->fields["newstitle"]);
                $list_newsmainimage[$i] = $RS->fields["newsmainimage"];
                $list_newsdate[$i] = date("d-m-Y" , strtotime($RS->fields["newsdate"]));
                $list_newsstatus[$i] = $RS->fields["newsstatus"];
                        
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
	  	        'search1'  => $search1,
	  	        'action' => $action,
	  	        'pagination' => $pagination,

				'data_newsid' => $list_newsid,
				'data_newstitle' => $list_newstitle,
				'data_newsmainimage' => $list_newsmainimage,
				'data_newsstatus' => $list_newsstatus,
				'data_newsdate'	=> $list_newsdate));
//	  $smarty->assign('path_file_image' , $path_image);
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
	  if ((isset($_GET["data_newsid"])) and (ctype_digit($_GET["data_newsid"]))) 
	  {   $data_newsid = $_GET["data_newsid"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key." = ".$data_newsid;
            $RS  = $db->Execute($SQL);	   	  
	  	  
		    if ($RS->fields["newsid"] == '') $msg = "There is no record in our database";
            else {
                //** Ambil semua inputan user **/
                $data_newsid = $RS->fields["newsid"];
                $data_metatag =  stripslashes($RS->fields["metatag"]);
                $data_metakeyword =  stripslashes($RS->fields["metakeyword"]);
                $data_metadescription =  stripslashes($RS->fields["metadescription"]);
                $data_newstitle =  stripslashes($RS->fields["newstitle"]);
                $data_newsshortdesc = stripslashes($RS->fields["newsshortdesc"]);
                $data_newsdescription = stripslashes($RS->fields["newsdescription"]);
                $data_newstitle_en =  stripslashes($RS->fields["newstitle_en"]);
                $data_newsshortdesc_en = stripslashes($RS->fields["newsshortdesc_en"]);
                $data_newsdescription_en = stripslashes($RS->fields["newsdescription_en"]);
                $data_newsdate = date("d-m-Y" , strtotime($RS->fields["newsdate"]));
                $data_newsmainimage = $RS->fields["newsmainimage"];
                $data_newsstatus = $RS->fields["newsstatus"];

                $SQL = "SELECT      *
                             FROM         latest_highlights_kataterkait
                             WHERE       ".$primary_key." = '".$RS->fields["newsid"]."'";
                $RS2 = $db->Execute($SQL);
                $i = 0;
                while (!$RS2->EOF) {
                        $data_kataterkait[$i] = $RS2->fields["kataterkait"];
                        $i++;
                        $RS2->MoveNext();
                }
                $data_kataterkaitloop = $i;
            }
	  } 

	  if ($data_newsdate == '') $data_newsdate = date("d-m-Y");
	  if ($data_kataterkaitloop == "") $data_kataterkaitloop=0;
	  $smarty->assign('data_kataterkaitloop' , $data_kataterkaitloop);
	  $smarty->assign('data_kataterkait' , $data_kataterkait);

	  $smarty->assign('msg' , $msg);
//	  $smarty->assign('path_image' , $path_image);
	  $smarty->assign('data_newsid' , $data_newsid);
	  $smarty->assign('data_metatag' , $data_metatag);
	  $smarty->assign('data_metakeyword' , $data_metakeyword);
	  $smarty->assign('data_metadescription' , $data_metadescription);
	  $smarty->assign('data_newstitle' , $data_newstitle);
	  $smarty->assign('data_newsshortdesc' , $data_newsshortdesc);
	  $smarty->assign('data_newsdescription' , $data_newsdescription);
	  $smarty->assign('data_newstitle_en' , $data_newstitle_en);
	  $smarty->assign('data_newsshortdesc_en' , $data_newsshortdesc_en);
	  $smarty->assign('data_newsdescription_en' , $data_newsdescription_en);
	  $smarty->assign('data_newsdate' , $data_newsdate);
	  $smarty->assign('data_newsstatus' , $data_newsstatus);
	  $smarty->assign('data_newsmainimage' , $data_newsmainimage);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
}
?>