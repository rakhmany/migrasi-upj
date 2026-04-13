<?php
include('front.config.inc.php');


if($language == '_id')
{ 
    $html_page_title  =   'HALL OF FAME';
}
else
{
    $html_page_title  =   'HALL OF FAME';
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
                                <li><a href="index.php"><i class="fa fa-home"></i></a> </li>
                                <li class="breadcrumb-item"><a href="javascript:0">PJ-Community</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Alumni</li>
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
                    <div class="col-md-12">
                        <div class="heading-text heading-section">
                            <h2>ALUMNI HALL OF FAME</h2>
                        </div>
                        <div class="grid-layout grid-4-columns testimonial" data- data-item="grid-item">
                            
                        	<?php
                            $sql = '  SELECT * FROM `d_alumnihall` ORDER BY  `list_priority` ASC    ';
							$RS = $db->Execute($sql); 
							if ($RS->fields['content_id'] != "")
							{
								$num 			= $RS->RecordCount();
								$page 			= isset($_GET['page']) && intval($_GET['page']) >= 1 ? intval($_GET['page']):1;
								$uparam 		= "";
								$perpage 		= 8;
								$pagination 	= pagingfront($perpage, $num, $page, $uparam, 'hall-of-fame/page/');
					
								$sql = '  SELECT * FROM `d_alumnihall` ORDER BY  `list_priority` ASC  limit '.$pagination['from'].',  '.$perpage.'   ';
								$RS = $db->Execute($sql); 
								if ($RS->fields['content_id'] != "")
								{		
									while (!$RS->EOF)  
									{ 
										 
										$this_image		= get_image_gallery('alumni_thumb', $RS->fields['mainimagename']);  
						
										echo '<div class="grid-item">
				                                <a href="alumni/'.$RS->fields['content_id'].'/'.createPermaLink($RS->fields['content_title_id']).'">
				                                    <div class="testimonial-item space-minus">
				                                        <img src="'.$this_image.'" alt="">
				                                        <span class="space-height">'.$RS->fields['content_title_id'].'</span>
				                                            <span class="space-height">'.$RS->fields['content_short'.$language].'</span>
				                                    </div>
				                                </a>
				                            </div>
				                             
				                            
				                             
						                     ';
					                     
			                    	 
										$RS->MoveNext();  
									}
									 
								}
								$paging_div = $pagination['prev'].''.$pagination['page'].''.$pagination['next']; 
						
								 
							}
                            else
							{
								$nodata = ($language == '_en') ? 'No data' : 'Belum ada data';
								echo '<div class="alert alert-warning" role="alert">
									  '.$nodata.'!
									</div>';
							}
                            ?>
                        	 
                        </div>
                        <ul class="pagination justify-content-center pt-5">
                            <?php echo $paging_div; ?>
                        </ul>
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