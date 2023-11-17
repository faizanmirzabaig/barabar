<?php
class Course_purchase extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Course_purchase_model','Course_share_model','Users_model'));

    }

    public function index()
    {      
        $admin_id=$this->session->userdata('admin_id');
        $data = [
            'title' => 'Course Purchase',
            'course_purchase' => $this->Course_purchase_model->List($admin_id)
        ];
        //$data['SideBarbutton'] = ['backend/course_purchase/add', 'Add'];
        template('course_purchase/index', $data);
    }

    public function add()
    {
      $data = [
          'title' => 'Add Course Purchase',
      ];
      template('course_purchase/add', $data);
    }

    public function insert()
    {
        $data = [
          'name' => $this->input->post('name'),
          'title' => $this->input->post('title'),
          'duration' => $this->input->post('duration'),
          'description' => $this->input->post('description'),
          'price' => $this->input->post('price'),
          'image' => $image1,
        ];

        //echo "<pre>";print_r($data);exit;

        $InsertSetting = $this->Course_purchase_model->Insert($data);
        if ($InsertSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Course Purchase Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        $urls = 'backend/course_purchase';
        redirect($urls);
    }

    public function edit($id)
    {
        $data=[
            'title'=>'Edit Course Purchase',
            'course_purchase'=>$this->Course_purchase_model->getSite($id),
        ];

        template('course_purchase/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = [
          'name' => $this->input->post('name'),
          'title' => $this->input->post('title'),
          'duration' => $this->input->post('duration'),
          'description' => $this->input->post('description'),
          'price' => $this->input->post('price'),
        ];

        $UpdateSetting = $this->Course_purchase_model->Update($data, $id);
        if ($UpdateSetting) {

          
            $this->session->set_flashdata('msg', array('message' => 'Course Purchase Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/course';
        redirect($urls);
    }

    public function delete($id)
    {
        if ($this->Course_purchase_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Course Purchase Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function users_course_approval(){
        $data = [
            'title' => 'Users Course Approval ',
            'approval_pending' => $this->Course_share_model->View('','','',"0"),
            'approval_approved' => $this->Course_share_model->View('','','',1),
            'approval_rejected' => $this->Course_share_model->View('','','',2)
      
        ];
        

        template('users_course_approval/index', $data);

    }
    public function approval_view($id){
        $data = [
            'title' => 'View Screenshots',
            'view_screenshots' => $this->Course_share_model->View($id),
        ];
        template('users_course_approval/view', $data);

    }

    public function ChangeStatus()
    {
        //  die('i m here');
        $id = $this->input->post('screenshot_id');
        $reject_reason = $this->input->post('reason');
        $status = $this->input->post('status');
        $course_id = $this->input->post('course_id');
    	$user_id = $this->input->post('user_id');
        // $device_id = $this->input->post('fcm');
        if($status==1){
              $aarrData = [];
              $this->db->select('*');
              $this->db->from('tbl_course');
              $this->db->where('tbl_course.id', $course_id);
              $this->db->where('tbl_course.isDeleted', false);
              $this->db->order_by('tbl_course.id', 'desc');
              $Query = $this->db->get();
              $num_row = $Query->num_rows();
              if($num_row > 0){
             $result = $Query->result_array();
                $amt = $result[0]['price'];
                $duration = '+'.$result[0]['duration'].' days';
                $curr_date = date('Y-m-d H:i:s');
                $NewDate=date('Y-m-d H:i:s', strtotime($duration));
    
                $vendorData = [
                  'purchase_date' => date('Y-m-d H:i:s'),
                  'user_id' => $user_id,
                  'amount' => $amt,
                  'course_id' => $course_id,
                  'expiry_date' => $NewDate,
                  'payment_status' => 1
                ];
                $this->db->insert('tbl_course_purchase',$vendorData);
                $last = $this->db->insert_id();
                if($last){
    
                    $name = '';$refferal='';$userefferal='';
                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('tbl_users.id', $user_id);
                    // $this->db->where('tbl_users.fcm', $device_id);
                    $this->db->order_by('tbl_users.id', 'desc');
                    $Querya = $this->db->get();
                    $num_rowa = $Querya->num_rows();
                    if($num_rowa > 0){
                     $resulta = $Querya->result_array();
                     $name = $resulta[0]['name'];
                     $device_id = $resulta[0]['fcm'];
                        $refferal = $resulta[0]['refferal'];
                        $userefferal = $resulta[0]['userefferal'];
                    }
                    // print_r($fcm);
                    // exit();
    
                    $order_data = [
                        'user_id' => $user_id,
                        'name' => $name,
                        'amount' => $amt,
                        'final_amount' => $amt,
                        'discount' => 0,
                        'landmark' => '',
                        'flat' => '',
                        'street' => '',
                        'course_id' => $course_id,
                        'locality' => '',
                        'pincode' => '',
                        // 'fcm' => $device_id,
                        'razorpay_order_id' => 'CASH',
                        'payment' => 1,
                        'promocode' => '',
                        'added_date' => date('Y-m-d H:i:s')
                    ];
                    // print_r($order_data);
                    // exit();
                    $this->db->insert('tbl_order',$order_data);
                   
                    if (!empty($userefferal)) {
                        $this->db->select('*');
                        $this->db->from('tbl_course_purchase');
                        $this->db->where('tbl_course_purchase.user_id', $user_id);
                        $this->db->order_by('tbl_course_purchase.id', 'desc');
                        $Queryaa = $this->db->get();
                        $num_rowa = $Queryaa->num_rows();
                        if($num_rowa == 1){
                            $this->Users_model->referAmount($refferal,$user_id,$userefferal);
                        }
                    }
                    
                    // echo "true";

                }else{
                    // echo "false";
                }
            }else{
                // echo "false";
            }
        }
        // elseif($status==2){
        //     $device_id = ['fcm'];
        // }
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('tbl_users.id', $user_id);
        $this->db->order_by('tbl_users.id', 'desc');
        $Querya = $this->db->get();
        //  echo $this->db->last_query();
        $num_rowa = $Querya->num_rows();
        if($num_rowa > 0){
         $resulta = $Querya->result_array();
         $device_id = $resulta[0]['fcm'];        
        }

        if($status==1){
            $message='The Requested Course has been Approved.';
        }elseif($status==2){
            $message='The Requested Course has been Rejected.';
        };
        // die($message);
        push_notification_android($device_id,$message);

        if ($this->Course_share_model->ChangeStatus($id, $status, $reject_reason)) {
            echo "true";
        } else {
            echo "false";
        }
    }

}
