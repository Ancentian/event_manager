<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-user text-success">
                        </i>
                    </div>
                    <div>Employee
                        <div class="page-title-subheading">Add Employee
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
                    <div class="main-card col-md-10 mb-3 card ">
                        <div class="card-body"><h5 class="card-title">Employee Details</h5>
                            <hr>
                            <form class="" action="<?php echo base_url('employee/store'); ?>" method="post">
                                <input type="hidden" name="password" value="<?php echo $this->auth_model->generate_hash('pass12345');?>">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">First Name</label>
                                            <input name="firstname" id="firstname" placeholder="Enter First Name" type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Last Name</label>
                                            <input name="lastname" id="lastname" placeholder="Enter Last Name" type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Email</label>
                                            <input name="email" id="lastname" placeholder="Enter Email" type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="department" class="">Role</label>
                                            <select  name="role" id="role" class="form-control" required>
                                                <option value="">--choose here</option>
                                                <option value="admin">Admin</option>
                                                <option value="accountant">Accountant</option>
                                                <option value="salesperson">Salesperson</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" hidden>
                                        <div class="position-relative form-group">
                                            <label for="department" class="">Department</label>
                                            <select  name="" id="department" class="form-control">
                                                <option>--choose here</option>
                                                <option value="development">Development</option>
                                                <option value="accounting">Accounting</option>
                                                <option value="hrm">HRM</option>
                                                <option value="sales">Sales</option>
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
    </div>