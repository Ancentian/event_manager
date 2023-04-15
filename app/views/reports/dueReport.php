<?php $sdate = "";$edate="";
    $sdate = $_GET['sdate'];
    $edate = $_GET['edate'];
?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Due List
                        <div class="page-title-subheading">All Service Requests
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <?php if ($this->session->flashdata('success-msg')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success-msg'); ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('error-msg')) { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error-msg'); ?></div>
        <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Due Details</div>
                    <div class="card-body">
                        <form class="float-center" action="<?php echo base_url('reports/dueReport')?>" method="GET">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" style="<?php if($sdate != ""){?>background-color: ;<?php } ?>" value="<?php echo $edate;?>" name="sdate" required>
                                </div>
                                <div class="col-sm-3">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" style="<?php if($edate != ""){?>background-color: ;<?php } ?>" value="<?php echo $edate;?>" name="edate" required>
                                </div>
                                <div class="col-sm-1">
                                    <label>.</label><br>
                                    <input type="submit" class="btn btn-success" value="FILTER" required>
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Paid Amount</th>
                                    <th class="text-center">Due</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; $total =0; $totamount=0; $totdue=0;
                            foreach ($production as $one) { if ($one['amount_paid'] < $one['total_price']) {$total += $one['total_price']; $totamount += $one['amount_paid']; $totdue += ($one['total_price']-$one['amount_paid']); ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td class="text-center"><?php echo $one['firstname'].' '.$one['lastname']; ?></td>
                                    <td class="text-center"><?php echo $one['customerName']; ?> </td>
                                    <td class="text-center"><?php echo $one['productName']; ?> </td>
                                    <td class="text-center"><?php echo $one['quantity']; ?> </td>
                                    <td class="text-center"><?php echo $one['total_price']; ?> </td>
                                    <?php if ($one['amount_paid'] == '') { ?>
                                        <td class="text-center"><?php echo "0.00"; ?></td>
                                    <?php }?>
                                    <?php if ($one['amount_paid'] != '') { ?>
                                        <td class="text-center"><?php echo $one['amount_paid']; ?></td>
                                    <?php }?>
                                   
                                    <td class="text-center mt-2 pill badge badge-warning"><?php echo $one['total_price']-$one['amount_paid']; ?> </td>
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($one['created_at']))?> </td>
                                    
                                    <td class="text-center">
                                        <a href="<?php echo base_url(); ?>collection/collectProducts/<?php echo $one['custID']; ?>" title="Collect" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        <a href="<?php echo base_url(); ?>production/editProd/<?php echo $one['id']; ?>" title="Edit" type="hidden" class="btn btn-success" hidden><i class="fa fa-edit" hidden></i></a>
                                        &nbsp;
                                        <a href="<?php echo base_url(); ?>production/delete/<?php echo $one['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                                <?php $i++;
                            } } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5"></th>
                                    <th><?php echo $total;?></th>
                                    <th><?php echo $totamount;?></th>
                                    <th><?php echo $totdue;?></th>
                                    <th ></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        