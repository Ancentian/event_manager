<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-piggy text-success">
                        </i>
                    </div>
                    <div>Production
                        <div class="page-title-subheading">Add Event
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
                        <h5 class="card-title">Event Details</h5>
                      <!--   <hr> -->
                        <form class="" action="<?php echo base_url('inventory/storeItem'); ?>" method="post" enctype="multipart/form-data" >
                            <table class="mb-0 table table-hover" id="addProd">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Item Name</th>
                                            <th>
                                                <a href="#" class="btn btn-primary addRow">+</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="itemName[]" required>
                                            </td>
                                            <td >
                                                <a href="#" class="btn btn-danger remove">-</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <button type="submit" class="mt-2 float-right btn btn-primary">Submit</button>
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
        '<td >'+
        '<input type="text" class="form-control" name="itemName[]" required>'+
        '</td>'+
        '<td >'+
        '<a href="#" class="btn btn-danger remove">-</a>'+
        '</td>'+
        '</tr>';
        $('tbody').append(tr);
    };

    $('tbody').on('click', '.remove', function(){
        $(this).parent().parent().remove();
    });
    </script>
