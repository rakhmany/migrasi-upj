<?php   
include ("fhadmin/config.inc.php");

$_SESSION["lang"] = '_id';
if(isset($_SERVER['HTTP_REFERER'])) {
    
    header('location: '.$_SERVER['HTTP_REFERER'].'');
}
else
{
	header('location: ./');
}
exit();
?>