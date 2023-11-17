<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="example" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th style="white-space: break-spaces;">Description</th>
                            <th>Location</th>
                            <th>Media</th>
                            <th>Event Type</th>
                            <th>School Name</th>
                            <th>Month & Year</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($AllEvent as $key => $value) {
                             $i++;
                                // $month = explode("-", $$value->month_year, 2);
                                //  switch ($month[0]) {
                                //      case '1':
                                //           $m=
                                //          break;
                                     
                                //      default:
                                //          # code...
                                //          break;
                                //  }
                         ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $value->title ?></td>
                            <td style="white-space: break-spaces;"><?= word_limiter($value->description, 10); ?></td>
                            <td><?= $value->location  ?></td>
                            <td><a href="<?= base_url('./data/Event/' . $value->media) ?>" target="_blank" ><?php if($value->media_type==0){ echo "Image";} else if($value->media_type==1){?> <?php echo "Video";}?></a></td>
                            <td><?= str_replace("_"," ",$value->event_type) ?></td>
                            <td><?= $value->school_name ?></td>
                               <td><?= !empty($value->month_year)?date("M-Y",strtotime($value->month_year)):'' ?></td>
                          <!--    <td><?= $value->month_year ?></td> -->
                            <td><?= date("d-m-Y",strtotime($value->added_date))?></td>
                            <td>
                            <a href="<?= base_url('backend/event/edit/'.$this->url_encrypt->encode($value->id)) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                            |
                            <a href="<?= base_url('backend/event/deleteEvent/'.$this->url_encrypt->encode($value->id)) ?>" onclick="return confirm('Are You Sure Want To Remove This Event?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash"></span></a>
                            |
                             <a href="<?= base_url('backend/event/interested_user/'.$this->url_encrypt->encode($value->id)) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="User List"><span class="fa fa-eye"></span></a>
                        </td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>