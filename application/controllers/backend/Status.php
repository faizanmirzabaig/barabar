<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Course_model');
        $this->load->model('Creator_Purchase_model');
    }

    public function index()
    {
        // print_r($this->session->userdata('admin_id'));
        //         die('i n heer');
        // print_r($_REQUEST);
        // exit;
        $status = $this->input->post('status');
        // print_r($this->input->post());
        // die($status);

        log_message('debug', 'Status: ' . $status);
        // if (empty($status)) {
        //     redirect('backend/Course');
        // }
        $creator_id = $this->input->post('udf1');
        // print_r($creator_id);
        $firstname = $this->input->post('firstname');
        $amount = $this->input->post('amount');
        $txnid = $this->input->post('txnid');
        $posted_hash = $this->input->post('hash');
        $field9 = $this->input->post('field9');
        log_message('debug', 'Response Hash: ' . $posted_hash);
        $key = $this->input->post('key');
        $productinfo = $this->input->post('productinfo');
        $email = $this->input->post('email');
        $salt = SALT; //  Your salt
        $add = $this->input->post('additionalCharges');
        if (isset($add)) {
            $additionalCharges = $this->input->post('additionalCharges');
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {
            $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $data['creator_id'] = $creator_id;
        $data['hash'] = hash("sha512", $retHashSeq);
        $data['amount'] = $amount;
        $data['txnid'] = $txnid;
        $data['posted_hash'] = $posted_hash;
        $data['status'] = $status;
        $data['field9'] = $field9;
        // print_r($data);
        // exit;
        if ($status == 'success') {
            $this->Course_model->ChangeStatusSucces($txnid);
            $this->Creator_Purchase_model->InsertCreatorPurchase($data);
            $this->load->view('pay_u_money/success', $data);
        } else {
            $data['title'] = 'failure';
            template('pay_u_money/failure', $data);
        }
    }
}
