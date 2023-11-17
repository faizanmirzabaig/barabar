<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    a {
        color: unset;

    }

    a:hover {
        text-decoration: unset;
    }
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <ul class="nav nav-tabs">
                    <!-- <li class="active"><a data-toggle="tab" href="#wins">Wins</a></li> -->
                    <li class="active"><a data-toggle="tab" href="#ViewUser">View User</a></li>
                    <li><a data-toggle="tab" href="#Withdrawal">Withdrawal </a></li>
                    <li><a data-toggle="tab" href="#Donation">Donation </a></li>
                    <li><a data-toggle="tab" href="#quiz_reward">Quiz Reward </a></li>
                </ul>
                <div class="tab-content">
                    <br>
                    <div id="ViewUser" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        echo form_open_multipart('backend/user/update', [
                                            'autocomplete' => false, 'id' => 'edit_creator', 'method' => 'post'
                                        ], ['id' => $this->url_encrypt->encode($user->id), 'type' => $this->url_encrypt->encode('tbl_users')])
                                        ?>

                                        <div class="form-group">
                                            <label for="name"> Name</label>
                                            <input type="text" class="form-control" id="name" name="first_name" placeholder="Name" value="<?= $user->name ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="<?= $user->last_name ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="email_id"> Email Id</label>
                                            <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Enter email" value="<?= $user->email ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="password"> Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?= $user->password ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth" value="<?= $user->date_of_birth ?>" readonly>

                                        </div>

                                        <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Gender *</label>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox" name="gender" id="male" value="male" <?php echo $user->gender == 'male' ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="male">Male</label>

                                                    <input class="form-check-input ml-3" type="checkbox" id="female" name="gender" value="female" <?php echo $user->gender == 'female' ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="female">Female</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="pincode">Area Pin Code</label>
                                            <input type="number" class="form-control" name="pincode" id="pincode" placeholder="Enter Your Pincode" value="<?= $user->pincode ?>" readonly>

                                        </div>

                                        <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Occupation *</label>
                                            <div class="col-sm-10 mt-2">
                                                <select id="occupation" name="occupation" class="form-control" readonly>
                                                    <option value="">Select Occupation</option>

                                                    <?php
                                                    foreach ($AllOccupation as $occupation) : ?>
                                                        <option value="<?php echo $occupation->id; ?>" <?php echo $occupation->id == $user->occupation_id ? 'selected' : '' ?>><?php echo $occupation->name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Education *</label>
                                            <div class="col-sm-10 mt-2">
                                                <select id="inputState" name="education" class="form-control" readonly>
                                                    <option value="">Select Education</option>

                                                    <?php
                                                    foreach ($AllEducation as $education) : ?>
                                                        <option value="<?php echo $education->id; ?>" <?php echo $education->id == $user->education_id ? 'selected' : '' ?>><?php echo $education->name; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Hobby *</label>
                                            <div class="col-sm-10 mt-2">
                                                <select id="inputState" class="form-control" name="hobby" readonly>
                                                    <option value="">Select Hobby</option>

                                                    <?php
                                                    foreach ($AllHobby as $hobby) : ?>
                                                        <option value="<?php echo $hobby->id; ?>" <?php echo $hobby->id == $user->hobby_id ? 'selected' : '' ?>><?php echo $hobby->name; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Heard about us *</label>
                                            <div class="col-sm-10 mt-2">
                                                <select id="inputState" class="form-control" name="heard_about_us" readonly>
                                                    <option value="">Select Heard About Us</option>

                                                    <?php
                                                    foreach ($AllHeardAbout as $heardabout) : ?>
                                                        <option value="<?php echo $heardabout->id; ?>" <?php echo $heardabout->id == $user->heard_about_us_id ? 'selected' : '' ?>><?php echo $heardabout->name; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Area of interest *</label>
                                            <div class="col-sm-10 mt-2">
                                                <select id="inputState" class="form-control" name="area_of_interest" readonly>
                                                    <option value="">Select Area of Interest</option>

                                                    <?php
                                                    foreach ($AllAreaInterest as $areainterest) : ?>
                                                        <option value="<?php echo $areainterest->id; ?>" <?php echo $areainterest->id == $user->area_of_interest_id ? 'selected' : '' ?>><?php echo $areainterest->name; ?></option>
                                                    <?php endforeach; ?>


                                                </select>
                                            </div>
                                        </div>
                                        <!-- Add other form fields here -->

                                        <div class="form-group mb-0">
                                            <div>
                                                <a href="<?= base_url('backend/user/edituser/' . $user->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"> Edit</a>

                                                <a href="<?= base_url('backend/user/deleteuser/' . $user->id) ?>" onclick="return confirm('Are You Sure Want To Delete This User?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"> Delete</a>
                                            </div>
                                        </div>

                                        <?php
                                        echo form_close();
                                        ?>
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end ViewUser tab-pane -->

                    <div id="Withdrawal" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>Status</th>
                                    <th>Coins</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($Withdrawal as $key => $Reffer) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $Reffer->name ?></td>
                                        <td>
                                            <?php
                                            if ($Reffer->status == 0) {
                                                echo "Pending";
                                            } elseif ($Reffer->status == 1) {
                                                echo "Approved";
                                            } elseif ($Reffer->status == 2) {
                                                echo "Rejected";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $Reffer->coin ?></td>
                                        <td><?= date("d-m-Y h:i:s A", strtotime($Reffer->created_date)) ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div id="Donation" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>Amount</th>
                                    <!-- <th>Level</th> -->
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($donation as $key => $donate) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $donate->name ?></td>
                                        <td><?= $donate->amount ?></td>
                                        <!-- <td><?= $donate->level ?></td> -->
                                        <td><?= date("d-m-Y h:i:s A", strtotime($donate->added_at)) ?></td>
                                    </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div id="quiz_reward" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>Amount</th>
                                    <!-- <th>Level</th> -->
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($quiz_reward as $key => $donate) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $donate->name ?></td>
                                        <td><?= $donate->quiz_reward ?></td>
                                        <!-- <td><?= $donate->level ?></td> -->
                                        <td><?= date("d-m-Y h:i:s A", strtotime($donate->updated_at)) ?></td>
                                    </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>

<script>
    $(document).ready(function() {
        $('.table').dataTable({
            dom: 'Bfrtip',
            "buttons": [
                'excel'
            ]
        });
    })
</script>