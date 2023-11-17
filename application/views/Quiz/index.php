<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
            <!-- <button id="downloadButton" class="btn btn-primary btn-lg btn-dashboard custom-btn mb-3">Download User Data</button> -->

                <table id="datatable-excel" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Question no</th>
                            <th>Question</th>
                            <!-- <th style="white-space: break-spaces;">Description</th> -->
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Correct Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($quiz as $key => $site) {
                                $i++;
                                ?> 
                            <tr>
                            <td><?= $i++ ?></td>
                                <td><pre><?= htmlspecialchars(substr($site->question_no,0,100)) ?></pre></td>
                                <td><pre><?= htmlspecialchars(substr($site->question,0,100)) ?></pre></td>
                                <td><pre><?= htmlspecialchars(substr($site->option_1,0,100)) ?></pre></td>
                                <td><pre><?= htmlspecialchars(substr($site->option_2,0,100)) ?></pre></td>
                                <td><pre><?= htmlspecialchars(substr($site->option_3,0,100)) ?></pre></td>
                                <td><pre><?= htmlspecialchars(substr($site->option_4,0,100)) ?></pre></td>
                                <td><pre><?= htmlspecialchars(substr($site->correct_ans,0,100)) ?></pre></td>
                            
                           
                            <td>
                                <a href="<?= base_url('backend/quiz/editquiz/'.$site->video_id.'/'.$site->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                                |
                                <a href="<?= base_url('backend/quiz/deletequiz/'.$site->id) ?>" onclick="return confirm('Are You Sure Want To Remove This Quiz?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash"></span></a>
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
<script>
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