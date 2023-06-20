

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="heading-section">
                <h4><em>Edit</em> Profil</h4>
              </div>
            <hr>

            <div class="col-lg-12">
              <div class="main-profile ">
              <div class="row">  
                <div class="col-lg-3">
                  <div class="topics-detail-block bg-white shadow-lg" id="imgBox">
                    <img id="myImg" src="<?= base_url('assets/bs/'); ?>assets/images/profile.jpg"  >
                  </div>
                  <br>
                </div>
                <div class="col">
                <form action="<?php echo site_url('C_Gw/editProfilAction/'). $data['id_admin'] ?> "method="post" enctype="multipart/form-data" role="form" >
                    <br>
                    <input type="hidden" class="form-control" value="<?= $data['id_admin']?>" name="id_admin" style="width: 400px;">
                    <input type="hidden" class="form-control" value="<?= $data['password']?>" name="password" style="width: 400px;">
                    <input type="hidden" class="form-control" value="<?= $data['username']?>" name="username" style="width: 400px;">
                    <input type="hidden" class="form-control" value="<?= $data['hak_akses']?>" name="hak_akses" style="width: 400px;">

                    <label for="username" style="color: white;">Username: </label>
                    <input type="text" class="form-control" value="<?= $data['username']?>" style="width: 400px;" disabled>
                    <br>
                    <label style="color: white;">Hak akses: </label>
                    <select class="form-select" aria-label="Default select example" disabled >
                        <option <?php if($data['hak_akses'] == "A") echo "selected"; ?> value="A">Admin</option>
                        <option <?php if($data['hak_akses'] == "P") echo "selected"; ?> value="P">User</option>
                        <option <?php if($data['hak_akses'] == "O") echo "selected"; ?> value="O">Operator</option>
                    </select>
                    <br>
                    <label for="moto_admin" style="color: white;">Moto hidup: </label>
                    <input type="text" class="form-control" value="<?= $data['moto_admin']?>" name="moto_admin" style="width: 400px;" required>
                    <br>
                    <label for="email" style="color: white;">Email: </label>
                    <input type="email" class="form-control" value="<?= $data['email']?>" name="email" style="width: 400px;" required>
                    <br>
                    <label for="id_role" style="color: white;">Role: </label>
                    <select name="id_role" class="form-select" style="padding-top: 0px;padding-bottom: 0px;margin-bottom: 30px ;width: 200px;" aria-label="Default select example" required>
                      <?php
                      foreach($role as $role){
                        ?>
                          <option <?php if($data['id_role'] == $role->id_role) echo "selected";  ?> value="<?=$role->id_role?>"><?=$role->Role?></option>
                        <?php  
                        }
                        ?>
                    </select>
                    <label for="id_jenis_kelamin" style="color: white;">Jenis Kelamin: </label>
                    <select name="id_jenis_kelamin" class="form-select" style="padding-top: 0px;padding-bottom: 0px;margin-bottom: 30px ;width: 200px;" aria-label="Default select example" required>
                      <?php
                      foreach($jk as $jk){
                        ?>
                          <option <?php if($data['id_jenis_kelamin'] == $jk->id_jenis_kelamin) echo "selected";  ?> value="<?=$jk->id_jenis_kelamin?>"><?=$jk->jenis_kelamin?></option>
                        <?php  
                        }
                        ?>
                    </select>
                    <br>
                    
                   
                      <button type="submit" value="submit" class="btn btn-primary">Update Profil</button>
                      <a href="<?=base_url('/index.php/C_Gw/login/')?>"  class="btn btn-danger">Cancel</a>
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
