<?php

use Restserver\Libraries\REST_Controller;
use Razorpay\Api\Api;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Order extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $header = $this->input->request_headers('token');

        if (!isset($header['token'])) {
            $data['message'] = 'Invalid Request';
            $data['code'] = HTTP_UNAUTHORIZED;
            $this->response($data, HTTP_OK);
            exit();
        }

        if ($header['token'] != getToken()) {
            $data['message'] = 'Invalid Authorization';
            $data['code'] = HTTP_METHOD_NOT_ALLOWED;
            $this->response($data, HTTP_OK);
            exit();
        }
        
        $this->load->model([
            'Users_model',
            'Order_model',
            'Admin_model',
            'Offer_model'
        ]);
    }

    public function cart_post()
    {
        $user_id = $this->input->post('user_id');
        
        if(empty_param(array($user_id)))
        {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        if (empty($this->Users_model->UserProfile($user_id))) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $cart = $this->Order_model->cart($user_id);
        
        $amount = 0;
        foreach ($cart as $k => $val) {
            $amount += $val->price * $val->quantity;
        }

        $data = [
            'List' => $cart,
            'amount' => $amount,
            'message' => 'Success',
            'code' => HTTP_OK,
        ];
        $this->response($data, HTTP_OK);
    }

    public function my_order_post()
    {
        $user_id = $this->input->post('user_id');
        
        if(empty_param(array($user_id)))
        {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        if (empty($this->Users_model->UserProfile($user_id))) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $order = $this->Order_model->MyOrder($user_id);

        $order_data = array();
        foreach ($order as $key => $value) {
            $order_data[$key] = $value;
            // echo $value->id;
            $order_data[$key]->product = $this->Order_model->GetProductByOrder($value->id);
        }
        
        $data = [
            'List' => $order,
            'message' => 'Success',
            'code' => HTTP_OK,
        ];
        $this->response($data, HTTP_OK);
    }

    public function add_to_cart_post()
    {
        $user_id = $this->input->post('user_id');
        $product_id = $this->input->post('product_id');
        
        if(empty_param(array($user_id,$product_id)))
        {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        if (empty($this->Users_model->UserProfile($user_id))) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $product = $this->Product_model->View($product_id);
        if (empty($product)) {
            $data['message'] = 'Invalid Product';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $cart_data = [
            'user_id' => $this->input->post('user_id'),
            'product_id' => $this->input->post('product_id'),
            'quantity' => 1,
            'added_date' => date('Y-m-d H:i:s')
        ];

        $this->Order_model->AddToCart($cart_data);
        $cart = $this->Order_model->cart($this->input->post('user_id'));
        $data['message'] = 'Added to cart';
        $data['code'] = HTTP_OK;
        $data['cart_count'] = count($cart);
        $this->response($data, HTTP_OK);
        exit();
        
    }

    public function remove_cart_post()
    {
        $user_id = $this->input->post('user_id');
        $product_id = $this->input->post('product_id');
        
        if(empty_param(array($user_id,$product_id)))
        {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        if (empty($this->Users_model->UserProfile($user_id))) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $cart_data = [
            'user_id' => $this->input->post('user_id'),
            'product_id' => $this->input->post('product_id')
        ];

        $this->Order_model->RemoveCart($cart_data);
        $cart = $this->Order_model->cart($this->input->post('user_id'));
        $data['message'] = 'Removed from cart';
        $data['code'] = HTTP_OK;
        $data['cart_count'] = count($cart);
        $this->response($data, HTTP_OK);
        exit();
        
    }

    public function place_order_Post()
    {
        $user_id = $this->input->post('user_id');
        $course_id = $this->input->post('course_id');
        $payment_method = $this->input->post('payment_method');
        $promocode = $this->input->post('coupon_code');
        $name = $this->input->post('name');
        $sb_amount = '';        
        $sb_charge = '';
        $landmark = "";
        $flat = "";
        $street = "";
        $locality = "";
        $pincode = "";
        $amount  = $this->input->post('amount');

        if (empty($user_id) || empty($name)) {
            $data['message'] = 'Invalid Params';
            $data['code'] = HTTP_BLANK;
            $this->response($data, 200);
            exit();
        }

        if (empty($this->Users_model->UserProfile($user_id))) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        /*$cart = $this->Order_model->cart($user_id);

        if (!$cart) {
            $data['message'] = 'Cart is Empty';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }*/
        //$offer_amt = 0;
        $offer = '';
        if (!empty($promocode)) {
            $offer = $this->Offer_model->getOfferByCode($promocode);
            if($offer)
            {
                if(strtotime($offer->valid_form)<time() && strtotime($offer->valid_till)>time())
                {
                    $orders = $this->Order_model->MyPromoOrder($user_id,$promocode);
                    //$offer_amt = $offer->amount;
                    /*if(count($orders)>=$offer->use_per_user)
                    {
                        $data['message'] = 'Coupon Code Redeemed Maximum Times';
                        $data['code'] = HTTP_BLANK;
                        $this->response($data, 200);
                        exit();
                    }*/
                }
                else
                {
                    $data['message'] = 'Coupon Code Expired';
                    $data['code'] = HTTP_BLANK;
                    $this->response($data, 200);
                    exit();
                }
            }
            else
            {
                $data['message'] = 'Invalid Offer';
                $data['code'] = HTTP_BLANK;
                $this->response($data, 200);
                exit();
            }
        }

        if(!empty($promocode)){

        }else{
            $promocode = '';
        }

        $order_data = [
            'user_id' => $user_id,
            'name' => $name,
            'landmark' => $landmark,
            'flat' => $flat,
            'street' => $street,
            'course_id' => $course_id,
            'locality' => $locality,
            'pincode' => $pincode,
            'promocode' => $promocode,
            'added_date' => date('Y-m-d H:i:s')
        ];

        $order_id = $this->Order_model->PlaceOrder($order_data);
        if (empty($order_id)) {
            $data['message'] = 'Error while Creating Order';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        /*foreach ($cart as $k => $val) {
            $amount += $val->price * $val->quantity;
            $this->Order_model->CartToOrder($order_id,$val->product_id,$val->price,$val->quantity);
        }*/
        // create ORder in razor pay
        $final_amount = $amount;
        $discount = 0;
        $coupounA = '';
        if($offer)
        {
            $discount = ($amount * $offer->amount)/100;
            $final_amount = $amount - $discount;
            $coupounA = $offer->amount;
        }
        $final_amount = round($final_amount,0);

        if($payment_method=='COD')
        {
            $Update_Order_Master = $this->Order_model->UpdateOrderCOD($user_id, $order_id, $final_amount, $amount,$discount);
            $this->Order_model->EmptyCart($user_id);
        }
        else
        {

            $this->db->select('*');
            $this->db->from('tbl_users');     
            $this->db->where('tbl_users.id', $user_id);
            $Q = $this->db->get();
            $num_r = $Q->num_rows();
            if($num_r > 0){

              $res = $Q->row();
              $current_balance = $res->wallet;
              if($current_balance >= $final_amount){
                  $final_amount1 = $current_balance - $final_amount;

                  $arrData = array('wallet'=>$final_amount1);
                  //$this->db->where('id', $user_id);
                  //$this->db->update('tbl_users',$arrData);
                  $final_amount = $final_amount;

                $data['Wallet_Status'] = 1;
              }else{
                $final_amount1 = $final_amount - $current_balance;

                  $arrData = array('wallet'=>0);
                  //$this->db->where('id', $user_id);
                  //$this->db->update('tbl_users',$arrData);
                  $final_amount = $final_amount1;
                  $data['Wallet_Status'] = 0;
              }


            }
            $RazorPay_order = $this->RazorPay_order($order_id, $final_amount);
            $Update_Order_Master = $this->Order_model->UpdateOrder($user_id, $order_id, $final_amount, $amount,$discount, $RazorPay_order->id,$coupounA);
        }
        
        if ($Update_Order_Master) {
            $data['order_id'] = $order_id;
            $data['Main_Amount'] = $amount;
            $data['Discount'] = $discount;
            $data['Total_Amount'] = $final_amount;
            if($payment_method!='COD')
            {
                $data['RazorPay_ID'] = $RazorPay_order->id;
            }

            $fcm = $this->Admin_model->AdminFcm();

            if(!empty($fcm))
            {
                $data['msg'] = "New Order Came";
                $data['title'] = "New Order Came At ".date('h:i A');
                push_notification_android($fcm,$data);
            }
            
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

    public function RazorPay_order($Order_ID, $Amount)
    {
        $api = new Api(API_KEY, API_SECRET);
        $order = $api->order->create(
            array(
                'receipt' => $Order_ID,
                'amount' => ($Amount * 100),
                'payment_capture' => 0,
                'currency' => 'INR'
            )
        );
        return $order;
    }

    public function pay_now_post()
    {
        $user_id = $this->input->post('user_id');
        $order_id = $this->input->post('order_id');
        $Payment_ID = $this->input->post('payment_id');
        
        if (empty($user_id) || empty($order_id)  || empty($Payment_ID)) {
            $data['message'] = 'Invalid Params';
            $data['code'] = HTTP_BLANK;
            $this->response($data, 200);
            exit();
        }

        if (empty($this->Users_model->UserProfile($user_id))) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $order = $this->Order_model->view($order_id);
        if (empty($order)) {
            $data['message'] = 'Invalid Order ID';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $api = new Api(API_KEY, API_SECRET);
        try {
            $payment = $api->payment->fetch($Payment_ID);
        } catch (\Exception $e) {
            // print_r($e);
            $data['message'] = 'Invalid Payment Id';
            $data['code'] = HTTP_UNAUTHORIZED;
            $this->response($data, 200);
            exit();
        }

        if ($payment) {
            $R_Order_ID = $payment->order_id;

            if ($order->razorpay_order_id != $R_Order_ID) {
                $data['message'] = 'Invalid Order Data';
                $data['code'] = HTTP_NOT_ACCEPTABLE;
                $this->response($data, 200);
                exit();
            }
            if ($payment->status = 'authorized') {
                //     //Update Payment 
                $final_amount = round($order->final_amount,0);
                $payment->capture(array('amount' => ($final_amount * 100), 'currency' => 'INR'));
                $this->Order_model->EmptyCart($user_id);
                $this->Order_model->UpdateOrderPayment($order->id);

                $fcm = $this->Admin_model->AdminFcm();

                if(!empty($fcm))
                {
                    $data['msg'] = "New Order Came";
                    $data['title'] = "New Order Came At ".date('h:i A');
                    push_notification_android($fcm,$data);
                }
                
                $data['message'] = 'Success';
                $data['code'] = HTTP_OK;
                $this->response($data, 200);
                exit();
            } else {
                $data['message'] = 'Invalid Payment';
                $data['code'] = HTTP_NOT_FOUND;
                $this->response($data, 200);
                exit();
            }
        }
    }
}
