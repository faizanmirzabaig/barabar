<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;


class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'Users_model',
            'Withdrawal_model',
            'Donation_model',
            'Purchase_model',
            'Area_interest_model',
            'Heard_about_model',
            'Hobby_model',
            'Quiz_model',
            'Occupation_model',
            'Education_model',
        ));
    }

    public function index()
    {
        $admin_id = $this->session->userdata('admin_id');
        $admin_role = $this->session->userdata('role');


        // Display admin_role
        // echo "Admin Role: " . $admin_role;

        $data = [
            'title' => 'Users',
            'users' => $this->Users_model->AllUserList( $admin_id)
        ];

        foreach ($data['users'] as &$user) {
            $date_of_birth = new DateTime($user->date_of_birth);
            $today = new DateTime('today');
            $age = $date_of_birth->diff($today)->y;
            $user->age = $age; // Add 'age' key to the user object
        }

        // print_r($data); // This will display the users array with 'age' included for each user
        // exit();

        if ($admin_role == 0 || $admin_role == 1) {
            $data['SideBarbutton'] = ['backend/user/adduser', 'Add User'];
        }

        template('users/index', $data);
    }




    public function adduser()
    {
        $data = [
            'title' => 'Add User',
            'AllAreaInterest' => $this->Area_interest_model->AllAreaInterest(),
            'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
            'AllHobby'        => $this->Hobby_model->AllHobbyList(),
            'AllOccupation' => $this->Occupation_model->AllOccupationList(),
            'AllEducation' => $this->Education_model->AllEducationList(),

        ];
        template('users/add', $data);
    }
    public function registration()
    {
        $mob = substr(strtoupper($this->input->post('mobile')), 0, 3);
        $rand = rand('111', '999');
        $name = 'cw';

        $ref = $name . $rand . $mob;
        $data = array(
            'name' => $this->input->post('name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'mobile' => $this->input->post('mobile_number'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender' => $this->input->post('gender'),
            'pincode' => $this->input->post('pincode'),
            'occupation_id' => $this->input->post('occupation'),
            'education_id' => $this->input->post('education'),
            'hobby_id' => $this->input->post('hobby'),
            'heard_about_us_id' => $this->input->post('heard_about_us'),
            'area_of_interest_id' => $this->input->post('area_of_interest'),
            'refferal' => $ref,

        );


        $user_id = $this->Users_model->RegisterUser($data);

        if ($user_id) {
            $this->session->set_flashdata('msg', array('message' => 'User Registered Successfully', 'class' => 'success', 'position' => 'top-right'));
            redirect('backend/User');
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            redirect('backend/User');
        }
    }

    public function referralList($refferal = '')
    {


        if (!empty($refferal)) {
            $referData = $this->Users_model->AllUserReferList($refferal);
        } else {
            $referData = array();
        }

        $data = [
            'title' => 'Refer Users',
            'users' => $referData
        ];

        //$data['SideBarbutton'] = ['backend/course_purchase/add', 'Add'];
        template('users/referUserList', $data);
    }

    public function referralHistory($id)
    {

        $data = [
            'title' => 'Refer History',
            'users' => $this->Users_model->AllUserReferHistory($id)
        ];
        //$data['SideBarbutton'] = ['backend/course_purchase/add', 'Add'];
        template('users/referHistoryList', $data);
    }


    public function delete($id)
    {
        if ($this->Users_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'User Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function myCourse($user_id)
    {
        $admin_role = $this->session->userdata('role');

        $admin_id = $this->session->userdata('admin_id');

        // print_r($id);    
        // die($this->input->post('id'));
        $data = [
            'title' => 'My Course',
            'users' => $this->Users_model->AllMyCourseList($admin_role, $admin_id, $user_id)
        ];

        template('users/myCourse', $data);
    }


    public function buyCourse($id)
    {

        $data = [
            'title' => 'Buy Course',
            'user_id' => $id,
            'courseList' => $this->Users_model->AllCourseList($id)
        ];
        //$data['SideBarbutton'] = ['backend/course_purchase/add', 'Add'];
        template('users/buy_course', $data);
    }

    public function buyCourses()
    {
        $course_id = $this->input->post('course_id');
        $user_id = $this->input->post('user_id');
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
            $amt = $result[0]['price'];
            $duration = '+' . $result[0]['duration'] . ' days';
            $curr_date = date('Y-m-d H:i:s');
            $NewDate = date('Y-m-d H:i:s', strtotime($duration));

            $vendorData = [
                'purchase_date' => date('Y-m-d H:i:s'),
                'user_id' => $user_id,
                'amount' => $amt,
                'course_id' => $course_id,
                'expiry_date' => $NewDate,
                'payment_status' => 1
            ];
            $this->db->insert('tbl_course_purchase', $vendorData);
            $last = $this->db->insert_id();
            if ($last) {

                $name = '';
                $refferal = '';
                $userefferal = '';
                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('tbl_users.id', $user_id);
                $this->db->order_by('tbl_users.id', 'desc');
                $Querya = $this->db->get();
                $num_rowa = $Querya->num_rows();
                if ($num_rowa > 0) {
                    $resulta = $Querya->result_array();
                    $name = $resulta[0]['name'];
                    $refferal = $resulta[0]['refferal'];
                    $userefferal = $resulta[0]['userefferal'];
                }

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
                    'razorpay_order_id' => 'CASH',
                    'payment' => 1,
                    'promocode' => '',
                    'added_date' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('tbl_order', $order_data);

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



                $this->session->set_flashdata('msg', array('message' => 'Data Insert Successfully', 'class' => 'success', 'position' => 'top-right'));
                redirect('backend/user');
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Data Not Inserted', 'class' => 'error', 'position' => 'top-right'));
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function CourseList()
    {
        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_course');
        $result = $query->result();
        $data['data'] = $result;
        $data['status'] = "success";
        echo json_encode($data);
    }

    public function blockUser($userId)
    {
        // Load the user model
        $this->load->model('Users_model');

        // Block the user
        $this->Users_model->updateUserStatus($userId, 1);

        // Redirect back or to any desired page
        redirect('backend/user')->with('status', 'User has been blocked successfully.');
    }

    public function unblockUser($userId)
    {
        // Load the user model
        $this->load->model('Users_model');

        // Unblock the user
        $this->Users_model->updateUserStatus($userId, 0);

        // Redirect back or to any desired page
        redirect('backend/user')->with('status', 'User has been activated successfully.');
    }

    public function viewuser($userId)
    {
        $this->load->model('Users_model');
        $data = [
            'title' => 'User Details',
            'user' => $this->Users_model->getUserData($userId),
            'Withdrawal' => $this->Withdrawal_model->UserWithdrawalLog($userId),
            'donation' => $this->Donation_model->user_donation_list($userId),
            'quiz_reward' => $this->Quiz_model->user_quiz_reward($userId),
            'AllAreaInterest' => $this->Area_interest_model->AllAreaInterest(),
            'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
            'AllHobby'        => $this->Hobby_model->AllHobbyList(),
            'AllOccupation' => $this->Occupation_model->AllOccupationList(),
            'AllEducation' => $this->Education_model->AllEducationList(),

        ];
        // print_r($data['user']);
        // exit();
        //$data['AddButton'] = ['backend/user/deleteuser/' . $userId, 'Delete'];
        //$data['SideBarbutton'] = ['backend/user/edituser/' . $userId, 'Edit'];
        template('users/viewuser', $data);
    }
    public function edituser($userId)
    {
        $data = [
            'title' => 'Edit User',
            'edituser' => $this->Users_model->updateuser($userId),
            'AllAreaInterest' => $this->Area_interest_model->AllAreaInterest(),
            'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
            'AllHobby'        => $this->Hobby_model->AllHobbyList(),
            'AllOccupation' => $this->Occupation_model->AllOccupationList(),
            'AllEducation' => $this->Education_model->AllEducationList(),

        ];

        template('users/edit', $data);
    }

    public function update()
    {
        $settingId = $this->input->post('id');


        $data = [
            'name' => $this->input->post('name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email_id'),
            'mobile' => $this->input->post('mobile'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender' => $this->input->post('gender'),
            'pincode' => $this->input->post('pincode'),
            //   'refferal' => $ref,
            'occupation_id' => $this->input->post('occupation'),
            'education_id' => $this->input->post('education'),
            'hobby_id' => $this->input->post('hobby'),
            'heard_about_us_id' => $this->input->post('heard_about_us'),
            'area_of_interest_id' => $this->input->post('area_of_interest'),
        ];

        $UpdateSetting = $this->Users_model->Update($data, $settingId);
        if ($UpdateSetting) {
            $this->session->set_flashdata('msg', array('message' => 'User Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/user';
        redirect($urls);
    }

    public function deleteuser($userId)
    {
        if ($this->Users_model->Delete($userId)) {
            $this->session->set_flashdata('msg', array('message' => 'Creator Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/user')->with('status', 'User has been Deleted successfully.');
    }

    public function export_excel($id)
    {
        $dataWithdrawal = $this->Users_model->get_withdrawal_data($id);
        $dataDonation = $this->Users_model->get_donation_data($id);
        $dataquizreward = $this->Users_model->get_quizreward_data($id);
        // echo '<pre>';
        // print_r($dataWithdrawal);
        // print_r($dataDonation);
        // print_r($datagamereward);
        // die('i am here');

        $file = new Spreadsheet();

        // Create worksheets for each data type
        $worksheetWithdrawal = $file->getActiveSheet();
        $worksheetWithdrawal->setTitle('Withdrawal Data');
        $this->populateWorksheet($worksheetWithdrawal, $dataWithdrawal, 'withdrawal');

        $worksheetDonation = $file->createSheet();
        $worksheetDonation->setTitle('Donation Data');
        $this->populateWorksheet($worksheetDonation, $dataDonation, 'donation');

        $worksheetQuizReward = $file->createSheet();
        $worksheetQuizReward->setTitle('Quiz Reward Data');
        $this->populateWorksheet($worksheetQuizReward, $dataquizreward, 'quizreward');


        // Set the active sheet back to the first sheet (Withdrawal Data)
        $file->setActiveSheetIndex(0);

        ob_end_clean();
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

        $file_name = time() . '.' . strtolower('Xlsx');

        $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

        readfile($file_name);

        unlink($file_name);

        exit;
    }

    private function populateWorksheet($worksheet, $data, $dataType)
    {
        // Set headers based on data type
        if ($dataType === 'withdrawal') {
            $headers = ['Serial Number', 'User Name', 'User Email', 'User Mobile', 'User Age', 'User Pincode', 'User Gender', 'Wallet', 'Withdrawal Amount', 'Message', 'Status'];


            $col = 'A';
        foreach ($headers as $header) {
            $worksheet->setCellValue($col . '1', $header);
            $col++;
        }
            $count = 2;
            $i = 1;
            foreach ($data as $row) {
    
                $date_of_birth = new DateTime($row->date_of_birth);
                $today_age = new DateTime('today');;
                $age = $date_of_birth->diff($today_age)->y;
    
                $worksheet->setCellValue('A' . $count, $i++);
                $worksheet->setCellValue('B' . $count, $row->name);
                $worksheet->setCellValue('C' . $count, $row->email);
                $worksheet->setCellValue('D' . $count, $row->mobile);
                $worksheet->setCellValue('E' . $count, $age);
                $worksheet->setCellValue('F' . $count, $row->pincode);
                $worksheet->setCellValue('G' . $count, $row->gender);
                $worksheet->setCellValue('H' . $count, $row->wallet);
                $worksheet->setCellValue('I' . $count, $row->coin);
                $worksheet->setCellValue('J' . $count, $row->message);
                $worksheet->setCellValue('K' . $count, $row->status);
                // ... Populate other cells based on data type ...
        
                $count++;
            }


        } elseif ($dataType === 'donation') {
            $headers = ['Serial Number', 'User Name', 'User Email', 'User Mobile', 'User Age', 'User Pincode', 'User Gender', 'Wallet', 'Donation Amount'];

            $col = 'A';
        foreach ($headers as $header) {
            $worksheet->setCellValue($col . '1', $header);
            $col++;
        }
            $count = 2;
            $i = 1;
            foreach ($data as $row) {
    
                $date_of_birth = new DateTime($row->date_of_birth);
                $today_age = new DateTime('today');;
                $age = $date_of_birth->diff($today_age)->y;
    
                $worksheet->setCellValue('A' . $count, $i++);
                $worksheet->setCellValue('B' . $count, $row->name);
                $worksheet->setCellValue('C' . $count, $row->email);
                $worksheet->setCellValue('D' . $count, $row->mobile);
                $worksheet->setCellValue('E' . $count, $age);
                $worksheet->setCellValue('F' . $count, $row->pincode);
                $worksheet->setCellValue('G' . $count, $row->gender);
                $worksheet->setCellValue('H' . $count, $row->wallet);
                $worksheet->setCellValue('I' . $count, $row->amount);
                // $worksheet->setCellValue('C' . $count, $row->message);
                // $worksheet->setCellValue('C' . $count, $row->status);
                // ... Populate other cells based on data type ...
        
                $count++;
            }
        } elseif ($dataType === 'quizreward') {
            $headers = ['Serial Number', 'User Name', 'User Email', 'User Mobile', 'User Age', 'User Pincode', 'User Gender', 'Wallet', 'quiz Reward Points','Payment Status'];


            $col = 'A';
        foreach ($headers as $header) {
            $worksheet->setCellValue($col . '1', $header);
            $col++;
        }
            $count = 2;
            $i = 1;
            foreach ($data as $row) {
    
                $date_of_birth = new DateTime($row->date_of_birth);
                $today_age = new DateTime('today');;
                $age = $date_of_birth->diff($today_age)->y;
    
                $worksheet->setCellValue('A' . $count, $i++);
                $worksheet->setCellValue('B' . $count, $row->name);
                $worksheet->setCellValue('C' . $count, $row->email);
                $worksheet->setCellValue('D' . $count, $row->mobile);
                $worksheet->setCellValue('E' . $count, $age);
                $worksheet->setCellValue('F' . $count, $row->pincode);
                $worksheet->setCellValue('G' . $count, $row->gender);
                $worksheet->setCellValue('H' . $count, $row->wallet);
                $worksheet->setCellValue('I' . $count, $row->price);
                $worksheet->setCellValue('J' . $count, $row->payment);
                // $worksheet->setCellValue('C' . $count, $row->status);
                // ... Populate other cells based on data type ...
        
                $count++;
            }
        }
    
        // Set headers in the first row
        
    
        // Populate data rows
       
    }
    
}
