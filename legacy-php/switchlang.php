<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 13 April 2008
  * @copyright by FaberHost.com
  
  * Update : 1 November 2012
  * Versi 1.0

  * Switch Language
*************************************/
 
    
include ("fhadmin/config.inc.php");
include ("front.config.inc.php");

// SECURITY FIX: Prevent Open Redirect vulnerability
$next = isset($_GET['next']) && $_GET['next'] != '' ? $_GET['next'] : 'index.php';
// Block external URLs and protocol-relative URLs
if(strpos($next, '://') !== false || strpos($next, '//') === 0 || strpos($next, 'javascript:') !== false) {
    $next = 'index.php';
}
// Only allow alphanumeric, dash, underscore, slash, dot, and question mark
$next = preg_replace('/[^a-zA-Z0-9._\/?&=-]/', '', $next);

header("location: ".$next);
exit;