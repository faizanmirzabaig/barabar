<?php
class AreaInterest extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Area_interest_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Area of Interest List',
            'AllAreaInterst' => $this->Area_interest_model->AllAreaInterest()
        ];
        $data['SideBarbutton'] = ['backend/AreaInterest/add', 'Add'];
        template('area_interest/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Area of Interest',
        ];
        template('area_interest/add', $data);
    }

    public function insert()
    {
       
        $area_interes_name = $this->input->post('area_interest_name');
        $data=[
            'name'=>$area_interes_name,
        ];
        $InsertAreaInterest = $this->Area_interest_model->Insert($data);
        if ($InsertAreaInterest) {
            $this->session->set_flashdata('msg', array('message' => 'Area of Interest Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/AreaInterest');
    }

    public function edit($id)
    {
        $data=[
            'title'=>'Edit Area of Interest',
            'AreaInterest'=>$this->Area_interest_model->getAreaInterst($id),
            ];
            template('area_interest/edit', $data);
    }

    public function update()
    {
       $data=[
        'name' => $this->input->post('area_interest_name'),
        'id'   => $this->input->post('id'),
       ];
       print_r($data);

        $UpdateHobby = $this->Area_interest_model->update($data);
        if ($UpdateHobby) {
            $this->session->set_flashdata('msg', array('message' => 'Area of Interest Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/AreaInterest');


    }

    public function delete($id)
    {
        if ($this->Area_interest_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Area of Interest Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/AreaInterest');
    }

}
