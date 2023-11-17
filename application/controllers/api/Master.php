<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Master extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $header = $this->input->request_headers('token');
        $this->load->model([
            'Occupation_model',
            'Hobby_model',
            'Education_model',
            'Heard_about_model',
            'Area_interest_model',
            'Course_type_model',

        ]);
       
    }

    public function get_master_get()
    {
        $area_of_interest = $this->Area_interest_model->AllAreaInterest();
        $course_type = $this->Course_type_model->AllCourseType();
        $occupation = $this->Occupation_model->AllOccupationList();
        $hobby = $this->Hobby_model->AllHobbyList();
        $education = $this->Education_model->AllEducationList();
        $heard_about_us = $this->Heard_about_model->AllHeardAboutUs();
          
        $data=[
                'area_interest' => $area_of_interest,
                'course_type' => $course_type,
                'occupation_list' => $occupation,
                'hobby_list' => $hobby,
                'education_list' => $education,
                'heard_about_us_list' => $heard_about_us,
                'message' => 'Success',
                'code'    => HTTP_OK,
            ];
            $this->response($data, HTTP_OK);
    }

    public function update_admin()
    {
        $admin_id = $this->input->post('id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email_id = $this->input->post('email_id');
        $password = $this->input->post('password');
        $date_of_birth = $this->input->post('date_of_birth');
        $gender = $this->input->post('gender');
        $pincode = $this->input->post('pincode');

        if ($admin_id) {
            $data['message'] = 'Invalid Params';
            $data['code'] = HTTP_BLANK;
            $this->response($data, 200);
            exit();
        }


        if (empty($user_id)) {
            $data['message'] = 'Invalid Params';
            $data['code'] = HTTP_BLANK;
            $this->response($data, 200);
            exit();
        }

        if (!$this->Users_model->TokenConfirm($this->data['user_id'], $this->data['token'])) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_INVALID;
            $this->response($data, HTTP_OK);
            exit();
        }

        $user = $this->Users_model->UserProfile($user_id);
        if (empty($user)) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        // $img = $profile_pic;
        // $img = str_replace(' ', '+', $img);
        // $img_data = base64_decode($img);
        // $profile_pic_name = uniqid().'.jpg';
        // $file = './data/post/'.$profile_pic_name;
        // file_put_contents($file, $img_data);

        $profile_pic = '';
        if (!empty($this->data['profile_pic'])) {
            $img = $this->data['profile_pic'];
            $img = str_replace(' ', '+', $img);
            $img_data = base64_decode($img);
            $profile_pic = uniqid().'.jpg';
            $file = './data/post/'.$profile_pic;
            file_put_contents($file, $img_data);
        }

        if (!empty($this->input->post('avatar'))) {
            $profile_pic = $this->data['avatar'];
        }

        $this->Users_model->UpdateUserPic($user_id, $name, $profile_pic, $bank_detail, $adhar_card, $upi, $email);
        $data['message'] = 'Success';
        $data['code'] = HTTP_OK;
        $this->response($data, HTTP_OK);
        exit();
    }

}
