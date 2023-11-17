
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/course/updatechapter/'.$course_id, [
                    'autocomplete' => false, 'id' => 'edit_coursechapter', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_chapter')])
                ?>
                <?php
              
                $status=$course[0]->status;
                
                switch($status){
                    case PAYMENT_PEND:
                       $status="readonly";
                       $submit="invisible";
                    break;
                    case PENDING:
                     $status="readonly";
                     $submit="invisible";
                    break;
                    case APPROVED:
                    $status="readonly";
                    $submit="invisible";
                    break;
                    case REJECTED:
                    $status="";
                    $submit="";
                    break;    
                    default:
                    $status='';  
                    $submit="";
                }
           
                ?>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Chapter Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $chapter->name?>" name="name" required id="name" placeholder="Enter  Name" <?php echo $status?> >
                        <input class="form-control" type="hidden" value="<?= $chapter->id?>" name="id" required id="id" placeholder="Enter  id">
                    </div>
                </div>
                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Chapter No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $chapter->chapter_no?>" name="chapter_no" required id="chapter_no" placeholder="Enter Chapter No" <?php echo $status?>>
                    </div>
                </div>
                
                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Serial No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="serial_no" value="<?= $chapter->sort ?>" required id="serial_no" placeholder="Enter Serial No" <?php echo $status?>>
                    </div>
                </div>



                <div class="form-group row"><label for="long" class="col-sm-2 col-form-label">Description *</label>
                    <div class="col-sm-10">
                       <textarea class="form-control" name="description" id="description" required="" placeholder="Enter Description" <?php echo $status?>> <?= $chapter->description?></textarea>
                    </div>
                </div>


                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => "$submit btn btn-primary waves-effect waves-light mr-1 >"]);
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
