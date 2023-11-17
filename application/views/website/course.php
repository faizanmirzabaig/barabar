<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
  $txnid = time();
  $key_id = API_KEY;
  $total = ($course->price * 100);
  $amount = $course->price;
  $course_id = $course->id;
  $name = PROJECT_NAME;
  $return_url = base_url() . 'Home/callback';
  $surl='Home/success';
  $furl='Home/failed';
  $currency_code='INR';
  $des=explode(".",$course->description);
  $desc=$des[0];
  $base_url2= 'https://androappstech.com/'.PROJECT_NAME;
  // echo $desc;die;
?>
<section>
  <div class="container">
    <div class="col-md-12">
      <div class="corses_detail">
        <h2><a href="#"><?= $course->name ?></a></h2>
        <img src="<?= $base_url2.'/data/course/'.$course->image ?>" class="img-fluid topic_img">
        <div class="single-course-details ">
          <h4 class="course-title">Description</h4>
          <p><span id="half"><?= $desc?>.</span><span id="full" style="display:none"><?= $course->description ?></span> <span id="hide" class="text-primary" style="cursor: pointer;display:none" > less</span><span id="show" class="text-primary" style="cursor: pointer;"> see more</span></p>
          <div class="row">
            <div class="col-md-8 single-course-details">
              <div class="edutim-course-topics-header d-lg-flex justify-content-between course-info">
                <div class="edutim-course-topics-header-left">
                  <h4 class="course-title">Course Item</h4>
                </div>
                <div class="edutim-course-topics-header-right">
                  <span> Chapter: <strong><?= $course->courseChapterCount ?></strong></span>
                  <span> Videos: <strong><?= $course->courseVideoCount ?></strong> </span>            
                </div>
              </div>
              <!-- <div>
                <?php foreach($chapter as $ch){ ?>
                <div class="about-text-block">
                  <i class="bi bi-paper"></i>
                  <h4><?= $ch->name ?></h4>   
               </div>
               <?php } ?>
             </div> -->
           </div>
           <div class="col-md-4">
             <div class="course-sidebar">
              <div class="course-single-thumb">
                <!-- <img src="<?= base_url('data/course/'.$course->image) ?>" alt="" class="img-fluid w-100"> -->
                <div class="course-price-wrapper">
                  <div class="course-price ml-3"><h4>Price: <span><i class="fa fa-rupee"></i><?= $course->price ?></span></h4></div>
                  <div class="buy-btn"><a href="#" class="btn btn-main btn-block " data-toggle="modal" data-target="#exampleModal">Buy This Course</a></div>
                </div>
              </div>


              <!-- <div class="course-widget single-info">
                <i class="bi bi-user-ID"></i>
                Instructor <span><?= $course->writer ?></span> 
              </div> -->
              <div class="course-widget single-info">
                <i class="bi bi-forward"></i>
                Language <span><?= $course->language ?></span> 
              </div>
              <div class="course-widget single-info">
                <i class="bi bi-flag"></i>
                Validity Period <span><?= $course->duration ?> Days</span> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<form name="razorpay-form" id="razorpay-form" action="<?= $return_url; ?>" method="POST">
    <input type="hidden" name="course_id" id="course_id" value="<?= $course_id; ?>"/>
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
    <input type="hidden" name="merchant_order_id" id="merchant_order_id" />
    <input type="hidden" name="duration" id="duration" value="<?= $course->duration; ?>" />
    <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?= $txnid; ?>" />
    <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?= $surl; ?>" />
    <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?= $furl; ?>" />
    <input type="hidden" name="merchant_total" id="merchant_total" value="<?= $total; ?>" />
    <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?= $amount; ?>" />
</form>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <?= form_open('Home/update',array('id'=>'add_otp','autocomplete'=>'off',)); ?> -->
          <div class="form-group">
            <input type="number" class="form-control" id="mobile" name="mobile" maxlength="10" minlength="10" placeholder="Enter Mobile Number" required>
            <small id="error1" class="form-text text-danger" style="display:none">Enter Valid Number.</small>
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" id="otp_id" name="otp_id">
            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" style="display:none" required>
            <small id="error" class="form-text text-danger" style="display:none">Enter Valid otp.</small>
          </div>
          <button id="verify" class="btn btn-success btn-sm">Send OTP</button>
          <button type="submit" id="submit" class="btn btn-success btn-sm" style="display:none">Submit</button>
        <!-- <?= form_close() ?> -->
      </div>
      <div class="modal-footer">   
      </div>
    </div>
  </div>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	$(document).ready(function(){
    $("#otp").click(function(){
      $("#error").hide();
    })
	  $("#verify").click(function(){
		  const mobile=$('#mobile').val();
      if(mobile.length==10){
        $.ajax({
          url: BASE_URL+'Home/otp',
          type: "POST",
          cache: false,
          data:{
            mobile: mobile
          },
          success: function(dataResult){
              var dataResult = JSON.parse(dataResult);
              console.log(dataResult);
              if(dataResult.statusCode==200){
                $("#otp_id").val(dataResult.otp_id);
                $("#otp").show();	
                $("#verify").hide();	
                $("#submit").show();					
              }
              else{
                $("#error").show();
              }
          }
        });
      }
      else{
        $("#error1").show();
      }
	  });
    $("#submit").click(function(){
		  const mobile=$('#mobile').val();
      const otp=$('#otp').val();
      const otp_id=$('#otp_id').val();
      $.ajax({
        url: BASE_URL+'Home/register',
        type: "POST",
        cache: false,
        data:{
          mobile: mobile,
          otp: otp,
          otp_id: otp_id,
          course_id:<?= $course->id ?>
        },
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              $('#exampleModal').modal('toggle');
              document.getElementById('merchant_order_id').value=dataResult.order_id;
              razorpaySubmit(this);					
            }
            else if(dataResult.statusCode==202){
              window.location.replace(BASE_URL+'Home/');
            }
            else{
              $("#error").show();
            }
        }
      });
	  });

    $("#show").click(function(){
      $("#half").hide();
      $("#show").hide();
      $("#full").show();
      $("#hide").show();
    })

    $("#hide").click(function(){
      $("#full").hide();
      $("#hide").hide();
      $("#half").show();
      $("#show").show();
    })

	});
	</script>
  
<script>
    var razorpay_options = {
        key: "<?= API_KEY ?>",
        amount: <?= $total ?>,
        name: "<?= PROJECT_NAME ?>",
        netbanking: true,
        currency: "INR",
        notes: {
            soolegal_order_id: document.getElementById('merchant_order_id').value,
        },
        handler: function(transaction) {
            document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
            document.getElementById('razorpay-form').submit();
        },
        "modal": {
            "ondismiss": function() {
                location.reload()
            }
        }
    };

    var razorpay_submit_btn, razorpay_instance;

    function razorpaySubmit(el) {


        if (typeof Razorpay == 'undefined') {
            setTimeout(razorpaySubmit, 200);
            if (!razorpay_submit_btn && el) {
                razorpay_submit_btn = el;
                el.disabled = true;
                el.value = 'Please wait...';
            }
        } else {
            if (!razorpay_instance) {
                razorpay_instance = new Razorpay(razorpay_options);
                if (razorpay_submit_btn) {
                    razorpay_submit_btn.disabled = false;
                    razorpay_submit_btn.value = "Pay Now";
                }
            }
            razorpay_instance.open();
        }
    }
</script>