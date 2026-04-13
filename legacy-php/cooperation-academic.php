<?php
if(!isset($selected_menu))
{
	include('404.php');
	die();
} 
else
{
	
	$html_page_title  				=   $language == '_en' ? $selected_menu['fh_menu_name_en'] : $selected_menu['fh_menu_name'] ; 
	 
	$fh_general_metakeyword 		= $html_page_title;
	$fh_general_metadescription 	= $html_page_title;
	 
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


function get_child_content($cat_parent, $active = '')
{
	global $db;
	
	$return = '<div class="tab-pane fade '.$active.'" id="kerjasama_'.$cat_parent.'" role="tabpanel" aria-labelledby="home_'.$cat_parent.'-tab">';
	
	$sql = ' SELECT * FROM `kerjasama_cat` WHERE  cat_parent=\''.$cat_parent.'\' AND  status  = \'Show\' ORDER BY  `priority` ASC  ';
	$RS = $db->Execute($sql); 
	if ($RS->fields['cat_id'] != "")
	{	
		$activated = false;
		while (!$RS->EOF)  
		{
			
			$title_text = $language == '_en' ? $RS->fields['cat_title_en'] : $RS->fields['cat_title'] ; 
			$return .= '<div class="cooperation-logo">
                                <h3>'.$title_text.'</h3>
                                <div  class="row">';
                                
            $q = ' SELECT * FROM `kerjasama` WHERE `cat_id` = '.$db->qstr($RS->fields['cat_id']).'  AND status  = \'Show\' ORDER BY  `priority` ASC  ';
			$S = $db->Execute($q); 
			if ($S->fields['ks_id'] != "")
			{ 
				while (!$S->EOF)  
				{ 	 
					$this_image		= get_image_gallery('kerjasama', $S->fields['ks_logo']);  
					if(!empty($S->fields['ks_url']))
					{
						$return .= '<div class="col-md-3 col-sm-6 light-bg logo-position img-zoom page-title">
                                        <div class="portfolio-item-wrap">
                                            <a href="'.$S->fields['ks_url'].'" target="_blank">
                                            <div class="portfolio-image">
                                            <img src="'.$this_image.'" alt="">
                                            </div>
                                            <div class="portfolio-description ">
                                                <h3>'.$S->fields['ks_title'].'</h3>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    ';
					}
					else
					{
						$return .= '<div class="col-md-3 col-sm-6 light-bg logo-position img-zoom page-title">
                                        <div class="portfolio-item-wrap">
                                            <div class="portfolio-image">
                                            <img src="'.$this_image.'" alt="">
                                            </div>
                                            <div class="portfolio-description ">
                                                <h3>'.$S->fields['ks_title'].'</h3>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                    }
					$S->MoveNext();  
				}
				 
				 
			}
			               
			$return .= '</div> 
            </div>'; 
			$RS->MoveNext();  
		}
		 
	}
	else
	{
			$return .= '<div class="cooperation-logo"> 
                                <div  class="row">'; 
            $q = ' SELECT * FROM `kerjasama` WHERE `cat_id` = '.$db->qstr($cat_parent).'  AND status  = \'Show\' ORDER BY  `priority` ASC  ';
			$S = $db->Execute($q); 
			if ($S->fields['ks_id'] != "")
			{ 
				while (!$S->EOF)  
				{
					$this_image		= get_image_gallery('kerjasama', $S->fields['ks_logo']);  
					if(!empty($S->fields['ks_url']))
					{
						$return .= '<div class="col-md-3 col-sm-6 light-bg logo-position img-zoom page-title">
                                        <div class="portfolio-item-wrap">
                                            <a href="'.$S->fields['ks_url'].'" target="_blank">
	                                            <div class="portfolio-image">
	                                            	<img src="'.$this_image.'" alt="">
	                                            </div>
	                                            <div class="portfolio-description ">
	                                                <h3>'.$S->fields['ks_title'].'</h3>
	                                            </div>
	                                        </a>
                                        </div>
                                    </div>
                                    ';
					}
					else
					{
						$return .= '<div class="col-md-3 col-sm-6 light-bg logo-position img-zoom page-title">
                                        <div class="portfolio-item-wrap">
                                            <div class="portfolio-image">
                                            <img src="'.$this_image.'" alt="">
                                            </div>
                                            <div class="portfolio-description ">
                                                <h3>'.$S->fields['ks_title'].'</h3>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                     }
					$S->MoveNext();  
				}
				 
				 
			}
			               
			$return .= '</div> 
            </div>'; 
		
	}
	
	$return .= '</div>'; 
	return $return;
	
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
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcumb -->   

        <section id="page-content">
            <div class="container">
                <div class="tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php
                    $child_content = '';
                    $sql = ' SELECT * FROM `kerjasama_cat` WHERE  cat_parent=\'0\' AND  status  = \'Show\' ORDER BY  `priority` ASC  ';
					$RS = $db->Execute($sql); 
					if ($RS->fields['cat_id'] != "")
					{	
						$activated = false;
						while (!$RS->EOF)  
						{ 
							$title_text = $language == '_en' ? $RS->fields['cat_title_en'] : $RS->fields['cat_title'] ; 
							if($activated == false)
							{
								$activated = true;
                    	 		echo '<li class="nav-item">
		                            <a class="nav-link active" id="home_'.$RS->fields['cat_id'].'-tab" data-bs-toggle="tab" href="#kerjasama_'.$RS->fields['cat_id'].'" role="tab"  aria-selected="true" >'.$title_text.'</a>
		                        </li>';
		                        $child_content .= get_child_content($RS->fields['cat_id'],  'show active');
	                        }
	                        else
	                        {
		                        echo '<li class="nav-item">
		                            <a class="nav-link " id="home-tab_'.$RS->fields['cat_id'].'" data-bs-toggle="tab" href="#kerjasama_'.$RS->fields['cat_id'].'" role="tab" aria-selected="false" >'.$title_text.'</a>
		                        </li>';
		                        $child_content .= get_child_content($RS->fields['cat_id'],  '');
	                        }
							$RS->MoveNext();  
						}
						 
					}
                    
                    ?>
                         
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    	<?php
                    	 echo $child_content;
                    	?>
                         
                    </div>
                </div>
                
            </div>
        </section> 

        <section class="background-grey cooperation-content">
            <div class="container">
                <div class="row m-b-40">
                    <div class="col-lg-4">
                        <div class="cooperation-left">
                            <img src="images/img-cooperation-left.png" class="img-fluid">
                            
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="">
                            <h3>Explore your partnership with us</h3>
                            <p align="justify">We partner with different industries, government, non-profit organizations, and communities to develop collaborations so that we can benefit the collaborating institutions and give impact to the community at large. Explore your opportunities to collaborate with our outstanding network of scholars, students, and alumni to create brand new knowledge across disciplines.</p>
                            <p align="justify">Connect with Universitas Pendidikan Jaya in multiple ways. We do understand that initiating collaboration between institutions can be complicated and confusing. Therefore, feel free to ask for our assistance to connect you with the right resources or units to support the strategic collaboration priority you want to carry out with UPJ.</p>

                            <h5>Bureau of Cooperation, Public Relations and International </h5>
                            <p align="justify">
                                Universitas Pembangunan Jaya (Building A, 3rd Floor) <br> Jl. Cendrawasih Raya Blok B7/P Bintaro Jaya, Sawah Baru, Ciputat, Tangerang Selatan 15413<br>
                            </p>
                            <p>
                                Phone: (021) 745 5555<br>
                                E-mail: partnerships@upj.ac.id
                            </p>
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
        <script src="plugins/metafizzy/infinite-scroll.min.js"></script>
</body>

</html>