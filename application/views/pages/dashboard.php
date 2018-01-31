<!-- partial -->
    <h3 class="page-heading mb-4">Dashboard</h3>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card card-statistics">
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
                <p class="text-muted">
            <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> lower growth
                </p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card card-statistics">
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
                <p class="text-muted">
            <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales
                </p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card card-statistics">
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
                <p class="text-muted">
            <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                </p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card card-statistics">
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
                <p class="text-muted">
            <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                </p>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Hardware</h5>
                <div class="custom-legend-container w-75 mx-auto">
                <canvas id="sales-chart"></canvas>
                </div>
                <div id="sales-chart-legend" class="legend-right"></div>
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
                                        <?php echo ($value['Device_Type'] != '') ? $value['Device_Type'] : "Unknown"; ?>
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
