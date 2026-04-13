<?php
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

 
if ($fh_userid)
{
	if(isset($_POST) && sizeof($_POST) > 0 )
	{
		if($_POST['i'] == 'true' || $_POST['i'] == 1)
		{
			$new_status = 1;
			$new_status_name = 'Show';
		}
		else
		{
			$new_status = 0;
			$new_status_name = 'Hidden';
		}  
		$sql = 'update d_software set   d_product_status='.$new_status.' where  d_product_id=\''.intval($_POST['e']).'\' ';
		if(mysql_query($sql))
		{
			 echo 'Status berhasil dirubah ('.$new_status_name.') !';
		}
		 
	}
} 
?>