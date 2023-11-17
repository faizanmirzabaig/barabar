<?php

function getToken() {
    $data = "sadda89d893jkh**($&#*isdfhkjsdhf89334324";
    $token_number = hash('sha512', $data);
    return $token_number;
}

function empty_param($arr){

    foreach ($arr as $key => $value) {
        if($value=='')
        {
            return true;
        }
    }
    return false;
}

function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

function push_notification_android($device_id,$message){

    //API URL of FCM
    $url = 'https://fcm.googleapis.com/fcm/send';

    /*api_key available in:
    Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    $api_key = SERVER_KEY;
                
    $fields = array (
        'registration_ids' => array (
                $device_id
        ),
        'data' => array (
                "message" => $message
        )
    );

    //header includes Content type and api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$api_key
    );
                
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

function Send_OTP($MobileNo, $OTP)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://2factor.in/API/V1/'.OTP_API_KEY.'/SMS/'.$MobileNo.'/'.$OTP,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
}

function upload_image($file, $path, $i = '')
{
    $ci = &get_instance();
    if ($i !== '') {
        $_FILES['file']['name'] = $file['name'][$i];
        $_FILES['file']['type'] = $file['type'][$i];
        $_FILES['file']['tmp_name'] = $file['tmp_name'][$i];
        $_FILES['file']['error'] = $file['error'][$i];
        $_FILES['file']['size'] = $file['size'][$i];
        $ext = pathinfo($file['name'][$i], PATHINFO_EXTENSION);
    } else {
        $_FILES['file']['name'] = $file['name'];
        $_FILES['file']['type'] = $file['type'];
        $_FILES['file']['tmp_name'] = $file['tmp_name'];
        $_FILES['file']['error'] = $file['error'];
        $_FILES['file']['size'] = $file['size'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    }
    $config['upload_path'] = $path;
    $config['allowed_types'] = '*';
    $file_name =  date("Ymd_Hi") . "_" . uniqid() . "." . $ext;
    $config['file_name'] = $file_name;
    $ci->load->library('upload', $config);
    $ci->upload->initialize($config);
    if ($ci->upload->do_upload('file')) {
        $ci->upload->data();
        return $file_name;
    }
}

function upload_base64_image($base64, $path)
{
    if (!empty($base64)) {
        $img = $base64;
        $img = str_replace(' ', '+', $img);
        $img_data = base64_decode($img);
        $image = uniqid().'.png';
        $file = $path.$image;
        file_put_contents($file, $img_data);
        return $image;
    }
    exit;

    return false;
}