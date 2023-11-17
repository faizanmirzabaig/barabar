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

                <button id="screenshot_reject" class="btn btn-danger btn-sm">Submit</button>
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

                <?php
                $view_screenshots = $view_screenshots[0];
                $user_id=$view_screenshots->user_id;
                $course_id=$view_screenshots->course_id;

               
                ?>
                <div class="col-md-12">
                    <input type="hidden" id="screenshot_id" value="<?php echo $view_screenshots->id ?>">
                    <input type="hidden" id="user_id" value="<?php echo $view_screenshots->user_id ?>">
                    <input type="hidden" id="course_id" value="<?php echo $view_screenshots->course_id ?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row"><label for="user_name" class="col-sm-5 col-form-label"> User Name *</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $view_screenshots->user_name ?>" name="user_name" required id="user_name" readonly>
                            </div>
                        </div>
                    <!-- </div>

                    <div class="col-md-4"> -->
                        <div class="form-group row"><label for="screenshot_name" class="col-sm-5 col-form-label"> Course Name *</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $view_screenshots->course_name ?>" name="screenshot_name" required id="screenshot_name" readonly>
                            </div>
                        </div>
                    <!-- </div>

                    <div class="col-md-4"> -->
                        <div class="form-group row"><label for="screenshot_title" class="col-sm-5 col-form-label"> Title *</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $view_screenshots->course_title ?>" name="screenshot_title" required id="screenshot_title" placeholder="Screenshot Title" readonly>
                            </div>
                        </div>
                    </div>
                 




                <!-- </div> -->

                <!-- <div class="row"> -->

                    <div class="col-md-6  ">
                        <img class="screenshot_view_image" src="<?php echo base_url() ?>uploads/data/course_share/<?php echo $view_screenshots->img_1 ?>" alt="view_screenshot">
                    </div>

                    
                </div>
             
                <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <?php if($view_screenshots->status==COURSE_SHARE_PENDING) {?>
                            <div class="form-group mb-5">
                                <a class="btn btn-success text-white" data-toggle="tooltip" data-placement="top" id="approve_screenshot"><span class="fa fa-check mr-1 "></span>Approve</a>
                                <a class="btn btn-danger ml-3 text-white" data-toggle="tooltip" data-placement="top" data-toggle="modal" data-target="#exampleModal" id="reject_screenshot"><span class="fa fa-times mr-1"></span>Reject</a>
                            </div>
                            <?php }?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#approve_screenshot').click(function() {
        screenshot_id = $('#screenshot_id').val();
        user_id   = $('#user_id').val();
        course_id = $('#course_id').val();

        if (confirm('Are you want to approve this screenshots')) {
            $.ajax({
                url: '<?php echo base_url(); ?>backend/Course_purchase/ChangeStatus/',
                type: "POST",
                cache: false,
                data: {
                    screenshot_id: screenshot_id,
                    user_id: user_id,
                    course_id: course_id,
                    status: 1,
                },
                success: function(response) {
                    if (response) {
                        toastr.success("Status Updated Successfully");
                    } else {
                        toastr.error("Something Went Wrong.");
                    }
                    setTimeout(function() {
                        window.location.href = '<?php echo base_url() ?>' + 'backend/Course_purchase/users_course_approval'
                    }, 1000);
                }
            });
        }


    });

    $('#reject_screenshot').click(function() {
        user_id   = $('#user_id').val();

        $('#reject_modal').css('display', 'block');
        $('#reject_modal').css('opacity', '1');
        $('#reject_modal').css('top', '16px');
        $('#reject_modal').css('padding-top', '20px');
        $('.close').click(function() {
            $('#reject_modal').css('display', 'none');
        });

        $("#screenshot_reject").click(function() {
            console.log('i m here');
            reject_reason = $('#reject_reason').val();
            screenshot_id = $('#screenshot_id').val();
            if (reject_reason != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>backend/Course_purchase/ChangeStatus/',
                    type: "POST",
                    cache: false,
                    data: {
                        screenshot_id: screenshot_id,
                        user_id: user_id,
                        // course_id: course_id,
                        reason: reject_reason,
                        status: 2,

                    },
                    success: function(response) {
                        if (response) {
                            toastr.success("Status Updated Successfully");
                        } else {
                            toastr.error("Something Went Wrong.");
                        }
                        setTimeout(function() {
                        window.location.href = '<?php echo base_url() ?>' + 'backend/Course_purchase/users_course_approval'
                        }, 1000);
                    }
                });
            } else {
                toastr.error("Please enter reason for reject screenshot");

            }
        });

    });
</script>