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
                    <div>Return List
                        <div class="page-title-subheading">All Requests Returns
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
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Return Details
                        
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg2-0" role="tabpanel">
                                <form class="float-center" action="<?php echo base_url('reports/requestReports')?>" method="GET">
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
                                            <th class="text-center">Contact</th>
                                            <th class="text-center">Event Date</th>                
                                            <th class="text-center">Returned On</th>
                                            <th class="text-center">User</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1;
                                        foreach ($events as $one) { ?>
                                            <tr <?php if($one['returned_on'] > $one['date_of_return']){ ?> class="table-danger"<?php } ?>>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td class="text-center"><?php echo $one['customerName']; ?> </td>
                                                <td class="text-center"><a href="tel:"><?php echo $one['phoneNumber']; ?></a> </td>
                                                <td class="text-center"><?php echo date('d/m/Y', strtotime($one['eventDate']))?> </td>   
                                                <?php if ($one['returned_on'] == '') {?>
                                                    <td class="text-center">--</td>
                                                <?php }?>
                                                <?php if ($one['returned_on'] != '') {?>
                                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($one['returned_on']))?> </td>
                                                <?php }?>
                                                <td class="text-center"><?php echo $one['firstname'].' '.$one['lastname']; ?></td>
                                                <?php if($one['return_value'] == '0' || $one['return_value'] == '') {?>
                                                    <td class="text-center">
                                                        <span class="badge badge-danger">Not Returned</span>
                                                    </td>
                                                <?php }elseif ($one['return_value'] == '1') {?>
                                                    <td class="text-center">
                                                        <span class="badge badge-success">Returned</span>
                                                    </td>
                                                <?php }elseif ($one['return_value'] == '3') {?>
                                                    <td class="text-center">
                                                        <span class="badge badge-warning">Partially Returned</span>
                                                    </td>
                                                <?php }?>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url(); ?>inventory/viewReturnedItems/<?php echo $one['id']; ?>" title="View" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                    <?php if ($this->session->userdata('user_aob')->role == 'admin' || $this->session->userdata('user_aob')->role == 'finance'){ ?>
                                                        <a href="<?php echo base_url(); ?>requests/paymentDetails/<?php echo $one['id']; ?>" title="Pay" class="btn btn-success" ><i class="pe-7s-cash"></i></a>
                                                        <!-- <a href="<?php //echo base_url(); ?>inventory/editReturnedItems/<?php //echo $one['id']; ?>" title="Edit" class="btn btn-success" hidden><i class="fa fa-money"></i></a> -->
                                                        &nbsp;
                                                        <a href="<?php echo base_url(); ?>requests/delete/<?php echo $one['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    <?php }?>
                                                </td>
                                            </tr > 
                                            <?php $i++; }  ?>
                                        </tbody>
                                    </table>

                                </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                