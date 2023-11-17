<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Course extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $header = $this->input->request_headers('token');
        $this->load->model([
            'Course_model',
            'Course_share_model',
            'Users_model',
        ]);
    }

    public function course_list_post()
    {
        $course_type_id = $this->input->post('course_type_id');
        $user_id = $this->input->post('user_id');
        $user_detail = $this->Users_model->UserProfile($user_id);
        $user_data['pincode'] = $user_detail->pincode;
        $date_of_birth = new DateTime($user_detail->date_of_birth);
        $today_age = new DateTime('today');;
        $user_data['age'] = $date_of_birth->diff($today_age)->y;
        // if ($user_detail->gender == 2) {
        //     $user_data['gender'] = 2;
        // } else if ($user_detail->gender == 'male') {
        //     $user_data['gender'] = 'male';
        // } else if ($user_detail->gender == 'female') {
        //     $user_data['gender'] = 'female';
        // }
        $user_data['gender'] = $user_detail->gender;
        $user_data['occupation_id'] = $user_detail->occupation_id;
        $user_data['education_id'] = $user_detail->education_id;
        $user_data['hobby_id'] = $user_detail->hobby_id;
        $user_data['heard_about_us_id'] = $user_detail->heard_about_us_id;
        $user_data['area_of_interest_id'] = $user_detail->area_of_interest_id;


        $course_type = $this->Course_model->ViewCourse('',$course_type_id,'');
        if (empty($course_type)) {
            $data['message'] = 'Invalid Course Type';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $course_list = $this->Course_model->UserView($user_data, $user_id, $course_type_id);
        // print_r($course_list);
        // exit();
        if ($course_list) {
            $data['message'] = 'Success';
            $data['code'] = HTTP_OK;
            $data['course_list'] = $course_list;
            $this->response($data, HTTP_OK);
            exit();
        } else {
            $data['message'] = 'Course not found';
            $data['code'] = 404;
            $this->response($data, HTTP_OK);
            exit();
        }

          // $course_list = $this->Course_model->ViewCourse('', $course_type_id, APPROVED);
        // if ($course_list) {
        //     $data['message'] = 'Success';
        //     $data['code'] = HTTP_OK;
        //     $data['course_list'] = $course_list;
        //     $this->response($data, HTTP_OK);
        //     exit();
        // } else {
        //     $data['message'] = 'Course not found';
        //     $data['code'] = 404;  
        //     $this->response($data, HTTP_OK);
        //     exit();
        // }
    }

    public function upload_image_post()
    {
        $share_data['user_id'] = $this->input->post('user_id');
        $share_data['course_id'] = $this->input->post('course_id');

        if (empty_param($share_data)) {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        $user = $this->Users_model->UserProfile($share_data['user_id']);
        if (empty($user)) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $couse = $this->Course_model->ViewCourse($share_data['course_id']);
        if (empty($couse)) {
            $data['message'] = 'Invalid Course';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $path = 'uploads/data/course_share/';
        $share_data['img_1'] = upload_base64_image($this->input->post('img_1'), $path);
        // $share_data['img_2'] = upload_base64_image($this->input->post('img_2'),$path);
        // $share_data['img_3'] = upload_base64_image($this->input->post('img_3'),$path);
        // $share_data['img_4'] = upload_base64_image($this->input->post('img_4'),$path);
        // $share_data['img_5'] = upload_base64_image($this->input->post('img_5'),$path);
        // $share_data['img_6'] = upload_base64_image($this->input->post('img_6'),$path);
        // $share_data['img_7'] = upload_base64_image($this->input->post('img_7'),$path);
        // $share_data['img_8'] = upload_base64_image($this->input->post('img_8'),$path);
        // $share_data['img_9'] = upload_base64_image($this->input->post('img_9'),$path);
        // $share_data['img_10'] = upload_base64_image($this->input->post('img_10'),$path);

        $inserted_id = $this->Course_share_model->insert($share_data);
        if ($inserted_id) {
            $data['message'] = 'Success';
            $data['code'] = HTTP_OK;
            $data['inserted_id'] = $inserted_id;

            $this->response($data, HTTP_OK);
            exit();
        } else {
            $data['message'] = 'Course not found';
            $data['code'] = 404;
            $this->response($data, HTTP_OK);
            exit();
        }
    }

    public function check_status_post()
    {
        $share_data['user_id'] = $this->input->post('user_id');
        $share_data['course_id'] = $this->input->post('course_id');

        if (empty_param($share_data)) {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        $user = $this->Users_model->UserProfile($share_data['user_id']);
        if (empty($user)) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $couse = $this->Course_model->ViewCourse($share_data['course_id']);
        if (empty($couse)) {
            $data['message'] = 'Invalid Course';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $isPurchased = $this->Course_model->checkPurchase($share_data['user_id'], $share_data['course_id']);
        if ($isPurchased) {
            $data['message'] = 'Already Purchased';
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
            exit();
        } else {
            $isPending = $this->Course_share_model->View('', $share_data['user_id'], $share_data['course_id'], 0);
            if ($isPending) {
                $data['message'] = 'Pending For Approval';
                $data['code'] = 201;
                $this->response($data, HTTP_OK);
                exit();
            } else {
                $data['message'] = 'Course not found';
                $data['code'] = 404;
                $this->response($data, HTTP_OK);
                exit();
            }
        }
    }

    public function Performance_Report_post()
    {
        $user_id = $this->input->post('user_id');
        $course_id = $this->input->post('id');
        $course_list = $this->Course_model->ViewPerformanceReport($course_id,$user_id);
        if ($course_list) {
            $data['message'] = 'Success';
            $data['code'] = HTTP_OK;
            $data['course_list'] = $course_list;

            $this->response($data, HTTP_OK);
            exit();
        } else {
            $data['message'] = 'Data not found';
            $data['code'] = 404;
            $this->response($data, HTTP_OK);
            exit();
        }
    }
}
