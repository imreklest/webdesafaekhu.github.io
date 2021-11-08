 <style type="text/css">
 	.post-meta-2 a{
     color: #8464f7 !important;
 	}
 	.post_konten p{
	    color: #332e2e;
	}
	.post_konten ul li, ol li {
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
                       
                        <div class="blog-content">
                           <!--  <div class="post-meta">
                                <a href="#">MAY 8, 2018</a>
                                <a href="archive.html">lifestyle</a>
                            </div> -->
                            <h4 class="post-title">Sambutan Kepala Desa Faekhu</h4>
                            <!-- Post Meta -->

                            <div class="blog-thumb mb-30 justify-content-center text-center">
	                            <img src="<?= base_url($sambutan['FOTO_KADES']) ?>" alt="" style="width: 100px">
	                            <hr/>
	                        </div>
                             
                           
                            <div class="post_konten mt-4">
                            	<?=$sambutan['KONTEN'] ?>
                        	</div>

                        </div>
                    </div>

                    

                   

                </div>

                <!-- Sidebar Widget -->
                <?php include('sidebar.php') ?>
            </div>
        </div>
    </section>