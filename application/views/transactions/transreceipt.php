<?php
defined('BASEPATH') OR exit('');
?>
<?php if($allTransInfo):?>
<?php $sn = 1; ?>
<div class="container-fluid" id="transReceiptToPrint">
    <div class="row justify-content-center">
        <div class="col-xs-12 text-center mb-3">
           <img src="<?=base_url()?>public/images/stockpiles.png" alt="logo" class="img-responsive" width="170px">
            <div>devsclutch@gmail.com</div>
        </div>
    </div>
    <div class="row text-center">

    </div>
    
    <div class="row" style="margin-top:2px">
        <div class="col-sm-6">
            <label>Receipt No:</label>
            <span class="h6"><?=isset($ref) ? $ref : ""?></span>
		</div>
        <div class="col-sm-6 mb-2">
            <b>Date: <span for="" class="text-normal h6"><?=isset($transDate) ? date('jS M, Y h:i:sa', strtotime($transDate)) : ""?></span></b>
        </div>
    </div>
    
	<!-- <div class="row justify-content-around" style='font-weight:bold'>
		<div class="col-xs-4">Item</div>
		<div class="col-xs-2">Qty & Price</div>
		<div class="col-xs-4">Total(₱)</div>
	</div>
	<hr style='margin-top:2px; margin-bottom:0px'>
    <?php $init_total = 0; ?>
    <?php foreach($allTransInfo as $get):?>
        <div class="row justify-content-around">
            <div class="col-sm-4"><?=ellipsize($get['itemName'], 15);?></div>
            <div class="col-xs-3"><?=$get['quantity'] . " x " .number_format($get['unitPrice'], 2)?></div>
            <div class="col-xs-4"><?=number_format($get['totalPrice'], 2)?></div>
        </div>
        <?php $init_total += $get['totalPrice'];?>
    <?php endforeach; ?> -->

    <!-- TEST TABLE -->
    <div class="table table-responsive"> 
            <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty & Price</th>
                        <th>Total(₱)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $init_total = 0; ?>
                    <?php foreach($allTransInfo as $get):?>
                    <tr>
                        <td><?=ellipsize($get['itemName'], 15);?></>
                        <td><?=$get['quantity'] . " x " .number_format($get['unitPrice'], 2)?></>
                        <td><?=number_format($get['totalPrice'], 2)?></>
                    </tr>
                    <?php $init_total += $get['totalPrice'];?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>     
    <!-- END OF TEST TABLE -->



    
    <!-- <hr style='margin-top:2px; margin-bottom:0px'>       
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>Total: ₱<?=isset($init_total) ? number_format($init_total, 2) : 0?></b>
        </div>
    </div> -->




    <hr style='margin-top:2px; margin-bottom:0px'>      
    <div class="row">
        <!-- <div class="col-xs-12 text-right">
            <b>Discount(<?=$discountPercentage?>%): ₱<?=isset($discountAmount) ? number_format($discountAmount, 2) : 0?></b>
        </div> -->
    </div>       
    <div class="row">
        <!-- <div class="col-xs-12 text-right">
            <?php if($vatPercentage > 0): ?>
            <b>VAT(<?=$vatPercentage?>%): ₱<?=isset($vatAmount) ? number_format($vatAmount, 2) : ""?></b>
            <?php else: ?>
            VAT inclusive
            <?php endif; ?>
        </div> -->
    </div>      
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>TOTAL: ₱<?=isset($cumAmount) ? number_format($cumAmount, 5) : ""?></b>
        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-xs-12">
            <b>Mode of Payment: <?=isset($_mop) ? str_replace("_", " ", $_mop) : ""?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Amount Tendered: ₱<?=isset($amountTendered) ? number_format($amountTendered, 2) : ""?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Change: ₱<?=isset($changeDue) ? number_format($changeDue, 2) : ""?></b>
        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-xs-12">
            <b>Customer Name: <?=$cust_name?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Customer Phone: <?=$cust_phone?></b>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-xs-12">
            <b>Customer Email: <?=$cust_email?></b>
        </div>
    </div> -->
    <br>
    <div class="row">
        <div class="col-xs-12 text-center">Thank you!</div>
    </div>
</div>
<br class="hidden-print">
<div class="row hidden-print">
    <div class="col-sm-12">
        <div class="text-center">
            <button type="button" class="btn btn-primary" onclick="hide()">
                <i class="fa fa-print"></i> Print Receipt
            </button>
            
            <button type="button" data-dismiss='modal' onclick="show()" class="btn btn-danger">
                <i class="fa fa-close"></i> Close
            </button>
        </div>
    </div> 
</div>
<br class="hidden-print">
<?php endif;?>

<script>
    function hide(){
        var prtContent = document.getElementById("transReceiptToPrint");
        var WinPrint = window.open('', 'transactions', 'left=0,top=0,width=900,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
      
    }

</script>
