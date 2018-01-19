<!DOCTYPE html>
<html lang="en">
<body>
    <!-- partial -->
    <div class="col-lg-12">

    <div class="modal-container"></div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Hardware MA Lists</h5>
                <div class="table-responsive">
                    <table class="table center-aligned-table">
                    <thead>
                        <tr class="text-primary">
                        <th>No</th>
                        <th>Model</th>
                        <th>Serial Number</th>
                        <th>Asset No.</th>
                        <th>HW-Code</th>
                        <th>Warranty Expire</th>
                        <th>Check by</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>1</td>
                            <td>Cisco 1721</td>
                            <td>FHK093211RB</td>
                            <td>6652</td>
                            <td>-</td>
                            <td class="text-center"><label class="badge badge-success">9/30/2013</label></td>
                            <td>Pong Ju</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-primary btn-sm view-item" data-id="1">View</button>
                                <a href="#" class="btn btn-primary btn-sm">Manage</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td>2</td>
                            <td>IBM x346</td>
                            <td>FHK093211RB</td>
                            <td>6652</td>
                            <td>-</td>
                            <td class="text-center"><label class="badge badge-success">9/30/2013</label></td>
                            <td>Pong Ju</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-primary btn-sm view-item" data-id="2">View</button>
                                <a href="#" class="btn btn-primary btn-sm">Manage</a>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

    
	<script src="<?php echo base_url('assets/themes/node_modules/jquery/dist/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/themes/node_modules/popper.js/dist/umd/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/themes/node_modules/bootstrap/dist/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/themes/node_modules/chart.js/dist/Chart.min.js');?>"></script>
    <script src="<?php echo base_url('assets/themes/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/themes/js/off-canvas.js');?>"></script>
    <script src="<?php echo base_url('assets/themes/js/hoverable-collapse.js');?>"></script>
    <script src="<?php echo base_url('assets/themes/js/misc.js');?>"></script>
    <script src="<?php echo base_url('assets/themes/js/chart.js');?>"></script>
    <script src="<?php echo base_url('assets/themes/js/maps.js');?>"></script>

    <script>
        $(document).ready(function(){
            // var url = "<?php echo site_url('Site/view_content');?>";
            // jQuery('#modellink').click(function(e) {
            //     $('.modal-container').load(url,function(result)
            //     {
            //         $('#myModal').modal({
            //             show:true
            //         });
            //     });
            // });
            $(".view-item").click(function(){
                console.log($(this).data('id'));
                var item_id = $(this).data('id');
                $.ajax({
                    url: "<?php echo site_url('Site/view_content');?>/"+item_id,
                    success: function(result){
                        $(".modal-container").html(result);
                        $('#myModal').modal({
                            show:true
                        });
                }});
            });
            
        });
    </script>