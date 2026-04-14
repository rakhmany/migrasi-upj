<?php
include('front.config.inc.php'); 

$sql = ' SELECT * FROM `fh_struktur_menu` WHERE ( `fh_menu_name_en` like '.$db->qstr('%Career%').'  AND fh_menu_name  like '.$db->qstr('%Karir%').' ) OR `fh_menu_name_en` like '.$db->qstr('%Jobs%').'    limit 1  ';
$RS = $db->Execute($sql); 
if ($RS->fields['fh_strukturid'] != "")
{
	$selected_menu = $RS->fields;
	
	$html_menu_title  				=   $language == '_en' ? $selected_menu['fh_menu_name_en'] : $selected_menu['fh_menu_name'] ; 
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
else
{
	include('404.php');
}

$jobvacancyid = intval($_GET['id']);
$sql = ' SELECT * FROM `job_vacancy1` WHERE    jobvacancystatus  != \'Hidden\' AND  jobvacancyid=\''.$jobvacancyid.'\'  limit 1  ';
$RS = $db->Execute($sql); 
if ($RS->fields['jobvacancyid'] != "")
{
	 $job_vacancy1 = $RS->fields;
	 
	 $html_page_title  				=   $language == '_en' ? $RS->fields['jobvacancytitle_en'] : $RS->fields['jobvacancytitle'] ; 
	 $fh_general_metakeyword 		= $RS->fields['metakeyword'] ; 
	 $fh_general_metadescription 	= $RS->fields['metadescription'] ; 
	 
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

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h2><?php echo $html_page_title; ?></h2>
                        <?php
                        
                        if($language == '_en')
                        {
	                        echo $job_vacancy1['jobvacancydescription_en'];
                        }
                        else
                        {
	                        echo $job_vacancy1['jobvacancydescription'];
                        }
                        
                        ?>
                         
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