<!-- MAIN.PHP -->
<nav class="navbar navbar-default hidden-print">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url()?>" style="margin-top:-15px">
                        <img src="<?=base_url()?>public/images/stockpiles.png" alt="logo" class="d-inline-block align-text-top" width="200">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav navbar-left visible-xs">
                        <li class="<?= $pageTitle == 'Dashboard' ? 'active' : '' ?>">
                            <a href="<?= site_url('dashboard') ?>">
                                <i class="fa fa-home"></i>
                                Dashboard
                            </a>
                        </li>

                        <li class="<?= $pageTitle == 'Items' ? 'active' : '' ?>">
                            <a href="<?= site_url('items') ?>">
                                <i class="fa fa-archive"></i>
                                Manage Inventory
                            </a>
                        </li>
                        
                        <li class="<?= $pageTitle == 'Transactions' ? 'active' : '' ?>">
                            <a href="<?= site_url('transactions') ?>">
                                <span style="font-size: 15px;">₱</span>
                                Transactions
                            </a>
                        </li>
                        
                        
                        <!-- Admin User -->
                        <?php if($this->session->admin_role === "Admin"):?> 

                            <li class="<?= $pageTitle == 'Administrators' ? 'active' : '' ?>">
                            <a href="<?= site_url('administrators') ?>">
                                <i class="fa fa-unlock-alt"></i>
                                Admin Management
                            </a>
                        </li>

                        <
                        <!--
                        <li class="<?= $pageTitle == 'Employees' ? 'active' : '' ?>">
                            <a href="<?= site_url('employees') ?>">
                                <i class="fa fa-users"></i>
                                Employees
                            </a>
                        </li>
                        
                        <li class="<?= $pageTitle == 'Reports' ? 'active' : '' ?>">
                            <a href="<?= site_url('reports') ?>">
                                <i class="fa fa-newspaper-o"></i>
                                Reports
                            </a>
                        </li>
                        
                        <li class="<?= $pageTitle == 'Eventlog' ? 'active' : '' ?>">
                            <a href="<?= site_url('Eventlog') ?>">
                                <i class="fa fa-tasks"></i>
                                Event Log
                            </a>
                        </li>--->
                        
