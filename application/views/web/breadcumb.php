 <div class="mag-breadcrumb py-5">
        <div class="container" style="max-width: 1240px;">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        	<li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
	                            <?php foreach ($this->uri->segments as $segment){ 
	                                $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
	                                $is_active =  $url == $this->uri->uri_string;
	                            ?>
                           	 	<li class="breadcrumb-item"><a href="#"><?php echo ucwords(str_replace('_', ' ', $segment)) ?></a></li>

                        	<?php } ?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>