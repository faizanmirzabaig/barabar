
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/creator/insertcourse', [
                    'autocomplete' => false, 'id' => 'add_course', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_creator_content')])
                ?>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="course_name" required id="name" placeholder="Enter  Name">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Title *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title" required id="title" placeholder="Enter Title">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Duration *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="duration" required id="duration" placeholder="Enter Days">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Price *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="price" required id="price" placeholder="Enter Price">
                    </div>
                </div>

                <div class="form-group row"><label for="image1" class="col-sm-2 col-form-label">Image *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="image1" required id="image1" placeholder="Enter Image">
                    </div>
                </div>


                <div class="form-group row"><label for="video1" class="col-sm-2 col-form-label">Video *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" accept="video/mp4,video/x-m4v,video/*" name="video1" required id="video1" placeholder="Enter Video">
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
