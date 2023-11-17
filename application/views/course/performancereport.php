<div class="row">


    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable-excel" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Course Name</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Percentage</th>
                            <th>Overall Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($report['individual_percentages'] as $report_data) : ?>
                            <tr>
                                <td><?= $report_data->id ?></td>
                                <td><?= $report_data->name ?></td>
                                <td><?= $report_data->total_marks ?></td>
                                <td><?= $report_data->obtained_marks ?></td>
                                <td><?= number_format($report_data->percentage, 0) ?> %</td>
                                <td><?= number_format($report['average_percentage'], 0) ?> %</td>
                            </tr>
                        <?php endforeach; ?>
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
    });
</script>