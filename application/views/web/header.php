<header class="header-area">

        <!-- Navbar Area -->
        <div class="mag-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="magNav">

                    <!-- Nav brand -->
                    <a href="<?= base_url() ?>" class="nav-brand"><img src="<?= base_url($informasi_desa->LOGO) ?>" alt=""><?= $informasi_desa->NAMA ?></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Nav Content -->
                    <div class="nav-content d-flex align-items-center">
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a <?= ($kode_menu=='beranda')?'class="active"':'' ?> href="<?= base_url() ?>">Beranda</a></li>
                                    <li><a href="#">Tentang Desa</a>
                                        <ul class="dropdown">
                                        	<?php 
                                        		foreach ($menu_ttg_desa as $key => $value) {
                                        			$url = !empty($value['SLUG_URL'])?$value['SLUG_URL']:'#';
                                        	?>                     
                                            	<li><a <?= ($kode_menu==$value['KODE_MENU'])?'class="active"':'' ?> href="<?= base_url('post/'.$url) ?>"><?= $value['NAMA_MENU'] ?></a></li>
                                        	<?php } ?>
                                        </ul>
                                    </li>
                                     <li><a href="#">Keunggulan Desa</a>
                                        <ul class="dropdown">
                                        	<?php 
                                        		foreach ($menu_unggulan_desa as $key => $value) {
                                        			$url = !empty($value['SLUG_URL'])?$value['SLUG_URL']:'#';
                                        	?>                     
                                            	<li><a href="<?= base_url('unggulan_desa/'.$url) ?>"><?= $value['NAMA'] ?></a></li>
                                        	<?php } ?>
                                        </ul>
                                    </li>
                                    <li><a <?= ($kode_menu=='berita')?'class="active"':'' ?> href="<?= base_url('kategori/berita') ?>">Berita</a></li>
                                    <li><a <?= ($kode_menu=='event')?'class="active"':'' ?> href="<?= base_url('kategori/event') ?>">Event</a></li>
                                    <li><a <?= ($kode_menu=='artikel')?'class="active"':'' ?> href="<?= base_url('kategori/artikel') ?>">Artikel</a></li>

                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <div class="top-meta-data d-flex align-items-center">
                            <div class="top-search-area">
                                <!-- <form action="index.html" method="post">
                                    <input type="search" name="top-search" id="topSearch" placeholder="Pencarian...">
                                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form> -->
                            </div>
                            <!-- <a href="login.html" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a> -->
                            <a href="<?= base_url('kontak') ?>" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">Kontak</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>