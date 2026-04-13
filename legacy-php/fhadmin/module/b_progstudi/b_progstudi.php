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

$tabel_utama = "b_progstudi";
$primary_key = "progid";
$priority_key = "priority";

$tabel_ukuran = "b_progstudi_ukuran";
$primary_key_ukuran = "ukuranid";

$nama_tpl = "b_progstudi_";
$judul_halaman = "Program Study";
//$path_file_image = "../../../images/progstudi/";
$path_file_image = BASE_DIR_UPLOAD_MODULE."progstudi/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'progstudi/');

//*** Cek Folder dan chmod 777
cek_mod_dir($path_file_image);


//*** Ambil Config Besar Image
$SQL = "SELECT          *
             FROM		".$tabel_ukuran."
             LIMIT		0,1";
$RS = $db->Execute($SQL);
$widthimage = $RS->fields["width"];
$heightimage = $RS->fields["height"];
$widthimage2 = $RS->fields["width2"];
$heightimage2 = $RS->fields["height2"];


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
	  if (!(($orderfield=="progid") || ($orderfield=="progdate") || ($orderfield=="progtitle") || ($orderfield=="priority")|| ($orderfield=="status"))) $orderfield="priority"; 
	}
	if (!(isset($_GET["order"])))  $order="ASC";

	
	$array_levels = array(
	"Undergraduate",
	"Graduate",
	"Karyawan" 
	); 
	$array_interests = array(
	"Economics & Business",
	"Informatics and Information Systems",
	"Law",
	"Psychology",
	"Music",
	"Design",
	"Science and Technology",
	"Engineering",
	"Communication Science and International Relations",
	"Medicine",
	"Health Sciences",
	"Nursing",
	"Hospitality & Tourism",
	"Education" 
	); 
	
	$smarty->assign('array_levels' , $array_levels);
	$smarty->assign('array_interests' , $array_interests);
	
	
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
		if ((isset($_POST["edit"]))) $data_progid = trim($_POST["data_progid"]);
		$data_progdate = $_POST["data_progdate"];
		$data_progtitle = $_POST["data_progtitle"];
		$data_progtitle_en = $_POST["data_progtitle_en"];
		$data_progtujuan = $_POST["data_progtujuan"];
		$data_progtujuan_en = $_POST["data_progtujuan_en"];
		$data_progvisi = $_POST["data_progvisi"];
		$data_progvisi_en = $_POST["data_progvisi_en"];
		$data_progmisi = $_POST["data_progmisi"];
		$data_progmisi_en = $_POST["data_progmisi_en"];
		$data_progurl = $_POST["data_progurl"];
		$data_progpic = $_FILES["data_progpic"];
		$data_progpic2 = $_FILES["data_progpic2"];
        $data_progstatus = $_POST["data_progstatus"];
        $data_progpriority = maxPriority($priority_key,$tabel_utama) + 1;
        
        $data_level = $_POST['data_level'];
        $data_interest = $_POST['data_interest'];
        

        //*** Proses validasi
        if ($data_progdate == "") {$data_progdate = 	date("d-m-Y"); }
		if ($_FILES["data_progpic"]["name"] != "") {
            $handle = new Upload($_FILES["data_progpic"]);
            if ($handle->uploaded) {
                if (!($handle-> file_is_image)) { $msg.= "Invalid image<br>";}
                else {
                    $handle->image_resize = true;
                    if ($widthimage>0) $handle->image_x = $widthimage;
                    if ($heightimage>0) $handle->image_y = $heightimage;
                }
            } 
		}  else {  if ($_POST["insert"]) {$msg .= "Please input Main Logo<br>";}  }
		if ($_FILES["data_progpic2"]["name"] != "") {
            $handle2 = new Upload($_FILES["data_progpic2"]);
            if ($handle2->uploaded) {
                if (!($handle2-> file_is_image)) { $msg.= "Invalid image<br>";}
                else {
                    $handle2->image_resize = true;
                    $handle2->image_x = $widthimage2;
                    $handle2->image_y = $heightimage2;
                }
            } 
		}  else {  if ($_POST["insert"]) {$msg .= "Please input Top Banner<br>";}  }
		if ($data_progtitle == "") { $msg.="Please input Title (ID)<br>"; }
		if ($data_progtitle_en == "") { $msg.="Please input Title (EN)<br>"; }
		if ($data_progtujuan == "") { $msg.="Please input Tujuan (ID)<br>"; }
		if ($data_progtujuan_en == "") { $msg.="Please input Tujuan (EN)<br>"; }
		if ($data_progvisi == "") { $msg.="Please input Visi (ID)<br>"; }
		if ($data_progvisi_en == "") { $msg.="Please input Visi (EN)<br>"; }
		if ($data_progmisi == "") { $msg.="Please input Misi (ID)<br>"; }
		if ($data_progmisi_en == "") { $msg.="Please input Misi (EN)<br>"; }
		if ($data_progmisi_en == "") { $msg.="Please input URL<br>"; }
		if ($data_progpriority == "") { $data_progpriority="1"; }
		else {
            if (!is_numeric($data_progpriority)) $msg .= "Please input Priority in Numeric<br>";
		}
		
			
		//*** Jika tidak ada error
		if ($msg==""){ 
		    $tmp = explode('-', $data_progdate);
		    $data_progdate = $tmp[2]."-".$tmp[1]."-".$tmp[0];

    		if (isset($_POST["insert"])) {
				$SQL1 =  "INSERT INTO 	".$tabel_utama." (progdate, progtitle, progtitle_en, progtujuan, progtujuan_en, progvisi, progvisi_en, progmisi, progmisi_en, progurl, status, priority)
								VALUES			('" . $data_progdate . "' , '" . $db->escape($data_progtitle) . "' , '" . $db->escape($data_progtitle_en) . "', '" . $db->escape($data_progtujuan) . "', '" . $db->escape($data_progtujuan_en) . "', '" . $db->escape($data_progvisi) . "', '" . $db->escape($data_progvisi_en) . "', '" . $db->escape($data_progmisi) . "', '" . $db->escape($data_progmisi_en) . "',  '" . $data_progurl . "','" . $data_progstatus . "', '" . $data_progpriority . "' )";
				$db   -> Execute($SQL1);
				$tmp_progid = $db->Insert_Id();
				
                if ($_FILES["data_progpic"]["name"] != "") {
                    $handle->file_new_name_body = 'progstudilogo'.$tmp_progid;
                    $handle->Process($path_file_image);
                    $SQL1 = "UPDATE		 	".$tabel_utama."
                                  SET		progpic = '".$handle->file_dst_name."'
                                  WHERE		".$primary_key." = ".$tmp_progid;
                    $db -> Execute($SQL1);
				}

                if ($_FILES["data_progpic2"]["name"] != "") {
                    $handle2->file_new_name_body = 'progstudibanner'.$tmp_progid;
                    $handle2->Process($path_file_image);
                    $SQL1 = "UPDATE		 	".$tabel_utama."
                                  SET		progpic2 = '".$handle2->file_dst_name."'
                                  WHERE		".$primary_key." = ".$tmp_progid;
                    $db -> Execute($SQL1);
				}
				 
				foreach($array_levels as $key => $val)
				{
					if(in_array($key, $data_level)) 
					{
						$SQL1 = "UPDATE		 	".$tabel_utama." SET filter_level_".($key+1)." = '1' WHERE ".$primary_key." = ".$tmp_progid;
	                	$db -> Execute($SQL1);
					}
					else
					{
						$SQL1 = "UPDATE		 	".$tabel_utama." SET filter_level_".($key+1)." = '0' WHERE ".$primary_key." = ".$tmp_progid;
	                	$db -> Execute($SQL1);
					}
						
				}
				
				foreach($array_interests as $key => $val)
				{
					if(in_array($key, $data_interest)) 
					{
						$SQL1 = "UPDATE		 	".$tabel_utama." SET filter_interest_".($key+1)." = '1' WHERE ".$primary_key." = ".$tmp_progid;
	                	$db -> Execute($SQL1);
					}
					else
					{
						$SQL1 = "UPDATE		 	".$tabel_utama." SET filter_interest_".($key+1)." = '0' WHERE ".$primary_key." = ".$tmp_progid;
	                	$db -> Execute($SQL1);
					}
						
				}
				
				 

				insert_log('Add', $judul_halaman , 'Add Program Study : '.$data_progtitle); 
				$final_message = "Your Program Study : ".stripslashes($data_progtitle)." has been inserted<br>";
            } else {

				$SQL = "SELECT			*
                              FROM		".$tabel_utama."
                              WHERE		".$primary_key." = ".$data_progid;
                $RS = $db->Execute($SQL);
                $tmp_progpic= $RS->fields["progpic"];
                $tmp_progpic2= $RS->fields["progpic2"];
                
                //*** Upload image baru
                if ($_FILES["data_progpic"]["name"] != "") {
                    //*** hapus file lama jika ada
                    if ($RS->fields["progpic"] != "") { @unlink($path_file_image.$RS->fields["progpic"]); } 
                    $handle->file_new_name_body = 'progstudilogo'.$data_progid;
                    $handle->Process($path_file_image);
                    $tmp_progpic = $handle->file_dst_name;
                } 
                
                if ($_FILES["data_progpic2"]["name"] != "") {
                    //*** hapus file lama jika ada
                    if ($RS->fields["progpic2"] != "") { @unlink($path_file_image.$RS->fields["progpic2"]); } 
                    $handle2->file_new_name_body = 'progstudibanner'.$data_progid;
                    $handle2->Process($path_file_image);
                    $tmp_progpic2 = $handle2->file_dst_name;
                } 
                
                $SQL1 = "UPDATE		 	".$tabel_utama."
                              SET		progdate = '".$data_progdate."', 
										progtitle = '".$db->escape($data_progtitle) ."', 
										progtitle_en = '".$db->escape($data_progtitle_en) ."',
										progtujuan = '".$db->escape($data_progtujuan) ."',
										progtujuan_en = '".$db->escape($data_progtujuan_en) ."',
										progvisi = '".$db->escape($data_progvisi) ."',
										progvisi_en = '".$db->escape($data_progvisi_en) ."',
										progmisi = '".$db->escape($data_progmisi) ."',
										progmisi_en = '".$db->escape($data_progmisi_en) ."',
										progurl = '".$data_progurl."',
										progpic = '".$tmp_progpic."',
										progpic2 = '".$tmp_progpic2."',
										status = '".$data_progstatus."'
                              WHERE		".$primary_key." = ".$data_progid;
				$db   -> Execute($SQL1);
				
				foreach($array_levels as $key => $val)
				{
					if(in_array($key, $data_level)) 
					{
						$SQL1 = "UPDATE		 	".$tabel_utama." SET filter_level_".($key+1)." = '1' WHERE ".$primary_key." = ".$data_progid;
	                	$db -> Execute($SQL1);
					}
					else
					{
						$SQL1 = "UPDATE		 	".$tabel_utama." SET filter_level_".($key+1)." = '0' WHERE ".$primary_key." = ".$data_progid;
	                	$db -> Execute($SQL1);
					}
						
				}
				
				foreach($array_interests as $key => $val)
				{
					if(in_array($key, $data_interest)) 
					{
						$SQL1 = "UPDATE		 	".$tabel_utama." SET filter_interest_".($key+1)." = '1' WHERE ".$primary_key." = ".$data_progid;
	                	$db -> Execute($SQL1);
					}
					else
					{
						 $SQL1 = "UPDATE		 	".$tabel_utama." SET filter_interest_".($key+1)." = '0' WHERE ".$primary_key." = ".$data_progid;
	                	$db -> Execute($SQL1);
					}
						
				}
				
				insert_log('Edit', $judul_halaman , 'Edit Program Study : '.$data_progtitle); 
				$final_message = "Your Program Study : ".stripslashes($data_progtitle)." has been updated<br>";
            }
        } else { 
            $data_progpic = ""; 
            $data_progpic2 = ""; 
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
		   
		 if ($RS->fields["progid"] != '')
		 {  insert_log('Delete', $judul_halaman , 'Delete Program Study : '.$RS->fields["progtitle"].', id : '.$RS->fields["progid"]); 
            if ($RS->fields["progpic"] != "" ) {  @unlink($path_file_image.$RS->fields["progpic"]);  }
            if ($RS->fields["progpic2"] != "" ) {  @unlink($path_file_image.$RS->fields["progpic2"]);  }
		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "Program Study has been deleted<br>";
	}
	

	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'Highlight prog Title');
	$smarty->assign('width' , $widthimage); 
	$smarty->assign('height' , $heightimage);
	$smarty->assign('width2' , $widthimage2);
	$smarty->assign('height2' , $heightimage2);
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
                WHERE 	progtitle like '%".$search."%'
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["progid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                         FROM			    ".$tabel_utama."
                         WHERE 	        progtitle like '%".$search."%'
                         ORDER BY		" . $orderfield . " " . $order . " 	  
                         LIMIT			    " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_progid[$i] = $RS->fields["progid"];
                $list_progdate[$i] = date("d-m-Y" , strtotime($RS->fields["progdate"]));
                $list_progtitle[$i] = stripslashes($RS->fields["progtitle"]);
                $list_progtitle_en[$i] = stripslashes($RS->fields["progtitle_en"]);
                $list_progpic[$i] = $RS->fields["progpic"];
                $list_progurl[$i] = $RS->fields["progurl"];
                $list_progstatus[$i] = $RS->fields["status"];
                $list_progpriority[$i] = $RS->fields["priority"];
                        
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

				'data_progid' => $list_progid,
				'data_progtitle' => $list_progtitle,
				'data_progtitle_en' => $list_progtitle_en,
				'data_progpic' => $list_progpic,
				'data_progurl' => $list_progurl,
				'data_progstatus' => $list_progstatus,
				'data_progpriority' => $list_progpriority,
				'data_progdate'	=> $list_progdate));
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
	  if ((isset($_GET["data_progid"])) and (ctype_digit($_GET["data_progid"]))) 
	  {   $data_progid = $_GET["data_progid"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_progid;
            $RS  = $db->Execute($SQL);	   	  
	  	  
            $data_progid = $RS->fields["progid"];
            $data_progtitle =  stripslashes($RS->fields["progtitle"]);
            $data_progtitle_en =  stripslashes($RS->fields["progtitle_en"]);
            $data_progtujuan =  stripslashes($RS->fields["progtujuan"]);
            $data_progtujuan_en =  stripslashes($RS->fields["progtujuan_en"]);
            $data_progvisi =  stripslashes($RS->fields["progvisi"]);
            $data_progvisi_en =  stripslashes($RS->fields["progvisi_en"]);
            $data_progmisi =  stripslashes($RS->fields["progmisi"]);
            $data_progmisi_en =  stripslashes($RS->fields["progmisi_en"]);
            $data_progpic = $RS->fields["progpic"];
            $data_progpic2 = $RS->fields["progpic2"];
            $data_progurl = $RS->fields["progurl"];
            $data_progstatus = $RS->fields["status"];
            $data_progpriority = $RS->fields["priority"];
	  	    $data_progdate = date("d-m-Y" , strtotime($RS->fields["progdate"]));
          	
	  	    
	  	    foreach($array_levels as $key => $val)
			{
				if($RS->fields["filter_level_".($key+1).""] == 1) 
				{
					$data_level[] = $key;
				}
				 
					
			}
			
			foreach($array_interests as $key => $val)
			{
				if($RS->fields["filter_interest_".($key+1).""] == 1) 
				{
					$data_interest[] = $key;
				} 
			}
				
		    if ($RS->fields["progid"] == '') $msg = "There is no record in our database";
	  } 
	  
	  if ($data_progdate == '') $data_progdate = date("d-m-Y");
	  
      $optarray = enum("b_progstudi.status");
	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_progid' , $data_progid);
	  $smarty->assign('data_progdate' , $data_progdate);
	  $smarty->assign('data_progtitle' , $data_progtitle);
	  $smarty->assign('data_progtitle_en' , $data_progtitle_en);
	  $smarty->assign('data_progtujuan' , $data_progtujuan);
	  $smarty->assign('data_progtujuan_en' , $data_progtujuan_en);
	  $smarty->assign('data_progvisi' , $data_progvisi);
	  $smarty->assign('data_progvisi_en' , $data_progvisi_en);
	  $smarty->assign('data_progmisi' , $data_progmisi);
	  $smarty->assign('data_progmisi_en' , $data_progmisi_en);
	  $smarty->assign('data_progurl' , $data_progurl);
	  $smarty->assign('data_progstatus' , $data_progstatus);
	  $smarty->assign('data_progpriority' , $data_progpriority);
	  $smarty->assign('data_progpic' , $data_progpic);
	  $smarty->assign('data_progpic2' , $data_progpic2);
	  $smarty->assign('optarray' , $optarray);
	  $smarty->assign('data_level' , $data_level);
	  $smarty->assign('data_interest' , $data_interest);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
}
?>