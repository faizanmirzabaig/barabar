<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Chat extends REST_Controller
{
    private $UserData;
    private $UserId;
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

        $this->data = $this->input->post();

        $this->load->model([
            'Chat_model',
            'Users_model',
            'BotQues_model'
        ]);
    }

    public function add_chat_post()
    {
        $room_id = $this->input->post('room_id');
        $sender_id = $this->input->post('sender_id');
        $receiver_id = $this->input->post('receiver_id');
        $message = $this->input->post('message');
       $communicate = $this->input->post('communicate');
        if(empty_param(array($room_id, $sender_id, $receiver_id, $message,$communicate)))
        {
            $response['message'] = 'Parameter Missing';
            $response['code'] = HTTP_NOT_FOUND;
            $this->response($response, HTTP_OK);
            exit();
        }

        $data = [
            'room_id' => $room_id,
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'message' => $message,
            'communicate' => $communicate,
        ];

        $inserted_id = $this->Chat_model->add($data);
        
        if($inserted_id)
        {     
            $response['history_id'] = $inserted_id;
            $response['message'] = 'Success';
            $response['code'] = HTTP_OK;
            $this->response($response, HTTP_OK);
            exit();
        }
        else
        {
            $response['message'] = 'No Found';
            $response['code'] = HTTP_NOT_FOUND;
            $this->response($response, HTTP_OK);
            exit();
        }
    }

    public function chat_history_post()
    {
        $room_id = $this->input->post('room_id');
        if(empty_param(array($room_id)))
        {
            $response['message'] = 'Parameter Missing';
            $response['code'] = HTTP_NOT_FOUND;
            $this->response($response, HTTP_OK);
            exit();
        }

        $chat_history = $this->Chat_model->messageUser($room_id);
        // print_r($chat_history);
        // die('i am here');
        
        if($chat_history)
        {     
            $response['chat_history'] = $chat_history;
            $response['message'] = 'Success';
            $response['code'] = HTTP_OK;
            $this->response($response, HTTP_OK);
            exit();
        }
        else
        {
            $response['message'] = 'No Found';
            $response['code'] = HTTP_NOT_FOUND;
            $this->response($response, HTTP_OK);
            exit();
        }
    }

    public function get_room_id_post()
    {
        $user_id = $this->input->post('user_id');
       // $product_id = $this->input->post('product_id');
        $vendor_id = $this->input->post('vendor_id');
        if(empty_param(array($user_id, $vendor_id)))
        {
            $response['message'] = 'Parameter Missing';
            $response['code'] = HTTP_NOT_FOUND;
            $this->response($response, HTTP_OK);
            exit();
        }

        $UserData = $this->Users_model->UserProfile($user_id);
        if(empty(array($UserData)))
        {
            $response['message'] = 'User not exists';
            $response['code'] = HTTP_NOT_FOUND;
            $this->response($response, HTTP_OK);
            exit();
        }

        // $ProductData = $this->Product_model->ProductProfile($product_id);
        // if(empty(array($ProductData)))
        // {
        //     $response['message'] = 'Product not exists';
        //     $response['code'] = HTTP_NOT_FOUND;
        //     $this->response($response, HTTP_OK);
        //     exit();
        // }

        // $VendorData = $this->Vendors_model->VendorDetails($vendor_id);
        // if(empty(array($VendorData)))
        // {
        //     $response['message'] = 'Vendor not exists';
        //     $response['code'] = HTTP_NOT_FOUND;
        //     $this->response($response, HTTP_OK);
        //     exit();
        // }

        $inserted_id = $this->Chat_model->get_room_id($user_id, $vendor_id);
        
        if($inserted_id)
        {     
            $response['room_id'] = $inserted_id;
            $response['message'] = 'Success';
            $response['code'] = HTTP_OK;
            $this->response($response, HTTP_OK);
            exit();
        }
        else
        {
            $response['message'] = 'No Found';
            $response['code'] = HTTP_NOT_FOUND;
            $this->response($response, HTTP_OK);
            exit();
        }
    }


    public function Bot_chat_post()
    {
        // $room_id = $this->input->post('room_id');
        // $user_id = $this->input->post('user_id');
        // $question_id = $this->input->post('question_id');
        // if(empty_param(array($user_id)))
        // {
        //     $response['message'] = 'Parameter Missing';
        //     $response['code'] = HTTP_NOT_FOUND;
        //     $this->response($response, HTTP_OK);
        //     exit();
        // }

        $Bot_Chat = $this->BotQues_model->View();
        // print_r($chat_history);
        // die('i am here');
        
        if($Bot_Chat)
        {     
            $response['Bot_chat_history'] = $Bot_Chat;
            $response['message'] = 'Success';
            $response['code'] = HTTP_OK;
            $this->response($response, HTTP_OK);
            exit();
        }
        else
        {
            $response['message'] = 'No Found';
            $response['code'] = HTTP_NOT_FOUND;
            $this->response($response, HTTP_OK);
            exit();
        }
    }

    
}
