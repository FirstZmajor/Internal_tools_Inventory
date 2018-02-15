<!-- partial -->
    <h3 class="page-heading mb-4">Dashboard</h3>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card card-statistics">
            <a href="<?php echo base_url('Site/main/Active');?>">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                        <h4 class="text-success">
                            <i class="fa fa-calendar-check-o highlight-icon" aria-hidden="true"></i>
                        </h4>
                        </div>
                        <div class="float-right">
                        <p class="card-text text-dark">Active</p>
                        <h4 class="bold-text"><?php echo $count['Active'];?></h4>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card card-statistics">
            <a href="<?php echo base_url('Site/main/Expire_Soon');?>">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                        <h4 class="text-warning">
                            <i class="fa fa-flag highlight-icon" aria-hidden="true"></i>
                        </h4>
                        </div>
                        <div class="float-right">
                        <p class="card-text text-dark">Expire soon</p>
                        <h4 class="bold-text"><?php echo $count['Expire_Soon'];?></h4>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card card-statistics">
            <a href="<?php echo base_url('Site/main/Expired');?>">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                        <h4 class="text-danger">
                            <i class="fa fa-exclamation-triangle highlight-icon" aria-hidden="true"></i>
                        </h4>
                        </div>
                        <div class="float-right">
                        <p class="card-text text-dark">Expired</p>
                        <h4 class="bold-text"><?php echo $count['Expired'];?></h4>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card card-statistics">
            <a href="<?php echo base_url('Site/main/Not_found');?>">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                        <h4 class="text-info">
                            <i class="fa fa-question-circle highlight-icon" aria-hidden="true"></i>
                        </h4>
                        </div>
                        <div class="float-right">
                        <p class="card-text text-dark">Unknown</p>
                        <h4 class="bold-text"><?php echo $count['unknown'];?></h4>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Hardware</h5>
                <div class="custom-legend-container w-75 mx-auto">
                <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Summary Hardware</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hardware Type</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($devices as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?php echo ($value['Hardware_Type'] != '') ? $value['Hardware_Type'] : "Unknown"; ?>
                                    </td>
                                    <td class="text-right"><?php echo $value['total']; ?></td> 
                                </tr>

                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Location Hardware</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($location as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?php echo ($value['Location'] != '') ? $value['Location'] : "Unknown"; ?>
                                    </td>
                                    <td class="text-right"><?php echo $value['total']; ?></td> 
                                </tr>

                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function select_MA_Status (state)
    {
      if (state=='UP')
      {
        result_state = 'hostUP';
      }
      else if (state=='DOWN')
      {
        result_state = 'hostDOWN';
      }
      else if (state=='UNREACHABLE')
      {
        result_state = 'hostUNREACHABLE';
      }
      else if (state=='PENDING')
      {
        result_state = 'hostPENDING';
      }
      table
          .search( result_state )
          .draw();
    }

    $(document).ready(function(){ 
  
        $.ajax({
            url: "/Site/chart_expire",
            dataType: 'json',
        })
        .done(function( json ) {
            // alert(json);
            console.log(json); 
            var result = json;          
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: result.labels,
                    datasets: [{
                        data: result.datasets.data,
                        backgroundColor: result.datasets.backgroundColor,
                    }]
                }
            });
        });


    });



</script>
