<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/AdminProfile/update', [
                    'autocomplete' => false, 'id' => 'add_post', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_admin')])
                ?>
                
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label"> Admin Name *</label>
                    <div class="col-sm-10">
                    <?php if ($admin !== null): ?>
                        <input class="form-control" type="text" value="<?= $admin->first_name ?>" name="name" required id="Name">
                    <?php endif; ?>
                    </div>
                </div>
                <input type="hidden" value="<?= $admin->id ?>" name="id">
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="password" value=""
                            placeholder="Enter New Password If You Want To Update Old Password" id="password">
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        echo form_reset(['class' => 'btn btn-secondary waves-effect', 'value' => 'Cancel']);
                        ?>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>

    <script>
   
    </script>