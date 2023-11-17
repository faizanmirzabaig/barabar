<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProfile extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('Adminprofile_model'));
    }

    public function index()
    {
       
        $id = $this->session->userdata()['admin_id'];
        $data = [
            'title' => 'Update Admin Profile',
            'admin'=> $this->Adminprofile_model->updateprofile($id)
        ];

        template('admin/update', $data);
    }

    public function update()
    {
        // die('i am here');
        // $id = $this->session->userdata()['admin_id'];
        $id=$this->input->post('id');
        // echo $id;
        if(!empty($this->input->post('password')))
        {
            $data = [
                'sw_password' => md5($this->input->post('password')),
                'password' => $this->input->post('password'),
            ];
        }

        $data['first_name'] = $this->input->post('name');
        $Update = $this->Adminprofile_model->Updateadminprofile($id,$data);
        // print_r($Update);
        // exit();
        if ($Update) {
            $this->session->set_flashdata('msg', array('message' => 'Password Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/dashboard');
    }
}