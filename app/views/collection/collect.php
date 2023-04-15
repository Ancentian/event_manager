<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>Production
                        <div class="page-title-subheading">Edit Production
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <?php if ($this->session->flashdata('error-msg')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error-msg'); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('success-msg')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success-msg'); ?>
            </div>
        <?php } ?>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="main-card col-md-10 mb-3 card ">
                        <div class="card-body"><h5 class="card-title">Product Details</h5>
                            <hr>
                            <form class="" id="addProd" action="<?php echo base_url(); ?>" method="post" enctype="multipart/form-data" >
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Product Name</label>
                                            <input name="" value="<?php echo $product['productName'] ?>" type="text" class="form-control " readonly required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Logo Name</label>
                                            <input name="logoName" value="<?php echo $product['logoName'] ?>" type="text" class="form-control " readonly required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">Quantity</label>
                                            <input type="number" class="form-control qty" value="<?php echo $product['quantity']?>" name="quantity" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">Unit Price</label>
                                            <input type="number" class="form-control unit_price" value="<?php echo $product['unit_price'] ?>" name="unit_price" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Amount</label>
                                            <input type="" class="form-control total" value="<?php echo $product['total_price']?>" name="total_price" readonly required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="mt-2 btn btn-primary" hidden>Submit</button>
                            </form>
                        </div>
                        <!-- Payment Details -->
                        <div class="card-body"><h5 class="card-title">1) COLLECTION DETAILS</h5>
                            <hr>
                            <form class="" id="addProd" action="<?php echo base_url('collection/mark_collection'); ?>" method="post" enctype="multipart/form-data" >
                                <div class="form-row">
                                    <input name="production_id" value="<?php echo $product['id'] ?>" type="text" class="form-control " hidden required="">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Collected By</label>
                                            <input name="collected_by" value="" type="text" class="form-control "required="">
                                        </div>
                                    </div>
                                    </div>
                                    <div>
                                        <div class="col-md-6">
                                        <div class="position-relative form-check">
                                            <input name="status" id="exampleCheck" value="1" type="checkbox" class="form-check-input" required>
                                            <label for="exampleCheck" class="form-check-label">Check to Mark Collection</label>
                                        </div>
                                    </div>
                                    </div>
                                    
                                
                                
                                <button type="submit" class="mt-2 float-right btn btn-primary" >Submit</button>
                            </form>
                            
                        </div>
                        <!-- End of Payment Details -->
                        <!-- Add Payment -->
                        <div class="card-body" hidden>

                            <!-- <hr> -->
                            <div class="col-sm-12">
                                <div class="row alert alert-info">Add New Payment</div>
                                <form class="" method="post" action="<?php echo base_url(); ?>collection/addPayment">
                                    <div class="list_wrapper">  
                                        <div class="row">
                                            <div class="col-xs-5 col-sm-5 col-md-5">
                                                <div class="form-group">
                                                    <label for="examplePassword11" class="">Mode</label>
                                                    <select class="select form-control" id="pmt-mode" required name="pmnt_mode[]">
                                                        <option value="">--Choose</option>
                                                        <!-- <option value="mpesa">Mpesa</option> -->
                                                        <option value="cash">Cash</option>
                                                        <option value="mpesa">Paybill</option>
                                                    </select>
                                                    <input type="hidden" name="production_id" value="<?php echo $product['id'];?>" required>  
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
var list_fieldHTML = '<div class="row"><div class="col-xs-5 col-sm-5 col-md-5"><div class="form-group"><select class="select form-control" class="form-control" id="pmt-mode" required name="pmnt_mode[]"><option value="">--Choose</option><option value="cash">Cash</option><option value="paybill">Paybill</option></select><input type="hidden" name="ticket_id" value="<?php echo $ticket_id;?>" required></div></div><div class="col-xs-5 col-sm-5 col-md-5"><div class="form-group"><input name="amount_paid[]" id="amount" type="number" placeholder="Amount" class="form-control"/></div></div><div class="col-xs-1 col-sm-7 col-md-1 mt-2"><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div></div>'; 
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
