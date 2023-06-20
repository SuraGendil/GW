<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Cyborg - Awesome HTML5 Template</title>

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
                        <li><a href="<?php echo site_url ('C_Gw/index'); ?>">Home</a></li>
                        <!-- <li><a href="browse.html">Browse</a></li>
                        <li><a href="details.html">Details</a></li>
                        <li><a href="streams.html">Streams</a></li> -->
                        <li><a href="profile.html" class="active">Profile <img src="<?= base_url('assets/bs/'); ?>assets/images/profile-header.jpg" alt=""></a></li>
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
                      <h4><?=$data->nama_admin?></h4>
                      <p><?=$data->moto_admin?></p>
                      <div class="main-border-button">
                        
                        <a href="<?php echo site_url ('C_Gw/login'); ?>">Tabel Pembelian</a>
                        <a href="<?php echo site_url ('C_Gw/t_produk'); ?>">Tabel Produk</a>
                        
                        <a href="<?php echo site_url ('C_Gw/t_metodePembayaran'); ?>">Tabel Metode Pembayaran</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <ul>
                      <li>Role<span><?=$data->Role?></span></li>
                        <li>Jenis Kelamin <span><?=$data->jenis_kelamin?></span></li>
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

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Tabel</em> Metode Pembayaran</h4>
              </div>
              <?php if($this->session->flashdata('flash')):?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data metode Pembayaran <strong>Berhasil</strong> <?=$this->session->flashdata('flash')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php endif;?>
              <div class="heading-section">
                  <a href="<?=base_url('/index.php/C_Gw/addPembayaran/')?>" type="button" class="btn btn-primary">Tambah Metode Pembayaran</a>
              </div><br>
              <table id="pembelian" class="table">
                <tr>
                  <th>No</th>
                  <th>Metode Pembayaran</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php
                $cacah=1;
                // echo "<a href='index.php/C_Tobat_Jaya/neworder'><button>NEW</button></a>";
                foreach ($dmp as $dt){
                ?>
                <tr>
                  <td><?= $cacah ?> </td>
                  <td><?= $dt->nama_metode ?> </td>
                  <td><?= $dt->nama_jenis_status ?> </td>
                  <td><a href="<?=base_url('/index.php/C_Gw/updatePembayaran/'). $dt->id_metode_pembayaran?>" type="button" class="btn btn-success">Update</a>
                  <a href="<?php echo site_url ('C_Gw/hideStatusPembayaran/') . $dt->id_metode_pembayaran ?>" <?php if($dt->status_metode == 2) echo "hidden";  ?> type="button" class="btn btn-danger" onclick="return confirm ('yakin sembunyikan?');">Hide</a>
                      <a href="<?php echo site_url ('C_Gw/showStatusPembayaran/') . $dt->id_metode_pembayaran ?>" <?php if($dt->status_metode == 1) echo "hidden";  ?> type="button" class="btn btn-info" onclick="return confirm ('yakin tampilkan?');">Show</a> </td>
                  
                </tr>
                <?php
                  $cacah++;
                }
                ?>


              </table>
              
              </div>
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">GW STORE</a> Company. All rights reserved. 
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