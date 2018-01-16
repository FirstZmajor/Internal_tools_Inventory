<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Web Manage IE's Inventory</title>
  <?php echo link_tag('assets/themes/css/style.css')?>
</head>

<body>
    <!-- partial -->
    <div class="col-lg-12">
        <div class="card">
            <!-- Large modal -->
            <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                ...
                </div>
            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Manage IE's Inventory</h5>
                <div class="table-responsive">
                    <table class="table center-aligned-table">
                    <thead>
                        <tr class="text-primary">
                        <th>No</th>
                        <th>Device</th>
                        <th>Model</th>
                        <th>Serial Number</th>
                        <th>Asset No.</th>
                        <th>HW-Code</th>
                        <th>Status</th>
                        <th>Check by</th>
                        <th>Action</th>
                        </tr>
                            </thead>
                            <tbody>
                        <tr class="">
                        <td>1</td>
                        <td>Router</td>
                        <td>Cisco 1721</td>
                        <td>FHK093211RB</td>
                        <td>6652</td>
                        <td>-</td>
                        <td><label class="badge badge-success">Available</label></td>
                        <td>Pong Ju</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-sm">View</button>
                            <a href="#" class="btn btn-primary btn-sm">Manage</a>
                        </td>
                        </tr>
                        <tr class="">
                        <td>2</td>
                        <td>Router</td>
                        <td>Cisco 1721</td>
                        <td>FHK093211RB</td>
                        <td>6652</td>
                        <td>-</td>
                        <td><label class="badge badge-success">Available</label></td>
                        <td>Pong Ju</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-sm">View</button>
                            <a href="#" class="btn btn-primary btn-sm">Manage</a>
                        </td>
                        </tr>
                        <tr class="">
                        <td>3</td>
                        <td>Router</td>
                        <td>Cisco 1721</td>
                        <td>FHK093211RB</td>
                        <td>6652</td>
                        <td>-</td>
                        <td><label class="badge badge-danger">Rejected</label></td>
                        <td>Pong Ju</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-sm">View</button>
                            <a href="#" class="btn btn-primary btn-sm">Manage</a>
                        </td>
                        </tr>
                        <tr class="">
                        <td>4</td>
                        <td>Router</td>
                        <td>Cisco 1721</td>
                        <td>FHK093211RB</td>
                        <td>6652</td>
                        <td>-</td>
                        <td><label class="badge badge-success">Available</label></td>
                        <td>Pong Ju</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-sm">View</button>
                            <a href="#" class="btn btn-primary btn-sm">Manage</a>
                        </td>
                        </tr>
                        <tr class="">
                        <td>5</td>
                        <td>Router</td>
                        <td>Cisco 1721</td>
                        <td>FHK093211RB</td>
                        <td>6652</td>
                        <td>-</td>
                        <td><label class="badge badge-danger">Rejected</label></td>
                        <td>Pong Ju</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-sm">View</button>
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
        $('#myModal').modal(options)
    
    </script>