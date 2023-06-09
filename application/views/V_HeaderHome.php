<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>GW STORE</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bs/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/owl.css">
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/radio.scss">
<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="<?= base_url()?>" class="logo">
                        <img src="<?= base_url('assets/bs/'); ?>assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="<?= base_url()?>"<?php if($id == 0) echo 'class="active"' ?>>Home</a></li>
                        <li><a href="<?= site_url ('C_Gw/byJenisProduk/1'); ?>" <?php if($id == 1) echo 'class="active"' ?> >Game</a></li>
                        <li><a href="<?= site_url ('C_Gw/byJenisProduk/2'); ?>" <?php if($id == 2) echo 'class="active"' ?>>Pulsa</a></li>
                        <li><a href="<?= site_url ('C_Gw/byJenisProduk/3'); ?>" <?php if($id == 3) echo 'class="active"' ?>>Apk</a></li>
                        <li><a href="<?= site_url ('C_Gw/about'); ?>" <?php if($id == 4) echo 'class="active"' ?>>About</a></li>
                        <li><a href="<?php echo site_url ('C_Gw/login'); ?>">Login<img src="<?= base_url('assets/bs/'); ?>assets/images/profile-header.jpg" alt=""></a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->