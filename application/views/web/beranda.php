 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDp1TUlvHC6l26rh9qGWubKq7yoGnioWuY"></script>
 <!-- ##### Header Area Start ##### -->
    <?php include('slider.php') ?>
    <!-- ##### Header Area End ##### -->
 <!-- ##### Archive Post Area Start ##### -->
    <div class="archive-post-area mt-3">
        <div class="container" style="max-width: 1240px;">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                	<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

                    	<!-- Feature Video Posts Area -->
			            <div class="feature-video-posts mb-30">
			                <!-- Section Title -->
			                <div class="section-heading row">
			                	<div class="col-md-6 pt-2">
			                    	<h5>Post Terbaru</h5>
			                	</div>
			                	<div class="col-md-6">
			                    	<a href="<?= base_url('kategori/all') ?>" class="btn btn-success btn-sm pull-right">Lihat Semua</a>
			                	</div>
			                </div>

			                <div class="featured-video-posts">
			                    <div class="row">
			                        <div class="col-12 col-lg-7">
			                        	<?php  
			                        		$dt_post_singel = $post_terbaru->row_array();
			                        		$url_post_single = base_url('post/'.$dt_post_singel['SLUG_URL']);
			                        	?>
			                            <!-- Single Featured Post -->
			                            <div class="single-featured-post">
			                                <!-- Thumbnail -->
			                                <div class="post-thumbnail mb-50">
			                                    <img src="<?= base_url($dt_post_singel['GAMBAR_ADMIN']) ?>" alt="">
			                                    <a href="<?= $url_post_single ?>" class="video-play"><i class="fa fa-play"></i></a>
			                                </div>
			                                <!-- Post Contetnt -->
			                                <div class="post-content">
			                                    <a href="<?= $url_post_single ?>" class="post-title"><?= $dt_post_singel['JUDUL'] ?></a>
			                                    <p><?= html_cut(strip_tags($dt_post_singel['KONTEN']),200).'....' ?></p>
			                                </div>
			                                <!-- Post Share Area -->
			                                <div class="post-share-area d-flex align-items-center justify-content-between">
			                                    <!-- Post Meta -->
			                                    <div class="post-meta pl-3">
			                                        <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= waktu_lalu($dt_post_singel['CREATED_ON']) ?></a>
                                    						<a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= $dt_post_singel['JUM_VIEW'] ?></a>	
			                                    </div>
			                                    
			                                </div>
			                            </div>
			                        </div>

			                        <div class="col-12 col-lg-5">
			                            <!-- Featured Video Posts Slide -->
			                            <div class="featured-video-posts-slide owl-carousel">
			                            	
			                                <div class="single--slide">
			                                    <!-- Single Blog Post -->
			                                    <?php 
			                                    	foreach ($post_terbaru->result_array() as $key => $post) {
			                                    	$url_post = base_url('post/'.$post['SLUG_URL']);
			                                    ?>
			                                    <div class="single-blog-post d-flex style-3">
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
			                                	<?php } ?>

			                              
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
                    </div>
                	<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                		 <!-- Most Viewed Videos -->
			            <div class="sports-videos-area mb-30">
			                <!-- Section Title -->
			                <div class="section-heading row">
			                	<div class="col-md-6 pt-2">
			                    	<h5>Berita Terbaru</h5>
			                	</div>
			                	<div class="col-md-6">
			                    	<a href="<?= base_url('kategori/berita') ?>" class="btn btn-success btn-sm pull-right">Lihat Semua</a>
			                	</div>
			                </div>

			                <?php  
                        		$dt_berita_singel = $berita_terbaru->row_array();
                        		$url_berita_single = base_url('post/'.$dt_berita_singel['SLUG_URL']);
                        	?>

			                <div class="sports-videos-slides owl-carousel mb-30">
			                    <!-- Single Featured Post -->
			                    <div class="single-featured-post">
			                        <!-- Thumbnail -->
			                        <div class="post-thumbnail mb-50">
			                            <img src="<?= base_url($dt_berita_singel['GAMBAR_ADMIN']) ?>" alt="">
			                            <a href="<?= $url_berita_single ?>" class="video-play"><i class="fa fa-play"></i></a>
			                        </div>
			                        <!-- Post Contetnt -->
			                        <div class="post-content">
			                           
			                            <a href="<?= $url_berita_single ?>" class="post-title"><?= $dt_berita_singel['JUDUL'] ?></a>
			                            <p><?= html_cut(strip_tags($dt_berita_singel['KONTEN']),200).'....' ?></p>
			                        </div>
			                        <!-- Post Share Area -->
			                        <div class="post-share-area d-flex align-items-center justify-content-between">
			                            <!-- Post Meta -->
			                            <div class="post-meta pl-3">
			                                 <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= waktu_lalu($dt_berita_singel['CREATED_ON']) ?></a>
                                    						<a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= $dt_berita_singel['JUM_VIEW'] ?></a>	
			                            </div>
			                        </div>
			                    </div>
			                </div>


			            </div>
			            <div class="row">
		                    <!-- Single Blog Post -->
		                    <?php 
                            	foreach ($berita_terbaru->result_array() as $key => $post) {
                            	$url_post = base_url('post/'.$post['SLUG_URL']);
                            ?>
		                    <div class="col-12 col-lg-6">
		                        <div class="single-blog-post d-flex style-3 mb-30">
		                            <div class="post-thumbnail">
		                                <img src="<?= base_url($post['GAMBAR_ADMIN'])?>" alt="">
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



                <?php include('sidebar_beranda.php') ?>
            </div>
        </div>
    </div>
    <!-- ##### Archive Post Area End ##### -->
    <script type="text/javascript">
    initMap('<?= $informasi_desa->LOKASI_LAT ?>','<?= $informasi_desa->LOKASI_LONG ?>')
	function initMap(lat='',long='') {
		if(lat != '' && long !=''){
			var lokasi_lat = parseFloat(lat);
			var lokasi_long = parseFloat(long);
		}else{
			var lokasi_lat = -7.95304;
			var lokasi_long = 112.6911413;
		}
		myLatlng = {lat: lokasi_lat, lng: lokasi_long};
		
		if(google!==undefined){
			map = new google.maps.Map(document.getElementById('map'), {
			zoom: 17,
			center: myLatlng
			});

			marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title: 'Lokasi Kantor Desa'
			});


			google.maps.event.addListener(map, 'click', function(event) {
				marker.setPosition(event.latLng);
				var lat = event.latLng.lat();
				var long = event.latLng.lng();
				$("#lat").val(lat);
				$("#long").val(long);
			});
		}
		
	}
</script>