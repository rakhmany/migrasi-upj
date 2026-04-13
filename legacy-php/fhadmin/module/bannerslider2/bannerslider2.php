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

$tabel_utama = "bannerslider2";
$primary_key = "newsid";
$priority_key = "priority";

$tabel_ukuran = "bannerslider2_ukuran";
$primary_key_ukuran = "ukuranid";

$nama_tpl = "bannerslider2_";
$judul_halaman = "Banner Slider";
//$path_file_image = "../../../images/bannerslider2/";
$path_file_image = BASE_DIR_UPLOAD_MODULE."bannerslider2/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'bannerslider2/');

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
	  if (!(($orderfield=="newsid") || ($orderfield=="newsdate") || ($orderfield=="newstitle") || ($orderfield=="priority")|| ($orderfield=="status"))) $orderfield="priority"; 
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
		if ((isset($_POST["edit"]))) $data_newsid = trim($_POST["data_newsid"]);
		$data_newsdate = $_POST["data_newsdate"];
		$data_newstitle = $_POST["data_newstitle"];
		$data_newstitle_en = $_POST["data_newstitle_en"];
		$data_newsshortdesc = $_POST["data_newsshortdesc"];
		$data_newsshortdesc_en = $_POST["data_newsshortdesc_en"];
		$data_newsurl = $_POST["data_newsurl"];
		$data_newsbg = $_FILES["data_newsbg"];
		$data_newspic = $_FILES["data_newspic"];
        $data_newsstatus = $_POST["data_newsstatus"];
        $data_newspriority = maxPriority($priority_key,$tabel_utama) + 1;
		
        $data_toptitle = $_POST["data_toptitle"];
        $data_bottomtext = $_POST["data_bottomtext"];
        $data_bottomlinks = $_POST["data_bottomlinks"];

        //*** Proses validasi
        if ($data_toptitle == "") {$data_toptitle = "10"; }
        if ($data_bottomtext == "") {$data_bottomtext = "24"; }
        if ($data_bottomlinks == "") {$data_bottomlinks = "10"; }
		
        if ($data_newsdate == "") {$data_newsdate = 	date("d-m-Y"); }
		if ($_FILES["data_newsbg"]["name"] != "") {
            $handlex = new Upload($_FILES["data_newsbg"]);
            if ($handlex->uploaded) {
                if (!($handlex-> file_is_image)) { $msg.= "Invalid background image<br>"; }
                else {
                    $handlex->image_resize = true;
//                    $handlex->image_x = 1140;
//                    $handlex->image_y = 387;
                     if ($widthimage>0) $handlex->image_x = $widthimage;
                     if ($heightimage>0) $handlex->image_y = $heightimage;
                }
            } 
		}  else {  if ($_POST["insert"]) {$msg .= "Please input Slider Image<br>";}  }
		
		if ($_FILES["data_newspic"]["name"] != "") {
            $handle = new Upload($_FILES["data_newspic"]);
            if ($handle->uploaded) {
                if (!($handle-> file_is_image)) { $msg.= "Invalid Main image<br>";}
                else {
                    // $handle->image_resize = true;
                    // if ($widthimage>0) $handle->image_x = $widthimage;
                    // if ($heightimage>0) $handle->image_y = $heightimage;
                }
            }
		}  /*else {  if ($_POST["insert"]) {$msg .= "Please input Main Image<br>";}  }*/
		
		if ($data_newstitle == "") { $msg.="Please input News Title<br>"; }
		if ($data_newstitle_en == "") { $msg.="Please input News Title (EN)<br>"; }
		if ($data_newspriority == "") { $data_newspriority="1"; }
		else {
            if (!is_numeric($data_newspriority)) $msg .= "Please input Priority in Numeric<br>";
		}
			
		//*** Jika tidak ada error
		if ($msg==""){
		    $db->debug=1;
		    $tmp = explode('-', $data_newsdate);
		    $data_newsdate = $tmp[2]."-".$tmp[1]."-".$tmp[0];

    		if (isset($_POST["insert"])){ 
				$SQL1 =  "INSERT INTO 	".$tabel_utama." (newsdate, newstitle, newstitle_en, newsshortdesc, newsshortdesc_en, newsurl, status, priority, toptitle, bottomtext, bottomlinks)
                               VALUES			('" . $data_newsdate . "' , '" . $db->escape($data_newstitle) . "' , '" . $db->escape($data_newstitle_en) . "', '" . $db->escape($data_newsshortdesc) . "', '" . $db->escape($data_newsshortdesc_en) . "',  '" . $data_newsurl . "','" . $data_newsstatus . "', '" . $data_newspriority . "', '" . $db->escape($data_toptitle) . "', '" . $db->escape($data_bottomtext) . "', '" . $data_bottomlinks . "' )";
		  //      var_dump($SQL1);
		  //      echo '<br>';
		  //      var_dump($this->db->Execute($SQL1));
		  //      die;
		        
				$db->Execute($SQL1);
				$tmp_newsid = $db->Insert_Id();
				
                if ($_FILES["data_newsbg"]["name"] != "") {
                    $handlex->file_new_name_body = 'highlight_bg_'.$tmp_newsid;
                    $handlex->Process($path_file_image);
                    $SQL1 = "UPDATE			".$tabel_utama."
                                  SET		newsbg = '".$handlex->file_dst_name."'
                                  WHERE		".$primary_key." = ".$tmp_newsid;
                    $db -> Execute($SQL1);
				}
				
                if ($_FILES["data_newspic"]["name"] != "") {
                    $handle->file_new_name_body = 'highlight'.$tmp_newsid;
                    $handle->Process($path_file_image);
                    $SQL1 = "UPDATE			".$tabel_utama."
                                  SET		newspic = '".$handle->file_dst_name."'
                                  WHERE		".$primary_key." = ".$tmp_newsid;
                    $db -> Execute($SQL1);
                   
				}

				insert_log('Add', $judul_halaman , 'Add Banner Slider : '.$data_newstitle); 
				$final_message = "Your Banner Slider : ".stripslashes($data_newstitle)." has been inserted<br>";
            } else {

				 $SQL = "SELECT			*
                              FROM		".$tabel_utama."
                              WHERE		".$primary_key." = ".$data_newsid;
                              
        //       var_dump($SQL);
		      //  echo '<br>';
		      //  var_dump($this->db->Execute($SQL));
		      //  die;
                
                $RS = $db->Execute($SQL);
                $tmp_newspic= $RS->fields["newspic"];
                $tmp_newsbg= $RS->fields["newsbg"];
                
                if ($_FILES["data_newsbg"]["name"] != "") {
                    //*** hapus file lama jika ada
                    if ($RS->fields["newsbg"] != "") { @unlink($path_file_image.$RS->fields["newsbg"]); } 
                    $handlex->file_new_name_body = 'highlight_bg_'.$data_newsid;
                    $handlex->Process($path_file_image);
                    $tmp_newsbg = $handlex->file_dst_name;
                } 
                
                //*** Upload image baru
                if ($_FILES["data_newspic"]["name"] != "") {
                    //*** hapus file lama jika ada
                    if ($RS->fields["newspic"] != "") { @unlink($path_file_image.$RS->fields["newspic"]); } 
                    $handle->file_new_name_body = 'highlight'.$data_newsid;
                    $handle->Process($path_file_image);
                    $tmp_newspic = $handle->file_dst_name;
                } 
                
                $SQL1 = "UPDATE		 	".$tabel_utama."
                              SET		newsdate = '".$data_newsdate."', 
										newstitle = '".$db->escape($data_newstitle) ."', 
										newstitle_en = '".$db->escape($data_newstitle_en) ."', 
										newsshortdesc = '".$db->escape($data_newsshortdesc) ."', 
										newsshortdesc_en = '".$db->escape($data_newsshortdesc_en) ."', 
										newsurl = '".$data_newsurl."',
										newspic = '".$tmp_newspic."',
										newsbg = '".$tmp_newsbg."',
										status = '".$data_newsstatus."',
										toptitle = '".$db->escape($data_toptitle)."',
										bottomtext = '".$db->escape($data_bottomtext)."',
										bottomlinks = '".$data_bottomlinks."'
                              WHERE			".$primary_key." = ".$data_newsid;
				$db->Execute($SQL1);
				
				
				
				insert_log('Edit', $judul_halaman , 'Edit Banner Slider : '.$data_newstitle); 
				$final_message = "Your Banner Slider : ".stripslashes($data_newstitle)." has been updated<br>";
            }
        } else { 
            $data_newspic = ""; 
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
		   
		 if ($RS->fields["newsid"] != '')
		 {  insert_log('Delete', $judul_halaman , 'Delete Banner Slider : '.$RS->fields["newstitle"].', id : '.$RS->fields["newsid"]); 
            if ($RS->fields["newspic"] != "" ) {  unlink($path_file_image.$RS->fields["newspic"]);  }
            if ($RS->fields["newsbg"] != "" ) {  unlink($path_file_image.$RS->fields["newsbg"]);  }
		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "Banner Slider has been deleted<br>";
	}
	

	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'Banner Slider Title');
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
//	    $db->debug=1;
    $SQL = "SELECT 	*
                FROM		".$tabel_utama."
                WHERE 	newstitle like '%".$search."%'
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);

	  
	  if ($RS->fields["newsid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;
   	  	
   	  	if ($page != 0 ) {

			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			    *
                         FROM			".$tabel_utama."
                         WHERE 	        newstitle like '%".$search."%'
                         ORDER BY		" . $orderfield . " " . $order . " 	  
                         LIMIT			    " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
//                print_r($RS->fields);
                $list_newsid[$i] = $RS->fields["newsid"];
                $list_newsdate[$i] = date("d-m-Y" , strtotime($RS->fields["newsdate"]));
                $list_newstitle[$i] = stripslashes($RS->fields["newstitle"]);
                $list_newstitle_en[$i] = stripslashes($RS->fields["newstitle_en"]);
                $list_newspic[$i] = $RS->fields["newspic"];
                $list_newsbg[$i] = $RS->fields["newsbg"];
                $list_newsurl[$i] = $RS->fields["newsurl"];
                $list_newsstatus[$i] = $RS->fields["status"];
                $list_newspriority[$i] = $RS->fields["priority"];
                        
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
	  	        'total_jumlah_record' => $total_jumlah_record,

				'data_newsid' => $list_newsid,
				'data_newstitle' => $list_newstitle,
				'data_newstitle_en' => $list_newstitle_en,
				'data_newspic' => $list_newspic,
				'data_newsbg' => $list_newsbg,
				'data_newsurl' => $list_newsurl,
				'data_newsstatus' => $list_newsstatus,
				'data_newspriority' => $list_newspriority,
				'data_newsdate'	=> $list_newsdate));
//	  $smarty->assign('path_file_image' , $path_file_image);
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
	  if ((isset($_GET["data_newsid"])) and (ctype_digit($_GET["data_newsid"]))) 
	  {   $data_newsid = $_GET["data_newsid"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_newsid;
            $RS  = $db->Execute($SQL);	   	  
	  	  
            $data_newsid = $RS->fields["newsid"];
            $data_newstitle = stripslashes($RS->fields["newstitle"]);
            $data_newstitle_en = stripslashes($RS->fields["newstitle_en"]);
            $data_newsshortdesc = stripslashes($RS->fields["newsshortdesc"]);
            $data_newsshortdesc_en = stripslashes($RS->fields["newsshortdesc_en"]);
            $data_newspic = $RS->fields["newspic"];
            $data_newsbg = $RS->fields["newsbg"];
            $data_newsurl = $RS->fields["newsurl"];
            $data_newsstatus = $RS->fields["status"];
            $data_newspriority = $RS->fields["priority"];
	  	    $data_newsdate = date("d-m-Y" , strtotime($RS->fields["newsdate"]));
			
            $data_toptitle = stripslashes($RS->fields["toptitle"]);
            $data_bottomtext = stripslashes($RS->fields["bottomtext"]);
            $data_bottomlinks = $RS->fields["bottomlinks"];
          
		    if ($RS->fields["newsid"] == '') $msg = "There is no record in our database";
	  } 

      $optarray = enum("bannerslider2.status");
	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_newsid' , $data_newsid);
	  $smarty->assign('data_newsdate' , $data_newsdate);
	  $smarty->assign('data_newstitle' , $data_newstitle);
	  $smarty->assign('data_newstitle_en' , $data_newstitle_en);
	  $smarty->assign('data_newsshortdesc' , $data_newsshortdesc);
	  $smarty->assign('data_newsshortdesc_en' , $data_newsshortdesc_en);
	  $smarty->assign('data_newsurl' , $data_newsurl);
	  $smarty->assign('data_newsstatus' , $data_newsstatus);
	  $smarty->assign('data_newspriority' , $data_newspriority);
	  $smarty->assign('data_newspic' , $data_newspic);
	  $smarty->assign('data_newsbg' , $data_newsbg);
	  
	  $smarty->assign('data_toptitle' , $data_toptitle);
	  $smarty->assign('data_bottomtext' , $data_bottomtext);
	  $smarty->assign('data_bottomlinks' , $data_bottomlinks);
	  
//	  $smarty->assign('path_file_image' , $path_file_image);
	  $smarty->assign('optarray' , $optarray);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
}
?>