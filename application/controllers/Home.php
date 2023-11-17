<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Course_model');
        $this->load->model('Users_model');
        $this->load->model('Order_model');
    }
    public function index()
    {
        $data = [
            'title' => 'Homepage',
        ];
        // website('website/home', $data);
        redirect('backend/auth');
    }
    public function log_in()
    {
        if ($this->session->userdata('user_id')) {
            //redirect('Home/');
            redirect('backend/auth');
        } else {
            $data = [
                'title' => 'Login page',
            ];
            //$this->load->view('website/login', $data);
            redirect('backend/auth');
        }
    }
    public function about()
    {
        $data = [
            'title' => 'About Us',
        ];
        //website('website/about', $data);
        redirect('backend/auth');
    }
    // public function mycourse()
    // {
    //     $user_id=$this->session->userdata('user_id');
    //     $course=$this->Users_model->AllMyCourseList($user_id);
    //     foreach ($course as $key=>$cu) {
    //         $totalChapter=0;
    //         $totalVideo=0;
    //         $Chapter=$this->Course_model->chapterList($cu->course_id);
    //         foreach ($Chapter as $ch) {
    //             $totalChapter+=1;
    //             $Video=$this->Course_model->ListData($ch->id);
    //             foreach ($Video as $vi) {
    //                 $totalVideo+=1;
    //             }
    //         }
    //         $course[$key]->courseChapterCount=$totalChapter;
    //         $course[$key]->courseVideoCount=$totalVideo;
    //     }
    //     $data = [
    //         'title' => 'My Course',
    //         'courseList' => $course,
    //     ];
    //     // echo '<pre>';
    //     // print_r($course);
    //     // die;
    //    // website('website/mycourse', $data);
    //    redirect('backend/auth');
    // }
    public function chapter($id)
    {
        $Chapter=$this->Course_model->chapterList($this->url_encrypt->decode($id));
        foreach ($Chapter as $key=>$ch) {
            $totalVideo=0;
            $Video=$this->Course_model->ListData($ch->id);
            foreach ($Video as $vi) {
                $totalVideo+=1;
            }
            $Chapter[$key]->videoCount=$totalVideo;
        }
        $data = [
            'title' => 'My Chapter',
            'chapterList' => $Chapter,
        ];
        // echo '<pre>';
        // print_r($data);
        // die;
        //website('website/chapter', $data);
        redirect('backend/auth');
    }
    public function videoList($id)
    {
        $Video=$this->Course_model->ListData($this->url_encrypt->decode($id));
        $data = [
            'title' => 'My Video',
            'videoList' => $Video,
        ];
        // echo '<pre>';
        // print_r($data);
        // die;
        website('website/videoList', $data);
    }
    public function playVideo($id)
    {
        $Video=$this->Course_model->getCourseVideo($this->url_encrypt->decode($id));
        $data = [
            'title' => 'Video',
            'videoList' => $Video,
        ];
        // echo '<pre>';
        // print_r($data);
        // die;
        website('website/video', $data);
    }
    public function courses()
    {
        // echo $this->url_encrypt->encode($this->uri->segment(3));
        $id= $this->url_encrypt->decode($this->uri->segment(3));
        $course=$this->Course_model->getSite($id);
        $Chapter=$this->Course_model->chapterList($course->id);
        $totalChapter=0;
        $totalVideo=0;
        foreach ($Chapter as $ch) {
            $totalChapter+=1;
            $Video=$this->Course_model->ListData($ch->id);
            foreach ($Video as $vi) {
                $totalVideo+=1;
            }
        }
        $course->courseChapterCount=$totalChapter;
        $course->courseVideoCount=$totalVideo;
        $data = [
            'title' => 'Courses',
            'course'=>$course
        ];
        // echo '<pre>';
        // print_r($data); die;
        website('website/course', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
        ];
        website('website/contact', $data);
    }
    public function otp()
    {
        $mobile = $this->input->post('mobile');
        $otp = rand(100000, 999999);
        send_sms($mobile, $otp);
        $data=$this->Users_model->InsertOTP($mobile, $otp);
        if (!empty($data)) {
            echo json_encode(array(
                "otp_id"=>$data,
                "statusCode"=>200
            ));
        }
    }
    public function login()
    {
        $mobile = $this->input->post('mobile');
        $otp=$this->input->post('otp');
        $otp_id=$this->input->post('otp_id');
        if ($this->Users_model->checkValidOtp($otp, $otp_id)) {
            $user =$this->Users_model->UserProfileByMobile($mobile);
            if (!empty($user)) {
                $this->Users_model->updateOtpStatus($otp_id);
                $user_id =$user[0]->id;
                $user_dat = array(
                    'user_id' => $user[0]->id,
                    'mobile' => $user[0]->mobile,
                    'logged_in' => true
                );
            } else {
                $data = [
                    'mobile' => $mobile,
                    'password' => $mobile
                ];
                $user_id = $this->Users_model->RegisterUser($data);
                
                $this->Users_model->updateOtpStatus($otp_id);
                $user_dat = array(
                    'user_id' => $user_id,
                    'mobile' => $mobile,
                    'logged_in' => true
                );
            }
            $this->session->set_userdata($user_dat);
            // echo '<pre>';
            // print_r($this->session->userdata('user_id'));die;
            echo json_encode(array(
                "statusCode"=>200
            ));
        } else {
            echo json_encode(array(
                "error"=>"invalid",
                "statusCode"=>404
            ));
        }
    }
    public function logout()
    {
        $user_data = array(
            'user_id' => '',
            'mobile' => '',
            'logged_in' => '',
        );
        $this->session->unset_userdata($user_data);
        $this->session->sess_destroy();
        redirect('Home/log_in');
    }
    public function register()
    {
        $mobile = $this->input->post('mobile');
        $otp=$this->input->post('otp');
        $otp_id=$this->input->post('otp_id');
        $course_id=$this->input->post('course_id');
        $user_id ='';
        if ($this->Users_model->checkValidOtp($otp, $otp_id)) {
            $user =$this->Users_model->UserProfileByMobile($mobile);
            if (!empty($user)) {
                $this->Users_model->updateOtpStatus($otp_id);
                $user_id =$user[0]->id;
                $user_data = array(
                    'user_id' => $user[0]->id,
                    'mobile' => $user[0]->mobile,
                    'logged_in' => true
                );
            } else {
                $data = [
                    'mobile' => $mobile,
                    'password' => $mobile
                ];
                $user_id = $this->Users_model->RegisterUser($data);
                $this->Users_model->updateOtpStatus($otp_id);
                $user_data = array(
                    'user_id' => $user_id,
                    'mobile' => $mobile,
                    'logged_in' => true
                );
            }
            $this->session->set_userdata($user_data);
            $checkPurchase = $this->Course_model->checkPurchase($user_id, $course_id);
            if (!empty($checkPurchase)) {
                echo json_encode(array(
                    "statusCode"=>202
                ));
            } else {
                $order_data = [
                    'user_id' => $user_id,
                    'name' => '',
                    'landmark' => '',
                    'flat' => '',
                    'street' => '',
                    'course_id' => $course_id,
                    'locality' => '',
                    'pincode' => '',
                    'promocode' => '',
                    'added_date' => date('Y-m-d H:i:s')
                ];
                $order_id = $this->Order_model->PlaceOrder($order_data);
                echo json_encode(array(
                    'order_id'=>$order_id,
                    "statusCode"=>200
                ));
            }
        } else {
            echo json_encode(array(
                "error"=>"invalid",
                "statusCode"=>404
            ));
        }
    }
    // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)
    {
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
        $key_id = API_KEY;
        $key_secret = API_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        // curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/ca-bundle.crt');
        return $ch;
    }
    // callback method
    public function callback()
    {
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $final_amount = $this->input->post('merchant_amount');
            $course_id = $this->input->post('course_id');
            $dura=$this->input->post('duration');
            $success = false;
            $coupounA='';
            $discount='';
            $error = '';
            $user_id=$this->session->userdata('user_id');
            // print_r($razorpay_payment_id);
            // print_r($amount);
            // exit;
            try {
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);

                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    echo '<br>';
                    $success = false;
                    $error = 'Curl error: ' . curl_error($ch);
                    echo $error;
                    die;
                } else {
                    $response_array = json_decode($result, true);
                    echo "<pre>";
                    // print_r($response_array);
                    // exit;
                    //Check success response
                    if ($http_status === 200 and isset($response_array['error']) === false) {
                        $success = true;
                    } else {
                        $success = false;
                        if (!empty($response_array['error']['code'])) {
                            $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                        } else {
                            $error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
                        }
                    }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                $course_id = $this->input->post('course_id');
                $this->Order_model->UpdateOrder($user_id, $merchant_order_id, $final_amount, $final_amount, $discount, $razorpay_payment_id, $coupounA);
                $this->Order_model->UpdateOrderPayment($merchant_order_id);
                $duration = '+'.$dura.' days';
                $curr_date = date('Y-m-d H:i:s');
                $NewDate=date('Y-m-d H:i:s', strtotime($duration));

                $vendorData = [
                    'user_id' => $user_id,
                    'course_id' => $course_id,
                    'amount' => $final_amount,
                    'purchase_date' => date('Y-m-d H:i:s'),
                    'expiry_date' => $NewDate,
                    'payment_status' => 1
                ];
                $this->Course_model->InsertCoursePurchase($vendorData);
                $data = [
                    'title' => 'Payment Done Successfully',
                    'payment_id' => $razorpay_payment_id,
                    'order_id' => $merchant_order_id,
                ];
                redirect('Home/success/' . $data['payment_id'] . '/' . $data['order_id']);
            // template('order/success', $data);
                // }
            } else {
                redirect('Home/failed/' . $this->url_encrypt->encode($course_id));
                // $Payment_log=$this->Order_model->change_order_payment_status($merchant_order_id,$response_array['captured']);
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }
    public function success($razorpay_payment_id, $merchant_order_id)
    {
        $data = [
            'title' => 'Success',
            'razorpay_payment_id'=>$razorpay_payment_id,
            'merchant_order_id'=>$merchant_order_id
        ];
        $this->load->view('website/success', $data);
    }
    public function failed($course_id)
    {
        $data = [
            'title' => 'Failed',
            'course_id'=>$course_id
        ];
        $this->load->view('website/failed', $data);
    }
}