

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>About <em>GW STORE</em></h6>
                  <h4><em>Anda</em> Senang <em> Kami </em>Senang</h4>
                  <h5>Kami merupakan toko <em>online</em> yang berfokus menyediakan jasa <em>top up</em> untuk game, pulsa, dan aplikasi. </h5><br>
                  <h5>Kami hadir untuk memenuhi kebutuhan para kaum <em>melenial</em> yang tak akan jauh dari <em>internet</em>.</h5><br>
                  <h5>Jasa kami <em>terpercaya</em>, <em>terjamin</em>, <em>terlengkap</em>, dan <em>termurah</em>.  </h5><br>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->
          <div class="most-popular">
          <div class="row">
          <h4>Saat ini GW store menyediakan jasa top up untuk produk:</h4>
          <hr>
          <hr>
                    <div class="col">
                      <h5 style="color: #1399cd;">Game</h5><br>
                      <?php
                        foreach($data as $dt_produk){
                          if($dt_produk->id_jenis_produk == 1){
                      ?>
                        <h6>- <?=$dt_produk->nama_produk?></h6>
                      <?php
                          }
                        }
                      ?>
                    </div>
                    <div class="col">
                      <h5 style="color: #1399cd;">Pulsa</h5><br>
                      <?php
                        foreach($data as $dt_produk){
                          if($dt_produk->id_jenis_produk == 2){
                      ?>
                        <h6>- <?=$dt_produk->nama_produk?></h6>
                      <?php
                          }
                        }
                      ?>
                    </div>
                    <div class="col">
                      <h5 style="color: #1399cd;">Apk</h5><br>
                      <?php
                        foreach($data as $dt_produk){
                          if($dt_produk->id_jenis_produk == 3){
                      ?>
                        <h6>- <?=$dt_produk->nama_produk?></h6>
                      <?php
                          }
                        }
                      ?>
                    </div>
                  </div>
                  <hr>
                  <h5 style="color: #1399cd;">Dengan Metode Pembayaran</h5><br>
                    <?php
                      foreach($dmp as $dt_mp){
                    ?>
                      <h6>- <?=$dt_mp->nama_metode?></h6>
                    <?php
                      }
                    ?>
</div>
          
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
