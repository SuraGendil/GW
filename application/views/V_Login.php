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
                        <!-- <li><a href="browse.html">Browse</a></li> -->
                        <!-- <li><a href="details.html">Details</a></li> -->
                        <!-- <li><a href="streams.html">Streams</a></li> -->
                        <li><a href="<?php echo site_url ('C_Gw/login'); ?>" class="active">Profile <img src="<?= base_url('assets/bs/'); ?>assets/images/profile-header.jpg" alt=""></a></li>
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
                  <?php
                    foreach($data as $dt_admin)
                    {
                      ?>
                  <div class="col-lg-4">
                    <img src="<?= base_url('assets/bs/'); ?>assets/images/profile.jpg" alt="" style="border-radius: 23px;">
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                      <h4><?=$dt_admin->username?></h4>
                      <p><?=$dt_admin->moto_admin?></p>
                      <div class="main-border-button">
                        <!--  -->
                        <a href="<?php echo site_url ('C_Gw/login'); ?>">Tabel Pembelian</a>
                        <a href="<?php echo site_url ('C_Gw/t_produk'); ?>">Tabel Produk</a>
                        <a href="<?php echo site_url ('C_Gw/t_metodePembayaran'); ?>">Tabel Metode Pembayaran</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <ul>
                    <?php foreach ($dr as $dt_role):?>
                      <li>Role<span><?=$dt_role->Role?></span></li>
                      <?php endforeach;?>
                      <?php foreach ($djk as $dt_jk):?>
                        <li>Jenis Kelamin <span><?=$dt_jk->jenis_kelamin?></span></li>
                        <?php endforeach;?>
                        <!-- <li>Live Streams <span>None</span></li>
                      <li>Clips <span>29</span></li> -->
                    </ul>
                  </div>
                </div>
                <?php
                    }
                    ?>

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
                <h4><em>Hasil</em> Bulan Ini</h4>
              </div>
              <div class="item">
              <ul>
                  <li><img src="<?= base_url('assets/bs/'); ?>assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Game</h4><span>ALL</span></li>
              <?php foreach ($shg as $shg):
                if($shg->total_pendapatan == NULL){
                  $shg->total_pendapatan = 0;
                }
                ?>
                    <li><h4>Pendapatan</h4><span>Rp.<?= number_format($shg->total_pendapatan, 0, "", ".")?></span></li>
                    <li><h4>Pembeli</h4><span><?=$shg->jumlah_dibeli ?></span></li>
                    <?php endforeach;?>
                  
                    <?php foreach ($ppg as $ppg):?>
                  <li><h4>Terbanyak Dibeli</h4><span><?=$ppg->terpopuler ?></span></li>
                  <?php endforeach;?>
                  <li><div class="main-border-button border-no-active"><a href="https://docs.google.com/spreadsheets/d/1kTlC1o6IHDixodnJUIAosuUCTCfaaUIesDoVhQtl7R4/edit#gid=1724625262">Recap</a></div></li>
                </ul>
              </div>
              <div class="item">
                <ul>
                  <li><img src="<?= base_url('assets/bs/'); ?>assets/images/game-02.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Pulsa</h4><span>All</span></li>
                  <?php foreach ($shp as $shp):
                      if($shp->total_pendapatan == NULL){
                        $shp->total_pendapatan = 0;
                      }
                    ?>
                    <li><h4>Pendapatan</h4><span>Rp.<?= number_format($shp->total_pendapatan, 0, "", ".")?></span></li>
                    <li><h4>Pembeli</h4><span><?=$shp->jumlah_dibeli ?></span></li>
                    <?php endforeach;?>
                    <?php foreach ($ppa as $ppa):?>
                  <li><h4>Terbanyak Dibeli</h4><span><?=$ppa->terpopuler ?></span></li>
                  <?php endforeach;?>
                  <li><div class="main-border-button border-no-active"><a href="https://docs.google.com/spreadsheets/d/1kTlC1o6IHDixodnJUIAosuUCTCfaaUIesDoVhQtl7R4/edit#gid=1724625262">Recap</a></div></li>
                </ul>
              </div>
              <div class="item last-item">
                <ul>
                  <li><img src="<?= base_url('assets/bs/'); ?>assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>APK</h4><span>All</span></li>
                  <?php foreach ($sha as $sha):
                      if($sha->total_pendapatan == NULL){
                        $sha->total_pendapatan = 0;
                      }
                    ?>
                    <li><h4>Pendapatan</h4><span>Rp.<?= number_format($sha->total_pendapatan, 0, "", ".")?></span></li>
                    <li><h4>Pembeli</h4><span><?=$sha->jumlah_dibeli ?></span></li>
                    <?php endforeach;?>
                    <?php foreach ($ppp as $ppp):?>
                  <li><h4>Terbanyak Dibeli</h4><span><?=$ppp->terpopuler ?></span></li>
                  <?php endforeach;?>
                  <li><div class="main-border-button border-no-active"><a href="https://docs.google.com/spreadsheets/d/1kTlC1o6IHDixodnJUIAosuUCTCfaaUIesDoVhQtl7R4/edit#gid=1724625262">Recap</a></div></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <?php foreach ($sh as $sh):?>
              <div class="heading-section">
                <br>
                <h4><em>Total Pendapatan :</em> <?= number_format($sh->total_pendapatan, 0, "", ".")?></h4>
              </div>
                <?php endforeach;?>
              <div class="heading-section">
                <h4><em>Tabel</em> Pembelian</h4>
              </div>
              <table id="pembelian" class="table">
                <tr>
                  <th>No</th>
                  <th>UID/No.Telepon</th>
                  <th>Nama Produk</th>
                  <th>Nominal</th>
                  <th>Metode Pembayaran</th>
                  <th>Harga</th>
                  <th>Tanggal Pembelian</th>
                  <th>Jenis Produk</th>
                </tr>
                <?php
                $cacah=1;
                // echo "<a href='index.php/C_Tobat_Jaya/neworder'><button>NEW</button></a>";
                foreach ($dp as $dt){
                ?>
                <tr>
                  <td><?= $cacah ?> </td>
                  <td><?= $dt->no_pembeli ?> </td>
                  <td><?= $dt->nama_produk ?> </td>
                  <td><?= $dt->nama_nominal ?> </td> 
                  <td><?= $dt->nama_metode?> </td>
                  <td>Rp. <?= number_format($dt->harga_nominal,0,"",".")?> </td>
                  <td><?= date("d-F-Y",strtotime($dt->tgl_pembelian ));?> </td>
                  <td><?= $dt->nama_jenis_produk ?> </td>
                  
                </tr>
                <?php
                  $cacah++;
                }
                ?>


              </table>
              
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
