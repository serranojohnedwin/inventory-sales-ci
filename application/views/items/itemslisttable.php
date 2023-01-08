<?php defined('BASEPATH') OR exit('') ?>

<div class='col-sm-6'>
    <?= isset($range) && !empty($range) ? $range : ""; ?>
</div>

<div class='col-sm-6 text-right'><b>Items Total Worth/Price:</b> ₱<?=$cum_total ? number_format($cum_total, 2) : '0.00'?></div>

<span class="center">
<div class='col-xs-12'>
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"><strong style="font-size: 1.5em; font-weight: bold;">ITEMS</strong></div>
        <?php if($allItems): ?>
        <div class="table table-responsive">
            <table class="table table-bordered table-striped table-hover" style="background-color: #f5f5f5">
                <thead>
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
</span>
</div>

<!---Pagination div-->
<div class="col-sm-12 text-center">
    <ul class="pagination">
        <?= isset($links) ? $links : "" ?>
    </ul>
</div>
