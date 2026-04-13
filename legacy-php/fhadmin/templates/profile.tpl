<html>
<head>
	  <title>FaberCMS</title>
	  <meta name="author" content="FaberHost Data Solution - Seto Andry Wibowo">
	  <meta name="copyright" content="FaberHost Data Solution">
	  <meta name="creator" content="Webmaster">
</head>
<link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<div id=worksheet>
  <div id=header>
  <h1><span><img src=images/icon1.gif> Edit Profile</span></h1>
  <hr class=black>
  </div>
</div>


<div id=worksheet>
  <div id=tabelform>
  <table>
  {if $msg neq ''}<tr><td colspan=3><span class=red>{$msg}</span><br><br></td></tr>{/if}

  <form name=form method=post enctype="multipart/form-data"  action={php}echo $_SERVER['PHP_SELF']; {/php}>
  {if $fh_userid neq ''}
  <tr><td>Group</td>
      <td>:</td>
      <td>{$fh_usergroupname}</td>
  </tr>
  <tr><td>Username</td>
      <td>:</td>
      <td><input type=hidden name=fh_userid value='{$fh_userid}'><input type=hidden name=fh_username value='{$fh_username}'>{$fh_username}</td>
  </tr>
  <tr><td>Password</td>
      <td>:</td>
      <td><input type=password name=fh_password value='{$fh_password}'></td>
  </tr>

  <tr><td colspan=3 height=20></td></tr>
  
  <tr><td colspan=3><b>Personal Information</b></td></tr>
  <tr><td colspan=3 height=5></td></tr>

  <tr><td>Name</td>
      <td>:</td>
      <td style="width:100%;"><input type=text name=fh_name maxlength=255 size=40 value='{$fh_name}'><font class=red>*</font></td>
  </tr>

  <tr><td>Address</td>
      <td>:</td>
      <td style="width:100%;"><input type=text name=fh_address maxlength=255 size=70 value='{$fh_address}'></td>
  </tr>

  <tr><td>Phone</td>
      <td>:</td>
      <td style="width:100%;"><input type=text name=fh_phone maxlength=20 size=20 value='{$fh_phone}'></td>
  </tr>

  <tr><td>Mobile</td>
      <td>:</td>
      <td style="width:100%;"><input type=text name=fh_mobile maxlength=32 size=30 value='{$fh_mobile}'></td>
  </tr>

  <tr><td>Email</td>
      <td>:</td>
      <td style="width:100%;"><input type=text name=fh_email maxlength=100 size=45 value='{$fh_email}'><font class=red>*</font></td>
  </tr>
  <tr><td colspan=3 height=20></td></tr>
  
  <tr><td colspan=2></td>
      <td><input type=submit value='save' name=edit>
	  	  <input type=reset value=reset></td>
  </tr>
  {/if}  
  </form>
  </table>
  </div>

</div>

</body>
</html>




