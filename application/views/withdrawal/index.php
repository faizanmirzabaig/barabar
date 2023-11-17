<div class="modal fade" id="withdrawalConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="withdrawalConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="withdrawalConfirmationModalLabel">Change Withdrawal Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="withdrawalReason">Enter Reason:</label>
                <input type="text" class="form-control" id="withdrawalReason" placeholder="Enter reason here">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmWithdrawalButton">Confirm</button>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <input type="hidden" id="sn_date" value="" name="start_date">
                            <input type="hidden" id="en_date" value="" name="end_date">
                            <label for="crm_attendence_date">Date filter</label>
                            <div id="report" class="form-control" style=" cursor: pointer; ">
                                <i class="fa fa-calendar"></i>&nbsp;

                                <span></span>
                                <i class="fa fa-caret-down"></i>

                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-1">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-4">Search</button>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <a href="<?= base_url('crm/Attendence') ?>" class="btn btn-info mt-4">Clear</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

</section>



</section>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <ul class="nav nav-tabs">
                    <!-- <li class="active"><a data-toggle="tab" href="#pending">Pending</a></li>
                    <li><a data-toggle="tab" href="#approved">Approved</a></li>
                    <li><a data-toggle="tab" href="#rejected">Rejected</a></li> -->
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
                    <br>
                    <div class="tab-pane p-3 active" id="pending" role="tabpanel">
                        <!-- <div id="pending" class="tab-pane fade in active"> -->
                        <table class="table table-bordered"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>User ID</th>
                                    <!-- <th>Bank Details</th>
                                    <th>Aadhar</th>
                                    <th>UPI</th>
                                    <th>Mobile</th> -->
                                    <th>Unit</th>
                                    <th>Status</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($Pending as $key => $Data) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $Data->user_name ?></td>
                                    <td><?= $Data->user_id ?></td>
                                    <!-- <td><?= $Data->bank_detail ?></td>
                                    <td><?= $Data->adhar_card ?></td>
                                    <td><?= $Data->upi ?></td>
                                    <td><?= $Data->mobile ?></td> -->
                                    <td><?= $Data->coin ?></td>
                                    <td>
                                        <select class="form-control"
                                            onchange="ChangeWithDrawalStatus(<?= $Data->id ?>,this.value)">
                                            <option value="0" <?= (($Data->status == 0) ? 'selected' : '') ?>>Pending
                                            </option>
                                            <option value="1" <?= (($Data->status == 1) ? 'selected' : '') ?>>Approve
                                            </option>
                                            <option value="2" <?= (($Data->status == 2) ? 'selected' : '') ?>>Reject
                                            </option>
                                        </select>
                                    </td>
                                    <td><?= date("d-m-Y h:i:s A", strtotime($Data->created_date)) ?></td>
                                </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div id="approved" class="tab-pane fade">
                        <br>
                        <table class="table table-bordered"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>User ID</th>
                                    <!-- <th>Mobile</th> -->
                                    <th>Coin</th>
                                    <th>Status</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($Approved as $key => $Data) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $Data->user_name ?></td>
                                    <td><?= $Data->user_id ?></td>
                                    <!-- <td><?= $Data->mobile ?></td> -->
                                    <td><?= $Data->coin ?></td>
                                    <td>
                                        <select class="form-control"
                                            onchange="ChangeWithDrawalStatus(<?= $Data->id ?>,this.value)">
                                            <!--   <option value="0" <?= (($Data->status == 0) ? 'selected' : '') ?>>Pending</option> -->
                                            <option value="1" <?= (($Data->status == 1) ? 'selected' : '') ?>>Approved
                                            </option>
                                            <!--  <option value="2" <?= (($Data->status == 2) ? 'selected' : '') ?>>Reject</option> -->
                                        </select>
                                    </td>
                                    <td><?= date("d-m-Y h:i:s A", strtotime($Data->created_date)) ?></td>
                                </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="rejected" class="tab-pane fade">
                        <br>
                        <table class="table table-bordered"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>User ID</th>
                                    <!-- <th>Mobile</th> -->
                                    <th>Coin</th>
                                    <th>Status</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($Rejected as $key => $Data) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $Data->user_name ?></td>
                                    <td><?= $Data->user_id ?></td>
                                    <!-- <td><?= $Data->mobile ?></td> -->
                                    <td><?= $Data->coin ?></td>
                                    <td>
                                        <select class="form-control"
                                            onchange="ChangeWithDrawalStatus(<?= $Data->id ?>,this.value)">
                                            <!--                                         <option value="0" <?= (($Data->status == 0) ? 'selected' : '') ?>>Pending</option>
                                        <option value="1" <?= (($Data->status == 1) ? 'selected' : '') ?>>Approve</option>
 -->
                                            <option value="2" <?= (($Data->status == 2) ? 'selected' : '') ?>>Rejected
                                            </option>
                                        </select>
                                    </td>
                                    <td><?= date("d-m-Y h:i:s A", strtotime($Data->created_date)) ?></td>
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
    $('#withdrawalConfirmationModal').modal('show');

    $('#confirmWithdrawalButton').on('click', function() {
        var reason = $('#withdrawalReason').val();

        if (reason.trim() === '') {
            toastr.error('Please enter a reason.');
            return;
        }

        $('#withdrawalConfirmationModal').modal('hide');

        jQuery.ajax({
            url: "<?= base_url('backend/Withdrawal/ChangeStatus') ?>",
            type: "POST",
            data: {
                'id': id,
                'status': status,
                'reason': reason
            },
            success: function(data) {
                var response = JSON.parse(data);
                if (response.class == "success") {
                    toastr.success(response.msg);
                } else {
                    toastr.error(response.msg);
                }

                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        });
    });
}

</script>