<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Quiz extends REST_Controller
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
            'Quiz_model'
        ]);
    }

    public function quiz_post()
    {
        $videoId = $this->input->post('video_id');
        $quizList = $this->Quiz_model->Listquiz($videoId);
        if (!empty($quizList)) {
            $data['message'] = 'successfully';
            $data['code'] = HTTP_OK;
            $data['quizList'] = $quizList;
            $this->response($data, HTTP_OK);
        } else {
            $data['message'] = 'No data founds..';
            $data['code'] = 404;
            $this->response($data, HTTP_OK);
        }
        exit();
    }

    public function takeQuiz_post()
    {
        // echo "i m here";
        // exit();
        $user_id = $this->input->post('user_id');
        $video_id = $this->input->post('video_id');
        $quizdisplay = $this->Quiz_model->Listquiz($video_id, $user_id);
        if (!empty($quizdisplay)) {
            $quizdisplayCount = count($quizdisplay); // Get the count of $quizdisplay
            // $studentquizreport =$this->Quiz_model->DisplayStudentQuizReport($videoId, $user_id);    
            $student_quiz_id = $this->Quiz_model->InsertStudentQuiz($video_id, $user_id, $quizdisplayCount); // Pass the count to the function
            foreach ($quizdisplay as $key => $value) {
                $student_quiz_data['student_quiz_id'] = $student_quiz_id;
                $student_quiz_data['quiz_id'] = $value->id;
                $student_quiz_data['video_id'] = $video_id;
                $student_quiz_data['user_id'] = $user_id;
                $this->Quiz_model->InsertStudentQuizReport($student_quiz_data);
            }
            $student_quiz = $this->Quiz_model->StudentQuizReport($student_quiz_id);
            if (!empty($student_quiz)) {
                $data['message'] = 'Successfully';
                $data['code'] = HTTP_OK;
                $data['student_quiz'] = $student_quiz;
            } else {
                $data['message'] = 'No data found';
                $data['code'] = 404;
            }
        } else {
            $data['message'] = 'No data found';
            $data['code'] = 404;
        }

        //$data['quizdisplay'] = $quizdisplay;  // Include $quizdisplay in the response
        $this->response($data, HTTP_OK);

        exit();
    }


    public function getAnswer_post()
    {
        $id = $this->input->post('id');
        $answer = $this->input->post('answer');
        $student_report_id = $this->Quiz_model->QuizReportId($id);
        if ($student_report_id) {
            $quiz_answer = $student_report_id[0]->correct_ans;
            $isCorrect = ($quiz_answer == $answer)?1:0;
                $this->Quiz_model->Answer($id,$answer,$isCorrect,$student_report_id[0]->student_quiz_id);
                $data['message'] = 'Successfully';
                $data['code'] = HTTP_OK;
        } else {
            $data['message'] = 'No data found';
            $data['code'] = 404;
        }
        $this->response($data, HTTP_OK);
        exit();
        //$data['last_query'] = $this->db->last_query();
        $this->response($data, HTTP_OK);
        exit();
    }


    public function reportQuiz_post()
    {
        $user_id = $this->input->post('user_id');
        $video_id = $this->input->post('video_id');
        $student_quiz_id = $this->input->post('student_quiz_id');
    
        // Check if user, video, and student_quiz exist
        if (!empty($user_id) && (!empty($video_id) || !empty($student_quiz_id))) {
            // Get the report
            $getreport = $this->Quiz_model->GetReport($user_id, $video_id, $student_quiz_id);
            
            if (!empty($getreport)) {
                // Loop through each report and process reward points
                foreach ($getreport as $report) {
                    $reward_point = $report->reward_point;
                    $student_quiz_id = $report->student_quiz_id;
                    $creator_id = $report->creator_id;
                    $course_id = $report->id;
    
                    // Check if the reward point has been added earlier
                    $reward_added = $this->Quiz_model->checkRewardAdded($student_quiz_id);
    
                    if ($reward_added) {
                        // Add reward points to user's wallet and student_quiz
                        $this->Quiz_model->addRewardToUserWallet($user_id, $reward_point);
                        $this->Quiz_model->addRewardToStudentQuiz($student_quiz_id, $reward_point);
                        
                        // Deduct reward points from creator's purchase
                        $this->Quiz_model->deductRewardFromCreatorPurchase($reward_point,$creator_id,$course_id);
                    }
                }
    
                $data['message'] = 'Successfully processed reward points';
                $data['code'] = HTTP_OK;
                $data['getreport'] = $getreport;
            } else {
                $data['message'] = 'No data found';
                $data['code'] = 404;
            }
        } else {
            $data['message'] = 'Invalid user_id, video_id, or student_quiz_id';
            $data['code'] = 400;
        }
    
        $this->response($data, HTTP_OK);
        exit();
    }
    
    

    public function get_certificate_post()
    {
        $user_id = $this->input->post('user_id');
        $video_id = $this->input->post('video_id');
        // print_r($user_id);
        // print_r($video_id);
        // exit;
        if (empty($user_id) || empty($video_id)) {
            $data['message'] = 'Invalid Parameter';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, 200);
            exit();
        }
        
        $certificate = $this->Quiz_model->GetCertificate($user_id,$video_id);
        // print_r($certificate);
        echo '<!DOCTYPE html>
        <html lang="en">
        
        <head>
          <title>Certificate</title>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/style.css">
        </head>
        <style>
        * {
            box-sizing: border-box;
          }
          
          @media print{
            .no-print, .no-print *{
              display: none !important;
            } 
            .print-m-0{
              margin: 0 !important;
            }
          } 
          
          @media only screen and (min-width: 1200px) {
            .cert-container {
              margin:45px 0 10px 0; 
              width: 100%; 
              display: flex; 
              justify-content: center;
            }
          }
          
          .AGaramondPro-Bold {
            font-family: "AGaramondPro-Bold";
          }
          
          .cert-container {
            margin:45px 0 10px 0; 
            width: 100%; 
            display: flex; 
           
          } 
          
          .cert {
            width:auto; 
            height:600px; 
            padding:15px 20px; 
            text-align:center; 
            position: relative; 
            z-index: -1;
          }
          
          .cert-bg {
            position: absolute; 
            left: 0px; 
            top: 0; 
            z-index: -1;
            width: 100%;
          }
          
          .cert-content {
            width:750px; 
            height:470px; 
            padding:35px 35px 0px 35px; 
            text-align:center;
            font-family: Arial, Helvetica, sans-serif;
            
          }
          
          h1 {
            font-size: 52px;
            color: #1b2e50;
            margin: 0;
          }
          h2{
            margin: 0px 0 15px;
            font-size: 32px;
            color: #1b2e50;
          }
          
          
          p {
            font-size:25px;
          }
          
          .underline{
            border-top: 1px solid #777;
            width: 325px;
            text-align: center;
            display: flex;
            margin-left: 180px;
          }
          .wismline{
            justify-content: center;
            display: flex;
            margin-top: 6px;
           
          }
          .wismline .line{
            border-bottom: 1px solid #777;
            width: 250px;
            text-align: center;
            display: flex;
            margin-left: 0;
           
          }
          .Poor-Richard {
            font-family: "AGaramondPro-Bold";
            font-size: 18px;
            color: #1b2e50;
          }
          .poppins_bold {
            font-family: "poppins_bold";
            font-size: 40px;
          }
          .col-xs-4 {
            width: 33.33333333%;
          }
          .logoin{
            width: 315px;
            text-align: center;
            left: 250px;
          }
        </style>
        
        <body>
          <div class="cert-container print-m-0">
            <div id="content2" class="cert">
              <img src='. base_url('assets/images/certificate.jpg').' class="cert-bg" alt="" />
              <div class="cert-content">
                <img src='. base_url('assets/images/logo.png').' class="logoin" alt="" />
                <h1 class="AGaramondPro-Bold">CERTIFICATE</h1>
                <h2 class="AGaramondPro-Bold">OF ACHIEVEMENT</h2>
                <span class="Poor-Richard">THIS CERTIFICATE IS PRESENTED TO</span>
                <br /><br />
                <span class="poppins_bold"><b>'.$certificate[0]->name.'</b></span>
                <span class="pm-empty-space block underline"></span><br />
                <span class="Poor-Richard">HAS SUCCESSFULLY COMPLETED THE ONLINE CERTIFICATION COURSE OF </span><br>
                <div class="wismline">
                  <span class="pm-empty-space block line Poor-Richard"><b>'.$certificate[0]->course_name.'</b></span>
                  <span class="Poor-Richard"> FROM COLLECTIVE WISDOM.</span>
                </div>
                <br />
              </div>
            </div>
          </div>
        </body>
        </html>
        ';
        // print_r($certificate);
        // exit;
        // if ($certificate){
        //     $data['message'] = 'Certificate is created';
        //     $data['code'] = HTTP_OK;
            // $data['certificate'] = $certificate;
        //     $data['certificate_html'] = $certificate_html;
        //     $this->response($data, HTTP_OK);
        //     exit();
        // }
    }
}
