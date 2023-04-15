    
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>Add Staff
                        <div class="page-title-subheading">Add New Staff
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
                <div class="col-sm-1"></div>
                <div class="main-card mb-3 card float:center">
                    <div class="card-body float:center"><h5 class="card-title">Employee Details</h5>
                        <hr>
                        <div class="alert alert-danger">By default, staff password is pass12345. They are advised to change upon login! </div>
                        <form class="" action="<?php echo base_url(); ?>employee/update/<?php echo $id; ?>" method="post">
                            <input type="hidden" name="password" value="<?php echo $this->auth_model->generate_hash('pass12345');?>">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail11" class="">First Name</label>
                                        <input name="firstname" id="firstname" value="<?php echo $employee['firstname']; ?>" type="text" class="form-control">
                                    </div>
                                </div>                      
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Last Name</label>
                                        <input name="lastname" id="lastname" value="<?php echo $employee['lastname']; ?>" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Email</label>
                                        <input name="email" id="email"  type="email" class="form-control" value="<?php echo $employee['email']; ?>"></div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="department" class="">Role</label>
                                                <select class="select form-control" name="role" class="form-control" required>
                                                    <option value="">--Select</option>
                                                    <option value="admin"<?php if($employee['role'] == 'admin'){echo "selected"; }?>>Admin</option>
                                                    <option value="accountant"<?php if($employee['role'] == 'accountant'){echo "selected"; }?>>Accountant</option>
                                                    <option value="salesperson"<?php if($employee['role'] == 'salesperson'){echo "selected"; }?>>Salesperson</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                    
                                    <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
