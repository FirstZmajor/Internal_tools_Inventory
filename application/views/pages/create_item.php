<!DOCTYPE html>
<html lang="en">
    <?php echo link_tag('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'); ?>
    <?php echo link_tag('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.standalone.css'); ?>

<body>
    <!-- partial -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Edit Item ID : <?php echo $id; ?></h5>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Asset No</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Serial No</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Device Type</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">HDD</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Brand</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">OS</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Model</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Memory</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Machine Type</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Asset Tag</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Part No</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-12">
                        <label for="example-url-input" class="col-2 col-form-label">Note</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="url">
                        </div>
                    </div>
                </div>
                <hr>

                <h5 class="card-title mb-4">MA Detail ID: <?php echo $id; ?></h5>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">MA Type</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">MA PO No.</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Start Date</label>
                        <div class="col-8">
                            <input class="datepicker" data-date-format="mm/dd/yyyy">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">End Date</label>
                        <div class="col-8">
                            <input class="datepicker" data-date-format="mm/dd/yyyy">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">MA Contract No.</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Vendor</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-12">
                        <label for="example-url-input" class="col-2 col-form-label">IE PIC</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="url">
                        </div>
                    </div>
                </div>
                <hr>
                
                <h5 class="card-title mb-4">Location : <?php echo $id; ?></h5>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Location</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Rack/U</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Customer</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-12">
                        <label for="example-url-input" class="col-2 col-form-label">Note</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="url">
                        </div>
                    </div>
                </div>
                <hr>

                <h5 class="card-title mb-4">Other Detail : <?php echo $id; ?></h5>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Service Name</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Project Code</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Purchased</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">PO No.</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Last Update</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Update by</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-12">
                        <label for="example-url-input" class="col-2 col-form-label">Remark</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="url">
                        </div>
                    </div>
                </div>
        
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</body>

</html>

<script src="<?=base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js');?>"></script>
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy'
        });


    });
</script>