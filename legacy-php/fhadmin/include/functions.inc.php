<?php
//*** function.inc.php created by Seto Andry Wibowo
//*** Date : 14 April 2008
//*** Berisi kumulan GENERAL FUNCTION (Untuk Validasi Input)


//*** Filter string menjadi slug untuk link
//*** Added By: Bambang Riswanto
//*** Mei 2014
//*** Contoh: getslug('Buat aku & dia jadi link valid');
//*** hasil : buat-aku-dia-jadi-link-valid

function getslug($text)
{
	$tmp = '';
	$tmp = strtolower($text);
	$tmp = substr($tmp, 0, 30);
	$tmp = trim($tmp);
	$tmp = str_replace(' ', '-', $tmp);
	$tmp = preg_replace('/[^A-Za-z0-9\-]/', '', $tmp);
	$tmp = str_replace(' ', '-', $tmp);

	return $tmp;
}

//*** Pemetaan bulan Bahasa Indonesia
//*** Added By: Bambang Riswanto
//*** Oktober 2013
//*** Contoh: tanggal_indo();

function tanggal_indo($sekarang = true, $date = "")
{
	$ret = "";

	$pemeta = array(
		"01" => "Januari",
		"02" => "Febuari",
		"03" => "Maret",
		"04" => "April",
		"05" => "Mei",
		"06" => "Juni",
		"07" => "Juli",
		"08" => "Agustus",
		"09" => "September",
		"10" => "Oktober",
		"11" => "November",
		"12" => "Desember"
	);
	if (($date != "" && !is_numeric($date)) || $date = "") return false;

	$timestamp = $date;

	if ($sekarang == true) {
		$timestamp = time();
	}

	$day = date("d", $timestamp);
	$month = date("m", $timestamp);
	$year = date("Y", $timestamp);

	$month = $pemeta[$month];
	$ret = $day . " " . $month . " " . $year;
	return $ret;
}

//*** Pemetaan angka (0 s/d 100) ke huruf
//*** By Bambang Riswanto
//*** Oktober 2013
//*** contoh: echo angkatohuruf(25)."<br />";
function angkatohuruf($angka)
{
	$ret = "";
	$pemeta = array(
		"Nol",
		"Satu",
		"Dua",
		"Tiga",
		"Empat",
		"Lima",
		"Enam",
		"Tujuh",
		"Delapan",
		"Sembilan",
		"Sepuluh",
		"Sebelas"
	);
	$angka = intval($angka);


	if (strlen($angka) == 1 || $angka <= 11) {
		$ret = $pemeta[$angka];
	} elseif (strlen($angka) == 2) {
		if ($angka > 11 && $angka < 20) {
			$ret = $pemeta[substr($angka, 1, 1)] . " Belas";
		} elseif (substr($angka, 1, 1) == 0) {
			$ret = $pemeta[substr($angka, 0, 1)] . " Puluh";
		} else {
			$ret = $pemeta[substr($angka, 0, 1)] . " Puluh " . $pemeta[substr($angka, 1, 1)];
		}
	} elseif (strlen($angka) == 3) {
		$ret = "Seratus";
	}
	return $ret;
}


//*** Added By: Bambang Riswanto
//*** Juni 2013
//*** Untuk cek / Create / chmod folder => Return True / False
//*** Contoh:  cek_mod_dir("/path/ke/foldernya/");
//*** Contoh2:  cek_mod_dir("/path/ke/foldernya/", 0755);

function cek_mod_dir($path = false, $mode = 0777)
{
	if ($path) {
		if (file_exists($path) && function_exists("chmod")) {
			if (chmod($path, $mode)) {
				return true;
			} else {
				return false;
			}
		} else {
			if (function_exists("mkdir")) {
				if (mkdir($path, $mode, true)) {
					return true;
				} else {
					return false;
				}
			}
		}
	}
}


//*** Untuk validasi email => Return True / False
function check_email($str)
{
	$str = strtolower($str);
	return (ereg("^([^[:space:]]+)@(.+).(ad|ae|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|fi|fj|fk|fm|fo|fr|fx|ga|gb|gov|gd|ge|gf|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nato|nc|ne|net|nf|ng|ni|nl|no|np|nr|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$", $str));
}

//*** Untuk validasi Nama (Input hanya huruf, spasi dan titik) => Return True / False
function check_name($str)
{
	return (ereg("^[[:alpha:]]([[:alpha:]]|[[:space:]]|[.]+)+$", $str));
}


//*** Untuk validasi besar file => Return True / False
function check_file_size($str, $max_size)
{
	$file_size = $str['size'];
	if ($file_size > $max_size) return false;
	else return true;
}

