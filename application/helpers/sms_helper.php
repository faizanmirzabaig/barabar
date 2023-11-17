<?php

    function send_sms($mobile,$otp){
        $username = 'AndroOTP';
        $password = 'Sms@123';
        // Message details
        $senderid = 'DEFAUL';
        $template = '1122334455667788990';
        $type = '1';
        $product = '1';
        $number = $mobile;
        $message = urlencode('Your OTP is '.$otp.' Thank you for Registering'.PROJECT_NAME);
        // API credentials
        $credentials = 'username='. $username . '&password='. $password;
        // prepare data for GET request
        $data = '&sender='. $senderid . '&mobile='. $number. '&type='. $type. '&product='. $product. '&template='. $template. '&message='. $message;
        
        // make url to post using cURL
        // $url = 'http://domain/api/sendsms.php?'. $credentials . $data;
        $url = 'http://makemysms.in/api/sendsms.php?'. $credentials . $data;
        // Configure cURL options
        $options = array (CURLOPT_RETURNTRANSFER => true , // return web page
        CURLOPT_HEADER => false , // don't return headers
        CURLOPT_FOLLOWLOCATION => false , // follow redirects
        CURLOPT_ENCODING => "" , // handle compressed
        CURLOPT_USERAGENT => "test" , // who am i
        CURLOPT_AUTOREFERER => true , // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120 , // timeout on connect
        CURLOPT_TIMEOUT => 120 , // timeout on response
        CURLOPT_MAXREDIRS => 10 ); // stop after 10 redirects
        
        // Send the GET request with cURL
        $ch = curl_init ( $url ); 
        curl_setopt_array ( $ch, $options ) ;
        $content = curl_exec ( $ch ); 
        $err = curl_errno ( $ch ); 
        $errmsg = curl_error ( $ch ); 
        $header = curl_getinfo ( $ch ); 
        $httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE ); 
        curl_close ( $ch ); 
        
        // Receive response
        $header [ 'errno' ] = $err; 
        $header [ 'errmsg' ] = $errmsg; 
        $header [ 'content' ] = $content; 
    }
        
?>
