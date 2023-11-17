<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Image</th>
                            <th>Course Type</th>
                            <th>created_date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // print_r($AllCourseType);
                        // die('im here');
                        $i = 0;
                        foreach ($AllCourseType as $key => $coursetype) {
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><img src="<?= base_url().'/uploads/data/course_type/'. $coursetype->img ?>" width="100"></td>
                                <td><?= $coursetype->name ?></td>
                                <td><?= date("d-m-Y", strtotime($coursetype->created_date)) ?></td>
                                <td>
                                    <a href="<?= base_url('backend/CourseType/edit/' . $coursetype->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                                    |
                                    <a href="<?= base_url('backend/CourseType/delete/' . $coursetype->id) ?>" onclick="return confirm('Are You Sure Want To Remove This Image?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash"></span></a>
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