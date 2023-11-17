<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/manager/create', [
                    'autocomplete' => false, 'id' => 'manager_reg', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_managers')])
                ?>

                <div class="form-group row"><label for="first_name" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="first_name" required id="first_name" placeholder="Enter Name">
                    </div>
                </div>

                <div class="form-group row"><label for="email_id" class="col-sm-2 col-form-label">Email *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" name="email_id" required id="email_id" placeholder="Enter Email">
                    </div>
                </div>

                <div class="form-group row"><label for="password" class="col-sm-2 col-form-label">Password *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="password" required id="password" placeholder="Enter Password">
                    </div>
                </div>

                <div class="form-group row" id="permission"><label for="permissions" class="col-sm-2 col-form-label">Permissions *</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-multiple permissions" name="permissions[]" multiple="multiple" id="permissions" required>
                                <option value="<?= BANNER_PER?>">Banner</option>
                                <option value="<?= USERS_PER?>">Users</option>
                                <option value="<?= COURSE_APPRO_PER?>">User Course Approval</option>
                                <option value="<?= OUR_COURSE_PER?>">Our Course</option>
                                <option value="<?= CREATOR_COURSE_PER?>">Creator Course</option>
                                <option value="<?= CREATOR_PER?>">Creator</option>
                                <option value="<?= MANAGER_PER?>">Manager</option>
                                <option value="<?= COURSE_PURCHASE_PER?>">Course Purchase</option>
                                <option value="<?= QUIZ_REPORT_PER?>">Quiz Report</option>
                                <option value="<?= BOT_QUESTION_PER?>">Bot Question</option>
                                <option value="<?= CHAT_PER?>">Chat</option>
                                <option value="<?= ADD_WALLET_PER?>">Add Wallet</option>
                                <option value="<?= DONATION_PER?>">Donation</option>
                                <option value="<?= WITHDRAWAL_PER?>">Withdrawal</option>
                                <option value="<?= MASTER_PER?>">Master</option>
                                <option value="<?= SETTING_PER?>">Setting</option>
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
            // $('.waves-effect').click(function(e){
            //     console.log('hi');
            //     e.preventDefault();
            // });
            function goBack() {
                window.history.back();
            }
        });
    </script>