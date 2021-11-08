 <style type="text/css">
 	.post-meta-2 a{
     color: #8464f7 !important;
 	}
 	.post_konten p{
	    color: #332e2e;
	}
	.post_konten ul li, .post_konten. ol li {
	    list-style: unset;
	    color: #332e2e;
	    margin-left: 10px;
	}
 </style>
 <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        	<li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
	                            <?php foreach ($this->uri->segments as $segment){ 
	                                $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
	                                $is_active =  $url == $this->uri->uri_string;
	                            ?>
                           	 	<li class="breadcrumb-item"><a href="#"><?php echo ucwords(str_replace('-', ' ', $segment)) ?></a></li>

                        	<?php } ?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
	<section class="post-details-area">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-xl-8">
                    <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                        <div class="blog-thumb mb-30 justify-content-center text-center">
                            <img src="<?= base_url($post['GAMBAR_FULL']) ?>" alt="">
                        </div>
                        <div class="blog-content">
                           <!--  <div class="post-meta">
                                <a href="#">MAY 8, 2018</a>
                                <a href="archive.html">lifestyle</a>
                            </div> -->
                            <h4 class="post-title"><?= $post['JUDUL'] ?></h4>
                            <!-- Post Meta -->
                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= waktu_lalu($post['CREATED_ON']) ?></a>
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= $post['JUM_VIEW'] ?></a>	
                            </div>
                            <div class="post_konten mt-4">
                            	<?= $post['KONTEN'] ?>
                        	</div>

                            <!-- Like Dislike Share -->
                          <!--   <div class="like-dislike-share my-5">
                                <h4 class="share">240<span>Share</span></h4>
                                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Share on Facebook</a>
                                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Share on Twitter</a>
                            </div> -->

                            <!-- Post Author -->
                            <!-- <div class="post-author d-flex align-items-center">
                                <div class="post-author-thumb">
                                    <img src="<?= base_url('assets/web/') ?>img/bg-img/52.jpg" alt="">
                                </div>
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name">Alan Shaerer</a>
                                    <p>Duis tincidunt turpis sodales, tincidunt nisi et, auctor nisi. Curabitur vulputate sapien eu metus ultricies fermentum nec vel augue. Maecenas eget lacinia est.</p>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Related Post Area -->
                    <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Post Lainnya</h5>
                        </div>

                        <div class="row">
                            <!-- Single Blog Post -->
                            <?php 
                            	foreach ($post_lain as $key => $post) {
                            	$url_post = base_url('post/'.$post['SLUG_URL']);
                            ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-blog-post style-4 mb-30">
                                    <div class="post-thumbnail">
                                        <img src="<?= base_url($post['GAMBAR_ADMIN']) ?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="<?= $url_post ?>" class="post-title"><?= $post['JUDUL'] ?></a>
                                        <div class="post-meta d-flex">
                                             <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= waktu_lalu($post['CREATED_ON']) ?></a>
                                    						<a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= $post['JUM_VIEW'] ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>

                   
                    
                </div>

                <!-- Sidebar Widget -->
                <?php include('sidebar.php') ?>
            </div>
        </div>
    </section>