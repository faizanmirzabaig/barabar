
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/user/buyCourses', [
                    'autocomplete' => false, 'id' => 'add_buyCourse', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_user')])
                ?>
                <input class="form-control" type="hidden" value="<?= $user_id; ?>" name="user_id" id="user_id" placeholder="Enter User Id" >
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Course *</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="course_id" id="course_id">
                            <option value="">Select Course</option>
                            <?php if(!empty($courseList)){?>
                                <?php foreach($courseList as $val){?>
                                    <option value="<?= $val->id;?>"><?= $val->name;?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row title"><label for="lat" class="col-sm-2 col-form-label">Title </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title" readonly="">
                    </div>
                </div>


                <div class="form-group row description" ><label for="long" class="col-sm-2 col-form-label">Description </label>
                    <div class="col-sm-10">
                       <textarea class="form-control" name="description" id="description"  placeholder="Enter Description"  readonly=""></textarea>
                    </div>
                </div>

                <div class="form-group row duration" ><label for="long" class="col-sm-2 col-form-label">Duration (Days)</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="duration" id="duration" placeholder="Enter Days"  readonly="">
                    </div>
                </div>

                <!-- <div class="form-group row price"><label for="long" class="col-sm-2 col-form-label">Price </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="price" id="price" placeholder="Enter Price" readonly="">
                    </div>
                </div> -->

                <div class="form-group row language" ><label for="language" class="col-sm-2 col-form-label">Language </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="language" id="language" placeholder="Enter Language" readonly="">
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
        

        $(document).ready(function() {

          $("#course_id").change(function(){
           
                
                var id = $(this).val();
                var varData = "id="+id;
                //alert(varData);
                $.ajax({
                    url : "<?php echo base_url();?>backend/user/CourseList",
                    type : "POST",
                    dataType : "html",
                    data : varData,
                    success : function(result) {
                        var response = JSON.parse(result);


                      $("#title").val('');
                      $("#description").val('');
                      $("#duration").val('');
                      $("#price").val('');
                      $("#language").val('');

                      //alert(response.data[0].id);
                      $("#title").val(response.data[0].title);
                      $("#description").val(response.data[0].description);
                      $("#duration").val(response.data[0].duration);
                      $("#price").val(response.data[0].price);
                      $("#language").val(response.data[0].language);
                    }
                });
             });

      
      });
    </script>
<script>
    function goBack() {
      window.history.back();
    }
    </script>
