<?php
class Users_model extends MY_Model
{
  public function AllUser()
  {
    $this->db->select('tbl_users.*');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.isDeleted', false);
    $Query = $this->db->get();
    // return $Query;
    $count = $Query->num_rows();
    return $count;
  }
  public function InsertOTP($MobileNo, $OTP)
  {
    $this->db->where('mobile', $MobileNo);
    $this->db->where('status', 0);
    $Query = $this->db->get('tbl_otp');
    $OTPRecord = $Query->row();
    if ($OTPRecord) {
      //update otp
      $data = [
        'otp' => $OTP,
        'added_date' => date('Y-m-d H:i:s')
      ];
      $this->db->where('id', $OTPRecord->id);
      if ($this->db->update('tbl_otp', $data)) {
        return $OTPRecord->id;
      } else {
        return FALSE;
      }
    } else {
      //insert otp
      $data = [
        'otp' => $OTP,
        'mobile' => $MobileNo
      ];
      if ($this->db->insert('tbl_otp', $data)) {
        return $this->db->insert_id();
      } else {
        return FALSE;
      }
    }
  }

  public function AllBookingList()
  {
    $this->db->select('tbl_booking.*,tbl_service_subcategory.name as s_name,tbl_vendor.name as v_name,tbl_users.name as u_name,tbl_vendor.base_price as nightAmount,tbl_vendor.basefireDay as dayAmount,tbl_users.*,tbl_users.address as u_address,tbl_vendor.email as v_email,tbl_vendor.mobile as v_mobile,tbl_vendor.alt_mobile as v_alt_mobile,tbl_vendor.refferal as v_referalCode,tbl_vendor.address as v_address,tbl_vendor.shopname as v_shopname, tbl_vendor.basefireDay as v_basefireDay,tbl_vendor.base_price as v_base_price,tbl_vendor.work_experience as v_work_experience,tbl_vendor.working_hours as v_working_hours,tbl_vendor.holiday as v_holiday,tbl_vendor.no_of_employee as v_no_of_employee,tbl_services.service_charge,tbl_services.booking_charge,tbl_services.name as ser_name,tbl_vehicle_type.name as v_ty_name,tbl_manufacturer.name as manufacturer_name,tbl_model.name as model_name,tbl_varient.name as varient_name,tbl_fueltype.name as fueltype_name');
    $this->db->from('tbl_booking');
    $this->db->join('tbl_service_subcategory', 'tbl_service_subcategory.id = tbl_booking.service_id', 'left');
    $this->db->join('tbl_services', 'tbl_services.id = tbl_service_subcategory.service_id', 'left');
    $this->db->join('tbl_vehicle_type', 'tbl_vehicle_type.id = tbl_services.service_category', 'left');
    $this->db->join('tbl_manufacturer', 'tbl_manufacturer.vehicle_tyes_id = tbl_vehicle_type.id', 'left');
    $this->db->join('tbl_model', 'tbl_manufacturer.id = tbl_model.manufacturer_id', 'left');
    $this->db->join('tbl_varient', 'tbl_model.id = tbl_varient.model_id', 'left');
    $this->db->join('tbl_fueltype', 'tbl_fueltype.variant_id = tbl_varient.id', 'left');

    $this->db->join('tbl_vendor', 'tbl_vendor.id = tbl_booking.vendor_id', 'left');
    $this->db->join('tbl_users', 'tbl_users.id = tbl_booking.user_id', 'left');

    $this->db->order_by('tbl_booking.id', 'desc');
    $this->db->group_by('tbl_booking.id');
    $Query = $this->db->get();
    return $Query->result();
  }

  public function resumeList($id)
  {
    $this->db->select('tbl_resume.*,tbl_service_subcategory.name as s_name,tbl_vendor.name as v_name,tbl_users.name as u_name');
    $this->db->from('tbl_resume');
    $this->db->join('tbl_booking', 'tbl_booking.id = tbl_resume.booking_id', 'left');
    $this->db->join('tbl_service_subcategory', 'tbl_service_subcategory.id = tbl_booking.service_id', 'left');
    $this->db->join('tbl_vendor', 'tbl_vendor.id = tbl_booking.vendor_id', 'left');
    $this->db->join('tbl_users', 'tbl_users.id = tbl_booking.user_id', 'left');
    $this->db->where('tbl_resume.booking_id', $id);
    $this->db->order_by('tbl_resume.id', 'desc');
    $Query = $this->db->get();
    return $Query->result();
  }

  public function resumeListbackend($id)
  {
    $this->db->select('tbl_resume.*');
    $this->db->from('tbl_resume');
    $this->db->where('tbl_resume.booking_id', $id);
    $this->db->order_by('tbl_resume.id', 'desc');
    $Query = $this->db->get();
    return $Query->result();
  }


