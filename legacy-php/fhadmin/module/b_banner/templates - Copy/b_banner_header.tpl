<html>
<head>
  <title>FaberCMS</title>
  <meta name="author" content="FaberHost Indonesia - Seto Andry Wibowo">
  <meta name="copyright" content="FaberHost Indonesia ">
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
    <span>Search {$title_search} : <input type=text name=search size=20> 
              Type : 
              <select name=search1>            
				<option value='' selected>== Choose Type ==</option>
				{section name=listing loop=$optarray_type}
				<option value='{$optarray_type[listing]}'{if $optarray_type[listing] eq $search1} selected{/if}>{$optarray_type[listing]}</option>
				{/section}
              </select>
              Status : 
              <select name=search2>            
				<option value='' selected>== Choose Status ==</option>
				{section name=listing loop=$optarray}
				<option value='{$optarray[listing]}'{if $optarray[listing] eq $search2} selected{/if}>{$optarray[listing]}</option>
				{/section}
              </select>
    <input type=submit value=' search '> &nbsp;{$insert} &nbsp;{$view}
    </span>
  </form>
  <hr class=black>
  </div>
</div>