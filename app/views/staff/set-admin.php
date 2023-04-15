<?php //var_dump($admin);die; ?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>SMS Api
                        <div class="page-title-subheading">Set SMS Receiver
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
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="main-card mb-3 col-md-10 card">
                        <div class="card-body"><h5 class="card-title">Admin Details</h5>
                            <hr>
                            <form class="" action="<?php echo base_url('employee/updateSetAdmin'); ?>" method="post" enctype="multipart/form-data" >
                                <div class="list_wrapper">  
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>API Key</label>
                                            <input type="text" class="form-control" required name="api_key" value="<?php echo $admin['api_key']?>">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>API Password</label>
                                            <input type="text" class="form-control" required name="password" value="<?php echo $admin['password']?>">
                                        </div>
                                        
                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Phone Number <small>(Seperated with Comma)</small></label>
                                                <input name="recipients" type="text" value="<?php echo $admin['recipients'] ?>" class="form-control"/>  
                                            </div>
                                        </div>    
                                        <!-- <div class="col-xs-1 col-sm-1 col-md-1">
                                            <br>
                                            <button class="btn btn-primary mt-2 list_add_button" type="button">+</button>
                                        </div> -->
                                    </div>
                                </div>

                                <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
