<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<section>
  <div class="container">
    <div class="col-md-12">
      <div class="corses_detail">
        <div class="single-course-details ">
          <div class="row">
            <div class="col-md-8 single-course-details">
              <div class="edutim-course-topics-header d-lg-flex justify-content-between course-info">
                <div class="edutim-course-topics-header-left">
                  <h4 class="course-title">Chapter List</h4>
                </div>
                <div class="edutim-course-topics-header-right">
                  <!-- <span> Chapter: <strong>20</strong></span>
                  <span> Videos: <strong>100</strong> </span>-->
                </div>
              </div>
              <div>
                <?php foreach($chapterList as $ch){ ?>
                <div class="about-text-block">
                  <i class="bi bi-paper"></i>
                  <a href="<?= base_url('Home/videoList/'.$this->url_encrypt->encode($ch->course_id)) ?>"><h4><?= $ch->name ?></h4></a>   
                  <span> Videos: <strong><?= $ch->videoCount ?></strong> </span>
               </div>
               <?php } ?>
             </div>
           </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
