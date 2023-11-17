<div class="row">


    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable-excel" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Title</th> 
                            <th>Duration(Days)</th>
                            <!-- <th>Price</th> -->
                            <th>Status</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($course as $key => $site) {
                                $i++;
                                // $make_live=($site->status!=PENDING && $site->status!=APPROVED)?true:false;
                                // $remove_ed_del_mak=($site->status!=PENDING && $site->status!=APPROVED)?true:false;
                                $remove_mak=($site->status!=PENDING && $site->status!=APPROVED)?true:false;
                               
                               ?>
                            <tr>
                            <td><?= $site->id ?></td>
                            <td><?= $site->name ?></td>
                            <td><?= $site->title ?></td>
                            <td><?= $site->duration ?></td>
                            <!-- <td><?php /* $site->price */?></td> -->
                            <td>
                                <?php
                                $status=$site->status;
                                switch ($status) {
                                    case PAYMENT_PEND:
                                        echo "Approval Pending";
                                        break;
                                    break;
                                    case PENDING:
                                      echo "Approval Pending";
                                      break;
                                    case APPROVED:
                                      echo "Approved";
                                      break;
                                    case REJECTED:
                                      echo "<span data-toggle='tooltip' data-placement='top' title=' $site->reject_reason'>Rejected</span>";
                                      break;
                                    default:
                                      echo "Incomplete";
                                  }
                              ?>
                            
                            </td>
                            
                            <td><?= date("d-m-Y",strtotime($site->added_date))?></td>
                            <td>
                                <?php 
                                    /*if($remove_ed_del_mak)
                                    {*/
                                ?>
                                <a href="<?= base_url('backend/course/edit/'.$site->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                                |
                                <?php if (isset($site->chapter) && $site->chapter == 'yes') { ?>
                                    <a href="<?= base_url('backend/course/chapterList/' . $site->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Chapter"><span class="fa fa-plus"></span></a>
                                <?php } else { ?>
                                    <a href="<?= base_url('backend/course/videoList/' . $site->id ) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Video"><span class="fa fa-plus"></span></a>
                                <?php } ?>
                                |
                                <!-- <a href="<?= base_url('backend/course/performancereport/'.$site->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Performance Report"><span class="fa fa-file"></span></a>
                                | -->
                                <?php /*}*/?>

                                <a href="<?= base_url('backend/course/delete/'.$site->id) ?>" onclick="return confirm('Are You Sure Want To Remove This Course?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash"></span></a>
                                |
            
                                <button class="btn btn-info status" data-toggle="tooltip" data-placement="top" title="Share" ><span class="fa fa-share-alt"></span><input type="hidden" value="<?= base_url('Home/courses/'.$this->url_encrypt->encode($site->id)) ?>" name="input" id="input<?= $site->id ?>"></button>
                                |
                                <a href="<?= base_url('backend/course/ExportCourseQuiz'.'/'.$site->id) ?>"  class="btn btn-success" data-toggle="tooltip" data-placement="top"  title="Download Excel"><span class="fa fa-download"></span></a>
                                |
                                <a href="<?= base_url('backend/course/ExportTransaction'.'/'.$site->id) ?>"  class="btn btn-info" data-toggle="tooltip" data-placement="top"  title="Download Transaction Excel"><span class="fa fa-download"></span></a>
                               
                                
                                
                                
                                <?php if($site->videos){ ?>
                                    <a href="<?= base_url('data/coursevideo/'.$site->videos) ?>" download class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Download Intro Video"><span class="fa fa-download"></span></a>
                                <?php } ?>

                                <?php 
                                    if($remove_mak)
                                    {
                                ?>
                                |
                                <a href="<?= base_url('backend/course/make_live/'.$site->id) ?>" onclick="return confirm('Are You Sure You Want To Make This Course Live?')" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Make This Course Live"><span class="fa fa-check"></span></a>
                                <?php } ?>
                            
                                <!-- <?php if($site->videos){ ?> -->
                                    |
                                    <a href="<?= base_url('backend/quiz/quizreport/'.$site->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Quiz report"><span class="fa fa-plus"></span></a>
                                <!-- <?php } ?> -->
                            </td>
                        </tr>
                            <?php }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<script>
    $(".status").click(function() {
        const id = this.lastChild.id;
        const copyText = document.getElementById(id).value;
        const listener = function(ev) {
        ev.clipboardData.setData("text/plain", copyText);
        ev.preventDefault();
        };
        document.addEventListener("copy", listener);
        document.execCommand("copy");
        document.removeEventListener("copy", listener);
    })

   

</script>