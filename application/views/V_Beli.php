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
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/radio.scss">
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
                        <li><a href="<?= base_url()?>">Home</a></li>
                        <li><a href="browse.html">Browse</a></li>
                        <li><a href="details.html">Details</a></li>
                        <li><a href="streams.html">Streams</a></li>
                        <li><a href="profile.html">Profile <img src="<?= base_url('assets/bs/'); ?>assets/images/profile-header.jpg" alt=""></a></li>
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
                  <?php foreach ($dtp as $dt):?>
                    <img src="<?= base_url('assets/bs/'); ?>assets/images/<?= $dt->foto_produk?>" alt="" style="border-radius: 23px;">
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                      <?php foreach ($dtjp as $dtj):?>
                      <span><?= $dtj->nama_jenis_produk ?></span>
                      <?php endforeach;?>
                      <h4><?= $dt->nama_produk ?></h4>
                      <p>You Haven't Gone Live yet. Go Live By Touching The Button Below.</p>
                      
                      
                    </div>
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <ul>
                      <li>Terjual :<span><i class="fa fa-cart-arrow-down"></i>   <?= $dt->terjual_produk ?></span></li>
                      <!-- <li>Friends Online <span>16</span></li>
                      <li>Live Streams <span>None</span></li>
                      <li>Clips <span>29</span></li> -->
                    </ul>
                  </div>
                </div>
                  <?php endforeach;?>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="clips">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="heading-section">
                            <h4><em>Masukkan</em> Detail Pesanan</h4>
                          </div>
                        </div>
                        <div>
                        <form action="<?php echo site_url('C_Gw/beliAction/'). $id ?>" method="post">

                          <h2>Masukan UID :</h2><br>
                          <input type="text" name="uid" placeholder="User ID / No. Telepon" required>
                          
                          <br><br><br>
                          <br>
                          <br>
                              
                        <h2>Pilih Nominal</h2>
                        <?php
                          foreach($dtn as $dt){
                            ?>
                          <section>
                          <div>
                            <input type="radio" id="<?=$dt->nama_nominal?>" name="nominal" value="<?=$dt->id_nominal?>">
                            <label for="<?=$dt->nama_nominal?>">
                              <p><?=$dt->nama_nominal?></p>
                              <p>Rp. <?=number_format($dt->harga_nominal,0,"",".")?></p>
                            </label>
                          </div>
                          </section>
                        <?php
                          }
                        ?>

                        <br><br><br>
                        <br>
                        <br>



                        <h2>Pilih Metode Pembayaran</h2>
                        <?php
                          foreach($dtmp as $dt){
                            ?>
                          <section>
                          <div>
                            <input type="radio" id="<?=$dt->nama_metode?>" name="metode" value="<?=$dt->id_metode_pembayaran?>">
                            <label for="<?=$dt->nama_metode?>">
                              <p><?=$dt->nama_metode?></p>
                            </label>
                          </div>
                          </section>
                        <?php
                          }
                        ?>

                        <br><br><br>
                        <br>
                        <br>

                        <section>
                          <div>

                            <input type="submit" value="Beli" onclick="return radioValidation();">
                            <input type="reset" value="Reset" >
                          </div>
                        </section>
                        </form>

                        <script type="text/javascript">
                            function radioValidation(){

                                var nominal = document.getElementsByName('nominal');
                                var metode = document.getElementsByName('metode');
                                var nominalValue = false;
                                var metodeValue = false;

                                for(var i=0; i<nominal.length;i++){
                                    if(nominal[i].checked == true){
                                      nominalValue = true;    
                                    }
                                }
                                if(!nominalValue){
                                    alert("Tolong Pilih Nominal");
                                    return false;
                                }

                                for(var i=0; i<metode.length;i++){
                                    if(metode[i].checked == true){
                                      metodeValue = true;    
                                    }
                                }
                                if(!metodeValue){
                                    alert("Tolong Pilih Metode Pembayaran");
                                    return false;
                                }
                            }
                        </script>

                              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved. 
          
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
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