<!--                         <li class="<?= $pageTitle == 'Database' ? 'active' : '' ?>">
                            <a href="<?= site_url('dbmanagement') ?>">
                                <i class="fa fa-database"></i>
                                Database Management
                            </a>
                        </li> -->
                        
                        <li class="<?= $pageTitle == 'Administrators' ? 'active' : '' ?>">
                            <a href="<?= site_url('administrators') ?>">
                                <i class="fa fa-unlock-alt"></i>
                                Admin Management
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a>
                                Total Earned Today: <b>₱<span id="totalEarnedToday"></span></b>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user navbarIcons" style="color:#607d8b;"></i>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-header text-center">
                                    <strong>Account</strong>
                                </li>
                                <li class="divider"></li>
                                <!---<li>
                                    <a href="#">
                                        <i class="fa fa-gear fa-fw"></i> 
                                        Settings
                                    </a>
                                </li>
                                <li class="divider"></li>--->
                                <li><a href="<?= site_url('logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container-fluid hidden-print">
            <div class="row content">
                <!-- Left sidebar -->
                <div class="col-sm-2 sidenav hidden-xs mySideNav">
                    <br>
                    <ul class="nav nav-pills nav-stacked pointer">
                        <li class="<?= $pageTitle == 'Dashboard' ? 'active' : '' ?>">
                            <a href="<?= site_url('dashboard') ?>">
                                <i class="fa fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        
                        
                        <?php if($this->session->admin_role === "Super"):?> 
                        <li class="<?= $pageTitle == 'Items' ? 'active' : '' ?>">
                            <a href="<?= site_url('items') ?>">
                                <i class="fa fa-archive"></i>
                                Inventory Items
                            </a>
                        </li>

                        <li class="<?= $pageTitle == 'Administrators' ? 'active' : '' ?>">
                            <a href="<?= site_url('administrators') ?>">
                                <i class="fa fa-unlock-alt"></i>
                                Admin Management
                            </a>
                        </li>

                        <!-- <li class="<?= $pageTitle == 'Transactions' ? 'active' : '' ?>">
                            <a href="<?= site_url('transactions') ?>">
                                <span style="font-size: 15px;">₱</span>
                                Transactions
                            </a>
                        </li> -->
                        
                        <!--
                        <li class="<?= $pageTitle == 'Employees' ? 'active' : '' ?>">
                            <a href="<?= site_url('employees') ?>">
                                <i class="fa fa-users"></i>
                                Employees
                            </a>
                        </li>
                        <li class="<?= $pageTitle == 'Reports' ? 'active' : '' ?>">
                            <a href="<?= site_url('reports') ?>">
                                <i class="fa fa-newspaper-o"></i>
                                Reports
                            </a>
                        </li>
                        <li class="<?= $pageTitle == 'Eventlog' ? 'active' : '' ?>">
                            <a href="<?= site_url('Eventlog') ?>">
                                <i class="fa fa-tasks"></i>
                                Event Log
                            </a>
                        </li>--->
                        
                        <!-- <li class="<?= $pageTitle == 'Database' ? 'active' : '' ?>">
                            <a href="<?= site_url('dbmanagement') ?>">
                                <i class="fa fa-database"></i>
                                Database Management
                            </a>
                        </li> -->
                        
                        
                        <?php endif; ?>

                        <?php if($this->session->admin_role === "Cashier"):?>
                            
                        <li class="<?= $pageTitle == 'Transactions' ? 'active' : '' ?>">
                            <a href="<?= site_url('transactions') ?>">
                                <span style="font-size: 15px;">₱</span>
                                Transactions
                            </a>
                        </li>
                        <?php endif; ?>
                        
                    </ul>
                    <br>
                </div>
                <!-- Left sidebar ends -->
                <br>

                <!-- Main content -->
                <div class="col-sm-10">
                    <?= isset($pageContent) ? $pageContent : "" ?>
                </div>
                <!-- Main content ends -->
            </div>
        </div>

        <footer class="container-fluid text-center hidden-print">
            <p>
                <i class="fa fa-copyright"></i>
                 Developed by Team Clutch <?php echo PHP_VERSION; ?> | <?=date('Y')?>
            </p>
        </footer>

        <!--Modal to show flash message-->
        <div id="flashMsgModal" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="flashMsgHeader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><i id="flashMsgIcon"></i> <font id="flashMsg"></font></center>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal end-->

        <!--modal to display transaction receipt when a transaction's ref is clicked on the transaction list table -->
        <div class="modal fade" role='dialog' data-backdrop='static' id="transReceiptModal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header hidden-print">
                        <button class="close" data-dismiss='modal'>&times;</button>
                        <h4 class="text-center">Transaction Receipt</h4>
                    </div>
                    <div class="modal-body" id='transReceipt'></div>
                </div>
            </div>
        </div>
        <!-- End of modal-->
		
		
        <!--Login Modal-->
        <div class="modal fade" role='dialog' data-backdrop='static' id='logInModal'>
            <div class="modal-dialog">
                <!-- Log in div below-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close closeLogInModal">&times;</button>
                        <h4 class="text-center">Log In</h4>
                        <div id="logInModalFMsg" class="text-center errMsg"></div>
                    </div>
                    <div class="modal-body">
                        <form name="logInModalForm">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for='logInModalEmail' class="control-label">E-mail</label>
                                    <input type="email" id='logInModalEmail' class="form-control checkField" placeholder="E-mail" autofocus>
                                    <span class="help-block errMsg" id="logInModalEmailErr"></span>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for='logInPassword' class="control-label">Password</label>
                                    <input type="password" id='logInModalPassword'class="form-control checkField" placeholder="Password">
                                    <span class="help-block errMsg" id="logInModalPasswordErr"></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <!--<div class="col-sm-6 pull-left">
                                    <input type="checkbox" class="control-label" id='remMe'> Remember me
                                </div>-->
                                <div class="col-sm-4"></div>
                                <div class="col-sm-2 pull-right">
                                    <button id='loginModalSubmit' class="btn btn-primary">Log in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End of log in div-->
            </div>
        </div>
        <!---end of Login Modal-->
