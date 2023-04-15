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
                        <div class="card-body"><h5 class="card-title">Product Details</h5>
                            <hr>
                            <form class="" id="addProd" action="<?php echo base_url(); ?>employee/storeMechanic" method="post" enctype="multipart/form-data" >
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Logo Name</label>
                                            <input name="logoName" value="<?php echo $production['logoName'] ?>" type="text" class="form-control " required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">Quantity</label>
                                            <input type="number" class="form-control qty" value="<?php echo $production['quantity']?>" name="quantity" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">Unit Price</label>
                                            <input type="number" class="form-control unit_price" value="<?php echo $production['unit_price'] ?>" name="unit_price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Amount</label>
                                            <input type="" class="form-control total" value="<?php echo $production['total_price']?>" name="total_price" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Mode of Payment</label>
                                            <select class="form-control" name="mode_of_payment" required>
                                                <option value="cash"<?php if($employee['mode_of_payment'] == 'cash'){echo "selected"; }?>>Cash</option>
                                                <option value="paybill"<?php if($employee['mode_of_payment'] == 'paybill'){echo "selected"; }?>>Paybill</option>
                                                
                                            </select>
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
    <script type="text/javascript">
        $("#addProd tbody").on("input", ".unit_price", function () {
            var unit_price = parseFloat($(this).val());
            var qty = parseFloat($(this).closest("tr").find(".qty").val());
            var total = $(this).closest("tr").find(".total");
            total.val(unit_price * qty);
        //calc_total();
    });
        $("#addProd div").on("input", ".qty", function () {
            var qty = parseFloat($(this).val());
            var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
            var total = $(this).closest("tr").find(".total");
            total.val(unit_price * qty);
        //calc_total();
    });
</script>
