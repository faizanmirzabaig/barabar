<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="example" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Student Name</th>
                            <!-- <th>Added Date</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($AllUser as $key => $value) {
                             $i++;
                         ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $value->first_name.' '.$value->father_name.' '.$value->last_name ?></td>
                            <!-- <td><?= date("d-m-Y",strtotime($value->added_date))?></td> -->
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>