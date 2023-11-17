<?php
class Purchase extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Purchase_model','Users_model'));

    }

    public function index()
    {
        $data = [
            'title'=> 'Purchase History',
            'purchase' => $this->Purchase_model->PurchaseList(),
        ];
        // print_r($data);
        // exit();

        template('purchase/index',$data);
    }

}