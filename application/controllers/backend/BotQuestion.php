<?php
class BotQuestion extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BotQues_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Bot Question',
            'AllBotQuestion' => $this->BotQues_model->View()
        ];
        $data['SideBarbutton'] = ['backend/BotQuestion/add', 'Add'];
        template('bot_question/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Bot Question',
        ];
        template('bot_question/add', $data);
    }

    public function insert()
    {

        $data = [
            'ques' => $this->input->post('ques'),
            'ans' => $this->input->post('ans'),
        ];

        $InsertHobby = $this->BotQues_model->Insert($data);
        if ($InsertHobby) {
            $this->session->set_flashdata('msg', array('message' => 'Bot Question Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/BotQuestion');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Bot Question',
            'BotQues' => $this->BotQues_model->View($id),
        ];
        template('bot_question/edit', $data);
    }

    public function update()
    {
        $data = [
            'ques' => $this->input->post('ques'),
            'ans' => $this->input->post('ans'),
            'id'   => $this->input->post('id'),
        ];

        $UpdateBotQues = $this->BotQues_model->update($data);
        if ($UpdateBotQues) {
            $this->session->set_flashdata('msg', array('message' => 'Bot Question Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/BotQuestion');
    }

    public function delete($id)
    {
        if ($this->BotQues_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Bot Question Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/BotQuestion');
    }
}
