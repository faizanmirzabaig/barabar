<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/creator/updatecontent', [
                    'autocomplete' => false, 'id' => 'edit_content', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_creator_content')])
                ?>


                <input type="hidden" value="<?= $editcontent[0]->id ?>" name="content_id">

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Image *</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="file" name="image" id="image">
                    </div><br>
                    <div class="col-sm-5">
                        <p>Preview</p>
                        <a href="<?= base_url('/uploads/data/content/' . $editcontent[0]->image) ?>" target="blank">
                            <img src="<?= base_url('/uploads/data/content/' . $editcontent[0]->image) ?>" width="300px">

                        </a>
                    </div>
                </div>
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Video *</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="file" name="image" id="image">
                    </div><br>
                    <div class="col-sm-5">
                        <p>Preview</p>
                        <a href="<?= base_url('/uploads/data/content/' . $editcontent[0]->videos) ?>" target="blank">
                            <img src="<?= base_url('/uploads/data/content/' . $editcontent[0]->videos) ?>" width="300px">

                        </a>
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