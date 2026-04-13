<?php

/*************************************

 * FaberHost CMS System

 * @author : Seto Andry Wibowo

 * Created : 13 April 2008

 * @copyright by FaberHost.com

  

 * Variabel yang dipakai :

 * $conf //=> Untuk config

 * $msg //=> Untuk ErrorLog

 * $db //=> Untuk koneksi database

 * $smarty //=> Untuk variabel smarty

 * $action //=> Untuk action dari User

 * $page //=> Untuk ambil halaman

 * $search //=> Untuk ambil search request

 * $order //=> Untuk pengurutan searching

  

 * AKSES LEVEL PAGE SYSTEM

 * $fh_username, 

 * $fh_userid, 

 * $fh_userstatus, 

 * $fh_usergroupid



 * Update : 15 Februari 2012

 * Versi 3.0



 *************************************/









$dir = "./";

if (is_dir($dir)) {

	if ($dh = opendir($dir)) {

		while (($file = readdir($dh)) !== false) {

			//*** Jika File Setup masih ada didalam Sistem, maka procedure instalasi tetap dilaksanakan

			if ($file == 'setup.php') {

				header("location:setup.php");
			}
		}

		closedir($dh);
	}
}



//*** Include Database Connection

include("include/database.inc.php");



/************************* Path configuration *********************************/

if ($_SERVER['SERVER_NAME'] == "localhost") {

	$conf['sitefront'] = "http://" . $_SERVER["HTTP_HOST"] . "/upj2023/";

	$conf['site'] = "http://" . $_SERVER["HTTP_HOST"] . "/upj2023/" . basename(dirname(__FILE__)) . "/";

	define("BASE_URL_FRONT", "//" . $_SERVER["HTTP_HOST"] . "/upj2023/");
} else {

	$conf['sitefront'] = "//" . $_SERVER["HTTP_HOST"] . "/integrasi/";

	$conf['site'] =  "//" . $_SERVER["HTTP_HOST"] . "/" . basename(dirname(__FILE__)) . "/";

	define("BASE_URL_FRONT", "//" . $_SERVER["HTTP_HOST"] . "/");
}



define("BASE_DIR", dirname(__FILE__) . "/");



//*** Upload config

define("BASE_DIR_UPLOAD", BASE_DIR . "../upload/");

define("BASE_URL_UPLOAD", BASE_URL_FRONT . "upload/");

define("BASE_DIR_UPLOAD_MODULE", BASE_DIR_UPLOAD . "module/");

define("BASE_URL_UPLOAD_MODULE", BASE_URL_UPLOAD . "module/");



//*** Upload config

define("BASE_URL_THEME_ADMIN", BASE_URL . "templates/scale/");





$conf['path'] = dirname(__FILE__) . "/";

$conf['img'] = $conf['path'] . 'images/';

$conf['lib'] = $conf['path'] . 'lib/';

$conf['inc'] = $conf['path'] . 'include/';

$conf['js'] = $conf['path'] . 'include/js/';

$conf['module'] = $conf['path'] . 'module/';

$conf['modulesite'] = $conf['site'] . 'module/';





/************************ Database Configuration ******************************/

require_once $conf['lib'] . '/adodb/adodb.inc.php';

require_once $conf['lib'] . '/adodb/adodb-pager.inc.php';



$conf['db_hostname'] = 'localhost';

$conf['db_type'] = 'mysql';

$conf['db_debug'] = false;    //=>Debug database



$db =  ADONewConnection($conf['db_type']);

@$db->Connect($conf['db_hostname'], $conf['db_username'], $conf['db_password'], $conf['db_database']);

$db->debug = $conf['db_debug'];



if (!$db->IsConnected()) {

	die("Database connection error...");

	exit;
}







/************************** Smarty Configuration ******************************/

require_once $conf['lib'] . "smarty/SmartyBC.class.php";

$smarty = new SmartyBC;

$smarty->template_dir = 'templates';

$smarty->compile_dir = 'templates_c';

$smarty->debugging = false;     //=>Debug smarty



/********************* Themes Admin Configuration *****************************/

$themesdir_admin = 'scale';

$themesurl_admin = $conf['site'] . 'templates/' . $themesdir_admin . '/';

$baseurl_admin = $conf['site'];

$baseurl = $conf['sitefront'];

$smarty->assign("baseurl", $baseurl);

$smarty->assign("baseurl_admin", $baseurl_admin);

$smarty->assign("themesurl_admin", $themesurl_admin);



/************************** Editor configuration ******************************/

$conf['fck_basepath'] = $conf['site'] . 'lib/fckeditor/';

$conf['fck_toolbarset'] = htmlspecialchars("Default");

