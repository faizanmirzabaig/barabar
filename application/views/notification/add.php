<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/notification/insert', [
                    'autocomplete' => false, 'id' => 'add_notification', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_notification')])
                ?>
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" name="name" id="name" placeholder="Name">
                    </div>
                </div>

                
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        ?>
                         <a href="<?= base_url('backend/notification')?>" class="btn btn-secondary waves-effect" >Cancel</a>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>