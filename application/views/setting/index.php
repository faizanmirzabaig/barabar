
<style>
    .table>tbody>tr>td, .table>tfoot>tr>td, .table>thead>tr>td {
    padding: 15px 12px;
    overflow-wrap: break-word;
    white-space: unset !important;
}

.table td, .table th {
    vertical-align: top !important;
}

ul, ol{
    padding-left: 9px;
}
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
             <div class="card-body table-responsive">
                <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <!-- <th>App Logo</th>
                            <th>App Name</th> -->
                            <th style="white-space: break-spaces;max-width: 150px;">About Us</th>
                            <th style="white-space: break-spaces;max-width: 150px;">Contact Us</th>
                            <th style="white-space: break-spaces;max-width: 150px;">Email Us</th>
                            <th style="white-space: break-spaces;max-width: 150px;">Terms And Conditions</th>
                            <th style="white-space: break-spaces;max-width: 150px;">Vision</th>
                            <th style="white-space: break-spaces;max-width: 150px;">Mission</th>
                             <th style="white-space: break-spaces;">Privacy Policy</th>
                           <!-- <th style="white-space: break-spaces;">FAQ's</th>
                            <th>Youtube Link</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- <td><img src="<?= base_url('data/setting/'.$Setting->app_icon) ?>" width="100"></td>
                            <td><?= $Setting->app_name ?></td> -->
                            <td style="white-space: break-spaces;max-width: 150px;"><?= $Setting->about_us ?></td>
                            <td style="white-space: break-spaces;max-width: 150px;"><?= $Setting->contact_us ?></td>
                            <td style="white-space: break-spaces;max-width: 150px;"><?= $Setting->email_us ?></td>
                            <td style="white-space: break-spaces;max-width: 150px;"><?= $Setting->terms ?></td>
                            <td style="white-space: break-spaces;max-width: 150px;"><?= $Setting->vision ?></td>
                            <td style="white-space: break-spaces;max-width: 150px;"><?= $Setting->mission ?></td>
                            <!-- <td style="white-space: break-spaces;max-width: 150px;"><?= $Setting->policy ?></td> -->
                            <td><?= $Setting->policy ?></td>
                            <!-- <td><?= $Setting->faq ?></td>
                            <td><a href="<?= $Setting->youtube_link ?>" target="_blank">Youtube</a></td> -->
                            <td>
                                <a href="<?= base_url('backend/setting/edit') ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>