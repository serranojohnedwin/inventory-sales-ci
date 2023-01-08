<?php defined('BASEPATH') OR exit('') ?>
<!--Header info -->
<div class="row">
    <div class="col col-sm-7">
        
    </div>
    <div class="col col-sm-5">
         
    </div>
</div>

<!-- <span class="center"> -->
<div class='col-xs-12'>
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading row">
            <div class="col">
                <h4 class="text-bold">ITEMS</h4>
            </div>
            <div class="col text-right">
                <b>Items Total Worth/Price:</b> ₱<?=$cum_total ? number_format($cum_total, 2) : '0.00'?>
            </div>
        </div>
        <?php if($allItems): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-dark">
                    <tr>
                        <th style="vertical-align: top;"><center>ID NO.</th></center>
                        <th style="vertical-align: top;"><center>ITEM NAME</th></center>
                        <th style="vertical-align: top;"><center>ITEM CODE</th></center>
                        <th style="vertical-align: top;"><center>DESCRIPTION</th></center>
                        <th style="vertical-align: top;"><center>QUANTITY IN STOCK</th></center>
                        <th style="vertical-align: top;"><center>UNIT PRICE</th></center>
                        <th style="vertical-align: top;"><center>TOTAL SOLD</th></center>
                        <th style="vertical-align: top;"><center>TOTAL EARNED ON ITEM</th></center>
                        <th style="vertical-align: top;"><center>UPDATE QUANTITY</th></center>
      
                        <th style="vertical-align: top;"><center>DELETE</th></center>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allItems as $get): ?>
                    <tr>
                        <input type="hidden" value="<?=$get->id?>" class="curItemId">
                        <th class="itemSN"><center><?=$sn?>.</th></center>
                        <td><center><span id="itemName-<?=$get->id?>"><?=$get->name?></span></td>
                        <td><center><span id="itemCode-<?=$get->id?>"><?=$get->code?></td>
                        <td>
                        <center> <span id="itemDesc-<?=$get->id?>" data-toggle="tooltip" title="<?=$get->description?>" data-placement="auto">
                                <?=word_limiter($get->description, 15)?>
                            </span>
                        </td>
                        
                        <td class="<?=$get->quantity <= 10 ? 'bg-danger' : 
                                    ($get->quantity <= 25 ? 'bg-warning' : '')
                                    ?>" bgcolor="#ccfccd">
                            <center>

                            <span id="itemQuantity-<?=$get->id?>"><?=$get->quantity?></span>
                        </td>
                        <td><center>₱<span id="itemPrice-<?=$get->id?>"><?=number_format($get->unitPrice, 2)?></span></td>
                        <td><center><?=$this->genmod->gettablecol('transactions', 'SUM(quantity)', 'itemCode', $get->code)?></td>
                        <td>
                        <center>
                            ₱<?=number_format($this->genmod->gettablecol('transactions', 'SUM(totalPrice)', 'itemCode', $get->code), 2)?>
                        </td>
                        <td class="text-center"><a class="pointer updateStock" id="stock-<?=$get->id?>"> <i class="fa fa-edit pointer fa-fw" style="font-size:24px"></i></a></td>
                        
                        <!-- <td class="text-center text-primary">
                            
                            <span class="editItem" id="edit-<?=$get->id?>"><i class="fa fa-pencil pointer fa-2x fa-fw"></i> </span>
                        </td> -->
                        <td ><center><i class="fa fa-trash text-danger delItem pointer fa-2x fa-fa"style="font-size:24px"></i></td>
                    </tr>
                    <?php $sn++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- table div end-->
        <?php else: ?>
        <ul><li>No items</li></ul>
        <?php endif; ?>
    </div>
    <!--- panel end-->
<!-- </span> -->
</div>

<!---Pagination div-->
<div class="row">
    <div class="col-sm-6">
            <ul class="pagination">
                <?= isset($links) ? $links : "" ?>
            </ul>
    </div>
    <div class="col-sm-6 text-right">
        <b class="text-bold"><b> <?= isset($range) && !empty($range) ? $range : ""; ?></b></b>
    </div>
</div>