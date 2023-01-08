<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StockPile</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>public/images/stockpileicon.png">
        <!-- favicon ends --->
        
        <!--- LOAD FILES -->
        <?php if($_SERVER['HTTP_HOST'] == "localhost" || (stristr($_SERVER['HTTP_HOST'], "192.168.") !== FALSE)|| (stristr($_SERVER['HTTP_HOST'], "127.0.0.") !== FALSE)): ?>

          <!-- Google Font: Source Sans Pro -->
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
          <link rel="stylesheet" href="<?=base_url()?>public/plugins/fontawesome-free/css/all.min.css">
          <link rel="stylesheet" href="<?=base_url()?>public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
          <link rel="stylesheet" href="<?=base_url()?>public/dist/css/adminlte.min.css">
          <link rel="stylesheet" href="<?=base_url()?>public/dist/css/other-style.css">

          <script src="<?=base_url()?>public/js/jquery.min.js"></script>

        <?php endif; ?> 
      

    </head>

    <body class="hold-transition login-page bg-picture">

          <div class="login-box">
            <!-- /.login-logo -->
            <div class="card">
            <div class="login-logo px-3 pt-4">
                <img src="<?=base_url()?>public/images/stockpile.png" alt="" height="100">
            </div>
            <span id="errMsg" class="alert text-center m-0"></span>
            <p class="text-secondary text-center h4">Welcome</p>
              <div class="card-body login-card-body">
                <form id="loginForm">
                  <div class="input-group mb-3">
                    <input type="email" class="form-control checkField errMsg" placeholder="Email" id="email" required>
                    <span class="help-block errMsg" id="lastNameErr"></span>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-5">
                    <input type="password" class="form-control checkField errMsg" placeholder="Password" id="password" required="">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <div class="d-grid gap-2 pb-4">
                      <button type="submit" class="btn btn-success btn-block">Sign In</button>
                  </div>
                </form>
              </div>
              <!-- /.login-card-body -->
            </div>
          </div>
          <!-- /.login-box -->

        <!-- Javascript -->
        <script src="<?=base_url()?>public/js/main.js"></script>
        <script src="<?=base_url()?>public/js/access.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?=base_url()?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url()?>public/dist/js/adminlte.min.js"></script>

        <!--Javascript--->

    </body>

</html>