

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <h1><span>Tambah Produk</span></h1>
            </div>
            <hr>

            <div class="col-lg-12">

              <div class="main-profile ">
              <?php if(validation_errors()): ?>
                  <div class="alert alert-danger" role="alert">
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>
                
                  <form action="<?php echo site_url('C_Gw/AddProdukAction') ?> "method="post" enctype="multipart/form-data" >
                  <div class="row">
                      <div class="col-lg-3">
                        <div class="topics-detail-block bg-white shadow-lg" id="imgBox">
                          <img id="myImg" src="<?= base_url('assets/bs/'); ?>assets/images/profile.jpg"  >
                        </div>
                        <br>
                        <input type="file"  name="userfile" id="image" accept="image/*" id="file" size="20" onchange="onFileSelected(event)" required>
                      </div>
                      <br>
                    <div class="col">
                    <label for="nama_produk" style="color: white;">Nama Produk: </label>
                    <input type="text" class="form-control"  name="nama_produk" style="width: 400px;" placeholder="Nama Produk">
                    <br>
                    <label for="jenis_produk" style="color: white;">Jenis Produk: </label>
                    <select name="jenis_produk" class="form-select" style="padding-top: 0px;padding-bottom: 0px;margin-bottom: 30px ;width: 200px;" aria-label="Default select example">
                      <?php
                          foreach($lj as $lj){
                            ?>
                              <option value="<?=$lj->id_jenis_produk?>"><?=$lj->nama_jenis_produk?></option>
                              <?php  
                            }
                            ?>
                        
                      </select>
                      <!-- <input type="text" class="form-control" placeholder="foto Produk" name="foto_produk"> -->
                      <button type="submit" value="submit" class="btn btn-primary">Tambah Produk</button>
                      <a href="<?=base_url('/index.php/C_Gw/t_produk/')?>"  class="btn btn-danger">Cancel</a>
                    </div>
                    </div>
                    </form>
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
