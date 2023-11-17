
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/occupation/insert', [
                    'autocomplete' => false, 'id' => 'add_occupation', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_occupation')])
                ?>

                <div class="form-group row"><label for="occupation_name" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="occupation_name" required id="occupation_name" placeholder="Enter  Occupation Name">
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
