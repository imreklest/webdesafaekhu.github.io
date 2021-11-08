<div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white p-30 mb-30 box-shadow">
                    	
                     <div class="single-sidebar-widget">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Paling Populer</h5>
                </div>

                <!-- Single Blog Post -->
                <?php 
                    foreach ($artikel_populer_sidebar as $key => $post) {
                    $url_post = base_url('post/'.$post['SLUG_URL']);
                ?>
                    <div class="single-blog-post d-flex">
                        <div class="post-thumbnail">
                            <img src="<?= base_url($post['GAMBAR_ADMIN']) ?>" alt="">
                        </div>
                        <div class="post-content">
                            <a href="<?= $url_post ?>" class="post-title"><?= $post['JUDUL'] ?></a>
                            <div class="post-meta d-flex justify-content-between">
                                 <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= waktu_lalu($post['CREATED_ON']) ?></a>
                                <!-- <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= $post['JUM_VIEW'] ?></a>    -->
                               
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>


                    </div>
                     <div class="sidebar-area bg-white mb-30 box-shadow">

                        <!-- Sidebar Widget -->
                        <div class="single-sidebar-widget p-30">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h5>Kategori</h5>
                            </div>

                            <!-- Catagory Widget -->
                            <ul class="footer-widget">
                            	<?php foreach ($kategori_footer as $key => $value) { ?>
                                <li><a href="<?= base_url('kategori/'.$value->SLUG_URL_KAT) ?>"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= $value->NAMA ?></span> <span></span></a></li>
                                <?php }?>
                            </ul>
                        </div>

                    </div>
                </div>