<div class="app-main__outer">
    <div class="app-main__inner">

        <div class="row">

            <div class="col-md-1"></div>
            <div class="col-md-10" style="padding-top: 20px;">
                <div class="main-card mb-3 card">
                    
                    <div class="card-body">
                        <a href="<?php echo base_url()?>employee/editprofile/<?php echo $this->session->userdata('user_aob')->id; ?>" class="btn btn-info float-right position-relative"><i class="fa fa-edit"></i></a>
                        <h5 class="card-title">ACCOUNT DETAILS</h5>

                        <hr>
                        <?php if ($this->session->flashdata('success-msg')) { ?>
                            <div class="alert alert-success"><?php echo $this->session->flashdata('success-msg'); ?></div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('error-msg')) { ?>
                            <div class="alert alert-danger"><?php echo $this->session->flashdata('error-msg'); ?></div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <b>Title: </b><?php echo $this->session->userdata('user_aob')->title; ?></div>
                            <div class="col-sm-3"><b>Name: </b><?php echo $this->session->userdata('user_aob')->firstname; ?> <?php echo $this->session->userdata('user_aob')->lastname; ?>
                            </div>
                            <div class="col-sm-3">
                                <b>Email: </b><?php echo $this->session->userdata('user_aob')->email; ?></div>
                            <div class="col-sm-3">
                                <b>Phone: </b><?php echo $this->session->userdata('user_aob')->phonenumber; ?></div>
                        </div>
                        <hr>
                        <h5 class="card-title">UPDATE PASSWORD</h5>
                        <hr>

                        <form method="post" action="<?php echo base_url(); ?>main/updatepass">
                            <div class="position-relative row form-group"><label for="examplePassword"
                                                                                 class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-4"><input name="password" placeholder="((Unchanged))" type="password"
                                                             class="form-control" required></div>
                            </div>
                            <div class="position-relative row form-group"><label for="examplePassword"
                                                                                 class="col-sm-2 col-form-label">Confirm</label>
                                <div class="col-sm-4"><input name="pconfirm" placeholder="((Unchanged))" type="password"
                                                             class="form-control" required></div>
                            </div>

                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <input type="submit" class="btn btn-success" value="UPDATE">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>