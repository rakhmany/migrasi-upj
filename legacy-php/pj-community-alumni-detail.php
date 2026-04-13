<?php
include('front.config.inc.php');


if($language == '_id')
{ 
    $html_page_title  =   'Alumni';
}
else
{
    $html_page_title  =   'Alumni';
}

$content_id = intval($_GET['id']);
$sql = ' SELECT * FROM `d_alumnihall` WHERE  content_id=\''.$content_id.'\'  limit 1  ';
$RS = $db->Execute($sql); 
if ($RS->fields['content_id'] != "")
{
	 $d_alumnihall = $RS->fields;
	 
	 $html_page_title  				=   $language == '_en' ? $RS->fields['content_title_id'] : $RS->fields['content_title_id'] ; 
	 $fh_general_metakeyword 		= $html_page_title;
	 $fh_general_metadescription 	= $html_page_title;
	 
}
else
{
	include('404.php');
}

?><!DOCTYPE html>
<html lang="en">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Universitas Pembangunan Jaya" /> 
<meta name="copyright" content="upj.ac.id" /> 
<meta name="creator" content="Universitas Pembangunan Jaya" />
    <meta name="description" content="UPJ hadir untuk menciptakan sarjana yang mampu mengatasi segala bentuk tantangan dalam masyarakat dan giat berperan serta menyumbangkan pemikiran ke lingkungan " /> 
    <meta name="keywords" content="Universitas Pembangunan Jaya di Bintaro tangerang" />
<link rel="icon" type="image/png" href="images/favicon.png">
<!-- Document title -->
<?php
	  include('include-meta.php');
	  ?>
<!-- Stylesheets & Fonts -->
<link href="css/plugins.css" rel="stylesheet">
<link href="css/master.css" el="stylesheet" />
<link href="css/style.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="body-inner">
         <!-- Header -->
         <?php include ("header.php")?>
         <!--  Header -->

         <!-- Breadcumb -->
         <section id="page-title" class="text-light" style="background-image:url(images/banner-alumni.png); ">
            <div class="container">
            </div>
        </section>
        <section class="p-0">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="./"><i class="fa fa-home"></i></a> </li>
                                <li class="breadcrumb-item"> PJ-Community</li>
                                <li class="breadcrumb-item"><a href="hall-of-fame">Alumni</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $d_alumnihall['content_title_id']; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcumb -->   
 
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="content col-md-8">
                        <div class="single-post">
                            <!-- Post single item-->
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <!--<div class="post-item-description">-->
                                    <!--    <h1><?php echo $d_alumnihall['content_title_id']; ?></h1>-->
                                    <!--</div>-->
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="upload/<?php echo $d_alumnihall['mainimagename']; ?>">
                                        </a>
                                    </div>
                                    <div class="news-description">
                                        <p>
                                            <b><?php echo $d_alumnihall['content_title_id']; ?></b> <br>
                                            <b><?php echo $d_alumnihall['content_short_id']; ?></b> <br>
                                        </p>
                                        <p align="justify"><?php echo $d_alumnihall['content_long'.$language]; ?></p>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        
        <!-- Footer -->
         <?php include ("footer.php")?>
        <!--  Footer -->
        </div>
        
        <!--  Body Inner -->
        <!-- Scroll top -->
        <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
        <!--Plugins-->
        <script src="js/jquery.js"></script>
        <script src="js/plugins.js"></script>
        <!--Template functions-->
        <script src="js/functions.js"></script>
</body>

</html>