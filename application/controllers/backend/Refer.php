<?php
class Refer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Refer_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Refer And Earn',
            'AllRefer' => $this->Refer_model->AllReferList()
        ];
       // $data['SideBarbutton'] = ['backend/refer/add', 'Add'];
        template('refer/index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Add Refer',
        ];
        template('refer/add', $data);
    }

    public function insert()
    {
        $amount = $this->input->post('amount');
        
        $InsertBanner = $this->Banner_model->Insert($amount);
        if ($InsertBanner) {
            $this->session->set_flashdata('msg', array('message' => 'Refer Amount Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/refer');
    }

    public function edit($id)
    {
        $data=[
            'title'=>'Edit Refer And Earn',
            'Refer'=>$this->Refer_model->getRefer($id),
            ];
        $this->form_validation->set_rules('amount','Amount','required');
        if($this->form_validation->run()== false)
            template('refer/edit', $data);
    }

    public function update()
    {
        $id=$this->input->post('id');
        // print_r($Banner_id); exit;
        $amount = $this->input->post('amount');
        
        $UpdateBanner = $this->Refer_model->update($id,$amount);
        if ($UpdateBanner) {
            $this->session->set_flashdata('msg', array('message' => 'Refer Amount Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/refer');


    }



    public function delete($id)
    {
        if ($this->Refer_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Refer Amount Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/refer');
    }
}
