<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                           
                            <th>Amount</th>
                            <th>created_date</th>
        
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllRefer as $key => $Banner) {
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                
                                <td><?= $Banner->amount;?></td>
                                <td><?= date("d-m-Y", strtotime($Banner->created_date)) ?></td>
                                <td>
                                    <a href="<?= base_url('backend/refer/edit/'.$Banner->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                                    
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