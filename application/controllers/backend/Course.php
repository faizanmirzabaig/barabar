<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Course extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Course_model', 'Users_model', 'Course_type_model', 'Area_interest_model', 'Heard_about_model', 'Hobby_model', 'Occupation_model', 'Education_model'));
    }

    public function index()
    {
        $admin_id = $this->session->userdata('admin_id');

        $data = [
            'title' => 'Course',
            'course' => $this->Course_model->List($admin_id)
        ];
        // echo "<pre>";print_r($data);exit;
        $data['SideBarbutton'] = ['backend/course/add', 'Add'];
        template('course/index', $data);
    }
    public function view($id)
    {
        $data = [
            'title' => 'View Course',
            'view_course' => $this->Course_model->ViewCourse($id),
            'chapter_list' => $this->Course_model->chapterList($id),
            // 'chapter_video' => $this->Course_model->ChapterVideo($id),
        ];
        template('course/view', $data, $id);
    }
    public function add()
    {

        $data = [
            'title' => 'Add Course',
            'CourseType' => $this->Course_type_model->AllCourseType(),
            'AllAreaInterest' => $this->Area_interest_model->AllAreaInterest(),
            'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
            'AllHobby'        => $this->Hobby_model->AllHobbyList(),
            'AllOccupation' => $this->Occupation_model->AllOccupationList(),
            'AllEducation' => $this->Education_model->AllEducationList(),
            'UserPincode' => $this->Users_model->allPincode(),
            'AllUser' => $this->Users_model->AllUser(),
        ];

        template('course/add', $data);
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

        if ($this->input->post('male') && $this->input->post('female')) {
            $gender = 2;
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
            'course_type_id' => $this->input->post('course_type_id'),
            'title' => $this->input->post('title'),
            'duration' => $this->input->post('duration'),
            'writer' => $this->input->post('writer'),
            'language' => $this->input->post('language'),
            'description' => $this->input->post('description'),
            'sort' => $this->input->post('serial_no'),
            'price' => $this->input->post('price'),
            'video_link' => $this->input->post('video_link'),
            'image' => $image1,
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
            'no_of_usr' => $this->input->post('no_of_usr'),
            'reward_point' => $this->input->post('reward_point'),
        ];
        if ($this->input->post('pincode')) {
            $pincode = implode(',', $this->input->post('pincode'));
            $data['pincode'] = $pincode;
        }

        if ($this->input->post('reward_point') == 0) {
            $data['status']= INCOMPLETE;   
            $InsertSetting = $this->Course_model->Insert($data);
            if ($InsertSetting) {
                $this->session->set_flashdata('msg', array('message' => 'Course Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
            redirect('backend/Course');
        } else {
            $data['status']=PAYMENT_PEND;
            $InsertSetting = $this->Course_model->Insert($data);
            if ($InsertSetting) {

                $this->session->set_flashdata('msg', array('message' => 'Course Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
            redirect('backend/PayUMoney/checkout/' . $InsertSetting);
        }
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Edit Course',
            'course' => $this->Course_model->getSite($id),
            'CourseType' => $this->Course_type_model->AllCourseType(),
            'AllAreaInterest' => $this->Area_interest_model->AllAreaInterest(),
            'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
            'AllHobby'        => $this->Hobby_model->AllHobbyList(),
            'AllOccupation' => $this->Occupation_model->AllOccupationList(),
            'AllEducation' => $this->Education_model->AllEducationList(),
            'UserPincode' => $this->Users_model->allPincode(),
        ];

        template('course/edit', $data);
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
            'course_type_id' => $this->input->post('course_type_id'),
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
            'no_of_usr' => $this->input->post('no_of_usr'),
            'reward_point' => $this->input->post('reward_point'),
        ];
        if ($this->input->post('pincode')) {
            $pincode = implode(',', $this->input->post('pincode'));
            $data['pincode'] = $pincode;
        }
        $UpdateSetting = $this->Course_model->Update($data, $id);
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
                    $UpdateSetting = $this->Course_model->Update($data1, $id);
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

            $this->session->set_flashdata('msg', array('message' => 'Course Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/course/';
        redirect($urls);
    }

    public function delete($id)
    {
        if ($this->Course_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Course Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function videoList($course_id, $id = '')
    {
        $data = [
            'title' => 'Video List',
            'video' => $this->Course_model->ListData($course_id, $id),
            'course' => $this->Course_model->getSite($course_id),
        ];
        //  print_r($data['video']);
        // die('i m here');
        $urls = 'backend/course/addvideo/' . $course_id . '/' . $id;
        $status = $data['course'][0]->status;
        $editable = true;
        switch ($status) {
            case PAYMENT_PEND:
                $editable = false;
                break;
            case PENDING:
                $editable = false;
                break;
            case APPROVED:
                $editable = true;
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

        template('coursevideo/index', $data);
    }

    public function addvideo($course_id, $id = '')
    {
        $data = [
            'title' => 'Add Course Video',
            'course_id' => $course_id,
            'chapter_id' => $id


        ];
        //  print_r($data);
        // die('i m here');
        template('coursevideo/add', $data);
    }

    public function insertvideo($course_id, $id = '')
    {
        // print_r($course_id,$id);
        // exit();
        $this->load->library('upload');
        // $image1 = '';
        // $image = '';
        // $pdf = '';


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
                // $file_info = pathinfo($_FILES['image']['name']);
                // $file_extension = strtolower($file_info['extension']);

            }
        }

        if (!empty($_FILES['image']['name'])) {
            $_FILES['image']['name'] = $files['image']['name'];
            $_FILES['image']['type'] = $files['image']['type'];
            $_FILES['image']['tmp_name'] = $files['image']['tmp_name'];
            $_FILES['image']['error'] = $files['image']['error'];
            $_FILES['image']['size'] = $files['image']['size'];

            $config = array();
            $config['upload_path'] = './uploads/data/content/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size']      = '10000';
            $config['overwrite']     = FALSE;
            $this->upload->initialize($config);
            $this->upload->do_upload('image');
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));

                $urls = 'backend/course/videoList/' . $course_id . '/' . $id;
                redirect($urls);
            } else {
                // die('im here');
                $data = $this->upload->data();
                $video_link = $data['file_name'];
                // die($video_link);

            }
        }

        if (!empty($_FILES['pdf']['name'])) {
            $_FILES['pdf']['name'] = $files['pdf']['name'];
            $_FILES['pdf']['type'] = $files['pdf']['type'];
            $_FILES['pdf']['tmp_name'] = $files['pdf']['tmp_name'];
            $_FILES['pdf']['error'] = $files['pdf']['error'];
            $_FILES['pdf']['size'] = $files['pdf']['size'];

            $config = array();
            $config['upload_path'] = './uploads/data/content/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']      = '10000';
            $config['overwrite']     = FALSE;
            $this->upload->initialize($config);
            $this->upload->do_upload('pdf');
            if (!$this->upload->do_upload('pdf')) {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));

                $urls = 'backend/course/videoList/' . $course_id . '/' . $id;
                redirect($urls);
            } else {
                $data = $this->upload->data();
                $video_link = $data['file_name'];
            }
        }
        if ($this->input->post('video_link')) {

            $video_link = $this->input->post('video_link');
        }


        // if($this->input->post('video_link')){

        // }
        // else if($this->input->post('video_link')){

        // }
        // else{

        // }

        $data = [
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'sort' => $this->input->post('serial_no'),
            'minute' => $this->input->post('video_lenght'),
            'description' => $this->input->post('description'),
            //   'videos' => $image1,
            'video_link' => $video_link,
            'content_type' => $this->input->post('content_type'),


            'course_id' => $course_id,
            'chapter_id' => $id,

        ];

        //echo "<pre>";print_r($data);exit;

        $InsertSetting = $this->Course_model->Insertvideo($data);
        if ($InsertSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Course Video Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        $urls = 'backend/course/videoList/' . $course_id . '/' . $id;
        redirect($urls);
    }

    public function editvideo($id, $chapter_id = '')
    {
        // var_dump($id); // or print_r($id);
        $get_course_id_by_video = $this->Course_model->getCourseVideo($id);

        $get_course_id = $this->Course_model->getCourseId($chapter_id);

        // Ensure $get_course_data is an object before accessing its properties
        if ($get_course_id_by_video) {

            $get_course_data = $this->Course_model->getSite($get_course_id_by_video[0]->course_id);
        }

        // Debugging to check the values
        // print_r($get_course_id);
        // print_r($get_course_id_by_video);
        // print_r($get_course_data);
        // exit();

        $data = [
            'title' => 'Edit Course Video',
            'chapter_id' => $chapter_id,
            'course_id' => $get_course_id_by_video[0]->course_id,
            'course_data' => $get_course_data,
            'course' => $get_course_id_by_video
        ];
        //  print_r($data['course_id']);
        // exit();

        template('coursevideo/edit', $data);
    }



    public function updatevideo($course_get_id, $chapter_id = '')
    {

        $id = $this->input->post('id');
        $course_get_id = $this->input->post('course_id');

        $image = '';
        if (!empty($_FILES["image"]['name'])) {
            $config['upload_path'] = './uploads/data/content/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {

                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                $urls = 'backend/course/videoList/' . $course_get_id;
                redirect($urls);
            } else {

                $file = $this->upload->data();
                $video_link = $file['file_name'];
                $video_length = '';
            }
        }

        if (!empty($_FILES["pdf"]['name'])) {
            $config['upload_path'] = './uploads/data/content/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('pdf')) {

                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                $urls = 'backend/course/videoList/' . $course_get_id;
                redirect($urls);
            } else {

                $file = $this->upload->data();
                $video_link = $file['file_name'];
                $video_length = '';
            }
        }
        if ($this->input->post('video_link')) {
            $video_link = $this->input->post('video_link');
        }
        if ($this->input->post('video_lenght')) {

            $video_length = $this->input->post('video_lenght');
        }


        $data = [
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'sort' => $this->input->post('serial_no'),
            'minute' => $video_length,
            'description' => $this->input->post('description'),
            'video_link' => $video_link,
            'content_type' => $this->input->post('content_type'),

        ];

        $UpdateSetting = $this->Course_model->Updatevideo($data, $id);
        if ($UpdateSetting) {

            //    //$this->load->library('upload');
            // $video = '';
            // if (!empty($_FILES["image1"]['name'])) {
            //     $config['file_name'] = 'coursevideo'.time();
            //     $config['upload_path'] = '../uploads/data/content/';
            //     // $config['allowed_types'] = 'gif|mp4|avi|mpg|mpeg|wmv|3gp|mov';
            //     $config['allowed_types'] = '*';
            //     $config['remove_spaces'] = TRUE;

            //     //$config['max_size'] = '10000';
            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
            //     if (!$this->upload->do_upload('image1')) {
            //         // echo $file_ext = pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION);
            //         $error = array('error' => $this->upload->display_errors());
            //         print_r($error['error']);
            //         die;
            //         // $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
            //         // redirect('backend/student/EditSecondaryFitnessComponents/'.$id);
            //     } else {
            //         $file = $this->upload->data();
            //         $video = $file['file_name'];
            //          $data1 = array('videos'=>$video);
            //         $UpdateSetting = $this->Course_model->Updatevideo($data1, $id);
            //     }
            // }
            // $image1 = '';
            // $files = $_FILES;
            // //echo "<pre>";print_r($_FILES['image1']['name']);
            // if(!empty($_FILES['image1']['name']))
            // {           
            //     $_FILES['image1']['name']= $files['image1']['name'];
            //     $_FILES['image1']['type']= $files['image1']['type'];
            //     $_FILES['image1']['tmp_name']= $files['image1']['tmp_name'];
            //     $_FILES['image1']['error']= $files['image1']['error'];
            //     $_FILES['image1']['size']= $files['image1']['size'];    

            //     $config = array();
            //     $config['upload_path'] = './data/coursevideo/';
            //     $config['allowed_types'] = 'mp4';
            //     // $config['max_size']      = '1000000000000000000';
            //     // $config['overwrite']     = FALSE;
            //     $this->upload->initialize($config);
            //     $this->upload->do_upload('image1');
            //     if ( ! $this->upload-> do_upload('image1'))
            //     {
            //       $imageError =  $this->upload->display_errors();
            //       echo "<pre>";print_r($imageError);exit;

            //     }
            //     else
            //     { 
            //       $data = $this->upload->data();
            //       $image1 = $data['file_name'];
            //       $data1 = array('videos'=>$image1);
            //       $UpdateSetting = $this->Course_model->Updatevideo($data1, $id);

            //     }
            // }

            $this->session->set_flashdata('msg', array('message' => 'Course Video Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/course/videoList/' . $course_get_id;
        redirect($urls);
    }


    public function deletevideo($id)
    {
        if ($this->Course_model->Deletevideo($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Course Video Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function chapterList($id)
    {

        $data = [
            'title' => 'Chapter List',
            'chapter' => $this->Course_model->chapterList($id),
            'course' => $this->Course_model->getSite($id),
        ];
        $urls = 'backend/course/addchapter/' . $id;
        $status = $data['course'][0]->status;
        $editable = true;
        switch ($status) {
            case PAYMENT_PEND:
                $editable = false;
                break;
            case PENDING:
                $editable = false;
                break;
            case APPROVED:
                $editable = true;
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
        template('chapter/index', $data);
    }

    public function make_live($id)
    {
        $status = $this->session->userdata('role') != CREATOR ? APPROVED : PENDING;

        $data = [
            'status' => $status,
            'id'   => $id,
        ];
        $make_live = $this->Course_model->MakeLive($id, $data);

        if ($make_live) {
            $this->session->set_flashdata('msg', array('message' => 'Course Video Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/course/');
    }

    public function addchapter($id)
    {
        $data = [
            'title' => 'Add Chapter',
            'course_id' => $id,
        ];
        template('chapter/add', $data);
    }

    public function insertchapter($id)
    {


        $data = [
            'name' => $this->input->post('name'),
            'chapter_no' => $this->input->post('chapter_no'),
            'sort' => $this->input->post('serial_no'),
            'description' => $this->input->post('description'),
            'course_id' => $id,
        ];

        //echo "<pre>";print_r($data);exit;

        $InsertSetting = $this->Course_model->Insertchapter($data);
        if ($InsertSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Course Chapter Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        $urls = 'backend/course/chapterList/' . $id;
        redirect($urls);
    }

    public function editchapter($course_id, $id)
    {
        $data = [
            'title' => 'Edit Course Chapter',
            'course_id' => $course_id,
            'course' => $this->Course_model->getSite($course_id),
            'chapter' => $this->Course_model->getCourseChapter($id, $course_id),

        ];
   

        template('chapter/edit', $data);
    }

    public function updatechapter($course_id)
    {
        $id = $this->input->post('id');
        $data = [
            'name' => $this->input->post('name'),
            'chapter_no' => $this->input->post('chapter_no'),
            'sort' => $this->input->post('serial_no'),
            'description' => $this->input->post('description'),
        ];

        $UpdateSetting = $this->Course_model->Updatechapter($data, $id);
        if ($UpdateSetting) {


            $this->session->set_flashdata('msg', array('message' => 'Course Chapter Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/course/chapterList/' . $course_id;
        redirect($urls);
    }


    public function deletechapter($id)
    {
        if ($this->Course_model->DeleteChapter($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Course Chapter Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    // public function ourcourses()
    // {      

    //     $data = [
    //         'title' => 'Our Course',
    //         'course' => $this->Course_model->ourcourse()
    //     ];
    //     // echo "<pre>";print_r($data);exit;
    //     $data['SideBarbutton'] = ['backend/course/add', 'Add'];
    //     template('course/index', $data);
    // }

    public function creatorcourses()
    {

        $data = [
            'title' => 'Creator Course',
            'course' => $this->Course_model->createcourse(),
            'approval_pending' => $this->Course_model->approval_pending(),

        ];
        // echo "<pre>";print_r($data);exit;
        // $data['SideBarbutton'] = ['backend/course/add', 'Add'];
        $data['AddButton'] = ['backend/course/courseapproval', 'Approval (' . $data['approval_pending'] . ') '];
        template('course/index', $data);
    }

    public function updateCreatorCourse($course_id)
    {
        // $input=$this->input->post();
        // print_r($input);
        // die('i m here');
        // die('i am here');
        // $course_id = $this->input->post('course_id'); // Get the course ID from the POST data
        // course update code start here
        $data = [
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'duration' => $this->input->post('duration'),
            'writer' => $this->input->post('writer'),
            'language' => $this->input->post('language'),
            'description' => $this->input->post('course_description'),
            'price' => $this->input->post('price'),
            'video_link' => $this->input->post('video_link'),
        ];
// print_r($data);
        // print_r($data);
        // die('i m here');
       
        $UpdateSetting = $this->Course_model->UpdateCreatorCourse($data, $course_id);
        // course update code end here

        // course chapter update code start here


        $chapter_ids=$this->input->post('chapter_id');
       
        $chapter_name=$this->input->post('chapter_name');
        $chapter_no=$this->input->post('chapter_no');
        $chapter_serial_no=$this->input->post('chapter_serial_no');
        $description=$this->input->post('description');


        foreach ($chapter_name as $key => $value) {
            $chapter_data = array(); // Create a new array for each iteration
            $chapter_id= $chapter_ids[$key];
            $chapter_data['name'] = $chapter_name[$key];
            $chapter_data['chapter_no'] = $chapter_no[$key];
            $chapter_data['description'] = $description[$key];
            $chapter_data['sort'] = $chapter_serial_no[$key];
            //   print_r($data);
            $this->Course_model->UpdateCreatorChapter($chapter_data, $course_id, $chapter_id);
            // echo $this->db->last_query();
        }

        // course chapter update code end here here

        $video_ids=$this->input->post('video_id');   
        $video_link=$this->input->post('video_link');
        $video_name=$this->input->post('video_name');
        $video_title=$this->input->post('video_title');
        $video_desc=$this->input->post('video_desc');
        // print_r($video_ids);

        foreach ($video_ids as $key => $value) {
            $video_data = array(); // Create a new array for each iteration
            $video_id= $video_ids[$key];
            $video_data['video_link'] = $video_link[$key];
            $video_data['name'] = $video_name[$key];
            $video_data['title'] = $video_title[$key];
            $video_data['description'] = $video_desc[$key];
              print_r($video_data);
            $this->Course_model->UpdateCreatorVideo($video_data, $course_id, $video_id);
            // echo $this->db->last_query();
        }
        // die('i am here');

       
        // $course__video = $this->input->post($course_id);  
        // foreach ($course__video as $video) {
            // $video_data = array(
            //     'video_link' => $this->input->post('video_link'),
            //     'name' => $this->input->post('video_name'),
            //     'title' => $this->input->post('video_title'),
            //     'description' => $this->input->post('video_desc'),
            //     // 'title' => $this->input->post('video_title'),
            //     // ... (other video data)
            // );
            // // print_r($video_data);
            // // exit;
            // $this->Course_model->UpdateCreatorVideo($video_data, $course_id);
        // }
       

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
                    $UpdateSetting = $this->Course_model->UpdateCreatorCourse($data1, $course_id);
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

            $this->session->set_flashdata('msg', array('message' => 'Course Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/course/creatorcourses';
        redirect($urls);
    }

    public function courseapproval()
    {

        $data = [
            'title' => 'Course Management',
            'Coursepending' => $this->Course_model->AllCreator(1),
            'Courseapproved' => $this->Course_model->AllCreator(2),
            'Courserejected' => $this->Course_model->AllCreator(3)
        ];
        // echo "<pre>";print_r($data);exit;
        //$data['SideBarbutton'] = ['backend/Creator/add', 'Add'];
        template('course/approval', $data);
    }

    // public function ChangeStatus()
    // {
    //     $id=$this->input->post('id');
    //     if ($this->Course_model->ChangeStatus($id)) {
    //        echo "true";
    //     } else {
    //        echo "false";
    //     }
    // }

    // 
    public function ChangeStatus()
    {

        $id = $this->input->post('course_id');
        $reject_reason = $this->input->post('reject_reason');
        $status = $this->input->post('status');

        if ($this->Course_model->ChangeStatus($id, $status, $reject_reason)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function performancereport($id)
    {
        $data = [
            'title' => 'Performance Report',
            'report' => $this->Course_model->ViewPerformanceReport($id),
        ];
        // echo "<pre>";
        // print_r($data);
        // die('i am here');
        template('course/performancereport', $data);
    }
    public function ExportCourseQuiz($id)
    {
        $data = $this->Course_model->ExportCourseQuiz($id);

        $file = new Spreadsheet();

        $active_sheet = $file->getActiveSheet();
        $active_sheet->setCellValue('A1', 'Serial Number');
        $active_sheet->setCellValue('B1', 'User Name');
        $active_sheet->setCellValue('C1', 'User Email');
        $active_sheet->setCellValue('D1', 'User Mobile');
        $active_sheet->setCellValue('E1', 'User Age');
        $active_sheet->setCellValue('F1', 'User Pincode');
        $active_sheet->setCellValue('G1', 'User Gender');
        $active_sheet->setCellValue('H1', 'Course Video Name');
        $active_sheet->setCellValue('I1', 'Question');
        $active_sheet->setCellValue('J1', 'Answer');
        $active_sheet->setCellValue('K1', 'Correct Answer');
        $active_sheet->setCellValue('L1', 'Is Correct');

        $count = 2;
        $i = 1;
        foreach ($data as $row) {

            $correct_ans = $row->correct_ans;
            switch ($correct_ans) {
                case 'opt_1':
                    $correct_ans = $row->option_1;
                    break;
                case 'opt_2':
                    $correct_ans =  $row->option_2;
                    break;
                case 'opt_3':
                    $correct_ans = $row->option_3;
                    break;
                default:
                    $correct_ans = $row->option_4;
                    break;
            }
            $answer = $row->answer;
            switch ($answer) {
                case 'opt_1':
                    $answer = $row->option_1;
                    break;
                case 'opt_2':
                    $answer = $row->option_2;
                    break;
                case 'opt_3':
                    $answer = $row->option_3;
                    break;
                case 'opt_4':
                    $answer = $row->option_4;
                    break;
                default:
                    $answer = 'Not Given';
                    break;
            }
            $is_correct = $row->is_correct;
            $answer == $correct_ans ? $is_correct = 'Yes' : $is_correct = 'No';
            $date_of_birth = new DateTime($row->date_of_birth);
            $today_age = new DateTime('today');;
            $age = $date_of_birth->diff($today_age)->y;

            $active_sheet->setCellValue('A' . $count, $i++);
            $active_sheet->setCellValue('B' . $count, $row->user_name);
            $active_sheet->setCellValue('C' . $count, $row->email);
            $active_sheet->setCellValue('D' . $count, $row->mobile);
            $active_sheet->setCellValue('E' . $count, $age);
            $active_sheet->setCellValue('F' . $count, $row->pincode);
            $active_sheet->setCellValue('G' . $count, $row->gender);
            $active_sheet->setCellValue('H' . $count, $row->course_video_name);
            $active_sheet->setCellValue('I' . $count, $row->question);
            $active_sheet->setCellValue('J' . $count, $answer);
            $active_sheet->setCellValue('K' . $count, $correct_ans);
            $active_sheet->setCellValue('L' . $count, $is_correct);
            $count = $count + 1;
        }
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

    public function ExportTransaction($id)
    {
        $data = $this->Course_model->ExportTransaction($id);
        //  echo "<pre>";
        // print_r($data);
        // die('i am here');
        $file = new Spreadsheet();

        $active_sheet = $file->getActiveSheet();
        $active_sheet->setCellValue('A1', 'Serial Number');
        $active_sheet->setCellValue('B1', 'Creator Name');
        $active_sheet->setCellValue('C1', 'Course Name');
        $active_sheet->setCellValue('D1', 'Payable Amount');
        $active_sheet->setCellValue('E1', 'Admin Commission');
        $active_sheet->setCellValue('F1', 'Total Amount');
        $active_sheet->setCellValue('G1', 'Remaining Amount');
        $active_sheet->setCellValue('H1', 'User Name');
        $active_sheet->setCellValue('I1', 'Quiz-Reward');
        $active_sheet->setCellValue('J1', 'Payment Status');
        $active_sheet->setCellValue('K1', 'Added Date');
        // $active_sheet->setCellValue('L1', 'Is Correct');

        $count = 2;
        $i = 1;
        foreach ($data as $row) {


            $active_sheet->setCellValue('A' . $count, $i++);
            $active_sheet->setCellValue('B' . $count, $row->creator_name);
            $active_sheet->setCellValue('C' . $count, $row->course_name);
            $active_sheet->setCellValue('D' . $count, $row->payable);
            $active_sheet->setCellValue('E' . $count, $row->admin_commission);
            $active_sheet->setCellValue('F' . $count, $row->amount);
            $active_sheet->setCellValue('G' . $count, $row->remaining_amount);
            $active_sheet->setCellValue('H' . $count, $row->user_name);
            $active_sheet->setCellValue('I' . $count, $row->quiz_reward);
            $active_sheet->setCellValue('J' . $count, $row->payment_status);
            $active_sheet->setCellValue('K' . $count, $row->created_at);
            // $active_sheet->setCellValue('L' . $count, $is_correct);
            $count = $count + 1;
        }
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
}

