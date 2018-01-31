<!DOCTYPE html>
<html lang="en">
<style>
    .dataTables_filter {
        float: right;
    }
</style>
<body>
    <!-- partial -->
    <div class="col-lg-12">

    <div class="modal-container"></div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Hardware MA Lists</h5>
                <div class="table-responsive">
                    <!-- <table class="table center-aligned-table"> -->
                    <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="text-primary">
                            <th class="text-center">Model</th>
                            <th class="text-center">Serial Number</th>
                            <th class="text-center">Asset No.</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Warranty Expire</th>
                            <th class="text-center">Update by</th>
                            <th class="text-center">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($HW_list as $key => $value) { ?>
                            <tr class="">
                                <td><?php echo $value['Model']; ?></td>
                                <td><?php echo $value['Serial_No']; ?></td>
                                <td><?php echo $value['Asset_No']; ?></td>
                                <td class="text-center"><?php echo $value['Location']; ?></td>
                                <td class="text-center"><?php echo $value['tag_expire']['value_status'] ; ?></td>
                                <td><?php echo $value['Updated_By']; ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm view-item" data-id="<?php echo $value['MA_ID']; ?>">View</button>
                                    <!-- <a href="<?php echo base_url('Site/edit_content/').$value['MA_ID']; ?>" class="btn btn-primary btn-sm">Update</a> -->
                                </td> 
                            </tr>
                        <?php }?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<script src="<?=base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?=base_url('assets/bower_components/datatables.net-responsive/js/dataTables.responsive.js');?>"></script>
<script src="<?=base_url('assets/bower_components/datatables.net-fixedcolumns/js/dataTables.fixedColumns.js');?>"></script>
	
<script>
    $(document).ready(function(){
        $('#example').DataTable({
          "paging": false,
          responsive: true,
          fixedColumns: true,
          dom:"<'row'<'col-sm-6 create-item'l><'col-sm-6'f>>"
        });
        
        var button_create = '<a href="<?php echo base_url('Site/create_content');?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create item</a>'; 
        // $('.create-item').append(button_create);

        $(".view-item").click(function(){
        console.log($(this).data('id'));
        var item_id = $(this).data('id');
        $.ajax({
            url: "<?php echo base_url('Site/view_content');?>/"+item_id,
            success: function(result){
            $(".modal-container").html(result);
            $('#myModal').modal({
                show:true
            });
        }});
        });
        
    });
</script>