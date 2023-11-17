<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">


                <table id="datatable-excel" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <!-- <th>Sr. No.</th> -->
                            <th>Question no</th>
                            <th>Question</th>
                            <!-- <th style="white-space: break-spaces;">Description</th> -->
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Given Answer</th>
                            <th>Correct Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($detailreport as $key => $site) {
                                $i++;
                                ?>
                            <tr>
                            <td><?= $site->question_no ?></td>
                            <td><?= $site->question ?></td>
                            <td><?= $site->option_1 ?></td>
                            <td><?= $site->option_2 ?></td>
                            <td><?= $site->option_3 ?></td>
                            <td><?= $site->option_4 ?></td>
                            <td><?= $site->answer ?></td>
                            <td><?= $site->correct_ans ?></td>
                            
                           
                        
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
