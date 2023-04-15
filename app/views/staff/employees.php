<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>All Employees
                        <div class="page-title-subheading">View All Employees
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
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Staff List</div>
                    <div class="card-body">
                        <!--                        <h5 class="card-title"></h5>-->
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Contact</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Department</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $id = 0; foreach ($employees as $employee) { $id++ ?>
                            <tr>
                                <th scope="row"><?php echo $id; ?></th>
                                <td class="text-center"><?php echo $employee['firstname']; ?> <?php echo $employee['lastname']; ?></td>
                                <td class="text-center"><?php echo $employee['phonenumber']; ?></td>
                                <td class="text-center"><?php echo $employee['role']; ?></td>
                                <td class="text-center"><?php echo $employee['department']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url(); ?>employee/showstaff/<?php echo $employee['id']; ?>" title="View" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="<?php echo base_url(); ?>employee/editstaff/<?php echo $employee['id']; ?>" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url(); ?>employee/deletestaff/<?php echo $employee['id']; ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
