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
                            <a class="nav-link" data-toggle="tab" href="#approved" role="tab" aria-selected="true">
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
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>View Screenshots</th>
                                        <td>User Name</td>
                                        <th>Course Name</th>
                                        <th>Title</th>
                                        <!-- <th>Status</th> -->
                                        <th>Added Date and Time</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($approval_pending as $key => $pending) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/Course_purchase/approval_view/'.$pending->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="View Screenshots"><span class="fa fa-eye"></span></a></td>
                                            <td><?= $pending->user_name?></td>
                                            <td><?=$pending->course_name?></td>
                                            <td><?= $pending->course_title?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($pending->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                        
                        <div class="tab-pane p-3  " id="approved" role="tabpanel">
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                    <th>Sr. No.</th>
                                        <th>View Screenshots</th>
                                        <td>User Name</td>
                                        <th>Course Name</th>
                                        <th>Title</th>
                                        <!-- <th>Status</th> -->
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($approval_approved as $key => $approved) {
                                        $i++;
                                    ?>
                                        <tr>
                                        <td><?= $i ?></td>
                                        <td><a href="<?= base_url('backend/Course_purchase/approval_view/'.$approved->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="View Screenshots"><span class="fa fa-eye"></span></a></td>
                                            <td><?= $approved->user_name?></td>
                                            <td><?=$approved->course_name?></td>
                                            <td><?= $approved->course_title?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($approved->added_date)) ?></td>
                                        
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>

                        <div id="rejected" class="tab-pane p-3 " role="tabpanel">
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                        <th>View Screenshots</th>
                                        <td>User Name</td>
                                        <th>Course Name</th>
                                        <th>Title</th>
                                        <!-- <th>Status</th> -->
                                        <th>Added Date and Time</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($approval_rejected as $key => $rejected) {
                                        $i++;
                                    ?>
                                       <tr>
                                        <td><?= $i ?></td>
                                        <td><a href="<?= base_url('backend/Course_purchase/approval_view/'.$rejected->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="View Screenshots"><span class="fa fa-eye"></span></a></td>
                                            <td><?= $rejected->user_name?></td>
                                            <td><?=$rejected->course_name?></td>
                                            <td><?= $rejected->course_title?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($rejected->added_date)) ?></td>
                                        
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




  