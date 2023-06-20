

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
