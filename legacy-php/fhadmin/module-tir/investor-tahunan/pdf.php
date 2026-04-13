<?php
 
require_once("../../config.inc.php");

if (isset($fh_userid))
{
	 
	if(isset($_GET['remove']) && intval($_GET['i']) > 0 && trim($_GET['p']) != '' && $_GET['t'] != '' && $_GET['f'] != '')
	{
		$ssql = 'select * from '.$_GET['t'].' where '.$_GET['p'].'='.intval($_GET['i']).'; ';
		$RS = $db->Execute($ssql); $sres = $RS->fields;
		if(isset($sres[$_GET['p']]))
		{
			if(@file_exists('../../../upload/'.$sres['mainpdfname']))
			{
				@unlink('../../../upload/'.$sres['mainpdfname']);
			}
			 
			$dsql = 'update '.$_GET['t'].' set mainpdfname=\'\' where '.$_GET['p'].'='.intval($_GET['i']).'; ';
			$db->Execute($dsql);
		}
		header('Location: ./'.$_GET['f'].'?action=detail&data_primarykey='.intval($_GET['i']));
	}
	 
}

?>