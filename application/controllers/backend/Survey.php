<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Survey extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Survey_model', 'Users_model', 'Survey_type_model', 'Area_interest_model', 'Heard_about_model', 'Hobby_model', 'Occupation_model', 'Education_model'));
    }
    public function index()
    {
        $admin_id = $this->session->userdata('admin_id');

        $data = [
            'title' => 'Survey',
            'survey' => $this->Survey_model->List($admin_id)
        ];
        // echo "<pre>";print_r($data);exit;
        $data['SideBarbutton'] = ['backend/Survey/add', 'Add'];
        template('survey/index', $data);
    }

    public function add()
    {

        $data = [
            'title' => 'Add Survey',
            'SurveyType' => $this->Survey_type_model->AllSurveyType(),
            'AllAreaInterest' => $this->Area_interest_model->Area_interest_model(),
            'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
            'AllHobby'        => $this->Hobby_model->AllHobbyList(),
            'AllOccupation' => $this->Occupation_model->AllOccupationList(),
            'AllEducation' => $this->Education_model->AllEducationList(),
            'UserPincode' => $this->Users_model->allPincode()
        ];

        template('survey/add', $data);
    }

    public function insert()
    {
        $creator_id = $this->session->userdata('admin_id');

        $this->load->library('upload');
        $image1 = '';
        $files = $_FILES;
        if (!empty($_FILES['image1']['name'])) {
            $_FILES['image1']['name'] = $files['image1']['name'];
            $_FILES['image1']['type'] = $files['image1']['type'];
            $_FILES['image1']['tmp_name'] = $files['image1']['tmp_name'];
            $_FILES['image1']['error'] = $files['image1']['error'];
            $_FILES['image1']['size'] = $files['image1']['size'];
            $config = array();
            $config['upload_path'] = './uploads/data/content/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '10000';
            $config['overwrite']     = FALSE;
            $this->upload->initialize($config);
            $this->upload->do_upload('image1');
            if (!$this->upload->do_upload('image1')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/course');
            } else {

                $data = $this->upload->data();
                $image1 = $data['file_name'];
            }
        }

        $video1 = '';
        $files = $_FILES;

        if (!empty($_FILES['video1']['name'])) {

            $_FILES['video1']['name'] = $files['video1']['name'];
            $_FILES['video1']['type'] = $files['video1']['type'];
            $_FILES['video1']['tmp_name'] = $files['video1']['tmp_name'];
            $_FILES['video1']['error'] = $files['video1']['error'];
            $_FILES['video1']['size'] = $files['video1']['size'];

            $config = array();
            $config['upload_path'] = './uploads/data/content/';
            $config['allowed_types'] = '*';
            $config['max_size']      = '1000000000000000';
            $config['overwrite']     = FALSE;
            $this->upload->initialize($config);
            $this->upload->do_upload('video1');
            if (!$this->upload->do_upload('video1')) {

                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/Course');
            } else {
                $data = $this->upload->data();
                $video1 = $data['file_name'];
            }
        }
     
        if($this->input->post('male') && $this->input->post('female')){
           $gender=2;   
        }
        if ($this->input->post('male') && $this->input->post('female')) {
            $gender = 2;
        } else if ($this->input->post('male')) {
            $gender = 'male';
        } else if ($this->input->post('female')) {
            $gender = 'female';
        }

        $data = [
            'name' => $this->input->post('name'),
            'creator_id' => $creator_id,
            'course_type_id' => 1,
            'title' => $this->input->post('title'),
            'duration' => $this->input->post('duration'),
            'writer' => $this->input->post('writer'),
            'language' => $this->input->post('language'),
            'description' => $this->input->post('description'),
            'sort' => $this->input->post('serial_no'),
            'price' => $this->input->post('price'),
            //   'videos' => $video1,
            'video_link' => $this->input->post('video_link'),
            'image' => $image1,

            // specific_user
            // 'pincode'=>$pincode,
            'gender' => $gender,
            'chapter' => $this->input->post('chapter'),
            'view' => $this->input->post('view'),
            'min_age' => $this->input->post('min_age'),
            'max_age' => $this->input->post('max_age'),
            'occupation_id' => $this->input->post('occupation'),
            'education_id' => $this->input->post('education'),
            'hobby_id' => $this->input->post('hobby'),
            'heard_about_us_id' => $this->input->post('heard_about_us'),
            'area_of_interest_id' => $this->input->post('area_of_interest'),
        ];
        if ($this->input->post('pincode')) {
            $pincode = implode(',', $this->input->post('pincode'));
            $data['pincode'] = $pincode;
        }
        //echo "<pre>";print_r($data);exit;

        $InsertSetting = $this->Survey_model->Insert($data);
        if ($InsertSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Survey Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {

            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Survey');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Survey',
            'survey' => $this->Survey_model->getSite($id),
            'SurveyType' => $this->Survey_type_model->AllSurveyType(),
            'AllAreaInterest' => $this->Area_interest_model->AllAreaInterest(),
            'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
            'AllHobby'        => $this->Hobby_model->AllHobbyList(),
            'AllOccupation' => $this->Occupation_model->AllOccupationList(),
            'AllEducation' => $this->Education_model->AllEducationList(),
            'UserPincode' => $this->Users_model->allPincode(),


        ];

        template('survey/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        if ($this->input->post('male') && $this->input->post('female')) {
            $gender = 2;
        } else if ($this->input->post('male')) {
            $gender = 'male';
        } else if ($this->input->post('female')) {
            $gender = 'female';
        }


        $data = [
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'survey_type_id' => $this->input->post('survey_type_id'),
            'duration' => $this->input->post('duration'),
            'writer' => $this->input->post('writer'),
            'language' => $this->input->post('language'),
            'description' => $this->input->post('description'),
            'sort' => $this->input->post('serial_no'),
            'price' => $this->input->post('price'),
            'video_link' => $this->input->post('video_link'),


            // specific_user
            // 'pincode'=>$pincode,
            'gender' => $gender,
            'view' => $this->input->post('view'),
            'min_age' => $this->input->post('min_age'),
            'max_age' => $this->input->post('max_age'),
            'occupation_id' => $this->input->post('occupation'),
            'education_id' => $this->input->post('education'),
            'hobby_id' => $this->input->post('hobby'),
            'heard_about_us_id' => $this->input->post('heard_about_us'),
            'area_of_interest_id' => $this->input->post('area_of_interest'),

        ];
        if ($this->input->post('pincode')) {
            $pincode = implode(',', $this->input->post('pincode'));
            $data['pincode'] = $pincode;
        }
        $UpdateSetting = $this->Survey_model->Update($data, $id);
        if ($UpdateSetting) {

            $this->load->library('upload');
            $image1 = '';
            $files = $_FILES;
            //echo "<pre>";print_r($_FILES['image1']['name']);exit;
            if (!empty($_FILES['image1']['name'])) {
                $_FILES['image1']['name'] = $files['image1']['name'];
                $_FILES['image1']['type'] = $files['image1']['type'];
                $_FILES['image1']['tmp_name'] = $files['image1']['tmp_name'];
                $_FILES['image1']['error'] = $files['image1']['error'];
                $_FILES['image1']['size'] = $files['image1']['size'];

                $config = array();
                $config['upload_path'] = './uploads/data/content/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '1000000000';
                $config['overwrite']     = FALSE;
                $this->upload->initialize($config);
                $this->upload->do_upload('image1');
                if (!$this->upload->do_upload('image1')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = $this->upload->data();
                    $image1 = $data['file_name'];
                    $data1 = array('image' => $image1);
                    $UpdateSetting = $this->Survey_model->Update($data1, $id);
                }
            }

            //   $video1 = '';
            //   $files = $_FILES;
            //   if(!empty($_FILES['video1']['name']))
            //   {           
            //       $_FILES['video1']['name']= $files['video1']['name'];
            //       $_FILES['video1']['type']= $files['video1']['type'];
            //       $_FILES['video1']['tmp_name']= $files['video1']['tmp_name'];
            //       $_FILES['video1']['error']= $files['video1']['error'];
            //       $_FILES['video1']['size']= $files['video1']['size'];    

            //       $config = array();
            //       $config['upload_path'] = './uploads/data/content/';
            //       $config['allowed_types'] = '*';
            //       $config['max_size']      = '1000000000000000';
            //       $config['overwrite']     = FALSE;
            //       $this->upload->initialize($config);
            //       $this->upload->do_upload('video1');
            //       if ( ! $this->upload->do_upload('video1'))
            //       {

            //       }
            //       else
            //       { 
            //         $data = $this->upload->data();
            //         $video1 = $data['file_name'];
            //         $data1 = array('videos'=>$video1);
            //         $UpdateSetting = $this->Course_model->Update($data1, $id);

            //       }
            //   }

            $this->session->set_flashdata('msg', array('message' => 'Survey Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/survey/';
        redirect($urls);
    }

    public function delete($id)
    {
        if ($this->Survey_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Survey Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function chapterList($id)
    {

        $data = [
            'title' => 'Chapter List',
            'chapter' => $this->Survey_model->chapterList($id),
            'survey' => $this->Survey_model->getSite($id),
        ];
        $urls = 'backend/survey/addchapter/' . $id;
        $status = $data['survey'][0]->status;
        $editable = true;
        switch ($status) {
            case PAYMENT_PEND:
                $editable = false;
                break;
            case PENDING:
                $editable = false;
                break;
            case APPROVED:
                $editable = false;
                break;
            case REJECTED:
                $editable = true;
                break;
            default:
                $editable = true;
        }
        if ($editable) {
            $data['SideBarbutton'] = [$urls, 'Add'];
        }
        template('survey_chapter/index', $data);
    }

    public function addchapter($id)
    {
        $data = [
            'title' => 'Add Chapter',
            'survey_id' => $id,
        ];
        template('survey_chapter/add', $data);
    }

    public function insertchapter($id)
    {


        $data = [
            'name' => $this->input->post('name'),
            'chapter_no' => $this->input->post('chapter_no'),
            'sort' => $this->input->post('serial_no'),
            'description' => $this->input->post('description'),
            'survey_id' => $id,
        ];

        //echo "<pre>";print_r($data);exit;

        $InsertSetting = $this->Survey_model->Insertchapter($data);
        if ($InsertSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Survey Chapter Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        $urls = 'backend/survey/chapterList/' . $id;
        redirect($urls);
    }

    public function editchapter($survey_id, $id)
    {
        $data = [
            'title' => 'Edit Survey Chapter',
            'survey_id' => $survey_id,
            'survey' => $this->Survey_model->getSite($survey_id),
            'chapter' => $this->Survey_model->getSurveyChapter($id, $survey_id),

        ];


        template('survey_chapter/edit', $data);
    }

    public function updatechapter($survey_id)
    {
        $id = $this->input->post('id');
        $data = [
            'name' => $this->input->post('name'),
            'chapter_no' => $this->input->post('chapter_no'),
            'sort' => $this->input->post('serial_no'),
            'description' => $this->input->post('description'),
        ];

        $UpdateSetting = $this->Survey_model->Updatechapter($data, $id);
        if ($UpdateSetting) {


            $this->session->set_flashdata('msg', array('message' => 'Survey Chapter Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/survey/chapterList/' . $survey_id;
        redirect($urls);
    }

    public function deletechapter($id)
    {
        if ($this->Survey_model->DeleteChapter($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Survey Chapter Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function videoList($survey_id, $id = '')
    {
        $data = [
            'title' => 'Video List',
            'video' => $this->Survey_model->ListData($survey_id,$id),
            'survey' => $this->Survey_model->getSite($survey_id),
        ];
        //  print_r($data['video']);
        // die('i m here');
        $urls = 'backend/survey/addvideo/' . $survey_id . '/' . $id;
        $status = $data['survey'][0]->status;
        $editable = true;
        switch ($status) {
            case PAYMENT_PEND:
                $editable = false;
                break;
            case PENDING:
                $editable = false;
                break;
            case APPROVED:
                $editable = false;
                break;
            case REJECTED:
                $editable = true;
                break;
            default:
                $editable = true;
        }
        if ($editable) {
            $data['SideBarbutton'] = [$urls, 'Add'];
        }

        template('survey_video/index', $data);
    }

    public function addvideo($survey_id, $id = '')
    {
        $data = [
            'title' => 'Add Survey Video',
            'survey_id' => $survey_id,
            'chapter_id' => $id


        ];
        //  print_r($data);
        // die('i m here');
        template('survey_video/add', $data);
    }

    public function insertvideo($survey_id, $id = '')
    {
        // print_r($course_id,$id);
        // exit();
        $this->load->library('upload');
        $image1 = '';
        $files = $_FILES;
        if (!empty($_FILES['image1']['name'])) {
            $_FILES['image1']['name'] = $files['image1']['name'];
            $_FILES['image1']['type'] = $files['image1']['type'];
            $_FILES['image1']['tmp_name'] = $files['image1']['tmp_name'];
            $_FILES['image1']['error'] = $files['image1']['error'];
            $_FILES['image1']['size'] = $files['image1']['size'];

            $config = array();
            $config['upload_path'] = './uploads/data/content/';
            $config['allowed_types'] = '*';
            $config['max_size']      = '1000000000000000';
            $config['overwrite']     = FALSE;
            $this->upload->initialize($config);
            $this->upload->do_upload('image1');
            if (!$this->upload->do_upload('image1')) {
            } else {
                $data = $this->upload->data();
                $image1 = $data['file_name'];
            }
        }


        $data = [
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'sort' => $this->input->post('serial_no'),
            'minute' => $this->input->post('video_lenght'),
            'description' => $this->input->post('description'),
            //   'videos' => $image1,
            'video_link' => $this->input->post('video_link'),

            'survey_id' => $survey_id,
            'chapter_id' => $id,

        ];

        //echo "<pre>";print_r($data);exit;

        $InsertSetting = $this->Survey_model->Insertvideo($data);
        if ($InsertSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Survey Video Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        $urls = 'backend/survey/videoList/' . $survey_id . '/' . $id;
        redirect($urls);
    }

    public function editvideo($id, $chapter_id = '')
    {
        // var_dump($id); // or print_r($id);
        $get_survey_id_by_video = $this->Survey_model->getSurveyVideo($id);

        $get_course_id = $this->Survey_model->getSurveyId($chapter_id);

        // Ensure $get_course_data is an object before accessing its properties
        if ($get_survey_id_by_video) {

            $get_course_data = $this->Survey_model->getSite($get_survey_id_by_video[0]->survey_id);
        }

        // Debugging to check the values
        // print_r($get_course_id);
        // print_r($get_course_id_by_video);
        // print_r($get_course_data);
        // exit();

        $data = [
            'title' => 'Edit Course Video',
            'chapter_id' => $chapter_id,
            'survey_id' => $get_survey_id_by_video[0]->survey_id,
            'survey_data' => $get_course_data,
            'survey' => $get_survey_id_by_video
        ];
        //  print_r($data['course_id']);
        // exit();

        template('survey_video/edit', $data);
    }

    public function updatevideo($survey_get_id, $chapter_id = '')
    {
        // $survey_get_id = $this->input->post('survey_id');
        $id = $this->input->post('id');
        // print_r($survey_get_id);
        // print_r($id);
        // exit();
        $data = [
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'sort' => $this->input->post('serial_no'),
            'minute' => $this->input->post('video_lenght'),
            'description' => $this->input->post('description'),
            'video_link' => $this->input->post('video_link'),
        ];

        $UpdateSetting = $this->Survey_model->Updatevideo($data, $id);
        // print_r($UpdateSetting);
        // exit();
        if ($UpdateSetting) {

            $this->session->set_flashdata('msg', array('message' => 'Survey Video Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/survey/videoList/' . $survey_get_id . '/' . $chapter_id;
        // print_r($urls);
        // exit();
        redirect($urls);
    }

    public function deletevideo($id)
    {
        if ($this->Survey_model->Deletevideo($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Survey Video Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }



}