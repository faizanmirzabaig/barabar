<?php
class Banner extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Banner_model','Course_type_model'));
    }

    public function index()
    {
        $data = [
            'title' => 'Banner List',
            'AllBanner' => $this->Banner_model->AllBannerList()
        ];
        $data['SideBarbutton'] = ['backend/banner/add', 'Add'];
        template('banner/index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Add Banner',
            'CourseType' => $this->Course_type_model->AllCourseType()

        ];
        template('banner/add', $data);
    }

    public function insert()
    {
        $img = '';
        if (!empty($_FILES["img"]['name'])) {
            $config['upload_path'] = './uploads/data/banner/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '10000';
//            $config['max_width'] = '2000';
//            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {

                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/banner');
            } else {

                $file = $this->upload->data();
                $img = $file['file_name'];
            }
        }
        $course_type_id = $this->input->post('course_type_id');
        $InsertBanner = $this->Banner_model->Insert($img, $course_type_id);
        if ($InsertBanner) {
            $this->session->set_flashdata('msg', array('message' => 'Banner Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Banner');
    }

    public function edit($id)
    {
        $data=[
            'title'=>'Edit Banner',
            'Banner'=>$this->Banner_model->getBanner($id),
            'CourseType' => $this->Course_type_model->AllCourseType()

            ];
        $this->form_validation->set_rules('img','Image','required');
        if($this->form_validation->run()== false)
            template('banner/edit', $data);
    }

    public function update()
    {
        $Banner_id=$this->input->post('Banner_id');
        $course_type_id=$this->input->post('course_type_id');

        // print_r($Banner_id); exit;
        $img = '';
        if (!empty($_FILES["img"]['name'])) {
            $config['upload_path'] = './uploads/data/banner/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '10000';
//            $config['max_width'] = '2000';
//            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {

                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/Banner/');
            } else {

                $file = $this->upload->data();
                $img = $file['file_name'];
            }
        }

        $UpdateBanner = $this->Banner_model->update($Banner_id,$course_type_id,$img,);
        //print_r($UpdateBanner); exit;
        if ($UpdateBanner) {
            $this->session->set_flashdata('msg', array('message' => 'Banner Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Banner');


    }



    public function delete($id)
    {
        if ($this->Banner_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Banner Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Banner');
    }
}
