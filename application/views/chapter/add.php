
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/course/insertchapter/'.$course_id, [
                    'autocomplete' => false, 'id' => 'add_coursechapter', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_chapter')])
                ?>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label"> Chapter Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" required id="name" placeholder="Enter  Name">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Chapter No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="chapter_no" required id="chapter_no" placeholder="Enter Chapter No">
                    </div>
                </div>
                
                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Serial No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="serial_no" required id="serial_no" placeholder="Enter Serial No">
                    </div>
                </div>



                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Description *</label>
                    <div class="col-sm-10">
                       <textarea class="form-control" name="description" id="description" required="" placeholder="Enter Description"></textarea>
                    </div>
                </div>

               
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        echo form_reset(['class' => 'btn btn-secondary waves-effect', 'value' => 'Cancel', 'onclick'=>'goBack()']);
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
    function goBack() {
      window.history.back();
    }
    </script>
