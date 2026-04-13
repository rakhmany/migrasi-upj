<?php
/**************************************************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 1 Februari 2013
  * @copyright by FaberHost.com

  * Tabel Terkait adalah :
  * Tabel latest_event1 dan latest_event1_kataterkait
  * Aplikasi berita dengan sistem berita terkait dan konfigurasi image
  * Terdapat Ratio Resized
  * checked : 8 Maret 2013
 
**************************************************************************/

require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

$tabel_utama = "latest_event1";
$primary_key = "eventid";

$tabel_ukuran = "latest_event1_ukuran";
$primary_key_ukuran = "ukuranid";

$nama_tpl = "latest_event1_";
$judul_halaman = "Latest Event";
//$path_image = "../../../images/event/";
$path_image = BASE_DIR_UPLOAD_MODULE."event/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'event/');
$smarty->assign('path_image' , BASE_URL_UPLOAD_MODULE.'event/');

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

$optarray_status = enum($tabel_utama.".eventstatus");
$smarty->assign('optarray_status' , $optarray_status);

//*** Security ACCESS LEVEL  
$akses_level_page = access_level_page($fh_usergroupid, $db);
if ($fh_userid && $akses_level_page)
{	//*** seting orderfield 
	if (!(isset($_GET["orderfield"])))  $orderfield= $primary_key;
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!(($orderfield=="eventid") || ($orderfield=="eventdate") || ($orderfield=="eventtitle") )) $orderfield=$primary_key; 
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
		if ((isset($_POST["edit"]))) $data_eventid = trim($_POST["data_eventid"]);
		$data_metatag = $_POST["data_metatag"];
		$data_metakeyword = $_POST["data_metakeyword"];
		$data_metadescription = $_POST["data_metadescription"];
		$data_eventdate = $_POST["data_eventdate"];
		$data_eventtitle	= $_POST["data_eventtitle"];
		$data_eventshortdesc	= $_POST["data_eventshortdesc"];
		$data_eventdescription = $_POST["data_eventdescription"];
		$data_eventtitle_en	= $_POST["data_eventtitle_en"];
		$data_eventshortdesc_en	= $_POST["data_eventshortdesc_en"];
		$data_eventdescription_en = $_POST["data_eventdescription_en"];
		$data_eventstatus = $_POST["data_eventstatus"];
		$data_kataterkait = $_POST["data_kataterkait"]; 
        $data_kataterkaitloop = count($data_kataterkait);
        $data_mainimage = $_FILES["data_mainimage"];
        
        //*** validasi
        if ($data_eventdate == "") {$data_eventdate = 	date("d-m-Y"); }
        if ($data_eventtitle == "") { $msg.="Please input event Title (EN)<br>"; }
		if ($data_eventshortdesc == "") { $msg.="Please input Short Description (EN)<br>"; }
		if ($data_eventdescription == "") { $msg.="Please input Description (EN)<br>"; }
        if ($data_eventtitle_en == "") { $msg.="Please input event Title (ID)<br>"; }
		if ($data_eventshortdesc_en == "") { $msg.="Please input Short Description (ID)<br>"; }
		if ($data_eventdescription_en == "") { $msg.="Please input Description (ID)<br>"; }

		if ($_FILES["data_mainimage"]["name"] != "") {
            $handle = new Upload($_FILES["data_mainimage"]);
            $handle2 = new Upload($_FILES["data_mainimage"]);
            if ($handle->uploaded) {
                if (!($handle-> file_is_image)) { $msg.= "Invalid image<br>";}
                else {
                    $handle2->image_resize = true;
                    if ($ratioresized == 'Yes') $handle->image_ratio = true;
                    if ($widthimage>0) $handle2->image_x = $widthimage;
                    if ($heightimage>0) $handle2->image_y = $heightimage;
//                     $handle->image_text = $basic->fields["fh_companyweb"];
//                     $handle->image_text_color = '#FFFFFF';
//                     $handle->image_text_font = 3;
//                     $handle->image_text_background = '#000000';
//                     $handle->image_text_background_opacity  = 70;
//                     $handle->image_text_position = 'BR';
//                     $handle->image_text_padding_x  = 10;
//                     $handle->image_text_padding_y  = 2;
                }
            } 
		}/*   else { 
            if ($_POST["insert"]) {$msg .= "Please input Main Image<br>";} 
		} */
		
		if ($msg==""){ 
		    $tmp = explode('-', $data_eventdate);
		    $data_eventdate = $tmp[2]."-".$tmp[1]."-".$tmp[0];
			
    		if (isset($_POST["insert"])){ 
				$SQL1 =  "INSERT INTO 	".$tabel_utama." (metatag, metakeyword, metadescription, eventdate, eventtitle, eventshortdesc, eventdescription, eventtitle_en, eventshortdesc_en, eventdescription_en, eventstatus)
                               VALUES			('".$db->escape($data_metatag)."','".$db->escape($data_metakeyword)."','".$db->escape($data_metadescription)."','" . $data_eventdate . "', '".$db->escape($data_eventtitle)."', '".$db->escape($data_eventshortdesc)."', '".$db->escape($data_eventdescription)."', '".$db->escape($data_eventtitle_en)."', '".$db->escape($data_eventshortdesc_en)."', '".$db->escape($data_eventdescription_en)."', '".$data_eventstatus."')";
				$db   -> Execute($SQL1);
				$lastid = $db->Insert_ID();

                for($i=0;$i<count($data_kataterkait);$i++){
                    $SQL = "INSERT INTO `latest_event1_kataterkait`  (".$primary_key.", `kataterkait`) 	
                                VALUES ('".$lastid."', '".$db->escape($data_kataterkait[$i])."')";
                    $db   -> Execute($SQL);
                }

				if ($_FILES["data_mainimage"]["name"] != "") {
					//*** Proses Upload IMAGE
					$handle->file_new_name_body = 'img'.$lastid;
	                $handle->Process($path_image);
					$handle2->file_new_name_body = 'thumb_img'.$lastid;
	                $handle2->Process($path_image); 
	                $nama_gambar = $handle->file_dst_name;
	                
	                $SQL1 = "UPDATE		 	".$tabel_utama."
	                              SET				eventmainimage = '".$handle->file_dst_name."'
	                              WHERE			".$primary_key." = ".$lastid;
	                $db -> Execute($SQL1);
	                
	                @unlink($path_image.'crop1600-1200_'.$nama_gambar.'.webp');
	                @unlink($path_image.'crop800-600_'.$nama_gambar.'.webp');
	                @unlink($path_image.'crop600-400_'.$nama_gambar.'.webp');
	                @unlink($path_image.'crop525-250_'.$nama_gambar.'.webp');
	                
	                @unlink($path_image.'crop1600-1200_'.$nama_gambar);
	                @unlink($path_image.'crop800-600_'.$nama_gambar);
	                @unlink($path_image.'crop600-400_'.$nama_gambar);
	                @unlink($path_image.'crop525-250_'.$nama_gambar);
	                
	                
				}
				insert_log('Add', $judul_halaman , 'Add event : '.$data_eventtitle); 
				$final_message = "Your event : ".stripslashes($data_eventtitle)." has been inserted<br>";
				
            } else {
				 $SQL = "SELECT      *
                              FROM         ".$tabel_utama."
                              WHERE       ".$primary_key." = ".$data_eventid;
                $RS = $db->Execute($SQL);
                $tmp_eventmainimage = $RS->fields["eventmainimage"];
                
                //*** Upload image baru
                if ($_FILES["data_mainimage"]["name"] != "") {
                     //*** hapus file lama jika ada
                    if ($RS->fields["eventmainimage"] != "") {
                        @unlink($path_image.$RS->fields["eventmainimage"]);
                        @unlink($path_image.'thumb_'.$RS->fields["eventmainimage"]);
                        @unlink($path_image.'crop1600-1200_'.$RS->fields["eventmainimage"].'.webp');
		                @unlink($path_image.'crop800-600_'.$RS->fields["eventmainimage"].'.webp');
		                @unlink($path_image.'crop600-400_'.$RS->fields["eventmainimage"].'.webp');
		                @unlink($path_image.'crop525-250_'.$RS->fields["eventmainimage"].'.webp');
		                
		                @unlink($path_image.'crop1600-1200_'.$RS->fields["eventmainimage"]);
		                @unlink($path_image.'crop800-600_'.$RS->fields["eventmainimage"]);
		                @unlink($path_image.'crop600-400_'.$RS->fields["eventmainimage"]);
		                @unlink($path_image.'crop525-250_'.$RS->fields["eventmainimage"]);
                
                    } 
                    
                    $handle->file_new_name_body = 'img'.$data_eventid;
                    $handle->Process($path_image);
                    $handle2->file_new_name_body = 'thumb_img'.$data_eventid;
                    $handle2->Process($path_image);
                    $tmp_eventmainimage = $handle->file_dst_name;
                } 
                
                $SQL1 = "UPDATE		 	    ".$tabel_utama."
                              SET			eventdate = '".$data_eventdate."', 
                                            metatag = '".$db->escape($data_metatag)."',
                                            metakeyword = '".$db->escape($data_metakeyword)."',
                                            metadescription = '".$db->escape($data_metadescription)."',
                                            eventtitle = '".$db->escape($data_eventtitle)."', 
                                            eventshortdesc = '".$db->escape($data_eventshortdesc)."', 
                                            eventdescription = '".$db->escape($data_eventdescription)."',
                                            eventtitle_en = '".$db->escape($data_eventtitle_en)."', 
                                            eventshortdesc_en = '".$db->escape($data_eventshortdesc_en)."', 
                                            eventdescription_en = '".$db->escape($data_eventdescription_en)."',
                                            eventmainimage = '".$tmp_eventmainimage."',
                                            eventstatus = '".$data_eventstatus."'
                              WHERE			".$primary_key." = ".$data_eventid;
				$db -> Execute($SQL1);
				
				//*** Kata Terkait
				$SQL1 = "DELETE FROM		latest_event1_kataterkait
                              WHERE			    ".$primary_key." = ".$data_eventid;
                $db->Execute($SQL1);
                
                for($i=0;$i<count($data_kataterkait);$i++){
                    $SQL = "INSERT INTO `latest_event1_kataterkait`  (".$primary_key.", `kataterkait`) 	
                                VALUES ('".$data_eventid."', '".$db->escape($data_kataterkait[$i])."')";
                    $db -> Execute($SQL);
                }
                
				insert_log('Edit', $judul_halaman , 'Edit event : '.$data_eventtitle); 
				$final_message = "Your event : ".stripslashes($data_eventtitle)." has been updated<br>";
            }
            
        } else { if(isset($_POST["insert"])) $action="insert"; else  $action="detail"; }
    }
    
    
    //*** Hapus Image
    if (isset($_POST["delimage"])) {
        $SQL = "SELECT      *
                    FROM         ".$tabel_utama."
                    WHERE       ".$primary_key." = ".$_POST["data_eventid"];
        $RS = $db->Execute($SQL);
        if ($RS->fields["eventmainimage"] != "") {
            @unlink($path_image.$RS->fields["eventmainimage"]);
            @unlink($path_image.'thumb_'.$RS->fields["eventmainimage"]);
            @unlink($path_image.'crop1600-1200_'.$RS->fields["eventmainimage"].'.webp');
            @unlink($path_image.'crop800-600_'.$RS->fields["eventmainimage"].'.webp');
            @unlink($path_image.'crop600-400_'.$RS->fields["eventmainimage"].'.webp');
            @unlink($path_image.'crop525-250_'.$RS->fields["eventmainimage"].'.webp');
            
            @unlink($path_image.'crop1600-1200_'.$RS->fields["eventmainimage"]);
            @unlink($path_image.'crop800-600_'.$RS->fields["eventmainimage"]);
            @unlink($path_image.'crop600-400_'.$RS->fields["eventmainimage"]);
            @unlink($path_image.'crop525-250_'.$RS->fields["eventmainimage"]);
                
        }
		$SQL1 = "UPDATE		 	    ".$tabel_utama."
                        SET			eventmainimage = ''
                      WHERE			".$primary_key." = ".$_POST["data_eventid"];
		$db   -> Execute($SQL1);
        insert_log('Delete', $judul_halaman , 'Delete Image event ID : '.$_POST["data_eventid"]); 
    }


    //*** Proses Delete 
	if (isset($_POST["del"])) 
	{  $delete=$_POST["delete"];
       for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 		*
                      FROM			".$tabel_utama."
                      WHERE		".$primary_key." = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["eventid"] != '')
		 {  insert_log('Delete', $judul_halaman , 'Delete event : '.$RS->fields["eventtitle"].', id : '.$RS->fields["eventid"]); 
            if ($RS->fields["eventmainimage"] != "") {
                @unlink($path_image.$RS->fields["eventmainimage"]);
                @unlink($path_image.'thumb_'.$RS->fields["eventmainimage"]);
                @unlink($path_image.'crop1600-1200_'.$RS->fields["eventmainimage"].'.webp');
                @unlink($path_image.'crop800-600_'.$RS->fields["eventmainimage"].'.webp');
                @unlink($path_image.'crop600-400_'.$RS->fields["eventmainimage"].'.webp');
                @unlink($path_image.'crop525-250_'.$RS->fields["eventmainimage"].'.webp');
                
                @unlink($path_image.'crop1600-1200_'.$RS->fields["eventmainimage"]);
                @unlink($path_image.'crop800-600_'.$RS->fields["eventmainimage"]);
                @unlink($path_image.'crop600-400_'.$RS->fields["eventmainimage"]);
                @unlink($path_image.'crop525-250_'.$RS->fields["eventmainimage"]);
            }

		    $SQL1 = "DELETE FROM		latest_event1_kataterkait
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);

		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "event has been deleted<br>";
	}
	
	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'Event');
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
	if ($search1 != "") $tmp_sql .= " AND eventstatus='".$search1."'";

    $SQL = "SELECT 	*
                FROM		".$tabel_utama."
                WHERE 	(eventtitle like '%".$search."%'
                                   OR eventshortdesc like '%".$search."%'
                                   OR eventdescription like '%".$search."%'
								   OR eventtitle_en like '%".$search."%'
                                   OR eventshortdesc_en like '%".$search."%'
                                   OR eventdescription_en like '%".$search."%')
                                   ".$tmp_sql."
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["eventid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search."&search1=".$search1;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			 $SQL = "SELECT  P.* ,   GROUP_CONCAT(C.kataterkait SEPARATOR '<br />') as kataterkait_list
                         FROM			    ".$tabel_utama." P
                         LEFT JOIN latest_event1_kataterkait C ON P.eventid = C.eventid
                         WHERE 	        (P.eventtitle like '%".$search."%'
                                                            OR P.eventshortdesc like '%".$search."%'
                                                            OR P.eventdescription like '%".$search."%'
															OR P.eventtitle_en like '%".$search."%'
                                                            OR P.eventshortdesc_en like '%".$search."%'
                                                            OR P.eventdescription_en like '%".$search."%')
                                                            ".$tmp_sql."
                         GROUP BY P.eventid  ORDER BY		P." . $orderfield . " " . $order . " 	  
                         LIMIT			    " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_eventid[$i] = $RS->fields["eventid"];
                $list_eventtitle[$i] = stripslashes($RS->fields["eventtitle"]);
                $list_eventmainimage[$i] = $RS->fields["eventmainimage"];
                $list_eventdate[$i] = date("d-m-Y" , strtotime($RS->fields["eventdate"]));
                $list_eventstatus[$i] = $RS->fields["eventstatus"];
                $list_kataterkait_list[$i] = $RS->fields["kataterkait_list"];
                        
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

				'data_eventid' => $list_eventid,
				'data_eventtitle' => $list_eventtitle,
				'data_eventmainimage' => $list_eventmainimage,
				'data_eventstatus' => $list_eventstatus,
				'list_kataterkait_list' => $list_kataterkait_list,
				'data_eventdate'	=> $list_eventdate));
