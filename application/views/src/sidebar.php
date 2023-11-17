<!-- Top Bar End -->
<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
   <div class="slimscroll-menu" id="remove-scroll">
      <!--- Sidemenu -->
      <div id="sidebar-menu">
         <!-- Left Menu Start -->
         <ul class="metismenu" id="side-menu">
            <li><a href="<?= base_url('backend/dashboard') ?>" class="waves-effect"><i class="ti-home"></i><span>Dashboard</span></a></li>
            <li style="color:#cfd0d9 !important" class="menu-title">Content</li>

            <?php
            $role = $this->session->userdata('role');

            ?>

            <?php if ($role == SUPERADMIN) : ?>
               <!-- Admin Sidebar Content -->
               <li><a href="<?= base_url('backend/banner') ?>" class="waves-effect"><i class="fa fa-image"></i><span>Banner</span></a></li>
               <li><a href="<?= base_url('backend/user') ?>" class="waves-effect"><i class="fa fa-users"></i><span>Users</span></a></li>
               <li><a href="<?= base_url('backend/Course_purchase/users_course_approval') ?>" class="waves-effect"><i class="fa fa-users"></i><span>Users Course Approval</span></a></li>

               <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="fa fa-book"></i>
                     <span>Course</span>
                  </a>
                  <ul class="sub-menu mm-collapse">
                     <li><a href="<?= base_url('backend/course/') ?>" class="waves-effect"><span>Our Course</span></a></li>
                     <li><a href="<?= base_url('backend/course/creatorcourses') ?>" class="waves-effect"><span>Creator Course</span></a></li>
                     <!-- <li ><a href="<?= base_url('backend/creator/creatorapproval') ?>" class="waves-effect"><span>Creator Mangement</span></a></li>
               <li ><a href="<?= base_url('backend/creator') ?>" class="waves-effect"><span>Creator list</span></a></li> -->

                  </ul>

               </li>



               <li><a href="<?= base_url('backend/creator') ?>" class="waves-effect"><i class="fa fa-user-graduate"></i><span>Creator</span></a></li>
               <li><a href="<?= base_url('backend/manager') ?>" class="waves-effect"><i class="fa fa-user-tie"></i><span>Managers</span></a></li>
               <li><a href="<?= base_url('backend/course_purchase') ?>" class="waves-effect"><i class="fa fa-credit-card"></i><span>Course Purchase</span></a></li>
               <li><a href="<?= base_url('backend/quiz/quizreport') ?>" class="waves-effect"><i class="fa fa-lightbulb"></i><span>Quiz Report</span></a></li>
               <li><a href="<?= base_url('backend/BotQuestion/index') ?>" class="waves-effect"><i class="fa fa-lightbulb"></i><span>Bot Question</span></a></li>
               <li><a href="<?= base_url('backend/chat') ?>" class="waves-effect"><i class="fa fa-comment"></i><span>Chat</span></a></li>
               <li><a href="<?= base_url('backend/Purchase') ?>" class="waves-effect"><i class="fa fa-comment"></i><span>Add Wallet</span></a></li>
               <li><a href="<?= base_url('backend/Donation') ?>" class="waves-effect"><i class="fa fa-money-bill"></i><span>Donation</span></a></li>
               <li><a href="<?= base_url('backend/Withdrawal') ?>" class="waves-effect"><i class="fa fa-dollar-sign"></i><span>Withdrawal Wallet</span></a></li>
               <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="fa fa-star"></i>
                     <span>Master</span>
                  </a>
                  <ul class="sub-menu mm-collapse">
                     <li><a href="<?= base_url('backend/AreaInterest') ?>" class="waves-effect"><span>Area of Interest
                           </span></a></li>
                     <li><a href="<?= base_url('backend/CourseType') ?>" class="waves-effect"><span>Course Type</span></a></li>
                     <li><a href="<?= base_url('backend/education') ?>" class="waves-effect"><span>Education</span></a></li>
                     <li><a href="<?= base_url('backend/HeardAboutUs') ?>" class="waves-effect"><span>Heard About Us</span></a></li>
                     <li><a href="<?= base_url('backend/hobby') ?>" class="waves-effect"><span>Hobby</span></a></li>
                     <li><a href="<?= base_url('backend/occupation') ?>" class="waves-effect"><span>Occupation</span></a></li>

                  </ul>

               </li>
               <!-- <li><a href="<?= base_url('backend/refer') ?>" class="waves-effect"><i class="fa fa-share"></i> <span>Refer And Earn </span></a></li> -->
               <!-- <li><a href="<?= base_url('backend/Survey') ?>" class="waves-effect"><i class="fa fa-cog"></i><span>Survey</span></a></li> -->
               <li><a href="<?= base_url('backend/setting') ?>" class="waves-effect"><i class="fa fa-cog"></i><span>Setting</span></a></li>
               <!-- Other admin-specific sidebar items -->

            <?php elseif ($role == MANAGER) : ?>
               <!-- Manager Sidebar Content -->
               <?php
               $permissions = $this->session->userdata('permissions');
               $permission_array = explode(',', $permissions);
               ?>
               <?php if (in_array(BANNER_PER, $permission_array)) {
               ?>
                  <li><a href="<?= base_url('backend/banner') ?>" class="waves-effect"><i class="fa fa-image"></i><span>Banner</span></a></li>
               <?php } ?>


               <?php if (in_array(USERS_PER, $permission_array)) {
               ?>
                  <li><a href="<?= base_url('backend/user') ?>" class="waves-effect"><i class="fa fa-users"></i><span>Users</span></a></li>
               <?php } ?>

               <?php if (in_array(COURSE_APPRO_PER, $permission_array)) { ?>

                  <li><a href="<?= base_url('backend/Course_purchase/users_course_approval') ?>" class="waves-effect"><i class="fa fa-users"></i><span>Users Course Approval</span></a></li>
               <?php } ?>



               <li>
                  <?php if (in_array(OUR_COURSE_PER, $permission_array)) {
                  ?>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-book"></i>
                        <span>Course</span>
                     </a>
                  <?php } elseif (in_array(CREATOR_COURSE_PER, $permission_array)) {
                  ?>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-book"></i>
                        <span>Course</span>
                     </a>
                  <?php } ?>
                  <ul class="sub-menu mm-collapse">
                     <?php if (in_array(OUR_COURSE_PER, $permission_array)) {
                     ?>

                        <li><a href="<?= base_url('backend/course/') ?>" class="waves-effect"><span>Our Course</span></a></li>
                     <?php } ?>
                     <?php if (in_array(CREATOR_COURSE_PER, $permission_array)) {
                     ?>
                        <li><a href="<?= base_url('backend/course/creatorcourses') ?>" class="waves-effect"><span>Creator Course</span></a></li>
                     <?php } ?>

                     <!-- <li ><a href="<?= base_url('backend/creator/creatorapproval') ?>" class="waves-effect"><span>Creator Mangement</span></a></li>
                          <li ><a href="<?= base_url('backend/creator') ?>" class="waves-effect"><span>Creator list</span></a></li> -->

                  </ul>

               </li>



               <?php if (in_array(CREATOR_PER, $permission_array)) {
               ?>
                  <li><a href="<?= base_url('backend/creator') ?>" class="waves-effect"><i class="fa fa-user-graduate"></i><span>Creator</span></a></li>
               <?php } ?>
               <?php if (in_array(MANAGER_PER, $permission_array)) {
               ?>
                  <li><a href="<?= base_url('backend/manager') ?>" class="waves-effect"><i class="fa fa-user-tie"></i><span>Managers</span></a></li>
               <?php } ?>

               <?php if (in_array(COURSE_PURCHASE_PER, $permission_array)) {
               ?>
                  <li><a href="<?= base_url('backend/course_purchase') ?>" class="waves-effect"><i class="fa fa-credit-card"></i><span>Course Purchase</span></a></li>
               <?php } ?>
               <?php if (in_array(QUIZ_REPORT_PER, $permission_array)) {
               ?>
                  <li><a href="<?= base_url('backend/quiz/quizreport') ?>" class="waves-effect"><i class="fa fa-credit-card"></i><span>Quiz Report</span></a></li>
               <?php } ?>
               <?php if (in_array(BOT_QUESTION_PER, $permission_array)) {
               ?>
                  <li><a href="<?= base_url('backend/BotQuestion/index') ?>" class="waves-effect"><i class="fa fa-credit-card"></i><span>Bot Question</span></a></li>
               <?php } ?>

               <?php if (in_array(MASTER_PER, $permission_array)) {
               ?>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-star"></i>
                        <span>Master</span>
                     </a>
                     <ul class="sub-menu mm-collapse">
                        <li><a href="<?= base_url('backend/AreaInterest') ?>" class="waves-effect"><span>Area of Interest
                              </span></a></li>
                        <li><a href="<?= base_url('backend/CourseType') ?>" class="waves-effect"><span>Course Type</span></a></li>
                        <li><a href="<?= base_url('backend/education') ?>" class="waves-effect"><span>Education</span></a></li>
                        <li><a href="<?= base_url('backend/HeardAboutUs') ?>" class="waves-effect"><span>Heard About Us</span></a></li>
                        <li><a href="<?= base_url('backend/hobby') ?>" class="waves-effect"><span>Hobby</span></a></li>
                        <li><a href="<?= base_url('backend/occupation') ?>" class="waves-effect"><span>Occupation</span></a></li>

                     </ul>

                  </li>
               <?php } ?>

               <!-- <li><a href="<?= base_url('backend/refer') ?>" class="waves-effect"><i class="fa fa-share"></i> <span>Refer And Earn </span></a></li> -->
               <?php if (in_array(SETTING_PER, $permission_array)) {
               ?>
                  <li><a href="<?= base_url('backend/setting') ?>" class="waves-effect"><i class="fa fa-cog"></i><span>Setting</span></a></li>
               <?php } ?>

            <?php elseif ($role == CREATOR) : ?>
               <!-- Creator Sidebar Content -->
               <li><a href="<?= base_url('backend/course') ?>" class="waves-effect"><i class="fa fa-book"></i><span>Course</span></a></li>
               <li><a href="<?= base_url('backend/user') ?>" class="waves-effect"><i class="fa fa-users"></i><span>Users</span></a></li>
               <li><a href="<?= base_url('backend/course_purchase') ?>" class="waves-effect"><i class="fa fa-credit-card"></i><span>Course Purchase</span></a></li>
               <li><a href="<?= base_url('backend/quiz/quizreport') ?>" class="waves-effect"><i class="fa fa-credit-card"></i><span>Quiz Report</span></a></li>
               <!-- Other creator-specific sidebar items -->

            <?php endif; ?>



         </ul>
      </div>
      <!-- Sidebar -->
      <div class="clearfix"></div>
   </div>
   <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid">
         <div class="page-title-box">
            <div class="row align-items-center">
               <div class="col-sm-6">
                  <h4 class="page-title"><?= $title ?></h4>

               </div>
               <div class="col-sm-6">
                  <div class="float-right d-md-block">
                     <?php if (isset($SideBarbutton) && isset($SideBarbutton[1])) : ?>
                        <a href="<?= base_url($SideBarbutton[0]) ?>" class="btn btn-primary btn-lg btn-dashboard custom-btn">
                           <?= $SideBarbutton[1] ?>
                        </a>
                     <?php endif; ?>

                     <?php if (isset($AddButton) && isset($AddButton[1])) : ?>
                        <a href="<?= base_url($AddButton[0]) ?>" class="btn btn-primary btn-lg btn-dashboard custom-btn">
                           <?= $AddButton[1] ?>
                        </a>
                     <?php endif; ?>
                  </div>
               </div>



            </div>
         </div>
         <!-- end row -->