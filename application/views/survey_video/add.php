
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php

                echo form_open_multipart('backend/survey/insertvideo/'.$survey_id.'/'.$chapter_id , [
                    'autocomplete' => false, 'id' => 'add_coursevdeo', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_survey_video')])
                ?>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" required id="name" placeholder="Enter  Name">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Title *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title" required id="title" placeholder="Enter Title">
                    </div>
                </div>

                
                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Serial No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="serial_no"  required id="serial_no" placeholder="Enter Serial No">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Description *</label>
                    <div class="col-sm-10">
                       <textarea class="form-control" name="description" id="description" required="" placeholder="Enter Description"></textarea>
                    </div>
                </div>

               
                <!-- <div class="form-group row"><label for="image1" class="col-sm-2 col-form-label">Video *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" accept="video/mp4,video/x-m4v,video/*" name="image1" required id="image1" placeholder="Enter Image">
                    </div>
                </div> -->
                <div class="form-group row"><label for="video_link" class="col-sm-2 col-form-label">Video Link *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="video_link" required id="video_link" placeholder="Enter Video Link">
                    </div>
                </div>

                <div class="form-group row"><label for="video_lenght" class="col-sm-2 col-form-label">Video Lenght *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="video_lenght"  min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required id="video_lenght" placeholder="Enter Video Lenght">
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
