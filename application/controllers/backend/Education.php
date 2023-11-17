<?php
class Education extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Education_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Education List',
            'AllEducation' => $this->Education_model->AllEducationList()
        ];
        $data['SideBarbutton'] = ['backend/education/add', 'Add'];
        template('education/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Education',
        ];
        template('education/add', $data);
    }

    public function insert()
    {
       
        $education_name = $this->input->post('education_name');
        $data=[
            'name'=>$education_name,
        ];
        $InsertOccupation = $this->Education_model->Insert($data);
        if ($InsertOccupation) {
            $this->session->set_flashdata('msg', array('message' => 'Education Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/education');
    }

    public function edit($id)
    {
        $data=[
            'title'=>'Edit Education',
            'Education'=>$this->Education_model->getOccupation($id),
            ];
            template('education/edit', $data);
    }

    public function update()
    {
       $data=[
        'name' => $this->input->post('education_name'),
        'id'   => $this->input->post('id'),
       ];

        $UpdateEducation = $this->Education_model->update($data);
        if ($UpdateEducation) {
            $this->session->set_flashdata('msg', array('message' => 'Education Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/education');


    }

    public function delete($id)
    {
        if ($this->Education_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Education Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/education');
    }

}
