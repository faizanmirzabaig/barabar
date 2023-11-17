<?php
class Survey_quiz extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Survey_quiz_model',''));
    }

    public function List($videoId)
    {

        $data = [
            'title' => 'Survey Quiz List',
            'quiz' => $this->Survey_quiz_model->Listquiz($videoId)
          ];
          $urls = 'backend/survey_quiz/addquiz/'.$videoId;
          $data['SideBarbutton'] = [$urls, 'Add'];
          template('survey_quiz/index', $data);
      }

      public function addquiz($id)
      {
          $data = [
              'title' => 'Add Quiz',
              'survey_id' => $id,
          ];
          template('survey_quiz/add', $data);
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
        $quizId = $this->Survey_quiz_model->Insertquiz($data);

        if ($quizId) {
            $this->session->set_flashdata('msg', array('message' => 'Quiz Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        redirect('backend/Survey_quiz/List/'.$id);
    }

    public function editquiz($video_id, $id)
    {
        $data=[
            'title'=>'Edit Quiz',
            'video_id' => $video_id,
            'quiz'=>$this->Survey_quiz_model->getquiz($id),
        ];

        template('survey_quiz/edit', $data);
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

        $UpdateSetting = $this->Survey_quiz_model->Updatequiz($data, $id);
        if ($UpdateSetting) {

          
            $this->session->set_flashdata('msg', array('message' => 'Quiz Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/Survey_quiz/list/'.$video_id;
        redirect($urls);
    }

    public function deletequiz($id)
    {
        if ($this->Survey_quiz_model->Deletequiz($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Quiz Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}