<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the Chat_model
        $this->load->model('Chat_model');
        $this->load->model('Users_model');
    }

    public function index()
    {
        $id = '';
        $room_id = '';
        $data = [
            'title' => 'Chat History',
            'chat' => $this->Chat_model->view($id, $room_id),

        ];
        // print_r($data);
        // exit();
        //$this->load->view('chat/index', $data);
        template('chat/index', $data);
    }

    public function get_new_message_count($room_id)
    {
        $new_message_count = $this->Chat_model->get_unseen_message_count($room_id);

        // template('chat/index', $new_message_count);

         echo json_encode(['count' => $new_message_count]);
    }
    // public function get_new_message_count()
    // {
    //     $data = [
    //         'title' => 'Chat Users',
    //         'chat' => $this->Chat_model->get_chat_users_with_unseen_messages_count() // Assuming you have a method in your Chat_model to get chat users with unseen messages count
    //     ];
    //     print_r($data);
    //     exit();

    //     template('Chat/index', $data);
    // }




    public function chatbox($room_id)
{
    // Update the status to 1 in tbl_chat_history
    $this->Chat_model->update_status($room_id);

    // Fetch chat messages for the specified room_id
    $chat_messages = $this->Chat_model->messageUser($room_id);

    // Prepare data to pass to the chatbox view
    $data = [
        'title' => 'Chat box',
        'sendmessage' => $chat_messages,
        'room_id' => $room_id,
    ];

    // Load the chatbox view with the data
    template('chat/chatbox', $data);
}




    // public function sendmessage($room_id,$receiver_id)
    //     {
    //         if ($this->input->post('message')) {
    //             $message = $this->input->post('message');
    //             $data = array(
    //                 'room_id' => $room_id,
    //                 'sender_id' => 1,
    //                 'receiver_id' => $receiver_id, // Set the receiver_id with the desired user_id
    //                 'message' => $message,
    //             );
    //             // print_r($data);
    //             // die('i am here');
    //             $this->Chat_model->add($data);
    //             redirect('backend/chat/chatbox/' . $room_id);
    //         } else {
    //         }
    //     }

    public function sendmessage($room_id)
    {
        if ($this->input->post('message')) {
            $message = $this->input->post('message');
            $sender_id = 1;
            $this->load->model('Chat_model');
            $original_sender_id = $this->Chat_model->getOriginalSenderId($room_id);

            if ($original_sender_id === false) {
                redirect('backend/chat/chatbox/' . $room_id . '?error=original_sender_not_found');
                return;
            }

            $data = array(
                'room_id' => $room_id,
                'sender_id' => $sender_id,
                'receiver_id' => $original_sender_id,
                'message' => $message,
                'communicate' => 'receiver',
            );

            $this->Chat_model->add($data);
            redirect('backend/chat/chatbox/' . $room_id);
        } else {
            redirect('backend/chat/chatbox/' . $room_id . '?error=no_message');
        }
    }
    // public function sendMessage($room_id)
    // {
    //     $data = [
    //                 'sendmessage' => $chat_messages,
    //                 'current_user_id' => $current_user_id,
    //             ];

    //             // Load the chatbox view with the data
    //             $this->load->view('chat/chatbox', $data);
    // }

    // Function to get chat history from the API
    // public function get_chat_history() {
    //     $room_id = 1; // Replace with the actual room_id you want to fetch chat history for

    //     $response = $this->curl_request('chat/chat_history', 'POST', array('room_id' => $room_id));
    //     $chat_history = $response['chat_history'];

    //     // Now you have the chat history data, you can pass it to the view for display.
    //     $data['chat_history'] = $chat_history;
    //     $this->load->view('chat/index', $data);
    // }

    // // Function to send a message to the user
    // public function send_message() {
    //     $message = $this->input->post('message');
    //     $room_id = 1; // Replace with the actual room_id you want to send the message to
    //     $sender_id = 1; // Replace with the actual sender_id
    //     $receiver_id = 2; // Replace with the actual receiver_id

    //     $data = array(
    //         'room_id' => $room_id,
    //         'sender_id' => $sender_id,
    //         'receiver_id' => $receiver_id,
    //         'message' => $message,
    //         'communicate' => '1', // Assuming '1' represents a chat message
    //     );

    //     $response = $this->curl_request('chat/add', 'POST', $data);

    //     // After sending the message, you can handle the response as required.
    //     // For example, you can redirect back to the chat page or display a success message.
    //     redirect('admin_chat'); // Assuming you have a route named 'admin_chat' that points to this controller's index() method.
    // }

    // // Custom function to make HTTP requests to the API endpoints
    // private function curl_request($endpoint, $method = 'GET', $data = array()) {
    //     // Define the base URL of your API
    //     $base_url = 'http://your-api-base-url/';

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $base_url . $endpoint);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     if ($method === 'POST') {
    //         curl_setopt($ch, CURLOPT_POST, 1);
    //         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     }

    //     $response = curl_exec($ch);
    //     curl_close($ch);

    //     return json_decode($response, true);
    // }
}
