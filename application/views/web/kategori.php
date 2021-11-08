 <!-- ##### Header Area Start ##### -->
    <!-- ##### Header Area End ##### -->
 <!-- ##### Archive Post Area Start ##### -->
 	<?php include("breadcumb.php") ?>
    <div class="archive-post-area mt-3">
        <div class="container" style="max-width: 1240px;">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                    	<div class="section-heading">
		                    <h5><?= $page_title ?></h5>
		                </div>
                        <!-- Single Catagory Post -->
                        <?php 
                        	if($postingan->num_rows()>0){
                        	foreach ($postingan->result_array() as $key => $post) { 
                        	$url_artikel = base_url('post/'.$post['SLUG_URL']);
                        ?>
                        <div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail bg-img" style="background-image: url(<?= base_url($post['GAMBAR_ADMIN']) ?>);">
                                <a href="<?= $url_artikel ?>" class="video-play"><i class="fa fa-play"></i></a>
                            </div>

                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <!-- <div class="post-meta">
                                    <a href="#">MAY 8, 2018</a>
                                    <a href="archive.html">lifestyle</a>
                                </div> -->
                                <a href="<?= $url_artikel ?>" class="post-title"><?= $post['JUDUL'] ?></a>
                                <!-- Post Meta -->
                                <div class="post-meta-2">                                    
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= waktu_lalu($post['CREATED_ON']) ?></a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= $post['JUM_VIEW'] ?></a>
                                    <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a> -->
                                </div>
                                <?= html_cut(strip_tags($post['KONTEN']),200).'....' ?>
                            </div>
                        </div>
                    	<?php }}else{echo "Data Tidak Ditemukan";} ?>

                      

                        <!-- Pagination -->
                        <nav>
                        	<?php echo $pagination; ?>
                            <!-- <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                            </ul> -->
                        </nav>

                    </div>
                </div>



                <?php include('sidebar.php') ?>
            </div>
        </div>
    </div>
    <!-- ##### Archive Post Area End ##### -->