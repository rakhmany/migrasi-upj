<?php
include('front.config.inc.php'); 

$html_page_title  				=   $language == '_en' ? 'Search' : 'Pencarian' ; 
$fh_general_metakeyword 		= $html_page_title;
$fh_general_metadescription 	= $html_page_title;

$data_keyword = isset($_POST['keyword']) ? $_POST['keyword'] : ( isset($_GET['keyword']) ? $_GET['keyword'] : '' );


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
        <section id="page-title" class="text-light" style="background-image:url(images/defaultbanner.jpeg); ">
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
                                <li class="breadcrumb-item active" aria-current="page">Search</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcumb -->   

        <section id="page-content">
            <div class="container">
                <h2>Search: <?php echo htmlspecialchars($data_keyword); ?></h2>
                <div id="blog" class="post-thumbnails">
                <?php
                
                  
                    $sql = ' (SELECT newsid, newstitle, newstitle_en, newsshortdesc, newsshortdesc_en, newsmainimage,  \'news\' as type FROM latest_news1 WHERE newstitle LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newstitle_en LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newsshortdesc LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newsshortdesc_en LIKE '.$db->qstr('%'.$data_keyword.'%').' order by newsid desc ) 
							 UNION
							(SELECT eventid, eventtitle, eventtitle_en, eventshortdesc, eventshortdesc_en, eventmainimage,  \'event\' as type FROM latest_event1 WHERE eventtitle LIKE '.$db->qstr('%'.$data_keyword.'%').' OR eventtitle_en LIKE '.$db->qstr('%'.$data_keyword.'%').' OR eventshortdesc LIKE '.$db->qstr('%'.$data_keyword.'%').' OR eventshortdesc_en LIKE '.$db->qstr('%'.$data_keyword.'%').' order by eventid desc ) 
							 UNION
							(SELECT newsid, newstitle, newstitle_en, newsshortdesc, newsshortdesc_en, newsmainimage,  \'press\' as type FROM latest_pressrelease WHERE newstitle LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newstitle_en LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newsshortdesc LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newsshortdesc_en LIKE '.$db->qstr('%'.$data_keyword.'%').' order by newsid desc ) 
							 ';
					$RS = $db->Execute($sql);  
					if ($RS->fields['newsid'] != "")
					{
						$num 			= $RS->RecordCount();
						$page 			= isset($_GET['page']) && intval($_GET['page']) >= 1 ? intval($_GET['page']):1;
						$uparam 		= "";
						$perpage 		= 12;
						$pagination 	= pagingfront($perpage, $num, $page, $uparam, 'highlights/page/');
			
						$sql = '(SELECT newsid, newstitle, newstitle_en, newsshortdesc, newsshortdesc_en, newsmainimage,  \'news\' as type FROM latest_news1 WHERE newstitle LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newstitle_en LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newsshortdesc LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newsshortdesc_en LIKE '.$db->qstr('%'.$data_keyword.'%').' order by newsid desc ) 
							 UNION
							(SELECT eventid, eventtitle, eventtitle_en, eventshortdesc, eventshortdesc_en, eventmainimage,  \'event\' as type FROM latest_event1 WHERE eventtitle LIKE '.$db->qstr('%'.$data_keyword.'%').' OR eventtitle_en LIKE '.$db->qstr('%'.$data_keyword.'%').' OR eventshortdesc LIKE '.$db->qstr('%'.$data_keyword.'%').' OR eventshortdesc_en LIKE '.$db->qstr('%'.$data_keyword.'%').' order by eventid desc ) 
							 UNION
							(SELECT newsid, newstitle, newstitle_en, newsshortdesc, newsshortdesc_en, newsmainimage,  \'press\' as type FROM latest_pressrelease WHERE newstitle LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newstitle_en LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newsshortdesc LIKE '.$db->qstr('%'.$data_keyword.'%').' OR newsshortdesc_en LIKE '.$db->qstr('%'.$data_keyword.'%').' order by newsid desc ) 
							 limit '.$pagination['from'].',  '.$perpage.'  ';
						$RS = $db->Execute($sql); 
						if ($RS->fields['newsid'] != "")
						{		
							while (!$RS->EOF)  
							{ 
								$title_text 	= $language == '_en' ? $RS->fields['newstitle_en'] : $RS->fields['newstitle'] ; 
								$short_text 	= $language == '_en' ? $RS->fields['newsshortdesc_en'] : $RS->fields['newsshortdesc'] ; 
								
								if( $RS->fields['type'] == 'press')
								{
									$link_detail 	= 'press-release/'.$RS->fields['newsid'].'/'.createPermaLink($RS->fields['newstitle_en']).'';
									$this_image		= get_image_gallery('pressrelease_thumb', $RS->fields['newsmainimage']);  
				
								}
								if( $RS->fields['type'] == 'news')
								{
									$link_detail 	= 'news/'.$RS->fields['newsid'].'/'.createPermaLink($RS->fields['newstitle_en']).'';
									$this_image		= get_image_gallery('news_thumb', $RS->fields['newsmainimage']);  
				
								}
								if( $RS->fields['type'] == 'event')
								{
									$link_detail 	= 'events/'.$RS->fields['newsid'].'/'.createPermaLink($RS->fields['newstitle_en']).'';
									$this_image		= get_image_gallery('homeevent', $RS->fields['newsmainimage']);  
				
								}
								 
								
								echo ' <div class="post-item">
			                        <div class="post-item-wrap">
			                            <div class="post-image">
			                                <a href="'.$link_detail.'">
			                                    <img alt="" src="'.$this_image.'">
			                                </a>
			                            </div>
			                            <div class="post-item-description">
			                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i> '.date('d M Y', strtotime($RS->fields['newsdate'])).'</span>
			                                <h2><a href="'.$link_detail.'">'.$title_text.'</a></h2>
			                                <p>'.$short_text.'</p>
			                                
			                            </div>
			                        </div>
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
                <!-- end: Blog -->
                <ul class="pagination justify-content-center pt-5">
                    <?php echo $paging_div; ?>
                </ul>
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