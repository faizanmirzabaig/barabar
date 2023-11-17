<?php

class Withdrawal extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'Withdrawal_model'
           
         ));

    }

    public function index()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $data = [
            'title' => 'Withdrawal Log',
            'Pending' => $this->Withdrawal_model->WithDrawal_list(0,$start_date, $end_date),
            'Approved' => $this->Withdrawal_model->WithDrawal_list(1,$start_date, $end_date),
            'Rejected' => $this->Withdrawal_model->WithDrawal_list(2,$start_date, $end_date)
        ];
        template('withdrawal/index', $data);
    }

    public function ChangeStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $reason = $this->input->post('reason');
        $Change = $this->Withdrawal_model->ChangeStatus($id, $status, $reason);
         if ($Change) {
            $data = ['msg' => 'Status Change Successfully','class' => 'success'];
        } else {
            $data = ['msg' => 'Something went to wrong','class' => 'error'];
        }
        echo json_encode($data);
    }
}
