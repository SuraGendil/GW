
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="heading-section">
                <h4><em>Edit Nominal</em> <?php echo $ln->nama_produk?></h4>
              </div>
            <hr>

            <div class="col-lg-12">
              <div class="main-profile ">
              <?php if(validation_errors()): ?>
                  <div class="alert alert-danger" role="alert">
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>
              <div class="row">  
                <div class="col-lg-3">
                  <div class="topics-detail-block bg-white shadow-lg" id="imgBox">
                    <img id="myImg" src="<?= base_url('assets/bs/'); ?>assets/images/<?= $ln->foto_produk?>"  >
                  </div>
                  <br>
                </div>
                <div class="col">
                <form action="<?php echo site_url('C_Gw/updateNominalAction/'). $ln->id_nominal ?> "method="post" enctype="multipart/form-data" role="form" >
                    <br>
                    <input type="hidden" class="form-control" value="<?=$ln->id_nominal?>" name="id_nominal" style="width: 400px;">
                    <input type="hidden" class="form-control" value="<?=$ln->status_nominal?>" name="status_nominal" style="width: 400px;">
                    <input type="hidden" class="form-control" value="<?=$ln->id_produk?>" name="id_produk" style="width: 400px;">
                    <label for="nama_nominal" style="color: white;">Nama Nominal: </label>
                    <input type="text" class="form-control" value="<?=$ln->nama_nominal?>" name="nama_nominal" style="width: 400px;" placeholder="Nama Nominal" required>
                    <br>
                    <label for="harga" style="color: white;">Harga: </label>
                    <input type="number" class="form-control" value="<?=$ln->harga_nominal?>" name="harga" style="width: 400px;" placeholder="Harga Nominal" min="1000" required>
                    <br>
                   
                      <button type="submit" value="submit" class="btn btn-primary">Update Nominal</button>
                      <a href="<?=base_url('/index.php/C_Gw/t_nominal/'). $ln->id_produk?>"  class="btn btn-danger">Cancel</a>
                  </form>
                </div>
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
