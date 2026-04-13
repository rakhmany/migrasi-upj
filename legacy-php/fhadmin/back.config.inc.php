<?php
/*
//*** Backend Config
//*** Config for admin pages
//*** SECURITY FIX: Improved session validation and timeout
*/

if (!isset($fh_userid)) {
	if (!defined("FIXREDIRECT")) {
		header("location: " . $baseurl_admin . "");
	}
	exit;
} else {

	// SECURITY FIX: Validate session integrity
	if (empty($_SESSION['fh_userid']) || empty($_SESSION['fh_server'])) {
		session_destroy();
		header("location: " . $baseurl_admin . "");
		exit;
	}

	if (isset($_SESSION['locked'])) {
		header("location: " . $baseurl_admin . "locked.php");
		exit;
	}

	// SECURITY FIX: Reduced timeout from 24h to 2h
	$session_timeout = 2 * 60 * 60;
	if (!isset($_SESSION["fh_timeout"])) {
		$_SESSION["fh_timeout"] = time() + $session_timeout;
	} else {
		if ($_SESSION["fh_timeout"] < time()) {
			session_destroy();
			header("location: " . $baseurl_admin . "");
			exit;
		} else {
			$_SESSION["fh_timeout"] = time() + $session_timeout;
		}
	}
}
