<div class="modal fade" id="reject_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Reason</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="reject_reason" name="reject_reason" placeholder="Enter Reason">
                </div>

                <button id="course_reject" class="btn btn-danger btn-sm">Submit</button>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

                <h3 class="mb-5">Course Details</h1>
                <?php
                    $course = $view_course[0];


                echo form_open_multipart('backend/course/updateCreatorCourse/'.$course->id, [
                    'autocomplete' => false, 'id' => 'course_vali', 'method' => 'post'
                ], ['id' => $this->url_encrypt->encode($course->id), 'type' => $this->url_encrypt->encode('tbl_course')]);

                    
                    ?>
                    <div class="row">
                        <input type="hidden" id="course_id" value="<?php echo $course->id ?>">
                        <div class="col-md-4">
                            <div class="form-group row"><label for="course_name" class="col-sm-5 col-form-label"> Name *</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="text" value="<?php echo $course->name ?>" name="name" required id="course_name" placeholder="Course Name" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group row"><label for="course_title" class="col-sm-5 col-form-label"> Title *</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="text" value="<?php echo $course->title ?>" name="title" required id="course_title" placeholder="Course Title" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row"><label for="course_duration" class="col-sm-5 col-form-label"> Duration *</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="text" value="<?php echo $course->duration ?>" name="duration" required id="course_duration" placeholder="Course Duration" >
                                </div>
                            </div>
                        </div>




                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group row"><label for="course_writer" class="col-sm-5 col-form-label"> Instructor *</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="text" value="<?php echo $course->writer ?>" name="writer" required id="course_writer" placeholder="Course Writer" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group row"><label for="course_language" class="col-sm-5 col-form-label"> Language *</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="text" value="<?php echo $course->language ?>" name="language" required id="course_language" placeholder="Course Language" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group row"><label for="course_price" class="col-sm-5 col-form-label"> Price *</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="text" value="<?php echo $course->price ?>" name="price" required id="course_price" placeholder="Course Price" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <div class="form-group row"><label for="course_description" class="col-sm-2 col-form-label"> Description *</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="course_description" id="description" required="" placeholder="Enter Description" ><?= $course->description ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6 ">
                            <img class="course_view_image" src="<?php echo base_url() ?>uploads/data/content/<?php echo $course->image ?>" alt="view_course">
                        </div>
                    </div>
                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Image *</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="image1" id="image1" placeholder="Enter Image">
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        
                            <iframe width="100%" height="100%" src="<?= $course->video_link ?>">
                            </iframe>
                            <div class="form-group row">
                        <label for="video_link" class="col-sm-2 col-form-label">Video Link *</label>
                        <div class="col-sm-10">
                            <input class="form-control" value=<?= $course->video_link ?> type="text" name="video_link"  id="video_link" placeholder="Enter Video Link">
                        </div>
                    </div>
                        </div>
                        
                        
                    

                    <div class="row mt-5">
                        <?php
                        $i = 1;
                        foreach ($chapter_list as $chapter) {
                            $this->load->model('Course_model');
                            $course__video = $this->Course_model->ListData($chapter->course_id,$chapter->id);
                      
                        ?>
                            <div class="col-md-12">
                                <h3 class="mb-5 ">Chapter <?= $i++ ?></h3>
                            </div>
                            <input class="form-control" type="hidden" value="<?php echo $chapter->id ?>" name="chapter_id[]" required id="chapter_id" placeholder="Chapter Id" >


                            <div class="col-md-4">
                                <div class="form-group row"><label for="chapter_no" class="col-sm-5 col-form-label"> Chapter Name *</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="text" value="<?php echo $chapter->name ?>" name="chapter_name[]" required id="chapter_name" placeholder="Chapter Name" >
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group row"><label for="chapter_no" class="col-sm-5 col-form-label"> Chapter Number *</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="text" value="<?php echo $chapter->chapter_no ?>" name="chapter_no[]" required id="chapter_no" placeholder="Chapter Number" >
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group row"><label for="chapter_no" class="col-sm-5 col-form-label"> Chapter Serial Number *</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="text" value="<?php echo $chapter->sort ?>" name="chapter_serial_no[]" required id="chapter_serial_no" placeholder="Chapter Serial Number" >
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row"><label for="chapter_desc" class="col-sm-2 col-form-label"> Decription *</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description[]" id="description" required="" placeholder="Enter Description" ><?= $course->description ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="row">
                                    <?php
                                    foreach ($course__video as $video) {

                                    ?>
                                    <input type="hidden" name="video_id[]" id="video_id" value="<?= $video->id?>">
                                        <div class="col-md-4 mt-5 mb-5">
                                            <?php if($video->content_type==VIDEO)
                                            {?>
                                            <iframe width="100%" height="auto" src="<?= $video->video_link ?>">
                                            </iframe>
                                            <div class="form-group row">
                                                <label for="
                                                " class="col-sm-5 col-form-label">Video Link *</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" value=<?= $course->video_link ?> type="text" name="video_link" required id="video_link" placeholder="Enter Video Link">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-2"><label for="video_name" class="col-sm-5 col-form-label"> Video Name *</label>
                                                <div class="col-sm-7">
                                                    <input class="form-control" type="text" value="<?php echo $video->name ?>" name="video_name[]" required id="video_name" >
                                                </div>
                                            </div>
                                            <?php } 
                                            
                                            else if($video->content_type==IMAGE){
                                            ?>
<img src="<?= base_url().'uploads/data/content/'.$video->video_link ?>" alt="" style="width: 68%;
    margin: auto;
    display: block;" >
    
                                            <div class="form-group row mt-2"><label for="video_name" class="col-sm-5 col-form-label"> Video Name *</label>
                                                <div class="col-sm-7">
                                                    <input class="form-control" type="text" value="<?php echo $video->name ?>" name="video_name[]" required id="video_name" readonly>
                                                </div>
                                            </div>
                                            <?php }
                                            else{
                                            ?>
     <object data="<?= base_url().'uploads/data/content/'.$video->video_link ?>" type="application/pdf" >

</object>
                                            <div class="form-group row mt-2"><label for="video_name" class="col-sm-5 col-form-label"> Video Name *</label>
                                                <div class="col-sm-7">
                                                    <input class="form-control" type="text" value="<?php echo $video->name ?>" name="video_name[]" required id="video_name" readonly>
                                                </div>
                                            </div>
                                            <?php } ?>

                                            <div class="form-group row"><label for="video_title" class="col-sm-5 col-form-label"> Decription *</label>
                                                <div class="col-sm-7">
                                                    <input class="form-control" type="text" value="<?php echo $video->title ?>" name="video_title[]" required id="video_title" >
                                                </div>
                                            </div>

                                            <div class="form-group row"><label for="video_desc" class="col-sm-5 col-form-label"> Video Description *</label>
                                                <div class="col-sm-7">
                                                    <input class="form-control" type="text" value="<?php echo $video->description ?>" name="video_desc[]" required id="video_desc" >
                                                </div>
                                            </div>



                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        <?php }
                        ?>

                        <div class="col-md-12 text-center">
                            <div class="form-group mb-5">
                                <button class="btn btn-success text-white" data-toggle="tooltip" data-placement="top" type="submit" id="approve_course"><span class="fa fa-check mr-1 "></span>Approve</button>
                                <a class="btn btn-danger ml-3 text-white" data-toggle="tooltip" data-placement="top" data-toggle="modal" data-target="#exampleModal" id="reject_course"><span class="fa fa-times mr-1"></span>Reject</a>
                            </div>
                        </div>

                        </form>
                    </div>

            </div>
        </div>
    </div>
</div>

<script>
    // $('#approve_course').click(function() {
    //     course_id = $('#course_id').val();
    //     if (confirm('Are you want to approve this course')) {
    //         $.ajax({
    //             url: '<?php echo base_url(); ?>backend/Course/ChangeStatus/',
    //             type: "POST",
    //             cache: false,
    //             data: {
    //                 course_id: course_id,
    //                 status: 2,
    //             },
    //             success: function(response) {
    //                 if (response) {
    //                     toastr.success("Course Approved Successfully");
    //                     // Redirect after approval
    //                     window.location.href = '<?php echo base_url() ?>' + 'backend/course/updateCreatorCourse/' + course_id;
    //                 } else {
    //                     toastr.error("Something Went Wrong.");
    //                 }
    //             },
    //         });
    //     }


    // });

    $('#reject_course').click(function() {
        $('#reject_modal').css('display', 'block');
        $('#reject_modal').css('opacity', '1');
        $('#reject_modal').css('top', '16px');
        $('#reject_modal').css('padding-top', '20px');
        $('.close').click(function() {
            $('#reject_modal').css('display', 'none');
        });

        $("#course_reject").click(function() {
            console.log('i m here');
            reject_reason = $('#reject_reason').val();
            course_id = $('#course_id').val();
            if (reject_reason != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>backend/Course/ChangeStatus/',
                    type: "POST",
                    cache: false,
                    data: {
                        course_id: course_id,
                        reject_reason: reject_reason,
                        status: 3,

                    },
                    success: function(response) {
                        if (response) {
                            toastr.success("Status Updated Successfully");
                        } else {
                            toastr.error("Something Went Wrong.");
                        }
                        setTimeout(function() {
                            window.location.href = '<?php echo base_url() ?>' + 'backend/course/creatorcourses'
                        }, 1000);
                    }
                });
            } else {
                toastr.error("Please enter reason for reject course");

            }
        });

    });
</script>