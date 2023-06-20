

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="heading-section">
                <h4><em>Update</em> Metode Pembayaran</h4>
              </div>
            <hr>

            <div class="col-lg-12">
              <div class="main-profile ">
              <div class="row">  
                <div class="col-lg-3">
                  <div class="topics-detail-block bg-white shadow-lg" id="imgBox">
                    <img id="myImg" src="<?= base_url('assets/bs/'); ?>assets/images/metode-pembayaran.jpg"  >
                  </div>
                  <br>
                </div>
                <div class="col">
                <form action="<?php echo site_url('C_Gw/updatePembayaranAction/'). $lmp->id_metode_pembayaran ?> "method="post" enctype="multipart/form-data" role="form" >
                    <br>
                    <input type="hidden" class="form-control" value="<?= $lmp->id_metode_pembayaran?>" name="id_metode" style="width: 400px;">
                    <input type="hidden" class="form-control" value="<?= $lmp->status_metode?>" name="status_metode" style="width: 400px;">

                    <label for="nama_metode" style="color: white;">Nama Metode Pembayaran: </label>
                    <input type="text" class="form-control" value="<?= $lmp->nama_metode?>" name="nama_metode" style="width: 400px;" placeholder="Nama Metode Pembayaran" required>
                    <br>
                   
                      <button type="submit" value="submit" class="btn btn-primary">Update Metode</button>
                      <a href="<?=base_url('/index.php/C_Gw/t_metodePembayaran/')?>"  class="btn btn-danger">Cancel</a>
                  </form>
              </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->
        
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
