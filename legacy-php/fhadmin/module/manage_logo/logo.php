<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 1 Maret 2012
  * @copyright by FaberHost.com
  * Versi : 1.0
  
  * Tanpa Resize image
  * Checked : 8 Maret 2013
*************************************/

require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

$tabel_utama = "manage_logo";
$primary_key = "logoid";

$tabel_ukuran = "manage_logo_ukuran";
$primary_key_ukuran = "ukuranid";

$nama_tpl = "logo_";
$judul_halaman = "Manage Logo";
$path_file_image = BASE_DIR_UPLOAD_MODULE."logo/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'logo/');

//*** Ambil Config Besar Image
$SQL = "SELECT          *
             FROM            ".$tabel_ukuran."
             LIMIT             0,1";
$RS = $db->Execute($SQL);
$widthimage = $RS->fields["width"];
$heightimage = $RS->fields["height"];

//*** Security ACCESS LEVEL 
$akses_level_page = access_level_page($fh_usergroupid, $db);         
if ($fh_userid && $akses_level_page)
{	$teks_parameter = "";

	if (!(isset($_GET["orderfield"])))  $orderfield="logoid";
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!(($orderfield=="logotitle"))) $orderfield="logoid"; 
	}

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
	
    //*** Kalau update status dari List View
    if ($_GET["status"] == "show") {
	  if ((isset($_GET["data_logoid"])) and (ctype_digit($_GET["data_logoid"]))) 
	  {     $SQL1 = "UPDATE		 	".$tabel_utama."
                          SET				status = 'Hidden'";
            $db   -> Execute($SQL1);

            $SQL1 = "UPDATE		 	".$tabel_utama."
                          SET				status = 'Show'
                          WHERE            ".$primary_key." = '".$_GET["data_logoid"]."' ";
            $db   -> Execute($SQL1);
            insert_log('Edit', $judul_halaman , 'Edit Status Show for ID : '.$_GET["data_logoid"]); 
        }
    }

    //*** Insert atau Edit
    if ( (isset($_POST["insert"])) || (isset($_POST["edit"])) ) { 
		if ((isset($_POST["edit"]))) $data_logoid = trim($_POST["data_logoid"]);
		$data_logotitle = $_POST["data_logotitle"];
		$data_logofile = $_FILES["data_logofile"];
        
		if ($_FILES["data_logofile"]["name"] != "") {
            $handle = new Upload($_FILES["data_logofile"]);
            if ($handle->uploaded) {
                if (!($handle-> file_is_image)) { $msg.= "Invalid image<br>";}
                else {
                    $handle->image_resize = true;
                    if ($widthimage>0) $handle->image_x = $widthimage;
                    if ($heightimage>0) $handle->image_y = $heightimage;
                }
            } 
		}  else {  if ($_POST["insert"]) {$msg .= "Please input Main Image<br>";}  }
		if ($data_logotitle == "") { $msg.="Please input Logo Title<br>"; }
        
		//*** Process
		if ($msg==""){ 
    		if (isset($_POST["insert"])){ 
                //*** Ketika ada logo baru, maka semuanya di set hidden dan logo baru langsung show
                $SQL1 = "UPDATE		 	".$tabel_utama."
                              SET				status = 'Hidden'";
                $db   -> Execute($SQL1);

				$SQL1 =  "INSERT INTO 	".$tabel_utama." (logotitle, status)
                               VALUES			('" . $db->escape($data_logotitle). "', 'Show' )";
				$db   -> Execute($SQL1);
				$tmp_logoid = $db->Insert_Id();
				
                if ($_FILES["data_logofile"]["name"] != "") {
                    $handle->file_new_name_body = 'logo'.$tmp_logoid;
                    $handle->Process($path_file_image);
                    $SQL1 = "UPDATE		 	".$tabel_utama."
                                  SET				logofile = '".$handle->file_dst_name."'
                                  WHERE			".$primary_key." = ".$tmp_logoid;
                    $db -> Execute($SQL1);
               }

				insert_log('Add', $judul_halaman , 'Add Logo : '.$data_logotitle); 
				$final_message = "Your Logo : ".stripslashes($data_logotitle)." has been inserted<br>";

            } else {
				 $SQL = "SELECT      *
                              FROM         ".$tabel_utama."
                              WHERE       ".$primary_key." = ".$data_logoid;
                $RS = $db->Execute($SQL);
                $tmp_logofile= $RS->fields["logofile"];
                
                //*** Upload image baru
                if ($_FILES["data_logofile"]["name"] != "") {
                     //*** hapus file lama jika ada
                    if ($RS->fields["logofile"] != "") { @unlink($path_file_image.$RS->fields["logofile"]); } 
                    $handle->file_new_name_body = 'logo'.$data_logoid;
                    $handle->Process($path_file_image);
                    $tmp_logofile = $handle->file_dst_name;
                } 

  			   $SQL1 = "UPDATE		 	".$tabel_utama."
                            SET				    logotitle = '".$db->escape($data_logotitle) ."',
                                                    logofile = '".$tmp_logofile."'
                            WHERE			    ".$primary_key." = ".$data_logoid;
				$db   -> Execute($SQL1);

				insert_log('Edit', $judul_halaman , 'Edit Logo : '.$data_logotitle); 
				$final_message = "Your Logo : ".stripslashes($data_logotitle)." has been updated<br>";
            }
        } else { 
            $data_logofile = ""; 
            if(isset($_POST["insert"])) $action="insert"; else  $action="detail"; 
       }
    }


    //*** Proses Delete 
	if (isset($_POST["del"])) 
	{  $delete=$_POST["delete"];
        $tmp_flag=0;
       for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 		*
                      FROM			".$tabel_utama."
                      WHERE		".$primary_key." = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if (($RS->fields["logoid"] != '') && ($RS->fields["status"] != 'Show'))
		 {  insert_log('Delete', $judul_halaman , 'Delete Logo : ' .$RS->fields["logotitle"]. ', id : ' .$RS->fields["logoid"]); 
            if ($RS->fields["logofile"] != "" ) {  unlink($path_file_image.$RS->fields["logofile"]);  }
		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   else {$tmp_flag=1;}
	   }
       $action = "view";
	   if ($tmp_flag == 0) $final_message = "Logo has been deleted<br>"; 
	   else $final_message = "Logo can't be deleted, please change status Show to another logo first<br>"; 
	}

	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
	$smarty->assign('width' , $widthimage); 
	$smarty->assign('height' , $heightimage); 
