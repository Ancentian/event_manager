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
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Requests Details</div>
                    <div class="card-body">
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Contact</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Return Date</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($events as $one) { if (date('Y-m-d', strtotime($one['eventDate'])) > date('Y-m-d')) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td class="text-center"><?php echo $one['customerName']; ?> </td>
                                        <td class="text-center"><a href="#"><?php echo $one['phoneNumber']; ?></a> </td>
                                        <td class="text-center"><?php echo date('d/m/Y', strtotime($one['eventDate']))?> </td>
                                        <td class="text-center"><?php echo date('d/m/Y', strtotime($one['date_of_return']))?> </td>
                                        <td class="text-center"><?php echo $one['firstname'].' '.$one['lastname']; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url(); ?>requests/viewRequest/<?php echo $one['id']; ?>" title="View" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <?php if($one['return_value'] == '0' || $one['return_value'] == ''){?>
                                                <a href="<?php echo base_url(); ?>inventory/itemsReturn/<?php echo $one['id']; ?>" title="Return" class="btn btn-warning"><i class="fa fa-reply-all"></i></a>
                                            <?php }?>
                                            <?php if ($this->session->userdata('user_aob')->role == 'admin' || $this->session->userdata('user_aob')->role == 'finance'){ ?>
                                                <a href="<?php echo base_url(); ?>requests/editRequest/<?php echo $one['id']; ?>" title="Edit" class="btn btn-success" hidden><i class="fa fa-edit"></i></a>
                                                &nbsp;
                                                <a href="<?php echo base_url(); ?>requests/delete/<?php echo $one['id']; ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <?php $i++; } } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        