<!-- END OF MAIN.PHP -->

<!-- DASHBOARD.PHP -->

<div class="row latestStuffs">
    <div class="col-sm-3">
        <div class="panel panel-info">
            <div class="panel-body latestStuffsBody" style="background-color: #337ab7;">
                <div class="pull-left"><i class="fa fa-archive"></i></div>
                <div class="pull-right">
                    <div><?=$totalItems?></div>
                    <div class="latestStuffsText pull-right">Items in Stock</div>
                </div>
            </div>
            <div class="panel-footer text-center" style="color: #337ab7;">Total Items in Stock</div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="panel panel-info">
            <div class="panel-body latestStuffsBody" style="background-color: #5cd85c;">
                <div class="pull-left"><i class="fa fa-money"></i></div>
                <div class="pull-right">
                    <div><?=$totalSalesToday?></div>
                    <div class="latestStuffsText">Today's Total Sales</div>
                </div>
            </div>
            <div class="panel-footer text-center" style="color:#5cb85c">Number of Items Sold Today</div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="panel panel-info">
            <div class="panel-body latestStuffsBody" style="background-color: #f0ad4e;">
                <div class="pull-left"><i class="fa fa-exchange"></i></div>
                <div class="pull-right">
                    <div><?=$totalTransactions?></div>
                    <div class="latestStuffsText pull-right">Total Transactions</div>
                </div>
            </div>
            <div class="panel-footer text-center" style="color: #f0ad4e;">All-Time Total Transactions</div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="panel panel-info">
            <div class="panel-body latestStuffsBody" style="background-color: #d9534f;">
                <div class="pull-left"><span>&#8369;</span></div>
                <div class="pull-right">
                    <div> <?php $query = $this->db->query('SELECT SUM( totalPrice)as total FROM transactions')->row(); echo floatval($query->total);?></div>
                    <div class="latestStuffsText pull-right">Total Earnings Till Date</div>
                </div>
                
            </div>
            <div class="panel-footer text-center" style="color: #d9534f;">All-Time Total Earnings</div>
        </div>
    </div>
   
</div>


<!-- ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->
<div class="row margin-top-5">
    <div class="col-sm-9">
        <div class="box">
            <div class="box-header" style="background-color:/*#33c9dd*/#333;">
              <h3 class="box-title" id="earningsTitle"></h3>
            </div>

            <div class="box-body" style="background-color:/*#33c9dd*/#333;">
              <canvas style="padding-right:25px" id="earningsGraph" width="200" height="80"/></canvas>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <section class="panel form-group-sm">
            <label class="control-label">Select Account Year:</label>
            <select class="form-control" id="earningAndExpenseYear">
                <?php $years = range("2016", date('Y')); ?>
                <?php foreach($years as $y):?>
                <option value="<?=$y?>" <?=$y == date('Y') ? 'selected' : ''?>><?=$y?></option>
                <?php endforeach; ?>
            </select>
            <span id="yearAccountLoading"></span>
        </section>
        
        <section class="panel">
          <center>
              <canvas id="paymentMethodChart" width="200" height="200"/></canvas><br>Payment Methods(%)<span id="paymentMethodYear"></span>
          </center>
        </section>
    </div>
</div>
<!-- END OF ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->

