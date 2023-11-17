<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();      
        $this->load->model(array(
            'Auth_model',
            'Area_interest_model',
            'Heard_about_model',
            'Hobby_model',
            'Occupation_model',
            'Education_model',
         ));
        
    }

    // public function login() {
    //     $data['title'] = 'Sign In';
    //     $this->load->view('login', $data);
    // }

    
    public function index()
{
    if ($this->session->userdata('logged_in')) {
        redirect('backend/dashboard');
    }

    $data['title'] = 'Sign In';

    if ($this->form_validation->run('login') === FALSE) {
        $this->load->view('login', $data);
    } else {
        // die(' form submit');
        $username = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $data = $this->Auth_model->login($username, $password);
        // print_r($data);
        // die();
        if ($data) {
            if ($data->status == 0) {
                $this->session->set_flashdata('msg', array('message' => 'Approval is pending', 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/auth/login');
            }

            $user_data = array(
                'admin_id' => $data->id,
                'email' => $data->email_id,
                'name' => $data->first_name,
                'logged_in' => true,
                'role' => $data->role,
                'permissions' => $data->permissions,
                'status' => $data->status,

            );
            ;

            $this->session->set_userdata($user_data);
           
            $this->session->set_flashdata('msg', array('message' => 'You are now logged in', 'class' => 'success', 'position' => 'top-right'));
        
            redirect('backend/dashboard');
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Invalid credentials', 'class' => 'error', 'position' => 'top-right'));
            redirect('backend/auth/login');
        }
    }
}



    
   
    public function login()
    {   
        $this->load->model('Admin_model');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // If the validation fails, display the login form again
            $this->load->view('/login');
        } else {
            // If the validation passes, check if the email and password match
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->Admin_model->get_userdetail($email, $password);
           
            if ($user) {
                $user_data = array(
                    'id' => $user->id,
                    'username' => $user->name,
                    'role' => $user->role, // Add role to session data
                    'permissions' => $user->permissions, // Add role to session data
                    'status' => $user->status // Add status to session data
                );

               
                $this->session->set_userdata($user_data);
             
                if ($user->status == '0') {
                    // If the status is 0, display the pending approval message
                    $this->session->set_flashdata('error', 'Approval is pending');
                    redirect('Admin/login');
                } else {
                    // Redirect to appropriate dashboard based on user role
                    if ($user->role == '0') {
                        redirect('backend/dashboard/admin');
                    } elseif ($user->role == '2') {
                        redirect('backend/dashboard/creator/' . $user->id);
                    } else {
                        redirect('backend/dashboard/manager/' . $user->id);
                    }
                }
            } else {
                // If the email and password don't match, display an error message
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('Admin/login');
            }
        }
    }
    

    

    



    // function login() 
    // {
    //     $this->load->model('Admin_model');
    //     $this->form_validation->set_rules('email', 'Email', 'required');
    //     $this->form_validation->set_rules('password', 'Password', 'required');
        
    //     if ($this->form_validation->run() == FALSE) 
    //     {
    //         // If the validation fails, display the login form again
    //         $this->load->view('/login');
    //     } 
    //     else 
    //     {
    //         // If the validation passes, check if the email and password match
    //         $email = $this->input->post('email');
    //         $password = $this->input->post('password');
    //         $user = $this->Admin_model->get_userdetail($email, $password);
            
    //         if ($user) 
    //         {
    //             $user_data = array(
    //                 'id' => $user->id,
    //                 'username' => $user->email,
    //                 'role' => $user->role // Add role to session data
    //             );
    //             $this->session->set_userdata($user_data);
    //             $this->session->set_userdata('role', $user->role); // Store role in a separate session variable
                
    //             redirect('backend/dashboard'); // Redirect to the dashboard page
    //         } 
    //         else 
    //         {
    //             // If the email and password don't match, display an error message
    //             $this->session->set_flashdata('error', 'Invalid email or password');
    //             redirect('backend/login');
    //         }
    //     }
    // }



    // Log user out
    public function logout() {
        // <editor-fold defaultstate="collapsed" desc="Logout">

        $user_data = array(
            'admin_id' => '',
            'email' => '',
            'name' => '',
            'image' => '',
            'logged_in' => '',
            'role' => '',
        );
        $this->session->unset_userdata($user_data);
        $this->session->sess_destroy();
        redirect('backend/auth');
 
    }

    public function register()
    {
        $data = [
            'AllAreaInterest' => $this->Area_interest_model->AllAreaInterest(),
            'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
            'AllHobby'        => $this->Hobby_model->AllHobbyList(),
            'AllOccupation' => $this->Occupation_model->AllOccupationList(),
            'AllEducation' => $this->Education_model->AllEducationList(),

        ];
       
        $this->load->view('registration',$data);
    }

    public function registration()
{
    // $this->load->helper('form');
    // $this->load->library('form_validation');
    $this->load->model('Admin_model');
    // Set validation rules for the form fields
//     $this->form_validation->set_rules('second_first_name', 'First Name', 'required');
//     $this->form_validation->set_rules('second_last_name', 'Last Name', 'required');
//     $this->form_validation->set_rules('second_date', 'Date of Birth', 'required');
//     $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email');
//     $this->form_validation->set_rules('second_gender', 'Gender', 'required');
//    // $this->form_validation->set_rules('terms', 'Terms and Conditions', 'required');
//     $this->form_validation->set_rules('area_pin', 'Area Pin Code', 'required');
//     $this->form_validation->set_rules('occupation', 'Occupation', 'required');
//     $this->form_validation->set_rules('education', 'Education', 'required');
//     $this->form_validation->set_rules('hobby', 'Hobby', 'required');
//     $this->form_validation->set_rules('hear_about_us', 'Hear About Us', 'required');
//     $this->form_validation->set_rules('area_of_interest', 'Area of Interest', 'required');

    // if ($this->form_validation->run() === FALSE) {
    //     // Display the registration form
    //     $this->load->view('registration');

    // } else {

        // Form validation passed, perform registration logic here
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email_id' => $this->input->post('email_id'),
            'password' => $this->input->post('password'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender' => $this->input->post('gender'),
            'pincode' => $this->input->post('pincode'),
            'occupation_id' => $this->input->post('occupation'),
            'education_id' => $this->input->post('education'),
            'hobby_id' => $this->input->post('hobby'),
            'heard_about_us_id' => $this->input->post('heard_about_us'),
            'area_of_interest_id' => $this->input->post('area_of_interest')
        );


        $creator = $this->Admin_model->RegisterCreator($data);

        if ($creator) {
            $this->session->set_flashdata('msg', array('message' => 'Creator Registered Successfully', 'class' => 'success', 'position' => 'top-right'));
            $session=$this->session->userdata('role');
            
            $session!=''?redirect('backend/creator'):redirect('backend/auth');
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            $session=$this->session->userdata('role');
            $session!=''?redirect('backend/creator'):redirect('backend/auth');
        }
    // }
}


public function edit_admin()
{
   
    // $this->load->helper('form');
    // $this->load->library('form_validation');
    $this->load->model('Admin_model');
    // Set validation rules for the form fields
//     $this->form_validation->set_rules('second_first_name', 'First Name', 'required');
//     $this->form_validation->set_rules('second_last_name', 'Last Name', 'required');
//     $this->form_validation->set_rules('second_date', 'Date of Birth', 'required');
//     $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email');
//     $this->form_validation->set_rules('second_gender', 'Gender', 'required');
//    // $this->form_validation->set_rules('terms', 'Terms and Conditions', 'required');
//     $this->form_validation->set_rules('area_pin', 'Area Pin Code', 'required');
//     $this->form_validation->set_rules('occupation', 'Occupation', 'required');
//     $this->form_validation->set_rules('education', 'Education', 'required');
//     $this->form_validation->set_rules('hobby', 'Hobby', 'required');
//     $this->form_validation->set_rules('hear_about_us', 'Hear About Us', 'required');
//     $this->form_validation->set_rules('area_of_interest', 'Area of Interest', 'required');

    // if ($this->form_validation->run() === FALSE) {
    //     // Display the registration form
    //     $this->load->view('registration');

    // } else {

        // Form validation passed, perform registration logic here
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email_id' => $this->input->post('email_id'),
            // 'password' => $this->input->post('password'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender' => $this->input->post('gender'),
            'pincode' => $this->input->post('pincode'),
            'occupation_id' => $this->input->post('occupation'),
            'education_id' => $this->input->post('education'),
            'hobby_id' => $this->input->post('hobby'),
            'heard_about_us_id' => $this->input->post('heard_about_us'),
            'area_of_interest_id' => $this->input->post('area_of_interest')
        );

        $id= $this->input->post('creator_id');
        $creator = $this->Admin_model->EditCreator($id,$data);
        
        if ($creator) {
            $this->session->set_flashdata('msg', array('message' => 'Creator Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
            $session=$this->session->userdata('role');
            $session!=''?redirect('backend/creator'):redirect('backend/auth');

        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            $session=$this->session->userdata('role');
            $session!=''?redirect('backend/creator'):redirect('backend/auth');
           
        }
    // }
}

    

}
