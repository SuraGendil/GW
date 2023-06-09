<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bs/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/owl.css">
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->

<style>
  table tr{
    text-align: center;
    color: white;
  }
  th{
    /* border: 2px solid white; */
    color: white;
    text-align: center;
    padding: 10px;

  }
  td{
    /* border: 2px solid white; */
    color: white;
    text-align: center;
    padding: 10px;
  }
</style>
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
                    <a href="<?php echo site_url ('C_Gw/index'); ?>" class="logo">
                        <img src="<?= base_url('assets/bs/'); ?>assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="<?= base_url()?>">Home</a></li>
                        <li><a href="<?= site_url ('C_Gw/byJenisProduk/1'); ?>" >Game</a></li>
                        <li><a href="<?= site_url ('C_Gw/byJenisProduk/2'); ?>">Pulsa</a></li>
                        <li><a href="<?= site_url ('C_Gw/byJenisProduk/3'); ?>">Apk</a></li>
                        <li><a href="<?= site_url ('C_Gw/about'); ?>">About</a></li>
                        <li><a href="<?php echo site_url ('C_Gw/logout_aksi'); ?>">Logout</a></li>
                        <li><a href="<?php echo site_url ('C_Gw/login/'); ?>" class="active">Profile <img src="<?= base_url('assets/bs/'); ?>assets/images/profile-header.jpg" alt=""></a></li>
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

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="<?= base_url('assets/bs/'); ?>assets/images/profile.jpg" alt="" style="border-radius: 23px;">
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                      <h4><?=$data_admin['username']?>
                      <div class="badge float-right">
                      <a href="<?php echo site_url ('C_Gw/editprofil/'); ?>"><i class='fas fa-edit'></i>edit profil</a>
                      </div></h4>
                      <p><?=$data_admin['moto_admin']?></p>
                      <div class="main-border-button">

                        <?php if($data_admin['hak_akses'] == 'A'){
                          ?>
                            <a href="<?php echo site_url ('C_Gw/t_admin'); ?>">Tabel Admin</a>
                            <?php  
                          }
                          ?>
                        <?php if($data_admin['hak_akses'] == 'A' or $data_admin['hak_akses'] == 'O'){
                          ?>
                          <a href="<?php echo site_url ('C_Gw/login/'); ?>">Tabel Pembelian</a>
                          <a href="<?php echo site_url ('C_Gw/t_produk/'); ?>">Tabel Produk</a>
                          <a href="<?php echo site_url ('C_Gw/t_metodePembayaran/');; ?>">Tabel Metode Pembayaran</a>
                      <?php  
                          }
                          ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <ul>
                      <li>Role<span><?=$role['Role']?></span></li>
                        <li>Jenis Kelamin <span><?=$jk['jenis_kelamin']?></span></li>

                        <li>Email <span><?=$data_admin['email']?></span></li>
                        <!-- <li>Live Streams <span>None</span></li>
                      <li>Clips <span>29</span></li> -->

                    </ul>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->