//	  $smarty->assign('path_file_image' , $path_image);
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
	  if ((isset($_GET["data_eventid"])) and (ctype_digit($_GET["data_eventid"]))) 
	  {   $data_eventid = $_GET["data_eventid"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key." = ".$data_eventid;
            $RS  = $db->Execute($SQL);	   	  
	  	  
		    if ($RS->fields["eventid"] == '') $msg = "There is no record in our database";
            else {
                //** Ambil semua inputan user **/
                $data_eventid = $RS->fields["eventid"];
                $data_metatag =  stripslashes($RS->fields["metatag"]);
                $data_metakeyword =  stripslashes($RS->fields["metakeyword"]);
                $data_metadescription =  stripslashes($RS->fields["metadescription"]);
                $data_eventtitle =  stripslashes($RS->fields["eventtitle"]);
                $data_eventshortdesc = stripslashes($RS->fields["eventshortdesc"]);
                $data_eventdescription = stripslashes($RS->fields["eventdescription"]);
                $data_eventtitle_en =  stripslashes($RS->fields["eventtitle_en"]);
                $data_eventshortdesc_en = stripslashes($RS->fields["eventshortdesc_en"]);
                $data_eventdescription_en = stripslashes($RS->fields["eventdescription_en"]);
                $data_eventdate = date("d-m-Y" , strtotime($RS->fields["eventdate"]));
                $data_eventmainimage = $RS->fields["eventmainimage"];
                $data_eventstatus = $RS->fields["eventstatus"];

                $SQL = "SELECT      *
                             FROM         latest_event1_kataterkait
                             WHERE       ".$primary_key." = '".$RS->fields["eventid"]."'";
                $RS2 = $db->Execute($SQL);
                $i = 0;
                while (!$RS2->EOF) {
                        $data_kataterkait[$i] = stripslashes($RS2->fields["kataterkait"]);
                        $i++;
                        $RS2->MoveNext();
                }
                $data_kataterkaitloop = $i;
            }
	  } 

	  if ($data_eventdate == '') $data_eventdate = date("d-m-Y");
	  if ($data_kataterkaitloop == "") $data_kataterkaitloop=0;
	  $smarty->assign('data_kataterkaitloop' , $data_kataterkaitloop);
	  $smarty->assign('data_kataterkait' , $data_kataterkait);

	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_eventid' , $data_eventid);
	  $smarty->assign('data_metatag' , $data_metatag);
	  $smarty->assign('data_metakeyword' , $data_metakeyword);
	  $smarty->assign('data_metadescription' , $data_metadescription);
	  $smarty->assign('data_eventtitle' , $data_eventtitle);
	  $smarty->assign('data_eventshortdesc' , $data_eventshortdesc);
	  $smarty->assign('data_eventdescription' , $data_eventdescription);
	  $smarty->assign('data_eventtitle_en' , $data_eventtitle_en);
	  $smarty->assign('data_eventshortdesc_en' , $data_eventshortdesc_en);
	  $smarty->assign('data_eventdescription_en' , $data_eventdescription_en);
	  $smarty->assign('data_eventdate' , $data_eventdate);
	  $smarty->assign('data_eventstatus' , $data_eventstatus);
	  $smarty->assign('data_eventmainimage' , $data_eventmainimage);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
}
?>