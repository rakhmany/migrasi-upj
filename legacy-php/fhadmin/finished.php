<?php
/*
//*** Step Setup
//*** 1. Create Config Database di dalam : include/database.inc.php
//***    --> Berisi Database Connection Ketika Setup
//*** 2. Instalasi coresistem database (eksekusi file sql standard)
//*** 3. Menghapus file setup.php
*/

session_start();

if ($_POST["submit"]) {
	//*** Step 1
	//*** Buat File include/dabatase.inc.php
	//*** Sebagai Koneksi Dasar
	
	$databasename1 = $_POST["databasename1"];
	$username1 = $_POST["username1"];
	$password1 = $_POST["password1"];
	$databasename2 = $_POST["databasename2"];
	$username2 = $_POST["username2"];
	$password2 = $_POST["password2"];

	$msg="";
	if ($databasename1 == '') $msg.= "Please input Databasename for Localhost<br>";
	if ($username1 == '') $msg.= "Please input Username for Localhost<br>";
	if ($databasename2 == '') $msg.= "Please input Databasename for Server<br>";
	if ($username2 == '') $msg.= "Please input Username for Server<br>";
	if ($password2 == '') $msg.= "Please input Password for Server<br>";
	if (!( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) )) { $msg.="Please input valid security code<br>"; }
	
	if ($msg =="") {
		
		$fp = fopen('include/database.inc.php', 'w+');
		fwrite($fp,'<?php
if ($_SERVER["SERVER_NAME"] == "localhost") {
  $conf["db_username"] = "'.$username1.'";
  $conf["db_password"] = "'.$password1.'";
  $conf["db_database"] = "'.$databasename1.'";
} else {
  $conf["db_username"] = "'.$username2.'";
  $conf["db_password"] = "'.$password2.'";
  $conf["db_database"] = "'.$databasename2.'";
}
?>');
		fclose($fp);
		


		//*** Step 2
		//*** a. Set Koneksi Database 
		//*** b. Extract FaberCMS.sql => Berisi Tabel Core Sistem FaberCMS
		$conf['db_hostname'] = 'localhost';
		$conf['db_type'] = 'mysql';
		$conf['db_debug'] = false;    //=>Debug database
		if ($_SERVER["SERVER_NAME"] == "localhost") {
		  $conf['path'] = dirname(__FILE__) . "/";
		  $conf['site'] = "http://" . $_SERVER["HTTP_HOST"] . "/fabercms/" . basename(dirname(__FILE__)) . "/";
		  $conf["db_username"] = $username1;
		  $conf["db_password"] = $password1;
		  $conf["db_database"] = $databasename1;
		} else {
		  $conf['path'] =  dirname(__FILE__) . "/";
		  $conf['site'] =  "http://" . $_SERVER["HTTP_HOST"] . "/" . basename(dirname(__FILE__)) . "/";
		  $conf["db_username"] = $username2;
		  $conf["db_password"] = $password2;
		  $conf["db_database"] = $databasename2;
		}
		$conf['lib'] = $conf['path']. 'lib/';
		require_once $conf['lib'] . '/adodb/adodb.inc.php';
		require_once $conf['lib'] . '/adodb/adodb-pager.inc.php';

		$db =  ADONewConnection($conf['db_type']);
		@$db -> Connect($conf['db_hostname'], $conf['db_username'], $conf['db_password'], $conf['db_database']);
		$db -> debug = $conf['db_debug'];
		if (!$db->IsConnected()) {
			$msg = "Database Connection Error...<br>";
		} else {
			//*** Extract File FaberCMS.sql
			$sql_dir = ".";
			$tmp_dh = opendir($sql_dir);
			while (($tmp_file = readdir($tmp_dh)) !== false) {
				$extension = end(explode(".", $tmp_file));
				if ($extension == "sql")  {
					$handle = @fopen($sql_dir."/".$tmp_file, "r");
					if ($handle) {
						while (!feof($handle)) {
							$tmp_data = fgets($handle, 4096);
							if (trim($tmp_data) != "" && strpos($tmp_data, "--") === false) {
								$query .= $tmp_data;
								if (preg_match("/;/", $tmp_data)) {
									$RS = $db->Execute($query);
									$query = "";
								}
							}
						}
						fclose($handle);
					}                  
				} 
			}
			
			//*** STEP 3
			//*** Rename File Setup.php
			rename("setup.php","finished.php");

			//*** STEP 4
			//*** Activasi Selesai, Lempar Ke Index.php
			header("location:index.php?setupmsg=finished");
		}
	}
}

