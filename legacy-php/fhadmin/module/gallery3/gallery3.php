<?php

/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 1 Maret 2012
  * @copyright by FaberHost.com
  * Versi : 1.0
  
  * Plugin Author: Bambang Riswanto
  * Checked : Juli 2013
  
*************************************/
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

//$smarty->debugging =true;
// error_reporting(E_ALL);
// $db->debug=true;
// debugvar($_POST);
// debugvar($_FILES);

$tabel_utama = "gallery3";
$primary_key = "galleryid";
$priority_key = "gallerypriority";

$tabel_category = "gallery3_category";
$primary_key_category = "categoryid";

$nama_tpl = "gallery3_";
$judul_halaman = "Fasilitas";
//$path_file_image = "../../../images/gallery3/";
$path_file_image = BASE_DIR_UPLOAD_MODULE."gallery3/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'gallery3/');

//$smarty->assign("path_file_image", $path_file_image);

$category = new categoryunlimited();
if ($search1 != "") { $tmp_category_search = $category->select_deep_core(0,"----", $search1, $tabel_category); } 
else { $tmp_category_search = $category->select_deep_core(0,"----", 0, $tabel_category); }
$smarty->assign('strukturcategory_search' , $tmp_category_search);


//*** Fungsi tambahan
function isValidURL($url)
{
return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}

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
	if (!(isset($_GET["orderfield"])))  $orderfield="gallerypriority";
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!(($orderfield=="galleryid") || ($orderfield=="gallerydate") || ($orderfield=="galleryname") || ($orderfield=="gallerypriority")|| ($orderfield=="gallerystatus"))) $orderfield="gallerypriority"; 
	}
	if (!(isset($_GET["order"])))  $order="ASC";

    //*** Proses insert dan edit
    if ( (isset($_POST["insert"])) || (isset($_POST["edit"])) ) { 
		if ((isset($_POST["edit"]))) $data_galleryid = trim($_POST["data_galleryid"]);
		$data_gallerycatid		= $_POST["data_gallerycatid"];
		$data_gallerydate		= $_POST["data_gallerydate"];
		$data_galleryname		= $_POST["data_galleryname"];
		$data_galleryname_en	= $_POST["data_galleryname_en"];
		$data_gallerydescription = '';//$_POST["data_gallerydescription"];
		$data_gallerydescription_en= '';//$_POST["data_gallerydescription_en"];
		$data_galleryfilename	= $_FILES["data_galleryfilename"];
        $data_gallerystatus	= $_POST["data_gallerystatus"];
        $data_gallerypriority	= maxPriority($priority_key,$tabel_utama) + 1;

        //*** Proses validasi
        if ($data_gallerydate == "") {$data_gallerydate = date("d-m-Y"); }
		if ( $data_galleryname == "" ) { $msg .= "Please input  Title (ID)<br>"; }
		if ( $data_galleryname_en == "" ) { $msg .= "Please input  Title (EN)<br>"; }
        if ($data_gallerycatid == "0") {$msg.="Please Select gallery Category<br>";}
		if ($_FILES["data_galleryfilename"]["name"] != "") {
            $handle = new Upload($_FILES["data_galleryfilename"]);
            $handle_thumb = new Upload($_FILES["data_galleryfilename"]);
            if ($handle->uploaded) {
                if (!($handle-> file_is_image)) { $msg.= "Invalid image<br>";}
				else {
					$handle_thumb->image_resize = true;
					$handle_thumb->image_x = 348;
					$handle_thumb->image_y = 225;
				}
            } else { $msg .= $handle->error; }
		}  else {  if ($_POST["insert"]) { $msg .= "Please input File to Upload<br>"; }  }
		
		//*** Jika tidak ada error
		if ($msg==""){ 
		    $tmp = explode('-', $data_gallerydate);
		    $data_gallerydate = $tmp[2]."-".$tmp[1]."-".$tmp[0];

    		if (isset($_POST["insert"])){ 
				$SQL1 =  "INSERT INTO 	".$tabel_utama." (categoryid, gallerydate,  galleryname,  galleryname_en, gallerydescription,  gallerydescription_en, gallerystatus, gallerypriority)
                               VALUES	('".$data_gallerycatid."', '" . $data_gallerydate . "' , '" . $data_galleryname . "' , '" . $data_galleryname_en . "',  '" . $data_gallerydescription . "',  '" . $data_gallerydescription_en . "','" . $data_gallerystatus . "', '" . $data_gallerypriority . "' )";
				$db   -> Execute($SQL1);
				$tmp_galleryid = $db->Insert_Id();
				
                if ($_FILES["data_galleryfilename"]["name"] != "") {
                    $handle->file_new_name_body = 'gallery'.$tmp_galleryid;
                    $handle->Process($path_file_image);
                    if ( empty($handle->error) ) 
					{
						$SQL1 = "UPDATE			".$tabel_utama."
									  SET		galleryfilename = '".$handle->file_dst_name."'
									  WHERE		".$primary_key." = ".$tmp_galleryid;
						$db -> Execute($SQL1);
						$handle_thumb->file_new_name_body = 'thumb_gallery'.$tmp_galleryid;
						$handle_thumb->Process($path_file_image);
					} else die($handle->error);
               }

				insert_log('Add', $judul_halaman , 'Add gallery  : '.$data_galleryname); 
				$final_message = "Your gallery  : ".stripslashes($data_galleryname)." has been inserted<br>";
            } else {

				 $SQL = "SELECT			*
                              FROM		".$tabel_utama."
                              WHERE		".$primary_key." = ".$data_galleryid;
                $RS = $db->Execute($SQL);
                $tmp_galleryfilename= $RS->fields["galleryfilename"];
                
                //*** Upload image baru
                if ($_FILES["data_galleryfilename"]["name"] != "") {
                    //*** hapus file lama jika ada
                    if ($RS->fields["galleryfilename"] != "") { @unlink($path_file_image.$RS->fields["galleryfilename"]); @unlink($path_file_image."thumb_".$RS->fields["galleryfilename"]); } 
                    $handle->file_new_name_body = 'gallery' . $data_galleryid;
                    $handle->Process($path_file_image);
                    if ( empty($handle->error) ) {
						$tmp_galleryfilename = $handle->file_dst_name;
						$handle_thumb->file_new_name_body = 'thumb_gallery'.$data_galleryid;
						$handle_thumb->Process($path_file_image);
					}
                }
                
                $SQL1 = "UPDATE		 	".$tabel_utama."
							SET			categoryid = '".$data_gallerycatid."',
										gallerydate = '".$data_gallerydate."', 
										galleryname = '".$data_galleryname ."', 
										galleryname_en = '".$data_galleryname_en ."', 
										gallerydescription = '".$data_gallerydescription."',
										gallerydescription_en = '".$data_gallerydescription_en."',
										galleryfilename = '".$tmp_galleryfilename."',
										gallerystatus = '".$data_gallerystatus."'
                              WHERE		".$primary_key." = ".$data_galleryid;
				$db   -> Execute($SQL1);
				
				insert_log('Edit', $judul_halaman , 'Edit gallery  : '.$data_galleryname); 
				$final_message = "Your gallery  : ".stripslashes($data_galleryname)." has been updated<br>";
            }
        
		} else { 
            $data_galleryfilename = ""; 
            if(isset($_POST["insert"])) $action="insert"; else  $action="detail"; 
       }
    }


    //*** Proses Delete 
	if (isset($_POST["del"])) 
	{  $delete=$_POST["delete"];
       for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT			*
                      FROM		".$tabel_utama."
                      WHERE		".$primary_key." = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["galleryid"] != '')
		 {  insert_log('Delete', $judul_halaman , 'Delete gallery  : '.$RS->fields["galleryname"].', id : '.$RS->fields["galleryid"]); 
            if ($RS->fields["galleryfilename"] != "" ) {  unlink($path_file_image.$RS->fields["galleryfilename"]);  }
		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "gallery  has been deleted<br>";
	}
	

	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'gallery Name');
	// $smarty->assign('width' , $widthimage); 
	// $smarty->assign('height' , $heightimage); 
	$smarty->assign('search' , $search); 
	$smarty->assign('search1' , $search1); 
	// $smarty->display($nama_tpl.'header.tpl');
	

	//*** Change Order Code
	$chorder = isset($_GET["chorder"])?$_GET["chorder"]:'';
	switch ($chorder) {

		case "up" :
		  if ((isset($_GET[$primary_key])) and (ctype_digit($_GET[$primary_key])) and ($_GET[$primary_key] > 0))  {
				//*** Menu Current yang ingin dirubah
				$SQL = "SELECT			*
							 FROM		".$tabel_utama."
							 WHERE		".$primary_key." = '".$_GET[$primary_key]."'";
				$RS = $db->Execute($SQL);
				
				//*** Menu Target yang dirubah
				$SQL2 = "SELECT			*
							 FROM		".$tabel_utama."
							 WHERE		".$priority_key." < '".$RS->fields[$priority_key]."'
							  ORDER BY	".$priority_key." DESC";
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
				$SQL = "SELECT			*
							 FROM		".$tabel_utama."
							 WHERE		".$primary_key." = '".$_GET[$primary_key]."'";
				$RS = $db->Execute($SQL);
				
				//*** Menu Target yang dirubah
				$SQL2 = "SELECT			*
							 FROM		".$tabel_utama."
							 WHERE		".$priority_key." > '".$RS->fields[$priority_key]."'
							  ORDER BY	".$priority_key." ASC";
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
	case "search" :
    $tmp_search_sql ="";
    if ($search1 != "") { $tmp_search_sql .= " AND categoryid = '".$search1."' ";}

    $SQL = "SELECT			*
                FROM		".$tabel_utama."
                WHERE 		(galleryname like '%".$search."%' OR galleryname_en like '%".$search."%')
							".$tmp_search_sql ."
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["galleryid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search."&search1=".$search1;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                         FROM		".$tabel_utama."
                         WHERE		(galleryname like '%".$search."%' OR galleryname_en like '%".$search."%')
									".$tmp_search_sql ."
                         ORDER BY	" . $orderfield . " " . $order . " 	  
                         LIMIT		" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $SQL = "SELECT			*
							FROM		".$tabel_category."
							WHERE		".$primary_key_category." = '".$RS->fields["categoryid"]."'";
                $RS2=$db->Execute($SQL);

                $list_galleryid[$i]				= $RS->fields["galleryid"];
                $list_gallerydate[$i]			= date("d-m-Y" , strtotime($RS->fields["gallerydate"]));
                $list_galleryname[$i]			= $RS->fields["galleryname"];
                $list_galleryname_en[$i]		= $RS->fields["galleryname_en"];
                $list_galleryfilename[$i]		= $RS->fields["galleryfilename"];
                $list_galleryfilesize[$i]		= !empty($RS->fields["galleryfilename"]) ? intval(filesize($path_file_image.$RS->fields["galleryfilename"]))/1024 : 0;
                $list_gallerydescription[$i]	= $RS->fields["gallerydescription"];
                $list_gallerydescription_en[$i]	= $RS->fields["gallerydescription_en"];
                $list_gallerystatus[$i]			= $RS->fields["gallerystatus"];
                $list_gallerypriority[$i]		= $RS->fields["gallerypriority"];
                $list_gallerycategory[$i]		= $RS2->fields["categoryname"];
                        
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

				'data_galleryid' => $list_galleryid,
				'data_galleryname' => $list_galleryname,
				'data_galleryname_en' => $list_galleryname_en,
				'data_galleryfilename' => $list_galleryfilename,
				'data_galleryfilesize' => $list_galleryfilesize,
				'data_gallerydescription' => $list_gallerydescription,
				'data_gallerydescription_en' => $list_gallerydescription_en,
				'data_gallerystatus' => $list_gallerystatus,
				'data_gallerypriority' => $list_gallerypriority,
				'data_gallerycategory' => $list_gallerycategory,
//				'path_file_image' => $path_file_image,
				'data_gallerydate'	=> $list_gallerydate));
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
	  if ((isset($_GET["data_galleryid"])) and (ctype_digit($_GET["data_galleryid"]))) {
			$data_galleryid = $_GET["data_galleryid"];
            $SQL = "SELECT 			*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_galleryid;
            $RS  = $db->Execute($SQL);
	  	  
            $data_galleryid				= $RS->fields["galleryid"];
            $data_gallerycatid			= $RS->fields["categoryid"];
            $data_galleryname			= $RS->fields["galleryname"];
            $data_galleryname_en		= $RS->fields["galleryname_en"];
            $data_galleryfilename		= $RS->fields["galleryfilename"];
            $data_galleryfilesize		= !empty($RS->fields["galleryfilename"]) ? intval(filesize($path_file_image.$RS->fields["galleryfilename"]))/1024 : 0;
            $data_gallerydescription	= $RS->fields["gallerydescription"];
            $data_gallerydescription_en= $RS->fields["gallerydescription_en"];
            $data_gallerystatus			= $RS->fields["gallerystatus"]	;
            $data_gallerypriority		= $RS->fields["gallerypriority"];
	  	    $data_gallerydate			= date("d-m-Y" , strtotime($RS->fields["gallerydate"]));
          
		    if ($RS->fields["galleryid"] == '') $msg = "There is no record in our database";
	  } 

	  if ($data_gallerydate == '') $data_gallerydate = date("d-m-Y");
      $tmp_category = $category->select_deep_core(0,"----", $data_gallerycatid, $tabel_category); 
	  $smarty->assign('strukturcategory' , $tmp_category);

      $optarray = enum("gallery3.gallerystatus");
	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_galleryid' , $data_galleryid);
	  $smarty->assign('data_gallerycatid' , $data_gallerycatid);
	  $smarty->assign('data_gallerydate' , $data_gallerydate);
	  $smarty->assign('data_galleryname' , $data_galleryname);
	  $smarty->assign('data_galleryname_en' , $data_galleryname_en);
	  $smarty->assign('data_gallerydescription' , $data_gallerydescription);
	  $smarty->assign('data_gallerydescription_en' , $data_gallerydescription_en);
	  $smarty->assign('data_gallerystatus' , $data_gallerystatus);
	  $smarty->assign('data_gallerypriority' , $data_gallerypriority);
	  $smarty->assign('data_galleryfilename' , $data_galleryfilename);
	  $smarty->assign('data_galleryfilesize' , $data_galleryfilesize);
//	  $smarty->assign('path_file_image' , $path_file_image);
	  $smarty->assign('optarray' , $optarray);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
} else {
	header("location: index.php"); exit;
}
?>