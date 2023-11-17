<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/refer/update', [
                    'autocomplete' => false, 'id' => 'edit_refer', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_refer')])
                ?>


                <input type="hidden" value="<?= $Refer->id ?>" name="id">

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Amount *</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="number" value="<?= $Refer->amount ?>" name="amount" id="amount">
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
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

