<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

                <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Chapter Name</th>
                            <th>Chapter No</th>
                            <th style="white-space: break-spaces;">Description</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($chapter as $key => $site) {
                                $i++;
                                ?>
                            <tr>
                            <td><?= $site->sort ?></td>
                            <td><?= $site->name ?></td>
                            <td><?= $site->chapter_no ?></td>
                            <td style="white-space: break-spaces;"><pre><?= htmlspecialchars(substr($site->description,0,100)) ?></pre></td>
                            <td><?= date("d-m-Y",strtotime($site->added_date))?></td>
                            <td>
                                <a href="<?= base_url('backend/course/editchapter/'.$site->course_id.'/'.$site->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                                |
                                <a href="<?= base_url('backend/course/deletechapter/'.$site->id) ?>" onclick="return confirm('Are You Sure Want To Remove This Course Chapter?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash"></span></a>

                                |
                                <a href="<?= base_url('backend/course/videoList/'.$site->course_id.'/'.$site->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Video"><span class="fa fa-plus"></span></a>
                            </td>
                        </tr>
                            <?php }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
