<?php
class Hobby extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hobby_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Hobby List',
            'AllHobby' => $this->Hobby_model->AllHobbyList()
        ];
        $data['SideBarbutton'] = ['backend/hobby/add', 'Add'];
        template('hobby/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Hobby',
        ];
        template('hobby/add', $data);
    }

    public function insert()
    {
       
        $hobby_name = $this->input->post('hobby_name');
        $data=[
            'name'=>$hobby_name,
        ];
        $InsertHobby = $this->Hobby_model->Insert($data);
        if ($InsertHobby) {
            $this->session->set_flashdata('msg', array('message' => 'Hobby Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/hobby');
    }

    public function edit($id)
    {
        $data=[
            'title'=>'Edit hobby',
            'Hobby'=>$this->Hobby_model->getHobby($id),
            ];
            template('hobby/edit', $data);
    }

    public function update()
    {
       $data=[
        'name' => $this->input->post('hobby_name'),
        'id'   => $this->input->post('id'),
       ];

        $UpdateHobby = $this->Hobby_model->update($data);
        if ($UpdateHobby) {
            $this->session->set_flashdata('msg', array('message' => 'Hobby Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/hobby');


    }

    public function delete($id)
    {
        if ($this->Hobby_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Hobby Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/hobby');
    }

}
