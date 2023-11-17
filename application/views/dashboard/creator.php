<div class="row">
    <div class="col-xl-3 col-md-6">
        <a href="<?= base_url("backend/user") ?>">
            <div class="card bg_dasbord_box mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4"><img src="<?= base_url("assets/images/coin.png") ?>"
                                alt=""><i class="fa fa-user"></i></div>
                        <h5 class="font-14 text-uppercase mt-0 text-white-50">Total no. of Users</h5>
                        <h4 class="font-500"><?= number_format($totalUsers) ?></h4>

                        <!-- <div class="mini-stat-label bg-success">
                                    <p class="mb-0">+ 12%</p>
                                 </div>  -->
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="<?= base_url("backend/course") ?>">
            <div class="card bg_dasbord_box mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4"><img src="<?= base_url("assets/images/coin.png") ?>"
                                alt=""><i class="fa fa-chalkboard"></i></div>
                        <h5 class="font-14 text-uppercase mt-0 text-white-50">Total no. of Courses</h5>
                        <h4 class="font-500"><?= number_format($totalCourses) ?></h4>

                        <!-- <div class="mini-stat-label bg-success">
                                    <p class="mb-0">+ 12%</p>
                                 </div>  -->
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="<?= base_url("backend/course_purchase") ?>">
            <div class="card bg_dasbord_box mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4"><img src="<?= base_url("assets/images/coin.png") ?>"
                                alt=""><i class="fa fa-wallet"></i></div>
                        <h5 class="font-14 text-uppercase mt-0 text-white-50">Total no. of Course Purchase</h5>
                        <h4 class="font-500"><?= number_format($totalCoursePurchase) ?></h4>

                        <!-- <div class="mini-stat-label bg-success">
                                    <p class="mb-0">+ 12%</p>
                                 </div>  -->
                    </div>
                </div>
            </div>
        </a>
    </div>
    
</div>