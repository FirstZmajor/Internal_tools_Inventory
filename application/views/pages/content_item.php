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
                <h4 class="modal-title">Hardware detail Item ID <?php echo $obj_MA->MA_ID; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <blockquote class="blockquote mb-0">
                    <strong>Hardware Detail</strong>
                    <div class="container">
                        <div class="row font-detail">
                            <div class="row col-6">
                                <div class="col">Asset No:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Asset_No; ?></span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Serial No: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Serial_No; ?></span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Device Type: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Device_Type; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">HDD:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->HDD; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Brand:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Brand; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">OS: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->OS; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Model:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Model; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Memory:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Memory; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Machine Type: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Machine_Type; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Asset Tag:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Asset_Tag; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Part No.:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Part_No; ?><span></div>
                            </div>
                            <div class="row col-12">
                                <div class="col">Note: </div>
                                <div class="col-10"><span class="font-col"><?php echo $obj_MA->Hardware_Note; ?><span></div>
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
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->MA_Type; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">MA PO No.: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->MA_PO_No; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Start Date: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Start_Date; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">End Date:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Expire_Date; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">MA Contract No.: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->MA_Contract_No; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Vendor: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Vendor; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">PIC: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->PIC; ?><span></div>
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
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Location; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Rack/U: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Rack; ?><span></div>
                            </div>
                            <div class="row col-12">
                                <div class="col">Customer:</div>
                                <div class="col-10"><span class="font-col">xxxxxxxxx<span></div>
                            </div>
                            <div class="row col-12">
                                <div class="col">Note:</div>
                                <div class="col-10"><span class="font-col"><?php echo $obj_MA->Location_Note; ?><span></div>
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
                                <div class="col">Service Name:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Service_Name; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Project Code: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Project_Code; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Purchased:</div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Project_Code; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">PO No.: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->PO_No; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Last Update: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Last_update; ?><span></div>
                            </div>
                            <div class="row col-6">
                                <div class="col">Update by: </div>
                                <div class="col-8"><span class="font-col"><?php echo $obj_MA->Updated_By; ?><span></div>
                            </div>
                            <div class="row col-12">
                                <div class="col">Remark: </div>
                                <div class="col-10"><span class="font-col"><?php echo $obj_MA->Remark; ?><span></div>
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