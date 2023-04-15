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
                                                    <input type="text" class="form-control" value="<?php echo $key['items_returned']?>" name="items_returned[]" required>
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
                            <!-- Payment Details -->
                        <div class="card-body"><h5 class="card-title">PAYMENT DETAILS</h5>
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
                                        <td><?php if ($one['mode'] == 'mpesa' || $one['mode'] == 'mpesa') {
                                            echo $one['transaction_no'];
                                        } else { ?>
                                            --
                                        <?php } ?>
                                    </td>
                                    <td><?php if ($one['mode'] == 'mpesa'  || $one['mode'] == 'mpesa') {
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
     <!-- Add Payment -->
     <div class="card-body">
        <div class="row">
            <div class="position-relative row form-group col-sm-12"><label for="exampleEmail"                                                                                               class="col-sm-2 col-form-label"><b>Total
            Billed: </b></label>
            <label for="exampleEmail" class="col-sm-2 col-form-label">
                <span class="badge badge-info">Ksh. <?php echo $requests['total_billed']; ?></span>
            </label>
                <label for="exampleEmail" class="col-sm-2 col-form-label">
                    <b>Total Paid: </b>
            </label>
                <label for="exampleEmail" class="col-sm-2 col-form-label">
                    <span class="badge badge-success">Ksh. <?php echo $totpaid; ?></span>
                </label>
                    
                        <label for="exampleEmail" class="col-sm-2 col-form-label">
                            <b>Total Due: </b>
                        </label>
                        <label for="exampleEmail" class="col-sm-2 col-form-label">
                            <span class="badge badge-danger">Ksh. <?php echo $requests['total_billed'] - $totpaid  ?></span></label>
                        </div>
                    </div>
                    <div class="row alert alert-success" >
                        <a href="<?php echo base_url(); ?>requests/i_print<?php echo '/'.$requests['id']; ?>"
                            target="popup"
                            class="btn btn-warning"
                            onclick="window.open('<?php echo base_url(); ?>requests/i_print<?php echo '/'.$requests['id']; ?>','popup','width=600,height=600'); return false;"
                            >PRINT INVOICE</a>
                        </div>
                        <hr>
                        <?php if($requests['total_billed'] > $totpaid) {?>
                        <div class="col-sm-12">
                            <div class="row alert alert-info">Add New Payment</div>
                            <form class="" method="post" action="<?php echo base_url(); ?>requests/addPayment">
                                <div class="list_wrapper">  
                                    <div class="row">
                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Mode</label>
                                                <select class="select form-control" id="pmt-mode" required name="pmnt_mode[]">
                                                    <option value="">--Choose</option>
                                                    <option value="mpesa">Mpesa</option>
                                                    <option value="cash">Cash</option>
                                                    <!-- <option value="paybill">Paybill</option> -->
                                                </select>
                                                <input type="hidden" name="request_id" value="<?php echo $requests['id'];?>" required>  
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Amount</label>
                                                <input name="amount_paid[]" id="amount" type="number" placeholder="Amount" class="form-control"/>  
                                            </div>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1">
                                            <br>
                                            <button class="btn btn-primary mt-2 list_add_button" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="position-relative row form-group col-sm-12" id="mpesa-pmt">
                                        <div class="col-sm-6">
                                            <input name="phone_no" id="exampleEmail" placeholder="Phone no"
                                            type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <input name="transaction_id" placeholder="Transaction ID" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group col-sm-12" id="insurance-pmt">
                                        <div class="col-sm-4">
                                            <input name="insurance_company" id="exampleEmail" placeholder="Company"
                                            type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="card_no" id="exampleEmail" placeholder="Card No"
                                            type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="confirmation_code" id="exampleEmail" placeholder="Code" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <input type="submit" value="ADD PAYMENT" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    <?php }?>
                    </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()

    {
var x = 0; //Initial field counter
var list_maxField = 20; //Input fields increment limitation

//Once add button is clicked
$('.list_add_button').click(function()
{
//Check maximum number of input fields
if(x < list_maxField){ 
//x++; //Increment field counter
var list_fieldHTML = '<div class="row"><div class="col-xs-5 col-sm-5 col-md-5"><div class="form-group"><select class="select form-control" class="form-control" id="pmt-mode" required name="pmnt_mode[]"><option value="">--Choose</option><option value="mpesa">Mpesa</option><option value="cash">Cash</option></select><input type="hidden" name="ticket_id" value="<?php echo $ticket_id;?>" required></div></div><div class="col-xs-5 col-sm-5 col-md-5"><div class="form-group"><input name="amount_paid[]" id="amount" type="number" placeholder="Amount" class="form-control"/></div></div><div class="col-xs-1 col-sm-7 col-md-1 mt-2"><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div></div>'; 
//New input field html 
$('.list_wrapper').append(list_fieldHTML); //Add field html
}
});

//Once remove button is clicked
$('.list_wrapper').on('click', '.list_remove_button', function()
{
$(this).closest('div.row').remove(); //Remove field html
x--; //Decrement field counter
});
});

    $('#insurance-pmt').hide();
    $('#mpesa-pmt').hide();

    $('#pmt-mode').on('change', function () {
        var activity = this.value;
// alert(activity);
switch (activity) {
    case 'mpesa' :
    $('#insurance-pmt').hide();
    $('#mpesa-pmt').show();
    break;
    case 'paybill' :
    $('#insurance-pmt').hide();
    $('#mpesa-pmt').show();
    break;
    case 'insurance' :
    $('#insurance-pmt').show();
    $('#mpesa-pmt').hide();
    break;
    default :
    $('#insurance-pmt').hide();
    $('#mpesa-pmt').hide();
}

});
</script>


