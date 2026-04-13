<?php

require_once("../../config.inc.php");

if (isset($fh_userid)) {
	// SECURITY FIX: Validate table and column names to prevent SQL injection
	if (isset($_GET['t']) && !validate_table_name($_GET['t'])) {
		die('Invalid table parameter');
	}
	if (isset($_GET['p']) && !validate_column_name($_GET['p'])) {
		die('Invalid column parameter');
	}


	if (isset($_GET['remove']) && intval($_GET['i']) > 0 && trim($_GET['p']) != '' && $_GET['t'] != '' && $_GET['f'] != '') {
		$mainimage_ = isset($_GET['d'])  ? $_GET['d'] : 'mainimagename';
		$ssql = 'select * from ' . $_GET['t'] . ' where ' . $_GET['p'] . '=' . intval($_GET['i']) . '; ';
		$sres = @mysql_fetch_assoc(mysql_query($ssql));
		if (isset($sres[$_GET['p']])) {
			if (@file_exists('../../../upload/' . $sres[$mainimage_])) {
				@unlink('../../../upload/' . $sres[$mainimage_]);
			}
			if (@file_exists('../../../upload/thumb_' . $sres[$mainimage_])) {
				@unlink('../../../upload/thumb_' . $sres[$mainimage_]);
			}

			$dsql = 'update ' . $_GET['t'] . ' set ' . $mainimage_ . '=\'\' where ' . $_GET['p'] . '=' . intval($_GET['i']) . '; ';
			$dres = @mysql_query($dsql);
		}
		header('Location: ./' . $_GET['f'] . '?action=detail&data_primarykey=' . intval($_GET['i']));
	}
}