<br><br>
<!-- ROW OF SUMMARY -->
<div class="row margin-top-5">
    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading text-center"><i class="fa fa-level-up"></i> HIGH IN DEMAND</div>
            <?php if($topDemanded): ?>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <td style="vertical-align: top;"><center><strong>Item</th></center></strong>
                        <td style="vertical-align: top;"><center><strong>Qty Sold</th></center></strong>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($topDemanded as $get):?>
                    <tr>
                        <td style="vertical-align: top;"><center><?=$get->name?></td></center>
                        <td style="vertical-align: top;"><center><?=$get->totSold?></td></center>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading text-center"><i class="fa fa-level-down"></i> LOW IN DEMAND</div>
            <?php if($leastDemanded): ?>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <td style="vertical-align: top;"><center><strong>Item</th></center></strong>
                        <td style="vertical-align: top;"><center><strong>Qty Sold</th></center></strong>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($leastDemanded as $get):?>
                    <tr>
                        <td style="vertical-align: top;"><center><?=$get->name?></td></center>
                        <td style="vertical-align: top;"><center><?=$get->totSold?></td></center>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading text-center"><span>&#8369; &nbsp;HIGHEST EARNING</div></span> 
            <?php if($highestEarners): ?>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <td style="vertical-align: top;"><center><strong>Item</th></center>
                        <td style="vertical-align: top;"><center><strong>Total Earned</th></center>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($highestEarners as $get):?>
                    <tr>
                        <td style="vertical-align: top;"><center><?=$get->name?></td></center>
                        <td style="vertical-align: top;"><center>₱<?=number_format($get->totEarned, 2)?></td></center>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?> 
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading text-center"><span>&#8369;</span> LOWEST EARNING</div>
            <?php if($lowestEarners): ?>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <td style="vertical-align: top;"><center><strong>Item</th></center>
                        <td style="vertical-align: top;"><center><strong>Total Earned</th></center>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lowestEarners as $get):?>
                    <tr>
                        <td style="vertical-align: top;"><center><?=$get->name?></td></center>
                        <td style="vertical-align: top;"><center>₱<?=number_format($get->totEarned, 2)?></td></center>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?> 
        </div>
    </div>
</div>
<!-- END OF ROW OF SUMMARY -->

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading text-center">Daily Transactions</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($dailyTransactions) && $dailyTransactions): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <td style="vertical-align: top;"><center><strong>Date</th></center></strong>
                            <td style="vertical-align: top;"><center><strong>Quantity Sold</th></center></strong>
                            <td style="vertical-align: top;"><center><strong>Total Transaction</th></center></strong><strong>
                            <td style="vertical-align: top;"><center><strong>Total Earned</th></center></strong>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($dailyTransactions as $get): ?>
                        <tr>
                            <td style="vertical-align: top;"><center><?=
                                    date('l jS M, Y', strtotime($get->transactionDate)) === date('l jS M, Y', time())
                                    ? 
                                    "Today" 
                                    : 
                                    date('l jS M, Y', strtotime($get->transactionDate));
                                ?>
                            </td></center>
                            <td style="vertical-align: top;"><center><?=$get->qty_sold?></td></center>
                            <td style="vertical-align: top;"><center><?=$get->tot_trans?></td></center>
                            <td style="vertical-align: top;"><center>₱ <?=number_format($get->tot_earned, 2)?></td></center>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading text-center">Transactions by Days</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($transByDays) && $transByDays): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <td style="vertical-align: top;"><center><strong>Day</th></center></strong>
                            <td style="vertical-align: top;"><center><strong>Quantity Sold</th></center>
                            <td style="vertical-align: top;"><center><strong>Total Transaction</th></center></strong>
                            <td style="vertical-align: top;"><center><strong>Total Earned</th></center>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByDays as $get): ?>
                        <tr>
                            <td style="vertical-align: top;"><center><?=$get->day?>s</td></center>
                            <td style="vertical-align: top;"><center><?=$get->qty_sold?></td></center>
                            <td style="vertical-align: top;"><center><?=$get->tot_trans?></td></center>
                            <td style="vertical-align: top;"><center>₱<?=number_format($get->tot_earned, 2)?></td></center>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading text-center">Transactions by Months</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($transByMonths) && $transByMonths): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <td style="vertical-align: top;"><center><strong>Month</th></center></strong>
                            <td style="vertical-align: top;"><center><strong>Quantity Sold</th></center>
                            <td style="vertical-align: top;"><center><strong>Total Transaction</th></center></strong>
                            <td style="vertical-align: top;"><center><strong>Total Earned</th></center>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByMonths as $get): ?>
                        <tr>
                            <td style="vertical-align: top;"><center><?=$get->month?></td></center>
                            <td style="vertical-align: top;"><center><?=$get->qty_sold?></td></center>
                            <td style="vertical-align: top;"><center><?=$get->tot_trans?></td></center>
                            <td style="vertical-align: top;"><center>₱<?=number_format($get->tot_earned, 2)?></td></center>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading text-center">Transactions by Years</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($transByYears) && $transByYears): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <td style="vertical-align: top;"><center><strong>Year</th></center></strong>
                            <td style="vertical-align: top;"><center><strong>Quantity Sold</th></center>
                            <td style="vertical-align: top;"><center><strong>Total Transaction</th></center></strong>
                            <td style="vertical-align: top;"><center><strong>Total Earned</th></center>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByYears as $get): ?>
                        <tr>
                            <td style="vertical-align: top;"><center><?=$get->year?></td></center>
                            <td style="vertical-align: top;"><center><?=$get->qty_sold?></td></center>
                            <td style="vertical-align: top;"><center><?=$get->tot_trans?></td></center>
                            <td style="vertical-align: top;"><center>₱<?=number_format($get->tot_earned, 2)?></td></center>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- END OF  DASHBOARD.PHP -->

