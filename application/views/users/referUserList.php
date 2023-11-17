<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

                <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>User Name</th>
                            <th>Mobile</th>
                            <th style="white-space: break-spaces;max-width: 200px;">Address</th>
                            
                            <th>Added Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($users as $key => $site) {
                                $i++;
                                ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $site->name ?></td>
                            <td><?= $site->mobile ?></td>
                            <td style="white-space: break-spaces;max-width: 200px;"><?= $site->address ?></td>

                            
                            <td><?= date("d-m-Y",strtotime($site->added_date))?></td>
                            
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
