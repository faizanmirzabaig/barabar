


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/setting/update', [
                    'autocomplete' => false, 'id' => 'edit_setting', 'method' => 'post'
                ])
                ?>


                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">About Us *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" name="about_us" required id="about_us"><?php if(!empty($Setting->about_us)){ echo $Setting->about_us; } ?></textarea>
                    </div>
                </div>


                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Contact Us *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" name="contact_us" required id="contact_us"><?php if(!empty($Setting->contact_us)){ echo $Setting->contact_us; } ?></textarea>
                    </div>
                </div>


                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Email Us *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" name="email_us" required id="email_us"><?php if(!empty($Setting->email_us)){ echo $Setting->email_us; } ?></textarea>
                    </div>
                </div>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Terms And Conditions *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" name="terms" required id="terms"><?php if(!empty($Setting->terms)){ echo $Setting->terms; } ?></textarea>
                    </div>
                </div>
               
               
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Vision *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" name="vision" required id="vision"><?php if(!empty($Setting->vision)){ echo $Setting->vision; } ?></textarea>
                    </div>
                </div>


                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Mission *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" name="mission" required id="mission"><?php if(!empty($Setting->mission)){ echo $Setting->mission; } ?></textarea>
                    </div>
                </div>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Privacy Policy *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" name="policy" required id="policy"><?php if(!empty($Setting->policy)){ echo $Setting->policy; } ?></textarea>
                    </div>
                </div>

                <!-- <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">FAQ's *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" name="faq" required id="faq"><?= $Setting->faq ?></textarea>
                    </div>
                </div>

                <div class="form-group row"><label for="url" class="col-sm-2 col-form-label">Youtube Link <span class="required">*</span></label>
                    <div class="col-sm-10"><input class="form-control" type="url" value="<?= $Setting->youtube_link ?>" name="youtube_link" required id="youtube_link" placeholder="Youtube Link"></div>
                </div> -->

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        // echo form_reset(['class' => 'btn btn-secondary waves-effect', 'value' => 'Cancel']);
                        ?>
                         <a href="<?= base_url('backend/setting')?>" class="btn btn-secondary waves-effect" >Cancel</a>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>

    <script>
        
        // user for ckeditor.
        CKEDITOR.replace('contact_us');
        CKEDITOR.replace('about_us');
        CKEDITOR.replace('vision');
        CKEDITOR.replace('mission');
        CKEDITOR.replace('email_us');
        CKEDITOR.replace('policy');
        CKEDITOR.replace('terms');
        CKEDITOR.replace('faq');
    </script>