<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Notepad extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $header = $this->input->request_headers('token');
        $this->load->model([
            'Notepad_model',
            'Users_model',
        ]);
       
    }

    public function list_post()
    {
        $post_data['user_id'] = $this->input->post('user_id');

        if(empty_param($post_data))
        {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        $user = $this->Users_model->UserProfile($post_data['user_id']);
        if (empty($user)) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $list = $this->Notepad_model->View('',$post_data['user_id']);
        if($list){
            $data['message'] = 'Success';
            $data['code'] = HTTP_OK;
            $data['list'] = $list;

            $this->response($data, HTTP_OK);
            exit();
          }
          else{
              $data['message'] = 'Notes not found';
              $data['code'] = 404;
              $this->response($data, HTTP_OK);
            exit();
          }
    }

    public function add_post()
    {
        $post_data['user_id'] = $this->input->post('user_id');
        $post_data['title'] = $this->input->post('title');
        $post_data['description'] = $this->input->post('description');

        if(empty_param($post_data))
        {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        $user = $this->Users_model->UserProfile($post_data['user_id']);
        if (empty($user)) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $inserted_id = $this->Notepad_model->insert($post_data);
        if($inserted_id){
            $data['message'] = 'Success';
            $data['code'] = HTTP_OK;
            $data['inserted_id'] = $inserted_id;

            $this->response($data, HTTP_OK);
            exit();
          }
          else{
              $data['message'] = 'Something Wents Wrong';
              $data['code'] = 404;
              $this->response($data, HTTP_OK);
            exit();
          }
    }

    public function edit_post()
    {
        $post_data['user_id'] = $this->input->post('user_id');
        $post_data['id'] = $this->input->post('note_id');
        $post_data['title'] = $this->input->post('title');
        $post_data['description'] = $this->input->post('description');

        if(empty_param($post_data))
        {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        $user = $this->Users_model->UserProfile($post_data['user_id']);
        if (empty($user)) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $inserted_id = $this->Notepad_model->Update($post_data);
        // print_r($inserted_id);
        // die('i am here');
        if($inserted_id){
            $data['message'] = 'Success';
            $data['code'] = HTTP_OK;
            $data['inserted_id'] = $inserted_id;

            $this->response($data, HTTP_OK);
            exit();
          }
          else{
              $data['message'] = 'Something Wents Wrong';
              $data['code'] = 404;
              $this->response($data, HTTP_OK);
            exit();
          }
    }

    public function delete_post()
    {
        $post_data['user_id'] = $this->input->post('user_id');
        $post_data['note_id'] = $this->input->post('note_id');

        if(empty_param($post_data))
        {
            $data['message'] = 'Parameter Missing';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        }

        $user = $this->Users_model->UserProfile($post_data['user_id']);
        if (empty($user)) {
            $data['message'] = 'Invalid User';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }

        $deleted = $this->Notepad_model->delete($post_data['note_id']);
        if($deleted){
            $data['message'] = 'Success';
            $data['code'] = HTTP_OK;

            $this->response($data, HTTP_OK);
            exit();
          }
          else{
              $data['message'] = 'Something Wents Wrong';
              $data['code'] = 404;
              $this->response($data, HTTP_OK);
            exit();
          }
    }

}
