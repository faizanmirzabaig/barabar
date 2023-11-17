
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
        <?php
                echo form_open_multipart('backend/BotQuestion/update', [
                    'autocomplete' => false, 'id' => 'edit_bot_ques', 'method' => 'post'
                ], ['id'=>$this->url_encrypt->encode($BotQues[0]->id), 'type' => $this->url_encrypt->encode('tbl_bot_ques')])
                ?>

                <div class="form-group row"><label for="ques" class="col-sm-2 col-form-label">Question *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $BotQues[0]->ques ?>" name="ques" required id="ques" placeholder="Enter Question">
                        <input class="form-control" type="hidden" value="<?= $BotQues[0]->id ?>" name="id" required id="id">
                    </div>
                </div>
                <div class="form-group row"><label for="ans" class="col-sm-2 col-form-label">Answer *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $BotQues[0]->ans ?>" name="ans" required id="ans" placeholder="Enter Answer">
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
