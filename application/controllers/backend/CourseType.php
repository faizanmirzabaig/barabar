<?php
class CourseType extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Course_type_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Course Type List',
            'AllCourseType' => $this->Course_type_model->AllCourseType()
        ];
        $data['SideBarbutton'] = ['backend/CourseType/add', 'Add'];
        template('course_type/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Course Type',

        ];
        template('course_type/add', $data);
    }

    public function insert()
    {
        $img = '';
        if (!empty($_FILES["img"]['name'])) {
            $config['upload_path'] = './uploads/data/course_type/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '10000';
//            $config['max_width'] = '2000';
//            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {

                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/CourseType');
            } else {

                $file = $this->upload->data();
                $img = $file['file_name'];
            }
        }

        // print_r($_FILES["img"]["name"]);
        // die('i m here');
        $course_type_name = $this->input->post('course_type_name');
        $data=[
            'name'=>$course_type_name,
            'img'=>$img,

        ];
        $InsertCourseType = $this->Course_type_model->Insert($data);
        if ($InsertCourseType) {
            $this->session->set_flashdata('msg', array('message' => 'Course Type Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/CourseType');
    }

    public function edit($id)
    {
        $data=[
            'title'=>'Edit Course Type',
            'CourseType'=>$this->Course_type_model->getCourseType($id),
            ];
            template('course_type/edit', $data);
    }

    public function update()
    {
        $img = '';
        if (!empty($_FILES["img"]['name'])) {
            $config['upload_path'] = './uploads/data/course_type/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '10000';
//            $config['max_width'] = '2000';
//            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {

                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/CourseType/');
            } else {

                $file = $this->upload->data();
                $img = $file['file_name'];
            }
        }

       $data=[
        'name' => $this->input->post('course_type_name'),
        'id'   => $this->input->post('id'),
        'img'   => $img,

       ];

        $CourseType = $this->Course_type_model->update($data);
        if ($CourseType) {
            $this->session->set_flashdata('msg', array('message' => 'Course Type Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/CourseType');


    }

    public function delete($id)
    {
        if ($this->Course_type_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Course Type Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/CourseType');
    }

}