<!-- TRANSACTIONS.PHP -->
<div class="pwell hidden-print">   
    <div class="row">
        <div class="col-sm-12">
            <!--- Row to create new transaction-->
            <div class="row">
                <div class="col-sm-3">
                    <span class="pointer text-primary">
                        <button class='btn btn-primary btn-sm' id='showTransForm'><i class="fa fa-plus"></i>  New Transaction </button>
                    </span>
                </div>
                <div class="col-sm-3">
                    <span class="pointer text-primary">
                        <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#reportModal' style="margin-left: 1000px;">
                        <i class="fa fa-newspaper-o"></i> Generate Report 
                        </button>
                    </span>
                </div>
            </div>
            <br>
            <!--- End of row to create new transaction-->
            <!---form to create new transactions--->
            <div class="row collapse" id="newTransDiv">
                <!---div to display transaction form receipt --->
                <div class="col-sm-12" id="salesTransFormDiv">
                    <div class="well">
                        <form name="salesTransForm" id="salesTransForm" role="form">
                            <div class="text-center errMsg" id='newTransErrMsg'></div>
                            <br>

                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Cloned div comes here--->
                                    <div id="appendClonedDivHere"></div>
                                    <!--End of cloned div here--->
                                    
                                    <!--- Text to click to add another item to transaction-->
                                    <div class="row">
                                        <div class="col-sm-2 text-primary pointer">
                                            <button class="btn btn-primary btn-sm" id="clickToClone"><i class="fa fa-plus"></i> Add item</button>
                                        </div>
                                        
                                        <br class="visible-xs">
                                        
                                        <!-- <div class="col-sm-2 form-group-sm">
                                            <input type="text" id="barcodeText" class="form-control" placeholder="Item Code" autofocus>
                                            <span class="help-block errMsg" id="itemCodeNotFoundMsg"></span>
                                        </div> -->
                                    </div>
                                    <!-- End of text to click to add another item to transaction-->
                                    <br>
                                    
                                    <div class="row">
                                        <div class="col-sm-3 form-group-sm">
                                            <label for="vat">VAT(%)</label>
                                            <input type="number" min="0" id="vat" class="form-control" value="0">
                                        </div>
                                        
                                        <div class="col-sm-3 form-group-sm">
                                            <label for="discount">Discount(%)</label>
                                            <input type="number" min="0" id="discount" class="form-control" value="0">
                                        </div>
                                        
                                        <div class="col-sm-3 form-group-sm">
                                            <label for="discount">Discount(value)</label>
                                            <input type="number" min="0" id="discountValue" class="form-control" value="0">
                                        </div>
                                        
                                        <div class="col-sm-3 form-group-sm">
                                            <label for="modeOfPayment">Mode of Payment</label>
                                            <select class="form-control checkField" id="modeOfPayment">
                                                <option value="">---</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                            <span class="help-block errMsg" id="modeOfPaymentErr"></span>
                                        </div>
                                    </div>
                                        
                                    <div class="row">
                                        <div class="col-sm-4 form-group-sm">
                                            <label for="cumAmount">Cumulative Amount</label>
                                            <span id="cumAmount" class="form-control">0.00</span>
                                        </div>
                                        
                                        <div class="col-sm-4 form-group-sm">
                                            <div class="cashAndPos hidden">
                                                <label for="cashAmount">Cash</label>
                                                <input type="text" class="form-control" id="cashAmount">
                                                <span class="help-block errMsg"></span>
                                            </div>

                                            <div class="cashAndPos hidden">
                                                <label for="posAmount">POS</label>
                                                <input type="text" class="form-control" id="posAmount">
                                                <span class="help-block errMsg"></span>
                                            </div>

                                            <div id="amountTenderedDiv">
                                                <label for="amountTendered" id="amountTenderedLabel">Amount Tendered</label>
                                                <input type="text" class="form-control" id="amountTendered">
                                                <span class="help-block errMsg" id="amountTenderedErr"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-4 form-group-sm">
                                            <label for="changeDue">Change Due</label>
                                            <span class="form-control" id="changeDue"></span>
                                        </div>
                                    </div>
                                        
                                    <div class="row">
                                        <div class="col-sm-4 form-group-sm">
                                            <label for="custName">Customer Name</label>
                                            <input type="text" id="custName" class="form-control" placeholder="Name">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group-sm">
                                            <label for="custPhone">Customer Phone</label>
                                            <input type="tel" id="custPhone" class="form-control" placeholder="Phone Number">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group-sm">
                                            <label for="custEmail">Customer Email</label>
                                            <input type="email" id="custEmail" class="form-control" placeholder="E-mail Address">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-sm-2 form-group-sm">
                                   <!--  <button class="btn btn-primary btn-sm" id='useScanner'>Use Barcode Scanner</button> -->
                                </div>
                                <br class="visible-xs">
                                <div class="col-sm-6"></div>
                                <br class="visible-xs">
                                <div class="col-sm-4 form-group-sm">
                                    <button type="button" class="btn btn-primary btn-sm" id="confirmSaleOrder">Confirm Order</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="cancelSaleOrder">Clear Order</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="hideTransForm">Close</button>
                                </div>
                            </div>
                        </form><!-- end of form-->
                    </div>
                </div>
                <!-- end of div to display transaction form-->
            </div>
            <!--end of form-->
    
            <br><br>
            <!-- sort and co row-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-md-12 form-group-sm form-inline" style="float: right;">
                        <label for="transListSortBy" >Sort by</label>
                        <select id="transListSortBy" class="form-control">
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
    <div class="row"><center>
        <!-- Transaction list div-->
        <div class="col-sm-12" id="transListTable"></div>
        <!-- End of transactions div-->
                <!-- Show Entries Start-->
                <div class="col-sm-12 form-inline form-group-sm text-right">
                        <label for="transListPerPage">Show 
                        <select id="transListPerPage" class="form-control">
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