$conf['fck_skinpath'] = $conf['site'] . 'lib/fckeditor/editor/skins/' . htmlspecialchars("office2003") . '/';

$conf['fck_width'] = "800px";

$conf['fck_height'] = "300px";

//**** Seting /lib/fckeditor/editor/filemanager/connectors/php/config.php 

//**** Seting $Config['UserFilesPath'] = "nama_project/userfiles

//**** Seting untuk toolbar nya ada di : lib/fckeditor/fckconfig.js (contoh ada di FCKConfig.ToolbarSets["FaberHost"] 

//**** $conf['fck_toolbarset] = htmlspecialchars("FaberHost");







/************************** Mandatory Library File ******************************/

require_once $conf['inc'] . "functions.inc.php";
require_once $conf['inc'] . "functions.security.inc.php";
require_once $conf['inc'] . "functions.access.inc.php";

require_once $conf['inc'] . "functions.pagination.inc.php";

require_once $conf['inc'] . "class.dbcon.php";

require_once $conf['inc'] . "class.encryption.php";

require_once $conf['inc'] . "class.upload.php";

require_once $conf['inc'] . "class.categoryunlimited.php";





/************************** General Library File ******************************/

require_once $conf['inc'] . "functions.image.inc.php";

require_once $conf['inc'] . "functions.file.inc.php";

require_once $conf['inc'] . "class.structuremenu.php";

require_once $conf['inc'] . "class.pagestatis.php";

require_once $conf['inc'] . "class.shoppingcart.php";

require_once $conf['lib'] . "fpdf/fpdf.php";







/**************************** Session Register ********************************/
// SECURITY FIX: Apply secure session settings before starting
secure_session_config();
session_start();
// SECURITY FIX: Generate CSRF token for all admin pages
csrf_generate_token();

if ($_SESSION["fh_server"] == $conf['site']) {

	if ($_SESSION["fh_username"]) $fh_username = $_SESSION["fh_username"];

	if ($_SESSION["fh_userid"]) $fh_userid = $_SESSION["fh_userid"];

	if ($_SESSION["fh_userstatus"]) $fh_userstatus = $_SESSION["fh_userstatus"];

	if ($_SESSION["fh_usergroupid"]) $fh_usergroupid = $_SESSION["fh_usergroupid"];
}





/********************** General Config ******************************/

$basic = basicconfig();

$conf['site_title'] = $basic->fields["fh_sitetitle"];

$conf['fh_general_banner'] = $basic->fields["fh_general_banner"];

$conf['fh_general_pageheader'] = $basic->fields["fh_general_pageheader"];

$conf['project_name'] = $basic->fields["fh_projectname"];

$conf['project_url']  = $basic->fields["fh_projecturl"];

$conf['email_admin']  = $basic->fields["fh_emailadmin"];

$conf['max_userlog'] = $basic->fields["fh_maxuserlog"];

$conf['max_size'] = $basic->fields["fh_maxfilesize"];

$conf['front_page'] = $basic->fields["fh_frontend_page"];

$conf['page'] = $basic->fields["fh_backend_page"];

$conf['webstatus'] = $basic->fields["fh_webstatus"];

$conf['webstatuskey'] = $basic->fields["fh_webstatuskey"];

$conf['fh_companyaddress'] = $basic->fields["fh_companyaddress"];

$conf['fh_companyphone'] = $basic->fields["fh_companyphone"];

$conf['fh_companyemail'] = $basic->fields["fh_companyemail"];

$conf['fh_social_fb'] = $basic->fields["fh_social_fb"];

$conf['fh_social_twt'] = $basic->fields["fh_social_twt"];

$conf['copyright']   = "Copyright &copy; " . date("Y");

$msg = "";  //menyimpan error message;



$tmp_index_title = explode("\n", stripslashes($basic->fields["fh_index_title" . ($_SESSION['lang'] == "_en" ? $_SESSION['lang'] : "")]));



$header_tagline = '';

$j = 1;

for ($i = 0; $i < count($tmp_index_title); $i++) {

	if ($j > 3) {
		$j = 1;
	}

	if ($j == 1) {
		$header_tagline .= '<h2 class="title-topa">' . $tmp_index_title[$i] . '</h2>';
	}

	if ($j == 2) {
		$header_tagline .= '<h2 class="title-topb">' . $tmp_index_title[$i] . '</h2>';
	}

	if ($j == 3) {
		$header_tagline .= '<h2 class="title-topc">' . $tmp_index_title[$i] . '</h2>';
	}

	$j++;
}



$smarty->assign('header_tagline', $header_tagline);



$smarty->assign('conf', $conf);

$smarty->assign("project_name", $conf['project_name']);



/********************** Menu admin ******************************/



