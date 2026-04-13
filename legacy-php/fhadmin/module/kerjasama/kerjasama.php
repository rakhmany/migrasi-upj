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

$tabel_utama = "kerjasama";
$primary_key = "ks_id";
$priority_key = "priority";

$tabel_cat = "kerjasama_cat";
$primary_key_cat = "cat_id";

$tabel_ukuran = "kerjasama_ukuran";
$primary_key_ukuran = "ukuranid";

$nama_tpl = "kerjasama_";
$judul_halaman = "Mitra Kerja Sama";
//$path_file_image = "../../../images/kerjasama/";
$path_file_image = BASE_DIR_UPLOAD_MODULE."kerjasama/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'kerjasama/');

//*** Cek Folder dan chmod 777
cek_mod_dir($path_file_image);


$optarray = enum("kerjasama.status");
$smarty->assign('optarray' , $optarray);

//*** Ambil Config Besar Image
$SQL = "SELECT          *
             FROM            ".$tabel_ukuran."
             LIMIT             0,1";
$RS = $db->Execute($SQL);
$widthimage = $RS->fields["width"];
$heightimage = $RS->fields["height"];

$SQL = "SELECT          *
             FROM       ".$tabel_cat."
             ORDER BY priority ASC";
$RS = $db->Execute($SQL);
$categories = [];
if($RS->fields[$primary_key_cat] !== '') {
    $i=0;
    while(!$RS->EOF) {
        $categories[$i] = [];
        $categories[$i]['id'] = $RS->fields[$primary_key_cat];
        $categories[$i]['title'] = stripslashes($RS->fields["cat_title"]);
        $categories[$i]['title_en'] = stripslashes($RS->fields["cat_title_en"]);
        $RS->MoveNext();
        $i++;
    }
}
$smarty->assign('categories', $categories);


