


<?php
defined('BASEPATH') OR exit('');

$current_items = [];

if(isset($items) && !empty($items)){    
    foreach($items as $get){
        $current_items[$get->code] = $get->name;
    }
}
?>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
<style href="<?=base_url('public/ext/datetimepicker/bootstrap-datepicker.min.css')?>" rel="stylesheet"></style>
<!-- <style href="<?=base_url('public/css/main.css')?>" rel="stylesheet"></style>
<style href="<?=base_url('public/css/style.css')?>" rel="stylesheet"></style> -->

<script>
    var currentItems = <?=json_encode($current_items)?>;
</script>
<div class="row mb-3">
      <div class="col-sm-12">
          <h1>Transaction</h1>
          <h6 class="text-secondary">Payment transaction occurs </h6>
      </div><!-- /.col --><!-- /.col -->
</div><!-- /.row -->
<section>
    <div class="container-fluid">
        <!-- Create Transaction Button Group-->
        <div class="pwell hidden-print">   
    <div class="row" id="hide">
        <div class="col-sm-12">
            <!--- Row to create new transaction-->
            <div class="row">
                <div class="col-sm-10">
                    <span class="pointer text-primary">
                        <button class='btn btn-primary btn-sm mb-2' id='showTransForm'><i class="fa fa-plus"></i>  New Transaction </button>
                    </span>
                </div>
                <div class="col-sm-2">
                    <span class="pointer text-primary">
                        <button class='btn btn-info btn-sm' data-toggle='modal' data-target='#reportModal'>
                        <i class="fa fa-list-alt"></i> Generate Report 
                        </button>
                    </span>
                </div>
            </div>
            <!--- End of row to create new transaction-->
            <!---form to create new transactions--->
            <div class="row collapse" id="newTransDiv">
                <!---div to display transaction form receipt --->
                <div class="col-sm-12" id="salesTransFormDiv">
                    <div class="well">
                        <form name="salesTransForm" id="salesTransForm" role="form">
                            <div class="text-center errMsg text-danger text-bold" id='newTransErrMsg'></div>
                            <br>

                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Cloned div comes here--->
                                    <div id="appendClonedDivHere"></div>
                                    <!--End of cloned div here--->
                                    
                                    <!--- Text to click to add another item to transaction-->
                                    <div class="row">
                                        <div class="col-sm-2 text-primary pointer mb-5">
                                            <button class="btn btn-primary btn-sm" id="clickToClone" ><i class="fa fa-plus" ></i> Add item</button>
                                        </div>
                                        
                                        <!-- <br class="visible-xs"> -->
                                        
                                        <!-- <div class="col-sm-2 form-group-sm">
                                            <input type="text" id="barcodeText" class="form-control" placeholder="Item Code" autofocus>
                                            <span class="help-block errMsg" id="itemCodeNotFoundMsg"></span>
                                        </div> -->
                                    </div>
                                    <!-- End of text to click to add another item to transaction-->
                                    <!-- <br> -->
                                    
                                    <div class="row">
                                        <div class="col-sm-2 form-group-sm" hidden>
                                            <label for="vat">VAT(%)</label>
                                            <input type="number" min="0" id="vat" class="form-control" value="0" >
                                        </div>
                                        
                                        <div class="col-sm-2 form-group-sm" hidden>
                                            <label for="discount">Discount(%)</label>
                                            <input type="number" min="0" id="discount" class="form-control" value="0" >
                                        </div>
                                        
                                        <div class="col-sm-2 form-group-sm" hidden>
                                            <label for="discount">Discount(value)</label>
                                            <input type="number" min="0" id="discountValue"  class="form-control" value="0">
                                        </div>
                                        
                                        <div class="col-sm-2 form-group-sm">
                                            <label for="modeOfPayment">Mode of Payment</label>
                                            <!-- <select class="form-control checkField" id="modeOfPayment">
                                                <option value="Cash">Cash</option>
                                            </select> -->
                                            <input type="text" class="form-control checkField" id="modeOfPayment" value="Cash" readonly>
                                            <span class="help-block errMsg" id="modeOfPaymentErr"></span>
                                        </div>

                                        <div class="col-sm-4 form-group-sm">
                                            <label for="cumAmount">Cumulative Amount</label>
                                            <span id="cumAmount" class="form-control">0.00</span>
                                        </div>
                                    </div>
                                    <!-- THE ONE WITH HIDDEN ALSO -->
                                    <div class="row">
                                        <div class="col-sm form-group-sm">
                                            <div class="cashAndPos hidden" hidden>
                                                <label for="cashAmount">Cash</label>
                                                <input type="text" value="0" class="form-control" id="cashAmount" hidden>
                                                <span class="help-block errMsg"></span>
                                            </div>

                                            <div class="cashAndPos hidden" hidden>
                                                <label for="posAmount">POS</label>
                                                <input type="text" class="form-control" id="posAmount" value="0" hidden>
                                                <span class="help-block errMsg"></span>
                                            </div>

                                            <div id="col-sm-6 form-group-sm amountTenderedDiv">
                                                <label for="amountTendered" id="amountTenderedLabel">Amount Tendered</label>
                                                <input type="number" class="form-control" id="amountTendered" placeholder="Amount Tendered">
                                                <span class="help-block errMsg" id="amountTenderedErr"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6 form-group-sm">
                                            <label for="changeDue">Change Due</label>
                                            <span class="form-control" id="changeDue" ></span>
                                        </div>
                                    </div>
                                        
                                    <div class="row">
                                        <div class="col-sm-6 form-group-sm">
                                            <label for="custName">Customer Name</label>
                                            <input type="text" id="custName" class="form-control" placeholder="Customer Name" required>
                                        </div>
                                        
                                        <div class="col-sm-6 form-group-sm">
                                            <label for="custPhone">Customer Phone (Optional)</label>
                                            <input type="number" id="custPhone" class="form-control" placeholder="Phone Number">
                                        </div>
                                        <!-- PLEASE CHECK THIS TO REMOVE -->
                                        <!-- <div class="col-sm-4 form-group-sm">
                                            <label for="custEmail">Customer Email</label>
                                            <input type="email" id="custEmail" class="form-control" placeholder="E-mail Address">
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                            <div class="col-sm-2 form-group-sm">
                                   <!--  <button class="btn btn-primary btn-sm" id='useScanner'>Use Barcode Scanner</button> -->
                                </div>
                                <div class="col-sm-6"></div>
                                <div class="col-sm-4 form-group-sm float-right">
                                    <button type="button" class="btn btn-primary btn-block" id="confirmSaleOrder">Confirm Order</button>
                                    <button type="button" class="btn btn-danger btn-block" id="cancelSaleOrder">Clear Order</button>
                                    <button type="button" class="btn btn-danger btn-block" id="hideTransForm">Close</button>
                                </div>
                            </div>
                        </form>
                        <!-- end of form-->
                    </div>
                </div>
                <!-- end of div to display transaction form-->
            </div>
            <!--end of form-->
    
            <br>
            <!-- sort and co row-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12 form-group-sm form-inline">
                        <label class="mr-2" for="transListSortBy" >Sort by:</label>
                        <select id="transListSortBy" class="form-control customer-select">
                            <option value="transId-DESC">date(Latest First)</option>
                            <option value="transId-ASC">date(Oldest First)</option>
                            <option value="quantity-DESC">Quantity (Highest first)</option>
                            <option value="quantity-ASC">Quantity (Lowest first)</option>
                            <option value="totalPrice-DESC">Total Price (Highest first)</option>
                            <option value="totalPrice-ASC">Total Price (Lowest first)</option>
                            <option value="totalMoneySpent-DESC">Total Amount Spent (Highest first)</option>
                            <option value="totalMoneySpent-ASC">Total Amount Spent (Lowest first)</option>
                        </select>
                    </div>

                    <!-- <div class="col-sm-4 form-inline form-group-sm">
                        <label for='transSearch'><i class="fa fa-search"></i></label>
                        <input type="search" id="transSearch" class="form-control" placeholder="Search Transactions">
                    </div> -->
                </div>
            </div>
            <!-- end of sort and co div-->
        </div>
    </div>
    
    <hr>
    
    <!-- transaction list table-->
    <div class="row">
        <!-- Transaction list div-->
        <div class="col-sm-12" id="transListTable"></div>
        <!-- End of transactions div-->
                <!-- Show Entries Start-->
                <div class="col-sm-12 justify-content-end form-inline form-group-sm text-right" id>
                        <label for="transListPerPage">Show 
                        <select id="transListPerPage" class="form-control custom-select mx-2">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        Entries</label>
                    </div>
        </div>
        <!-- show Entries end -->
    <!-- End of transactions list table-->
        </div>

