<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php

                echo form_open_multipart('backend/course/update', [
                    'autocomplete' => false, 'id' => 'course_vali', 'method' => 'post'
                ], ['id' => $this->url_encrypt->encode($course[0]->id), 'type' => $this->url_encrypt->encode('tbl_course')]);
                $status = $course[0]->status;
                switch ($status) {
                    case PAYMENT_PEND:
                        $status = "readonly";
                        $submit = "invisible";
                        break;
                    case PENDING:
                        $status = "readonly";
                        $submit = "invisible";
                        break;
                    case APPROVED:
                        $status = "readonly";
                        $submit = "invisible";
                        break;

                    case REJECTED:
                        $status = "";
                        $submit = "";
                        break;

                    case INCOMPLETE:
                        $status = "";
                        $submit = "";
                        break;
                }
                $chapter = $course[0]->chapter;
                switch ($chapter) {
                    case PAYMENT_PEND:
                        $status="readonly";
                        $submit="invisible";
                     break;
                    case PENDING:
                        $chapter = "readonly";
                        $submit = "invisible";
                        break;
                    case APPROVED:
                        $chapter = "readonly";
                        $submit = "invisible";
                        break;

                    case REJECTED:
                        $chapter = "";
                        $submit = "";
                        break;
                    case INCOMPLETE:
                        $chapter = "";
                        $submit = "";
                        break;
                }

                ?>


                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label"> Course name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $course[0]->name ?>" name="name" required id="name" placeholder="Enter Name" <?= $status ?>>
                        <input class="form-control" type="hidden" value="<?= $course[0]->id ?>" name="id" required id="id">
                    </div>
                </div>
                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Title *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $course[0]->title ?>" name="title" required id="title" placeholder="Enter Title" <?= $status ?>>
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Description *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" required="" placeholder="Enter Description" <?= $status ?>> <?= $course[0]->description ?></textarea>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Course Type *</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="course_type_id" <?= $status ?> required>
                            <option value="">Select Type</option>

                            <?php
                            foreach ($CourseType as $coursetype) : ?>
                                <option value="<?php echo $coursetype->id; ?>" <?php echo $coursetype->id == $course[0]->course_type_id ? 'selected' : ''; ?> <?php $coursetype->id == $course[0]->course_type_id ? 'selected' : '' ?>><?php echo $coursetype->name; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Duration *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" value="<?= $course[0]->duration ?>" min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="duration" required id="duration" placeholder="Enter Days" <?= $status ?>>
                    </div>
                </div>

                <!-- <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Price *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" value="<?= $course[0]->price ?>"  min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="price" required id="price" placeholder="Enter Price" <?= $status ?>>
                    </div>
                </div> -->


                <div class="form-group row"><label for="language" class="col-sm-2 col-form-label">Language *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $course[0]->language ?>" name="language" required id="language" placeholder="Enter Language" <?= $status ?>>
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Instructor *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $course[0]->writer ?>" name="writer" required id="writer" placeholder="Enter Instructor" <?= $status ?>>
                    </div>
                </div>

                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Serial No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="serial_no" value="<?= $course[0]->sort ?>" required id="serial_no" placeholder="Enter Serial No" <?= $status ?>>
                    </div>
                </div>

                <?php if (!empty($course[0]->price)) { ?>
                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <image src="<?php echo base_url() ?>uploads/data/content/<?php echo $course[0]->image ?>" style="width:20%" <?= $status ?>>
                        </div>
                    </div>

                    <?php } ?>


                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Image *</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="image1" id="image1" placeholder="Enter Image" <?= $status ?>>
                        </div>
                    </div>



                    <!-- <?php if (!empty($course[0]->videos)) { ?>
                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        

                        <video width="400" controls>
                          <source src="<?php echo base_url() ?>data/coursevideo/<?php echo $course[0]->videos ?>" type="video/mp4">
                        </video>
                    </div>
                </div>

                <?php } ?> -->

                    <!-- <div class="form-group row"><label for="video1" class="col-sm-2 col-form-label">Video *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="video1" accept="video/mp4,video/mp4,video/x-m4v,video/*" id="video1" placeholder="Enter Video">
                    </div>
                </div> -->

                    <div class="form-group row">
                        <label for="video_link" class="col-sm-2 col-form-label">Video Link *</label>
                        <div class="col-sm-10">
                            <input class="form-control" value=<?= $course[0]->video_link ?> type="text" name="video_link" required id="video_link" placeholder="Enter Video Link" <?= $status ?>>
                        </div>
                    </div>
        

            <div class="form-group row">
                <label for="long" class="col-sm-2 col-form-label" style="padding-top: calc(-0.125rem + 1px);">Chapter</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <?php
                        $chapter = $course[0]->chapter;
                        $yes = '';
                        $no = '';

                        switch ($chapter) {
                            case 'yes': // Corrected the switch cases here
                                $yes = 'checked';
                                break;
                            case 'no':
                                $no = 'checked';
                                break;
                        }
                        ?>
                        <input class="form-check-input" type="checkbox" name="chapter" id="yes" value="yes" <?= $yes ?> disabled>
                        <label class="form-check-label" for="yes">Yes</label>

                        <input class="form-check-input ml-3" type="checkbox" name="chapter" id="no" value="no" <?= $no ?> disabled>
                        <label class="form-check-label" for="no">No</label>
                    </div>
                </div>
            </div>


            <div class="form-group row"><label for="lat" style="    padding-top: calc(-0.125rem + 1px);
