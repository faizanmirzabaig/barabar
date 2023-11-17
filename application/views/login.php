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
    <!-- <link href="<?= base_url('assets/js/toastr.min.js') ?>" rel="stylesheet" type="text/css"> -->
</head>

<body>
    <div class="home-btn d-none d-sm-block"><a href="<?= base_url()?>" class="text-dark"><i class="fas fa-home h2"></i></a></div>
    <div class="wrapper-page">
        <div class="card overflow-hidden account-card mx-3">
            <div class="bg-primary p-4 text-white text-center position-relative">
                <!-- <h4 class="font-20 m-b-5">Welcome Back !</h4> -->
                <p class="text-white-50 mb-4">Sign in to continue to <?= PROJECT_NAME ?> Portal.</p><a href="#" class="logo logo-admin"><img src="<?= base_url('uploads/logo/wheel.png') ?>" class="shape_logo"></a>
            </div>
            <div class="account-card-content">
                <?php
                echo  $this->load->view('src/notification', TRUE, true);
                $form = array(
                    'class' => 'form-horizontal m-t-30',
                    'id' => 'login',
                    'autocomplete' => 'off'
                );
                echo form_open('backend/auth/index', $form);
                ?>


                <div class="form-group"><label for="username">Username</label>
                    <?php
                    $email = array(

                        'id' => 'email',
                        'name' => 'email',
                        'type' => 'email',
                        'class' => 'form-control',
                        'required' => '',
                        'value' => set_value('email'),
                        'placeholder' => 'Username'
                    );
                    echo form_input($email);
                    ?>

                    <div class="form-group"><label for="userpassword">Password</label>
                        <?php
                        $password = array(

                            'id' => 'password',
                            'name' => 'password',
                            'type' => 'password',
                            'class' => 'form-control',
                            'required' => '',
                            'value' => set_value('password'),
                            'placeholder' => 'Password'
                        );
                        echo form_input($password);
                        ?>
                        <div class="form-group row m-t-20">
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customControlInline"> <label class="custom-control-label" for="customControlInline">Remember me</label></div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <?php
                                echo form_submit('submit', 'Log In', array('class' => 'btn btn-primary w-md waves-effect waves-light'));
                                ?>
                                <!-- <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button></div> -->
                            </div>
                            <div class="form-group m-t-10 mb-0 row">
                                <!-- <div class="col-12 m-t-20">Not a member?<a href=""> Register</a></div> -->
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="m-t-40 text-center">
                        <p>Not a member? <a href="<?= base_url('backend/auth/register') ?>" class="font-500 text-primary">Register</a></p>
                        <p>© <?= date("Y") ?> Androapps Technology.</p>
                    </div>
                </div><!-- end wrapper-page -->
                <!-- jQuery  -->

                <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
                <script src="<?= base_url('assets/js/metisMenu.min.js') ?>"></script>
                <script src="<?= base_url('assets/js/jquery.slimscroll.js') ?>"></script>
                <script src="<?= base_url('assets/js/waves.min.js') ?>"></script>
                <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>