<?php
defined('BASEPATH') OR exit('');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $pageTitle ?></title>
		
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/images/stockpileicon.png">
        <!-- favicon ends -->
        
        <!-- LOAD FILES -->
        <?php if((stristr($_SERVER['HTTP_HOST'], "localhost") !== FALSE) || (stristr($_SERVER['HTTP_HOST'], "192.168.") !== FALSE)|| (stristr($_SERVER['HTTP_HOST'], "127.0.0.") !== FALSE)): ?>
        <!-- <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>public/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=base_url()?>public/font-awesome/css/font-awesome-animation.min.css"> -->
         <!-- Google Font: Source Sans Pro -->
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
         <link rel="stylesheet" href="<?=base_url()?>public/plugins/fontawesome-free/css/all.min.css">
         <link rel="stylesheet" href="<?=base_url()?>public/dist/css/adminlte.min.css">
         <link rel="stylesheet" href="<?=base_url()?>public/ext/select2/select2.min.css">

        <script src="<?=base_url()?>public/js/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?=base_url()?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url()?>public/dist/js/adminlte.min.js"></script>
        <!-- <script src="<?=base_url()?>public/bootstrap/js/bootstrap.min.js"></script> -->
        <script src="<?=base_url()?>public/ext/select2/select2.min.js"></script>

        <script src="<?= base_url() ?>public/js/main.js"></script>

        <!-- </?php else: ?> -->
        
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.8/font-awesome-animation.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->

        <?php endif; ?>
        
        <!-- custom CSS -->
        <!-- <link rel="stylesheet" href="<?= base_url() ?>public/css/main.css"> -->
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light hidden-print">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav flex align-items-center ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            <!-- LOGOUT Button -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <label class="dropdown-item text-primary">
                            Total Earned Today: <b>₱<span id="totalEarnedToday"></span></b>
                        </label>
                        <div class="dropdown-divider"></div>       
                        <a href="<?= site_url('logout') ?>" class="dropdown-item text-secondary"><i class="fa fa-power-off"></i> Logout</a> 
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 hidden-print">
            <!-- Brand Logo -->
           <a href="#" class="brand-link mb-3 py-3 px-3">
           <img src="<?=base_url()?>public/images/stockpileicon.png" alt="StockPile" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">StockPile</span>
           </a>
            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class=" nav-item my-2 <?= $pageTitle == 'Dashboard' ? 'nav-link active text-bold' : '' ?>">
                        <a href="<?= site_url('dashboard') ?>">
                                    <i class="nav-icon fas fa-th"></i>
                                    Dashboard
                        </a>
                    </li>
                    <!-- Super admin role --> 
                    <?php if($this->session->admin_role === "Super"):?> 
                    <li class=" nav-item my-2 <?= $pageTitle == 'Items' ? 'nav-link active text-bold' : '' ?>">
                        <a href="<?= site_url('items') ?>">
                            <i class="nav-icon fa fa-archive"></i>
                            Inventory Items
                        </a>
                    </li>
                    <li class=" nav-item my-2 <?= $pageTitle == 'Administrators' ? 'nav-link active text-bold' : '' ?>">
                        <a href="<?= site_url('administrators') ?>">
                            <i class="nav-icon fas fa-user"></i>
                            User Management
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if($this->session->admin_role === "Cashier"):?>
                        
                    <li class=" nav-item my-2 <?= $pageTitle == 'Transactions' ? 'nav-link active text-bold' : '' ?>">
                        <a href="<?= site_url('transactions') ?>">
                            <!-- <span style="font-size: 15px;">₱</span> -->
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            Transactions
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0"><?= $pageTitle ?></h1> -->
                </div><!-- /.col --><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Main content -->
                    <div class="col-sm-10 container-fluid">
                        <?= isset($pageContent) ? $pageContent : "" ?>
                    </div>
                    <!-- Main content ends -->
                    <footer class="container-fluid text-center hidden-print">
                        <p>
                            <i class="fa fa-copyright"></i>
                            Developed by Team Clutch <?php echo date('Y') ?>
                        </p>
                    </footer>
                </div>
            <!-- /.content -->
            </div>
        <!-- /.content-wrapper -->

            <!-- MODALS CONTENTS -->
            <!-- Modal to show flash message -->
            <div class="modal fade" id="flashMsgModal" >
                    <div class="modal-dialog modal-default">
                    <div class="modal-content">
                        <div class="modal-header" id="flashMsgHeader">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <center><i id="flashMsgIcon"></i> <font id="flashMsg"></font></center>
                        </div>
                    </div>
                    </div>
            </div>
            <!-- End of Modal to show flash message -->
            
            <!--Modal to display transaction receipt when a transaction's ref is clicked on the transaction list table -->
            <div class="modal fade" role='dialog' data-backdrop='static' id="transReceiptModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header hidden-print">
                        <h4 class="modal-title">Transaction Receipt</h4>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id='transReceipt'></div>
                    </div>
                </div>
            </div>
            <!-- End of modal-->
        </div>
        <!-- ./wrapper -->
    </body>
</html>