<div class="row " id="divToClone" hidden>
    <div class="col-sm-4 form-group mb-2">
        <label class="form-label">Item</label>
        <select class="form-control selectedItemDefault" onchange="selectedItem(this)"></select>
    </div>

    <div class="col-sm-2 form-group-sm itemAvailQtyDiv">
        <label>Available Quantity</label>
        <span class="form-control itemAvailQty">0</span>
    </div>

    <div class="col-sm-2 form-group-sm">
        <label>Unit Price</label>
        <span class="form-control itemUnitPrice">0.00</span>
    </div>

    <div class="col-sm-1 form-group-sm itemTransQtyDiv">
        <label>Quantity</label>
        <input type="number" min="0" class="form-control itemTransQty" value="0">
        <span class="help-block itemTransQtyErr errMsg"></span>
    </div>

    <div class="col-sm-2 form-group-sm">
        <label>Total Price</label>
        <span class="form-control itemTotalPrice">0.00</span>
    </div>
    
    <br class="visible-xs">
    
    <div class="col-sm-1 my-2">
        <button class="btn btn-block bg-dark close retrit" onclick="closed()"> <i class="fas fa-times"></i></button>
    </div>
    
    <br class="visible-xs">
    <br class="visible-xs">

</div>

<div class="modal fade" id='reportModal' data-backdrop='static' role='dialog'>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                 <h4 class="modal-title">Generate Report</h4>
                 <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> 
            <div class="modal-body">
                <div class="row" id="datePair">
                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">From Date:</label>                                    
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control date start" placeholder="YYYY-MM-DD"  id='transFrom'>
                        </div>
                        <!-- /.input group -->
                        <span class="help-block errMsg" id='transFromErr'></span>
                    </div>

                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">To Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control date end" placeholder="YYYY-MM-DD" id='transTo'>
                        </div>
                        <span class="help-block errMsg" id='transToErr'></span>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-success" id='clickToGen'>Generate</button>
                <button class="btn btn-secondary" data-dismiss='modal' id="close" >Close</button>
            </div>
        </div>
    </div>
</div>
</div>
</section> 
<script>
     function closed(){
        var x = document.getElementById("divToClone");
        x.setAttribute('hidden','');
        console.log(x);
    }
</script>
<script src="<?=base_url()?>public/js/transactions.js"></script>
<script src="<?=base_url('public/ext/datetimepicker/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=base_url('public/ext/datetimepicker/jquery.timepicker.min.js')?>"></script>
<script src="<?=base_url()?>public/ext/datetimepicker/datepair.min.js"></script>
<script src="<?=base_url()?>public/ext/datetimepicker/jquery.datepair.min.js"></script>