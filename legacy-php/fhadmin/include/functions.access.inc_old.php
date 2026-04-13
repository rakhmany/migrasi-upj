<?php
//*** function.access.inc.php created by Seto Andry Wibowo
//*** Date : 14 April 2008

//*** fuction access_level_page akan dipakai diseluruh core sistem
//*** Karena akan digunakan untuk me-validasi user admin yang login ke sistem
//*** tabel terkait : tabel fh_menu_akses dan tabel fh_menu 
//*** Output => $akses_level_page : True / False

function access_level_page($fh_usergroupid, $db) {
  if ($fh_usergroupid)
  { $akses_level_page = false;
    $akses_filename   = trim(basename($_SERVER['PHP_SELF']));  
	
	$SQL = "SELECT 		* 
		    FROM		fh_menu_akses 
		    WHERE		fh_groupid = '".$fh_usergroupid."'";
	$RS  = $db -> Execute($SQL);
	
	if ($RS->fields["fh_menuid"] != "") {
	  while (!$RS->EOF) {
	    $SQL = "SELECT 			*
  	     	    FROM			fh_menu
	  	   	    WHERE			fh_menuid = ".$RS->fields["fh_menuid"];
	    $RS2 = $db -> Execute($SQL);
	  
	    if ( ($RS2->fields["fh_menuid"] != "") and ($RS2->fields["fh_filename"] == $akses_filename))
	    {  $akses_level_page = true; }
	 
	  	$RS->MoveNext();
	  }
	}
  }
  return ($akses_level_page);  
}
?>