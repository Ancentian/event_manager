<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Inventory
                        <div class="page-title-subheading">Items List
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
            <div class="col-md-12 "> 
                <div class="main-card mb-3 card">
                    <div class="card-header">Item Details</div>
                    <div class="card-body">
                        <!--                        <h5 class="card-title"></h5>-->
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Client</th>
                                    <th class="text-center">Location</th>
                                    <th class="text-center">Event Date</th>
                                    <th class="text-center">Return On</th>
                                    <th class="text-center">Actions</th>
                                                            
                                </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1;
                            foreach ($inventory as $one) {
                                ?>
                                <tr>
                                    <th class="text-center" scope="row"><?php echo $i; ?></th>
                                    <td class="text-center"><?php echo $one['customerName']; ?></td>
                                    <td class="text-center"><?php echo $one['location']; ?></td>
                                    <td class="text-center"><?php echo $one['eventDate']; ?></td>
                                    <td class="text-center"><?php echo $one['date_of_return']; ?></td>
                                    <!-- <?php //if($one['items_collected'] == $one['items_returned']){ ?>
                                        <td class="text-center pill badge badge-success">Complete</td>
                                    <?php //}?>
                                    <?php //if($one['items_collected'] != $one['items_returned']){ ?>
                                        <td class="text-center pill badge badge-warning">Incomplete</td>
                                    <?php //}?> -->
                                    <td class="text-center" >       
                                        <a href="<?php echo base_url(); ?>reports/viewInventory/<?php echo $one['id']; ?>" title="Edit" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        &nbsp;
                                        <?php if ($this->session->userdata('user_aob')->role == 'admin' || $this->session->userdata('user_aob')->role == 'finance'){ ?>
                                        <a href="<?php echo base_url(); ?>inventory/delete/<?php echo $one['id']; ?>" class="btn btn-danger" hidden><i class="fa fa-trash"></i></a>
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
        