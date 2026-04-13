<?php   
include ("fhadmin/config.inc.php");

$_SESSION["lang"] = '_en';
if(isset($_SERVER['HTTP_REFERER'])) {
    
    header('location: '.$_SERVER['HTTP_REFERER'].'');
}
else
{
	header('location: ./');
}
exit();
?>