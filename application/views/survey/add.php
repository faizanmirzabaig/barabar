<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/survey/insert', [
                    'autocomplete' => false, 'id' => 'course_vali', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_survey')])
                ?>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Survey Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" required id="name" placeholder="Enter  Name">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Title *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title" required id="title" placeholder="Enter Title">
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Description *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" required="" placeholder="Enter Description"></textarea>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Survey Type *</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="course_type_id" required>
                            <option value="">Select Type</option>

                            <?php
                            foreach ($SurveyType as $surveytype) : ?>
                                <option value="<?php echo $surveytype->id; ?>"><?php echo $surveytype->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Duration *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="duration" min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required id="duration" placeholder="Enter Days">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Price *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="price" min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required id="price" placeholder="Enter Price">
                    </div>
                </div>

                <div class="form-group row"><label for="language" class="col-sm-2 col-form-label">Language *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="language" required id="language" placeholder="Enter Language">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Instructor *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="writer" required id="writer" placeholder="Enter Instructor">
                    </div>
                </div>

                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Serial No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="serial_no" required id="serial_no" placeholder="Enter Serial No">
                    </div>
                </div>

                <div class="form-group row"><label for="image1" class="col-sm-2 col-form-label">Image *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="image1" required id="image1" placeholder="Enter Image">
                    </div>
                </div>

                <div class="form-group row"><label for="video_link" class="col-sm-2 col-form-label">Video Link *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="video_link" required id="video_link" placeholder="Enter Video Link">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="long" class="col-sm-2 col-form-label">Chapter *</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="chapter" id="yes" value="yes">
                            <label class="form-check-label" for="yes">Yes</label>

                            <input class="form-check-input ml-3" type="radio" id="no" name="chapter" value="no">
                            <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lat" style="    padding-top: calc(-0.125rem + 1px);
" class="col-sm-2 col-form-label">View *</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" value="0" name="view" id="all_user" checked>
                            <label class="form-check-label" for="all_user">All User</label>

                            <input class="form-check-input ml-3" type="radio" id="specific_user" value="1" name="view">
                            <label class="form-check-label" for="specific_user">Specific User</label>
                        </div>
                    </div>
                </div>

                <div id="specific_data">

                    <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Pincode </label>
                        <div class="col-sm-10">

                            <select class="js-example-basic-multiple pincode" name="pincode[]" multiple="multiple" id="pincode">

                                <?php foreach ($UserPincode as $key => $value) { ?>
                                    <option value="<?php echo $value['pincode'] ?>"><?php echo $value['pincode'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Age Group </label>
                        <div class="col-sm-10">
                            <input type="text" class="js-range-slider" name="my_range" value="" data-skin="round" data-type="double" data-min="0" data-max="100" data-grid="false" />

                            <input type="number" name="min_age" maxlength="3" value="0" class="from" />
                            <input type="number" name="max_age" maxlength="3" value="100" class="to" />
                        </div>
                    </div>



                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label" style="    padding-top: calc(-0.125rem + 1px);
">Gender </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">

                                <input class="form-check-input" type="checkbox" name="male" id="male" value="male" checked>
                                <label class="form-check-label" for="male">Male</label>

                                <input class="form-check-input ml-3" type="checkbox" id="female" name="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Occupation </label>
                        <div class="col-sm-10 mt-2">
                            <select id="occupation" name="occupation" class="form-control">
                                <option value="">All Occupation</option>

                                <?php
                                foreach ($AllOccupation as $occupation) : ?>
                                    <option value="<?php echo $occupation->id; ?>"><?php echo $occupation->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Education </label>
                        <div class="col-sm-10 mt-2">
                            <select id="inputState" name="education" class="form-control">
                                <option value="">All Education</option>

                                <?php
                                foreach ($AllEducation as $education) : ?>
                                    <option value="<?php echo $education->id; ?>"><?php echo $education->name; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>


                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Hobby </label>
                        <div class="col-sm-10 mt-2">
                            <select id="inputState" class="form-control" name="hobby">
                                <option value="">All Hobby</option>

                                <?php
                                foreach ($AllHobby as $hobby) : ?>
                                    <option value="<?php echo $hobby->id; ?>"><?php echo $hobby->name; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Heard about us </label>
                        <div class="col-sm-10 mt-2">
                            <select id="inputState" class="form-control" name="heard_about_us">
                                <option value="">All Heard About Us</option>

                                <?php
                                foreach ($AllHeardAbout as $heardabout) : ?>
                                    <option value="<?php echo $heardabout->id; ?>"><?php echo $heardabout->name; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Area of interest </label>
                        <div class="col-sm-10 mt-2">
                            <select id="inputState" class="form-control" name="area_of_interest">
                                <option value="">All Area of Interest</option>

                                <?php
                                foreach ($AllAreaInterest as $areainterest) : ?>
                                    <option value="<?php echo $areainterest->id; ?>"><?php echo $areainterest->name; ?></option>
                                <?php endforeach; ?>


                            </select>
                        </div>
                    </div>




                </div>




                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        echo form_reset(['class' => 'btn btn-secondary waves-effect', 'value' => 'Cancel', 'onclick' => 'goBack()']);
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
        };

        // $('input[name="view"]').on('change', function() {
        //     $(this).siblings('input[type="checkbox"]').not(this).prop('checked', false);
        // });
        // $('#yes').on('change', function() {
        //     console.log('hi');
        //     $(this).siblings('input[type="checkbox"]').not(this).prop('checked', false);
        // });
        
        $('#specific_data').css('display', 'none');
        $('#all_user').click(function() {
            $('#specific_data').css('display', 'none');
        });
        $('#specific_user').click(function() {
            $('#specific_data').css('display', 'block');
        });
    </script>