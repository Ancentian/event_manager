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
                    <div>Payment Report
                        <div class="page-title-subheading">All Payments
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
                    <div class="card-header">Payment Details</div>
                    <div class="card-body">
                        <form class="float-center" action="<?php echo base_url('reports/paymentReport')?>" method="GET">
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
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Mode</th>
                                    <th class="text-center">Amount Paid</th>
                                    <th class="text-center">Received By</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; $tot = 0;
                            foreach ($payments as $one) { $tot += $one['amount_paid'];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td class="text-center"><?php echo $one['customerName']; ?> </td>
                                    <td class="text-center"><?php echo $one['pmnt_mode']; ?></td>
                                    <td class="text-center"><?php echo $one['amount_paid']; ?> </td>
                                    <td class="text-center"><?php echo $one['firstname'].' '.$one['lastname']; ?> </td>
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($one['created_at']))?> </td>
                                    
                                    <td class="text-center" >
                                        <a href="<?php echo base_url(); ?>collection/r_print/<?php echo $one['id'].'/'.$one['production_id']; ?>"
                             target="popup"
                             onclick="window.open('<?php echo base_url(); ?>collection/r_print/<?php echo $one['id'].'/'.$one['production_id']; ?>','popup','width=600,height=600'); return false;" hidden ><i class="fa fa-fw icon-success" aria-hidden="true" title="Print"></i></a>
                                        &nbsp;
                                        <a href="<?php echo base_url(); ?>reports/deletePayment/<?php echo $one['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                                <?php $i++;
                            } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th colspan="1">Total</th>
                                    <th></th>
                                    
                                    
                                    <th class="text-center"><?php echo $tot;?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        