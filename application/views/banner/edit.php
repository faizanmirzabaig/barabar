<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/Banner/update', [
                    'autocomplete' => false, 'id' => 'edit_banner', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_banner')])
                ?>


                <input type="hidden" value="<?= $Banner->id ?>" name="Banner_id">

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Image *</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="file" name="img" id="img">
                    </div><br>
                    <!-- <div class="col-sm-5">
                        <p>Preview</p>
                        <a href="<?= base_url('./uploads/data/content/' . $Banner->img) ?>" target="blank">
                            <img src="<?= base_url('./uploads/data/content/' . $Banner->img) ?>" width="300px">

                        </a>
                    </div> -->
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label"> Course Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="course_type_id" required>
                            <option value="">Select Type</option>
                          
                            <?php 
                            foreach ($CourseType as $coursetype): ?>
                                <option value="<?php echo $coursetype->id;  ?> " <?php echo $coursetype->id==$Banner->course_type_id?'selected':'';?>><?php echo $coursetype->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        echo form_reset(['class' => 'btn btn-secondary waves-effect', 'value' => 'Cancel']);
                        ?>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>