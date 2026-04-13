<?php
include('front.config.inc.php'); 
$fh_strukturid = intval($_GET['id']);

 

$sql = ' SELECT * FROM `fh_pagestatis` WHERE `fh_strukturid` = \''.$fh_strukturid.'\' AND fh_strukturstatus != \'Hidden\'   ';
$RS = $db->Execute($sql); 
if ($RS->fields['fh_strukturid'] != "")
{ 
	 $fh_pagestatis = $RS->fields;
	 
	 $html_page_title  				=   $language == '_en' ? $RS->fields['fh_content_titlename_en'] : $RS->fields['fh_content_titlename'] ; 
	 
	 $fh_general_metakeyword 		= $RS->fields['fh_menu_metakeyword'];
	 $fh_general_metadescription 	= $RS->fields['fh_menu_metadescription'];
	 
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
        <!-- Breadcumb -->
        <?php
        $default_bg_img = 'images/img-breadcumb-facilities.jpg';
        if(is_file('upload/module/'.$fh_pagestatis['fh_content_banner']))
        {
	        $this_image		= get_image_gallery('breadcumb_img', $fh_pagestatis['fh_content_banner']);  
												
	        $default_bg_img = $this_image;
        }
        ?>
        <section id="page-title" class="text-light" style="background-image:url('<?php echo $default_bg_img; ?>'); ">
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
					         $fh_pagestatis_title = $language == '_en' ?  $fh_pagestatis['fh_menu_name_en'] : $fh_pagestatis['fh_menu_name'] ;   
						          	echo '<li class="product"> <strong>'.$fh_pagestatis_title.'</strong> </li>';
					          	 
					          ?> 
								          
                                
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcumb -->   

         
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    
                    	<?php
                    	 
                    	$fh_pagestatis_title = $language == '_en' ? $fh_pagestatis['fh_content_titlename_en'] : $fh_pagestatis['fh_content_titlename'] ; 
						     
                    	echo '<h2>'.$fh_pagestatis_title.'</h2>';  
                    	?>               
                    </div>
                </div>
                
                <?php
                if( $fh_pagestatis['fh_coloumn_count'] == 2)
                {
	                $fh_pagestatis_content = $language == '_en' ? $fh_pagestatis['fh_content_description_en'] : $fh_pagestatis['fh_content_description'] ; 
	            	$fh_pagestatis_content2 = $language == '_en' ? $fh_pagestatis['fh_content_description2_en'] : $fh_pagestatis['fh_content_description2'] ; 
	            	$fh_pagestatis_content3 = $language == '_en' ? $fh_pagestatis['fh_content_description3_en'] : $fh_pagestatis['fh_content_description3'] ; 
	            	echo '<div class="row">
		                    <div class="col-lg-4">
		                    	 '.$fh_pagestatis_content.'
		                    </div>
		                    <div class="col-lg-4">
		                    	 '.$fh_pagestatis_content2.'
		                    </div>
		                    <div class="col-lg-4">
		                    	 '.$fh_pagestatis_content3.'
		                    </div>
		                </div>'; 
                }
                elseif( $fh_pagestatis['fh_coloumn_count'] == 1)
                {
	                $fh_pagestatis_content = $language == '_en' ? $fh_pagestatis['fh_content_description_en'] : $fh_pagestatis['fh_content_description'] ; 
	            	$fh_pagestatis_content2 = $language == '_en' ? $fh_pagestatis['fh_content_description2_en'] : $fh_pagestatis['fh_content_description2'] ; 
	            	echo '<div class="row">
		                    <div class="col-lg-6">
		                    	 '.$fh_pagestatis_content.'
		                    </div>
		                    <div class="col-lg-6">
		                    	 '.$fh_pagestatis_content2.'
		                    </div> 
		                </div>'; 
                }
                else
                {
	                $fh_pagestatis_content = $language == '_en' ? $fh_pagestatis['fh_content_description_en'] : $fh_pagestatis['fh_content_description'] ; 
	            	echo '<div class="row">
		                    <div class="col-lg-12">
		                    	 '.$fh_pagestatis_content.'
		                    </div>
		                </div>'; 
                }
	        		
            	?>

				<!-- tag <i class="fa fa-tag"></i>-->
				<div class="mt-4">
					<?php
                        $data_tags = '';
                        $sql = ' SELECT * FROM `fh_pagestatis_kataterkait` WHERE   fh_strukturid=\''.$fh_pagestatis['fh_strukturid'].'\'   ORDER BY  `kataterkait` ASC  ';
						$RS = $db->Execute($sql); 
						if ($RS->fields['kataterkaitid'] != "")
						{
							
							while (!$RS->EOF)  
							{ 
								if(!empty($RS->fields['kataterkait']))
								{
									$data_tags .= ' <a href="statis/tag/'. $RS->fields['kataterkaitid'] .'/'.createPermaLink($RS->fields['kataterkait']).'" class="color-red">'.trim($RS->fields['kataterkait']).'</a>';
								}
								$RS->MoveNext();  
							}
							 
						}
                        if(!empty($data_tags))
                        {
                            echo ' <span class="post-meta-category">'.$data_tags.'</span>';
                            
                        }
                        ?>
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