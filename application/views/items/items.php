<?php
defined('BASEPATH') OR exit('');
?>

<div class="row mb-3">
      <div class="col-sm-12">
          <h1>Inventory Management</h1>
          <h6 class="text-secondary">Managing stock of products occurs</h6>
      </div><!-- /.col --><!-- /.col -->
</div><!-- /.row -->

<div class="container-fluid pwell hidden-print">   
    
<div class="col-sm-5 form-inline form-group-sm">
    <button class="btn btn-primary btn-sm" id='createItem' onclick="unhide()" style="font-family: 'Helvetica', 'sans-serif';"><i class="fa fa-plus"> Add New Item</i></button>
</div>

    <!-- row of adding new item form and items list table-->
    <div class="row" >
        <div class="col-sm-12" >
            <!--Form to add/update an item-->
            <div class="col-sm-12 hidden" id='createNewItemDiv' hidden>
                <div class="well">
                    <!-- <button class="btn btn-info btn-xs pull-left" id="useBarcodeScanner">Use Scanner</button>
                    <button class="close cancelAddItem">&times;</button><br> -->
                    <form name="addNewItemForm" id="addNewItemForm" role="form">
                        <div class="text-center text-danger errMsg mt-3 mb-1" id='addCustErrMsg'></div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itemCode">Item Code</label>
                                <input type="text" id="itemCode" name="itemCode" placeholder="Item Code" maxlength="80"
                                    class="form-control" onchange="checkField(this.value, 'itemCodeErr')">
                                <!--<span class="help-block"><input type="checkbox" id="gen4me"> auto-generate</span>-->
                                <span class="help-block errMsg text-danger text-bold mt-3 mb-1" id="itemCodeErr"></span>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itemName">Item Name</label>
                                <input type="text" id="itemName" name="itemName" placeholder="Item Name" maxlength="80"
                                    class="form-control" onchange="checkField(this.value, 'itemNameErr')">
                                <span class="help-block errMsg text-danger text-bold mt-3 mb-1" id="itemNameErr"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itemQuantity">Quantity</label>
                                <input type="number" id="itemQuantity" name="itemQuantity" placeholder="Available Quantity"
                                    class="form-control" min="0" onchange="checkField(this.value, 'itemQuantityErr')">
                                <span class="help-block errMsg text-danger text-bold mt-3 mb-1" id="itemQuantityErr"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="unitPrice">(₱)Unit Price</label>
                                <input type="text" id="itemPrice" name="itemPrice" placeholder="(₱)Unit Price" class="form-control"
                                    onchange="checkField(this.value, 'itemPriceErr')">
                                <span class="help-block errMsg text-danger text-bold mt-3 mb-1" id="itemPriceErr"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itemDescription" class="">Description (Optional)</label>
                                <textarea class="form-control" id="itemDescription" name="itemDescription" rows='4'
                                    placeholder="Optional Item Description"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col-sm-6 form-group-sm">
                                <button class="btn btn-primary btn-block me-2 mb-2" id="addNewItem">Add Item</button>
                            </div>

                            <div class="col-sm-6 form-group-sm">
                                <button type="reset" id="cancelAddItem" class="btn btn-danger btn-block me-2 mb-2 cancelAddItem" form='addNewItemForm' onclick="hide()" >Cancel</button>
                            </div>
                        </div>
                    </form><!-- end of form-->
                </div>
            </div>
    <br>
    <br>
    <!-- Sorting Functions-->
    <div class="row justify-content-between">
        <div class="col-sm-5">
            <div class="col-sm">
                <label for="itemsListSortBy">Sort by</label>
                <select id="itemsListSortBy" class="form-control">
                    <option value="name-ASC">Item Name (A-Z)</option>
                    <option value="code-ASC">Item Code (Ascending)</option>
                    <option value="unitPrice-DESC">Unit Price (Highest first)</option>
                    <option value="quantity-DESC">Quantity (Highest first)</option>
                    <option value="name-DESC">Item Name (Z-A)</option>
                    <option value="code-DESC">Item Code (Descending)</option>
                    <option value="unitPrice-ASC">Unit Price (lowest first)</option>
                    <option value="quantity-ASC">Quantity (lowest first)</option>
                </select>
            </div>
        </div>
        <div class="col-sm-5">
        <div class="col-sm">
            <label for="itemSearch">Search</label>
            <input type="search" class="form-control" id="itemSearch" placeholder="Search Items">
        </div>
        </div>
    </div>
    <hr>
            <!--- Item list div-->
            <div class="col-sm-12" id="itemsListDiv">
                <!-- Item list Table-->
                <div class="row">
                    <div class="col-sm-12" id="itemsListTable"></div>
                </div>
                            <!--  Start of Show Entries -->
               <div class="col-sm-5 form-inline form-group-sm">
                        <label for="itemsListPerPage">Show</label>
                        <select id="itemsListPerPage" class="form-control mx-2">
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
                        <label>Entries</label>
                    </div>
                <!--end of table-->
            </div>
            <!--- End of item list div-->
        </div>
    </div>
    <!-- End of row of adding new item form and items list table-->
