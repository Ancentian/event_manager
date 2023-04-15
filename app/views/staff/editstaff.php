<div class="app-main__outer">
    <div class="app-main__inner">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="padding-top: 20px;">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">STAFF DETAILS</h5>
                        <hr>
                        <form class="" method="post" action="<?php echo base_url(); ?>staff/edit/<?php echo $id; ?>">
                            <div class="row">
                                <div class="position-relative row form-group col-sm-6"><label for="exampleEmail" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8"><input name="name" placeholder=""
                                                                 value="<?php echo $staff['name']; ?>" type="text"
                                                                 class="form-control" required></div>
                                </div>
                                <div class="position-relative row form-group col-sm-6"><label for="exampleEmail"  class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8"><input name="email" placeholder=""
                                                                 value="<?php echo $staff['email']; ?>" type="text"
                                                                 class="form-control" required></div>
                                </div>

                                <div class="position-relative row form-group col-sm-6"><label for="exampleEmail" class="col-sm-4 col-form-label">Phone</label>
                                    <div class="col-sm-8"><input name="phone" placeholder=""
                                                                 value="<?php echo $staff['phone']; ?>" type="text"
                                                                 class="form-control" required></div>
                                </div>

                                <div class="position-relative row form-group col-sm-6"><label for="exampleEmail"  class="col-sm-4 col-form-label">Title</label>
                                    <div class="col-sm-8"><input name="title" placeholder=""
                                                                 value="<?php echo $staff['title']; ?>" type="text"
                                                                 class="form-control" required></div>
                                </div>
                                <div class="position-relative row form-group col-sm-6">
                                    <label for="exampleEmail" class="col-sm-4 col-form-label">Department</label>
                                    <div class="col-sm-8">
                                        <select class="select form-control" name="department" class="form-control" required>
                                            <option value="">--Select</option>
                                            <?php foreach ($dpts as $dpt) { ?>
                                                <option value="<?php echo $dpt['id']; ?>" <?php if ($staff['department'] == $dpt['id']) {
                                                    echo "selected";
                                                } ?>><?php echo $dpt['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="position-relative row form-group col-sm-6">
                                    <label for="exampleEmail" class="col-sm-4 col-form-label">Role</label>
                                    <div class="col-sm-8">
                                        <select class="select form-control" name="role" class="form-control" required>
                                            <option value="">--Select</option>
                                            <option value="admin" <?php if($staff['role']=='admin'){echo "selected"; }?> >Admin</option>
                                            <option value="receptionist"<?php if($staff['role']=='receptionis'){echo "selected"; }?>>Receptionist</option>
                                            <option value="pharmacist"<?php if($staff['role']=='pharmacist'){echo "selected"; }?>>Pharmacist</option>
                                            <option value="finance"<?php if($staff['role']=='finance'){echo "selected"; }?>>Finance</option>
                                            <option value="doctor"<?php if($staff['role']=='doctor'){echo "selected"; }?>>Doctor</option>
                                            <option value="nurse"<?php if($staff['role']=='nurse'){echo "selected"; }?>>Nurse</option>
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