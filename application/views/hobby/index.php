<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Hobby</th>
                            <th>created_date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllHobby as $key => $Hobby) {
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>

                                <td><?= $Hobby->name ?></td>
                                <td><?= date("d-m-Y", strtotime($Hobby->created_date)) ?></td>
                                <td>
                                    <a href="<?= base_url('backend/hobby/edit/' . $Hobby->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                                    |
                                    <a href="<?= base_url('backend/hobby/delete/' . $Hobby->id) ?>" onclick="return confirm('Are You Sure Want To Remove This Image?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash"></span></a>
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