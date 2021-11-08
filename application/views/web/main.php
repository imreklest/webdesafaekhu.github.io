<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= isset($meta_desc)?$meta_desc:$informasi_desa->META_DESC ?>">
    <meta name="keywords" content="<?= isset($meta_keyword)?$meta_keyword:$informasi_desa->META_KEYWORD ?>">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?=$page_title ?> | <?= $informasi_desa->NAMA ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url($informasi_desa->LOGO_KECIL) ?>">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/web/') ?>style.css">

</head>

<body style="background-color: #f2e3f9">
    <style type="text/css">
        /*.hero-blog-post {
            height: 400px;
        }*/
        .header-area .mag-main-menu, .header-area .is-sticky .mag-main-menu {
		    box-shadow: 
		rgba(177, 157, 247, 0.97) 0px 0.46875rem 2.1875rem, rgba(53, 87, 60, 0.29) 0px 0.9375rem 1.40625rem, rgba(20, 64, 162, 0.11) 0px 0.25rem 0.53125rem, rgba(117, 126, 145, 0.98) 0px 0.125rem 0.1875rem;
        }
        a.nav-brand img {
            height: auto;
            max-width: 50px;
            margin-right: 20px;
        }
        /*.classy-nav-container {
            background-color: 
            #d3defd;
        }*/
        .hero-blog-post .post-content .post-title {
        	margin-right: 50px;
        	margin-left: 50px;
        }

        .beranda_berita .owl-prev,.beranda_berita .owl-next {
        	display: none;
        }
		.header-area .mag-main-menu .classy-navbar .classynav ul li a:hover, .header-area .mag-main-menu .classy-navbar .classynav ul li a:focus,.header-area .mag-main-menu .classy-navbar .classynav ul li a.active {
		    color: #8464f7;
    </style>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <?php echo $header ?>
    <!-- ##### Header Area End ##### -->
    
    <!-- ##### Mag Posts Area Start ##### -->
    <?php echo $content; ?>
    <!-- ##### Mag Posts Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   <?php echo $footer; ?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?= base_url('assets/web/') ?>js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?= base_url('assets/web/') ?>js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url('assets/web/') ?>js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?= base_url('assets/web/') ?>js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?= base_url('assets/web/') ?>js/active.js"></script>
    <script type="text/javascript">
    	cek_active_nav();
    	function cek_active_nav(){
				if($(".classynav > ul > li > a.active")[0] != undefined){
					var a = $(".classynav > ul > li > a.active")[0].parentElement;
					console.log(a);
					// var b = a.children[0];
					// a.className = 'mm-active';
					// b.className = 'mm-active';

					// b.addEventListener('click', () => window.scrollTo({
					//   top: 400,
					//   behavior: 'smooth',
					// }));					
				}
			}
    </script>
</body>

</html>