//*** Check image type : GIF, JPG, PNG, BMP Supported
function check_image_type($source_pic)
{
	$image_info = getimagesize($source_pic['tmp_name']);

	switch ($image_info['mime']) {
		case 'image/gif':
			if (imagetypes() & IMG_GIF) return true;
			else return false;
			break;

		case 'image/jpeg':
			if (imagetypes() & IMG_JPG) return true;
			else return false;
			break;

		case 'image/png':
			if (imagetypes() & IMG_PNG) return true;
			else return false;
			break;

		case 'image/wbmp':
			if (imagetypes() & IMG_WBMP)  return true;
			else return false;
			break;

		default:
			return false;
			break;
	}
}



//*** Function convert ke Rupiah
function convert_uang($price, $cur = "USD ")
{
	$price = number_format($price, 0, ',', '.');
	$result = $cur . " " . $price . ",-";
	return ($result);
}


//*** Function convert ke Tanggal
function convert_tanggal($tanggal)
{
	return (date("d-m-Y", strtotime($tanggal)));
}


//*** Function convert ke Tanggal dan Waktu
function convert_tanggalwaktu($tanggal)
{
	return (date("d-m-Y G:i:s", strtotime($tanggal)));
}



//*** Mysql untuk type enum
//*** cara panggil fungsi ini => $optarray = enum("table.column");
//*** hasil return nya untuk $optarray berupa array -> untuk check dapat di 
//*** echo "<pre>";
//*** print_r ($optarray);
//*** echo "</pre>";
function enum($object)
{
	list($table, $col) = explode(".", $object);
	$row = @mysql_fetch_assoc(mysql_query("SHOW COLUMNS FROM " . $table . " LIKE '" . $col . "'"));
	return ($row ? explode("','", preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $row['Type'])) : array(0 => 'None'));
}


//*** Function untuk debug inputan
function debugvar($datadebug)
{
	echo "<pre>";
	print_r($datadebug);
	echo "</pre>";
}



//*** Untuk insert log user
// SECURITY FIX: Escape all parameters to prevent SQL injection
function insert_log($action_log, $pagetitle_log, $description_log)
{
	global $db;
	global $fh_userid;
	global $fh_usergroupid;

	if ($fh_userid == "") $fh_userid = '0';
	if ($fh_usergroupid == "") $fh_usergroupid = '0';

	$SQL1 = "INSERT INTO	fh_userlog (fh_userid, fh_usergroupid, fh_pagetitle, fh_action, fh_description, fh_date)
			 VALUES			(" . intval($fh_userid) . " , " . intval($fh_usergroupid) . " , " . $db->qstr($pagetitle_log) . " , " . $db->qstr($action_log) . " , " . $db->qstr($description_log) . ", now())";
	$db->Execute($SQL1);
}



//*** Untuk Basic Config
function basicconfig()
{
	global $db;

	$SQL = "SELECT * FROM fh_basicconfig LIMIT 0,1";
	return ($db->Execute($SQL));
}


function get_order_status($status_code)
{
	$array_status = array(
		0 => 'Waiting Payment',
		1 => 'Payment Finished',
		2 => 'Order on the way',
		3 => 'Confirmed',
		99 => 'Canceled'
	);

	return $array_status[$status_code];
}



function createPermalink($str)
{
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);

	return $clean;
}


function createPermaKey($table, $str)
{
	global $db;
	$tempstr = createPermalink($str);
	$SQL = 'SELECT * FROM ' . $table . ' WHERE content_permalink=' . $db->qstr($tempstr) . '  ';
	$RS = $db->Execute($SQL);
	if ($RS->fields['content_permalink'] != "") {
		$rand 	=  chr(rand(97, 122));
		$return = createPermaKey($table, $str . ' ' . $rand);
	} else {
		$return = $tempstr;
	}
	return $return;
}



function MY_arraywalkrecursive(&$array, $function)
{
	static $recursive_counter = 0;
	if (++$recursive_counter > 1000) {
		die('possible deep recursion attack');
	}
	foreach ($array as $key => $value) {
		if (is_array($value)) {
			MY_arraywalkrecursive($array[$key], $function, $apply_to_keys_also);
		} else {
			$array[$key] = $function($value);
		}
	}
	$recursive_counter--;
}
@set_magic_quotes_runtime(0);
if (function_exists('get_magic_quotes_gpc') &&   @get_magic_quotes_gpc()) {
	MY_arraywalkrecursive($_GET, 'stripslashes', true);
	MY_arraywalkrecursive($_POST, 'stripslashes', true);
	MY_arraywalkrecursive($_COOKIE, 'stripslashes', true);
	MY_arraywalkrecursive($_REQUEST, 'stripslashes', true);
}
