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
                            <th>Media</th>
                            <th>Feed Type</th>
                            <th>Total Likes</th>
                            <th>Total Comments</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($AllFeeds as $key => $value) {
                             $i++;
                         ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= word_limiter($value->title, 10); ?></td>
                            <td style="white-space: break-spaces;"><?= word_limiter($value->description, 10); ?></td>
                            <td><a href="<?= base_url('./data/Feeds/' . $value->media) ?>" target="_blank" ><?php if($value->media_type==0){ echo "Image";} else if($value->media_type==1){?> <?php echo "Video";}?></a></td>
                            <td><?= str_replace("_"," ",$value->feed_type) ?></td>
                            <td><?= $value->total_like ?></td>
                            <td><?= $value->total_comment ?></td>
                            <td><?= date("d-m-Y",strtotime($value->added_date))?></td>
                            <td>
                            <a href="<?= base_url('backend/feeds/edit/'.$this->url_encrypt->encode($value->id)) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                            |
                            <a href="<?= base_url('backend/feeds/deleteFeed/'.$this->url_encrypt->encode($value->id)) ?>" onclick="return confirm('Are You Sure Want To Remove This Feed?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash"></span></a>
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