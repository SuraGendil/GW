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
                        <li><a href="browse.html">Browse</a></li>
                        <li><a href="details.html">Details</a></li>
                        <li><a href="streams.html">Streams</a></li>
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
              <h1><span>Edit Produk</span></h1>
            </div>
            <hr>

            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <form action="<?php echo site_url('C_Gw/updateProdukAction/'). $dataProduk->id_produk ?> "method="post" enctype="multipart/form-data" role="form" >
                      <div class="col-lg-3">
                        <div class="topics-detail-block bg-white shadow-lg" id="imgBox">
                          <img id="myImg" src="<?= base_url('assets/bs/assets/images/'. $dataProduk->foto_produk); ?>"  >
                        </div>
                        <br>
                        <input type="file"  name="userfile" id="image" accept="image/*" id="file" onchange="onFileSelected(event)" >
                      </div>
                    <br>
                    <label for="nama_produk" style="color: white;">Nama Produk: </label>
                    <input type="text" class="form-control" value="<?php echo $dataProduk->nama_produk ?>" name="nama_produk" style="width: 400px;" placeholder="Nama Produk" required>
                    <br>
                    <label for="jenis_produk" style="color: white;">Jenis Produk: </label>
                    <select name="jenis_produk" class="form-select" style="padding-top: 0px;padding-bottom: 0px;margin-bottom: 30px ;width: 200px;" aria-label="Default select example" required>
                      <option value="" disabled>Jenis Produk</option>
                      <?php
                      foreach($lj as $lj){
                        ?>
                          <option <?php if($dataProduk->id_jenis_produk == $lj->id_jenis_produk) echo "selected";  ?> value="<?=$lj->id_jenis_produk?>"><?=$lj->nama_jenis_produk?></option>
                        
                        <?php  
                        }
                        ?>
                        
                      </select>
                      <input type="hidden" value="<?php echo $dataProduk->foto_produk ?>" name="temp_foto">
                      <input type="hidden" value="<?php echo $dataProduk->id_produk ?>" name="id_produk">
                      <input type="hidden" value="<?php echo $dataProduk->terjual_produk ?>" name="terjual_produk">
                      <input type="hidden" value="<?php echo $dataProduk->status_produk ?>" name="status_produk">
                      <!-- <input type="text" class="form-control" placeholder="foto Produk" name="foto_produk"> -->
                      <button type="submit" value="update" class="btn btn-primary">Update Produk</button>
                      <a href="<?=base_url('/index.php/C_Gw/t_produk/')?>"  class="btn btn-danger">Cancel</a>
                      </form>
                    </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->
          
          <!-- ***** Gaming Library Start ***** -->
          <!-- <div class="gaming-library profile-library">
            <div class="col-lg-12">
              
            </div>
          </div> -->
          <!-- ***** Gaming Library End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          <!-- <div class="gaming-library profile-library">
            <div class="col-lg-12">
              
            </div>
          </div> -->
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
  <script>
            function onFileSelected(event) {
            var selectedFile = event.target.files[0];
            var reader = new FileReader();

            var imgtag = document.getElementById("myImg");
            imgtag.title = selectedFile.name;

            reader.onload = function(event) {
                imgtag.src = event.target.result;
            };

            reader.readAsDataURL(selectedFile);
            }
        </script>
  <script src="<?= base_url('assets/bs/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="<?= base_url('assets/bs/'); ?>assets/js/isotope.min.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>assets/js/owl-carousel.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>assets/js/tabs.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>assets/js/popup.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>assets/js/custom.js"></script>


  </body>

</html>
