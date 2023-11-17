<?php
class Notification extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Notification_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Notification Management',
            'AllNotification' => $this->Notification_model->AllNotificationList(),
        ];
        $data['SideBarbutton'] = ['backend/notification/add', 'Add Notification'];
        template('notification/list', $data);
    }
    
    public function add()
    {
        $data = [
            'title' => 'Add Notification',
        ];
        template('notification/add', $data);
    }

    public function insert()
    {
        $name = $this->input->post('name');
        
        $InsertNotification = $this->Notification_model->Insert($name);
        if ($InsertNotification) {

            $this->session->set_flashdata('msg', array('message' => 'Notification Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/notification');
        
    }

    public function edit($id)
    {
        $id=$this->url_encrypt->decode($id);
        $data = [
            'title' => 'Edit Notification',
            'NotificationView' => $this->Notification_model->View($id),
        ];  
        template('notification/edit', $data);
    }

    public function update($id)
    {
        $name = $this->input->post('name');
        
        $id=$this->url_encrypt->decode($id);

        $UpdateNotification = $this->Notification_model->Update($id,$name);
        if ($UpdateNotification) {
            $this->session->set_flashdata('msg', array('message' => 'Notification Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/notification');
    }

    public function delete($id)
    {
        $id=$this->url_encrypt->decode($id);
        if ($this->Notification_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Notification Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/notification');
    }

}