?>

<html>
<head>
  <title>Setup FaberCMS</title>
  <meta name="author" content="FaberHost Indonesia - Seto Andry Wibowo">
  <meta name="copyright" content="FaberHost Indonesia">
  <meta name="creator" content="Webmaster">
  <link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>
<body class=bodyheader>
<table height=63>
  <tr><td><img src=images/bannerlogo.jpg><td></tr>
</table>

<table align=center id=logincontainer>
<tr><td>
    <div id=loginheader1></div>
	<div id=loginheader2>Basic Setup FaberCMS &nbsp;</div>
	<div class=bgwhite>
	<table id=logincontent>
		<tr><td colspan=4 height=30></td></tr>
		<tr><td>
			<table>
			<form method=post action=setup.php>
			<tr><td style="width:100px;"></td>
				<td style="width:167px; text-align:center;"><img src=images/setup.jpg><br><h2><b>Setup FaberCMS</b><h2></td>
				<td style="width:293px; padding:10px 0px 10px 20px; background:#ececff;">
					<table>
					<tr><td colspan=3 height=10></td></tr>
					<?php
						if ($msg != "") {
							echo "<tr><td colspan=3><h3><font color=red><b>".$msg."</b></font></h3></td></tr>";
							echo "<tr><td colspan=3 height=30></td></tr>";
						}						
					?>
					<tr><td colspan=3><h2><b>Localhost</b></h2></td></tr>
					<tr><td colspan=3 height=10></td></tr>
					<tr><td class=wdth120><h3>Database Name</td>
					    <td class=wdth10><h3> : </h3></td>
						<td><input type=text name='databasename1' maxlength=50 size=20 value='<?php echo $databasename1; ?>'></td>
					</tr>
					<tr><td><h3>Username</h3></td>
					    <td><h3> : </td>
						<td><input type=text name='username1' maxlength=50 size=20 value='<?php echo $username1; ?>'></td>
					</tr>
					<tr><td><h3>Password</h3></td>
					    <td><h3> : </td>
						<td><input type=text name='password1' maxlength=50 size=20 value='<?php echo $password1; ?>'></td>
					</tr>
					
					<tr><td colspan=3 height=30></td></tr>
					<tr><td colspan=3><h2><b>Server</b></h2></td></tr>
					<tr><td colspan=3 height=10></td></tr>
					<tr><td class=wdth120><h3>Database Name</td>
					    <td class=wdth10><h3> : </h3></td>
						<td><input type=text name='databasename2' maxlength=50 size=20 value='<?php echo $databasename2; ?>'></td>
					</tr>
					<tr><td><h3>Username</h3></td>
					    <td><h3> : </td>
						<td><input type=text name='username2' maxlength=50 size=20 value='<?php echo $username2; ?>'></td>
					</tr>
					<tr><td><h3>Password</h3></td>
					    <td><h3> : </td>
						<td><input type=text name='password2' maxlength=50 size=20 value='<?php echo $password2; ?>'></td>
					</tr>
					
					<tr><td colspan=3 height=30></td></tr>
					<tr><td><h3><h3>Security Code</h3></td>
					    <td><h3> : </h3></td>
						<td><label for="security_code"><input id="security_code" name="security_code" type="text" maxlength=7 size=8/></label><br>
							<img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" />
						</td>
					</tr>
					
					<tr><td colspan=3 height=30></td></tr>
					<tr><td colspan=2></td>
					    <td><input type="submit" name="submit" value="  Submit  " ></td>
					<tr><td colspan=3 height=30></td></tr>
					</table>
				</td>
				<td style="width:120px;"></td>
			</tr>
			</form>
				
			</table>
			</td>
		</tr>
		<tr><td colspan=4 height=30></td></tr>
	</table>
	</div>
	</td>
 </tr>
</table>

<br><br>

</body>