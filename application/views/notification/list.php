<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="example" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($AllNotification as $key => $value) {
                             $i++;
                         ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $value->name ?></td>
                            <td><?= date("d-m-Y",strtotime($value->added_date))?></td>
                            <td>
                            <a href="<?= base_url('backend/notification/edit/'.$this->url_encrypt->encode($value->id)) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                            |
                            <a href="<?= base_url('backend/notification/delete/'.$this->url_encrypt->encode($value->id)) ?>" onclick="return confirm('Are You Sure Want To Remove This Notification?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash"></span></a>
                        </td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>