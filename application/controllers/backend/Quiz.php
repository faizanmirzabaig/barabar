<?php
class Quiz extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Quiz_model',''));
    }


    public function List($videoId)
    {

        $data = [
            'title' => 'Quiz List',
            'quiz' => $this->Quiz_model->Listquiz($videoId)
          ];
          $urls = 'backend/quiz/addquiz/'.$videoId;
          $data['SideBarbutton'] = [$urls, 'Add'];
          template('Quiz/index', $data);
      }

    public function addquiz($id)
    {
        $data = [
            'title' => 'Add Quiz',
            'course_id' => $id,
        ];
        template('Quiz/add', $data);
    }

    public function insertquiz($id)
    {
        // $video_id = $this->input->get('video_id'); // Assuming video_id is passed as a query parameter in the URL
        $data = [
            'question_no' => $this->input->post('question_no'),
            'question' => $this->input->post('question'),
            'option_1' => $this->input->post('opt_1'),
            'option_2' => $this->input->post('opt_2'),
            'option_3' => $this->input->post('opt_3'),
            'option_4' => $this->input->post('opt_4'),
            'correct_ans' => $this->input->post('correct_ans'),
            'video_id' => $id,
        ];
            //echo "<pre>";print_r($data);exit;
        $quizId = $this->Quiz_model->Insertquiz($data);

        if ($quizId) {
            $this->session->set_flashdata('msg', array('message' => 'Quiz Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        redirect('backend/quiz/List/'.$id);
    }
    public function editquiz($video_id, $id)
    {
        $data=[
            'title'=>'Edit Quiz',
            'video_id' => $video_id,
            'quiz'=>$this->Quiz_model->getquiz($id),
        ];

        template('Quiz/edit', $data);
    }

    public function updatequiz($video_id)
    {
        $id = $this->input->post('id');
        $data = [
            'question_no' => $this->input->post('question_no'),
            'question' => $this->input->post('question'),
            'option_1' => $this->input->post('opt_1'),
            'option_2' => $this->input->post('opt_2'),
            'option_3' => $this->input->post('opt_3'),
            'option_4' => $this->input->post('opt_4'),
            'correct_ans' => $this->input->post('correct_ans'),
        ];

        $UpdateSetting = $this->Quiz_model->Updatequiz($data, $id);
        if ($UpdateSetting) {

          
            $this->session->set_flashdata('msg', array('message' => 'Course Chapter Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/quiz/list/'.$video_id;
        redirect($urls);
    }

    public function deletequiz($id)
    {
        if ($this->Quiz_model->Deletequiz($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Course Chapter Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function quizreport()
    {
        $data = [
            'title' => 'Quiz report',
            'quizreport' => $this->Quiz_model->quizreport()
          ];
        //   $urls = 'backend/quiz/addquiz/'.$id;
        //   $data['SideBarbutton'] = [$urls, 'Add'];
        template('Quiz/report', $data);
      }

      public function showdetails($id)
{
    $data = [
        'title' => 'Quiz Detail report',
        'detailreport' => $this->Quiz_model->detailreport($id)
    ];

    foreach ($data['detailreport'] as $row) {
        // Modify the correct answer
        $correct_ans = $row->correct_ans;
        switch ($correct_ans) {
            case 'opt_1':
                $correct_ans = $row->option_1;
                break;
            case 'opt_2':
                $correct_ans = $row->option_2;
                break;
            case 'opt_3':
                $correct_ans = $row->option_3;
                break;
            default:
                $correct_ans = $row->option_4;
                break;
        }
        $row->correct_ans = $correct_ans;

        // Modify the user's answer
        $answer = $row->answer;
        switch ($answer) {
            case 'opt_1':
                $answer = $row->option_1;
                break;
            case 'opt_2':
                $answer = $row->option_2;
                break;
            case 'opt_3':
                $answer = $row->option_3;
                break;
            default:
                $answer = $row->option_4;
                break;
        }
        $row->answer = $answer;
    }

    // Load the view with the modified data
    template('Quiz/detailreport', $data);
}


      
    
}