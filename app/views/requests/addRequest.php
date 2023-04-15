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
                                                <option value=""> --Choose Here-- </option>
                                                <?php foreach($customers as $key) { ?>
                                                    <option value="<?php echo $key['id']?>"><?php echo $key['customerName']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Event Date</label>
                                            <input name="eventDate" type="date" id="lname" placeholder="Enter Last Name" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Location</label>
                                            <input name="location" id="lname" placeholder="Enter Location" type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Date of Return</label>
                                            <input name="date_of_return" type="date" id="lname" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>    
                                <hr>
                                <table class="mb-0 table table-hover" id="addProd">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Item</th>
                                            <th class="text-center">Number Collected</th>
                                            <th class="text-center">Amount Charged</th>
                                            <th class="text-center">
                                                <a href="#" class="btn btn-primary addRow">+</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="itemID[]" required>
                                                    <option value=""> --Choose Here-- </option>
                                                    <?php foreach($items as $key) { ?>
                                                        <option value="<?php echo $key['id']?>"><?php echo $key['itemName']?></option>
                                                    <?php }?>
                                                </select>
                                            </td>      
                                            <td>
                                                <input type="text" class="form-control" name="number_collected[]" >
                                            </td> 
                                            <td>
                                                <input type="number" class="form-control" name="amount[]" >
                                            </td>            
                                            <td class="text-center">
                                                <a href="#" class="btn btn-danger remove">-</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <label for="chkPassport">
                                    <input type="checkbox" name="check" value="1" id="chkPassport" />
                                    <b>Check to add Payment.</b>
                                </label>
                                <div id="dvPassport" style="display: none">
                                    <!-- Add Payment -->
                                    <div class="col-sm-12">
                                        <div class="row alert alert-info">Add New Payment</div>
                                        <!-- <form class="" method="post" action="<?php //echo base_url(); ?>requests/addPayment"> -->
                                            <div class="list_wrapper">  
                                                <div class="row">
                                                    <div class="col-xs-5 col-sm-5 col-md-5">
                                                        <div class="form-group">
                                                            <label for="examplePassword11" class="">Mode</label>
                                                            <select class="select form-control" id="pmt-mode"  name="pmnt_mode[]" >
                                                                <option value="">--Choose</option>
                                                                <option value="cash">Cash</option>
                                                                <option value="mpesa">Mpesa</option>
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
                                                <!-- <input type="submit" value="ADD PAYMENT" class="btn btn-success"> -->
                                            </div>
                                            <!-- </form> -->
                                        </div>
                                        <!-- End of Add Payment -->
                                    </div>

                                    <div class="col-md-8">
                                        <button type="submit" class="mt-2 float-right btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <script type="text/javascript">
            $('.addRow').on('click', function(){
              addRow();
          });

            function addRow(){
        //alert('test');
        var tr = '<tr>'+
        '<td>'+
        '<select class="form-control" name="itemID[]" required>'+
        '<option value=""> --Choose Here-- </option>'+
        '<?php foreach($items as $key) { ?>'+
        '<option value="<?php echo $key['id']?>"><?php echo $key['itemName']?></option>'+
        '<?php }?>'+
        '</select>'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" name="number_collected[]" >'+
        '</td>'+
        '<td>'+
        '<input type="number" class="form-control" name="amount[]">'+
        '</td>'+
        '<td style="text-align: center;"><a href="#" class="btn btn-danger remove">-</a></td>'+
        '</tr>';
        $('tbody').append(tr);
    };

    $('tbody').on('click', '.remove', function(){
        $(this).parent().parent().remove();
    });

    // Add Payment Script
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
var list_fieldHTML = '<div class="row"><div class="col-xs-5 col-sm-5 col-md-5"><div class="form-group"><select class="select form-control" class="form-control" id="pmt-mode" required name="pmnt_mode[]"><option value="">--Choose</option><option value="cash">Cash</option><option value="mpesa">Mpesa</option></select><input type="hidden" name="ticket_id" value="<?php echo $ticket_id;?>" required></div></div><div class="col-xs-5 col-sm-5 col-md-5"><div class="form-group"><input name="amount_paid[]" id="amount" type="number" placeholder="Amount" class="form-control"/></div></div><div class="col-xs-1 col-sm-7 col-md-1 mt-2"><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div></div>'; 
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

    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
                
                $("#pmt-mode").show().prop('required',true);
                $("#amount").show().prop('required',true);
            } else {
                $("#dvPassport").hide();
                //$("#AddPassport").show();
                $("#pmt-mode").hide().prop('required',false);
                $("#amount").hide().prop('required',false);
            }
        });
    });

    
</script>
