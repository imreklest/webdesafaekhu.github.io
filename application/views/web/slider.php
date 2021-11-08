 <?php 
 	if($query_slide->num_rows()>0){ 
 ?>
 <div class="hero-area owl-carousel">
 		<?php foreach ($query_slide->result_array() as $key => $artikel) { 
 			$url_artikel = base_url('post/'.$artikel['SLUG_URL']);
 		?>
        <!-- Single Blog Post -->
        <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(<?= base_url().$artikel['GAMBAR_FULL'] ?>);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                
                            </div>
                            <a href="<?= $url_artikel ?>" class="post-title" data-animation="fadeInUp" data-delay="300ms"><?= $artikel['JUDUL'] ?></a>
                            <a href="<?= $url_artikel ?>" class="video-play" data-animation="bounceIn" data-delay="500ms"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>    
</div>
<?php
	}
?>