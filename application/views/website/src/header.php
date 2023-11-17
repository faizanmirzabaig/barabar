<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  ">
  <meta name="author" content="themeturn.com">
  <title><?= PROJECT_NAME ?></title>
  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/bootstrap/bootstrap.css') ?>">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/fontawesome/css/all.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/bicon/css/bicon.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/themify/themify-icons.css') ?>">
  <!-- animate.css -->
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/animate-css/animate.css') ?>">
  <!-- WooCOmmerce CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/woocommerce/woocommerce-layouts.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/woocommerce/woocommerce-small-screen.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/woocommerce/woocommerce.css') ?>">
   <!-- Owl Carousel  CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/owl/assets/owl.carousel.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/web/vendors/owl/assets/owl.theme.default.min.css') ?>">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?= base_url('assets/web/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/web/css/responsive.css') ?>"></head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    const BASE_URL = '<?= base_url()?>';
  </script>
<body id="top-header">    
<header>
    <!-- <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <ul class="header-contact">
                        <li>
                            <span>Call :</span>
                           +9999999999
                        </li>
                        <li>
                            <span>Email :</span>
                            <a href="#" class="__cf_email__" style="color:#fff;">info@example.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header-right float-right">
                        <div class="header-socials">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="header-btn">
                            <a href="#" class="btn btn-main btn-small"><i class="fa fa-user mr-2"></i>Login / Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div> -->
    <!-- Main Menu Start -->
    <div class="site-navigation main_menu " id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url('/') ?>">
                    <img src="<?= base_url('assets/web/images/logo.png') ?>" alt="Edutim" class="img-fluid logo">
                </a>
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link js-scroll-trigger" href="<?= base_url('/') ?>">Home</a>  
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('Home/about') ?>" class="nav-link js-scroll-trigger">
                                About us
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= base_url('Home/mycourse') ?>">
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('Home/contact') ?>" class="nav-link">
                                Contact
                            </a>
                        </li>
                        <?php if(empty($this->session->userdata('user_id'))){ ?>
                            <li class="nav-item ">
                                <a href="<?= base_url('Home/log_in') ?>" class="nav-link">Login</a>
                            </li>
                        <?php }else { ?> 
                            <li class="nav-item ">
                                <a href="<?= base_url('Home/logout') ?>" class="nav-link">Logout</a>
                            </li>
                        <?php } ?>  
                    </ul>
                    <ul class="header-contact-right d-none d-lg-block">
                        <li> <a href="#" class="header-cart"><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href="#" class="header-search search_toggle"> <i class=" fa fa-search"></i></a></li>
                        <!-- <?php if(empty($this->session->userdata('user_id'))){ ?>
                            <li><a href="<?= base_url('Home/log_in') ?>" >Login</a></li>
                        <?php }else { ?> 
                            <li><a href="<?= base_url('Home/logout') ?>" >Logout</a></li> 
                        <?php } ?>   -->
                    </ul>
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>
</header>