<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>GW STORE</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bs/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/owl.css">
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/animate.css">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/radio.scss"> -->
    <link rel="stylesheet" href="<?= base_url('assets/bs/'); ?>assets/css/login.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
  </head>

<body>
    <div class="login-reg-panel">
        <div class="login-info-box">
            <h2>Have an account?</h2>
            <p>Login Please</p>
            <label id="label-register" for="log-reg-show">Login</label>
            <input type="radio" name="active-log-panel" id="log-reg-show">
        </div>

        <div class="register-info-box">
            <h2>Don't have an account?</h2>
            <p>Register First</p>
            <label id="label-login" for="log-login-show">Register</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>

        <div class="white-panel">

            <div class="login-show">
                <form class="user" method="post" action="<?php echo site_url('C_Gw/login_aksi');?> " enctype="multipart/form-data">
                <h2>LOGIN</h2>
                <?= $this->session->flashdata('message') ?>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="username" value="<?= set_value('username')?>">
                        <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>

            <div class="register-show">
                <form class="user" method="post" action="<?php echo site_url('C_Gw/registrasi');?>">
                    <h2>REGISTER</h2>
                    <input type="text" placeholder="Username" name="username" value="<?= set_value('username')?>">
                    <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input type="password" placeholder="Password" name="password" value="<?= set_value('password')?>">
                    <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input type="password" placeholder="Confirm Password" name="confirm">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- Scripts -->
    <script>


    $(document).ready(function(){
        <?php if ($reg == 1):?>
            $('.register-info-box').fadeOut(); 
            $('.login-info-box').fadeIn();
            
            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');
        <?php elseif($reg == 0): ?>
            $('.login-show').addClass('show-log-panel');
            $('.login-info-box').fadeOut();
        <?php endif;?>
    });


    $('.login-reg-panel input[type="radio"]').on('change', function() {
        if($('#log-login-show').is(':checked')) {
            $('.register-info-box').fadeOut(); 
            $('.login-info-box').fadeIn();
            
            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');
            
        }
        else if($('#log-reg-show').is(':checked')) {
            $('.register-info-box').fadeIn();
            $('.login-info-box').fadeOut();
            
            $('.white-panel').removeClass('right-log');
            
            $('.login-show').addClass('show-log-panel');
            $('.register-show').removeClass('show-log-panel');
        }
    });

    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/bs/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/bs/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?= base_url('assets/bs/'); ?>assets/js/isotope.min.js"></script>
    <script src="<?= base_url('assets/bs/'); ?>assets/js/owl-carousel.js"></script>
    <script src="<?= base_url('assets/bs/'); ?>assets/js/tabs.js"></script>
    <script src="<?= base_url('assets/bs/'); ?>assets/js/popup.js"></script>
    <script src="<?= base_url('assets/bs/'); ?>assets/js/custom.js"></script>
    <script src="<?= base_url('assets/bs/'); ?>assets/js/login.js"></script>


</body>

</html>