<?php
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

$akses_level_page = access_level_page($fh_usergroupid, $db);
$access_level_type = access_level_type($fh_usergroupid, $db); //** by: Bambang Riswanto at 2013

if ($fh_userid && $akses_level_page)
{	//*** Lokasi direktori
    $dir = "../../module/";
    
  	$smarty->assign('title' , 'Management Module'); 
  	// $smarty->display('moduleheader.tpl');

    if ($_GET["dir_install"]) {
            if (!$access_level_type->add) akses_level_die();
			$x = $_GET["dir_install"];
            $x = $crypt->decrypt($x);
            $tmp_dir = "../".$x;
            $flag_tmp = 0;
            $flag_sql = 0;

            if (is_dir($tmp_dir)) { 
                $tmp_dh = opendir($tmp_dir);
                while (($tmp_file = readdir($tmp_dh)) !== false) {
                    $extension = end(explode(".", $tmp_file));
                    if ($extension == "sql")  {
                        $handle = @fopen($tmp_dir."/".$tmp_file, "r");
                        if ($handle) {
                            while (!feof($handle)) {
                                $tmp_data = fgets($handle, 4096);
                                if (trim($tmp_data) != "" && strpos($tmp_data, "--") === false) {
                                    $query .= $tmp_data;
                                    if ((preg_match("/;[\040]*\$/", $tmp_data)) || (preg_match("/;/", $tmp_data))) {
                                        $RS = $db->Execute($query);
                                        if (($flag_tmp != 1) && (!$RS)) $flag_tmp=1;  
                                        $query = "";
                                    }
                                }
                            }
                            fclose($handle);
                        }  
                        $flag_sql = 1;
                    } 
                }
            }    
            if (($flag_sql == "1") && ($flag_tmp == "0")) $final_message = "Success... Module ".$x." has been instaled<br>";
            if (($flag_sql == "1") && ($flag_tmp == "1")) $final_message = "There is a problem with SQL Database<br>";
            if ($flag_sql == "0") $final_message = "Please Check Your File Module<br>";
    }

    if ($_GET["dir_remove"]) {
            if (!$access_level_type->delete) akses_level_die();
			$x = $_GET["dir_remove"];
            $x = $crypt->decrypt($x);

            $tmp_dir = "../".$x;
            $flag_tmp=0;

            if (is_dir($tmp_dir)) { 
                $tmp_dh = opendir($tmp_dir);
                while (($tmp_file = readdir($tmp_dh)) !== false) {
                    $extension = end(explode(".", $tmp_file));
                    if ($extension == "php")  {
                        $SQL = "SELECT  *
                                    FROM	fh_menu
                                    WHERE	fh_url = '".$x."/".$tmp_file."'";
                        $RS = $db->Execute($SQL);
                        if ($RS->fields["fh_menuid"] != "") {
                            $SQL1 = "DELETE FROM		fh_menu_akses
                                          WHERE			    fh_menuid = ".$RS->fields["fh_menuid"];
                            $db->Execute($SQL1);
                            
                            $SQL1 = "DELETE FROM		fh_menu
                                          WHERE               fh_url = '".$x."/".$tmp_file."'";
                            $db->Execute($SQL1);
                            $flag_tmp=1;
                        }
                    } 
                }
                $SQL = "SHOW TABLES FROM ". $conf['db_database']. " LIKE '%".$x."%'";
                $RS = $db->Execute($SQL);
                while (!$RS->EOF) {
                    $SQL1 = "DROP TABLE IF EXISTS ".$RS->fields[0];
                    $db->Execute($SQL1);
                    $RS->MoveNext();
                }
                if ($flag_tmp==1) $final_message = "Module ".$x." has been removed<br>";
            }    
    }
  	
    switch ($action) {
    case "view" : 
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                $i=0;
                while (($file = readdir($dh)) !== false) {
                    //*** Selain file-file dibawah ini yang ada dalam direktori tersebut TIDAK akan di execute
                    if (($file != ".") && ($file !="..") && ($file != "usermanagement") && ($file != "index.php") && ($file != "index.html") && ($file != "index.htm"))
                    {   //*** Simpan nama direktori
                        $nama_module[$i]  = $file;  
                   
                        //ambil content directory tersebut untuk check instalasi module apakah sudah terinstall atau belum
                        $tmp_dir = "../".$file;
                        if (is_dir($tmp_dir)) { 
                            $tmp_dh = opendir($tmp_dir);
                            $tmp_flag = "false";
                            while (($tmp_file = readdir($tmp_dh)) !== false) {
                                $extension = end(explode(".", $tmp_file));
                                //*** Jika extension nya php maka semua extension php harus terinstall
                                if (($extension == "php") && ($tmp_file != "index.php")) {
                                    $SQL = "SELECT      *
                                                FROM         fh_menu
                                                WHERE       fh_filename = '".$tmp_file."' 
                                                                    AND fh_url = '".$file."/".$tmp_file."'";
                                    $RS = $db->Execute($SQL);
                                    if ($RS->fields["fh_filename"] != "") $tmp_flag="true";
                                } 
                            }                        
                        }
                        if ($tmp_flag == "false") {
                            $status_install[$i] = "<a href='".$_SERVER['PHP_SELF']."?dir_install=".urlencode($crypt->encrypt($file))."'>Setup Now</a>";
                            $status_remove[$i] = "-";
                        } else {
                            $status_install[$i] = "-";
                            $status_remove[$i] = "<a href='".$_SERVER['PHP_SELF']."?dir_remove=".urlencode($crypt->encrypt($file))."'>Remove Now</a>";
                        }

                        $i++;
                    }
                }
                closedir($dh);
            }
        }
    
        $smarty->assign('final_message' , $final_message ); 
        $smarty->assign('status_install' , $status_install); 
        $smarty->assign('status_remove' , $status_remove); 
        $smarty->assign('nama_module' , $nama_module); 
        $smarty->display('modulelist.tpl');
    
    break;
    }
}
?>
