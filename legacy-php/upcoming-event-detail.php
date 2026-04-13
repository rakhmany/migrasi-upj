<?php
include('front.config.inc.php'); 

 
$eventid = intval($_GET['id']);
$sql = ' SELECT * FROM `latest_event1` WHERE   eventstatus  != \'Hidden\' AND eventid=\''.$eventid.'\'  limit 1  ';
$RS = $db->Execute($sql); 
if ($RS->fields['eventid'] != "")
{
	 $data_details = $RS->fields;
	 
	 $html_page_title  				=   $language == '_en' ? $RS->fields['eventtitle_en'] : $RS->fields['eventtitle'] ; 
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
                                <li class="breadcrumb-item"><a href="events">Event</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Event Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcumb -->   

        <section id="page-content" class="sidebar-right">
            <div class="container">
                <div class="row">
                    <!-- content -->
                    <div class="content col-lg-9">
                        <!-- Blog -->
                        <div id="blog" class="single-post">
                            <!-- Post single item-->
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <div class="post-item-description">
                                         <div class="post-meta mb-0">
                                            <span class="post-meta-date"><i class="fa fa-calendar"></i><?php echo date('d M Y', strtotime($data_details['eventdate'])); ?></span>
                                            <?php
                                            $data_tags = '';
                                            $sql = ' SELECT * FROM `latest_event1_kataterkait` WHERE   eventid=\''.$data_details['eventid'].'\'   ORDER BY  `kataterkait` ASC  ';
											$RS = $db->Execute($sql); 
											if ($RS->fields['kataterkaitid'] != "")
											{
												
												while (!$RS->EOF)  
												{ 
													if(!empty($RS->fields['kataterkait']))
													{
														$data_tags .= ' <a href="events/tag/'. $RS->fields['kataterkaitid'] .'/'.createPermaLink($RS->fields['kataterkait']).'" class="color-red">'.trim($RS->fields['kataterkait']).'</a>';
													}
													$RS->MoveNext();  
												}
												 
											}
                                            if(!empty($data_tags))
                                            {
	                                            echo ' <span class="post-meta-category"><i class="fa fa-tag"></i>'.$data_tags.'</span>';
	                                            
                                            }
                                            ?>
                                        </div>
                                        <h1><?php
                                        $title_text 	= $language == '_en' ? $data_details['eventtitle_en'] : $data_details['eventtitle'] ; 
										$short_text 	= $language == '_en' ? $data_details['eventdescription_en'] : $data_details['eventdescription'] ; 
										$this_image		= get_image_gallery('events_big', $data_details['eventmainimage']);  
				
                                        echo  $title_text;
                                        ?></h1>
                                       
                                    </div>
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="<?php echo $this_image; ?>">
                                        </a>
                                    </div>
                                    <div class="news-description">
                                        <?php
                                         echo  $short_text;
                                         ?>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- Sidebar-->
                    <div class="sidebar sticky-sidebar col-lg-3">
                        <div class="widget">
                        	<?php
                            	$sql = '  SELECT * FROM `latest_event1` WHERE    eventid != \''.$data_details['eventid'].'\' AND eventstatus  != \'Hidden\' ORDER BY  `eventdate` DESC,   `eventid` DESC  limit 5  ';
								$RS = $db->Execute($sql); 
								if ($RS->fields['eventid'] != "")
								{	
									echo '<h4 class="widget-title">Recent Events</h4>
                            				<div class="post-thumbnail-list">';
									while (!$RS->EOF)  
									{ 
										$title_text 	= $language == '_en' ? $RS->fields['eventtitle_en'] : $RS->fields['eventtitle'] ; 
										$short_text 	= $language == '_en' ? $RS->fields['eventshortdesc_en'] : $RS->fields['eventshortdesc'] ; 
										$link_detail 	= 'events/'.$RS->fields['eventid'].'/'.createPermaLink($RS->fields['eventtitle_en']).'';
										$this_image		= get_image_gallery('events_thumb', $RS->fields['eventmainimage']);  
						
										echo ' <div class="post-thumbnail-entry">
				                                    <img alt="" src="'.$this_image.'">
				                                    <div class="post-thumbnail-content thumb-right-sidebar">
				                                        <a href="'.$link_detail.'">'.$title_text.'</a>
				                                        <span class="post-date"><i class="icon-calendar"></i> '.date('d M Y', strtotime($RS->fields['eventdate'])).'</span>
				                                        
				                                    </div>
				                                </div>
				                                
						                     ';
					                     
			                    	 
										$RS->MoveNext();  
									}
									echo '</div>';
									 
								}
                            	
                            	?>
                             
                        </div>
                        
                        <div class="widget clearfix widget-archive">
                            <h4 class="widget-title">Categories</h4>
                            <?php
                            $sql = ' SELECT kataterkait , kataterkaitid FROM `latest_event1_kataterkait` WHERE kataterkait != \'\' GROUP BY kataterkait ORDER BY `kataterkait` ASC   ';
							$RS = $db->Execute($sql); 
							if ($RS->fields['kataterkaitid'] != "")
							{
								echo '<ul class="list list-lines">';
								while (!$RS->EOF)  
								{ 
									if(!empty($RS->fields['kataterkait']))
									{
										echo  '<li><a href="events/tag/'. $RS->fields['kataterkaitid'] .'/'.createPermaLink($RS->fields['kataterkait']).'" class="color-red">'.trim($RS->fields['kataterkait']).'</a> </li> ';
									}
									$RS->MoveNext();  
								}
								echo '</ul>';
								 
							}
							?>
                            
                                 
                        </div>
                        
                        <!-- IG & FB Page -->
                        <?php include ("include-sidebar-sosmed-page.php")?>
                        <!-- End IG & FB Page -->
                        
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