<?php
require_once("config.inc.php");

if (isset($_POST["submit"]))
{ $username=trim($_POST["username"]);
  $email=trim($_POST["email"]);

   if ($username == "") $msg = "Please input username<br>"; 
   if (!(check_email($email))) $msg = "Please input valid email<br>"; 
   if (!( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) )) {
        $msg .= "Invalid Security Code<br>"; 
   }
   
   if ($msg == "") { 
      $SQL = "SELECT 	    * 
              FROM 			fh_user 
              WHERE 	    fh_username = '".$username."' and fh_email = '".$email."' ";
      $RS  = $db->Execute($SQL);
      if ($RS->fields["fh_email"] != "")
      {   //*** Proses Reset Password
          $acceptedChars = 'abcdefghijklmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
          $max = strlen($acceptedChars)-1;
          $tmp_password = null;
          for($i=0; $i < 10; $i++) {
            $tmp_password .= $acceptedChars{mt_rand(0, $max)};
          }
          $encrypted = $crypt->encrypt($tmp_password);

          $SQL1 =  "UPDATE		 	fh_user 
                    SET				fh_password='".$encrypted."'
                    WHERE			fh_userid = ".$RS->fields["fh_userid"];
          $db->Execute($SQL1);

          //*** Proses Send Email
          $email  = "From: Administrator ".$conf['project_name']." <".$conf['email_admin'].">\r\n";
          $email .= "MIME-Version: 1.0\r\n";
          $email .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
          $email .= "Content-Transfer-Encoding: 7bit\r\n";
          $judul="[".$conf['project_name']."] Reset Password";
          $isi="Kepada,\n";
          $isi.=$RS->fields["fh_name"] ."\n\n";
          $isi.="Kami telah menerima permintaan Forgot Password dari sistem ".$conf["project_name"].", Oleh karena itu kami melakukan reset Password anda sebagai berikut : \n\n";
          $isi .="Username : ".$RS->fields["fh_username"]." \n";
          $isi.="Password : ".$tmp_password."\n\n";

          $isi.="Permintaan Forgot Password kami terima pada :\n";
          $isi .= "Tanggal = ".date('j-M-Y  H:i:s ')."\n";
          $isi .= "IP = ".$_SERVER["REMOTE_ADDR"]."\n";
          $isi .= "HOSTNAME = ". gethostbyaddr($_SERVER['REMOTE_ADDR']) .": \n\n";

          $isi.="Demikian informasi dari kami. Terimakasih \n";
          $isi.="Admin ".$conf["project_name"]."\n";

          $tujuan=$RS->fields["fh_email"];
          @mail($conf['email_admin'],$judul,$isi,$email);
          @mail($tujuan,$judul,$isi,$email);

          $_SESSION["tmp_msg"] = "Your Password has been sent to your email";
          header("location:index.php");
      } else {$msg = "Fail... Plase contact your Administrator<br>"; }
   }
}
?>

<html>
<head>
    <title><?php echo $conf['site_title']; ?></title>
	<meta name="author" content="FaberHost Indonesia - Seto Andry Wibowo">
	<meta name="copyright" content="FaberHost Indonesia">
	<meta name="creator" content="Webmaster">
	<link rel="stylesheet" href="css.css" type="text/css">
</head>

<body class=bodyheader>
<table height=63>
  <tr><td><img src=images/bannerlogo.jpg><td></tr>
</table>

<table align=center id=logincontainer>
<tr><td>
        <div id=loginheader1>&nbsp; <a href="<?php echo $conf['project_url']; ?>" style="color:white;"><?php echo $conf['project_name']; ?></a></div>
		<div id=loginheader2>FORGOT YOUR PASSWORD ?? &nbsp;</div>
		<div class=bgwhite>
		<table id=logincontent>
		<tr><td colspan=4 height=30></td></tr>
		<form method=post action=forgetpass.php>
		<tr><td style="width:120px;"></td>
			<td style="width:147px; text-align:center;"><img src=images/forgot.jpg><br><a href=index.php><h2><b>Back to Login</b></h2></a></td>
		    <td style="width:293px; padding:10px 0px 10px 20px; background:#ececff;">
		    	<?php if ($msg!="") echo "<font class=red style='font-size:14px;'><b>".$msg."<br></b></font>"; ?>
		    	
				<h3><b>Username : </b></h3><input type="text" name="username" maxlength=50 size=50><br><br>
				<h3><b>Email : </b></h3><input type="text" name="email" maxlength=100 size=50><br><br>
                <h3><label for="security_code"><b>Security Code : </b><input id="security_code" name="security_code" type="text" maxlength=7 size=8/></label></h3><img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br><br>
				<input type="submit" name="submit" value="  Submit  " src="images/submit.jpg"><br><br>

			</td>
			<td style="width:120px;"></td>
		</tr>
		</form>
		<tr><td colspan=4 height=30></td></tr>
		</table>
		</div>
		<div id=loginfooter>&copy; Copyright <?php echo date("Y"); ?> - All rights reserved by faberhost.com</div>
</td></tr>
</table>


</body>
</html>
</html>