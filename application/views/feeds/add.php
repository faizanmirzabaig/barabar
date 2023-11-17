<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/feeds/insert', [
                    'autocomplete' => false, 'id' => 'add_feeds', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_feeds')])
                ?>
                <div class="form-group row"><label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" name="title" id="title" placeholder="Title" required>
                    </div>
                </div>

                <div class="form-group row"><label for="Description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" placeholder="Description" required></textarea>
                    </div>
                </div>
				
				<div class="form-group row"><label for="Media" class="col-sm-2 col-form-label">Media</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="media" id="media" required>
                    </div>
                </div>

                <div class="form-group row"><label for="feed_type" class="col-sm-2 col-form-label">Feed Type<span class=""></span></label>
                    <div class="col-sm-6">
                        <select class="form-control feed_type" name="feed_type" id="feed_type" required>
                            <option value="" disabled selected>Select Feed Type</option>
                            <option value="Event">Event</option>
                            <option value="Knowledge_Hub">Knowledge Hub</option>
                            <option value="Testimonial">Testimonial</option>
                        </select>
                    </div>
                </div>
				
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        ?>
                         <a href="<?= base_url('backend/feeds')?>" class="btn btn-secondary waves-effect" >Cancel</a>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>