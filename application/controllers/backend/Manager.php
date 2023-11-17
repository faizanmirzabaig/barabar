<?php
class Manager extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Manager_model', 'Permission_model'));
    }

    public function index()
    {

        $data = [
            'title' => 'Manager List',
            'Manager' => $this->Manager_model->List(),

        ];
        // echo "<pre>";print_r($data);exit;
        $data['SideBarbutton'] = ['backend/Manager/addmanager', 'Add Manager'];
        //$data['AddButton'] = ['backend/Manager/permission/', 'Permission'];
        template('manager/index', $data);
    }

    public function addmanager()
    {
        $data = [
            'title' => 'Add Manager',
        ];
        template('manager/add', $data);
    }

    public function create()
    {
        $permissions = implode(",", $this->input->post('permissions'));
        // die($old_val);
        $data = [
            'first_name' => $this->input->post('first_name'),
            'email_id' => $this->input->post('email_id'),
            'password' => $this->input->post('password'),
            'permissions' => $permissions,
            //  'mobile' => $this->input->post('mobile'),
            //   'language' => $this->input->post('language'),
            //   'description' => $this->input->post('description'),
            //   'sort' => $this->input->post('serial_no'),
            //   'price' => $this->input->post('price'),
            //   'videos' => $video1,
            //   'image' => $image1,
        ];

        //echo "<pre>";print_r($data);exit;
        //   print_r($data);
        //   die('i m here');
        $InsertSetting = $this->Manager_model->create($data);
        if ($InsertSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Manager Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        $urls = 'backend/manager';
        redirect($urls);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Manager',
            'manager' => $this->Manager_model->updatemanager($id),
        ];

        template('manager/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        if (!empty($this->input->post('permissions'))) {
            $permissions = implode(",", $this->input->post('permissions'));
        } 
        if (!empty($this->input->post('password'))) {
            $data = [
                'sw_password' => md5($this->input->post('password')),
                'password' => $this->input->post('password'),
            ];
        }
        $data['first_name'] = $this->input->post('first_name');
        $data['email_id'] = $this->input->post('email_id');
        $data['permissions'] = $permissions;

        

        $UpdateSetting = $this->Manager_model->Update($data, $id);
        if ($UpdateSetting) {
            $this->session->set_flashdata('msg', array('message' => 'manager Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/manager';
        redirect($urls);
    }

    public function delete($id)
    {
        if ($this->Manager_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Manager Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    

    // public function permission()
    // {      

    //     $data = [
    //         'title' => 'Manager List',
    //         'Manager' => $this->Manager_model->List()
    //     ];
    //     // echo "<pre>";print_r($data);exit;
    //     // $data['SideBarbutton'] = ['backend/Manager/addmanager', 'Add Manager'];
    //     // $data['AddButton'] = ['backend/Manager/permission/', 'Permission'];
    //     template('Manager/permission', $data);
    // }
}
