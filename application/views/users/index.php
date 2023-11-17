
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
              
                <table id="datatable-excel" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <!-- <th>Referral Code</th> -->
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Mobile</th>
                            <!-- <th style="white-space: break-spaces;max-width: 200px;">Address</th> -->
                            <!-- <th>IMEI No</th> -->
                            <th>Wallet</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>pincode</th>
                            <th>User Status</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $admin_role=$this->session->userdata('role');
                        foreach ($users as $key => $site) {
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <!-- <td><?= $site->refferal ?></td> -->
                                <td><?= $site->id ?></td>
                                <td><?= $site->name ?></td>
                                <td><?= $site->mobile ?></td>
                                <!-- <td style="white-space: break-spaces;max-width: 200px;"><?= $site->address ?></td> -->
                                <!-- <td><?= $site->imei_no ?></td> -->
                                <td><?= $site->wallet ?></td>
                                <td><?= $site->gender ?></td>
                                <td><?= $site->age ?></td>
                                <td><?= $site->pincode ?></td>
                                <td>
                                    <?php if ($site->is_Blocked == 0) : ?>
                                        Active
                                    <?php else : ?>
                                        Block
                                    <?php endif; ?>
                                </td>
                                <td><?= date("d-m-Y", strtotime($site->added_date)) ?></td>
                                <td>
                                    <a href="<?= base_url('backend/user/viewuser/' . $site->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View User"><span class="fa fa-eye"></span></a>
                                    |
                                    <a href="<?= base_url('backend/user/myCourse/' . $site->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Course"><span class="fa fa-book"></span></a>
                                    <?php if($admin_role!=2)
                                    { ?>
                                    |

                                    <a href="<?= base_url('backend/user/buyCourse/' . $site->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Buy Course"><span class="fa fa-plus"></span></a>
                                    <?php }?>
                                    |
                                    <a href="<?= base_url('backend/user/referralList/' . $site->refferal) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Referral List"><span class="fa fa-list"></span></a>
                                    |
                                    <?php if ($site->is_Blocked) : ?>
                                        <a href="<?php echo base_url('backend/user/unblockUser/' . $site->id); ?>" class="btn btn-info" onclick="return confirmunBlockUser();" data-toggle="tooltip" data-placement="top" title="Activate User">
                                            <span class="fa fa-check"></span>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?php echo base_url('backend/user/blockUser/' . $site->id); ?>" class="btn btn-danger" onclick="return confirmBlockUser();" data-toggle="tooltip" data-placement="top" title="Block User"><span class="fa fa-ban"></span></a>
                                    <?php endif; ?>
                                    |
                                    <a href="<?= base_url('backend/user/export_excel/' . $site->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Download User Transaction"><span class="fa fa-download"></span></a>

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
<script>


  function confirmBlockUser() {
    return confirm("Are you sure you want to block this user?"); // Display confirmation alert box
  }

  function confirmunBlockUser() {
    return confirm("Are you sure you want to activate this user?"); // Display confirmation alert box
  }
});
</script>