//	$smarty->assign('title_search' , 'Logo Title');
	// $smarty->display($nama_tpl.'header.tpl');
	
	//*** MAIN CODE 
	switch ($action) {
	case "view" :
    $SQL = "SELECT 	*
                FROM		".$tabel_utama."
                WHERE 	logotitle like '%".$search."%'
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["logoid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                         FROM			    ".$tabel_utama."
                         WHERE 	        logotitle like '%".$search."%'
                         ORDER BY		" . $orderfield . " " . $order . " 	  
                         LIMIT			    " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_logoid[$i] = $RS->fields["logoid"];
                $list_logotitle[$i] = stripslashes($RS->fields["logotitle"]);
                $list_logofile[$i] = $RS->fields["logofile"];
                $list_logostatus[$i] = $RS->fields["status"];
                        
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
	  	        'path_file_image' => $path_file_image,

				'data_logoid' => $list_logoid,
				'data_logotitle' => $list_logotitle,
				'data_logofile' => $list_logofile,
				'data_logostatus' => $list_logostatus));
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
  	
	  if ((isset($_GET["data_logoid"])) and (ctype_digit($_GET["data_logoid"]))) 
	  {   $data_logoid = $_GET["data_logoid"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key." = ".$data_logoid;
            $RS  = $db->Execute($SQL);	   	  
	  	  
            $data_logoid = $RS->fields["logoid"];
            $data_logotitle =  stripslashes($RS->fields["logotitle"]);
            $data_logofile = $RS->fields["logofile"];
            $data_logostatus = $RS->fields["status"];
          
		    if ($RS->fields["logoid"] == '') $msg = "There is no record in our database";
	  } 

      $optarray = enum("manage_logo.status");
	  
	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_logoid' , $data_logoid);
	  $smarty->assign('data_logotitle' , $data_logotitle);
	  $smarty->assign('data_logostatus' , $data_logostatus);
	  $smarty->assign('data_logofile' , $data_logofile);
	  $smarty->assign('optarray' , $optarray);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
}
?>