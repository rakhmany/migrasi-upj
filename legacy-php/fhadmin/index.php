<?php
require_once("config.inc.php");
define("FIXREDIRECT", true);
// require_once("back.config.inc.php");

if ($_GET["setupmsg"]) {
	if ($_GET["setupmsg"] == "finished") {
		$_SESSION['tmp_msg'] = "Basic Instalation Finished<br>";
	}
}

?>
<?php
$meta_tag = '<title>'.$conf['site_title'].'</title>
<meta name="author" content="FaberHost Indonesia - Seto Andry Wibowo">
<meta name="copyright" content="FaberHost Indonesia">
<meta name="creator" content="Webmaster">';
$smarty->assign('meta_tag',$meta_tag);
$smarty->assign('fh_username',$fh_username);
if (isset($fh_userid)) {
	//$snarty->debugging = true;
	
	$title = 'Dasboard';
	$smarty->assign('title',$title);
	$smarty->assign("meta_title",$conf["site_title"]. " - " .$conf["project_name"]);
	$smarty->assign("dir_templates","templates/");
	$smarty->assign("dir_styles","templates/menu_whm/");
	

	$smarty->display($themesdir_admin."/index.tpl");

} else {
	$title = 'Login Page';
	
	$smarty->assign('title',$title);
	$smarty->display($themesdir_admin."/login.tpl");
}
?>
