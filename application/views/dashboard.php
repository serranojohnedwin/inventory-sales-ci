<?php
defined('BASEPATH') OR exit('');
?>
<!DOCTYPE HTML>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 <section>
 <div class="row mb-3">
      <div class="col-sm-12">
          <h1>Dashboard</h1>
          <h6 class="text-secondary">Overview the business data</h6>
      </div><!-- /.col --><!-- /.col -->
  </div><!-- /.row -->
 <div class="row justify-content-around">
                <div class="col-md-3 col-sm-6 col-12">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?=$totalItems?></h3>
                            <p>Items in Stock</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?=$totalSalesToday?></h3>
                            <p>Todays total sales</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <!-- small card -->
                    <div class="small-box bg-info">
                    <div class="inner">
                        <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                        <h3><?=$totalTransactions?></h3>
                        <p>Total transactions</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <!-- small card -->
                    <div class="small-box bg-success">
                    <div class="inner text-white">
                        <h3><?php $query = $this->db->query('SELECT SUM( totalPrice)as total FROM transactions')->row(); echo floatval($query->total);?></h3>
                        <p>Total earning till date</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    </div>
                    
                </div>
  </div><!-- /.container-fluid -->

  <!-- ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->
    
<div class="row my-3">
    <div class="col-sm-7">
        <div class="box">
            <div class="box-header bg-primary p-2">
              <h5 class="box-title" id="earningsTitle"></h5>
            </div>

            <div class="box-body bg-dark p-1">
              <canvas class="p-2" id="earningsGraph" width="200" height="80"></canvas>
            </div>
        </div>
    </div>

    <div class="col-sm-5">
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
        
        <section class="panel mt-2 text-center">
              <canvas id="paymentMethodChart" width="200" height="200"></canvas><br>Payment Methods(%)<span id="paymentMethodYear"></span>
        </section>
    </div>
</div>

<!--Row of Summary Overview Tables -->
<div class="row text-center">

        <div class="col-sm-6">
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title"><i class="fa fa-arrow-up"></i> High in Demand</h3>
                <?php if($topDemanded): ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Quantity Sold</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($topDemanded as $get):?>
                    <tr>
                      <td><?=$get->name?></td>
                      <td><?=$get->totSold?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php else: ?>
                    No Transactions
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>

        <div class="col-sm-6">
            <div class="card">
              <div class="card-header bg-warning">
                <h3 class="card-title text-white"><i class="fa fa-arrow-down"></i> Low in Demand</h3>
                <?php if($leastDemanded): ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Quantity Sold</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($leastDemanded as $get):?>
                    <tr>
                      <td><?=$get->name?></td>
                      <td><?=$get->totSold?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php else: ?>
                    No Transactions
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>

        <div class="col-sm-6">
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title text-white"><i class="fa fa-arrow-up"></i> Highest Earning</h3>
                <?php if($highestEarners): ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Total Earned</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($highestEarners as $get):?>
                    <tr>
                      <td><?=$get->name?></td>
                      <td>₱ <?=number_format($get->totEarned, 2)?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php else: ?>
                    No Transactions
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
    
        <div class="col-sm-6">
            <div class="card">
              <div class="card-header bg-warning">
                <h3 class="card-title text-white"><i class="fa fa-arrow-up"></i> Lowest Earning</h3>
                <?php if($lowestEarners): ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Total Earned</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($lowestEarners as $get):?>
                    <tr>
                      <td><?=$get->name?></td>
                      <td>₱ <?=number_format($get->totEarned, 2)?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php else: ?>
                    No Transactions
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
</div>
<!-- /.row -->

<!-- End of Summary Row -->

<!-- Transaction Summary -->
<div class="row text-center">
        <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-dark">
                <h3 class="card-title">Daily Transactions</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <?php if(isset($dailyTransactions) && $dailyTransactions): ?>
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Quantity Sold</th>
                      <th>Total Transaction</th>
                      <th>Total Earned</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php foreach($dailyTransactions as $get): ?>
                            <tr>
                                <td><?=
                                        date('l jS M, Y', strtotime($get->transactionDate)) === date('l jS M, Y', time())
                                        ? 
                                        "Today" 
                                        : 
                                        date('l jS M, Y', strtotime($get->transactionDate));
                                        ?></td>
                                <td><?=$get->qty_sold?></td>
                                <td><?=$get->tot_trans?></td>
                                <td>₱ <?=number_format($get->tot_earned, 2)?></td>
                                </tr>
                        <?php endforeach;?>
                  </tbody>
                </table>
                    <?php else: ?>
                        <li>No Transactions</li>
                    <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Transactions by Days</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <?php if(isset($transByDays) && $transByDays): ?>
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Day</th>
                      <th>Quantity Sold</th>
                      <th>Total Transaction</th>
                      <th>Total Earned</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php foreach($transByDays as $get): ?>
                            <tr>
                                <td><?=$get->day?>s</td>
                                <td><?=$get->qty_sold?></td>
                                <td><?=$get->tot_trans?></td>
                                <td>₱ <?=number_format($get->tot_earned, 2)?></td>
                                </tr>
                        <?php endforeach;?>
                  </tbody>
                </table>
                    <?php else: ?>
                        <li>No Transactions</li>
                    <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-danger">
                <h3 class="card-title">Transactions by Years</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <?php if(isset($transByYears) && $transByYears): ?>
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Year</th>
                      <th>Quantity Sold</th>
                      <th>Total Transaction</th>
                      <th>Total Earned</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php foreach($transByYears as $get): ?>
                            <tr>
                                <td><?=$get->year?></td>
                                <td><?=$get->qty_sold?></td>
                                <td><?=$get->tot_trans?></td>
                                <td>₱ <?=number_format($get->tot_earned, 2)?></td>
                                </tr>
                        <?php endforeach;?>
                  </tbody>
                </table>
                    <?php else: ?>
                        <li>No Transactions</li>
                    <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
</div>
<!-- /.row -->

</section>
        
<!-- END OF ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->

<script src="<?=base_url('public/js/chart.js'); ?>"></script>
<script src="<?=base_url('public/js/dashboard.js')?>"></script>