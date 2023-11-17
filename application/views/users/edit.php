
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/user/update', [
                    'autocomplete' => false, 'id' => 'edit_reg', 'method' => 'post'
                ], ['id'=>$this->url_encrypt->encode($edituser->id), 'type' => $this->url_encrypt->encode('tbl_users')])
                ?>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="id" value="<?=$edituser->id?>" >
                    <div class="col-md-12 mb-3">
                    <img style="display: block;margin:auto;width:180px"  src="<?= $edituser->img?base_url().'uploads/data/course_share/'.$edituser->img: base_url().'uploads/profile/user_profile.png'?>" alt="profile_image">
                </div>
                <div class="form-group">
                 <label for="name"> Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?=$edituser->name?>" >
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="<?= $edituser->last_name?>" >

                </div>

                <div class="form-group">
                    <label for="email_id">Email Id</label>
                    <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Enter Email Id" value="<?= $edituser->email?>" >

                </div>

                <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="number" class="form-control" id="mobile_number" name="mobile" placeholder="Enter Mobile Number" value="<?= $edituser->mobile?>" >

                </div>


                <!-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">

                </div> -->

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth" value="<?= $edituser->date_of_birth ?>" >

                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Gender *</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="checkbox" name="gender" id="male" value="male" <?php echo $edituser->gender=='male'?'checked':'' ?>>
                            <label class="form-check-label" for="male" >Male</label>

                            <input class="form-check-input ml-3" type="checkbox" id="female" name="gender" value="female" <?php echo $edituser->gender=='female'?'checked':'' ?>>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pincode">Area Pin Code</label>
                    <input type="number" class="form-control" name="pincode" id="pincode" placeholder="Enter Your Pincode" value="<?= $edituser->pincode ?>" >

                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Occupation *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="occupation" name="occupation" class="form-control" >
                        <option value="">Select Occupation</option>

                           <?php
                            foreach ($AllOccupation as $occupation) : ?>
                                <option value="<?php echo $occupation->id; ?>" <?php echo $occupation->id==$edituser->occupation_id?'selected':'' ?>><?php echo $occupation->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Education *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" name="education" class="form-control" >
                        <option value="">Select Education</option>

                        <?php
                            foreach ($AllEducation as $education) : ?>
                                <option  value="<?php echo $education->id; ?>"<?php echo $education->id==$edituser->education_id?'selected':'' ?>><?php echo $education->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>


                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Hobby *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" class="form-control" name="hobby" >
                        <option value="">Select Hobby</option>

                          <?php
                            foreach ($AllHobby as $hobby) : ?>
                            <?php 
                            // print_r($hobby); 
                                // die('i m here');
                            ?>
                                <option value="<?php echo $hobby->id; ?>" <?php echo $hobby->id==$edituser->hobby_id?'selected':'' ?>><?php echo $hobby->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Heard about us *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" class="form-control" name="heard_about_us" >
                        <option value="">Select Heard About Us</option>

                         <?php
                            foreach ($AllHeardAbout as $heardabout) : ?>
                                <option value="<?php echo $heardabout->id; ?>" <?php echo $heardabout->id==$edituser->heard_about_us_id?'selected':'' ?>><?php echo $heardabout->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>

                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Area of interest *</label>
                    <div class="col-sm-10 mt-2">
                        <select id="inputState" class="form-control" name="area_of_interest" >
                        <option value="">Select Area of Interest</option>

                          <?php
                            foreach ($AllAreaInterest as $areainterest) : ?>
                                <option value="<?php echo $areainterest->id; ?>" <?php echo $areainterest->id==$edituser->area_of_interest_id?'selected':'' ?>><?php echo $areainterest->name; ?></option>
                            <?php endforeach; ?>


                        </select>
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
