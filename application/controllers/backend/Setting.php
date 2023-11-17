<?php
class Setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Setting',
            'Setting' => $this->Setting_model->Setting()
        ];
        
        template('setting/index', $data);
    }

    public function edit()
    {
        $data=[
            'title'=>'Edit Setting',
            'Setting'=>$this->Setting_model->Setting(),
        ];

        template('setting/edit', $data);
    }

    public function update()
    {
        $app_name=$this->input->post('app_name');
        $contact_us=$this->input->post('contact_us');
        $email_us=$this->input->post('email_us');
        $terms=$this->input->post('terms');
        $about_us=$this->input->post('about_us');
        $vision=$this->input->post('vision');
        $mission=$this->input->post('mission');
        $policy=$this->input->post('policy');
        $faq=$this->input->post('faq');
        $youtube_link=$this->input->post('youtube_link');
        
        $img = '';
        // if (!empty($_FILES["img"]['name'])) {
        //     $config['upload_path'] = './data/setting/';
        //     $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
        //     $config['max_size'] = '10000';
        //     $this->load->library('upload', $config);
        //     if (!$this->upload->do_upload('img')) {
        //         $error = array('error' => $this->upload->display_errors());
        //         $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
        //         redirect('backend/setting/edit');
        //     } else {
        //         $file = $this->upload->data();
        //         $img = $file['file_name'];
        //     }
        // }
     
        $UpdateSetting = $this->Setting_model->update($contact_us,$about_us,$vision,$mission,$policy,$faq,$youtube_link,$email_us,$terms);
        if ($UpdateSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Setting Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/setting');
    }
}
