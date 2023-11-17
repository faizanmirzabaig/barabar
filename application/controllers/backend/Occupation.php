<?php
class Occupation extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Occupation_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Occupation List',
            'AllOccupation' => $this->Occupation_model->AllOccupationList()
        ];
        $data['SideBarbutton'] = ['backend/occupation/add', 'Add'];
        template('occupation/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Occupation',
        ];
        template('occupation/add', $data);
    }

    public function insert()
    {
       
        $occupation_name = $this->input->post('occupation_name');
        $data=[
            'name'=>$occupation_name,
        ];
        $InsertOccupation = $this->Occupation_model->Insert($data);
        if ($InsertOccupation) {
            $this->session->set_flashdata('msg', array('message' => 'Occupation Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/occupation');
    }

    public function edit($id)
    {
        $data=[
            'title'=>'Edit occupation',
            'Occupation'=>$this->Occupation_model->getOccupation($id),
            ];
            template('occupation/edit', $data);
    }

    public function update()
    {
       $data=[
        'name' => $this->input->post('occupation_name'),
        'id'   => $this->input->post('id'),
       ];

        $UpdateOccupation = $this->Occupation_model->update($data);
        if ($UpdateOccupation) {
            $this->session->set_flashdata('msg', array('message' => 'Occupation Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/occupation');


    }

    public function delete($id)
    {
        if ($this->Occupation_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Occupation Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Occupation');
    }

}