  public function AllBookingListData($id)
  {
    $this->db->select('tbl_booking.*,tbl_service_subcategory.name as s_name,tbl_vendor.name as v_name,tbl_users.name as u_name,tbl_vendor.base_price as nightAmount,tbl_vendor.basefireDay as dayAmount,tbl_users.*,tbl_users.address as u_address,tbl_vendor.email as v_email,tbl_vendor.mobile as v_mobile,tbl_vendor.alt_mobile as v_alt_mobile,tbl_vendor.refferal as v_referalCode,tbl_vendor.address as v_address,tbl_vendor.shopname as v_shopname, tbl_vendor.basefireDay as v_basefireDay,tbl_vendor.base_price as v_base_price,tbl_vendor.work_experience as v_work_experience,tbl_vendor.working_hours as v_working_hours,tbl_vendor.holiday as v_holiday,tbl_vendor.no_of_employee as v_no_of_employee,tbl_services.service_charge,tbl_services.booking_charge,tbl_services.name as ser_name,tbl_vehicle_type.name as v_ty_name,tbl_manufacturer.name as manufacturer_name,tbl_model.name as model_name,tbl_varient.name as varient_name,tbl_fueltype.name as fueltype_name');

    $this->db->from('tbl_booking');
    $this->db->join('tbl_service_subcategory', 'tbl_service_subcategory.id = tbl_booking.service_id', 'left');
    $this->db->join('tbl_services', 'tbl_services.id = tbl_service_subcategory.service_id', 'left');
    $this->db->join('tbl_vehicle_type', 'tbl_vehicle_type.id = tbl_services.service_category', 'left');
    $this->db->join('tbl_manufacturer', 'tbl_manufacturer.vehicle_tyes_id = tbl_vehicle_type.id', 'left');
    $this->db->join('tbl_model', 'tbl_manufacturer.id = tbl_model.manufacturer_id', 'left');
    $this->db->join('tbl_varient', 'tbl_model.id = tbl_varient.model_id', 'left');
    $this->db->join('tbl_fueltype', 'tbl_fueltype.variant_id = tbl_varient.id', 'left');

    $this->db->join('tbl_vendor', 'tbl_vendor.id = tbl_booking.vendor_id', 'left');
    $this->db->join('tbl_users', 'tbl_users.id = tbl_booking.user_id', 'left');
    if ($id == 1) {
      $this->db->where('tbl_booking.status', '1');
      $this->db->or_where('tbl_booking.status', '0');
    } else {
      $this->db->where('tbl_booking.status', $id);
    }
    $this->db->order_by('tbl_booking.id', 'desc');

    $this->db->group_by('tbl_booking.id');
    $Query = $this->db->get();
    return $Query->result();
  }


  public function AllMyCourseList($admin_role, $admin_id, $user_id)
  {
    if ($admin_role == 0) {
      $this->db->select('tbl_course_purchase.*,tbl_course.name as course_name');
      $this->db->from('tbl_course_purchase');
      $this->db->join('tbl_course', 'tbl_course.id=tbl_course_purchase.course_id');
      $this->db->join('tbl_users', 'tbl_course_purchase.user_id=tbl_users.id');
      $this->db->join('tbl_admin', 'tbl_course.creator_id = tbl_admin.id');
      $this->db->where('tbl_course_purchase.user_id', $user_id);
      // $this->db->where('tbl_course.creator_id', $admin_id);
      // $this->db->where('tbl_course_purchase.user_id', $userId);
      $this->db->where('tbl_course_purchase.isDeleted', false);
      $this->db->where('tbl_course_purchase.payment_status', 1);
      $this->db->order_by('tbl_course_purchase.id', 'desc');
    } else {
      $this->db->select('tbl_course_purchase.*,tbl_course.name as course_name');
      $this->db->from('tbl_course_purchase');
      $this->db->join('tbl_course', 'tbl_course.id=tbl_course_purchase.course_id');
      $this->db->join('tbl_users', 'tbl_course_purchase.user_id=tbl_users.id');
      $this->db->join('tbl_admin', 'tbl_course.creator_id = tbl_admin.id');
      $this->db->where('tbl_course_purchase.user_id', $user_id);
      $this->db->where('tbl_course.creator_id', $admin_id);
      $this->db->where('tbl_course_purchase.isDeleted', false);
      $this->db->where('tbl_course_purchase.payment_status', 1);
      $this->db->order_by('tbl_course_purchase.id', 'desc');
    }
    $Query = $this->db->get();
    return $Query->result();
  }

  //     public function AllMyCourseList($user_id)
  // {
  //     $this->db->select('tbl_course_purchase.*, tbl_course.name as course_name');
  //     $this->db->from('tbl_course_purchase');
  //     $this->db->join('tbl_course', 'tbl_course.id = tbl_course_purchase.course_id');
  //     $this->db->join('tbl_users', 'tbl_course_purchase.user_id = tbl_users.id');
  //     $this->db->where('tbl_course_purchase.user_id', $user_id);
  //     $this->db->where('tbl_course_purchase.isDeleted', false);
  //     $this->db->where('tbl_course_purchase.payment_status', 1);
  //     $this->db->order_by('tbl_course_purchase.id', 'desc');

  //     $Query = $this->db->get();
  //     return $Query->result();
  // }

  public function AllCourseList()
  {
    $this->db->select('tbl_course.*');
    $this->db->from('tbl_course');
    $this->db->where('tbl_course.isDeleted', false);
    $this->db->order_by('tbl_course.id', 'desc');
    $Query = $this->db->get();
    return $Query->result();
  }



