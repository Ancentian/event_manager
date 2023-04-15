
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>Update Profile
                        <div class="page-title-subheading">Edit Personal Data
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
                    <div class="card-body float:center"><h5 class="card-title">Edit <i class="fa fa-edit"></i></h5>
                        <hr>
                        <form class="" action="<?php echo base_url(); ?>employee/updateprofile/<?php echo $this->session->userdata('user_aob')->id; ?>" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail11" class="">First Name</label>
                                        <input name="firstname" id="firstname" value="<?php echo $this->session->userdata('user_aob')->firstname; ?>" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Last Name</label>
                                        <input name="lastname" id="lastname" value="<?php echo $this->session->userdata('user_aob')->lastname; ?>" type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Email</label>
                                        <input name="email" id="email"  type="email" class="form-control" value="<?php echo $this->session->userdata('user_aob')->email; ?>"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Phone Number</label>
                                            <input name="phonenumber" id="phonenumber" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->phonenumber; ?>">
                                        </div>
                                    </div>

                                </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">ID Number</label>
                                            <input name="idnumber" id="idnumber"  type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->idnumber; ?>">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">NHIF Number</label>
                                                <input name="nhifnumber" id="nhifnumber" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->nhifnumber; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="examplePassword11" class="">NSSF Number</label>
                                                <input name="nssfnumber" id="nssfnumber" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->nssfnumber; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="exampleAddress" class="">Gender</label>
                                                <input name="gender" id="gender" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->gender; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="exampleCity" class="">Marital Status</label>
                                                <input name="marital_status" id="marital_status" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->marital_status; ?>" readonly></div>
                                            </div>

                                            <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="exampleCity" class="">Date of Birth</label>
                                                <input name="dob" id="dob" type="date" class="form-control" value="<?php echo $this->session->userdata('user_aob')->dob; ?>" ></div>
                                            </div>

                                        </div>


                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <div class="position-relative form-group">
                                                <label for="exampleAddress" class="">Address</label>
                                                <input name="address" id="address" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->address; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="exampleCity" class="">City</label>
                                                <input name="city" id="city" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->city; ?>"></div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Qualifications</label>
                                                <textarea name="qualifications" id="qualifications" class="form-control"><?php echo $this->session->userdata('user_aob')->qualifications; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Work Experience</label>
                                                <textarea name="work_experience" id="work_experience" class="form-control"><?php echo $this->session->userdata('user_aob')->work_experience; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-row" hidden="">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="department" class="">Department</label>
                                                    <input type="text" name="department" class="form-control" value="<?php echo $this->session->userdata('user_aob')->department; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="department" class="">Role</label>
                                                    <input type="text" name="role" class="form-control" value="<?php echo $this->session->userdata('user_aob')->role; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="card-title">Medical Information</h5>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">Doctor's Name</label>
                                                    <input name="doctorname" id="doctorname" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->doctorname; ?>" ></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="examplePassword11" class="">Phone Number</label>
                                                        <input name="doc_phone_no" id="doc_phone_no" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->doc_phone_no; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail11" class="">Blood Type</label>
                                                        <input name="bloodtype" id="bloodtype" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->bloodtype; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative form-group">
                                                        <label for="examplePassword11" class="">Medical Conditions</label>
                                                        <input name="medical_condition" id="medical_condition"  type="textarea" class="form-control" value="<?php echo $this->session->userdata('user_aob')->medical_condition; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Allergies</label>
                                                        <textarea name="allergies" id="allergies" class="form-control" ><?php echo $this->session->userdata('user_aob')->allergies; ?></textarea></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="examplePassword11" class="">Current Medications</label>
                                                            <textarea name="current_medication" id="current_medication" class="form-control" ><?php echo $this->session->userdata('user_aob')->current_medication; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h5 class="card-title">Emergency Information</h5>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Contacts Name</label>
                                                            <input name="kins_name" id="kins_name" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->kins_name; ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="department" class="">Relationship</label>
                                                            <input type="text" name="kins_relationship" class="form-control" value="<?php echo $this->session->userdata('user_aob')->kins_relationship; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleEmail11" class="">Address/Phone Number</label>
                                                            <input name="kins_phone_no" id="kins_phone_no"  type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->kins_phone_no; ?>">
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

