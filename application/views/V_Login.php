
          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Hasil</em> Bulan Ini</h4>
              </div>
              <div class="item">
              <ul>
                  <li><img src="<?= base_url('assets/bs/'); ?>assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Game</h4><span>ALL</span></li>
              <?php foreach ($shg as $shg):
                if($shg->total_pendapatan == NULL){
                  $shg->total_pendapatan = 0;
                }
                ?>
                    <li><h4>Pendapatan</h4><span>Rp.<?= number_format($shg->total_pendapatan, 0, "", ".")?></span></li>
                    <li><h4>Pembeli</h4><span><?=$shg->jumlah_dibeli ?></span></li>
                    <?php endforeach;?>
                  
                    <?php foreach ($ppg as $ppg):?>
                  <li><h4>Terbanyak Dibeli</h4><span><?=$ppg->terpopuler ?></span></li>
                  <?php endforeach;?>
                  <li><div class="main-border-button border-no-active"><a href="https://docs.google.com/spreadsheets/d/1kTlC1o6IHDixodnJUIAosuUCTCfaaUIesDoVhQtl7R4/edit#gid=1724625262">Recap</a></div></li>
                </ul>
              </div>
              <div class="item">
                <ul>
                  <li><img src="<?= base_url('assets/bs/'); ?>assets/images/game-02.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Pulsa</h4><span>All</span></li>
                  <?php foreach ($shp as $shp):
                      if($shp->total_pendapatan == NULL){
                        $shp->total_pendapatan = 0;
                      }
                    ?>
                    <li><h4>Pendapatan</h4><span>Rp.<?= number_format($shp->total_pendapatan, 0, "", ".")?></span></li>
                    <li><h4>Pembeli</h4><span><?=$shp->jumlah_dibeli ?></span></li>
                    <?php endforeach;?>
                    <?php foreach ($ppa as $ppa):?>
                  <li><h4>Terbanyak Dibeli</h4><span><?=$ppa->terpopuler ?></span></li>
                  <?php endforeach;?>
                  <li><div class="main-border-button border-no-active"><a href="https://docs.google.com/spreadsheets/d/1kTlC1o6IHDixodnJUIAosuUCTCfaaUIesDoVhQtl7R4/edit#gid=1724625262">Recap</a></div></li>
                </ul>
              </div>
              <div class="item last-item">
                <ul>
                  <li><img src="<?= base_url('assets/bs/'); ?>assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>APK</h4><span>All</span></li>
                  <?php foreach ($sha as $sha):
                      if($sha->total_pendapatan == NULL){
                        $sha->total_pendapatan = 0;
                      }
                    ?>
                    <li><h4>Pendapatan</h4><span>Rp.<?= number_format($sha->total_pendapatan, 0, "", ".")?></span></li>
                    <li><h4>Pembeli</h4><span><?=$sha->jumlah_dibeli ?></span></li>
                    <?php endforeach;?>
                    <?php foreach ($ppp as $ppp):?>
                  <li><h4>Terbanyak Dibeli</h4><span><?=$ppp->terpopuler ?></span></li>
                  <?php endforeach;?>
                  <li><div class="main-border-button border-no-active"><a href="https://docs.google.com/spreadsheets/d/1kTlC1o6IHDixodnJUIAosuUCTCfaaUIesDoVhQtl7R4/edit#gid=1724625262">Recap</a></div></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <?php foreach ($sh as $sh):?>
              <div class="heading-section">
                <br>
                <h4><em>Total Pendapatan :</em> <?= number_format($sh->total_pendapatan, 0, "", ".")?></h4>
              </div>
                <?php endforeach;?>
              <div class="heading-section">
                <h4><em>Tabel</em> Pembelian</h4>
              </div>
              <table id="pembelian" class="table">
                <tr>
                  <th>No</th>
                  <th>UID/No.Telepon</th>
                  <th>Nama Produk</th>
                  <th>Nominal</th>
                  <th>Metode Pembayaran</th>
                  <th>Harga</th>
                  <th>Tanggal Pembelian</th>
                  <th>Jenis Produk</th>
                </tr>
                <?php
                $cacah=1;
                // echo "<a href='index.php/C_Tobat_Jaya/neworder'><button>NEW</button></a>";
                foreach ($dp as $dt){
                ?>
                <tr>
                  <td><?= $cacah ?> </td>
                  <td><?= $dt->no_pembeli ?> </td>
                  <td><?= $dt->nama_produk ?> </td>
                  <td><?= $dt->nama_nominal ?> </td> 
                  <td><?= $dt->nama_metode?> </td>
                  <td>Rp. <?= number_format($dt->harga_nominal,0,"",".")?> </td>
                  <td><?= date("d-F-Y",strtotime($dt->tgl_pembelian ));?> </td>
                  <td><?= $dt->nama_jenis_produk ?> </td>
                  
                </tr>
                <?php
                  $cacah++;
                }
                ?>


              </table>
              
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
