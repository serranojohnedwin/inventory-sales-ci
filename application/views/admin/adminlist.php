<?php
defined('BASEPATH') OR exit('');
?>

<!-- <?php echo isset($range) && !empty($range) ? "Showing ".$range : ""?> -->
<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="text-bold">EMPLOYEE ACCOUNTS</h4>
    </div>
    <?php if($allAdministrators):?>
        <span class="center">
    <div class="table table-responsive">
        <table class="table table-striped table-bordered center" cellspacing="0" cellpadding="0">
            <thead class="bg-dark">
                <tr>
                    <th style="vertical-align: top;"><center>ID NO.</th></center>
                    <th style="vertical-align: top;"><center>EMPLOYEE NAME</th></center>
                    <th style="vertical-align: top;"><center>E-MAIL</th></center>
                    <th style="vertical-align: top;"><center>MOBILE</th></center>
                    <!-- <th style="vertical-align: top;"><center>WORK</th></center> -->
                    <th style="vertical-align: top;"><center>ROLE</th></center>
                    <th style="vertical-align: top;"><center>DATE CREATED</th></center>
                    <th style="vertical-align: top;"><center>LAST LOG IN</th></center>
                    <th style="vertical-align: top;"><center>EDIT</th></center>
                    <th style="vertical-align: top;"><center>ACCOUNT STATUS</th></center>
                    <th style="vertical-align: top;"><center>DELETE</th></center>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allAdministrators as $get):?>
                    <tr>
                        <th style="vertical-align: top;"><center><?=$sn?>.</th></center>
                        <td class="adminName"><center><?=$get->first_name ." ". $get->last_name?></td>
          
                        <td class="adminEmail"><center><?=mailto($get->email)?></td>
                        <td class="adminMobile1"><center><?=$get->mobile1?></td>
                        <!-- <td class="adminMobile2"><?=$get->mobile2?></td> -->
                        <td class="adminRole"><center><?=ucfirst($get->role)?></td>
                        <td><center><?=date('jS M, Y h:i:sa', strtotime($get->created_on))?></td>
                        <td>
                        <center> <?=$get->last_login === "0000-00-00 00:00:00" ? "---" : date('jS M, Y h:i:sa', strtotime($get->last_login))?>
                        </td>
                        <td class="text-center editAdmin" id="edit-<?=$get->id?>">
                        <i class="fa fa-edit pointer fa-fw"style="font-size:24px"></i>
                        </td>
                        <td class="text-center suspendAdmin text-success fa-2x fa-fw"style="font-size:24px" id="sus-<?=$get->id?>">
                            <?php if($get->account_status === "1"): ?>
                            <i class="fa fa-toggle-on pointer fa-fw"></i>
                            <?php else: ?>
                            <i class="fa fa-toggle-off pointer fa-fw"></i>
                            <?php endif; ?>
                        </td>
                        <td class="text-center text-danger deleteAdmin fa-2x fa-fw"style="font-size:24px" id="del-<?=$get->id?>">
                            <?php if($get->deleted === "1"): ?>
                            <a class="pointer">Undo</a>
                            <?php else: ?>
                            <i class="fa fa-trash pointer fa-fw"></i>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $sn++;?>
                <?php endforeach;?>
            </tbody>
        </table>
    </span>
    </div>
    <?php else:?>
    No Administrative Accounts
    <?php endif; ?>

</div>
<!-- Pagination -->
<div class="row text-center">
    <?php echo isset($links) ? $links : ""?>
</div>
<!-- Pagination ends -->
</span