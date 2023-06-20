

<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <h1><span>Edit User</span></h1>
            </div>
            <hr>

            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <form action="<?php echo site_url('C_Gw/updateProdukAction/'). $dataProduk->id_produk ?> "method="post" enctype="multipart/form-data" role="form" >
                    <div class="row">  
                    <div class="col-lg-3">
                        <div class="topics-detail-block bg-white shadow-lg" id="imgBox">
                          <img id="myImg" src="<?= base_url('assets/bs/assets/images/'. $dataProduk->foto_produk); ?>"  >
                        </div>
                        <br>
                        <input type="file"  name="userfile" id="image" accept="image/*" id="file" onchange="onFileSelected(event)" >
                      </div>
                      <div class="col">
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
                      <button type="submit" value="update" class="btn btn-primary">Update Produk</button>
                      <a href="<?=base_url('/index.php/C_Gw/t_produk/')?>"  class="btn btn-danger">Cancel</a>
                    </div>  
                    </form>
                    </div>
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
