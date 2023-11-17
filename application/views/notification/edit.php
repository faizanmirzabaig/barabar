<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/notification/update'.'/'.$this->url_encrypt->encode($NotificationView->id), [
                    'autocomplete' => false, 'id' => 'edit_school', 'method' => 'post'
                ], ['id'=>$this->url_encrypt->encode($NotificationView->id),'type' => $this->url_encrypt->encode('tbl_feeds')])
                ?>
                

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $NotificationView->name ?>" name="name" id="name" placeholder="Title">
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