</div>

<!--modal to update stock-->
<div id="updateStockModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               
               
                <div id="stockUpdateFMsg" class="text-center"></div>
                 <h4 class="text-center">Update Stock</h4>
                 <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form name="updateStockForm" id="updateStockForm" role="form">
                    <div class="row">
                        <div class="col-sm-4 form-group-sm">
                            <label>Item Name</label>
                            <input type="text" readonly id="stockUpdateItemName" class="form-control">
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label>Item Code</label>
                            <input type="text" readonly id="stockUpdateItemCode" class="form-control">
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label>Quantity in Stock</label>
                            <input type="text" readonly id="stockUpdateItemQInStock" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 form-group-sm">
                            <label for="stockUpdateType">Update Type</label>
                            <select id="stockUpdateType" class="form-control checkField">
                                <option value="">---</option>
                                <option value="newStock">New Stock</option>
                                <option value="deficit">Deficit</option>
                            </select>
                            <span class="help-block errMsg" id="stockUpdateTypeErr"></span>
                        </div>
                        
                        <div class="col-sm-6 form-group-sm">
                            <label for="stockUpdateQuantity">Quantity</label>
                            <input type="number" id="stockUpdateQuantity" placeholder="Update Quantity"
                                class="form-control checkField" min="0">
                            <span class="help-block errMsg" id="stockUpdateQuantityErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <label for="stockUpdateDescription" class="">Description</label>
                            <textarea class="form-control checkField" id="stockUpdateDescription" placeholder="Update Description"></textarea>
                            <span class="help-block errMsg" id="stockUpdateDescriptionErr"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" id="stockUpdateItemId">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="stockUpdateSubmit">Update</button>
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--end of modal-->



<!--modal to edit item-->
<div id="editItemModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="text-center">Edit Item</h4>
                <div id="editItemFMsg" class="text-center"></div>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="row">
                        <div class="col-sm-4 form-group-sm">
                            <label for="itemNameEdit">Item Name</label>
                            <input type="text" id="itemNameEdit" placeholder="Item Name" autofocus class="form-control checkField">
                            <span class="help-block errMsg" id="itemNameEditErr"></span>
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label for="itemCode">Item Code</label>
                            <input type="text" id="itemCodeEdit" class="form-control">
                            <span class="help-block errMsg" id="itemCodeEditErr"></span>
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label for="unitPrice">Unit Price</label>
                            <input type="text" id="itemPriceEdit" name="itemPrice" placeholder="Unit Price" class="form-control checkField">
                            <span class="help-block errMsg" id="itemPriceEditErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <label for="itemDescriptionEdit" class="">Description (Optional)</label>
                            <textarea class="form-control" id="itemDescriptionEdit" placeholder="Optional Item Description"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="itemIdEdit">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="editItemSubmit">Save</button>
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--end of modal-->
<script src="<?=base_url()?>public/js/items.js"></script>
<script>
    function unhide(){
        var x = document.getElementById("createNewItemDiv");
        x.removeAttribute("hidden");
        console.log(x);
    }
    function hide(){
        var x = document.getElementById("createNewItemDiv");
        x.setAttribute("hidden", "true");
        console.log(x);
    }
</script>