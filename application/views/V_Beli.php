
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="<?= base_url('assets/bs/'); ?>assets/images/<?= $dtp->foto_produk?>" alt="" style="border-radius: 23px;">
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                        <span><?= $dtjp->nama_jenis_produk ?></span>
                      <h4><?= $dtp->nama_produk ?></h4>
                      <p><?= $dtp->deskripsi_produk ?></p>
                      
                      
                    </div>
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <ul>
                      <li>Terjual :<span><i class="fa fa-cart-arrow-down"></i>   <?= $dtp->terjual_produk ?></span></li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="clips">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="heading-section">
                            <h4><em>Masukkan</em> Detail Pesanan</h4>
                          </div>
                        </div>
                        <div>
                          <?php if(validation_errors()): ?>
                            <div class="alert alert-danger" role="alert">
                              <?= validation_errors(); ?>
                            </div>
                          <?php endif; ?>
                        <form action="<?php echo site_url('C_Gw/beliAction/'). $id ?>" method="post">

                          <h2>Masukan UID :</h2><br>
                          <input type="text" name="uid" placeholder="User ID / No. Telepon">
                          
                          <br><br><br>
                          <br>
                          <br>
                              
                        <h2>Pilih Nominal</h2>
                        <?php
                          foreach($dtn as $dt){
                            ?>
                          <section>
                          <div>
                            <input type="radio" id="<?=$dt->nama_nominal?>" name="nominal" value="<?=$dt->id_nominal?>">
                            <label for="<?=$dt->nama_nominal?>">
                              <p><?=$dt->nama_nominal?></p>
                              <p>Rp. <?=number_format($dt->harga_nominal,0,"",".")?></p>
                            </label>
                          </div>
                          </section>
                        <?php
                          }
                        ?>

                        <br><br><br>
                        <br>
                        <br>



                        <h2>Pilih Metode Pembayaran</h2>
                        <?php
                          foreach($dtmp as $dt){
                            ?>
                          <section>
                          <div>
                            <input type="radio" id="<?=$dt->nama_metode?>" name="metode" value="<?=$dt->id_metode_pembayaran?>">
                            <label for="<?=$dt->nama_metode?>">
                              <p><?=$dt->nama_metode?></p>
                            </label>
                          </div>
                          </section>
                        <?php
                          }
                        ?>

                        <br><br><br>
                        <br>
                        <br>

                        <section>
                          <div>

                            <input type="submit" value="Beli" onclick="return radioValidation();">
                            <input type="reset" value="Reset" >
                          </div>
                        </section>
                        </form>

                        <script type="text/javascript">
                            function radioValidation(){

                                var nominal = document.getElementsByName('nominal');
                                var metode = document.getElementsByName('metode');
                                var nominalValue = false;
                                var metodeValue = false;

                                for(var i=0; i<nominal.length;i++){
                                    if(nominal[i].checked == true){
                                      nominalValue = true;    
                                    }
                                }
                                if(!nominalValue){
                                    alert("Tolong Pilih Nominal");
                                    return false;
                                }

                                for(var i=0; i<metode.length;i++){
                                    if(metode[i].checked == true){
                                      metodeValue = true;    
                                    }
                                }
                                if(!metodeValue){
                                    alert("Tolong Pilih Metode Pembayaran");
                                    return false;
                                }
                            }
                        </script>

                              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved. 
          
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // // ES6 Modules or TypeScript
  // import Swal from 'sweetalert2'

  // // CommonJS
  // const Swal = require('sweetalert2')
  <?php if($this->session->flashdata('swal_icon')){?>
    Swal.fire({
      title: '<?= $this->session->flashdata('swal_title') ?>',
      text: '<?= $this->session->flashdata('swal_text') ?>',
      icon: '<?= $this->session->flashdata('swal_icon') ?>',
      showConfirmButton: false,
      timer: 5000
    })
  <?php } ?>
</script>

</body>

</html>
