<?php //echo var_dump($items);die; ?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-piggy text-success">
                        </i>
                    </div>
                    <div>Requests
                        <div class="page-title-subheading">Add Request
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
                    <div class="main-card col-md-12 mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Request Details</h5>
                            <!--   <hr> -->
                            <form class="" action="<?php echo base_url('requests/store_eventRequest'); ?>" method="post" enctype="multipart/form-data" >
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Customer</label>
                                            <select class="form-control" name="customerID" required>
                                                    <option value="<?php echo $requests['customerID'] ?>"<?php if($requests['customerID'] == $requests['custID']){echo "selected"; }?>><?php echo $requests['customerName']?></option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Event Date</label>
                                            <input name="eventDate" type="date" value="<?php echo $requests['eventDate']?>" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Location</label>
                                            <input name="location" id="lname" value="<?php echo $requests['location']?>"  type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Return Date</label>
                                            <input name="eventDate" type="date" value="<?php echo $requests['date_of_return']?>" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>    
                                <hr>
                                <table class="mb-0 table table-hover" id="addProd">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Item</th>
                                            <th class="text-center">Number Collected</th>
                                            <!-- <th class="text-center">
                                                <a href="#" class="btn btn-primary addRow" hidden>+</a>
                                            </th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($items as $key) {?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                            <td>
                                                <input type="text" class="form-control"value="<?php echo $key['itemName']?>" name="number_collected" >
                                            </td>      
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo $key['number_collected']?>" name="number_collected" >
                                            </td>           
                                            <!-- <td class="text-center">
                                                <a href="#" class="btn btn-danger remove" hidden>-</a>
                                            </td> -->
                                        </tr>
                                        <?php $i++; }?>
                                        
                                    </tbody>
                                </table>
                               
                                <!-- Payment Details -->
                        <div class="card-body" hidden><h5 class="card-title">PAYMENT DETAILS</h5>
                            <hr>
                            <table class="mb-0 table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Amount</th>
                                        <th>Mode</th>
                                        <th>Transaction</th>
                                        <th>Phone No</th>
                                        <th>Paid At</th>
                                        <th>*</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; foreach ($payment as $one) { $totpaid += $one['amount_paid']; ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $one['amount_paid']; ?></td>
                                        <td><?php echo $one['pmnt_mode']; ?></td>
                                        <td><?php if ($one['mode'] == 'mpesa' || $one['mode'] == 'paybill') {
                                            echo $one['transaction_no'];
                                        } else { ?>
                                            --
                                        <?php } ?>
                                    </td>
                                    <td><?php if ($one['mode'] == 'mpesa'  || $one['mode'] == 'paybill') {
                                        echo $one['phone_no'];
                                    } else { ?>
                                        --
                                    <?php } ?>
                                </td>
                    <td><?php echo date('d/m/Y H:i', strtotime($one['created_at'])); ?> </td>
                    <td>
                        <?php if($this->session->userdata('user_aob')->role == 'developer'){?>
                            <a href="<?php echo base_url(); ?>payments/delete/<?php echo $one['id'].'/'.$one['production_id']; ?>"><i class="fa fa-fw icon-danger"></i></a><?php } ?>
                            &nbsp;
                            <a href="<?php echo base_url(); ?>collection/r_print/<?php echo $one['id'].'/'.$one['production_id']; ?>"
                             target="popup"
                             onclick="window.open('<?php echo base_url(); ?>collection/r_print/<?php echo $one['id'].'/'.$one['production_id']; ?>','popup','width=600,height=600'); return false;"
                             hidden><i class="fa fa-fw icon-success" aria-hidden="true" title="Print"></i></a>
                             <?php if ($this->session->userdata('user_aob')->role == 'admin' || $this->session->userdata('user_aob')->role == 'finance'){ ?>
                             <a href="<?php echo base_url(); ?>requests/deletePayment/<?php echo $one['id'].'/'.$requests['id']; ?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                         <?php }?>
                         </td>
                     </tr>
                     <?php $i++; } ?>
             </tbody>
         </table>
     </div>
     <!-- End of Payment Details -->
                                <button type="submit" hidden class="mt-2 float-right btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    