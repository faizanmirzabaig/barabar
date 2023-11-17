<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/banner/insert', [
                    'autocomplete' => false, 'id' => 'add_banner', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_banner')])
                ?>
    
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="img" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label"> Course Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="course_type_id" required>
                            <option value="">Select Type</option>
                          
                            <?php 
                            foreach ($CourseType as $coursetype): ?>
                                <option value="<?php echo $coursetype->id; ?>"><?php echo $coursetype->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
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

