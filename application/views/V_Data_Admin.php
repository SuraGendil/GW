<!-- ***** Gaming Library Start ***** -->
<div class="gaming-library profile-library">
    <div class="col-lg-12">
        <div class="heading-section">
            <h4><em>Tabel</em> Data User</h4>
        </div>
        <?php if($this->session->flashdata('flash')):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Hak akses admin <strong>Berhasil</strong> <?=$this->session->flashdata('flash')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

        <!-- <div class="heading-section">
            <a href="<?php echo site_url ('C_Gw/addAdmin/') ?>" type="button" class="btn btn-primary">Tambah admin</a>
        </div><br> -->
        
        <table id="pembelian" class="table">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Moto User</th>
                <th>Role</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Hak Akses</th>
                <th>Action</th>
            </tr>
            <?php
            $cacah=1;
            foreach ($dp as $dt){
            ?>
            <tr>
                <td><?= $cacah ?> </td>
                <td><?= $dt->username ?> </td>
                <td><?= $dt->moto_admin ?> </td>
                <td><?= $dt->Role ?> </td>
                <td><?= $dt->jenis_kelamin ?> </td>
                <td><?= $dt->email ?> </td>
                <td>
                    <form action="<?php echo site_url('C_Gw/updateHakAkses/') . $dt->id_admin ?>" method="post">
                        <select name="hak_akses" class="form-select" aria-label="Default select example" style="width: 125px">
                            <option <?php if($dt->hak_akses == "A") echo "selected"; ?> value="A">Admin</option>
                            <option <?php if($dt->hak_akses == "P") echo "selected"; ?> value="P">User</option>
                            <option <?php if($dt->hak_akses == "O") echo "selected"; ?> value="O">Operator</option>
                        </select>
                        <div id="updatebutton">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengganti hak akses?');">Update</button>
                        </div>
                    </form>
                </td>
                <td>
                    <a href="<?php echo site_url ('C_Gw/deleteAdmin/') . $dt->id_admin ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</a>
                </td>
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
                <p>Copyright © 2036 
                    <a href="#">GW STORE</a> Company. All rights reserved.
                </p>
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
