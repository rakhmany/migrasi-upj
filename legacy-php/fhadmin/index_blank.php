<?php include("config.inc.php"); ?>

<html>
  <head><title><?php echo $conf['site_title'] . " - " . $conf['project_name']; ?></title>
  <link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>
<table class=center style="width:100%">
  <tr><td height=100></td></tr>
  <tr><td><h1 class=center>Welcome to <?php echo $conf['project_name']; ?> Content Management System</h1></td></tr>
  <tr><td height=5></td></tr>
  <tr><td><h2 class=center>Powered by <?php echo $conf['site_title']; ?></h2></td></tr>
  <tr><td height=15></td></tr>
  <tr><td><h5 class=center><?php echo date("l, j-F-Y"); ?></h5></td></tr>
  <tr><td height=30></td></tr>
  <tr><td><h5 class=center><i>Please don't forget to logout after finish your work. Thanks... :)</i></h3></td></tr>
</table>
</body>
</html>