<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/Auth/registration', [
                    'autocomplete' => false, 'id' => 'add_ad_reg', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_admin')])
                ?>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">First Name *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Last Name *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder=" Last Name">
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Email Id *</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email_id" name="email_id" placeholder=" Email Id">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Password *</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Date of Birth *</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Gender *</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="checkbox" name="gender" id="male" value="male" checked>
                            <label class="form-check-label" for="male">Male</label>

                            <input class="form-check-input ml-3" type="checkbox" id="female" name="gender" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Pincode *</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="pincode" id="pincode" placeholder="Enter Your Pincode">
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Occupation *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="occupation" name="occupation" class="form-control">
                        <option value="">Select Occupation</option>

                           <?php
                            foreach ($AllOccupation as $occupation) : ?>
                                <option value="<?php echo $occupation->id; ?>"><?php echo $occupation->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Education *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" name="education" class="form-control">
                        <option value="">Select Education</option>

                            <?php
                            foreach ($AllEducation as $education) : ?>
                                <option value="<?php echo $education->id; ?>"><?php echo $education->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Hobby *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" class="form-control" name="hobby">
                        <option value="">Select Hobby</option>

                           <?php
                            foreach ($AllHobby as $hobby) : ?>
                                <option value="<?php echo $hobby->id; ?>"><?php echo $hobby->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Heard about us *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" class="form-control" name="heard_about_us">
                        <option value="">Select Heard About Us</option>

                          <?php
                            foreach ($AllHeardAbout as $heardabout) : ?>
                                <option value="<?php echo $heardabout->id; ?>"><?php echo $heardabout->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Area of interest *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" class="form-control" name="area_of_interest">
                        <option value="">Select Area of Interest</option>

                            <?php
                            foreach ($AllAreaInterest as $areainterest) : ?>
                                <option value="<?php echo $areainterest->id; ?>"><?php echo $areainterest->name; ?></option>
                            <?php endforeach; ?>


                        </select>
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
        $(document).ready(function() {
            function goBack() {
                window.history.back();
            }
            $('input[type="checkbox"]').on('change', function() {
                $(this).siblings('input[type="checkbox"]').not(this).prop('checked', false);
            });
        });
    </script>