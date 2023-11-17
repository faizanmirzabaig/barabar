
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/course/updatevideo/'.$course_id.'/'.$chapter_id, [
                    'autocomplete' => false, 'id' => 'edit_coursevideo', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_coursevideo')]);
              
                $status=$course_data[0]->status;
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
                <input type="hidden" name="course_id" value="<?= $course_id?>">
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $course[0]->name?>" name="name" required id="name" placeholder="Enter  Name" <?= $status?>>
                        <input class="form-control" type="hidden" value="<?= $course[0]->id?>" name="id" required id="id" placeholder="Enter  id">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Title *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $course[0]->title?>" name="title" required id="title" placeholder="Enter Title" <?= $status?>>
                    </div>
                </div>
                
                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Serial No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="serial_no" value="<?= $course[0]->sort ?>" required id="serial_no" placeholder="Enter Serial No" <?= $status?> >
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Description *</label>
                    <div class="col-sm-10">
                       <textarea class="form-control" name="description" id="description" required="" placeholder="Enter Description" <?= $status?>> <?= $course[0]->description?></textarea>
                    </div>
                </div>


                <!-- <?php if(!empty($course->videos)){?> -->
                <!-- <div class="form-group row"><label for="long" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        

                        <video width="400" controls>
                          <source src="<?php echo base_url()?>data/coursevideo/<?php echo $course[0]->videos?>" type="video/mp4">
                        </video>
                    </div>
                </div> -->

                <!-- <?php } ?> -->

                <div class="form-group row" id="content_type_after"><label for="long" class="col-sm-2 col-form-label">Content Type *</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="content_type" id="content_type" required>
                            <option value="" id="select_type">Select Type</option>
                            <option value="0">Video</option>
                            <option value="1">Image</option>
                            <option value="2">Pdf</option>
                        </select>
                    </div>
                </div>

                <!-- <div class="form-group row"><label for="video_link" class="col-sm-2 col-form-label">Video Link *</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?= $course[0]->video_link ?>" type="text" name="video_link" required id="video_link" placeholder="Enter Video Link" <?= $status?>>
                    </div>
                </div> -->
               
                <!-- <div class="form-group row"><label for="image1" class="col-sm-2 col-form-label">Video *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="image1" accept="video/mp4,video/mp4,video/x-m4v,video/*" id="image1" placeholder="Enter Image">
                    </div>
                </div> -->


                <div class="form-group row" id="video_length"><label for="video_lenght" class="col-sm-2 col-form-label">Video Lenght *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $course[0]->minute ?>" name="video_lenght"  min="0" oninput="this.value = 
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

    $(document).ready(function() {
            // Triggered when the category selection changes
            $('#video_length').hide();
            $('#content_type').change(function() {
                $('#video_length').hide();

                $('#select_type').remove();

                console.log('i m here');
                var content_type = $('#content_type').val();
                let content_type_after = $('#content_type_after');
                console.log(content_type_after);
                // Get the selected category ID
                // Make an AJAX request to fetch subcategories based on the selected category
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url(); ?>backend/Ajax/ContentType/", // Replace with your server-side route
                    data: {
                        content_type: content_type
                    }, // Send the selected category ID
                    success: function(response) {
                        console.log(response);
                        let parse = JSON.parse(response);
                        // uploadedArea.prepend(uploadedHTML);

                        console.log(parse.status);
                        let html = document.createElement('div');
                        html.className = 'form-group row remove_html';
                        if (parse.type == <?=VIDEO?>) {
                       $('#video_length').show();

                            html.innerHTML = `
                            <label for="long" class="col-sm-2 col-form-label">Video *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="video_link" required id="video_link" placeholder="Enter Video Link" value="<?= $course[0]->video_link ?>" >
                            </div>
                            `;
                        } else if (parse.type == <?=IMAGE?>) {
                            html.innerHTML = `
                            <label for="long" class="col-sm-2 col-form-label">Image *</label>
                            <div class="col-sm-10">
                            <input type="file" class="form-control" accept=".png, .jpg, .jpeg" name="image" required>
                            </div>
                            </div>`;
                            $('#video_length').hide();

                        } else {
                            html.innerHTML = `<label for="long" class="col-sm-2 col-form-label">Pdf *</label>
                            <div class="col-sm-10">
                            <input type="file" class="form-control" name="pdf" accept=".pdf" required>
                            </div>
                             </div>`;
                             $('#video_length').hide();

                        }
                        $('.remove_html').remove();

                        $(html).insertAfter(content_type_after);

                    }
                });
            });
        });
    </script>




