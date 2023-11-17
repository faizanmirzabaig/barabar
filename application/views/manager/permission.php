<div class="row">
<div class="row">
    <button id="downloadButton">Download Manager Data</button>
</div>
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

            <h1>Permission Management</h1>
  
            <form id="permissionForm">
            <div class="form-group row"><label class="col-sm-2 col-form-label">
            <div class="col-sm-10">
                <input type="checkbox" name="permission[]" value="create"> Create
                </div>
                </label>
                </div>
                <div class="form-group row"><label class="col-sm-2 col-form-label">
                <div class="col-sm-10">
                <input type="checkbox" name="permission[]" value="read"> Read
                </div>
                </label>
                </div>
                <div class="form-group row"><label class="col-sm-2 col-form-label">
                <div class="col-sm-10">
                <input type="checkbox" name="permission[]" value="update"> Update
                </div>
                </label>
                </div>
                <div class="form-group row"><label class="col-sm-2 col-form-label">
                <div class="col-sm-10">
                <input type="checkbox" name="permission[]" value="delete"> Delete
                </div>
                </label>
                </div>
                
                <button type="submit">Grant Permissions</button>
            </form>

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
<script>
    const form = document.getElementById('permissionForm');
    
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      
      const selectedPermissions = [];
      const checkboxes = document.querySelectorAll('input[name="permission[]"]:checked');
      
      checkboxes.forEach(function(checkbox) {
        selectedPermissions.push(checkbox.value);
      });
      
      // Do something with the selected permissions
      console.log('Selected permissions:', selectedPermissions);
      
      // You can send the selected permissions to a server using AJAX or perform any other action here
      
      // Optionally, reset the form
      form.reset();
    });
  </script>