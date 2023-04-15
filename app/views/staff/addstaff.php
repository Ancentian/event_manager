<div class="app-main__outer">
    <div class="app-main__inner">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="padding-top: 20px;">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">STAFF DETAILS</h5>
                        <hr>
                        <form class="" method="post" action="<?php echo base_url(); ?>staff/add">
                            <div class="row">
                                <div class="col-sm-12 alert alert-danger">By default, the password is <b>pass12345</b>.
                                    The user is advised to change once they login in.
                                </div>
                                <div class="position-relative row form-group col-sm-6"><label for="exampleEmail" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8"><input name="name" id="exampleEmail" placeholder="" type="text" class="form-control" required></div>
                                </div>
                                <div class="position-relative row form-group col-sm-6"><label for="exampleEmail" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8"><input name="email" id="exampleEmail" placeholder="" type="text" class="form-control" required></div>
                                </div>

                                <div class="position-relative row form-group col-sm-6"><label for="exampleEmail" class="col-sm-4 col-form-label">Phone</label>
                                    <div class="col-sm-8"><input name="phone" id="exampleEmail" placeholder="" type="text" class="form-control" required></div>
                                </div>

                                <div class="position-relative row form-group col-sm-6"><label for="exampleEmail" class="col-sm-4 col-form-label">Title</label>
                                    <div class="col-sm-8"><input name="title" id="exampleEmail" placeholder="" type="text" class="form-control" required></div>
                                </div>
                                <div class="position-relative row form-group col-sm-6">
                                    <label for="exampleEmail" class="col-sm-4 col-form-label">Department</label>
                                    <div class="col-sm-8">
                                        <select class="select form-control" name="department" class="form-control" required>
                                            <option value="">--Select</option>
                                            <?php foreach ($dpts as $dpt) { ?>
                                                <option value="<?php echo $dpt['id']; ?>"><?php echo $dpt['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="position-relative row form-group col-sm-6">
                                    <label for="exampleEmail" class="col-sm-4 col-form-label">Role</label>
                                    <div class="col-sm-8">
                                        <select class="select form-control" name="role" class="form-control" required>
                                            <option value="">--Select</option>
                                            <option value="admin">Admin</option>
                                            <option value="receptionist">Receptionist</option>
                                            <option value="pharmacist">Pharmacist</option>
                                            <option value="finance">Finance</option>
                                            <option value="doctor">Doctor</option>
                                            <option value="nurse">Nurse</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="position-relative row form-check">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button class="btn btn-success">COMPLETE</button>

                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>