  public function AllUserList( $admin_id = '')
  {
    $admin_role = $this->session->userdata('role');
    if ($admin_role <= 1) {
      $this->db->select('tbl_users.*');
      $this->db->from('tbl_users');
      $this->db->where('tbl_users.isDeleted', false);
      
    } else {
      $this->db->select('tbl_course.creator_id,tbl_course.id as tbl_course_id,tbl_course_purchase.course_id,tbl_admin.id as admin_id,tbl_users.*');
      $this->db->from('tbl_course');
      $this->db->join('tbl_course_purchase', 'tbl_course.id = tbl_course_purchase.course_id');
      $this->db->join('tbl_admin', 'tbl_course.creator_id = tbl_admin.id');
      $this->db->join('tbl_users', 'tbl_users.id = tbl_course_purchase.user_id');
      $this->db->where('tbl_admin.id', $admin_id);
      
      $this->db->where('tbl_users.isDeleted', false);
    }

    $this->db->order_by('tbl_users.id', 'desc');
    $Query = $this->db->get();
    return $Query->result();

    //echo $this->db->last_query();
  }

  public function AllUserReferList($referral)
  {
    $this->db->select('tbl_users.*');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.isDeleted', false);
    $this->db->where('tbl_users.flag', 0);
    $this->db->where('tbl_users.userefferal', $referral);
    $this->db->order_by('tbl_users.id', 'desc');
    $Query = $this->db->get();
    //echo $this->db->last_query();exit;
    return $Query->result();
  }


  public function AllUserReferHistory($id)
  {
    $this->db->select('tbl_refer_history.*,tbl_users.name');
    $this->db->from('tbl_refer_history');
    $this->db->join('tbl_users', 'tbl_users.id=tbl_refer_history.user_id');
    $this->db->where('tbl_refer_history.isDeleted', false);
    $this->db->where('tbl_refer_history.useReferal_id', $id);
    $this->db->order_by('tbl_refer_history.id', 'desc');
    $Query = $this->db->get();
    return $Query->result();
  }


  public function UserUpdate($id)
  {
    $this->db->select('tbl_users.*');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.id', $id);
    $this->db->where('tbl_users.isDeleted', false);
    $this->db->order_by('tbl_users.id', 'desc');
    $Query = $this->db->get();
    return $Query->result();
  }

  public function TodayUserList()
  {
    $this->db->select('tbl_users.*');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.isDeleted', false);
    $this->db->where('date(tbl_users.created_date)', date("Y-m-d"));
    $Query = $this->db->get();
    return $Query->result();
  }

  public function UserByMobile($MobileNo)
  {
    $this->db->where('isDeleted', FALSE);
    $this->db->where('mobile', $MobileNo);
    $Query = $this->db->get('tbl_users');
    return $Query->row();
  }

  public function RegisterUser($data)
  {
    // $this->db->insert('tbl_users', $data);
    // $UserId =  $this->db->insert_id();

    // return $UserId;

    // Set the role to 2 for each entry

    $data['sw_password'] = md5($data['password']);
    // $password = $data['password'];
    $this->db->insert('tbl_users', $data);
    $serviceId = $this->db->insert_id();
    // Update the 'password' column separately
    // $this->db->set('password', $password);
    // $this->db->where('id', $serviceId);
    // $this->db->update('tbl_users');
    return $serviceId;
  }

  public function referAmount($reff, $user_id, $useRefferal)
  {

    $this->db->select('tbl_users.*');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.isDeleted', false);
    $this->db->where('tbl_users.refferal', $useRefferal);
    $Query = $this->db->get();
    $num = $Query->num_rows();
    if ($num > 0) {
      $result = $Query->result_array();
      $id = $result[0]['id'];
      $wallet = $result[0]['wallet'];

      $amount = 0;

      $this->db->select('tbl_refer.*');
      $this->db->from('tbl_refer');
      $this->db->where('tbl_refer.isDeleted', false);
      $Query1 = $this->db->get();
      $num1 = $Query1->num_rows();
      if ($num1 > 0) {
        $result1 = $Query1->result_array();
        $amount = $result1[0]['amount'];
      }
      $total_amt = $wallet + $amount;
      $varData = array('wallet' => $total_amt);
      $this->db->where('id', $id);
      $this->db->update('tbl_users', $varData);

      $varD = array(
        'referal_id' => $reff,
        'user_id' => $user_id,
        'useReferal' => $useRefferal,
        'useReferal_id' => $id,
        'amount' => $amount,
        'status' => 'Success'
      );
      $this->db->insert('tbl_refer_history', $varD);
      return true;
    } else {
      return false;
    }
  }

  public function UpdateProfile($user_id, $data)
  {
    $this->db->where('id', $user_id);
    $this->db->update('tbl_users', $data);
    return $this->db->affected_rows();
  }

