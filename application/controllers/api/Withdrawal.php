<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Withdrawal extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $header = $this->input->request_headers('token');

        if (!isset($header['Token'])) {
            $data['message'] = 'Invalid Request';
            $data['code'] = HTTP_UNAUTHORIZED;
            $this->response($data, HTTP_OK);
            exit();
        }

        if ($header['Token'] != getToken()) {
            $data['message'] = 'Invalid Authorization';
            $data['code'] = HTTP_METHOD_NOT_ALLOWED;
            $this->response($data, HTTP_OK);
            exit();
        }

        $this->load->model([
            'Withdrawal_model',
            'Users_model'
        ]);
    }

    public function Withdraw_post()
    {
        $user_id = $this->input->post('user_id');
        $amount = $this->input->post('amount');
        // $mobile = $this->input->post('mobile');
        if (empty($user_id)) {
            $data = [
                'message' => 'Invalid Param',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }
        $UserData = $this->Users_model->UserProfile($user_id);
        if (empty($UserData)) {
            $data = [
                'message' => 'Invalid User ID',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }

        // $RedeemData = $this->WithdrawalLog_model->getRedeem($redeem_id);
        // if (empty($RedeemData)) {
        //     $data = [
        //         'message' => 'Invalid Redeem ID',
        //         'code' => HTTP_NOT_FOUND,
        //     ];
        //     $this->response($data, HTTP_OK);
        // }

         if ($UserData->wallet < $amount)  {
            $data = [
                'message' => 'Insufficient Coins',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }
        $WithDraw = $this->Withdrawal_model->WithDraw($UserData->id,$amount);
        if ($WithDraw) {
            $data = [
                'message' => 'Thank You Successfully Withdrawn',
                'code' => HTTP_OK,
            ];
            $this->response($data, HTTP_OK);
        } else {
            $data = [
                'message' => 'Something Went Wrong',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }
    }

    public function WithDrawal_log_post()
    {
        $user_id = $this->input->post('user_id');
        if (empty($user_id)) {
            $data = [
                'message' => 'Invalid Param',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }
        $UserData = $this->Users_model->UserProfile($user_id);
        if (empty($UserData)) {
            $data = [
                'message' => 'Invalid User ID',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }
        $Log = $this->Withdrawal_model->UserWithdrawalLog($user_id);
        if ($Log) {
            $data = [
                'List' => $Log,
                'message' => 'Success',
                'code' => HTTP_OK,
            ];
            $this->response($data, HTTP_OK);
        } else {
            $data = [
                'message' => 'No WithDrawal Log Available',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }
    }
    }
