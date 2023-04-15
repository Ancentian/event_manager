<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Events List
                        <div class="page-title-subheading">All Events
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
                    <div class="card-header">Events Details</div>
                    <div class="card-body">
                        <!--                        <h5 class="card-title"></h5>-->
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Event Name</th>
                                    <th class="text-center">Actions</th>                         
                                </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1;
                            foreach ($events as $one) {
                                ?>
                                <tr>
                                    <th class="text-center" scope="row"><?php echo $i; ?></th>
                                    <td class="text-center"><?php echo $one['eventName']; ?></td>
                                    <td class="text-center">       
                                        <a href="<?php echo base_url(); ?>events/editEvent/<?php echo $one['id']; ?>" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <?php if ($this->session->userdata('user_aob')->role == 'admin' || $this->session->userdata('user_aob')->role == 'finance'){ ?>
                                        <a href="<?php echo base_url(); ?>events/delete/<?php echo $one['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <?php }?>
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
        