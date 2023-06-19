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
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a class="active">Home</a></li>
                        <li><a href="browse.html">Browse</a></li>
                        <li><a href="details.html">Details</a></li>
                        <li><a href="streams.html">Streams</a></li>
                        <li><a href="<?php echo site_url ('C_Gw/login_admin'); ?>">apanih<img src="<?= base_url('assets/bs/'); ?>assets/images/profile-header.jpg" alt=""></a></li>
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
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Welcome To <em>GW</em></h6>
                  <h4><em>Anda</em> Senang <em> Kami </em>Senang</h4>
                  <h5>Toko Top UP Voucher Game, APK Premium dan pulsa <em>TERMURAH</em> </h5><br>
                  <div class="main-button">
                    <a href="browse.html">Browse Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Game</em> Right Now</h4>
                </div>
                <div class="row">
                  <?php
                    foreach($data as $dt_produk)
                    {
                      if($dt_produk->id_jenis_produk == 1){
                      ?>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <a href="<?php echo base_url('index.php/C_Gw/linkbeli/'). $dt_produk->id_produk ?>"><img src="<?= base_url('assets/bs/'); ?>assets/images/<?= $dt_produk->foto_produk?>" alt="">
                      <h4><?= $dt_produk->nama_produk?></h4></a>
                      <ul>
                        <li><i class="fa fa-cart-arrow-down"></i> : <?= $dt_produk->terjual_produk?></li>
                      </ul>
                    </div>
                  </div>
                    <?php
                    }}
                    ?>   
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Pulsa</em> Right Now</h4>
                </div>
                <div class="row">
                  <?php
                    foreach($data as $dt_produk)
                    {
                      if($dt_produk->id_jenis_produk == 2){
                      ?>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <a href="<?php echo base_url('index.php/C_Gw/linkbeli/'). $dt_produk->id_produk ?>"><img src="<?= base_url('assets/bs/'); ?>assets/images/<?= $dt_produk->foto_produk?>" alt="">
                      <h4><?= $dt_produk->nama_produk?></h4></a>
                      <ul>
                        <li><i class="fa fa-cart-arrow-down"></i> : <?= $dt_produk->terjual_produk?></li>
                      </ul>
                    </div>
                  </div>
                    <?php
                    }}
                    ?>   
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Applikasi</em> Right Now</h4>
                </div>
                <div class="row">
                  <?php
                    foreach($data as $dt_produk)
                    {
                      if($dt_produk->id_jenis_produk == 3){
                      ?>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <a href="<?php echo base_url('index.php/C_Gw/linkbeli/'). $dt_produk->id_produk ?>"><img src="<?= base_url('assets/bs/'); ?>assets/images/<?= $dt_produk->foto_produk?>" alt="">
                      <h4><?= $dt_produk->nama_produk?></h4></a>
                      <ul>
                        <li><i class="fa fa-cart-arrow-down"></i> : <?= $dt_produk->terjual_produk?></li>
                      </ul>
                    </div>
                  </div>
                    <?php
                    }}
                    ?>   
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->
        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2023 <a href="#">GW STORE</a> Company. All rights reserved. 
        </div>
    </div>
    </div>
</footer>


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/bs/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/bs/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="<?= base_url('assets/bs/'); ?>assets/js/isotope.min.js"></script>
<script src="<?= base_url('assets/bs/'); ?>assets/js/owl-carousel.js"></script>
<script src="<?= base_url('assets/bs/'); ?>assets/js/tabs.js"></script>
<script src="<?= base_url('assets/bs/'); ?>assets/js/popup.js"></script>
<script src="<?= base_url('assets/bs/'); ?>assets/js/custom.js"></script>


</body>

</html>
