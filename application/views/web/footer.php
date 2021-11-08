 <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <!-- Logo -->
                        <a href="javascript:void(0)" class="foo-logo"><img src="<?= base_url($informasi_desa->LOGO) ?>" alt="" style="width: 100px;border-radius: 3px;"></a>
                        <p>
                        	Pemerintah <?= $informasi_desa->NAMA ?><br/>
                        	<i class="fa fa-envelope"></i> <?= $informasi_desa->EMAIL ?><br/>
                        	<i class="fa fa-phone-square"></i> <?= $informasi_desa->TELEPON ?><br/>
                        	<i class="fa fa-building"></i> <?= $informasi_desa->ALAMAT ?>
                    	</p>
                        
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Kategori</h6>
                        <nav class="footer-widget-nav">
                            <ul>
                            	<?php foreach ($kategori_footer as $key => $value) { ?>
                                <li><a href="<?= base_url('kategori/'.$value->SLUG_URL_KAT) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= $value->NAMA ?></a></li>
                                <?php }?>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Paling Populer</h6>
                        <!-- Single Blog Post -->
                        <?php foreach ($artikel_populer_footer as $key => $value) {?>
                        <div class="single-blog-post style-2 d-flex">
                            <div class="post-thumbnail">
                                <img src="<?= base_url($value->GAMBAR_ADMIN) ?>" alt="">
                            </div>
                            <div class="post-content">
                                <a href="<?= base_url('post/'.$value->SLUG_URL) ?>" class="post-title"><?= $value->JUDUL ?></a>
                                <div class="post-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= $value->JUM_VIEW ?></a>
                                    <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                                </div>
                            </div>
                        </div>
                    	<?php } ?>

                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Media Sosial</h6>
                        <div class="footer-social-info">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        <p class="copywrite-text">
            				Copyright &copy;<script>document.write(new Date().getFullYear());</script> - Pemerintah <?= $informasi_desa->NAMA ?></p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <nav class="footer-nav text-right">
                        	<p class="copywrite-text">
                           			Developed By J-Tech Solusindo | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                           	</p>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>