          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Tabel</em> Produk</h4>
              </div>
              <?php if($this->session->flashdata('flash')):?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Produk <strong>Berhasil</strong> <?=$this->session->flashdata('flash')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php endif;?>

              <div class="heading-section">
                  <a href="<?php echo site_url ('C_Gw/addProduk/') ?>" type="button" class="btn btn-primary">Tambah produk</a>
              </div><br>
              <table id="pembelian" class="table">
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Jenis Produk</th>
                  <th>Foto Produk</th>
                  <th>Terjual</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th></th>
                </tr>
                <?php
                $cacah=1;
                foreach ($dp as $dt){
                ?>
                <tr>
                  <td><?= $cacah ?> </td>
                  <td><?= $dt->nama_produk ?> </td>
                  <td><?= $dt->nama_jenis_produk ?> </td>
                  <td> <a href="<?= base_url('assets/bs/'); ?>assets/images/<?= $dt->foto_produk?>">  <?= $dt->foto_produk ?> </a></td> 
                  <td><?= $dt->terjual_produk?> </td>
                  <td><?= $dt->nama_jenis_status?> </td>
                  <td><a href="<?php echo site_url ('C_Gw/updateProduk/') . $dt->id_produk ?>" type="button" class="btn btn-success">Update</a>
                      <a href="<?php echo site_url ('C_Gw/hideStatusProduk/') . $dt->id_produk ?>" <?php if($dt->status_produk == 2) echo "hidden";  ?> type="button" class="btn btn-danger" onclick="return confirm ('yakin sembunyikan?');">Hide</a>
                      <a href="<?php echo site_url ('C_Gw/showStatusProduk/') . $dt->id_produk ?>" <?php if($dt->status_produk == 1) echo "hidden";  ?> type="button" class="btn btn-info" onclick="return confirm ('yakin tampilkan?');">Show</a> </td>
                  <td><a href="<?php echo site_url ('C_Gw/t_nominal/') . $dt->id_produk ?>" type="button" class="btn btn-secondary">Nominal</a></td>
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
