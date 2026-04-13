<?php
include('front.config.inc.php'); 

$sql = ' SELECT * FROM `fh_struktur_menu` WHERE `fh_menu_name_en` = '.$db->qstr('Facilities').'  AND fh_menu_name  = \'Fasilitas\'  limit 1  ';
$RS = $db->Execute($sql); 
if ($RS->fields['fh_strukturid'] != "")
{
	$selected_menu = $RS->fields;
	
	$sqlc = 'SELECT * FROM `fh_struktur_menu`  ORDER BY `fh_strukturid` ASC;'; 
	$resc = mysql_query($sqlc);
	if(@mysql_num_rows($resc))
	{   $i=0;
		while($row = mysql_fetch_assoc($resc))
		{ 
			$option_category_arr[$row['fh_strukturid']] = $language == '_en' ? $row['fh_menu_name_en'] : $row['fh_menu_name'] ; 
			$i++;
		}
	}
	 
	
	function get_parent_category($catid)
	{
		global $db;
		$ret = '';
		$SQL = 'SELECT	* FROM	 fh_struktur_menu where fh_strukturid=\''.$catid.'\'  ';
		$RS = $db->Execute($SQL);
		if ($RS->fields['fh_strukturid'] != "")
		{
			if($RS->fields['fh_strukturparent'] > 0 )
			{
				$ret .= get_parent_category($RS->fields['fh_strukturparent']);
			} 
			$ret .= '|'.$RS->fields['fh_strukturid'];
		}
		return $ret;
	}
	$this_category_id = intval($selected_menu['fh_strukturid']);
	$parent_category =  get_parent_category($this_category_id); 
	$parent_category = explode('|', $parent_category);
	if(is_array($parent_category) && sizeof($parent_category) > 0 )
	{
		@array_shift($parent_category);
	}
	
}
else
{
	include('404.php');
}
$categoryid = intval($_GET['id']);
$sql = ' SELECT * FROM `gallery3_category` WHERE   categorystatus  = \'Active\' AND categoryid=\''.$categoryid.'\'  limit 1  ';
$RS = $db->Execute($sql); 
if ($RS->fields['categoryid'] != "")
{
	 $gallery3_category = $RS->fields;
	 
	 $paging_param = 'facilities/'.$categoryid.'/'.createPermaLink($RS->fields['categoryname_en']).'/page/';
	 $html_page_title  				=   $language == '_en' ? $RS->fields['categoryname_en'] : $RS->fields['categoryname'] ; 
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
                                <li><a href="./"><i class="fa fa-home"></i></a></li>
                                <?php
					          	if(is_array($parent_category) && sizeof($parent_category) > 0 )
						 		{
							 		foreach($parent_category as $k => $v)
						          	{
							          	if( (sizeof($parent_category)-1) == $k )
							          	{
								          	$this_category_name = $option_category_arr[$v];
								          	echo '<li class="product"> <strong>'.$option_category_arr[$v].'</strong> </li>';
							          	}
							          	else
							          	{
								          	echo '<li class="product"> '.$option_category_arr[$v].' </li>';
							          	} 
						          	}
					          	}
					          	else
					          	{
						          	$this_category_name = '';
						          	echo '<li class="product"> <strong>'.$top_menu_product.'</strong> </li>';
					          	}
					          
					          ?> 
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $html_page_title; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcumb -->   

        <section id="page-content">
            <div class="container">
                    <h2><?php echo $html_page_title; ?></h2>
                <!-- Gallery listing dibuat maksimal 12 gambar dalam 1 pagenya-->
                <div class="grid-layout grid-4-columns" data-margin="20" data-item="grid-item" data-lightbox="gallery">
                     <?php
                    $sql = ' SELECT * FROM `gallery3` WHERE  categoryid=\''.$gallery3_category['categoryid'].'\' AND  gallerystatus  = \'Show\' ORDER BY  `gallerypriority` ASC  ';
					$RS = $db->Execute($sql); 
					if ($RS->fields['galleryid'] != "")
					{
						$num 			= $RS->RecordCount();
						$page 			= isset($_GET['page']) && intval($_GET['page']) >= 1 ? intval($_GET['page']):1;
						$uparam 		= "";
						$perpage 		= 12;
						$pagination 	= pagingfront($perpage, $num, $page, $uparam, $paging_param);
			
						$sql = ' SELECT * FROM `gallery3` WHERE  categoryid=\''.$gallery3_category['categoryid'].'\' AND  gallerystatus  = \'Show\' ORDER BY  `gallerypriority` ASC  limit '.$pagination['from'].',  '.$perpage.'  ';
						$RS = $db->Execute($sql); 
						if ($RS->fields['galleryid'] != "")
						{		
							while (!$RS->EOF)  
							{ 
								$title_text = $language == '_en' ? $RS->fields['galleryname_en'] : $RS->fields['galleryname'] ; 
								if(is_file('./upload/module/gallery3/'.$RS->fields['galleryfilename']))
								{  	 
									$this_image		= get_image_gallery('facilities', $RS->fields['galleryfilename']);  
				
									echo '  
				                    <div class="grid-item gallery-text">
				                        <a title="'.$title_text.'" class="image-hover-zoom" href="'.$this_image.'" data-lightbox="gallery-image"><img src="'.$this_image.'"></a>
							                        <h5>'.$title_text.'</h5>
				                    </div>';
			                    }
	                    	 
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
                <!-- end: Gallery -->

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
        <script src="plugins/metafizzy/infinite-scroll.min.js"></script>
</body>

</html>