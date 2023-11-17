<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/manager/update', [
                    'autocomplete' => false, 'id' => 'manager_upd', 'method' => 'post'
                ], ['id' => $this->url_encrypt->encode($manager->id), 'type' => $this->url_encrypt->encode('tbl_managers')])
                ?>

                <div class="form-group row"><label for="first_name" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $manager->first_name ?>" name="first_name" required id="first_name" placeholder="Enter Name">
                        <input class="form-control" type="hidden" value="<?= $manager->id ?>" name="id" required id="id">
                    </div>
                </div>
                <div class="form-group row"><label for="email_id" class="col-sm-2 col-form-label">Email *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" value="<?= $manager->email_id ?>" name="email_id" required id="email_id" placeholder="Enter Email">
                    </div>
                </div>
                <div class="form-group row"><label for="password" class="col-sm-2 col-form-label">Password *</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="" type="password" name="password" required id="password" placeholder="Enter Password">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Permissions *</label>
                    <div class="col-sm-10">
                        <?php

                        $permissions = explode(',', $manager->permissions);

                        ?>
                        <select class="js-example-basic-multiple permissions" name="permissions[]" multiple="multiple" id="permissions" required>
                            <option value="<?= BANNER_PER ?>" <?= in_array(BANNER_PER,$permissions)?'selected':''; ?>>Banner</option>
                            <option value="<?= USERS_PER ?>" <?= in_array(USERS_PER,$permissions)?'selected':''; ?>>Users</option>
                            <option value="<?= COURSE_APPRO_PER ?>" <?= in_array(COURSE_APPRO_PER,$permissions)?'selected':''; ?>>User Course Approval</option>
                            <option value="<?= OUR_COURSE_PER ?>" <?= in_array(OUR_COURSE_PER,$permissions)?'selected':''; ?>>Our Course</option>
                            <option value="<?= CREATOR_COURSE_PER ?>" <?= in_array(CREATOR_COURSE_PER,$permissions)?'selected':''; ?>>Creator Course</option>
                            <option value="<?= CREATOR_PER ?>" <?= in_array(CREATOR_PER,$permissions)?'selected':''; ?>>Creator</option>
                            <option value="<?= MANAGER_PER ?>"<?= in_array(MANAGER_PER,$permissions)?'selected':''; ?>>Manager</option>
                            <option value="<?= COURSE_PURCHASE_PER ?>"<?= in_array(COURSE_PURCHASE_PER,$permissions)?'selected':''; ?>>Course Purchase</option>
                            <option value="<?= QUIZ_REPORT_PER ?>"<?= in_array(QUIZ_REPORT_PER,$permissions)?'selected':''; ?>>Quiz Report</option>
                            <option value="<?= BOT_QUESTION_PER ?>"<?= in_array(BOT_QUESTION_PER,$permissions)?'selected':''; ?>>Bot Question</option>
                            <option value="<?= MASTER_PER ?>"<?= in_array(MASTER_PER,$permissions)?'selected':''; ?>>Master</option>
                            <option value="<?= SETTING_PER ?>"<?= in_array(SETTING_PER,$permissions)?'selected':''; ?>>Setting</option>
                        </select>
                        <div class="select_2_error"></div>

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

            $('.js-example-basic-multiple').select2({
                placeholder: "Select Permissions",
                allowClear: true,

            });

            function goBack() {
                window.history.back();
            }
        });
    </script>