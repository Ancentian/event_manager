<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>Staff
                        <div class="page-title-subheading">Add New Mechanic
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="main-card col-md-10 mb-3 card ">
                        <div class="card-body"><h5 class="card-title">Mechanic Details</h5>
                            <hr>
                            <form class="" action="<?php echo base_url(); ?>employee/storeMechanic" method="post" enctype="multipart/form-data" >
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">First Name</label>
                                            <input name="firstname" id="firstname"  placeholder="Enter First Name" type="text" class="form-control " required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">Last Name</label>
                                            <input name="lastname" id="lastname" placeholder="Enter Last Name" type="text" class="form-control " required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">Phone No.</label>
                                            <input name="phone_no" id="phone_no" placeholder="Enter Phone Number" type="text" class="form-control " required="">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">ID/Passport No</label>
                                            <input name="id_number" id="id_number" placeholder="Enter ID/Passport No " type="text" class="form-control " required="">
                                        </div>
                                    </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Specification</label>
                                        <select name="specification[]" class="select form-control" placeholder="Specification" style="width: 100%;" multiple>
                                            <option value="">--Choose Here--</option>
                                            <option value="engine">Engine</option>
                                            <option value="painting">Painting</option>
                                            <option value="wiring">Wiring</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Mechanic Experience</label>
                                            <input name="experience" id="pay_per_day" placeholder="Mechanic Experience (Years)" type="number" class="form-control " required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" hidden>

                                    <div class="col-md-8">
                                        <div class="position-relative row form-group">
                                            <!-- <div class="col-sm-8"> -->
                                                <label for="exampleFile" class="col-sm-2 col-form-label">Car Image</label>
                                                <input name="file" id="file" type="file" class="form-control-file" >
                                                <small class="form-text text-muted">Please Upload your Car Image.</small>
                                                <!-- </div> -->
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
