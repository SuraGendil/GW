
          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Tabel</em> Metode Pembayaran</h4>
              </div>
              <?php if($this->session->flashdata('flash')):?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data metode Pembayaran <strong>Berhasil</strong> <?=$this->session->flashdata('flash')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php endif;?>
              <div class="heading-section">
                  <a href="<?=base_url('/index.php/C_Gw/addPembayaran/')?>" type="button" class="btn btn-primary">Tambah Metode Pembayaran</a>
              </div><br>
              <table id="pembelian" class="table">
                <tr>
                  <th>No</th>
                  <th>Metode Pembayaran</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php
                $cacah=1;
                // echo "<a href='index.php/C_Tobat_Jaya/neworder'><button>NEW</button></a>";
                foreach ($dmp as $dt){
                ?>
                <tr>
                  <td><?= $cacah ?> </td>
                  <td><?= $dt->nama_metode ?> </td>
                  <td><?= $dt->nama_jenis_status ?> </td>
                  <td><a href="<?=base_url('/index.php/C_Gw/updatePembayaran/'). $dt->id_metode_pembayaran?>" type="button" class="btn btn-success">Update</a>
                  <a href="<?php echo site_url ('C_Gw/hideStatusPembayaran/') . $dt->id_metode_pembayaran ?>" <?php if($dt->status_metode == 2) echo "hidden";  ?> type="button" class="btn btn-danger" onclick="return confirm ('yakin sembunyikan?');">Hide</a>
                      <a href="<?php echo site_url ('C_Gw/showStatusPembayaran/') . $dt->id_metode_pembayaran ?>" <?php if($dt->status_metode == 1) echo "hidden";  ?> type="button" class="btn btn-info" onclick="return confirm ('yakin tampilkan?');">Show</a> </td>
                  
                </tr>
                <?php
                  $cacah++;
                }
                ?>


              </table>
              
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
  <script src="<?= base_url('assets/bs/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="<?= base_url('assets/bs/'); ?>assets/js/isotope.min.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>assets/js/owl-carousel.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>assets/js/tabs.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>assets/js/popup.js"></script>
  <script src="<?= base_url('assets/bs/'); ?>assets/js/custom.js"></script>


  </body>

</html>
