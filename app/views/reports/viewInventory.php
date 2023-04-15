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
                    <div>Returns
                        <div class="page-title-subheading">Record Returns
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
                            <h5 class="card-title">Return Details</h5>
                            <!--   <hr> -->
                            <form class="" action="<?php echo base_url('inventory/store_itemsReturned'); ?>" method="post" enctype="multipart/form-data" >
                                <input type="text" name="request_id" class="form-control" value="<?php echo $requests['id']?>" hidden>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Customer</label>
                                            <select class="form-control" name="customerID" required readonly>
                                                <option value="<?php echo $requests['customerID'] ?>"<?php if($requests['customerID'] == $requests['custID']){echo "selected"; }?>><?php echo $requests['customerName']?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Event Date</label>
                                            <input name="returned_on" type="date" value="<?php echo $requests['eventDate']?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Location</label>
                                            <input name="location" id="lname" value="<?php echo $requests['location']?>"  type="text" class="form-control"  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Return Date</label>
                                            <input name="returned_on" type="date" value="<?php echo $requests['returned_on']?>" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>    
                                <hr>
                                <table class="mb-0 table table-hover" id="addProd">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Item</th>
                                            <th class="text-center">Items Collected</th>
                                            <th class="text-center">Items Returned</th>
                                            <th class="text-center">Returned On</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($items as $key) {?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td hidden>
                                                    <input type="text" class="form-control"value="<?php echo $key['invID']?>" name="item_id[]" >
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"value="<?php echo $key['itemName']?>" name="" readonly>
                                                </td>      
                                                <td>
                                                    <input type="text" class="form-control" value="<?php echo $key['items_collected']?>" name="items_collected[]" readonly>
                                                </td>  
                                                <td>
                                                    <input type="text" style="<?php if($key['items_collected'] > $key['items_returned'] ){?>background-color: red;<?php } ?>" class="form-control" value="<?php echo $key['items_returned']?>" name="items_returned[]" required>
                                                </td> 
                                                <td>
                                                    <input type="date" class="form-control" value="<?php echo $key['returned_on']?>" name="items_returned[]" required>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="status[]" required>
                                                        <option value="good"<?php if($key['status'] == 'good'){echo "selected"; }?>>Good</option>
                                                        <option value="broken"<?php if($key['status'] == 'broken'){echo "selected"; }?>>Broken</option>
                                                    </select>
                                                </td>          

                                            </tr>
                                            <?php $i++; }?>

                                        </tbody>
                                    </table>
                        
                                    <button type="submit" class="mt-2 float-right btn btn-primary" hidden>Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

