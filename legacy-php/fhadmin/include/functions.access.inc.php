<?php
//*** function.access.inc.php created by Seto Andry Wibowo
//*** Date : 14 April 2008

//*** fuction access_level_page akan dipakai diseluruh core sistem
//*** Karena akan digunakan untuk me-validasi user admin yang login ke sistem
//*** tabel terkait : tabel fh_menu_akses dan tabel fh_menu 
//*** Output => $akses_level_page : True / False

function access_level_page($fh_usergroupid, $db) {
  global $db;
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

// access type: Add, Edit, And Delete
// By: Bambang Riswanto
// Oktober 2013
// if ($access_level_type->add) {$db->Execute($SQL);	} else { akses_level_die(); }
// if ($access_level_type->edit) {$db->Execute($SQL);	} else { akses_level_die(); }
// if ($access_level_type->delete) {$db->Execute($SQL);	} else { akses_level_die(); }
function access_level_type($fh_usergroupid, $db) {
  global $db;
  if ($fh_usergroupid)
  { $access_level_type = (Object) array(
										'add'=>false,
										'edit'=>false,
										'delete'=>false);
	
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
	    { 
			  if ( $RS2->fields["fh_menuid"] != "" ) {
					$type = explode('-', $RS->fields["fh_aksestype"]);
					if (in_array('A',$type)) { $access_level_type->add = true; }
					if (in_array('E',$type)) { $access_level_type->edit = true; }
					if (in_array('D',$type)) { $access_level_type->delete = true; }
			  }
		}
	 
	  	$RS->MoveNext();
	  }
	}
  }
  return ($access_level_type);  
}

// Menampilkan halaman error akses
// By: Bambang Riswanto
// Oktober 2013
function akses_level_die() {
	global $_POST;
	//echo "<center><br><br><h1>You don't have right access</h1><br></center>";
	echo '<html><body bgcolor="#ececff"><table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td height=150></td></tr>
<tr><td>
    <table width=100% bgcolor=FF4114 cellpadding=0 cellspacing=0>
    <tr><td height=2</td></tr>
    <tr><td>
	  <table width=100% bgcolor=FDC9BD>

	    <tr><td height=75 valign=center align=center>
	        <font color=606060 size=4 face="arial"><b>FaberHost Management System</b><br><font size=2>Sorry, You don\'t have <b>'.(isset($_POST['insert'])?'Add':(isset($_POST['edit'])?'Edit':(isset($_POST['delete']) || isset($_POST['delbanner'])?'Delete':'Any'))).'</b> access for these contents</font></font>
	    </td></tr>
	  </table>
	</td></tr>
    <tr><td height=2></td></tr>
    </table>
    </td>

</tr>
<tr><td height=50></td></tr>
<tr><td align=center><font color=606060 size=2 face="arial">- <a href=http://www.faberhost.com style="text-decoration: none;  color: 606060;" color= size=2 face="arial">&copy; Copyright by FaberHost Data Solution</a> -</font></td></tr>
</table></body></html>
';
	die();
}
?>