<?php
defined('BASEPATH') OR exit('');

$total_earned = 0;

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Transaction Report</title>
		
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>public/images/icon.ico">
        <!-- favicon ends --->
        
        <!--- LOAD FILES -->
        <?php if((stristr($_SERVER['HTTP_HOST'], "localhost") !== FALSE) || (stristr($_SERVER['HTTP_HOST'], "192.168.") !== FALSE)|| (stristr($_SERVER['HTTP_HOST'], "127.0.0.") !== FALSE)): ?>
        <!-- <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
         <link rel="stylesheet" href="<?=base_url()?>public/plugins/fontawesome-free/css/all.min.css">
         <link rel="stylesheet" href="<?=base_url()?>public/dist/css/adminlte.min.css">
         <link rel="stylesheet" href="<?=base_url()?>public/ext/select2/select2.min.css">
        
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
        <?php endif; ?>
        
        <!-- custom CSS -->
        <!-- <link rel="stylesheet" href="<?= base_url() ?>public/css/main.css"> -->
    </head>

    <body>
        <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-8 mb-3">
                    <img src="<?=base_url()?>public/images/stockpiles.png" alt="logo" class="img-responsive" width="170px">
                        <div>devsclutch@gmail.com</div>
                    </div>
                    <div class="col-sm-4 text-right hidden-print">
                        <button class="btn btn-primary btn-sm" onclick="window.print()">Print Report</button><br><br>
                    </div>
                </div>  
            <!-- <div class="row">
                <div class="col-xs-12 text-center">
                    <h4>Transactions Between <?=date('jS M, Y', strtotime($from))?> and <?=date('jS M, Y', strtotime($to))?></h4>
                </div>
            </div> -->
            
            <div class="col-sm-12 text-center">
                <span class="center">
                <div class="col-sm-12 table-responsive">
                    <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading text-center bg-primary">
                            <h4 class="text bold p-3">Transactions Between <?=date('jS M, Y', strtotime($from))?> and <?=date('jS M, Y', strtotime($to))?></h4>
                        </div>
                        <?php if($allTransactions): ?>
                        <div class="table table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><center>Serial No.</th></center>
                                        <th><center>Receipt No.</th></center>
                                        <th><center>Total Items</th></center>
                                        <th><center>Total Amount</th></center>
                                        <th><center>Amount Tendered</th></center>
                                        <th><center>Change Due</th></center>
                                        <th><center>Mode of Payment</th></center>
                                        <th><center>Employee Name</th></center>
                                        <th><center>Customer Name</th></center>
                                        <!-- <th style="vertical-align: top; text-transform: uppercase;"><center>Status</th></center> -->
                                    <th style="vertical-align: top; text-transform: uppercase;"><center>Date</th></center>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 1;?>
                                    <?php foreach($allTransactions as $get): ?>
                                    <tr>
                                        <th style="vertical-align: top; text-transform: uppercase;"><center><?= $sn ?>.</th></center>
                                        <td><?= $get->ref ?></td>
                                        <td><?= $get->quantity ?></td>
                                        <td>₱<?= number_format($get->totalMoneySpent, 2) ?></td>
                                        <td>₱<?= number_format($get->amountTendered, 2) ?></td>
                                        <td>₱<?= number_format($get->changeDue, 2) ?></td>
                                        <td><?=  str_replace("_", " ", $get->modeOfPayment)?></td>
                                        <td><?=$get->staffName?></td>
                                        <td><?=$get->cust_name?></td>
                                        <!-- <td><?=$get->cust_name?> - <?=$get->cust_phone?> - <?=$get->cust_email?></td> -->
                                        <!-- <td><?=$get->completed ? '<span style="color: #B90E0A;">Cancelled</span>' : '<span style="color: #03AC13;">Completed</span>' ?></td> -->
                                        <td><?= date('jS M, Y h:ia', strtotime($get->transDate)) ?></td>
                                        
                                    </tr>
                                    <?php $sn++; ?>
                                    <?php $total_earned += $get->totalMoneySpent; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- table div end--->
                        <?php else: ?>
                            <ul><li>No Transaction Found Within Specified Dates</li></ul>
                        <?php endif; ?>
                    </div>
                </div>
            </span>
            </div>
            
                
                <div class="col-lg-12 text-right">
                    <h4>Total Earned: <b>₱<?=number_format($total_earned, 2)?></b></h4>
                </div>
            </div>
        </div>
        <!--- panel end-->
    </body>
</html>