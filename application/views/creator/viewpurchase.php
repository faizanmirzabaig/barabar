<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

                <table id="datatable-excel" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Creator Name</th>
                            <th>Course Name</th>
                            <th> Payable Amount</th>
                            <th>Admin Commission</th>
                            <th>Total Amount</th>
                            <th>Remaining Amount</th>
                            <th>Transaction Id</th>
                            <th>Status</th>
                            <!-- <th>Purchase date</th> -->
                            <!-- <th>Expiry Date</th> -->
                            <th>Added Date</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($viewpurchase as $key => $site) {
                                $i++;
                                ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $site->first_name ?></td>
                            <td><?= $site->course_name ?></td>
                            <td><?= $site->payable ?></td>
                            <td><?= $site->admin_commission ?></td>
                            <td><?= $site->amount ?></td>
                            <td><?= $site->remaining_amount ?></td>
                            <td><?= $site->txnid ?></td>
                            <td><?= $site->status ?></td>

                            <!-- <td><?= $site->purchase_date ?></td> -->
                            <!-- <td><?= $site->expiry_date ?></td> -->
                            <td><?= date("d-m-Y",strtotime($site->created_at))?></td>
                            <!-- <td>
                                
                                <a href="<?= base_url('backend/course_purchase/delete/'.$site->id) ?>" onclick="return confirm('Are You Sure Want To Remove This Course Purchase?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash"></span></a>
                            </td> -->
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
    async function fetchAllUserData() {
        const table = $('#datatable').DataTable();
        const totalPages = table.page.info().pages;
        let userData = [];

        for (let currentPage = 1; currentPage <= totalPages; currentPage++) {
            table.page(currentPage).draw('page');
            const pageData = table.rows({ search: 'applied' }).data().toArray();
            userData = [...userData, ...pageData];
        }

        return userData;
    }

    // Function to convert JSON data to CSV format
    function convertToCSV(jsonData) {
        const headers = Object.keys(jsonData[0]);
        const rows = jsonData.map(user => headers.map(header => user[header]));
        const csvContent = [
            headers.join(","),
            ...rows.map(row => row.join(","))
        ].join("\n");
        return csvContent;
    }

    // Function to remove the <a> tags from the user data
    function removeATags(userData) {
        return userData.map(user => {
            const userWithoutATags = { ...user };
            Object.keys(user).forEach(key => {
                if (typeof user[key] === 'string') {
                    const div = document.createElement('div');
                    div.innerHTML = user[key];
                    userWithoutATags[key] = div.textContent || div.innerText || '';
                }
            });
            return userWithoutATags;
        });
    }

    // Function to download the user data as a CSV file
    async function downloadCSV() {
        const table = $('#datatable').DataTable();
        const tableHeadData = table.columns().header().toArray().map(header => header.textContent);
        const userData = await fetchAllUserData();
        const userDataWithoutATags = removeATags(userData);
        const csvData = convertToCSV([tableHeadData, ...userDataWithoutATags]);

        const blob = new Blob([csvData], { type: 'text/csv;charset=utf-8;' });
        const url = URL.createObjectURL(blob);

        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'user_list.csv');
        link.style.visibility = 'hidden';

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Attach the downloadCSV function to the button click event
    const downloadButton = document.getElementById('downloadButton');
    downloadButton.addEventListener('click', downloadCSV);
</script>