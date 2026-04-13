<div class="custom-position-video background-overlay">
            <div class="overflow-hidden">
                <div class="swiper-animation">
                    <!-- Swiper container -->
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <!-- Tambahkan slide di sini -->
                            <?php
                            $dir = "./video/*.webp";
                            $images = glob($dir);
                            
                            foreach ($images as $image):
                                echo "<div class='swiper-slide'>
                                    <div class='slide-img-container'>
                                        <img class='slide-img' src='" . $image . "' />
                                    </div>
                                </div>";
                            endforeach;
                            ?>
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php
                                    // Tentukan direktori file gambar
                                    $dir = "./video/*.webp";
                            
                                    // Ambil semua file yang sesuai pola
                                    $images = glob($dir);
                            
                                    // Loop melalui setiap file dan tampilkan sebagai list item
                                    foreach ($images as $image): ?>
                                        <li>
                                            <img class="slide-img" src="<?= htmlspecialchars($image) ?>" alt="Slide Image">
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Navigation buttons -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    
                </div>
        
                <?php
                    $sql = 'SELECT * FROM d_singlepage WHERE content_id=1 LIMIT 1';
                    $RS = $db->Execute($sql); 
                
                    if ($RS->fields['content_id'] != "") { 
                        $d_singlepage = $RS->fields;   
                        if (is_file('./upload/' . $d_singlepage['mainpdfname'])) {
                            echo '<div class="banner-custom">
                                <video autoplay width="100%" height="100%" loop muted playsinline src="./upload/' . $d_singlepage['mainpdfname'] . '"></video>
                            </div>';
                        }
                    } else {
                        echo '<div class="video-background">
                            <div class="video-foreground">
                                <video autoplay muted loop>
                                    <source src="/video/video-website-banner-dan-ppt.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>';
                    }
                ?>  
            </div>
        </div>