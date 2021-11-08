  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDp1TUlvHC6l26rh9qGWubKq7yoGnioWuY"></script>
 <!-- ##### Header Area Start ##### -->
    <!-- ##### Header Area End ##### -->
 <!-- ##### Archive Post Area Start ##### -->
 	<?php include("breadcumb.php") ?>
    <div class="archive-post-area mt-3">
        <div class="container" style="max-width: 1240px;">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                     <div class="contact-content-area bg-white mb-30 p-30 box-shadow">
                        <!-- Google Maps -->
                        <div class="map-area mb-30">
                           <div id="map_kontak" style="width: 100%;height: 400px;border: 1px solid #ddd">
                           	<center><h5>Load Map Error. Silakan refresh halaman ini.</h5></center>
                           </div>
                        </div>

                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Info Kontak</h5>
                        </div>

                        <div class="contact-information mb-30">
                           <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mauris id scelerisque eleifend. Nunc vestibulum cursus quam at scelerisque. Aliquam quis varius orci, vel tincidunt est. Proin ac tincidunti, atmots interdum erat. Maecenas neque lorem, aliquet in tempus non, efficitur ac neque.</p> -->

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Alamat Kantor:</p>
                                    <h6><?= $informasi_desa->ALAMAT ?></h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Email:</p>
                                    <h6> <?= $informasi_desa->EMAIL ?></h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Telepon:</p>
                                    <h6> <?= $informasi_desa->TELEPON ?></h6>
                                </div>
                            </div>
                        </div>

                        <!-- Section Title -->
                       <!--  <div class="section-heading">
                            <h5>GET IN TOUCH</h5>
                        </div> -->

                        <!-- Contact Form Area -->
                        <!-- <div class="contact-form-area">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>



                <?php include('sidebar.php') ?>
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
			map = new google.maps.Map(document.getElementById('map_kontak'), {
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