  public function LoginUser($MobileNo, $imei_no)
  {
    $this->db->select('*');
    $this->db->where('mobile', $MobileNo);
    $this->db->where('isDeleted', false);
    $user = $this->db->get('tbl_users');
    $num = $user->num_rows();
    if ($num > 0) {
      $result = $user->result_array();
      $imei_status = $result[0]['imei_status'];
      $imei_no1 = $result[0]['imei_no'];
      if ($imei_no1 == $imei_no) {
        return $user->row();
      } else {
        return $user->row();
        /*if($imei_status == 1){
              return false;
            }else{
              return $user->row();
            }*/
      }
    } else {

      $rand = rand('111', '999');
      $nam = "CW";
      $mob = substr(strtoupper($MobileNo), 0, 3);
      $reff = $nam . '' . $rand . '' . $mob;
      $arrData = array('mobile' => $MobileNo, 'flag' => 1, 'imei_no' => $imei_no, 'imei_status' => 1, 'refferal' => $reff);
      $this->db->insert('tbl_users', $arrData);
      $last_id = $this->db->insert_id();

      $this->db->select('*');
      $this->db->where('id', $last_id);
      $user = $this->db->get('tbl_users');
      $num = $user->num_rows();

      return $user->row();
    }
  }

  public function LoginUserEmail($email, $imei_no)
  {
    $this->db->select('*');
    $this->db->where('email', $email);
    $this->db->where('isDeleted', false);
    $user = $this->db->get('tbl_users');
    $num = $user->num_rows();
    if ($num > 0) {
      $result = $user->result_array();
      $imei_status = $result[0]['imei_status'];
      $imei_no1 = $result[0]['imei_no'];
      if ($imei_no1 == $imei_no) {
        return $user->row();
      } else {
        return $user->row();
        /*if($imei_status == 1){
              return false;
            }else{
              return $user->row();
            }*/
      }
    } else {

      $rand = rand('111', '999');
      $nam = "CW";
      $mob = substr(strtoupper($email), 0, 3);
      $reff = $nam . '' . $rand . '' . $mob;
      $arrData = array('email' => $email, 'flag' => 1, 'imei_no' => $imei_no, 'imei_status' => 1, 'refferal' => $reff);
      $this->db->insert('tbl_users', $arrData);
      $last_id = $this->db->insert_id();

      $this->db->select('*');
      $this->db->where('id', $last_id);
      $user = $this->db->get('tbl_users');
      $num = $user->num_rows();

      return $user->row();
    }
  }

