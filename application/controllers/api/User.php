<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class User extends REST_Controller
{
  private $UserData;
  private $UserId;
  public function __construct()
  {
    parent::__construct();
    $header = $this->input->request_headers('token');

    /* if (!isset($header['token'])) {
            $data['message'] = 'Invalid Request';
            $data['code'] = HTTP_UNAUTHORIZED;
            $this->response($data, HTTP_OK);
            exit();
        }

        if ($header['token'] != getToken()) {
            $data['message'] = 'Invalid Authorization';
            $data['code'] = HTTP_METHOD_NOT_ALLOWED;
            $this->response($data, HTTP_OK);
            exit();
        }*/

    $this->data = $this->input->post();

    $this->load->model([
      'Users_model',
      'Course_model',
      'Donation_model',
      'Purchase_model'
    ]);
  }

  public function register_post()
  {

    if (empty_param(array($this->input->post('name'), $this->input->post('mobile'), $this->input->post('password')))) {
      $data['message'] = 'Parameter Missing';
      $data['code'] = HTTP_NOT_FOUND;
      $this->response($data, HTTP_OK);
      exit();
    }

    if ($this->Users_model->UserProfileByMobile($this->input->post('mobile'))) {
      $data['message'] = 'Mobile Already Exist';
      $data['code'] = HTTP_NOT_FOUND;
      $this->response($data, HTTP_OK);
      exit();
    } else {
      // if($this->Users_model->checkValidOtp($this->input->post('otp'), $otpID))
      // {
      $rand = rand('111', '999');
      $nam = substr(strtoupper($this->input->post('name')), 0, 3);
      $mob = substr(strtoupper($this->input->post('mobile')), 0, 3);
      $reff = $nam . '' . $rand . '' . $mob;
      $dob_yy = $this->input->post('date_of_birth');
      $date_of_birth = date("Y-m-d", strtotime($dob_yy));

      $user_data = [
        'name' => $this->input->post('name'),
        'last_name' => $this->input->post('last_name'),
        'mobile' => $this->input->post('mobile'),
        'date_of_birth' => $date_of_birth,
        'password' => $this->input->post('password'),
        'email' => $this->input->post('email'),
        'gender' => $this->input->post('gender'),
        'alternate_no' => $this->input->post('alternate_no'),
        'occupation_id' => $this->input->post('occupation_id'),
        'education_id' => $this->input->post('education_id'),
        'hobby_id' => $this->input->post('hobby_id'),
        'heard_about_us_id' => $this->input->post('heard_about_us_id'),
        'area_of_interest_id' => $this->input->post('area_of_interest_id'),
        'refferal' => $reff,

        // 'added_date' => date('Y-m-d H:i:s'),
      ];

      $path = 'uploads/data/course_share/';
      if ($this->input->post('img')) {
        $user_data['img'] = upload_base64_image($this->input->post('img'), $path);
      } else {
        $user_data['img'] = '';
      }

      $user_id = $this->Users_model->RegisterUser($user_data);
      // $this->Users_model->updateOtpStatus($otpID);
      $data['message'] = 'Registration has done successfully';
      $data['user_id'] = $user_id;
      $data['code'] = HTTP_OK;
      $this->response($data, HTTP_OK);
      exit();
      // } else {
      //   $data['message'] = 'OTP not found in database';
      //   $data['code'] = HTTP_NOT_FOUND;
      //   $this->response($data, HTTP_OK);
      //   exit();
      // }
    }
  }

  public function login_post()
  {
    $data['referStatus'] = 0;
    if (empty($this->input->post('mobile_no')) && empty($this->input->post('email'))) {
      $data['message'] = 'Parameter Missing';
      $data['code'] = HTTP_NOT_FOUND;
      $this->response($data, HTTP_OK);
      exit();
    }

    $imei_no = $this->input->post('imei_no');
    $refer_code = $this->input->post('refer_code');
    $email = $this->input->post('email');
    if (empty($email)) {
      $user = $this->Users_model->LoginUser($this->input->post('mobile_no'), $imei_no);
    } else {
      $user = $this->Users_model->LoginUserEmail($email, $imei_no);
    }

    if ($user) {
      if ($refer_code) {
        $MobileNo = $this->input->post('mobile_no');
        $this->db->select('*');
        $this->db->where('refferal', $refer_code);
        $this->db->where('isDeleted', false);
        $qu = $this->db->get('tbl_users');
        $num = $qu->num_rows();
        if ($num > 0) {

          $this->db->select('*');
          $this->db->group_start();
          $this->db->where('mobile', $MobileNo);
          $this->db->or_where('email', $email);
          $this->db->group_end();
          $this->db->where('isDeleted', false);
          $qu1 = $this->db->get('tbl_users');
          $num1 = $qu1->num_rows();
          if ($num1 > 0) {
            $result = $qu1->result_array();
            $userefferal = $result[0]['userefferal'];
            if ($userefferal == $refer_code) {
              $data['referStatus'] = 3;
            } else if ($userefferal == '') {

              $arrData = array('userefferal' => $refer_code);
              $this->db->group_start();
              $this->db->where('mobile', $MobileNo);
              $this->db->or_where('email', $email);
              $this->db->group_end();
              $this->db->update('tbl_users', $arrData);
              $data['referStatus'] = 1;
            } else {
              $data['referStatus'] = 5;
            }
          } else {
          }

          $data['message'] = 'Success';
          $data['user_data'] = $user;
          $data['code'] = HTTP_OK;
          $this->response($data, HTTP_OK);
          exit();
        } else {
          $data['referStatus'] = 0;
          $data['message'] = 'Success';
          $data['user_data'] = $user;
          $data['code'] = HTTP_OK;
          $this->response($data, HTTP_OK);

          exit();
        }
      } else {
        $data['referStatus'] = 2;
        $data['message'] = 'Success';
        $data['user_data'] = $user;
        $data['code'] = HTTP_OK;
        $this->response($data, HTTP_OK);
        exit();
      }
    } else {
      $data['referStatus'] = '';
      $data['message'] = 'No User Found';
      $data['code'] = HTTP_NOT_FOUND;
      $this->response($data, HTTP_OK);
      exit();
    }
  }
  public function checkReferralCode_post()
  {
    if (empty_param(array($this->input->post('refer_code')))) {
      $data['message'] = 'Parameter Missing';
      $data['code'] = HTTP_NOT_FOUND;
      $this->response($data, HTTP_OK);
      exit();
    }
    $refer_code = $this->input->post('refer_code');
    if ($refer_code) {
      if ($refer_code) {
        $this->d->select('*');
        $this->db->where('refferal', $refer_code);
        $this->db->where('isDeleted', false);
        $qu = $this->db->get('tbl_users');
        $num = $qu->num_rows();
        if ($num > 0) {

          $data['referStatus'] = 1;
          $data['message'] = 'Success';
          $data['referal_code'] = $refer_code;
          $data['code'] = HTTP_OK;
          $this->response($data, HTTP_OK);
          exit();
        } else {
          $data['referStatus'] = 0;
          $data['referal_code'] = $refer_code;
          $data['message'] = 'Referal Code Not Found';
          $data['code'] = HTTP_NOT_FOUND;
          $this->response($data, HTTP_OK);
          exit();
        }
      } else {
        $data['referStatus'] = 2;
        $data['message'] = 'Success';
        $data['referal_code'] = $refer_code;
        $data['code'] = HTTP_OK;
        $this->response($data, HTTP_OK);
        exit();
      }
    } else {
      $data['referal_code'] = '';
      $data['message'] = 'No User Found';
      $data['code'] = HTTP_NOT_FOUND;
      $this->response($data, HTTP_OK);
      exit();
    }
  }
  public function logout_post()
  {
    if (empty($this->input->post('user_id'))) {
      $data['message'] = 'Parameter Missing';
      $data['code'] = HTTP_NOT_FOUND;
      $this->response($data, HTTP_OK);
      exit();
    }
    $imei_no = $this->input->post('imei_no');
    $user = $this->Users_model->LogoutUser($this->input->post('user_id'));
    if ($user) {
      $data['message'] = 'Success';
      $data['user_data'] = $user;
      $data['code'] = HTTP_OK;
      $this->response($data, HTTP_OK);
      exit();
    } else {
      $data['message'] = 'No User Found';
      $data['code'] = HTTP_OK;
      $this->response($data, HTTP_OK);
      exit();
    }
  }

  // public function userprofile_post()
  // {
  //   $UserData = $this->Users_model->UserProfile($this->input->post('user_id'));
  //   $data['message'] = 'Success';
  //   $data['code'] = HTTP_OK;
  //   $data['user_data'] = $UserData;
  //   $this->response($data, HTTP_OK);
  //   exit();
  // }

  public function userprofile_post()
  {
    $id = $this->input->post('user_id');
    $fcm = $this->input->post('fcm');

    // Check if the user is blocked
    $userData = $this->Users_model->UserProfile($id, $fcm);
    // print_r($userData);   
    // exit;
    if ($userData->is_Blocked) {
      $data['message'] = 'User is blocked please contact to admin.';
      $data['code'] = HTTP_FORBIDDEN; // Set an appropriate HTTP status code (e.g., 403 Forbidden)
      $data['user_data'] = null;
    } else {
      // User is not blocked, proceed with fetching the user profile
      $userData = $this->Users_model->UserProfile($id, $fcm);
      $data['message'] = 'Success';
      $data['code'] = HTTP_OK;
      $data['user_data'] = $userData;
    }

    $this->response($data, $data['code']);
  }


  public function userReferList_post()
  {
    $UserData = $this->Users_model->UserReferList($this->input->post('user_id'), $this->input->post('refer_code'));
    if ($UserData) {
      $data['message'] = 'Success';
      $data['code'] = HTTP_OK;
      $data['user_data'] = $UserData;
      $this->response($data, HTTP_OK);
      exit();
    } else {
      $data['message'] = 'No Data Founds..';
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
      exit();
    }
  }

  public function update_post()
  {
    $user_id = $this->input->post('user_id');
    if ($user_id) {
      $dob_yy = $this->input->post('date_of_birth');
      $date_of_birth = date("Y-m-d", strtotime($dob_yy));
      $user_data = [
        'name' => $this->input->post('name'),
        'last_name' => $this->input->post('last_name'),
        'mobile' => $this->input->post('mobile'),
        'password' => $this->input->post('password'),
        'email' => $this->input->post('email'),
        'gender' => $this->input->post('gender'),
        'date_of_birth' => $date_of_birth,
        'alternate_no' => $this->input->post('alternate_no'),
        'occupation_id' => $this->input->post('occupation_id'),
        'education_id' => $this->input->post('education_id'),
        'hobby_id' => $this->input->post('hobby_id'),
        'heard_about_us_id' => $this->input->post('heard_about_us_id'),
        'area_of_interest_id' => $this->input->post('area_of_interest_id'),
        'pincode' => $this->input->post('pincode'),
        'flag' => 0,
        // 'refferal' => $reff,

        // 'added_date' => date('Y-m-d H:i:s'),
      ];
      $path = 'uploads/data/course_share/';
      if ($this->input->post('img')) {
        $user_data['img'] = upload_base64_image($this->input->post('img'), $path);
      } else {
        $user_data['img'] = '';
      }

      // $user_data = [
      //     'address' => $address,

      // ];
      if (!empty($this->input->post('name'))) {
        // if(!empty($this->input->post('name'))) {
        //   $user_data['name'] = $this->input->post('name');
        // }

        $UpdateProfile = $this->Users_model->UpdateProfile($user_id, $user_data);
        $this->db->select('*');
        $this->db->where('id', $user_id);
        $q = $this->db->get('tbl_users');
        $res = $q->row();

        $data = [
          'user_data' => $res,
          'message' => 'Success',
          'code' => HTTP_OK,
        ];
        $this->response($data, HTTP_OK);
      } else {
        $data = [
          'message' => 'Invalid Parameter',
          'code' => HTTP_FORBIDDEN,
        ];
        $this->response($data, HTTP_OK);
      }
    } else {
      $data = [
        'message' => 'Invalid Parameter',
        'code' => HTTP_FORBIDDEN,
      ];
      $this->response($data, HTTP_OK);
    }
  }

  public function courseList_post()
  {
    $userId = $this->input->post('user_id');
    $courseList = $this->Users_model->courseList($userId);
    if (!empty($courseList)) {
      $data['message'] = 'successfully';
      $data['code'] = HTTP_OK;
      $data['courseList'] = $courseList;
      $this->response($data, HTTP_OK);
    } else {
      $data['message'] = 'No data founds..';
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();
  }

  public function chapterDetails_post()
  {
    $userId = $this->input->post('user_id');
    $course_id = $this->input->post('course_id');
    $course_detail = $this->Course_model->ViewCourse('', $course_id);
    $chapterList = $this->Users_model->courseDetails($userId, $course_id);
    if (!empty($chapterList)) {
      $allVedioCount = 0;
      foreach ($chapterList as $key => $value) {
        $allVedioCount = $allVedioCount + $value->courseVedioCount;
      }
      $data['message'] = 'successfully';
      $data['code'] = HTTP_OK;
      $data['coursedetail'] = $course_detail;
      $data['chaptercount'] = count($chapterList);
      $data['allVedioCount'] = $allVedioCount;
      $data['chapterList'] = $chapterList;
      $this->response($data, HTTP_OK);
    } else {
      $data['message'] = 'No data founds..';
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();
  }


  public function courseVideoDetails_post()
  {
    $userId = $this->input->post('user_id');
    $chapter_id = $this->input->post('chapter_id');
    $course_id = $this->input->post('course_id');
    $chapterList = $this->Users_model->courseVideoDetails($userId, $chapter_id, $course_id);
    if (!empty($chapterList)) {
      $data['message'] = 'successfully';
      $data['code'] = HTTP_OK;
      $data['videoCount'] = count($chapterList);
      $data['chapterList'] = $chapterList;
      $this->response($data, HTTP_OK);
    } else {
      $data['message'] = 'No data founds..';
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();
  }

  public function bannerList_post()
  {
    $userId = $this->input->post('user_id');
    $data['bannerList'] = $this->Users_model->bannerList($userId);
    if (!empty($data['bannerList'])) {
      $data['message'] = 'successfully';
      $data['code'] = HTTP_OK;
      $this->response($data, HTTP_OK);
    } else {
      $data['message'] = 'No data founds..';
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();
  }

  public function course_purchase_add_post()
  {



    try {

      if (!empty($this->input->post('user_id')) && !empty($this->input->post('course_id')) && !empty($this->input->post('amount'))) {
        $user_id = $this->input->post('user_id');
        $course_id = $this->input->post('course_id');
        $order_id = $this->input->post('order_id');


        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('tbl_users.id', $user_id);
        $Q = $this->db->get();
        $num_r = $Q->num_rows();
        if ($num_r > 0) {
          $final_amountss = 0;
          $discount = 0;
          $this->db->select('*');
          $this->db->from('tbl_order');
          $this->db->where('tbl_order.id', $order_id);
          $Query1 = $this->db->get();
          $num_row1 = $Query1->num_rows();
          if ($num_row1 > 0) {

            $re = $Query1->row();

            $final_amountss = $re->amount;
          }

          $res = $Q->row();
          $current_balance = $res->wallet;
          if ($current_balance >= $final_amountss) {
            $final_amount1 = $current_balance - $final_amountss;

            $arrData = array('wallet' => $final_amount1);
            $this->db->where('id', $user_id);
            $this->db->update('tbl_users', $arrData);
          } else {
            $final_amount1 = $final_amountss - $current_balance;

            $arrData = array('wallet' => 0);
            $this->db->where('id', $user_id);
            $this->db->update('tbl_users', $arrData);
          }
        }


        $this->db->select('tbl_course.*');
        $this->db->from('tbl_course');
        $this->db->where('tbl_course.id', $course_id);
        $this->db->order_by('tbl_course.id', 'desc');
        $Query = $this->db->get();
        $num_rows = $Query->num_rows();
        if ($num_rows > 0) {

          $resu = $Query->result_array();
          $duration = '+' . $resu[0]['duration'] . ' days';
          $curr_date = date('Y-m-d H:i:s');
          $NewDate = date('Y-m-d H:i:s', strtotime($duration));

          $vendorData = [
            'user_id' => $this->input->post('user_id'),
            'course_id' => $this->input->post('course_id'),
            'amount' => $this->input->post('amount'),
            'purchase_date' => date('Y-m-d H:i:s'),
            'expiry_date' => $NewDate,
            'payment_status' => 1
          ];
          $this->db->insert('tbl_course_purchase', $vendorData);
          $userefferal = '';
          $refferal = '';
          $this->db->select('*');
          $this->db->from('tbl_users');
          $this->db->where('tbl_users.id', $user_id);
          $Q = $this->db->get();
          $num_r = $Q->num_rows();
          if ($num_r > 0) {
            $result = $Q->result_array();
            $userefferal = $result[0]['userefferal'];
            $refferal = $result[0]['refferal'];
          }



          if (!empty($userefferal)) {
            $this->db->select('*');
            $this->db->from('tbl_course_purchase');
            $this->db->where('tbl_course_purchase.user_id', $user_id);
            $this->db->order_by('tbl_course_purchase.id', 'desc');
            $Queryaa = $this->db->get();
            $num_rowa = $Queryaa->num_rows();
            if ($num_rowa == 1) {
              $this->Users_model->referAmount($refferal, $user_id, $userefferal);
            }
          }
          $data['message'] = 'Course Purchase Insert successfully';
          $data['code'] = HTTP_OK;
          $this->response($data, HTTP_OK);
          exit();
        } else {

          $data['message'] = 'Error while Missing Parameter';
          $data['code'] = 404;
          $this->response($data, HTTP_OK);
          exit();
        }
      } else {
        $data['message'] = 'Error while Missing Parameter';
        $data['code'] = 404;
        $this->response($data, HTTP_OK);
        exit();
      }
    } catch (\Exception $e) {
      $data['message'] = $e->getMessage();
      $data['code'] = HTTP_OK;
      $this->response($data, HTTP_OK);
      exit();
    }
  }


  public function user_course_list_post()
  {
    $user_id = $this->input->post('user_id');
    $user_course_list = $this->Users_model->user_course_list($user_id);

    if (!empty($user_course_list)) {
      $data['code'] = HTTP_OK;
      $data['user_course_list'] = $user_course_list;
      $this->response($data, HTTP_OK);
    } else {
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();
  }


  public function user_course_update_post()
  {
    $userId = $this->input->post('user_id');
    $course_id = $this->input->post('course_id');
    $order_id = $this->input->post('order_id');
    $course_purchase_id = $this->input->post('course_purchase_id');
    if ($course_purchase_id) {
      if ($course_id) {
        $user_course_list = $this->Users_model->user_course_update($userId, $course_id, $course_purchase_id, $order_id);

        if (!empty($user_course_list)) {
          $data['code'] = HTTP_OK;
          $data['user_course_list'] = $user_course_list;
          $this->response($data, HTTP_OK);
        } else {
          $data['code'] = 404;
          $this->response($data, HTTP_OK);
        }
      } else {
        $data['code'] = 404;
        $this->response($data, HTTP_OK);
      }
    } else {
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();
  }

  public function user_course_vedio_list_post()
  {
    $userId = $this->input->post('course_id');
    $user_course_list = $this->Users_model->user_course_vedio_list($userId);

    if (!empty($user_course_list)) {
      $data['code'] = HTTP_OK;
      $data['user_course_list'] = $user_course_list;
      $this->response($data, HTTP_OK);
    } else {
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();
  }


  public function setting_list_post()
  {
    $userId = $this->input->post('user_id');
    $setting_list = $this->Users_model->settingList($userId);

    if (!empty($setting_list)) {
      $data['code'] = HTTP_OK;
      $data['setting_list'] = $setting_list;
      $this->response($data, HTTP_OK);
    } else {
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();
  }

  public function send_otp_post()
  {
    if (!isset($this->data['mobile'])) {
      $data['message'] = 'Mobile number is missing';
      $data['code'] = HTTP_NOT_FOUND;
      $this->response($data, HTTP_OK);
      exit();
    }

    $mobile = $this->data['mobile'];
    $user = $this->Users_model->UserProfileByMobile($mobile);
    //print_r($user);die();
    if ($user) {
      $data['message'] = 'Mobile Already Exists, Please Login';
      $data['code'] = HTTP_NOT_FOUND;
      $this->response($data, HTTP_OK);
      exit();
    } else {
      $otp = rand(1000, 9999);
      $otp_id = $this->Users_model->InsertOTP($mobile, $otp);
      $msg = "Your OTP code is: " . $otp;
      Send_OTP($mobile, $otp);

      $data['message'] = 'Success';
      $data['otp_id'] = $otp_id;
      $data['code'] = HTTP_OK;
      $this->response($data, HTTP_OK);
      exit();
    }
  }

  public function only_send_otp_post()
  {
    $mobile = $this->data['mobile'];
    // $user = $this->Users_model->UserProfileByMobile($mobile);
    // if ($user) {
    //     $data['message'] = 'Mobile Already Exist, Please Login';
    //     $data['code'] = HTTP_NOT_FOUND;
    //     $this->response($data, HTTP_OK);
    //     exit();
    // } else {
    $otp = rand(1000, 9999);

    // $otp = 9988;
    $otp_id = $this->Users_model->InsertOTP($mobile, $otp);
    $msg = "Yout OTP code is : " . $otp;
    // Send_SMS($mobile,$msg);
    Send_OTP($mobile, $otp);
    $data['message'] = 'Success';
    $data['otp_id'] = $otp_id;
    $data['code'] = HTTP_OK;
    $this->response($data, HTTP_OK);
    exit();
    // }
  }

  // public function user_donation_post()
  // {
  //   $userId = $this->input->post('user_id');
  //   $amount = $this->input->post('amount');
  //   $donation = $this->Users_model->UserDonation($userId,$amount);
  //   if (!empty($donation)) {
  //     $data['message'] = 'successfully';
  //     $data['code'] = HTTP_OK;
  //     $data['donation'] = $donation;
  //     $this->response($data, HTTP_OK);
  //   } else {
  //     $data['message'] = 'No data founds..';
  //     $data['code'] = 404;
  //     $this->response($data, HTTP_OK);
  //   }
  //   exit();
  // }

  public function user_donation_post()
  {
    $userId = $this->input->post('user_id');
    $amount = $this->input->post('amount');

    // Fetch user's wallet balance from the database
    $userWalletBalance = $this->Users_model->fetchUserWalletBalance($userId);

    if ($userWalletBalance >= $amount) {
      // Deduct the donation amount from the user's wallet
      $deductionSuccessful = $this->Users_model->deductAmountFromWallet($userId, $amount);

      if ($deductionSuccessful) {
        // Insert donation record into tbl_donation table

        $donationRecordInserted = $this->Users_model->insertDonationRecord($userId, $amount);
        if ($donationRecordInserted) {
          $data['message'] = 'Donation successful';
          $data['code'] = HTTP_OK;
          $this->response($data, HTTP_OK);
        } else {
          $data['message'] = 'Donation record insertion failed';
          $data['code'] = 500; // Internal Server Error
          $this->response($data, HTTP_OK);
        }
      } else {
        // echo "im here";
        $data['message'] = 'Transaction failed';
        $data['code'] = 500; // Internal Server Error
        $this->response($data, HTTP_OK);
      }
    } else {
      $data['message'] = 'Insufficient balance in wallet';
      $data['code'] = 400; // Bad Request
      $this->response($data, HTTP_OK);
    }
  }

  public function user_donation_list_post()
  {
    $user_id = $this->input->post('user_id');
    $user_donation_list = $this->Donation_model->user_donation_list($user_id);

    if (!empty($user_donation_list)) {
      $data['code'] = HTTP_OK;
      $data['user_donation_list'] = $user_donation_list;
      $this->response($data, HTTP_OK);
    } else {
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();
  }

  public function User_Purchase_Post()
  {
    $user_id = $this->input->post('user_id');
    $user_purchase_list = $this->Purchase_model->user_purchase_list($user_id);

    if (!empty($user_purchase_list)) {
      $data['code'] = HTTP_OK;
      $data['user_purchase_list'] = $user_purchase_list;
      $this->response($data, HTTP_OK);
    } else {
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();

  }

  public function User_Wallet_Post()
  {
    $user_id = $this->input->post('user_id');
    $user_wallet_list = $this->Purchase_model->user_Wallet($user_id);

    if (!empty($user_wallet_list)) {
      $data['code'] = HTTP_OK;
      $data['user_wallet_list'] = $user_wallet_list;
      $this->response($data, HTTP_OK);
    } else {
      $data['code'] = 404;
      $this->response($data, HTTP_OK);
    }
    exit();

  }
}
