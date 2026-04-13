<!-- SECTION Banner Video section-banner lgfullscreen--->

    <div class="custom-position-video background-overlay">

        <!-- <div class="bg-overlay"></div> container-fullwidthrumah-video|video-banner|-->

        <div class="">

            <!-- <div class="banner-custom">

                <video autoplay="" width="100%" height="100%" loop="" muted="" playsinline="" src="video/sample-video.mp4"></video>

            </div> -->

             

            

            <div class="video-background">

                <div class="video-foreground">

                    <!--<video autoplay=""loop="" muted="" playsinline="" src="video/UPJ-COMMERCIAL-VIDEO-2021.mp4"></video>-->

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

                                    <?php if (basename($image) === '12 KELAS BLENDED KARYAWAN.webp'): ?>

                                        <a href="https://jcal.upj.ac.id/static-page/595/program" target="_blank">

                                            <img class="slide-img" src="<?= htmlspecialchars($image) ?>" alt="Slide Image">

                                        </a>

                                    <?php else: ?>

                                        <img class="slide-img" src="<?= htmlspecialchars($image) ?>" alt="Slide Image">

                                    <?php endif; ?>

                                </li>    

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </div>

            </div>

            

        </div>

    </div>

<!-- End SECTION Banner Video -->