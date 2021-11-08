
<div class="col-12 col-md-6 col-lg-5 col-xl-4">
	<?php
		if($sambutan_kades->num_rows()>0){
			$dt_sambutan_kades = $sambutan_kades->row_array();
	?>
	<div class="sidebar-area bg-white p-30 mb-30 box-shadow">
		<!-- Sidebar Widget -->
		<div class="single-sidebar-widget">
			<div style="border: 1px solid #8464f7">
				<div class="section-heading">
					<h5>Sambutan Kepala Desa</h5>
				</div>
				<center>
					<a href="#" class="add-img"><img src="<?= base_url($dt_sambutan_kades['FOTO_KADES']) ?>" alt="" style="width:30%;border-radius: 3px"></a><br/>
					<h5 style="color:purple;line-height: 2;text-decoration: underline;"><?= $dt_sambutan_kades['NAMA_KADES'] ?></h5>

				</center>
				<div class="m-4">
					<p style="color:#1c1212;line-height: 1.3"><?= html_cut(strip_tags($dt_sambutan_kades['KONTEN']),200).'....' ?></p><a href="<?= base_url('sambutan-kades') ?>" style="color:red">Selengkapnya</a>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="sidebar-area bg-white mb-30 box-shadow">

		<!-- Sidebar Widget -->
		<div class="single-sidebar-widget p-30">
			<!-- Section Title -->
			<div class="section-heading">
				<h5>Lokasi Kantor Desa</h5>
			</div>

			<div id="map" style="width: 100%;height: 300px;border: 1px solid #ddd">
				<center><h5>Load Map Error. Silakan refresh halaman ini.</h5></center>
			</div>
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
