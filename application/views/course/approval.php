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
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#approved" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Approved</span>
                            </a>
                        </li> -->
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
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>View Course</th>
                                        <th>Creator ID</th>
                                        <th>Course Type</th>
                                        <th>Creator name</th>
                                        <th>Title</th>
                                        <th>Writer</th>
                                        <th>Language</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Creator Image</th>
                                        <th>Creator video</th>
                                        <!-- <th>Status</th> -->
                                        <th>Added Date and Time</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($Coursepending as $key => $pending) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/course/view/'.$pending->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="View Course"><span class="fa fa-eye"></span></a></td>

                                            <td><?= $pending->creator_id ?></td>
                                            <td><?= $pending->course_type_name ?></td>
                                            <td><?= $pending->admin_name ?></td>
                                            <td><?= $pending->title ?></td>
                                            <td><?= $pending->writer ?></td>
                                            <td><?= $pending->language ?></td>
                                            <td><?= $pending->duration ?></td>
                                            <td><?= $pending->price ?></td>
                                            <td><img src="<?= base_url() . '/uploads/data/content/' . $pending->image ?>" width="100"></td>
                                            <!-- <td><img src="<?= base_url('/uploads/data/content/' . $pending->image) ?>" width="100"></td> -->
                                            <td><img src="<?= base_url('/uploads/data/content/' . $pending->videos) ?>" width="100"></td>
                                            <!-- <td>
                                                <select class="form-control" onchange="ChangeWithDrawalStatus(<?= $pending->id ?>, this.value)">
                                                    <option value="1" <?= (($pending->status == 1) ? 'selected' : '') ?>>Pending</option>
                                                    <option value="2" <?= (($pending->status == 2) ? 'selected' : '') ?>>Approve</option>
                                                    <option value="3" <?= (($pending->status == 3) ? 'selected' : '') ?>>Reject</option>
                                                </select>
                                            </td> -->
                                            <td><?= date("d-m-Y h:i:s A", strtotime($pending->added_date)) ?></td>


                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                        
                        <!-- <div class="tab-pane p-3 fade  " id="approved" role="tabpanel">
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Creator ID</th>
                                        <th>Creator Type</th>
                                        <th>Creator name</th>
                                        <th>Title</th>
                                        <th>Writer</th>
                                        <th>Language</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Creator Image</th>
                                        <th>Creator video</th>
                                        <th>Status</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($Courseapproved as $key => $approved) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $approved->creator_id ?></td>
                                            <td><?= $approved->course_type ?></td>
                                            <td><?= $approved->name ?></td>
                                            <td><?= $approved->title ?></td>
                                            <td><?= $approved->writer ?></td>
                                            <td><?= $approved->language ?></td>
                                            <td><?= $approved->duration ?></td>
                                            <td><?= $approved->price ?></td>
                                            <td><img src="<?= base_url('/uploads/data/content/' . $approved->image) ?>" width="100"></td>
                                            <td><img src="<?= base_url('/uploads/data/content/' . $approved->videos) ?>" width="100"></td>
                                            <td>
                                                <select class="form-control" onchange="ChangeWithDrawalStatus(<?= $approved->id ?>, this.value)">
                                                    <option value="1" <?= (($approved->status == 1) ? 'selected' : '') ?>>Pending</option>
                                                    <option value="2" <?= (($approved->status == 2) ? 'selected' : '') ?>>Approve</option>
                                                    <option value="3" <?= (($approved->status == 3) ? 'selected' : '') ?>>Reject</option>
                                                </select>
                                            </td>
                                            
                                            <td><?= date("d-m-Y h:i A", strtotime($approved->added_date)) ?></td>


                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div> -->

                        <div id="rejected" class="tab-pan fade">
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>View Course</th>
                                        <th>Creator ID</th>
                                        <th>Course Type</th>
                                        <th>Creator name</th>
                                        <th>Title</th>
                                        <th>Writer</th>
                                        <th>Language</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Creator Image</th>
                                        <th>Creator video</th>
                                        <th>Added Date and Time</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($Courserejected as $key => $rejected) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/course/view/'.$rejected->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="View Course"><span class="fa fa-eye"></span></a></td>
                                            <td><?= $rejected->course_type_name ?></td>
                                            <td><?= $rejected->admin_name ?></td>
                                            <td><?= $rejected->name ?></td>
                                            <td><?= $rejected->title ?></td>
                                            <td><?= $rejected->writer ?></td>
                                            <td><?= $rejected->language ?></td>
                                            <td><?= $rejected->duration ?></td>
                                            <td><?= $rejected->price ?></td>
                                            <td><img src="<?= base_url('/uploads/data/content/' . $rejected->image) ?>" width="100"></td>
                                            <td><img src="<?= base_url('/uploads/data/content/' . $rejected->videos) ?>" width="100"></td>
                                            <!-- <td>
                                                <select class="form-control" onchange="ChangeWithDrawalStatus(<?= $rejected->id ?>, this.value)">
                                                    <option value="1" <?= (($rejected->status == 1) ? 'selected' : '') ?>>Pending</option>
                                                    <option value="2" <?= (($rejected->status == 2) ? 'selected' : '') ?>>Approve</option>
                                                    <option value="3" <?= (($rejected->status == 3) ? 'selected' : '') ?>>Reject</option>
                                                </select>
                                            </td> -->
                                            <td><?= date("d-m-Y h:i A", strtotime($rejected->added_date)) ?></td>


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
                url: "<?= base_url('backend/Course/ChangeStatus') ?>",
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