function show_select_opt_parent($parent, $selected, $level)
{
	 
	
	$maintable = 'kerjasama_cat';
	$mainfieldname = 'cat_title'; 
	
	if($level == '')
	{
		$ret .= '<option value="0">[Root menu]</option>';
	}
	$sql = 'SELECT * FROM '.$maintable.' WHERE cat_parent=\''.intval($parent).'\'  ORDER BY priority ASC '; 
	$res = mysql_query($sql);
	$num = mysql_num_rows($res); 
	if($num)
	{
		while($row = mysql_fetch_assoc($res))
		{
			$disabled = $row['flexmenu_type'] == 0 ? '' : ' disabled="disabled" ';
			$is_selected = $selected == $row['cat_id'] ? ' selected="selected" ' : '';
			if($row['product_category_type'] == 0)
			{
				$ret .= '<option value="'.$row['cat_id'].'" '.$is_selected.' '.$disabled.'>'. $level. ' ' . $row[$mainfieldname] .'</option>';
			}
			$ret .= show_select_opt_parent($row['cat_id'], $selected, '---'.$level);
			 
		}
	} 
	return $ret;
}


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
        if (!(($orderfield=="ks_id") || ($orderfield=="created_at") || ($orderfield=="ks_title") || ($orderfield=="priority")|| ($orderfield=="status"))) $orderfield="priority";
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
        if ((isset($_POST["edit"]))) $data_ks_id = trim($_POST["data_ks_id"]);
        $data_cat_id = $_POST["data_cat_id"];
        $data_ks_title = $_POST["data_ks_title"];
        $data_ks_url = $_POST["data_ks_url"];
        $data_ks_logo = $_FILES["data_ks_logo"];
        $data_ks_status = $_POST["data_ks_status"];
        $data_ks_priority = maxPriority($priority_key,$tabel_utama) + 1;

        //*** Proses validasi
        if ($data_ks_logo["name"] != "") {
            $handle = new Upload($data_ks_logo);
            if ($handle->uploaded) {
                if (!($handle-> file_is_image)) { $msg.= "Invalid Main image<br>";}
                else {
                    // $handle->image_resize = true;
                    // if ($widthimage>0) $handle->image_x = $widthimage;
                    // if ($heightimage>0) $handle->image_y = $heightimage;
                }
            }
        }  else {  if ($_POST["insert"]) {$msg .= "Please input Main Image<br>";}  }

        if ($data_cat_id == "") { $msg.="Please Select Category<br>"; }
        if ($data_ks_title == "") { $msg.="Please input Title<br>"; }
        if ($data_ks_priority == "") { $data_ks_priority="1"; }
        else {
            if (!is_numeric($data_ks_priority)) $msg .= "Please input Priority in Numeric<br>";
        }

        //*** Jika tidak ada error
        if ($msg==""){
//		    $db->debug=1;
            if (isset($_POST["insert"])){
                $SQL1 =  "INSERT INTO 	".$tabel_utama." (cat_id, ks_title, ks_url, status, priority)
                               VALUES			(".$data_cat_id.", '" . $db->escape($data_ks_title) . "', '" . $data_ks_url . "','" . $data_ks_status . "', '" . $data_ks_priority . "' )";
                $db   -> Execute($SQL1);
                $tmp_ks_id = $db->Insert_Id();

                if ($data_ks_logo["name"] != "") {
                    $handle->file_new_name_body = 'ks-logo-'.time().'-'.$tmp_ks_id;
                    $handle->Process($path_file_image);
                    $SQL1 = "UPDATE			".$tabel_utama."
                                  SET		ks_logo = '".$handle->file_dst_name."'
                                  WHERE		".$primary_key." = ".$tmp_ks_id;
                    $db -> Execute($SQL1);
                }

                insert_log('Add', $judul_halaman , 'Add Mitra Kerja Sama : '.$data_ks_title);
                $final_message = "Mitra Kerja Sama : ".stripslashes($data_ks_title)." has been inserted<br>";
            } else {

                $SQL = "SELECT			*
                              FROM		".$tabel_utama."
                              WHERE		".$primary_key." = ".$data_ks_id;
                $RS = $db->Execute($SQL);
                $tmp_ks_logo= $RS->fields["ks_logo"];

                //*** Upload image baru
                if ($_FILES["data_ks_logo"]["name"] != "") {
                    //*** hapus file lama jika ada
                    if ($RS->fields["ks_logo"] != "") { @unlink($path_file_image.$RS->fields["ks_logo"]); }
                    $handle->file_new_name_body = 'ks-logo-'.time().'-'.$data_ks_id;
                    $handle->Process($path_file_image);
                    $tmp_ks_logo = $handle->file_dst_name;
                }

                $SQL1 = "UPDATE		 	".$tabel_utama."
                              SET		updated_at = NOW(), 
										cat_id = ".$data_cat_id.",
										ks_title = '".$db->escape($data_ks_title) ."',
										ks_logo = '".$tmp_ks_logo."',
										ks_url = '".$data_ks_url."',
										status = '".$data_ks_status."'
                              WHERE			".$primary_key." = ".$data_ks_id;
                $db   -> Execute($SQL1);

                insert_log('Edit', $judul_halaman , 'Edit Mitra Kerja Sama : '.$data_ks_title);
                $final_message = "Mitra Kerja Sama : ".stripslashes($data_ks_title)." has been updated<br>";
            }
        } else {
            $data_ks_logo = "";
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

            if ($RS->fields["ks_id"] != '')
            {  insert_log('Delete', $judul_halaman , 'Delete Mitra Kerja Sama : '.$RS->fields["ks_title"].', id : '.$RS->fields["ks_id"]);
                if ($RS->fields["ks_logo"] != "" ) {  unlink($path_file_image.$RS->fields["ks_logo"]);  }
                $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
                $RS1  = $db->Execute($SQL1);
            }
        }
        $action = "view";
        $final_message = "Mitra Kerja Sama has been deleted<br>";
    }


    //*** Seting Header
    $smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>');
    $smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>');
    $smarty->assign('title' , $judul_halaman);
