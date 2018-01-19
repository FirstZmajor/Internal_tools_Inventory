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
                                <a href="<?php echo site_url('Site/edit_content/1'); ?>" class="btn btn-primary btn-sm">Manage</a>
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
                                <a href="<?php echo site_url('Site/edit_content/2'); ?>" class="btn btn-primary btn-sm">Manage</a>
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
<script>
    $(document).ready(function(){
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