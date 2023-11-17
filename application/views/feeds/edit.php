<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/feeds/update'.'/'.$this->url_encrypt->encode($feeds->id), [
                    'autocomplete' => false, 'id' => 'edit_feeds', 'method' => 'post'
                ], ['id'=>$this->url_encrypt->encode($feeds->id),'type' => $this->url_encrypt->encode('tbl_feeds')])
                ?>
                

                <div class="form-group row"><label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $feeds->title ?>" name="title" id="title" required placeholder="Title">
                    </div>
                </div>

                <div class="form-group row"><label for="Description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" placeholder="Description" required><?= $feeds->description ?></textarea>
                    </div>
                </div>

                <div class="form-group row"><label for="Media Preview" class="col-sm-2 col-form-label">Media Preview</label>
                    <div class="col-sm-10">
                        <?php if ($feeds->media_type==0) { ?>
                            <?php if ($feeds->media) { ?>
                                <a href="<?= base_url('./data/Feeds/' . $feeds->media) ?>" target="blank">
                                    <img src="<?= base_url('./data/Feeds/' . $feeds->media) ?>" width="200px">
                                </a>
                            <?php } else { ?>
                                <h3>No preview of Media found</h3>
                            <?php } ?>
                        <?php } else if ($feeds->media_type==1) { 

                            $getVideoType=pathinfo($feeds->media,PATHINFO_EXTENSION);
                            ?>
                             <video width="320" height="240" controls>
                                <source src="<?= base_url('./data/Feeds/' . $feeds->media) ?>" type="video/<?php echo $getVideoType; ?>">
                            Your browser does not support the video tag.
                            </video> 
                        <?php }?>
                    </div>
                </div>

                <div class="form-group row"><label for="Media" class="col-sm-2 col-form-label">Media</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="media" id="media">
                    </div>
                </div>

                <div class="form-group row"><label for="feed_type" class="col-sm-2 col-form-label">Feed Type<span class=""></span></label>
                    <div class="col-sm-6">
                        <select class="form-control feed_type" name="feed_type" id="feed_type" required>
                            <option value="" disabled selected>Select Feed Type</option>
                            <option <?php if(isset($feeds->feed_type) && $feeds->feed_type=="Event"){?> selected <?php }?> value="Event">Event</option>
                            <option <?php if(isset($feeds->feed_type) && $feeds->feed_type=="Knowledge_Hub"){?> selected <?php }?> value="Knowledge_Hub">Knowledge Hub</option>
                            <option <?php if(isset($feeds->feed_type) && $feeds->feed_type=="Testimonial"){?> selected <?php }?> value="Testimonial">Testimonial</option>
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

