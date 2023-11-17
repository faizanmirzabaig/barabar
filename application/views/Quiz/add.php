
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/quiz/insertquiz/' . $course_id, [
                    'autocomplete' => false, 'id' => 'add_quiz', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_quiz')])
                ?>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Question no *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="question_no" required id="name" placeholder="Enter  Question no">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Question *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="question" required id="title" placeholder="Enter Question">
                    </div>
                </div>

                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Option 1 *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="opt_1" required id="title" placeholder="Enter Option no 1">
                    </div>
                </div>
                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Option 2 *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="opt_2" required id="title" placeholder="Enter Option no 2">
                    </div>
                </div>
                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Option 3 *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="opt_3" required id="title" placeholder="Enter Option no 3">
                    </div>
                </div>
                <div class="form-group row"><label for="lat" class="col-sm-2 col-form-label">Option 4 *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="opt_4" required id="title" placeholder="Enter Option no 4">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lat" class="col-sm-2 col-form-label">Correct Ans *</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="correct_ans" required id="title">
                            <option value="">Select Correct Answer</option>
                            <option value="opt_1">Option 1</option>
                            <option value="opt_2">Option 2</option>
                            <option value="opt_3">Option 3</option>
                            <option value="opt_4">Option 4</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
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
        function goBack() {
            window.history.back();
        }
        $('#specific_data').removeClass('fadeIn');
        $('#specific_data').addClass('fadeOut');

        $('input[name="view"]').on('change', function() {
            $(this).siblings('input[type="checkbox"]').not(this).prop('checked', false);
        });
        $('#all_user').click(function() {

            $('#specific_data').removeClass('fadeIn');
            $('#specific_data').addClass('fadeOut');

        });
        $('#specific_user').click(function() {

            var myElement = document.querySelector("#myElement");

            $('#specific_data').removeClass('fadeOut');
            $('#specific_data').addClass('fadeIn');

        });
    </script>