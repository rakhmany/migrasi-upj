<?php

include('front.config.inc.php');



if($language == '_id')

{ 

    $html_page_title  =   $html_page_title;

}

else

{

    $html_page_title  =   $html_page_title;

}

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KFWLD2MQ');</script>
    <!-- End Google Tag Manager -->

    <!-- SCRIPT GOOGLE ANALYTICS AMAS -->

    <!-- Google tag (gtag.js) -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M7QN2BXW0P"></script>

    <script>

    window.dataLayer = window.dataLayer || [];

    function gtag(){dataLayer.push(arguments);}

    gtag('js', new Date());

    

    gtag('config', 'G-M7QN2BXW0P');

    </script>

    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="google-site-verification" content="2Mhr7KrKsZjjlGHGF61TvzWrOnidBvjUhNdQadl0H44" />

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="author" content="Universitas Pembangunan Jaya" /> 

    <meta name="copyright" content="upj.ac.id" /> 

    <meta name="creator" content="Universitas Pembangunan Jaya" />

    <meta name="description" content="UPJ hadir untuk menciptakan sarjana yang mampu mengatasi segala bentuk tantangan dalam masyarakat dan giat berperan serta menyumbangkan pemikiran ke lingkungan " /> 

    <meta name="keywords" content="Universitas Pembangunan Jaya di Bintaro tangerang" />

    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Document title -->

    <?php include('include-meta.php'); ?>

    <!-- Stylesheets & Fonts -->

    <link href="css/plugins.css" rel="stylesheet">

    <link rel="stylesheet" href="plugins/flexslider/css/flexslider.css?v=1.0" type="text/css">

    <link href="css/master.css" rel="stylesheet"/>

    <link href="css/style.css" rel="stylesheet">

    <link href="css/custom.css?v=1.0" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    

    <!-- Swiper CSS -->

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">



    <!--Preload-->

    <link rel="preload" href="css/plugins.css" as="style">

    <link rel="preload" href="css/master.css" as="style"/>

    <link rel="preload" href="css/style.css" as="style">

    <link rel="preload" href="css/custom.css" as="style">

    <link rel="preload" href="upj-coomercial-banner.mp4" as="video" type="video/mp4" />



    <!-- stylesheets & Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="preload" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="preload" type="text/css">

    

    <style>

        .swiper { width: 100%; padding: 20px 0; }

        .swiper-slide { display: flex; justify-content: center; align-items: center; }

        .swiper-button-next, .swiper-button-prev { color: #333; }

    </style>

</head>



<body>

    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KFWLD2MQ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <!-- Body Inner -->

    <div class="body-inner">



        <!-- Header -->

        <?php include ("header.php")?>

        <!-- end: Header -->



        <!-- SECTION Banner Video section-banner lgfullscreen--->

        <?php include('include-home-banner.php'); ?>  

        <!-- End SECTION Banner Video -->

        

        <section id="section1" class="bg-custom p-t-20 p-b-50" style="background-color:#fff;">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12 ">

                        <div class="tabs tabs-clean">

                            <ul class="nav nav-tabs center text-center" id="myTab2" role="tablist">

                                   <li class="nav-item">

                                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#highlight" role="tab" aria-controls="home" aria-selected="true">Highlight </a>

                                   </li>

                                   <li class="nav-item">

                                        <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#news1" role="tab" aria-controls="home" aria-selected="true">News </a>

                                   </li>

                                   <li class="nav-item">

                                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#upevent2" role="tab" aria-controls="profile" aria-selected="false">Event</a>

                                   </li>

                            </ul>

                            <div class="tab-content" id="myTabContent2">

                                <?php include('include-home-highlights.php'); ?>

                                <?php include('include-home-news.php'); ?>

                                <?php include('include-home-events.php'); ?> 

                            </div>

                        </div> 

                    </div>

                </div>

            </div>

        </section>



        <section class="p-t-1 background-image" style="background-image:url(images/img-home-prodi-our-study-2.png);">

            <div class="bg-overlay"></div>

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-6 p-t-50 p-b-50 text-light">

                        <h2 class="font-weight-800"><span>Our Study Program Provides The Best Future</span></h2>

                        <p>Please explore the Study Program according to your interests and interests to make it easier to determine the desired Study Program.</p>

                        <a href="program-study.php" class="btn btn-rounded">See Our Study Programs<i class="fa fa-arrow-right"></i></a>

                    </div>

                </div>

            </div>

        </section>



        <!--

        <div class="greeting-home p-b-0">

            <div class="container-fluid">

                <div class="row ">

                    <div class="col-lg-7"> 

                        <img alt="" src="images/img-home-rektor-3-edited.webp" > 

                    </div>

                    <div class="col-lg-5">

                        <div class="bg-rector text-light">

                            <div class="heading-text heading-section text-right mt-lg-5">

                                <h4>Greeting from the Rector</h4>

                                <p align="justify">It is with great pleasure that I welcome you to Universitas Pembangunan Jaya (UPJ). As part of Pembangunan Jaya Group, UPJ envision to be a leading higher education institution that provides quality education supported by research in the areas of sustainable urban development. </p>

        -->

                                <?php 

                                $link_sambuutan_rektor = '#';



                                // FIX: kutip aman

                                $sql = "SELECT * FROM `fh_struktur_menu` WHERE fh_menu_name = 'Sambutan Rektor' LIMIT 1";

                                $RS = $db->Execute($sql); 



                                if (!empty($RS->fields['fh_strukturid']))

                                {

                                    $link_sambuutan_rektor = 'menu/'.$RS->fields['fh_strukturid'].'/'.createPermaLink($RS->fields['fh_menu_name_en']).'';

                                }

                                ?>

        <!--

                                <a class="btn btn-outline btn-light btn-rounded" href="<?php echo $link_sambuutan_rektor; ?>"></i> Read More <i class="fa fa-arrow-right"></i></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        -->

      

        <section class="facilities-upj background-image" style="background-image:url(images/bg-banner-view-our.png);">

            <div class="bg-overlay"></div>

            <div class="shape-divider" data-style="13" data-height="300"></div>

            <div class="container">

                <div class="row">

                    <div class=" col-lg-7 offset-lg-3">

                        <div class="text-middle p-t-70 p-b-70">

                            <div class="heading-text text-light text-center">

                                <h4 class="m-b-10"><span>View Our Campus Facilities</span></h4>

                                <p>We always provide various facilities to support a comfortable, supportive and conducive learning environment.</p>

                                <a href="https://vr.upj.ac.id/" target="_blank" class="btn btn-rounded">View Our Facilities <i class="fa fa-arrow-right"></i></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        

        <div id="instagram-feeds" class="p-t-20 p-b-40">

            <div class="container-fluid">

                <div class="heading-text text-center">

                    <h3><span>UPJ Feeds</span></h3>

                    <p>Come discover our exciting and vibrant campus and find out why </p>

                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="carousel" data-items="4" data-dots="false" data-loop="false" data-margin="0"> 

                        <?php

                        $sql = "SELECT * FROM `d_banner_feed` ORDER BY `list_priority` ASC";

                        $RS = $db->Execute($sql); 

                        if (!empty($RS->fields['content_id']))

                        {       

                            while (!$RS->EOF)  

                            { 

                                $this_image = get_image_gallery('instagram_feed', $RS->fields['mainimagename']);  

                                if(!empty($RS->fields['content_short_id']))

                                {

                                    echo '<a class="hover" href="'.$RS->fields['content_short_id'].'" target="_blank"><img src="'.$this_image.'"></a>';

                                }

                                else

                                {

                                    echo '<a class="hover" ><img src="'.$this_image.'"></a>';

                                }

                                $RS->MoveNext();  

                            }

                        }

                        ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="p-t-20 p-b-80 bg-custom"  style="background-image:url(images/bg-parallax-2.png);">

            <div class="container">

                <div class="heading-text text-center">

                    <h3><span>Stories About Us</span></h3>

                    <p>Stories from our alumni </p>

                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <a href="https://www.instagram.com/p/Cw1VBZshTHd/"></a>

                        <div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="false" data-items="3" data-items-sm="2" data-items-xxs="1" data-equalize-item=".testimonial-item">

                            <?php

                            $sql = "SELECT * FROM `d_alumnihall` ORDER BY `list_priority` ASC";

                            $RS = $db->Execute($sql); 

                            if (!empty($RS->fields['content_id']))

                            {       

                                while (!$RS->EOF)  

                                { 

                                    $this_image = get_image_gallery('alumni_thumb', $RS->fields['mainimagename']);  

                    

                                    echo '<div class="testimonial-item">

                                            <img src="'.$this_image.'" alt="">

                                            <p>'.$RS->fields['content_testi'.$language].'</p>

                                            <span>'.$RS->fields['content_title_id'].'</span>

                                            <span class="space-height">'.$RS->fields['content_short'.$language].'</span>

                                            <a href="alumni/'.$RS->fields['content_id'].'/'.createPermaLink($RS->fields['content_title_id']).'" class="mt-3 btn btn-roundeded btn-xs">Read More <i class="icon-chevron-right"></i></a>

                                        </div>';

                                    $RS->MoveNext();  

                                }

                            }

                            ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        

        <section class="box-fancy section-fullwidth no-padding"> 

            <div class="custom-xs">

                <div style="background-color: #f1f1f1">

                    <div class="col-lg-12 text-left">

                        <div class="content">

                            <h4>Our Collaborative Projects</h4>

                        </div>

                        <div class="carousel" data-items="8" data-dots="false">

                            <?php

                            // FIX: kutip aman

                            $sql = "SELECT * FROM `d_banner_collaborative` 

                                    WHERE content_title_id = 'collaborative' 

                                    ORDER BY `list_priority` ASC";

                            $RS = $db->Execute($sql); 

                            if (!empty($RS->fields['content_id']))

                            {       

                                while (!$RS->EOF)  

                                { 

                                    $this_image = get_image_gallery('collaborative_thumb', $RS->fields['mainimagename']);  

                                    if(!empty($RS->fields['content_short_id']))

                                    {

                                         echo '<a href="'.$RS->fields['content_short_id'].'" target="_blank"><img src="'.$this_image.'" alt="image" /></a>';

                                    }

                                    else

                                    {

                                        echo '<a href="javascript:void(0)" target="_blank"><img src="'.$this_image.'" alt="image" /></a>';

                                    }

                                    $RS->MoveNext();  

                                }

                            }

                            ?>

                        </div>

                    </div>



                    <div class="col-lg-12 text-left">

                        <div class="content">

                            <h4>International Partners</h4>

                        </div>

                        <div class="carousel" data-items="8" data-dots="false">

                            <?php

                            // FIX: kutip aman

                            $sql = "SELECT * FROM `d_banner_collaborative` 

                                    WHERE content_title_id = 'partner' 

                                    ORDER BY `list_priority` ASC";

                            $RS = $db->Execute($sql); 

                            if (!empty($RS->fields['content_id']))

                            {       

                                while (!$RS->EOF)  

                                { 

                                    $this_image = get_image_gallery('collaborative_thumb', $RS->fields['mainimagename']);  

                                    if(!empty($RS->fields['content_short_id']))

                                    {

                                         echo '<a href="'.$RS->fields['content_short_id'].'" target="_blank"><img src="'.$this_image.'" alt="image" /></a>';

                                    }

                                    else

                                    {

                                        echo '<a href="javascript:void(0)" target="_blank"><img src="'.$this_image.'" alt="image" /></a>';

                                    }

                                    $RS->MoveNext();  

                                }

                            }

                            ?>

                        </div>

                    </div>

                </div>



                <!--

                <div class="col-lg-3 text-right text-light space-partner" style="background-color: #ed3237">

                    <h5>PARTNERS OF COOPERATION</h5>

                     <p>The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus. </p> 

                    <p>&nbsp;</p>

                -->

                    <?php

                    $link_kerjasama = "#";



                    // FIX: kutip aman (walau di-blok HTML comment, PHP tetap jalan)

                    $sql = "SELECT * FROM `fh_struktur_menu` 

                            WHERE fh_menu_name = 'Kerjasama' 

                              AND fh_strukturstatus != 'Hidden'";

                    $RS = $db->Execute($sql); 

                    if (!empty($RS->fields['fh_strukturid']))

                    {

                        $selected_menu = $RS->fields;

                        $link_kerjasama = 'menu/'.$RS->fields['fh_strukturid'].'/'.createPermaLink($RS->fields['fh_menu_name_en']).''; 

                    }

                    ?>

                <!--

                    <a href="<?php echo $link_kerjasama; ?>" target="_blank" class="btn btn-outline btn-light btn-rounded"><span>See More Partners <i class="fa fa-arrow-right"></i></span></a>

                </div>

                -->

            </div>

        </section>

        

        <!-- Footer -->

        <?php include ("footer.php")?>

        <!-- End Footer -->

    </div>

    <!-- end: Body Inner -->

    

    <?php include('include-popup-banner.php'); ?>



    <!-- Google tag (gtag.js) -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YZGH933YVX"></script>

    <script>

      window.dataLayer = window.dataLayer || [];

      function gtag(){dataLayer.push(arguments);}

      gtag('js', new Date());

    

      gtag('config', 'G-YZGH933YVX');

    </script>

    

    <!-- Scroll top -->

    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

    <!--Plugins-->

    <script rel="preload" src="js/jquery.js"></script>

    <script rel="preload" src="js/plugins.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>



    <!--Template functions-->

    <script rel="preload" src="js/functions.js" ></script>

    <script rel="preload" src="js/custom.js"></script>



    <!-- Swiper JS -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  

    <script src="plugins/flexslider/js/jquery.easing.js"></script>

    <script src="plugins/flexslider/js/jquery.mousewheel.js"></script>

    <script src="js/hip.js"></script>

    

    <!-- Optional FlexSlider Additions -->

    <script src="plugins/flexslider/js/jquery.flexslider.js"></script>

    <script type="text/javascript" src="plugins/flexslider/js/shCore.js"></script>

    <script type="text/javascript" src="plugins/flexslider/js/shBrushXml.js"></script>

    <script type="text/javascript" src="plugins/flexslider/js/shBrushJScript.js"></script>



    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const swiper = new Swiper('.swiper', {

                slidesPerView: 1,

                spaceBetween: 20,

                navigation: {

                    nextEl: '.swiper-button-next',

                    prevEl: '.swiper-button-prev',

                },

                loop: true,

                breakpoints: {

                    640: { slidesPerView: 1 },

                    1024: { slidesPerView: 1 }

                }

            });

        });



        jQuery(document).ready(function($) {

            $('.flexslider').flexslider({

                controlNav: true,

                animation: "fade",

                slideshow: true,

                slideshowSpeed: 4000, 

                animationSpeed: 600,

                direction: "none",

                directionNav: true,   

                smoothHeight: true,

                start: function(slider){

                    $('body').removeClass('loading');

                }

            });

        });



        $(document).ready(function() {

            $('#popup_notifikasi').modal('show');

            $('#popup_notifikasi').modal({backdrop: 'static', keyboard: false});

            $('.slider-popup').flickity({

                fade: true,

                fullscreen: true,

                prevNextButtons: false,

                pageDots: false,

                draggable: true

            });

        });

    </script>

</body>

</html>

