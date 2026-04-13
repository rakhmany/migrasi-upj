<?php
require_once("config.inc.php");
// error_reporting(E_ALL);
$title = 'Locked Page';
$errmsg = '';

if (isset($_POST['unlock']) || isset($_POST['passwd'])) {
	$password = trim($_POST['passwd']);
	$SQL = "SELECT 	* 
                   FROM 	    fh_user 
                   WHERE 	    fh_username = '".$fh_username."'";
	$RS =$db->Execute($SQL);
	
	if ($RS->fields["fh_userid"] != "") {
		$fh_password = trim($crypt->decrypt($RS->fields["fh_password"]));

		if ($password == $fh_password) {
			$_SESSION['locked'] = false;
			unset($_SESSION['locked']);
			$_SESSION["fh_timeout"] = strtotime("+1d");
			header("location:".$baseurl_admin);
			echo $baseurl_admin;
			exit;
		} else {
			$errmsg = 'Wrong Password <br />';
		}
	}
}

if (!isset($fh_userid)) {
	header("location: ".$baseurl_admin."");
	exit;
}
$_SESSION['locked'] = $fh_username;

$smarty->assign("title", $title);
$smarty->assign("errmsg", $errmsg);
$smarty->display($themesdir_admin."/locked.tpl");

?>