<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <?php
                echo form_open_multipart('backend/Course/insert', [
                    'autocomplete' => false, 'id' => 'course_vali', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_course')]);
                ?>
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Course Name *</label>
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

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Course Type *</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="course_type_id" required>
                            <option value="">Select Type</option>

                            <?php
                            foreach ($CourseType as $coursetype) : ?>
                                <option value="<?php echo $coursetype->id; ?>"><?php echo $coursetype->name; ?></option>
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
                            <input class="form-check-input" type="radio" name="chapter" id="yes" value="yes" checked>
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

                            <select class="js-example-basic-multiple pincode" name="pincode[]" multiple="multiple" id="pincode" onchange="handlePincodeChange(this)">

                                <?php foreach ($UserPincode as $key => $value) { ?>
                                    <option value="<?php echo $value['pincode'] ?>"><?php echo $value['pincode'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Age Group </label>
                        <div class="col-sm-10">
                            <input type="text" class="js-range-slider" name="my_range" value="" data-skin="round" data-type="double" data-min="0" data-max="100" data-grid="false" id="age_range" />

                            <input type="number" name="min_age" id="min_age" maxlength="3" value="0" class="from" />
                            <input type="number" name="max_age" id="max_age" axlength="3" value="100" class="to" />
                        </div>
                    </div>



                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label" style="    padding-top: calc(-0.125rem + 1px);
">Gender </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">

                                <input class="form-check-input gen_checkbox" type="checkbox" name="male" id="male" value="male" checked>
                                <label class="form-check-label" for="male">Male</label>

                                <input class="form-check-input ml-3 gen_checkbox" type="checkbox" id="female" name="female" value="female" checked>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Occupation </label>
                        <div class="col-sm-10 mt-2">
                            <select id="occupation" name="occupation" class="form-control">
                                <option value="0">All Occupation</option>

                                <?php
                                foreach ($AllOccupation as $occupation) : ?>
                                    <option value="<?php echo $occupation->id; ?>"><?php echo $occupation->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Education </label>
                        <div class="col-sm-10 mt-2">
                            <select id="education" name="education" class="form-control">
                                <option value="0">All Education</option>

                                <?php
                                foreach ($AllEducation as $education) : ?>
                                    <option value="<?php echo $education->id; ?>"><?php echo $education->name; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>


                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Hobby </label>
                        <div class="col-sm-10 mt-2">
                            <select id="hobby" class="form-control" name="hobby">
                                <option value="0">All Hobby</option>

                                <?php
                                foreach ($AllHobby as $hobby) : ?>
                                    <option value="<?php echo $hobby->id; ?>"><?php echo $hobby->name; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Heard about us </label>
                        <div class="col-sm-10 mt-2">
                            <select id="heard_about_us" class="form-control" name="heard_about_us">
                                <option value="0">All Heard About Us</option>

                                <?php
                                foreach ($AllHeardAbout as $heardabout) : ?>
                                    <option value="<?php echo $heardabout->id; ?>"><?php echo $heardabout->name; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Area of interest </label>
                        <div class="col-sm-10 mt-2">
                            <select id="area_of_interest" class="form-control" name="area_of_interest">
                                <option value="0">All Area of Interest</option>

                                <?php
                                foreach ($AllAreaInterest as $areainterest) : ?>
                                    <option value="<?php echo $areainterest->id; ?>"><?php echo $areainterest->name; ?></option>
                                <?php endforeach; ?>


                            </select>
                        </div>
                    </div>




                </div>
                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Reward Point *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="reward_point" value="0"  id="reward_point" placeholder="Enter Reward Point" onblur="removeLeadingZeros(this)">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Number of User *</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="number" name="no_of_usr" value="0" id="no_of_usr" placeholder="Number Of User" onblur="removeLeadingZeros(this)">
                    </div>
                </div>

                <div class="mb-4">
                    <span>User count :- <span style="color: #006cfa;"  id="user_count"><?= $AllUser ?></span> </span>
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
        function removeLeadingZeros(input) {
         // Get the current value of the input field
         let value = input.value;

         // Remove leading zeros using parseInt
         let newValue = parseInt(value, 10);

         // Check if the parsed value is NaN (Not-a-Number)
         if (isNaN(newValue)) {
        // If the parsed value is NaN, set the input value to 0
         input.value = 0;
         } else {
        // Set the input value to the parsed value without leading zeros
        input.value = newValue;
         }
    }
        $('#specific_data').css('display', 'none');
        $('#all_user').click(function() {
            $('#specific_data').css('display', 'none');
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url(); ?>backend/Ajax/all_user_onchange/", // Update with the actual URL
                data: {},
                success: function(response) {
                    // Process the response from the server
                    $('#user_count').html(response);

                },
                error: function(xhr, status, error) {
                    console.error('AJAX request error:', error);
                }
            });
        });
        $('#specific_user').click(function() {
            $('#specific_data').css('display', 'block');
        });

        function user_submit() {
            var male_checkbox = document.getElementById("male");
            var female_checkbox = document.getElementById("female");
            var pincode = $('#pincode').val();
            var min_age = $('#min_age').val();
            var max_age = $('#max_age').val();
            var male_value = male_checkbox.checked ? male_checkbox.value : "";
            var female_value = female_checkbox.checked ? female_checkbox.value : "";
            var occupation = $('#occupation').val();
            var education = $('#education').val();
            var hobby = $('#hobby').val();
            var heard_about_us = $('#heard_about_us').val();
            var area_of_interest = $('#area_of_interest').val();

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>backend/Ajax/user_onchange/", // Update with the actual URL
                data: {
                    pincode: pincode,
                    min_age: min_age,
                    max_age: max_age,
                    male: male_value,
                    female: female_value,
                    occupation: occupation,
                    education: education,
                    hobby: hobby,
                    heard_about_us: heard_about_us,
                    area_of_interest: area_of_interest,
                },
                success: function(response) {
                    // Process the response from the server
                    $('#user_count').html(response);

                },
                error: function(xhr, status, error) {
                    console.error('AJAX request error:', error);
                }
            });

        }

        function set_min_and_age(data) {
            const minAge = data.from;
            const maxAge = data.to;
            $('#min_age').val(minAge);
            $('#max_age').val(maxAge);
        }
        $("#age_range").ionRangeSlider({
            type: "single",
            min: 0,
            max: 100,
            from: 0,
            keyboard: true,
            onStart: function(data) {
                console.log("onStart");
            },
            onChange: function(data) {
                set_min_and_age(data);
                user_submit();

            },
            onFinish: function(data) {
                set_min_and_age(data, 'i m here 2 on finish');
            },
            onUpdate: function(data) {
                console.log("onUpdate");
            }
        });



        function handlePincodeChange() {
            user_submit();
        }
        $(".from, .to").on("change", function() {
            user_submit();
        });
        $('.gen_checkbox').on('click', function() {
            user_submit();
        });
        $('#occupation').change(function() {
            user_submit();
        });
        $('#education').change(function() {
            user_submit();
        });
        $('#hobby').change(function() {
            user_submit();
        });
        $('#heard_about_us').change(function() {
            user_submit();
        });
        $('#area_of_interest').change(function() {
            user_submit();
        });
    
    </script>