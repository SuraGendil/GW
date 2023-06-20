

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

         

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em><?=$title?></em> Right Now</h4>
                </div>
                <div class="row">
                  <?php
                    foreach($data as $dt_produk)
                    {
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
                    }
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
