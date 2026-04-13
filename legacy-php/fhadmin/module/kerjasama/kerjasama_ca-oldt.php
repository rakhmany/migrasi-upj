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

$tabel_utama = "kerjasama_cat";
$primary_key = "cat_id";
$priority_key = "priority";

$nama_tpl = "kerjasama_cat_";
$judul_halaman = "Category";
//$path_file_image = "../../../images/kerjasama_cat/";
$path_file_image = BASE_DIR_UPLOAD_MODULE."kerjasama_cat/";
$smarty->assign('path_file_image' , BASE_URL_UPLOAD_MODULE.'kerjasama_cat/');

//*** Cek Folder dan chmod 777
cek_mod_dir($path_file_image);

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
        if (!(($orderfield=="cat_id") || ($orderfield=="created_at") || ($orderfield=="cat_title") || ($orderfield=="priority")|| ($orderfield=="status"))) $orderfield="priority";
    }
    if (!(isset($_GET["order"])))  $order="ASC";

    //*** Proses insert dan edit
    if ( (isset($_POST["insert"])) || (isset($_POST["edit"])) ) {
        if ((isset($_POST["edit"]))) $data_cat_id = trim($_POST["data_cat_id"]);
        $data_cat_title = $_POST["data_cat_title"];
        $data_cat_title_en = $_POST["data_cat_title_en"];
        $data_cat_status = $_POST["data_cat_status"];
        $data_cat_priority = maxPriority($priority_key,$tabel_utama) + 1;

        //*** Proses validasi
        if ($data_cat_title == "") { $msg.="Please input Title<br>"; }
        if ($data_cat_title_en == "") { $msg.="Please input Title (EN)<br>"; }
        if ($data_cat_priority == "") { $data_cat_priority="1"; }
        else {
            if (!is_numeric($data_cat_priority)) $msg .= "Please input Priority in Numeric<br>";
        }

        //*** Jika tidak ada error
        if ($msg=="") {
            if (isset($_POST["insert"])){
                $SQL1 =  "INSERT INTO 	".$tabel_utama." (cat_title, cat_title_en, status, priority)
                               VALUES			('" . $db->escape($data_cat_title) . "' , '" . $db->escape($data_cat_title_en) . "','" . $data_cat_status . "', '" . $data_cat_priority . "')";
                $db   -> Execute($SQL1);
                $tmp_cat_id = $db->Insert_Id();

                insert_log('Add', $judul_halaman , 'Add Banner Slider : '.$data_cat_title);
                $final_message = "Your Banner Slider : ".stripslashes($data_cat_title)." has been inserted<br>";
            } else {

                $SQL = "SELECT			*
                              FROM		".$tabel_utama."
                              WHERE		".$primary_key." = ".$data_cat_id;
                $RS = $db->Execute($SQL);

                $SQL1 = "UPDATE		 	".$tabel_utama."
                              SET		cat_title = '".$db->escape($data_cat_title) ."', 
										cat_title_en = '".$db->escape($data_cat_title_en) ."',
										status = '".$data_cat_status."'
                              WHERE			".$primary_key." = ".$data_cat_id;
                $db   -> Execute($SQL1);

                insert_log('Edit', $judul_halaman , 'Edit Banner Slider : '.$data_cat_title);
                $final_message = "Your Banner Slider : ".stripslashes($data_cat_title)." has been updated<br>";
            }
        } else {
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

            if ($RS->fields["cat_id"] != '')
            {  insert_log('Delete', $judul_halaman , 'Delete Banner Slider : '.$RS->fields["cat_title"].', id : '.$RS->fields["cat_id"]);
                $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
                $RS1  = $db->Execute($SQL1);
            }
        }
        $action = "view";
        $final_message = "Banner Slider has been deleted<br>";
    }


    //*** Seting Header 
//    $smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>');
//    $smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>');
    $smarty->assign('title' , $judul_halaman);
//    $smarty->assign('title_search' , 'Banner Slider Title');
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
                WHERE 	cat_title like '%".$search."%'
                ORDER BY	" . $orderfield . " " . $order;
            $RS =$db->Execute($SQL);

            if ($RS->fields["cat_id"] != "")
            { $total_jumlah_record = $RS->RecordCount();
                $total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
                $teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;

                if ($page != 0 ) {
                    if ($page > $total_jumlah_page) $page=$total_jumlah_page;
                    $pagination = pagination($page, $total_jumlah_page, $teks_parameter);
                    $SQL = "SELECT 			*
                         FROM			    ".$tabel_utama."
                         WHERE 	        cat_title like '%".$search."%'
                         ORDER BY		" . $orderfield . " " . $order . " 	  
                         LIMIT			    " . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
                    $RS = $db->Execute($SQL);

                    $i=0;
                    while (!$RS->EOF) {
                        $list_cat_id[$i] = $RS->fields["cat_id"];
                        $list_created_at[$i] = date("d-m-Y" , strtotime($RS->fields["created_at"]));
                        $list_cat_title[$i] = stripslashes($RS->fields["cat_title"]);
                        $list_cat_title_en[$i] = stripslashes($RS->fields["cat_title_en"]);
                        $list_cat_status[$i] = $RS->fields["status"];
                        $list_cat_priority[$i] = $RS->fields["priority"];

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

                'data_cat_id' => $list_cat_id,
                'data_cat_title' => $list_cat_title,
                'data_cat_title_en' => $list_cat_title_en,
                'data_cat_status' => $list_cat_status,
                'data_cat_priority' => $list_cat_priority,
                'data_created_at'	=> $list_created_at));
//	  $smarty->assign('path_file_image' , $path_file_image);
            $smarty->display($nama_tpl.'list.tpl');
            break;

        case "detail" :
        case "insert" :
            if ((isset($_GET["data_cat_id"])) and (ctype_digit($_GET["data_cat_id"])))
            {   $data_cat_id = $_GET["data_cat_id"];
                $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_cat_id;
                $RS  = $db->Execute($SQL);

                $data_cat_id = $RS->fields["cat_id"];
                $data_cat_title = stripslashes($RS->fields["cat_title"]);
                $data_cat_title_en = stripslashes($RS->fields["cat_title_en"]);
                $data_cat_status = $RS->fields["status"];
                $data_cat_priority = $RS->fields["priority"];
                $data_created_at = date("d-m-Y" , strtotime($RS->fields["created_at"]));

                if ($RS->fields["cat_id"] == '') $msg = "There is no record in our database";
            }

            $optarray = enum("kerjasama_cat.status");
            $smarty->assign('msg' , $msg);
            $smarty->assign('data_cat_id' , $data_cat_id);
            $smarty->assign('data_created_at' , $data_created_at);
            $smarty->assign('data_cat_title' , $data_cat_title);
            $smarty->assign('data_cat_title_en' , $data_cat_title_en);
            $smarty->assign('data_cat_status' , $data_cat_status);
            $smarty->assign('data_cat_priority' , $data_cat_priority);

            $smarty->assign('optarray' , $optarray);
            $smarty->display($nama_tpl.'insert.tpl');
            break;
    }
}
?>