<?php
defined('BASEPATH') OR exit('');
?>

<div class="row mb-3">
      <div class="col-sm-12">
          <h1>User Management</h1>
          <h6 class="text-secondary">Managing User Accounts occurs</h6>
      </div><!-- /.col --><!-- /.col -->
  </div><!-- /.row -->

<div class="row hidden-print">
    <div class="col-sm-12">
        <div class="pwell">
            <!-- Header (add new admin, sort order etc.) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-5" style="color:#337ab7;" data-target='#addNewAdminModal' data-toggle='modal'>
                        <button class="btn btn-primary btn-sm" style="font-family: Helvetica;"><i class="fa fa-user-plus">
                        </i> Add Employee</button>
                    </div>
                    <br>
                    <div class="col-sm-4">
                        <label for="adminListSortBy">Sort by</label>
                        <select id="adminListSortBy" class="form-control">
                            <option value="first_name-ASC" selected>Name (A to Z)</option>
                            <option value="first_name-DESC">Name (Z to A)</option>
                            <option value="created_on-ASC">Date Created (older first)</option>
                            <option value="created_on-DESC">Date Created (recent first)</option>
                            <option value="email-ASC">E-mail - ascending</option>
                            <option value="email-DESC">E-mail - descending</option>
                        </select>
                    </div>
                    <!-- <div class="col-sm-6 form-inline form-group-sm text-right">
                        <label for="adminSearch"><i class="fa fa-search"></i></label>
                        <input type="search" id="adminSearch" placeholder="Search" class="form-control">
                    </div> -->
                </div>
            </div>
            <hr>
            <!-- Header (sort order etc.) ends -->
            
            <!-- Admin list -->
            <div class="row">
                <div class="col-sm-12" id="allAdmin"></div>
            
                    <!-- Start of Show Entries -->
                    <!-- <div class="col-sm-12 form-inline form-group-md text-right">
                        <label for="itemsListPerPage">Show</label>
                        <select id="itemsListPerPage" class="form-control">
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
                    </div> -->
                <!-- Admin list ends -->
                </div>
            </div>
        </div>
    </div>


<!--- Modal to add new admin --->
<div class='modal fade' id='addNewAdminModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header bg-dark'>
                <div class="text-center">
                    <h4 class="text-center">Add New Employee</h4>
                </div>
                <button class="close" data-dismiss='modal'>&times;</button>
            </div>
            <div class="modal-body">
                <div class="row text-center justify-content-center">
                    <i id="fMsgIcon" class="text-center"></i> <span id="fMsg" class="text-bold text-center mb-2"></span>
                </div>
                <form id='addNewAdminForm' name='addNewAdminForm' role='form'>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='firstName' class="control-label">First Name</label>
                            <input type="text" id='firstName' class="form-control checkField" placeholder="First Name">
                            <span class="help-block errMsg text-danger" id="firstNameErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='lastName' class="control-label">Last Name</label>
                            <input type="text" id='lastName' class="form-control checkField" placeholder="Last Name">
                            <span class="help-block errMsg text-danger" id="lastNameErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-12">
                            <label for='email' class="control-label">Email</label>
                            <input type="email" id='email' class="form-control checkField" placeholder="Email">
                            <span class="help-block errMsg text-danger" id="emailErr"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile1' class="control-label">Phone Number</label>
                            <input type="number" id='mobile1' class="form-control checkField" placeholder="Phone Number">
                            <span class="help-block errMsg text-danger" id="mobile1Err"></span>
                        </div>
                        <!-- <div class="form-group-sm col-sm-6">
                            <label for='mobile2' class="control-label">Other Number</label>
                            <input type="number" id='mobile2' class="form-control" placeholder="Other Number (optional)">
                            <span class="help-block errMsg text-danger" id="mobile2Err"></span>
                        </div> -->
                        <div class="form-group-sm col-sm-6">
                            <label for='role' class="control-label">Role</label>
                            <select class="form-control checkField" id='role'>
                                
                            <option value="" selected="">-----</option>
                            <option value='Cashier' >Cashier</option>Cashier
                            </select>
                            <span class="help-block errMsg text-danger" id="roleErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-12">
                            <label for="passwordOrig" class="control-label">Password:</label>
                            <input type="password" class="form-control checkField" id="passwordOrig" placeholder="Password">
                            <span class="help-block errMsg text-danger" id="passwordOrigErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-12">
                            <label for="passwordDup" class="control-label">Retype Password:</label>
                            <input type="password" class="form-control checkField" id="passwordDup" placeholder="Retype Password">
                            <span class="help-block errMsg" id="passwordDupErr"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" form="addNewAdminForm" class="btn btn-warning pull-left">Reset Form</button>
                <button type='button' id='addAdminSubmit' class="btn btn-primary">Add Employee</button>
                <button type='button' class="btn btn-danger" data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to add new admin --->


<!--- Modal for editing admin details --->
<div class='modal fade' id='editAdminModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <span id="fMsgEdit"></span>
                <h4 class="text-center">Edit Employee Info</h4>
                <div class="text-center">
                    <!-- <i id="fMsgEditIcon"></i> -->
                    
                </div>
                <button class="close" data-dismiss='modal'>&times;</button>



            </div>
            <div class="modal-body">
                <form id='editAdminForm' name='editAdminForm' role='form'>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='firstNameEdit' class="control-label">First Name</label>
                            <input type="text" id='firstNameEdit' class="form-control checkField" placeholder="First Name">
                            <span class="help-block errMsg" id="firstNameEditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='lastNameEdit' class="control-label">Last Name</label>
                            <input type="text" id='lastNameEdit' class="form-control checkField" placeholder="Last Name">
                            <span class="help-block errMsg" id="lastNameEditErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='emailEdit' class="control-label">Email</label>
                            <input type="email" id='emailEdit' class="form-control checkField" placeholder="Email">
                            <span class="help-block errMsg" id="emailEditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='roleEdit' class="control-label">Role</label>
                            <select class="form-control checkField" id='roleEdit'>
                            <option value="" selected="">-----</option>
                            <option value='Cashier' >Cashier</option>Cashier
                            </select>
                            <span class="help-block errMsg" id="roleEditErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile1Edit' class="control-label">Phone Number</label>
                            <input type="number" id='mobile1Edit' class="form-control checkField" placeholder="Phone Number">
                            <span class="help-block errMsg" id="mobile1EditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile2Edit' class="control-label">Other Number</label>
                            <input type="number" id='mobile2Edit' class="form-control" placeholder="Other Number (optional)">
                            <span class="help-block errMsg" id="mobile2EditErr"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" id="adminId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" form="editAdminForm" class="btn btn-warning pull-left">Reset Form</button>
                <button type='button' id='editAdminSubmit' class="btn btn-primary">Update</button>
                <button type='button' class="btn btn-danger" data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to edit admin details --->
<script src="<?=base_url()?>public/js/admin.js"></script>