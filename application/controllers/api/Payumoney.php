<?php
use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Payumoney extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Users_model');
        $this->load->model('Coin_plan_model');
        $this->load->model('Setting_model');
    }

    public function call_back_post()
    {
      // $POST
        $txnid = $this->input->post('txnid');
        $status = $this->input->post('status');
        $amount = $this->input->post('amount');

        if (empty($status) || empty($txnid)) {
            $data['message'] = 'Invalid Params';
            $data['code'] = HTTP_BLANK;
            $this->response($data, 200);
            exit();
        }

        $CheckTicket = $this->Coin_plan_model->GetUserByOrderTxnId($txnid);
        // print_r($CheckTicket);
        if (empty($CheckTicket)) {
            $data['message'] = 'Invalid Ticket ID';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }
        // $user = $this->Users_model->UserProfile($CheckTicket['user_id']);
        $user = $this->Users_model->UserProfile($CheckTicket[0]->user_id);
        if (empty($user)) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        if ($status == "success") {
            // $setting = $this->Setting_model->Setting();
            // echo $CheckTicket[0]->price;
            if ($CheckTicket[0]->price == $amount) {
                $this->Coin_plan_model->UpdateOrderPaymentStatus($CheckTicket[0]->id);
                $this->Users_model->UpdateWalletOrder($CheckTicket[0]->price, $CheckTicket[0]->user_id);


                // for ($i = 1; $i <= 3; $i++) {
                //     if ($user->referred_by != 0) {
                //         $level = 'level_' . $i;
                //         $coins = (($CheckTicket->coin * $i) / 100);  // Use $i directly as the level
                //         $this->Users_model->UpdateWalletOrder($coins, $user[0]->referred_by);
                
                //         $log_data = [
                //             'user_id' => $user[0]->referred_by,
                //             'purchase_id' => $order_id,
                //             'purchase_user_id' => $user_id,
                //             'coin' => $coins,
                //             'level' => $i,
                //         ];
                
                //         $this->Users_model->AddPurchaseReferLog($log_data);
                //         $user = $this->Users_model->UserProfile($user[0]->referred_by);
                //     } else {
                //         break;
                //     }
                // }
                

                echo '<html>
                <head>
                  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
                </head>
                  <style>
                    body {
                      text-align: center;
                      padding: 40px 0;
                      background: #EBF0F5;
                    }
                      h1 {
                        color: #88B04B;
                        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                        font-weight: 900;
                        font-size: 40px;
                        margin-bottom: 10px;
                      }
                      p {
                        color: #404F5E;
                        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                        font-size:20px;
                        margin: 0;
                      }
                    i {
                      color: #9ABC66;
                      font-size: 100px;
                      line-height: 200px;
                      margin-left:-15px;
                    }
                    .card {
                      background: white;
                      padding: 60px;
                      border-radius: 4px;
                      box-shadow: 0 2px 3px #C8D0D8;
                      display: inline-block;
                      margin: 0 auto;
                    }
                  </style>
                  <body>
                    <div class="card">
                    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                      <i class="checkmark">✓</i>
                    </div>
                      <h1>Success</h1> 
                      <p>We received your purchase Successfully;<br/> Payment Added In Wallet!</p>
                    </div>
                  </body>
              </html>';
            // $data['message'] = 'Success';
                // $data['code'] = HTTP_OK;
                // $this->response($data, 200);
                // exit();
            } else {
                $data['message'] = 'Invalid Payment';
                $data['code'] = HTTP_NOT_FOUND;
                $this->response($data, 200);
                exit();
            }
        } else {
            $data['message'] = 'Invalid Payment';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, 200);
            exit();
        }
    }

    public function payumoney_token_api_Post()
    {
        $user_id = $this->input->post('user_id');

        // if (!$this->Users_model->TokenConfirm($this->data['user_id'], $this->data['token'])) {
        //     $data['message'] = 'Invalid User';
        //     $data['code'] = HTTP_INVALID;
        //     $this->response($data, HTTP_OK);
        //     exit();
        // }

        // $plan_id = $this->input->post('plan_id');
         $amount = $this->input->post('amount');

        if (empty($user_id) || empty($amount)) {
            $data['message'] = 'Invalid Params';
            $data['code'] = HTTP_BLANK;
            $this->response($data, 200);
            exit();
        }

        $user_data = $this->Users_model->UserProfile($user_id);
        if (empty($user_data)) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        // $plan = $this->Coin_plan_model->View($plan_id);
        // if (empty($plan)) {
        //     $data['message'] = 'Invalid Plan';
        //     $data['code'] = HTTP_NOT_ACCEPTABLE;
        //     $this->response($data, 200);
        //     exit();
        // }

        // $Amount = $plan->price;             //Product Amount While the Time OF Order

        $Order_ID = $this->Coin_plan_model->GetCoin($user_id, $amount);

        if (empty($Order_ID)) {
            $data['message'] = 'Error while Creating Ticket';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }
        // create ORder in razor pay
        // $RazorPay_order = $this->RazorPay_order($Order_ID, $Amount);
        $txn_id = uniqid().$Order_ID;
        $paytm_body['orderId'] = $txn_id;
        // $paytm_body['plan_id'] = $plan_id;
        $paytm_body['name'] = $user_data->name;
        $paytm_body['email'] = ($user_data->email) ? $user_data->email : 'support@androappstech.com';
        $paytm_body['mobile'] = $user_data->mobile;
        $paytm_body['amount'] = number_format($amount, 1);

        // $payumoney_token = $this->payumoney_salt($paytm_body);
        $Update_Order_Master = $this->Coin_plan_model->UpdateOrder($user_id, $Order_ID, $txn_id);

        if ($Update_Order_Master) {
            $data['order_id'] = $txn_id;
            $data['Total_Amount'] = $amount;
            // $data['payumoney_token'] = $payumoney_token['hash'];
            // $data['payumoney_string'] = $payumoney_token['string'];
            $data['payumoney_body'] = $paytm_body;
            $data['message'] = 'Success';
            $data['code'] = HTTP_OK;
            $this->response($data, 200);
            exit();
        } else {
            $data['message'] = 'Technical Error';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }
    }
    
    public function payumoney_salt_post()
    {
        // $setting = $this->Setting_model->Setting();
        // $paytmParams = array();

        $hash_data = $this->input->post('hash_data');
        // $product_info = $data['plan_id'];
        // $customer_name = $data['name'];
        // $customer_email = $data['email'];
        // $customer_mobile = $data['mobile'];
        // $customer_address = $data['email'];

        // //payumoney details


        // $MERCHANT_KEY = $setting->payumoney_key; //change  merchant with yours
        $SALT = PAYUMONEY_SALT;  //change salt with yours

        // $txnid = $data['orderId'];
        // // $txnid = uniqid().md5($data['orderId']);
        // //optional udf values
        // $udf1 = '';
        // $udf2 = '';
        // $udf3 = '';
        // $udf4 = '';
        // $udf5 = '';

        // $return['string'] = $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
        // $return['string'] = $hashstring = $MERCHANT_KEY . '|payment_related_details_for_mobile_sdk|'.$customer_email.'|' . $SALT;
        // $return['hash'] = strtolower(hash('sha512', $hashstring));
        // return $return;

        if ($hash_data) {
            $data['payumoney_hash'] = strtolower(hash('sha512', ($hash_data . $SALT)));
            $data['hash_data']=$hash_data;
            $data['message'] = 'Success';
            $data['code'] = HTTP_OK;
            $this->response($data, 200);
            exit();
        } else {
            $data['message'] = 'hash data empty';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }
    }

}