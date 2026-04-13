<html>
<head>
  <title>FaberCMS</title>
  <meta name="author" content="FaberHost Indonesia - Seto Andry Wibowo">
  <meta name="copyright" content="FaberHost Indonesia">
  <meta name="creator" content="Webmaster">
</head>
<link rel="stylesheet" href="../../css.css" type="text/css">
</head>	

<body>

<div id=worksheet>
  <div id=header>
  <h1><span><img src=../../images/icon1.gif> {$title}</span></h1>
  <hr class=black>
  
  <form method=post action={php} echo $_SERVER['PHP_SELF']; {/php}>
    <span>Select Username : 
    <select name='head_fh_userid'>
      {section name=listing loop=$head_fh_userid}
         <option value='{$head_fh_userid[listing]}'>{$head_fh_username[listing]}</option>
      {/section}
    </select>
    <input type=submit value=' search '> &nbsp;{$insert} &nbsp;{$view}
    </span>
  </form>
  <hr class=black>
  </div>
</div>