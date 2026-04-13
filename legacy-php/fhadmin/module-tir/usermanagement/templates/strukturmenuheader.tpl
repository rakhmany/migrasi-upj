<html>
<head>
  <title>FaberCMS</title>
  <meta name="author" content="FaberHost Indonesia - Seto Andry Wibowo">
  <meta name="copyright" content="FaberHost Indonesia">
  <meta name="creator" content="Webmaster">
</head>
<link rel="stylesheet" href="../../css.css" type="text/css" />
{literal}<style>
	#loader {
        width: 220px;
        height: 80px;
        position: fixed;
        top: 50%;
        left: 50%;
        z-index: -1;
        opacity: 0;
       /* background: url(assets/images/bg-loader.png) no-repeat center center;*/
        transition: all .5s ease-in-out;
        margin: -40px 0 0 -110px;
    }

    #loader img {position: relative; top: 50%; margin-top: -30px; left: 10px;}

    .loading #loader {z-index: 1000; opacity: 1.0}
</style>{/literal}
</head>

<body>

<div id=worksheet>
  <div id=header>
  <h1><span><img src=../../images/icon1.gif> {$title}</span></h1>
  <hr class=black>
  </div>
</div>