<!DOCTYPE html>
<html lang="en">
    <?php echo link_tag('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'); ?>
    <?php echo link_tag('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.standalone.css'); ?>
<style>
    .row .col-12{
        margin-bottom: 5px;
    }
</style>
<body>
    <?php echo form_open_multipart(''); ?>
    <!-- partial -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Edit Item ID : <?php echo $obj_MA['detail_ma']->MA_id; ?></h5>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Asset No</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->Asset_No; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">Serial No</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->Serial_No; ?>">
                        </div>
                    </div>
                    
                </div>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Device Type</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->Hardware_Type; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">HDD</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->HDD; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Brand</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->name; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">OS</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->OS; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Model</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->Model; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">Memory</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->Memory; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Machine Type</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->Machine_Type; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">Asset Tag</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->Asset_Tag; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-12">
                        <label for="example-url-input" class="col-2 col-form-label">Note</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->Hardware_Note; ?>"  >
                        </div>
                    </div>
                </div>
                <hr>

                <h5 class="card-title mb-4">MA Detail</h5>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">MA Type</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->MA_Type; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">PO No.</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->PO_No ; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Start Date</label>
                        <div class="col-12">
                            <input class="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo $obj_MA['detail_ma']->Start_Date ; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">End Date</label>
                        <div class="col-12">
                            <input class="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo $obj_MA['detail_ma']->Expire_Date ; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Contract No.</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->Contract_No ; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">Vendor</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->Vendor ; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-12">
                        <label for="example-url-input" class="col-2 col-form-label">PIC</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_hardware']->PIC ; ?>">
                        </div>
                    </div>
                </div>
                <hr>
                
                <h5 class="card-title mb-4">Location</h5>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Location</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->Location ; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">Rack/U</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->Rack ; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-12">
                        <label for="example-url-input" class="col-2 col-form-label">Note</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->Location_Note ; ?>"  >
                        </div>
                    </div>
                </div>
                <hr>

                <h5 class="card-title mb-4">Other Detail</h5>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Project Code</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->Project_Code ; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-6">
                        <label class="col-4 col-form-label">Purchased</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->Purchased_Date ; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-4 col-form-label">PO No.</label>
                        <div class="col-12">
                            <input class="form-control" type="text" value="<?php echo $obj_MA['detail_ma']->PO_No ; ?>">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-12">
                        <label class="col-2 col-form-label">Remark</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <span style="color: #cd7777;"><? echo form_error('Other_Remark'); ?></span>
                            <input class="form-control" type="text" name="Other_Remark" value="<?php echo set_value('Other_Remark',$obj_MA['detail_hardware']->Remark); ?>"  >
                        </div>
                    </div>
                </div>
        
            </div>
            
            <button id="submit_edit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <? echo form_close(); ?>

</body>

</html>

<script src="<?=base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js');?>"></script>
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $("#submit_edit").click(function(argument) 
        {
            $.post("<?php echo site_url('Site/edit_content');?>"
                , [  { name: "Other_Remark", value: $("input[name='Other_Remark']").val() }
                    , { name: "csrf_form", value: $("input[name='csrf_form']").val() }
                ]
                ,function(data) 
                {
                    $("#modal_edit_comp .iziModal-content").html(data);
                        comp_submit(modal);
                });
        });


    });
</script>