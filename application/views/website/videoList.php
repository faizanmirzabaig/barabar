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
                    <h4 class="course-title">Video List</h4>
                </div>
                <div class="edutim-course-topics-header-right">
                  <!-- <span> Chapter: <strong>20</strong></span>
                  <span> Videos: <strong>100</strong> </span>             -->
                </div>
              </div>
              <div>
                <?php foreach($videoList as $vi){ ?>
                <div class="about-text-block form-inline">
                  <i class="bi bi-paper pr-3"></i>
                  <h4 class="pr-5"><?= $vi->name ?></h4>
                  <a href="<?= base_url('Home/playVideo/'.$this->url_encrypt->encode($vi->id)) ?>"><i class="fa fa-video-camera text-danger" aria-hidden="true"></i></a>
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
