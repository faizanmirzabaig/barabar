
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/CourseType/update', [
                    'autocomplete' => false, 'id' => 'edit_course_type', 'method' => 'post'
                ], ['id'=>$this->url_encrypt->encode($CourseType->id), 'type' => $this->url_encrypt->encode('tbl_course_type')])
                ?>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $CourseType->name ?>" name="course_type_name" required id="name" placeholder="Enter Name">
                        <input class="form-control" type="hidden" value="<?= $CourseType->id ?>" name="id" required id="id">
                    </div>
                </div>
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="img" required>
                    </div>
                </div>
                
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        echo form_reset(['class' => 'btn btn-secondary waves-effect', 'value' => 'Cancel', 'onclick'=>'goBack()']);
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
    function goBack() {
      window.history.back();
    }
    </script>
