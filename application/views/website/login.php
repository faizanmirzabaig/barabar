<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        const BASE_URL = '<?= base_url()?>';
    </script>
    <title>Log-in</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="card mt-5 rounded shadow ">
                    <div class="card-body">
                        <form class="form-signin">
                            <div class="text-center mb-4">
                                <img class="mb-4" src="<?= base_url('assets/web/images/wheel.png') ?>" alt="" width="auto" height="72">
                                <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                            </div>

                            <div class="form-label-group mb-4">
                                <input type="number" id="mobile" class="form-control" placeholder="Enter Mobile Number" required="" >
                                <small id="error1" class="form-text text-danger" style="display:none">Enter Valid Number.</small>
                            </div>

                            <div class="form-label-group mb-4">
                                <input type="hidden" class="form-control" id="otp_id" name="otp_id">
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" style="display:none"required >
                                <small id="error" class="form-text text-danger" style="display:none">Enter Valid otp.</small>
                            </div>
                            <button id="verify" type="button"  class="btn btn-lg btn-primary btn-block mb-4">Send OTP</button>
                            <button id="login" type="button" class="btn btn-lg btn-success btn-block mb-4" style="display:none">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>
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
                        console.log(dataResult.otp_id);
                        if(dataResult.statusCode==200){
                            $("#otp_id").val(dataResult.otp_id);
                            $("#otp").show();	
                            $("#verify").hide();	
                            $("#login").show();					
                        }
                        else{
                            alert("Something went wrong")
                        }
                    }
                });
            }
            else{
                $("#error1").show();
            }
        });
        $("#login").click(function(){
            const mobile=$('#mobile').val();
            const otp=$('#otp').val();
            const otp_id=$('#otp_id').val();
            $.ajax({
                url: BASE_URL+'Home/login',
                type: "POST",
                cache: false,
                data:{
                mobile: mobile,
                otp: otp,
                otp_id: otp_id,
                },
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        window.location.replace(BASE_URL+'Home/');	
                    }
                    else{
                        $("#error").show();
                    }
                }
            });
        });
    });
</script>