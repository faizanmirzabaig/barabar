<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('backend/event/update'.'/'.$this->url_encrypt->encode($event->id), [
                    'autocomplete' => false, 'id' => 'edit_event', 'method' => 'post'
                ], ['id'=>$this->url_encrypt->encode($event->id),'type' => $this->url_encrypt->encode('tbl_event')])
                ?>
                

                <div class="form-group row"><label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $event->title ?>" name="title" id="title" placeholder="Title" required>
                    </div>
                </div>

                <div class="form-group row"><label for="Description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" placeholder="Description" required><?= $event->description ?></textarea>
                    </div>
                </div>
                <div class="form-group row"><label for="Media Preview" class="col-sm-2 col-form-label">Media Preview</label>
                    <div class="col-sm-10">
                        <?php if ($event->media_type==0) { ?>
                            <?php if ($event->media) { ?>
                                <a href="<?= base_url('./data/Event/' . $event->media) ?>" target="blank">
                                    <img src="<?= base_url('./data/Event/' . $event->media) ?>" width="200px">
                                </a>
                            <?php } else { ?>
                                <h3>No preview of Media found</h3>
                            <?php } ?>
                        <?php } else if ($event->media_type==1) { 

                            $getVideoType=pathinfo($event->media,PATHINFO_EXTENSION);
                            ?>
                             <video width="320" height="240" controls>
                                <source src="<?= base_url('./data/Event/' . $event->media) ?>" type="video/<?php echo $getVideoType; ?>">
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

                <div class="form-group row"><label for="event_type" class="col-sm-2 col-form-label">Event Type<span class=""></span></label>
                    <div class="col-sm-6">
                        <select class="form-control event_type" name="event_type" id="event_type" required>
                            <option value="" disabled>Select Event Type</option>
                            <option <?php if(isset($event->event_type) && $event->event_type=="Hop_On"){?> selected <?php }?> value="Hop_On">Hop On</option>
                            <option <?php if(isset($event->event_type) && $event->event_type=="School"){?> selected <?php }?> value="School">School</option>
                        </select>
                    </div>
                </div>

                  <div class="form-group row" id="school_name_div" <?= $event->event_type=="Hop_On"?'style="display: none"':'' ?>><label for="school_name" class="col-sm-2 col-form-label">School Name<span class=""></span></label>
                    <div class="col-sm-6">
                        <select class="form-control school_name" name="school_name" id="school_name" <?= $event->event_type=="Hop_On"?'':'required' ?>>
                            <option value="" disabled selected>Select School</option>
                            <?php foreach ($AllSchool as $key => $value) { ?>
                                <option value="<?=$value->id ?>" <?= $value->id==$event->school_id?'selected':'' ?>><?= $value->name ?></option>
                             <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="form-group row"><label for="location" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $event->location ?>" name="location" id="location" placeholder="Location" required>
                    </div>
                </div>
  
                <div class="form-group row"><label for="location" class="col-sm-2 col-form-label">Month & Year</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= date("m-Y",strtotime($event->month_year)) ?>" name="month_year" id="month_year" placeholder="Month & Year" required>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);               
                        ?>
                         <a href="<?= base_url('backend/event')?>" class="btn btn-secondary waves-effect" >Cancel</a>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
              $("#month_year").datepicker( {
                startDate: new Date(),
                format: "mm-yyyy",
               viewMode: "months", 
                minViewMode: "months"
            });
        
        $('#event_type').on('change', function() {
          if( this.value == 'School'){
            $('#school_name_div').show()
            $('#school_name_div').children().eq(1).children().prop('required',true);
          }else{
            $('#school_name_div').hide()
            $('#school_name_div').children().eq(1).children().prop('required',false);
          }
        });

</script>
