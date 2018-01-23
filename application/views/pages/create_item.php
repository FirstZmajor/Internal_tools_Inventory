<!DOCTYPE html>
<html lang="en">
    <?php echo link_tag('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'); ?>
    <?php echo link_tag('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.standalone.css'); ?>
<body>
    <!-- partial -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Hardware Detail : <?php echo $id; ?></h5>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Asset No</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Device Type</label>
                        <div class="col-8">
                            <select class="form-control" >
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
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
                        <label for="example-text-input" class="col-4 col-form-label">Machine Type</label>
                        <div class="col-8">
                            <select class="form-control" >
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-12">
                        <label for="example-url-input" class="col-2 col-form-label">Detail</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="url">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Serial No</label>
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
                <hr>

                <h5 class="card-title mb-4">MA Detail</h5>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">MA Type</label>
                        <div class="col-8">
                            <select class="form-control" >
                                <option>MA_Service_Type</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
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
                    <div class="row col-12">
                        <label for="example-url-input" class="col-2 col-form-label">Vendor</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="url">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">PO No</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Contract No Date</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-12">
                        <label for="example-url-input" class="col-2 col-form-label">PIC</label>
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
                        <label for="example-text-input" class="col-4 col-form-label">Rack No</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-12">
                        <label for="example-url-input" class="col-2 col-form-label">Customer</label>
                        <div class="col-10" style="padding-left: 10px;">
                            <input class="form-control" type="url">
                        </div>
                    </div>
                </div>
                <hr>

                <h5 class="card-title mb-4">Other Detail : <?php echo $id; ?></h5>
                <div class="form-group row">
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Service</label>
                        <div class="col-8">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row col-6">
                        <label for="example-text-input" class="col-4 col-form-label">Project</label>
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
                        <label for="example-text-input" class="col-4 col-form-label">PO</label>
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