<?php defined('BASEPATH') OR exit('No direct script access allowed.'); 
$config['useragent'] = 'PHPMailer'; // Mail engine switcher: 'CodeIgniter' or 'PHPMailer' 
// $config['protocol']='smtp'; 
// $config['smtp_host']='smtp.googlemail.com'; 
// $config['smtp_port']=587; 
// $config['smtp_crypto']='tls'; 
// $config['smtp_timeout']=30; 
// $config['smtp_user']='isuitesystems@gmail.com';
// $config['smtp_pass']='isuite@321';

$config['protocol']='smtp'; 
$config['smtp_host']='smtp.office365.com'; 
$config['smtp_port']=587; 
$config['smtp_crypto']='tls'; 
$config['smtp_timeout']=30; 
$config['smtp_user']='NoReply@isuite360.com';
$config['smtp_pass']='Qas72772';

// $config['smtp_user']='shyam.androapps@gmail.com';
// $config['smtp_pass']='androappstech'; 
$config['charset']='utf-8'; 
$config['newline']="\r\n";