<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/******************API ERROR CODES **************************/
define('HTTP_OK',200);
define('HTTP_UNAUTHORIZED',401);
define('HTTP_FORBIDDEN',403);
define('HTTP_NOT_FOUND',404);
define('HTTP_METHOD_NOT_ALLOWED',405);
define('HTTP_BLANK',407);
define('HTTP_INVALID', 411);
define('HTTP_NOT_ACCEPTABLE',406);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
define('PROJECT_NAME','Collective Wisdom');

// Roles
define('SUPERADMIN',0);
define('MANAGER',1);
define('CREATOR',2);

// Course Status
define('PAYMENT_PEND',-1);
define('INCOMPLETE',0);
define('PENDING',1);
define('APPROVED',2);
define('REJECTED',3);

// Permissions
define('BANNER_PER',"BANNER_PER");
define('USERS_PER',"USERS_PER");
define('COURSE_APPRO_PER',"COURSE_APPRO_PER");
define('OUR_COURSE_PER',"OUR_COURSE_PER");
define('CREATOR_COURSE_PER',"CREATOR_COURSE_PER");
define('CREATOR_PER',"CREATOR_PER");
define('MANAGER_PER',"MANAGER_PER");
define('COURSE_PURCHASE_PER',"COURSE_PURCHASE_PER");
define('MASTER_PER',"MASTER_PER");
define('SETTING_PER',"SETTING_PER");
define('QUIZ_REPORT_PER',"QUIZ_REPORT_PER");
define('BOT_QUESTION_PER',"BOT_QUESTION_PER");
define('CHAT_PER',"CHAT_PER");
define('ADD_WALLET_PER',"ADD_WALLET_PER");
define('DONATION_PER',"DONATION_PER");
define('WITHDRAWAL_PER',"WITHDRAWAL_PER");


// Course Share Status
define('COURSE_SHARE_PENDING',0);
define('COURSE_SHARE_APPROVED',1);
define('COURSE_SHARE_REJECTED',2);


// define('PAYTM_TEST_URL', 'https://securegw-stage.paytm.in'); //test
// define('PAYTM_LIVE_URL', 'https://securegw.paytm.in'); //live
define('PAYUMONEY_KEY', 'p1xzu3'); //live
define('PAYUMONEY_SALT', 'B60GhIGutzksmEWXmTJQ4Gu9ms09KSW3'); //live


// Course Video Content Type
define('VIDEO',0);
define('IMAGE',1);
define('PDF',2);

// Pay U Money 
define('MERCHANT_KEY','p1xzu3');
define('SALT','B60GhIGutzksmEWXmTJQ4Gu9ms09KSW3');




define('KEY', '2018');
define('URL_ENCRYPT_KEY', 'MyShop432423');
define('URL_ENCRYPT_IV', 'DHSKJHD^*$#^IDK*');
define('CIPHER', 'AES-128-ECB');
define('LOGO', 'uploads/logo/');

// RAZOR PAY
// define('API_KEY','rzp_live_EpsOYgHl8D1rbt');         //live 
// define('API_SECRET','dP51DUiV9KIU1tzSQFFot43z');

// define('API_KEY','rzp_live_sS63B5TA2wW7eW');     //test
// define('API_SECRET','15tIi2BnOtvgy1tYPa8S3F4j');

//define('API_KEY','rzp_test_T5Gvtw9pkcWBdF');  test rzp_live_BDjPVkS0JcHHsH

// define('API_KEY','rzp_live_BDjPVkS0JcHHsH');     //test
// define('API_SECRET','7bFMQVLhEAzUcy9zKCa8sp2e');
define('API_KEY','rzp_test_Vtf2DMXoXwk0cA');     //test
define('API_SECRET','EfKy2VdlH8GAZPozCuNHwAR0');

// define('API_KEY','rzp_test_T5Gvtw9pkcWBdF');     //test
// define('API_SECRET','fLHsyVgYYZu6NewItb4ZVqrV');

define('OTP_API_KEY', '');

// FCM Notification
define('SERVER_KEY','AAAAyuNPNCY:APA91bFf_8rYZf1w9PfT8xk6ZiC7dtRKyGX8P2ZyPC5XPt7D8v2PwnODhyIKSgJfMPtdJ0-tSVI6m0aMjNg3bVu2vG7rxWLGYsNQu7uuBoleLqWdMRrs3rH9PHKgD6Qeeuib8nVd8QNm');




