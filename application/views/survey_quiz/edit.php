
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/survey_quiz/updatequiz/'.$video_id, [
                    'autocomplete' => false, 'id' => 'edit_coursevideo', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_survey_quiz')])
                ?>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Question no *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $quiz->question_no?>" name="question_no" required id="name" placeholder="Enter  Name">
                        <input class="form-control" type="hidden" value="<?= $quiz->id?>" name="id" required id="id" placeholder="Enter  id">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Question *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $quiz->question?>" name="question" required id="title" placeholder="Enter Title">
                    </div>
                </div>
                
                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Option no 1 *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="opt_1" value="<?= $quiz->option_1 ?>" required id="serial_no" placeholder="Enter Serial No">
                    </div>
                </div>

                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Option no 2 *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="opt_2" value="<?= $quiz->option_2 ?>" required id="serial_no" placeholder="Enter Serial No">
                    </div>
                </div>
                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Option no 3 *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="opt_3" value="<?= $quiz->option_3 ?>" required id="serial_no" placeholder="Enter Serial No">
                    </div>
                </div>
                <div class="form-group row"><label for="serial_no" class="col-sm-2 col-form-label">Option no 4 *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="opt_4" value="<?= $quiz->option_4 ?>" required id="serial_no" placeholder="Enter Serial No">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lat" class="col-sm-2 col-form-label">Correct Answer *</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="correct_ans" required id="title">
                            <option value="">Select Correct Answer</option>
                            <option value="opt_1" <?php if ($quiz->correct_ans === 'opt_1') echo 'selected'; ?>>Option 1</option>
                            <option value="opt_2" <?php if ($quiz->correct_ans === 'opt_2') echo 'selected'; ?>>Option 2</option>
                            <option value="opt_3" <?php if ($quiz->correct_ans === 'opt_3') echo 'selected'; ?>>Option 3</option>
                            <option value="opt_4" <?php if ($quiz->correct_ans === 'opt_4') echo 'selected'; ?>>Option 4</option>
                        </select>
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
