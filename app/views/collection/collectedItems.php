<?php //echo $payment; ?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Collection List
                        <div class="page-title-subheading">Products List
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
                    <div class="card-header">Products Details</div>
                    <div class="card-body">
                        <!--                        <h5 class="card-title"></h5>-->
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Collected By</th>
                                    <th class="text-center">Collected On</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($collect as $one) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td class="text-center"><?php echo $one['customerName']; ?> </td>
                                    <td class="text-center"><?php echo $one['productName']; ?> </td>
                                    <td class="text-center"><?php echo $one['collected_by']; ?> </td>
                                    <td class="text-center"><?php echo date('d/m/Y H:i', strtotime($one['created_at']))?></td>
                                    <?php if ($one['status'] == 0) { ?>
                                        <td class="text-center">
                                            <div class="badge badge-warning">Not Collected</div>
                                        </td>
                                    <?php }?>
                                    <?php if ($one['status'] == 1) { ?>
                                        <td class="text-center">
                                            <div class="badge badge-warning">Collected</div>
                                        </td>
                                    <?php }?>
                                    <td class="text-center">
                                        <a href="<?php echo base_url(); ?>collection/collect/<?php echo $one['id']; ?>" title="Collect" class="btn btn-warning"><i class="pe-7s-piggy"></i></a>
                                        <a href="<?php echo base_url(); ?>collection/paymentDetails/<?php echo $one['production_id']; ?>" title="View" class="btn btn-primary"><i class="fa fa-eye"></i></a>    
                                    </td>
                                </tr>
                                <?php $i++;
                            } ?>

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        