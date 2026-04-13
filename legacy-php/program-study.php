<?php
include('front.config.inc.php');

unset($_SESSION['filter_selection']);
unset($_SESSION['filter_text']);

if($language == '_id')
{ 
    $html_page_title  =   $html_page_title;
}
else
{
    $html_page_title  =   $html_page_title;
}

include('prodi-filter.php');

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
<title>Our Study Program | Universitas Pembangunan Jaya</title>
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
        <section id="page-title" class="text-light" style="background-image:url(images/banner-our-programstudy.png); ">
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
                                <li class="breadcrumb-item active" aria-current="page">Our Study Program</li>
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
                    <div class="col-md-12 mb-2">
                        <h2>Our Program Study</h2>
                        
                        <p>Your Selection: 
                        <div id="button_selection"></div>
                         </p>    
                    </div>
                    <!-- Sidebar-->
                    <div class="sidebar col-lg-3">
                        <div class="widget">
                            <div class="mb-3 widget-newsletter">
                                <form id="widget-search-form-sidebar" method="get">
                                    <div class="input-group">
                                    <input type="text" aria-required="true" name="q" id="filter_text" class="form-control widget-search-form" placeholder="Search for pages...">
                                    <div class="input-group-append">
                                        <button class="btn" type="button" id="filter_btn"><i class="fa fa-search"></i></button>
                                    </div>
                                    </div> 
                                </form>
                            </div>
                            <div class="widget  widget-filter">
                                 <div class="listing-item">
                                    <ul>
                                        <li class="active" data-category="All Study Program" onclick="rem_all_filter();"><a >All Study Program</a></li>
                                       
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="widget  widget-filter">
                                 <h4 class="">Level</h4>
                                 <div class="listing-item">
                                    <ul>
                                    	<?php
	                                    foreach($array_levels as $key => $val)
										{
											 echo '<li data-category="'.$val.'" onclick="add_filter(\'level\', '.$key.');"><a >'.$val.'</a></li>';
												
										}
	                                    ?>
                                         
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="widget  widget-filter">
                                 <h4 class="">Interests</h4>
                                 <div class="listing-item">
                                    <ul>
                                    <?php
                                    foreach($array_interests as $key => $val)
									{
										 echo '<li data-category="'.$val.'" onclick="add_filter(\'interest\', '.$key.');"><a >'.$val.'</a></li>';
											
									}
                                    ?>
                                         
                                    </ul>
                                    
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class=" col-lg-9">
                        <div class="row" id="data_prodi">
                              
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
        
        <script>
        function generate_output()
        {
	        $.post( "ajax-prodi.php", { view: 1 }, function( data ) {
			   	
			   	$("#button_selection").html(data.data_button);
			   	$("#data_prodi").html(data.data_prodi);
			}, "json"); 
	        
        }
        
        function add_filter(t, v)
        { 
	        $.post( "ajax-prodi.php", { add: 1, t: t, v : v }, function( data ) {
			   	generate_output();
			}); 
	        
        }
        function rem_filter(f)
        {
	        let sf = $("#selected_filter").val();
	        $.post( "ajax-prodi.php", { rem: 1 , rf: f }, function( data ) {
			    generate_output();
			});  
        }
        function rem_all_filter()
        {
	        let sf = $("#selected_filter").val();
	        $.post( "ajax-prodi.php", { remall: 1   }, function( data ) {
		        $("#filter_text").val('');
			    generate_output();
			});  
        }
        
        $(document).on("click", "#filter_btn", function()
        {
	         let q = $("#filter_text").val();
	         $.post( "ajax-prodi.php", { filter_text: 1, q: q }, function( data ) {
			   	generate_output();
			}); 
	    });
        $(document).on("click", ".btn-remove-filter", function() { 
	        rem_filter($(this).data('filteridx'));
	    });
        generate_output(); 
        </script>
</body>

</html>