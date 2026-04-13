<?php
/*
* Ajax load list menu
* By: Bambang Riswanto
* Februari 2014
*/
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");
$ret = '';
//$db->debug = true;
if (isset($_POST["get_list_menu"])) {
	//print_r($_POST);
	$cat = $_POST["cat"];
	$selected = $_POST["selected"];
	$SQL = "SELECT	*	FROM	fh_pagestatis
				WHERE	fh_menu_catselected LIKE '%".$cat."%'
				AND		fh_strukturstatus = 'Active'";
	$RS = $db->Execute($SQL);
	
	//$ret .= '<option value="">-- Choose One --</option>';
	if ($RS->fields["fh_strukturid"] != "") {
		while (!$RS->EOF) {
			$ret .= '<option value="'.$RS->fields["fh_strukturid"].'"'.(( $selected!="" && $selected>0 &&$selected == $RS->fields["fh_strukturid"])?' selected':'').'>'.$RS->fields["fh_menu_name"].'</option>';
			$RS->MoveNext();
		}
	} else { $ret = 'error';}
	echo $ret;
}


?>