  public function LogoutUser($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);
    $user = $this->db->get('tbl_users');
    $num = $user->num_rows();
    if ($num > 0) {
      $arrData = array('imei_status' => 0);
      $this->db->where('id', $id);
      $this->db->update('tbl_users', $arrData);
      return 1;
    } else {
      return 0;
    }
  }

  // public function UserProfile($id,$fcm)
  // {
  //     $this->db->select('*');
  //     $this->db->from('tbl_users');
  //     $this->db->where('isDeleted', false);
  //     $this->db->where('tbl_users.id', $id);
  //     // $this->db->update('tbl_users.fcm', $fcm);
  //     // $this->db->where('tbl_users.is_Blocked', false);
  //     $query = $this->db->get();
  //     return $query->row();
  // }

  public function UserProfile($id, $fcm = '')
  {
    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('isDeleted', false);
    $this->db->where('tbl_users.id', $id);
    // $this->db->where('tbl_users.is_Blocked', false);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {

      if (!empty($fcm)) {
        // Update the fcm value
        $this->db->where('id', $id);
        $this->db->update('tbl_users', array('fcm' => $fcm));
      }
      // Fetch and return the updated user data
      $updatedQuery = $this->db->get_where('tbl_users', array('id' => $id));
      return $updatedQuery->row();
    } else {
      return null; // User not found or isDeleted
    }
  }


  function fetch_user_details($user_id)
  {
    //$this->db->where('tbl_users.id', $id);
    $query = $this->db->get_where('tbl_users', array('id' => $user_id));
    $userDetails = $query->row_array();
    return $userDetails;
  }

  public function UserReferList($id, $refer_code)
  {
    $referral = $refer_code;
    $aarrData = array();
    $this->db->select('tbl_users.*');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.isDeleted', false);
    $this->db->where('tbl_users.flag', 0);
    $this->db->where('tbl_users.userefferal', $referral);
    $this->db->order_by('tbl_users.id', 'desc');
    $Query = $this->db->get();
    $num = $Query->num_rows();
    if ($num > 0) {
      $result = $Query->result();
      foreach ($result as $key => $value) {
        $refer_amount = 0;
        $iid = $value->id;
        $value->refer_amount = $refer_amount;
        $this->db->select('tbl_refer_history.*');
        $this->db->from('tbl_refer_history');
        $this->db->where('tbl_refer_history.user_id', $iid);
        $this->db->where('tbl_refer_history.useReferal', $referral);
        $this->db->order_by('tbl_refer_history.id', 'desc');
        $Query1 = $this->db->get();
        $num1 = $Query1->num_rows();
        if ($num1 > 0) {
          $result1 = $Query1->result();
          $value->refer_amount = $result1[0]->amount;
        }
        array_push($aarrData, $value);
      }
    }
    return $aarrData;
    //echo $this->db->last_query();exit;

  }

  public function UserProfileByMobile($MobileNo)
  {
    $this->db->select('tbl_users.*');
    $this->db->from('tbl_users');
    $this->db->where('isDeleted', false);
    $this->db->where('tbl_users.mobile', $MobileNo);

    $Query = $this->db->get();
    // echo $this->db->last_query();
    // die();
    return $Query->result();
  }

  public function checkValidOtp($otp, $otpID)
  {
    $this->db->select('tbl_otp.*');
    $this->db->from('tbl_otp');
    $this->db->where('status', 0);
    $this->db->where('tbl_otp.otp', $otp);
    $this->db->where('tbl_otp.id', $otpID);

    $Query = $this->db->get();
    // echo $this->db->last_query();
    // die();
    return $Query->result();
  }

  public function updateOtpStatus($otpID)
  {
    $data = [
      'status' => 1,
    ];
    $this->db->where('id', $otpID);
    $this->db->update('tbl_otp', $data);
    return $this->db->affected_rows();
  }


  // public function courseList($userId)
  // {
  //   $aarrData = [];
  //   $this->db->select('*');
  //   $this->db->from('tbl_users');
  //   $this->db->where('id',$userId);
  //   $this->db->where('tbl_users.isDeleted', false);
  //   $this->db->order_by('tbl_users.id', 'desc');
  //   $Query1 = $this->db->get();
  //   $num = $Query1->num_rows();
  //   if($num > 0){

  //     $this->db->select('*');
  //     $this->db->from('tbl_course');
  //     $this->db->where('tbl_course.isDeleted', false);
  //     $this->db->order_by('tbl_course.sort', 'asc');
  //     $Query = $this->db->get();
  //     $num_row = $Query->num_rows();
  //     if($num_row > 0){
  //       $result = $Query->result();

  //       foreach($result as $key=>$value){
  //         $id = $value->id;


  //         $this->db->select('tbl_course_purchase.id as course_purchase,tbl_course_purchase.expiry_date');
  //         $this->db->from('tbl_course_purchase');
  //         $this->db->where('tbl_course_purchase.user_id', $userId);
  //         $this->db->where('tbl_course_purchase.course_id', $id);
  //         $this->db->where('tbl_course_purchase.isDeleted', false);
  //         $this->db->order_by('tbl_course_purchase.id', 'desc');
  //         $Qu = $this->db->get();
  //         $nu = $Qu->num_rows();
  //         if($nu > 0){
  //           $re = $Qu->result_array();
  //           $expiry_date = $re[0]['expiry_date'];
  //           $value->coursePurchaseId = $re[0]['course_purchase'];
  //           $curr_date = Date("Y-m-d H:i:s");



  //             $this->db->select('tbl_course_purchase.id as course_purchase,tbl_course_purchase.expiry_date');
  //             $this->db->from('tbl_course_purchase');
  //             $this->db->where('tbl_course_purchase.user_id', $userId);
  //             $this->db->where('tbl_course_purchase.id', $re[0]['course_purchase']);
  //             $this->db->where('tbl_course_purchase.course_id', $id);
  //             $this->db->where('tbl_course_purchase.expiry_date >=', $curr_date);
  //             $this->db->where('tbl_course_purchase.isDeleted', false);
  //             $this->db->order_by('tbl_course_purchase.id', 'desc');
  //             $Qu = $this->db->get();
  //             //echo $this->db->last_query();exit;
  //             $nu = $Qu->num_rows();
  //             if($nu > 0){
  //               $value->coursePurchaseCount = 1;
  //             }else{
  //               $value->coursePurchaseCount = 2;
  //             }



  //         }else{
  //           $value->coursePurchaseCount = 0;
  //         }


  //         $this->db->select('tbl_chapter.id as chapter');
  //         $this->db->from('tbl_chapter');
  //         $this->db->where('tbl_chapter.course_id', $id);
  //         $this->db->where('tbl_chapter.isDeleted', false);
  //         $this->db->order_by('tbl_chapter.sort', 'asc');
  //         $Query1 = $this->db->get();
  //         $num_row1 = $Query1->num_rows();
  //         $value->courseChapterCount = $num_row1;

  //         $courseVideoCount = 0;
  //         if($num_row1 > 0){

  //           $result1 = $Query1->result();
  //           //print_r($result1);exit;
  //           foreach($result1 as $key1=>$value1){
  //             $id1 = $value1->chapter;
  //             $this->db->select('tbl_coursevideo.id as coursevideo');
  //             $this->db->from('tbl_coursevideo');
  //             $this->db->where('tbl_coursevideo.chapter_id', $id1);
  //             $this->db->where('tbl_coursevideo.isDeleted', false);
  //             $this->db->order_by('tbl_coursevideo.sort', 'asc');
  //             $Query11 = $this->db->get();
  //             $num_row11 = $Query11->num_rows();
  //             $courseVideoCount = $courseVideoCount + $num_row11;
  //           }
  //         }
  //         $value->courseVideoCount = $courseVideoCount;
  //         array_push($aarrData, $value);
  //       }
  //       return $aarrData;
  //       //echo "<pre>";print_r($Query->result());exit;
  //     }
  //   }else{
  //     return false;
  //   }
  // }
  public function courseList($userId)
  {
    $this->db->select('tbl_course.*');
    $this->db->from('tbl_course');
    $this->db->join('tbl_course_purchase', 'tbl_course.id = tbl_course_purchase.course_id');
    $this->db->join('tbl_users', 'tbl_course_purchase.user_id = tbl_users.id');
    $this->db->join('tbl_admin', 'tbl_course.creator_id = tbl_admin.id');
    $this->db->where('tbl_course.isDeleted', false);
    $this->db->where('tbl_course_purchase.user_id', $userId);
    $Query = $this->db->get();
    return $Query->result();
  }

  public function courseDetails($userId, $course_id)
  {
    $aarrData = [];
    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('id', $userId);
    $this->db->where('tbl_users.isDeleted', false);
    $this->db->order_by('tbl_users.id', 'desc');
    $Query1 = $this->db->get();
    $num = $Query1->num_rows();
    if ($num > 0) {

      $this->db->select('tbl_chapter.*,tbl_course.name as course_name');
      $this->db->from('tbl_chapter');
      $this->db->join('tbl_course', 'tbl_course.id=tbl_chapter.course_id');
      $this->db->where('tbl_chapter.isDeleted', false);
      $this->db->where('tbl_chapter.course_id', $course_id);
      $this->db->order_by('tbl_chapter.sort', 'asc');
      $Query = $this->db->get();
      $num_row = $Query->num_rows();
      if ($num_row > 0) {
        $result = $Query->result();

        foreach ($result as $key => $value) {
          $id = $value->id;
          $this->db->select('tbl_coursevideo.*');
          $this->db->from('tbl_coursevideo');
          $this->db->where('tbl_coursevideo.chapter_id', $id);
          $this->db->where('tbl_coursevideo.isDeleted', false);
          $this->db->order_by('tbl_coursevideo.sort', 'asc');
          $Query1 = $this->db->get();
          $num_row1 = $Query1->num_rows();
          $value->courseVedioCount = $num_row1;
          array_push($aarrData, $value);
        }
        //echo "<pre>";print_r($Query->result());exit;
      }
      return $aarrData;
    } else {
      return false;
    }
  }



  public function courseVideoDetails($userId, $chapter_id, $course_id = '')
  {

    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('id', $userId);
    $this->db->where('tbl_users.isDeleted', false);
    $this->db->order_by('tbl_users.id', 'desc');
    $Query1 = $this->db->get();
    $num = $Query1->num_rows();
    if ($num > 0) {

      $this->db->select('tbl_coursevideo.*,tbl_chapter.name as chapter_name,tbl_chapter.chapter_no as chapter_no');
      $this->db->from('tbl_coursevideo');
      $this->db->join('tbl_chapter', 'tbl_chapter.id=tbl_coursevideo.chapter_id', 'LEFT');
      $this->db->where('tbl_coursevideo.isDeleted', false);
      if (!empty($chapter_id)) {
        $this->db->where('tbl_coursevideo.chapter_id', $chapter_id);
      }

      if (!empty($course_id)) {
        $this->db->where('tbl_coursevideo.course_id', $course_id);
      }

      $this->db->order_by('tbl_coursevideo.sort', 'asc');
      $Query = $this->db->get();
      return $Query->result();
    } else {
      return false;
    }
  }
  public function bannerList($userId)
  {

    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('id', $userId);
    $this->db->where('tbl_users.isDeleted', false);
    $this->db->order_by('tbl_users.id', 'desc');
    $Query1 = $this->db->get();
    $num = $Query1->num_rows();
    if ($num > 0) {

      $this->db->select('*');
      $this->db->from('tbl_banner');
      $this->db->where('tbl_banner.isDeleted', false);
      $this->db->order_by('tbl_banner.id', 'desc');
      $Query = $this->db->get();
      return $Query->result();
    } else {
      return false;
    }
  }


  public function settingList($userId='')
  {

   

      $this->db->select('*');
      $this->db->from('tbl_setting');
      $this->db->where('tbl_setting.isDeleted', false);
      $this->db->order_by('tbl_setting.id', 'desc');
      $Query = $this->db->get();
      return $Query->row();
    
  }


  public function user_course_update($userId, $course_id, $course_purchase_id, $order_id)
  {


    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.id', $userId);
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
        $this->db->where('id', $userId);
        $this->db->update('tbl_users', $arrData);
      } else {
        $final_amount1 = $final_amountss - $current_balance;

        $arrData = array('wallet' => 0);
        $this->db->where('id', $userId);
        $this->db->update('tbl_users', $arrData);
      }
    }
    $aarrData = [];
    $this->db->select('*');
    $this->db->from('tbl_course');
    $this->db->where('tbl_course.id', $course_id);
    $this->db->where('tbl_course.isDeleted', false);
    $this->db->order_by('tbl_course.id', 'desc');
    $Query = $this->db->get();
    $num_row = $Query->num_rows();
    if ($num_row > 0) {
      $result = $Query->result_array();

      $duration = '+' . $result[0]['duration'] . ' days';
      $curr_date = date('Y-m-d H:i:s');
      $NewDate = date('Y-m-d H:i:s', strtotime($duration));

      $vendorData = [
        'purchase_date' => date('Y-m-d H:i:s'),
        'expiry_date' => $NewDate,
        'payment_status' => 1
      ];
      $this->db->where('id', $course_purchase_id);
      $this->db->update('tbl_course_purchase', $vendorData);
      return $this->db->affected_rows();
      //echo "<pre>";print_r($Query->result());exit;
    }
    return $result;
  }
  public function user_course_list($userId)
  {
    $aarrData = [];
    $this->db->select('tbl_course_purchase.*,tbl_course.name as course_name,tbl_course.chapter,tbl_users.name as user_name,tbl_course.image as course_image,tbl_course.writer as writer,tbl_course.video_link as course_videos');
    $this->db->from('tbl_course_purchase');
    $this->db->join('tbl_course', 'tbl_course.id=tbl_course_purchase.course_id');
    $this->db->join('tbl_users', 'tbl_users.id=tbl_course_purchase.user_id');
    $this->db->where('tbl_course_purchase.user_id', $userId);
    $this->db->where('tbl_course_purchase.isDeleted', false);
    $this->db->where('tbl_course.isDeleted', false);
    $this->db->order_by('tbl_course_purchase.id', 'desc');
    $Query = $this->db->get();
    $num_row = $Query->num_rows();
    if ($num_row > 0) {
      $result = $Query->result();

      foreach ($result as $key => $value) {
        $course_id = $value->course_id;
        $this->db->select('tbl_chapter.*');
        $this->db->from('tbl_chapter');
        $this->db->where('tbl_chapter.course_id', $course_id);
        $this->db->where('tbl_chapter.isDeleted', false);
        $this->db->order_by('tbl_chapter.sort', 'asc');
        $Query1 = $this->db->get();
        $num_row1 = $Query1->num_rows();
        $value->chapterCount = $num_row1;
        array_push($aarrData, $value);
      }
      //echo "<pre>";print_r($Query->result());exit;
    }
    return $aarrData;
  }

  public function user_course_vedio_list($userId)
  {
    $this->db->select('tbl_coursevideo.*,tbl_course.name as course_name,tbl_course.image as course_image,tbl_course.writer as writer');
    $this->db->from('tbl_coursevideo');
    $this->db->join('tbl_course', 'tbl_course.id=tbl_coursevideo.course_id');
    $this->db->where('tbl_coursevideo.course_id', $userId);
    $this->db->where('tbl_coursevideo.isDeleted', false);
    $this->db->order_by('tbl_coursevideo.sort', 'asc');
    $Query = $this->db->get();
    return $Query->result();
  }



  public function Delete($userId)
  {
    $Query = $this->db->set('isDeleted', 1)
      ->where('id', $userId)
      ->update('tbl_users');
    if ($Query) {
      $last_q = $this->db->last_query();


      return $last_q;
    } else {
      return false;
    }
  }
  //   public function blockUser($userId)
  //   {
  //     $query = $this->db->select('id, name, is_Blocked')
  //         ->from('tbl_users')
  //         ->get();

  //     $result = $query->result();

  //     // Map the is_blocked values to labels
  //     foreach ($result as $user) {
  //         if ($user->is_Blocked == 0) {
  //             $user->status = 'Active';
  //         } else {
  //             $user->status = 'Blocked';
  //         }
  //     }

  //     return $result;
  // }

  // public function getUserById($userId)
  //     {
  //         return $this->db->where('id', $userId)
  //             ->get('tbl_users')
  //             ->row();
  //     }

  //     public function updateUserStatus($userId, $newStatus)
  //     {
  //         $this->db->set('is_Blocked', $newStatus)
  //             ->where('id', $userId)
  //             ->update('tbl_users');
  //     }
  public function updateUserStatus($userId, $status)
  {
    $this->db->set('is_Blocked', $status)
      ->where('id', $userId)
      ->update('tbl_users');
  }

  public function getUserData($userId)
  {
    $this->db->where('id', $userId);
    $query = $this->db->get('tbl_users');
    return $query->row(); // Assuming there is only one user with the given ID
  }

  public function updateuser($userId)
  {
    $Query = $this->db->where('id', $userId)->get('tbl_users');
    if ($Query)
      return $Query->row();
    else
      return false;
  }

  public function Update($data, $settingId)
  {
    $this->db->where('id', $settingId);
    if ($this->db->update('tbl_users', $data))
      return $this->db->last_query();
    else
      return false;
  }


  public function allPincode()
  {
    $this->db->distinct('pincode');
    $this->db->select('pincode');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.pincode!=', 0);
    $this->db->where('tbl_users.isDeleted', false);
    $Query = $this->db->get();
    return $Query->result_array();
    // echo $this->db->last_query();
    // exit;
  }

  // public function UserDonation($userId, $amount) {
  //   $this->db->trans_start(); // Start transaction

  //   // Prepare donation data
  //   $donationData = array(
  //     'user_id' => $userId,
  //     'amount' => $amount,
  //     'added_at' => date('Y-m-d H:i:s')
  //   );

  //   // Insert donation record into tbl_donation
  //   $this->db->insert('tbl_donation', $donationData);

  //   // Deduct the donated amount from the user's wallet
  //   $this->db->set('wallet', "wallet - $amount", false);
  //   $this->db->where('id', $userId);
  //   $this->db->update('tbl_users');

  //   // Fetch updated user data after the update
  //   $this->db->select('tbl_users.*, tbl_donation.amount as donated_amount, tbl_donation.added_at as donation_date');
  //   $this->db->from('tbl_users');
  //   $this->db->join('tbl_donation', 'tbl_donation.user_id = tbl_users.id', 'left');
  //   $this->db->where('tbl_users.id', $userId);
  //   $userDataQuery = $this->db->get();
  //   $userData = $userDataQuery->row_array();

  //   $this->db->trans_complete(); // Complete transaction

  //   if ($this->db->trans_status() === FALSE) {
  //     return false;
  //   }

  //   return $userData;
  // }

  public function fetchUserWalletBalance($userId)
  {
    $this->db->select('wallet');
    $this->db->where('id', $userId);
    $query = $this->db->get('tbl_users');

    if ($query->num_rows() === 1) {
      $row = $query->row();
      return $row->wallet;
    } else {
      return 0; // Return 0 if user not found or multiple users found (which shouldn't happen)
    }
  }

  public function deductAmountFromWallet($userId, $amount)
  {
    $this->db->set('wallet', "wallet - $amount", false);
    $this->db->where('id', $userId);
    $this->db->update('tbl_users');
    return true;
  }

  public function insertDonationRecord($userId, $amount)
  {
    $donationData = array(
      'user_id' => $userId,
      'amount' => $amount,
      'added_at' => date('Y-m-d H:i:s')
    );

    // Insert the donation record into tbl_donation table
    $this->db->insert('tbl_donation', $donationData);
    // $this->db->last_query();
    return $this->db->affected_rows() > 0;
  }

  public function UpdateWalletOrder($amount, $user_id)
  {
    $this->load->library('session');

    // $admin_id = $this->session->userdata('admin_id');

    // Deduct the amount from the admin's wallet
    // $this->db->set('admin_coin', 'admin_coin - ' . $amount, false);
    // $this->db->where('id', $admin_id);
    // $this->db->update('tbl_admin');

    // Add the amount to the user's wallet
    $this->db->set('wallet', 'wallet+' . $amount, false);
    // if ($bonus == 1) {
    //   $this->db->set('bonus_wallet', 'bonus_wallet+' . $amount, false);
    // // } else {
    // //   $this->db->set('unutilized_wallet', 'unutilized_wallet+' . $amount, false);
    // }
    $this->db->set('updated_date', date('Y-m-d H:i:s'));
    $this->db->where('id', $user_id);
    $this->db->update('tbl_users');

    return true;
  }

  public function AddPurchaseReferLog($data)
  {
    $this->db->insert('tbl_purcharse_ref', $data);
    return $this->db->insert_id();
  }

  public function TokenConfirm($user_id, $token)
  {
    $this->db->where('id', $user_id);
    $this->db->where('token', $token);
    $this->db->where('status', 0);
    $this->db->where('isDeleted', 0);
    $Query = $this->db->get('tbl_users');
    return $Query->row();
  }

  public function get_withdrawal_data($id)
  {
    $this->db->select('tbl_users.*,tbl_withdrawal_log.*');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.id',$id);
    $this->db->join('tbl_withdrawal_log', 'tbl_withdrawal_log.user_id=tbl_users.id');
    // $this->db->join('tbl_donation','tbl_donation.user_id=tbl_users.id');
    // $this->db->join('tbl_purchase','tbl_purchase.user_id=tbl_users.id');
    $this->db->group_by('tbl_withdrawal_log.id');
    // ... Additional conditions ...


    $query = $this->db->get();
    // echo $this->db->last_query();
    return $query->result();
  }

  public function get_donation_data($id)
  {
    $this->db->select('tbl_users.*,tbl_donation.*');
    $this->db->from('tbl_users');
    $this->db->where('tbl_users.id',$id);
    // $this->db->join('tbl_withdrawal_log','tbl_withdrawal_log.user_id=tbl_users.id');
    $this->db->join('tbl_donation', 'tbl_donation.user_id=tbl_users.id');
    // $this->db->join('tbl_purchase','tbl_purchase.user_id=tbl_users.id');
    $this->db->group_by('tbl_donation.id');
    // ... Additional conditions ...


    $query = $this->db->get();
    // echo $this->db->last_query();
    return $query->result();
  }

  public function get_quizreward_data($id)
  {
    $this->db->select('tbl_users.*,tbl_purchase.*');
    $this->db->from('tbl_users');
    // $this->db->join('tbl_withdrawal_log','tbl_withdrawal_log.user_id=tbl_users.id');
    // $this->db->join('tbl_donation','tbl_donation.user_id=tbl_users.id');
    $this->db->join('tbl_purchase', 'tbl_purchase.user_id=tbl_users.id');
    $this->db->where('tbl_users.id',$id);
    $this->db->group_by('tbl_purchase.id');
    // ... Additional conditions ...


    $query = $this->db->get();
    // echo $this->db->last_query();
    return $query->result();
  }
}
