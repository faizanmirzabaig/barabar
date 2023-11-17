<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title><?= PROJECT_NAME ?></title>

    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/metismenu.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/toastr.css') ?>" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/toastr.min.js') ?>"></script>
    <script>
        const BASE_URL = '<?= base_url() ?>';
    </script>
</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="<?= base_url() ?>" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="wrapper-page">
        <div class="card overflow-hidden account-card mx-3">
            <div class="bg-primary p-4 text-white text-center position-relative">
                <p class="text-white-50 mb-4">Register to continue to <?= PROJECT_NAME ?> Portal.</p>
                <a href="#" class="logo logo-admin"><img src="<?= base_url('uploads/logo/wheel.png') ?>" class="shape_logo"></a>
            </div>
            <div class="account-card-content">
                <?php
                echo form_open_multipart('backend/Auth/registration', [
                    'autocomplete' => false, 'id' => 'add_ad_reg', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_admin')])
                ?>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">

                </div>

                <div class="form-group">
                    <label for="email_id">Email Id</label>
                    <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Enter Email Id">

                </div>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">

                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth">

                </div>

                <label for="exampleInputPassword1">Gender</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gender" id="male" value="male" checked>
                        <label class="form-check-label" for="male">Male</label>

                    <!-- </div> -->
                    <!-- <div class="form-check form-check-inline"> -->
                        <input class="form-check-input ml-3" type="checkbox" id="female" name="gender" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pincode">Area Pin Code</label>
                    <input type="number" class="form-control" name="pincode" id="pincode" placeholder="Enter Your Pincode">

                </div>

                <div class="form-group ">
                    <label for="occupation">Occupation</label>
                    <select id="occupation" name="occupation" class="form-control">
                       <option value="">Select Occupation</option>
                        <?php
                        foreach ($AllOccupation as $occupation) : ?>
                            <option value="<?php echo $occupation->id; ?>"><?php echo $occupation->name; ?></option>
                        <?php endforeach; ?>


                    </select>
                </div>

                <div class="form-group ">
                    <label for="inputState">Education</label>
                    <select id="inputState" name="education" class="form-control">
                    <option value="">Select Education</option>

                      <?php
                        foreach ($AllEducation as $education) : ?>
                            <option value="<?php echo $education->id; ?>"><?php echo $education->name; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group ">
                    <label for="inputState">Hobby</label>
                    <select id="inputState" class="form-control" name="hobby">
                    <option value="">Select Hobby</option>

                    <?php
                        foreach ($AllHobby as $hobby) : ?>
                            <option value="<?php echo $hobby->id; ?>"><?php echo $hobby->name; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group ">
                    <label for="inputState">Heard about us</label>
                    <select id="inputState" class="form-control" name="heard_about_us">
                    <option value="">Select Heard About Us</option>

                       <?php
                        foreach ($AllHeardAbout as $heardabout) : ?>
                            <option value="<?php echo $heardabout->id; ?>"><?php echo $heardabout->name; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group ">
                    <label for="inputState">Area of interest</label>
                   
                    <select id="inputState" class="form-control" name="area_of_interest">
                    <option value="">Select Area of Interest</option>

                      <?php
                        foreach ($AllAreaInterest as $areainterest) : ?>
                            <option value="<?php echo $areainterest->id; ?>"><?php echo $areainterest->name; ?></option>
                        <?php endforeach; ?>


                    </select>
                </div>
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        ?>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>

        <div class="m-t-40 text-center">
            <p>© <?= date("Y") ?> Androapps Technology.</p>
        </div>
    </div><!-- end wrapper-page -->
    </div><!-- end wrapper-page -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.slimscroll.js') ?>"></script>
    <script src="<?= base_url('assets/js/waves.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom/validation.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').on('change', function() {
                $(this).siblings('input[type="checkbox"]').not(this).prop('checked', false);
            });
        });
        // $(document).ready(function() {
        //     $("#Registration1").submit(function(event) {
        //         event.preventDefault();
        //         $("#form1").hide();
        //         $("#form2").show();
        //     });

        // Handle form submission for the second form
        //     $("#Registration2").submit(function(event) {
        //         // event.preventDefault();
        //         // Process the form submission here
        //         console.log("Second form submitted!");
        //     });
        // });
    </script>

</body>

</html>