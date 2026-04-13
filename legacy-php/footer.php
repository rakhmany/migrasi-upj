<footer id="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <p><a href="./"><img src="images/logo-upj-footer.webp" class="w-65"></a>
                        <h5>Our Social Media</h5>
                        <div class="social-icons social-icons-colored social-icons-rounded float-left">
                            <ul>
                                <li class="social-facebook"><a href="<?php echo  $basic->fields["fh_social_fb"] ; ?>" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="<?php echo  $basic->fields["fh_social_twt"] ; ?>" target="_blank"><i class="fab fa-x-twitter"></i></a></li>
                                <li class="social-instagram"><a href="<?php echo  $basic->fields["fh_social_rss"] ; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li class="social-youtube"><a href="<?php echo  $basic->fields["fh_social_youtube"] ; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-6">
                    <!-- Footer widget area 1 -->
                    <div class="widget widget-contact-us">
                        <h5>Universitas Pembangunan Jaya</h5>
                        <ul class="list-icon">

                            <li><i class="fa fa-map-marker-alt"></i><?php echo $basic->fields["fh_companyaddress"]; ?></li>
                            <li><i class="fa fa-phone"></i><?php echo $basic->fields["fh_companyphone"]; ?>  </li>
                            <li><i class="far fa-envelope"></i> <a href="mailto:<?php echo $basic->fields["fh_companyemail"]; ?>"><?php echo $basic->fields["fh_companyemail"]; ?></a> </li>

                        </ul>
                    </div>
                    <!-- end: Footer widget area 1 -->
                </div>
                <div class="col-lg-4 col-md-8 col-sm-6">
                    <!-- Footer widget area 1 -->
                    <div class="widget widget-contact-us">
                        <h5>&nbsp</h5>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7814382754!2d106.72545099999999!3d-6.2924303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f007dedc7de1%3A0x70288cde58f42a97!2sUPJ%20Bintaro!5e0!3m2!1sid!2sid!4v1726022456839!5m2!1sid!2sid" width="600" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- end: Footer widget area 1 -->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="widget link-group-footer">
                    <h5>Link to Jaya Group</h5>
                         <div class="row">
                              <div class="col-lg-12 list-other">
                                   <a class="jarak-link" href="https://pembangunanjaya.com/" target="_blank">Pembangunan Jaya</a>
                              </div>

                              <div class="col-lg-12 list-other">
                                   <a class="jarak-link" href="http://pendidikanjaya.or.id/" target="_blank">Yayasan Pendidikan Jaya</a>
                              </div>

                              <div class="col-lg-12 list-other">
                                   <a class="jarak-link" href="http://margajaya.org/" target="_blank">Yayasan Marga Pembangunan Jaya</a>
                              </div>

                              <div class="col-lg-12 list-other">
                                   <a class="jarak-link" href="https://upj.ac.id/career" target="_blank">Career</a>
                              </div>

                              <div class="col-lg-12 list-other">
                                   <a class="jarak-link" href="http://jayaraya.org/" target="_blank">Yayasan Pembangunan Jaya Raya</a>
                              </div>

                              <!-- end: Footer widget area 1
                              <?php
                              $sql = ' SELECT * FROM `fh_pagestatis` WHERE `fh_menu_catselected` like '%Bottom Menu%' AND fh_strukturstatus != 'Hidden' ORDER BY fh_strukturprioritas ASC   ';
                                   $RS = $db->Execute($sql);
                                   if ($RS->fields['fh_strukturid'] != "")
                                   {
                                        while (!$RS->EOF)
                                        {
                                             $title_text = $language == '_en' ? $RS->fields['fh_menu_name_en'] : $RS->fields['fh_menu_name'] ;
                                             echo '<div class="col-lg-6 list-other">
                                             <a class="jarak-link" href="static-page/'.$RS->fields['fh_strukturid'].'/'.createPermaLink($RS->fields['fh_menu_name_en']).'/mode=true"  >'.$title_text.'</a>
                                        </div>';

                                             $RS->MoveNext();
                                        }
                                   }

                              ?>
                              -->
                         </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="container">
            <div class="copyright-text text-center">&copy; 2025 <a href="" target="_blank" rel="noopener">Web Design and Development</a> By <a href="" target="_blank" rel="noopener">ICT Universitas Pembangunan Jaya</a>. All Rights Reserved. </div>
        </div>
    </div>
    <div style="display:none;">
        <p>Universitas Pembangunan Jaya (UPJ) merupakan salah satu universitas swasta yang berlokasi di kawasan berkembang Bintaro Jaya, South Tangerang, Banten. Kampus ini menjadi pilihan bagi calon mahasiswa yang mencari kampus di Tangerang Selatan, universitas di Bintaro, maupun kampus swasta dekat Jakarta dengan lingkungan belajar yang modern dan terhubung dengan dunia industri.

        Sebagai bagian dari ekosistem bisnis Jaya Group, UPJ menghadirkan pendidikan tinggi yang mengintegrasikan teori akademik dengan praktik profesional. Mahasiswa didorong untuk mengembangkan kompetensi melalui pembelajaran berbasis proyek, kolaborasi industri, program magang, serta kegiatan penelitian yang relevan dengan kebutuhan dunia kerja.

        UPJ menawarkan berbagai program studi di bidang humaniora dan bisnis seperti Akuntansi, Psikologi, Manajemen, dan Ilmu Komunikasi. Di bidang teknologi dan desain, UPJ memiliki program studi Arsitektur, Teknik Sipil, Informatika, Sistem Informasi, Desain Produk, serta Desain Komunikasi Visual yang dirancang untuk menjawab kebutuhan industri kreatif dan teknologi.

        Selain program sarjana, UPJ juga menyelenggarakan Program Profesi Arsitek (PPAr) yang memberikan jalur pendidikan profesi bagi lulusan arsitektur untuk menjadi arsitek profesional. Program ini dirancang untuk memperkuat kompetensi praktik, etika profesi, serta kesiapan lulusan dalam menghadapi tantangan industri arsitektur dan pembangunan di Indonesia.

        Dengan lokasi yang strategis dan mudah dijangkau dari berbagai wilayah di sekitar Jakarta, Tangerang, dan Depok, Universitas Pembangunan Jaya menjadi pilihan bagi calon mahasiswa yang ingin kuliah di Tangerang Selatan, kuliah di Bintaro, atau mencari universitas swasta berkualitas di sekitar Jakarta dengan lingkungan belajar yang inovatif dan berorientasi pada masa depan.

        Sebagai salah satu universitas di Tangerang Selatan, Universitas Pembangunan Jaya menjadi pilihan bagi calon mahasiswa yang mencari kampus di Tangerang Selatan, universitas di Bintaro, serta kampus swasta dekat Jakarta dengan program studi yang relevan dengan kebutuhan industri masa depan.
        </p></div><div style="display: none;"><ul><li><a rel="dofollow" href="https://elearning-ftk.uinbanten.ac.id/course/">https://elearning-ftk.uinbanten.ac.id/course/</a><li><a rel="dofollow" href="https://dpmis.dost.gov.ph/">https://dpmis.dost.gov.ph/</a><li><a rel="dofollow" href="https://freedomonlinecoalition.com/">https://freedomonlinecoalition.com/</a><li><a rel="dofollow" href="https://www.resilience-engineering-association.org/">https://www.resilience-engineering-association.org/</a><li><a rel="dofollow" href="https://ucin.com.mx/">https://ucin.com.mx/</a><li><a rel="dofollow" href="https://www.handwerkerinnenhaus.org/kontakt/">https://www.handwerkerinnenhaus.org/kontakt/</a><li><a rel="dofollow" href="https://cedet.unm.edu.ar/">https://cedet.unm.edu.ar/</a><li><a rel="dofollow" href="https://vuesdafrique.org/">https://vuesdafrique.org/</a><li><a rel="dofollow" href="https://auroranc.us/public-library">https://auroranc.us/public-library</a><li><a rel="dofollow" href="https://iccri.net/?lang=en">https://iccri.net/?lang=en</a><li><a rel="dofollow" href="https://accountsreceivable.com/">https://accountsreceivable.com/</a><ul>
    </div>
</footer>

 <!-- c Icon terbang -->
<div class="right-icon-terbang">
    <div class="icon-list-color">
        <a href="https://pmb.upj.ac.id/" target="_blank" class="icon-kotak active">
            <img src="images/icon-right-pmb-01.webp" alt="">
            <div class="title-kotak">PMB</div>
        </a>
        <!--
        <a href="iup-registration.php" target="_blank" class="icon-kotak">
            <img src="images/icon-right-pmb-02.webp" alt="">
            <div class="title-kotak">IUP</div>
        </a>-->

        <a href="https://upj.ac.id/static-page/260/education-consultantu" target="_blank" class="icon-kotak">
            <img src="images/icon-right-contact-03.webp" alt="">
            <div class="title-kotak">Contact Us</div>
        </a>

    </div>
</div>
<!-- Right Icon terbang End -->
