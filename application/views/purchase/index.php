<div class="row">


    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable-excel" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Amount</th> 
                            <!-- <th>Duration(Days)</th> -->
                            <!-- <th>Price</th> -->
                            <th>Status</th>
                            <th>Added Date</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($purchase as $key => $site) {
                            $i++;
                        ?>
                            <tr>
                                <td><?= $site->id ?></td>
                                <td><?= $site->name ?></td>
                                <td><?= $site->price ?></td>
                                <td>
                                    <?php
                                    if ($site->payment == 1) {
                                        echo "Payment Successful";
                                    } else {
                                        echo "Payment Pending";
                                    }
                                    ?>
                                </td>
                                <td><?= date("d-m-Y", strtotime($site->added_date)) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<script>
    $(".status").click(function() {
        const id = this.lastChild.id;
        const copyText = document.getElementById(id).value;
        const listener = function(ev) {
        ev.clipboardData.setData("text/plain", copyText);
        ev.preventDefault();
        };
        document.addEventListener("copy", listener);
        document.execCommand("copy");
        document.removeEventListener("copy", listener);
    })

   

</script>