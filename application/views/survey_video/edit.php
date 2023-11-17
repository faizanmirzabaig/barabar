
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/survey/updatevideo/'.$survey_id.'/'.$chapter_id, [
                    'autocomplete' => false, 'id' => 'edit_coursevideo', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_survey_video')]);
              
                $status=$survey_data[0]->status;
                switch($status){
                    case PAYMENT_PEND:
                        $status = "readonly";
                        $submit = "invisible";
                        break;
                    case PENDING:
                     $status="readonly";
                     $submit="invisible";
                    break;
                    case APPROVED:
                    $status="readonly";
                    $submit="invisible";
                    break;

                    case REJECTED:
                    $status="";
                    $submit="";
                    break;    
                    
                    default:
                    $status='';  
                    $submit="";
                }
           
                ?>
                <input type="hidden" name="course_id" value="<?= $survey_id?>">
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $survey[0]->name?>" name="name" required id="name" placeholder="Enter  Name" <?= $status?>>
                        <input class="form-control" type="hidden" value="<?= $survey[0]->id?>" name="id" required id="id" placeholder="Enter  id">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Title *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $survey[0]->title?>" name="title" required id="title" placeholder="Enter Title" <?= $status?>>
                    </div>
                </div>
                
                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Serial No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="serial_no" value="<?= $survey[0]->sort ?>" required id="serial_no" placeholder="Enter Serial No" <?= $status?> >
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Description *</label>
                    <div class="col-sm-10">
                       <textarea class="form-control" name="description" id="description" required="" placeholder="Enter Description" <?= $status?>> <?= $survey[0]->description?></textarea>
                    </div>
                </div>


                <!-- <?php if(!empty($survey->videos)){?> -->
                <!-- <div class="form-group row"><label for="long" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        

                        <video width="400" controls>
                          <source src="<?php echo base_url()?>data/coursevideo/<?php echo $survey[0]->videos?>" type="video/mp4">
                        </video>
                    </div>
                </div> -->

                <!-- <?php } ?> -->

                <div class="form-group row"><label for="video_link" class="col-sm-2 col-form-label">Video Link *</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?= $survey[0]->video_link ?>" type="text" name="video_link" required id="video_link" placeholder="Enter Video Link" <?= $status?>>
                    </div>
                </div>
               
                <!-- <div class="form-group row"><label for="image1" class="col-sm-2 col-form-label">Video *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="image1" accept="video/mp4,video/mp4,video/x-m4v,video/*" id="image1" placeholder="Enter Image">
                    </div>
                </div> -->


                <div class="form-group row"><label for="video_lenght" class="col-sm-2 col-form-label">Video Lenght *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $survey[0]->minute ?>" name="video_lenght"  min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required id="video_lenght" placeholder="Enter Video Lenght" <?= $status?>>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => "$submit btn btn-primary waves-effect waves-light mr-1 "]);
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




