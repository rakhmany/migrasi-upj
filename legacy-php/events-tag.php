<?php
include('front.config.inc.php'); 

$html_page_title  				=   $language == '_en' ? 'Events' : 'Events' ; 
$fh_general_metakeyword 		= $html_page_title;
$fh_general_metadescription 	= $html_page_title;


$kataterkaitid = intval($_GET['id']);
$sql = ' SELECT * FROM `latest_event1_kataterkait` WHERE    kataterkaitid=\''.$kataterkaitid.'\'  limit 1  ';
$RS = $db->Execute($sql); 
if ($RS->fields['kataterkaitid'] != "")
{
	 $data_details = $RS->fields;
	 
	 
	 $html_page_title  				=   $language == '_en' ? $RS->fields['kataterkait'] : $RS->fields['kataterkait'] ; 
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
                                <li><a href="index.php"><i class="fa fa-home"></i></a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Upcoming Event</li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo  $data_details['kataterkait']; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcumb -->   

        <section id="page-content">
            <div class="container">
                <h2><?php echo  $data_details['kataterkait']; ?></h2> 
                
                	<?php
                    $sql = ' SELECT * FROM `latest_event1` LEFT JOIN latest_event1_kataterkait ON latest_event1_kataterkait.eventid=latest_event1.eventid WHERE    latest_event1.eventstatus  != \'Hidden\' AND kataterkait='.$db->qstr($data_details['kataterkait']).' ORDER BY  latest_event1.`eventdate` DESC,   latest_event1.`eventid` DESC  ';
					$RS = $db->Execute($sql); 
					if ($RS->fields['eventid'] != "")
					{
						echo '<div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">';
						
						$num 			= $RS->RecordCount();
						$page 			= isset($_GET['page']) && intval($_GET['page']) >= 1 ? intval($_GET['page']):1;
						$uparam 		= "";
						$perpage 		= 12;
						$pagination 	= pagingfront($perpage, $num, $page, $uparam, 'events/page/');
			
						$sql = '  SELECT * FROM `latest_event1` LEFT JOIN latest_event1_kataterkait ON latest_event1_kataterkait.eventid=latest_event1.eventid WHERE    latest_event1.eventstatus  != \'Hidden\' AND kataterkait='.$db->qstr($data_details['kataterkait']).' ORDER BY  latest_event1.`eventdate` DESC,   latest_event1.`eventid` DESC   limit '.$pagination['from'].',  '.$perpage.'  ';
						$RS = $db->Execute($sql); 
						if ($RS->fields['eventid'] != "")
						{		
							while (!$RS->EOF)  
							{ 
								$title_text 	= $language == '_en' ? $RS->fields['eventtitle_en'] : $RS->fields['eventtitle'] ; 
								$short_text 	= $language == '_en' ? $RS->fields['eventshortdesc_en'] : $RS->fields['eventshortdesc'] ; 
								$link_detail 	= 'events/'.$RS->fields['eventid'].'/'.createPermaLink($RS->fields['eventtitle_en']).'';
								$this_image		= get_image_gallery('homeevent', $RS->fields['eventmainimage']);  
				
							    echo '
							    <div class="post-item border">
			                        <div class="post-item-wrap">
			                            <div class="post-image">
			                                <a href="'.$link_detail.'">
			                                    <img alt="" src="'.$this_image.'">
			                                </a>
			                            </div>
			                            <div class="post-item-description deskrip-min-2">
			                                <span class="post-meta-date"><i class="fa fa-calendar"></i> '.date('d M Y', strtotime($RS->fields['eventdate'])).'</span>
			                                <h2><a href="'.$link_detail.'">'.$title_text.'</a></h2>
			                                <p>'.$short_text.'</p>
			                            </div>
			                        </div>
			                    </div> 
		                     
				                     ';
			                     
	                    	 
								$RS->MoveNext();  
							}
							 
						}
						echo '</div>';
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