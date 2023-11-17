<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

                <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Course Name</th>
                            <!-- <th>Amount</th> -->
                            <th>Purchase Date</th>
                            <th>Expiry Date</th>
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
                            <td><?= $site->course_name ?></td>
                            <!-- <td><?php /* $site->amount  */?></td> -->
                            <td><?= $site->purchase_date ?></td>

                            <td><?= $site->expiry_date ?></td>
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
