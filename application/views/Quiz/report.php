<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable-excel" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <!-- <th>Sr. No.</th> -->
                            <th>Quiz Id</th>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Course name</th>
                            <th>video name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($quizreport as $key => $site) {
                            $i++;
                        ?>
                            <tr>
                                <!-- <td><?= $i ?></td> -->
                                <td><?= $site->id ?></a></td>
                                <td><?= $site->user_id ?></td>
                                <td><?= $site->user_name ?></td>
                                <td><?= $site->total_marks ?></td>
                                <td><?= $site->obtained_marks ?></td>
                                <td><?= $site->name ?></td>
                                <td><?= $site->title ?></td>
                                <td>
                                    <a href="<?= base_url('backend/quiz/showdetails/' . $site->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Quiz Question"><span class="fa fa-eye"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