//	$smarty->assign('title_search' , 'Mitra Kerja Sama Title');
    $smarty->assign('width' , $widthimage);
    $smarty->assign('height' , $heightimage);
    $smarty->assign('search1' , $search1);
    $smarty->assign('search2' , $search2);
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
            $tmp_search_sql ="";
            if ($search1 != "") { $tmp_search_sql .= " AND cat_id = '".$search1."' ";}
            if ($search2 != "") { $tmp_search_sql .= " AND status = '".$search2."' ";}

            $SQL = "SELECT 	        *
                        FROM		".$tabel_utama."
                        WHERE 	    ks_title like '%".$search."%'
                         ".$tmp_search_sql."
                        ORDER BY	" . $orderfield . " " . $order;
            $RS =$db->Execute($SQL);

            if ($RS->fields["ks_id"] != "")
            { $total_jumlah_record = $RS->RecordCount();
                $total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
                $teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;

                if ($page != 0 ) {
                    if ($page > $total_jumlah_page) $page=$total_jumlah_page;
                    $pagination = pagination($page, $total_jumlah_page, $teks_parameter);
                    $SQL = "SELECT 			    *
                                 FROM		    ".$tabel_utama."
                                 WHERE          ks_title like '%".$search."%'
                                 ".$tmp_search_sql."
                                 ORDER BY       " . $orderfield . " " . $order . " 	  
                                 LIMIT			" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
                    $RS = $db->Execute($SQL);

                    $i=0;
                    while (!$RS->EOF) {
                        $list_ks_id[$i] = $RS->fields["ks_id"];
                        $list_created_at[$i] = date("d-m-Y" , strtotime($RS->fields["created_at"]));
                        $list_ks_title[$i] = stripslashes($RS->fields["ks_title"]);
                        $list_ks_logo[$i] = $RS->fields["ks_logo"];
                        $list_ks_url[$i] = $RS->fields["ks_url"];
                        $list_ks_status[$i] = $RS->fields["status"];
                        $list_ks_priority[$i] = $RS->fields["priority"];

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

                'data_ks_id' => $list_ks_id,
                'data_ks_title' => $list_ks_title,
                'data_ks_logo' => $list_ks_logo,
                'data_ks_url' => $list_ks_url,
                'data_ks_status' => $list_ks_status,
                'data_ks_priority' => $list_ks_priority,
                'data_created_at'	=> $list_created_at));
//	  $smarty->assign('path_file_image' , $path_file_image);
            $smarty->display($nama_tpl.'list.tpl');
            break;

        case "detail" :
        case "insert" :
            if ((isset($_GET["data_ks_id"])) and (ctype_digit($_GET["data_ks_id"])))
            {   $data_ks_id = $_GET["data_ks_id"];
                $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_ks_id;
                $RS  = $db->Execute($SQL);

                $data_ks_id = $RS->fields["ks_id"];

                $data_cat_id = $RS->fields["cat_id"];

                $data_ks_title = stripslashes($RS->fields["ks_title"]);
                $data_ks_logo = $RS->fields["ks_logo"];
                $data_ks_url = $RS->fields["ks_url"];
                $data_ks_status = $RS->fields["status"];
                $data_ks_priority = $RS->fields["priority"];
                $data_created_at = date("d-m-Y" , strtotime($RS->fields["created_at"]));

                if ($RS->fields["ks_id"] == '') $msg = "There is no record in our database";
            }

            $smarty->assign('msg' , $msg);
            $smarty->assign('data_ks_id' , $data_ks_id);
            $smarty->assign('data_created_at' , $data_created_at);
            $smarty->assign('data_ks_title' , $data_ks_title);
            $smarty->assign('data_ks_url' , $data_ks_url);
            $smarty->assign('data_ks_status' , $data_ks_status);
            $smarty->assign('data_ks_priority' , $data_ks_priority);
            $smarty->assign('data_ks_logo' , $data_ks_logo);
            
			$show_select_opt_parent = show_select_opt_parent(0, $data_cat_id, '');
			$smarty->assign('show_select_opt_parent' , $show_select_opt_parent);     

//	  $smarty->assign('path_file_image' , $path_file_image);
            $smarty->display($nama_tpl.'insert.tpl');
            break;
    }
}
?>