" class="col-sm-2 col-form-label">View *</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" value="0" name="view" id="all_user" <?php echo ($course[0]->view == 0) ? 'checked' : '' ?> <?= $status ?>>
                        <label class="form-check-label" for="all_user">All User</label>

                        <input class="form-check-input ml-3" type="radio" id="specific_user" <?php echo ($course[0]->view == 1) ? 'checked' : '' ?> value="1" name="view" <?= $status ?>>
                        <label class="form-check-label" for="specific_user">Specific User</label>
                    </div>
                </div>
            </div>
            <?php
            ?>
            <div id="specific_data">

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Pincode </label>
                    <div class="col-sm-10">

                        <select class="js-example-basic-multiple pincode" name="pincode[]" multiple="multiple" id="pincode" <?= $status ?>>

                            <?php foreach ($UserPincode as $key => $value) {
                                $pincode_array = explode(',', $course[0]->pincode);
                                // die($value['pincode']);
                            ?>

                                <option value="<?php echo $value['pincode'] ?>" <?= in_array($value['pincode'], $pincode_array) ? 'selected' : ''; ?>><?php echo $value['pincode'] ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Age Group </label>
                    <div class="col-sm-10">
                        <input type="text" class="js-range-slider" name="my_range" value="" data-skin="round" data-type="double" data-min="0" data-max="100" data-grid="false" />

                        <input type="number" name="min_age" maxlength="3" value="<?= $course[0]->min_age ?>" class="from" <?= $status ?> />
                        <input type="number" name="max_age" maxlength="3" value="<?= $course[0]->max_age ?>" class="to" <?= $status ?> />
                    </div>
                </div>



                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label" style="    padding-top: calc(-0.125rem + 1px);
               ">Gender </label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <?php
                            $gender = $course[0]->gender;
                            $male = '';
                            $female = '';
                            $both_gender = '';
                            switch ($gender) {
                                case 0:
                                    $male = 'checked';
                                    break;
                                case 1:
                                    $female = 'checked';
                                    break;
                                case 2:
                                    $both_gender = 'checked';
                                    break;
                            }

                            ?>
                            <input class="form-check-input" type="checkbox" name="male" id="male" value="male" <?= $status ?> <?php echo ($both_gender == 'checked') ? 'checked' : (($male == 'checked' ? 'checked' : '')) ?>>
                            <label class="form-check-label" for="male">Male</label>

                            <input class="form-check-input ml-3" type="checkbox" name="female" id="female" value="female" <?= $status ?> <?php echo ($both_gender == 'checked') ? 'checked' : (($female == 'checked' ? 'checked' : '')) ?>>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Occupation </label>
                    <div class="col-sm-10 mt-2">
                        <select id="occupation" name="occupation" class="form-control" <?= $status ?>>
                            <option value="">All Occupation</option>

                            <?php
                            foreach ($AllOccupation as $occupation) : ?>
                                <option value="<?php echo $occupation->id; ?>" <?php echo $occupation->id == $course[0]->occupation_id ? 'selected' : '' ?>><?php echo $occupation->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Education </label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" name="education" class="form-control" <?= $status ?>>
                            <option value="">All Education</option>

                            <?php
                            foreach ($AllEducation as $education) : ?>
                                <option value="<?php echo $education->id; ?>" <?php echo $education->id == $course[0]->education_id ? 'selected' : '' ?>><?php echo $education->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Hobby </label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" class="form-control" name="hobby" <?= $status ?>>
                            <option value="">All Hobby</option>

                            <?php
                            foreach ($AllHobby as $hobby) : ?>
                                <option value="<?php echo $hobby->id; ?>" <?php echo $hobby->id == $course[0]->hobby_id ? 'selected' : '' ?>><?php echo $hobby->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Heard about us </label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" class="form-control" name="heard_about_us" <?= $status ?>>
                            <option value="">All Heard About Us</option>

                            <?php
                            foreach ($AllHeardAbout as $heardabout) : ?>
                                <option value="<?php echo $heardabout->id; ?>" <?php echo $heardabout->id == $course[0]->heard_about_us_id ? 'selected' : '' ?>><?php echo $heardabout->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Area of interest </label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" class="form-control" name="area_of_interest" <?= $status ?>>
                            <option value="">All Area of Interest</option>

                            <?php
                            foreach ($AllAreaInterest as $areainterest) : ?>
                                <option value="<?php echo $areainterest->id; ?>" <?php echo $areainterest->id == $course[0]->area_of_interest_id ? 'selected' : '' ?>><?php echo $areainterest->name; ?></option>
                            <?php endforeach; ?>


                        </select>
                    </div>
                </div>




            </div>
            <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Reward Point *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="reward_point" required id="reward_point" placeholder="Enter Reward Point" value="<?= $course[0]->reward_point ?>" <?= $status ?>>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Number of User *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="no_of_usr" required id="no_of_usr" placeholder="Number Of User" value="<?= $course[0]->no_of_usr ?> " <?= $status ?>>
                    </div>
                </div>



            <div class="form-group mb-0">
                <div>
                    <?php
                    echo form_submit('submit', 'Submit', ['class' => "btn btn-primary waves-effect waves-light mr-1 $submit"]);
                    echo form_reset(['class' => 'btn btn-secondary waves-effect', 'value' => 'Back', 'onclick' => 'goBack()']);
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
    $('#specific_data').css('display', 'none');
    <?php if ($course[0]->view == 1) { ?>
        $('#specific_data').css('display', 'block');

    <?php } ?>

    $('#all_user').click(function() {

        $('#specific_data').css('display', 'none');

    });
    $('#specific_user').click(function() {


        $('#specific_data').css('display', 'block');


    });
</script>