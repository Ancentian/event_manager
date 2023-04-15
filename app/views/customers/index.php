<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Request List
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
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-card mb-3 card">
                    <div class="card-header">Customer Details</div>
                    <div class="card-body">
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Contact</th>
                                    <th class="text-center">Actions</th>                         
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; foreach ($customers as $one) { ?>
                                <tr>
                                    <th scope="row" class="text-center"><?php echo $i; ?></th>
                                    <td class="text-center"><?php echo $one['customerName']; ?></td>
                                    <td class="text-center"><?php echo $one['phoneNumber']; ?></td>
                                    <td class="text-center">   
                                        <a href="<?php echo base_url(); ?>customers/editCustomer/<?php echo $one['id']; ?>" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <?php if ($this->session->userdata('user_aob')->role == 'admin' || $this->session->userdata('user_aob')->role == 'finance'){ ?>
                                        <a href="<?php echo base_url(); ?>customers/delete/<?php echo $one['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <?php }?>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        