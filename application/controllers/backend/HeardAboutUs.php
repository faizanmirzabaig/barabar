<?php
class HeardAboutUs extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Heard_about_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Heared About Us List',
            'AllHeardAboutUs' => $this->Heard_about_model->AllHeardAboutUs()
        ];
        $data['SideBarbutton'] = ['backend/HeardAboutUs/add', 'Add'];
        template('heard_about_us/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Heard About Us',
        ];
        template('heard_about_us/add', $data);
    }

    public function insert()
    {
       
        $heard_about_us_name = $this->input->post('heard_about_us_name');
        $data=[
            'name'=>$heard_about_us_name,
        ];
        $InsertHeardAboutUs = $this->Heard_about_model->Insert($data);
        if ($InsertHeardAboutUs) {
            $this->session->set_flashdata('msg', array('message' => 'Heard About Us Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/HeardAboutUs');
    }

    public function edit($id)
    {
        $data=[
            'title'=>'Edit Heard About Us',
            'HeardAboutUs'=>$this->Heard_about_model->getHeardAboutUs($id),
            ];
            template('heard_about_us/edit', $data);
    }

    public function update()
    {
       $data=[
        'name' => $this->input->post('heard_about_us_name'),
        'id'   => $this->input->post('id'),
       ];

        $UpdateHeardAboutUs = $this->Heard_about_model->update($data);
        if ($UpdateHeardAboutUs) {
            $this->session->set_flashdata('msg', array('message' => 'Heard About Us Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/HeardAboutUs');


    }

    public function delete($id)
    {
        if ($this->Heard_about_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Heard About Us Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/HeardAboutUs');
    }

}
