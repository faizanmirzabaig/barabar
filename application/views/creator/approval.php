<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <div class="card-body table-responsive">
            <ul class="nav nav-tabs">
                  
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#pending" role="tab" aria-selected="true">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Pending</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#approved" role="tab" aria-selected="false">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Approved</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#rejected" role="tab" aria-selected="false">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">Rejected</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane p-3 active" id="pending" role="tabpanel">
                <br>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Creator ID</th>
                            <th>Creator name</th>
                            <th>Status</th>
                            <th>Added Date and Time</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllCreator as $key => $all) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $all->id ?></td>
                            <td><?= $all->first_name ?></td>
                            
                            <td>
                            <select class="form-control" onchange="ChangeWithDrawalStatus(<?= $all->id ?>, this.value)">
                                <option value="0" <?= (($all->status == 0) ? 'selected' : '') ?>>Pending</option>
                                <option value="1" <?= (($all->status == 1) ? 'selected' : '') ?>>Approve</option>
                                <option value="2" <?= (($all->status == 2) ? 'selected' : '') ?>>Reject</option>
                            </select>
                                    </td>
                            <td><?= date("d-m-Y h:i:s A", strtotime($all->created_date)) ?></td>
                           
                         
                        </tr>
                        <?php }
                        ?>


                    </tbody>
                </table>
                        </div>
                        <div class="tab-pane fade " id="approved">
                <br>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                        <th>Sr. No.</th>
                            <th>Creator ID</th>
                            <th>Creator name</th>
                            <th>Status</th>
                            <th>Added Date and Time</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($Creatorapproved as $key => $approved) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $approved->id ?></td>
                            <td><?= $approved->first_name ?></td>
                            <td><?= $approved->status ?></td>
                          
                           
                            <!-- <td>
                                    <select class="form-control"
                                            onchange="ChangeWithDrawalStatus(<?= $approved->id ?>,this.value)">
                                            <option value="0" <?= (($approved->status == 0) ? 'selected' : '') ?>>Pending
                                            </option>
                                            <option value="1" <?= (($approved->status == 1) ? 'selected' : '') ?>>Approve
                                            </option>
                                            <option value="2" <?= (($approved->status == 2) ? 'selected' : '') ?>>Reject
                                            </option>
                                        </select>
                                    </td> -->
                            <td><?= date("d-m-Y h:i A", strtotime($approved->created_date)) ?></td>
                            
                         
                        </tr>
                        <?php }
                        ?>


                    </tbody>
                </table>
                        </div>
                        
                        <div id="rejected" class="tab-pan fade">
                <br>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                        <th>Sr. No.</th>
                            <th>Creator ID</th>
                            <th>Creator name</th>
                            <th>Status</th>
                            <th>Added Date and Time</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($Creatorrejected as $key => $rejected) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $rejected->id ?></td>
                            <td><?= $rejected->first_name ?></td>
                            <td><?= $rejected->status ?></td>
                           
                            
                            <!-- <td>
                                    <select class="form-control"
                                            onchange="ChangeWithDrawalStatus(<?= $rejected->id ?>,this.value)">
                                            <option value="0" <?= (($rejected->status == 0) ? 'selected' : '') ?>>Pending
                                            </option>
                                            <option value="1" <?= (($rejected->status == 1) ? 'selected' : '') ?>>Approve
                                            </option>
                                            <option value="2" <?= (($rejected->status == 2) ? 'selected' : '') ?>>Reject
                                            </option>
                                        </select>
                                    </td> -->
                            <td><?= date("d-m-Y h:i A", strtotime($rejected->created_date)) ?></td>
                           
                         
                        </tr>
                        <?php }
                        ?>


                    </tbody>
                </table>
                        </div>
                        
                        </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>

 

  
<script>

function ChangeWithDrawalStatus(id, status) {
    jQuery.ajax({
        url: "<?= base_url('backend/Creator/ChangeStatus') ?>",
        type: "POST",
        data: {
            'id': id,
            'status': status
        },
        success: function(data) {
            var response = JSON.parse(data);
            if (response) {
                toastr.success("Status Updated Successfully");
            } else {
                toastr.error("Something Went Wrong.");
            }
            setTimeout(function() {
                location.reload();
            }, 1000);
        }

    });
}

</script>