<style>
    .font-detail {
        font-size: 14px;
    }
    .font-col {
        color: #0050ff;
    }

</style>
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hardware detail Item ID <?php echo $obj_MA['detail_ma']->MA_id; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <blockquote class="blockquote mb-0">
                    <strong>Hardware Detail</strong>
                    <div class="container">
                        <div class="row font-detail">
                            <div class="row col-6">
                                <div class="col">Asset No:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->Asset_No; ?></span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Serial No: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->Serial_No; ?></span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Device Type: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->Hardware_Type; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">HDD:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->HDD; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Brand:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->name; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">OS: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->OS; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Model:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->Model; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Memory:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->Memory; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Machine Type: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->Machine_Type; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Asset Tag:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_hardware']->Asset_Tag; ?><span></div>
                            </div>
                            <div class="row col-12">
                                <div class="col">Note: </div>
                                <div class="col-10"><span class="font-col"><?php echo $obj_MA['detail_hardware']->Hardware_Note; ?><span></div>
                            </div>
                        </div>
                    </div>
                </blockquote>
            <hr>
                <blockquote class="blockquote mb-0">
                    <strong>MA detail</strong>
                    <div class="container">
                        <div class="row font-detail">
                            <div class="row col-6">
                                <div class="col">MA Type:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA['detail_ma']->MA_Type; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">MA PO No.: </div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->PO_No ; ?></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Start Date: </div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->Start_Date ; ?></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">End Date:</div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->Expire_Date ; ?></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Contract No.: </div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->Contract_No ; ?></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Vendor: </div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->Vendor ; ?></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">PIC: </div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_hardware']->PIC ; ?></div>
                            </div>
                        </div>
                    </div>
                </blockquote>
            <hr>
                <blockquote class="blockquote mb-0">
                    <strong>Location</strong>
                    <div class="container">
                        <div class="row font-detail">
                            <div class="row col-6">
                                <div class="col">Location:</div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->Location ; ?></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Rack/U: </div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->Rack ; ?></div>
                            </div>
                            <div class="row col-12">
                                <div class="col">Note:</div>
                                <div class="col-10"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->Location_Note ; ?></div>
                            </div>
                        </div>
                    </div>
                </blockquote>
            <hr>
                <blockquote class="blockquote mb-0">
                    <strong>Other Detail</strong>
                    <div class="container">
                        <div class="row font-detail">
                            <div class="row col-6">
                                <div class="col">Project Code: </div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->Project_Code ; ?></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Purchased:</div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->Purchased_Date ; ?></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">PO No.: </div>
                                <div class="col-8"><span class="font-col"><span><?php echo $obj_MA['detail_ma']->PO_No ; ?></div>
                            </div>
                            <div class="row col-12">
                                <div class="col">Remark: </div>
                                <div class="col-10"><span class="font-col"><span><?php echo $obj_MA['detail_hardware']->Remark ; ?></div>
                            </div>
                        </div>
                    </div>
                </blockquote>
            <hr>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>