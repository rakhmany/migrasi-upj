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

		$ssql = 'select * from ' . $_GET['t'] . ' where ' . $_GET['p'] . '=' . intval($_GET['i']) . '; ';

		$RS = $db->Execute($ssql);
		$sres = $RS->fields;

		if (isset($sres[$_GET['p']])) {

			if (@file_exists('../../../upload/' . $sres['mainimagename'])) {

				@unlink('../../../upload/' . $sres['mainimagename']);
			}

			if (@file_exists('../../../upload/thumb_' . $sres['mainimagename'])) {

				@unlink('../../../upload/thumb_' . $sres['mainimagename']);
			}



			$dsql = 'update ' . $_GET['t'] . ' set mainimagename=\'\' where ' . $_GET['p'] . '=' . intval($_GET['i']) . '; ';

			$db->Execute($dsql);
		}

		header('Location: ./' . $_GET['f'] . '?action=detail&data_primarykey=' . intval($_GET['i']));
	}



	if (isset($_GET['remove2']) && intval($_GET['i']) > 0 && trim($_GET['p']) != '' && $_GET['t'] != '' && $_GET['f'] != '') {

		$ssql = 'select * from ' . $_GET['t'] . ' where ' . $_GET['p'] . '=' . intval($_GET['i']) . '; ';

		$RS = $db->Execute($ssql);
		$sres = $RS->fields;

		if (isset($sres[$_GET['p']])) {

			if (@file_exists('../../../upload/' . $sres['mainimagename2'])) {

				@unlink('../../../upload/' . $sres['mainimagename2']);
			}

			if (@file_exists('../../../upload/thumb_' . $sres['mainimagename2'])) {

				@unlink('../../../upload/thumb_' . $sres['mainimagename2']);
			}



			$dsql = 'update ' . $_GET['t'] . ' set mainimagename2=\'\' where ' . $_GET['p'] . '=' . intval($_GET['i']) . '; ';

			$db->Execute($dsql);
		}

		header('Location: ./' . $_GET['f'] . '?action=detail&data_primarykey=' . intval($_GET['i']));
	}
}