if (isset($fh_userid) && $fh_userid != '') {

	//$snarty->debugging = true;



	$fh_menu = array();

	$fh_menu["menulist"] = array();



	/** Ambil semua data di Kategori Menu **/

	$SQL = "SELECT 		*

			FROM		fh_menu_kategori order by fh_kategorimenuid asc";

	$RS  = $db->Execute($SQL);



	if ($RS->fields["fh_kategorimenuid"] != "") {

		$i = 0;



		while (!$RS->EOF) {

			/** Ambil data Menu dari Kategori Menu tertentu **/

			$SQL = "SELECT		*

				 FROM		fh_menu M

				 INNER JOIN	fh_menu_akses A

				 ON			M.fh_menuid = A.fh_menuid			 

				 WHERE		M.fh_kategorimenuid = '" . $RS->fields["fh_kategorimenuid"] . "'

				 AND		A.fh_groupid = '" . $fh_usergroupid . "'

				 ORDER BY	M.fh_menuid ASC";

			$RS2 = $db->Execute($SQL);



			if ($RS2->fields["fh_menuid"] != "") {

				$j = 0;

				$fh_menu["fh_kategorimenuid"][$i] = $RS->fields["fh_kategorimenuid"];

				$fh_menu["fh_name"][$i] = $RS->fields["fh_name"];

				$fh_menu["fh_icon"][$i] = $RS->fields["fh_icon"];

				$fh_menu["fh_slug"][$i] = strtolower(str_replace(' ', '_', $RS->fields["fh_name"]));

				$fh_menu["menulist"][$i] = array();

				while (!$RS2->EOF) {

					$fh_menu["menulist"][$i]["fh_menuid"][$j] 	= $RS2->fields["fh_menuid"];

					$fh_menu["menulist"][$i]["fh_name"][$j] 	= $RS2->fields["fh_name"];

					$fh_menu["menulist"][$i]["fh_url"][$j] 		= $conf['site'] . 'module/' . $RS2->fields["fh_url"];

					$fh_menu["menulist"][$i]["fh_slug"][$j] 	= strtolower(str_replace(' ', '_', $RS2->fields["fh_name"]));

					$fh_menu["menulist"][$i]["activemenu"][$j] 	= basename('module/' . $RS2->fields["fh_url"]) == basename($_SERVER['PHP_SELF']) ? true : false;

					$j++;

					$RS2->MoveNext();
				}

				$fh_menu["activecat"][$i] = in_array(1, $fh_menu["menulist"][$i]["activemenu"]);

				$i++;
			}

			$RS->MoveNext();
		}



		/** Menambahkan link standard diluar database **/

		$i++;
	}



	$smarty->assign("fh_username", $fh_username);

	$smarty->assign("fh_menu", $fh_menu);
}







/********************** Script pengenalan cms baru ******************************/

if (isset($_GET['intro']) || !isset($_SESSION['intro'])) {
	$smarty->assign("show_intro", 1);
	$_SESSION['intro'] = '1';
}





/********************** Deklarasi Class for Encryption ******************************/

$crypt = new hash_encryption('teamleaderfh');



$apikey_rajaongkir = '1b100fec9e69b44c13b06eca9301eec0';



/**************************** Shopping Cart ********************************/

$cart1 = &$_SESSION['wfcart'];

if (!is_object($cart1)) $cart1 = new wfCart();





//***************** Seting GENERAL Parameter GET dan POST *********************/

if ((isset($_GET["action"])) || (isset($_POST["action"]))) {
	if (isset($_GET["action"]))  $action = $_GET["action"];

	else $action = $_POST["action"];
} else $action = "view";



if (!((isset($_GET["order"])) || (isset($_POST["order"]))))  $order = "desc";

else {
	if (isset($_GET["order"]))  $order = $_GET["order"];

	else $order = $_POST["order"];

	if ($order != "asc") {
		$order = "desc";
	}
}



if (!((isset($_GET["page"])) || (isset($_POST["page"]))))  $page = 1;

else {
	if (isset($_GET["page"]))  $page = $_GET["page"];

	else $page = $_POST["page"];
}



if (!((isset($_GET["search"])) || (isset($_POST["search"]))))  $search = "";

else {
	if (isset($_GET["search"]))  $search = $_GET["search"];

	else $search = $_POST["search"];
}



if (!((isset($_GET["search1"])) || (isset($_POST["search1"]))))  $search1 = "";

else {
	if (isset($_GET["search1"]))  $search1 = $_GET["search1"];

	else $search1 = $_POST["search1"];
}



if (!((isset($_GET["search2"])) || (isset($_POST["search2"]))))  $search2 = "";

else {
	if (isset($_GET["search2"]))  $search2 = $_GET["search2"];

	else $search2 = $_POST["search2"];
}