<div class="row hidden" id="divToClone">
    <div class="col-sm-4 form-group-sm">
        <label>Item</label>
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
    
    <div class="col-sm-1">
        <button class="close retrit">&times;</button>
    </div>
    
    <br class="visible-xs">
</div>

<div class="modal fade" id='reportModal' data-backdrop='static' role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="close" data-dismiss='modal'>&times;</div>
                <h4 class="text-center" style="text-align: center;"><strong>Generate Report</h4></strong>
            </div>
            
            <div class="modal-body">
                <div class="row" id="datePair">
                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">From Date</label>                                    
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id='transFrom' class="form-control date start" placeholder="YYYY-MM-DD">
                        </div>
                        <span class="help-block errMsg" id='transFromErr'></span>
                    </div>

                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">To Date</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id='transTo' class="form-control date end" placeholder="YYYY-MM-DD">
                        </div>
                        <span class="help-block errMsg" id='transToErr'></span>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-success" id='clickToGen'>Generate</button>
                <button class="btn btn-danger" data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>

<!---End of copy of div to clone when adding more items to sales transaction---->

<!-- TRANSRECEIPT.PHP -->

<?php if($allTransInfo):?>
<?php $sn = 1; ?>
      <div class="container-fluid"  id="transReceiptToPrint">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12 mb-3">
                  <h4>
                    <img src="<?=base_url()?>public/images/stockpiles.png" alt="logo" class="img-responsive" width="200px">
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>StockPile</strong><br>
                    Email: devsclutch@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?=$cust_name?></strong><br>
                    Customer Phone No.: <?=$cust_phone?><br>
                    <!-- Customer Email: <?=$cust_email?> -->
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Transaction Info</b>
                  <address>Receipt No. <span><?=isset($ref) ? $ref : ""?></span><br> Date: <span><?=isset($transDate) ? date('jS M, Y h:i:sa', strtotime($transDate)) : ""?></span></address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Item</th>
                      <th>Quantity & Price</th>
                      <th>Total(₱)</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $init_total = 0; ?>
                        <?php foreach($allTransInfo as $get):?>
                    <tr>
                      <td><?=ellipsize($get['itemName'], 10);?></td>
                      <td><?=$get['quantity'] . "x" .number_format($get['unitPrice'], 2)?></td>
                      <td><?=number_format($get['totalPrice'], 2)?></td>
                    </tr>
                        <?php $init_total += $get['totalPrice'];?>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-12">
                <p class="lead">Billing Information</p>
                    <div class="table-responsive">
                    <table class="table">
                        <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>₱ <?=isset($init_total) ? number_format($init_total, 2) : 0?></td>
                        </tr>
                        <tr>
                        <th>Discount (<?=$discountPercentage?>%):</th>
                        <td>₱ <?=isset($discountAmount) ? number_format($discountAmount, 2) : 0?></td>
                        </tr>
                        <tr>
                        <?php if($vatPercentage > 0): ?>
                            <th>VAT(<?=$vatPercentage?>%):</th>
                            <td>₱<?=isset($vatAmount) ? number_format($vatAmount, 2) : ""?></td>
                            <?php else: ?>
                            VAT inclusive
                            <?php endif; ?>
                        </tr>
                        <tr>
                        <th>Final Total:</th>
                        <td>₱ <?=isset($cumAmount) ? number_format($cumAmount, 2) : ""?></td>
                        </tr>
                    </table>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12">
                  <p class="lead">Amount Information</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Mode of Payment:</th>
                        <td> <?=isset($_mop) ? str_replace("_", " ", $_mop) : ""?></td>
                      </tr>
                      <tr>
                        <th>Amount Tendered:</th>
                        <td>₱ <?=isset($amountTendered) ? number_format($amountTendered, 2) : ""?></td>
                      </tr>
                      <tr>
                        <th>Change:</th>
                        <td>₱ <?=isset($changeDue) ? number_format($changeDue, 2) : ""?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row hidden-print float-right">
                <div class="col-12">
                  <button type="button" class="btn btn-primary ptr">
                    <i class="fa fa-print"></i> Print Receipt
                  </button>
                  <button type="button" data-dismiss='modal' class="btn btn-secondary">
                    <i class="fa fa-close"></i> Close
                  </button>
                </div>
              </div>
              <br class="hidden-print">
            </div>
            <?php endif;?>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- END OF TRANSRECEIPT.PHP -->
<!-- Admin LTE Templ -->
