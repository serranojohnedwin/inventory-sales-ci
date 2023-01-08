<?php defined('BASEPATH') OR exit('') ?>

<?= isset($range) && !empty($range) ? $range : ""; ?>

<div class="panel panel-primary">
    <!-- Default panel contents -->
    <center><div class="panel-heading"><strong style="font-size: 1.5em; font-weight: bold;">TRANSACTION HISTORY</strong></div></center>
    <?php if($allTransactions): ?>
<span class="center">
    <div class="table table-responsive"> 
        <table class="table table-bordered table-striped table-hover" width="100%">
            <thead>
                <tr class="caps" style="height: 50px; text-align: center;">
                    <th style="vertical-align: top"><center>Serial No.</th></center>
                    <th style="vertical-align: top"><center>Receipt No.</th></center>
                    <th style="vertical-align: top"><center>Total Items</th></center>
                    <th style="vertical-align: top"><center>Total Amount</th></center>
                    <th style="vertical-align: top"><center>Amount Tendered</th></center>
                    <th style="vertical-align: top"><center>Change Due</th></center>
                    <th style="vertical-align: top"><center>Mode of Payment</th></center>
                    <th style="vertical-align: top"><center>Employee</th></center>
                    <th style="vertical-align: top"><center>Customer Name</th></center>
                    <th style="vertical-align: top"><center>Date</th></center>
                    <th style="vertical-align: top"><center>Status</th></center>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allTransactions as $get): ?>
                <tr>
                    <th style="vertical-align: top"><center><?= $sn ?>.</th></center>
                    <td><a class="pointer vtr" style="color:#b30d0d" title="Click to view receipt"><center><?= $get->ref ?></a></td>
                    <td><center><?= $get->quantity ?></td>
                    <td><center>₱<?= number_format($get->totalMoneySpent, 2) ?></td>
                    <td><center>₱<?= number_format($get->amountTendered, 2) ?></td>
                    <td><center>₱<?= number_format($get->changeDue, 2) ?></td>
                    <td><center><?=  str_replace("_", " ", $get->modeOfPayment)?></td>
                    <td><center><?=$get->staffName?></td>
                    <td><center><?=$get->cust_name?></td>
                    <td><center><?= date('jS M, Y h:ia', strtotime($get->transDate)) ?></td>
                    <td><center><?=$get->cancelled ? '<span style="color: #B90E0A;">Cancelled</span>' : '<span style="color: #03AC13;">Completed</span>' ?></td>
                </tr>
                <?php $sn++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </span>
    </div>
<!-- table div end-->

    <?php else: ?>
        <ul><li>No Transactions</li></ul>
    <?php endif; ?>
    
    <!--Pagination div-->
    <div class="col-sm-12 text-center">
        <ul class="pagination">
            <?= isset($links) ? $links : "" ?>
        </ul>
    </div>
</div>
<!-- panel end-->