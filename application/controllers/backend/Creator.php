<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Creator extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Creator_model');
        $this->load->model(array(
            'Area_interest_model',
            'Heard_about_model',
            'Hobby_model',
            'Occupation_model',
            'Education_model',
            'Creator_Purchase_model',
            'Creator_model'
         ));

    }

    public function index()
    {      

        $data = [
            'title' => 'Creator List',
            'Creator' => $this->Creator_model->List(),
            'approval_pending' => $this->Creator_model->approval_pending(),

        ];
        // echo "<pre>";print_r($data);exit;
        $data['SideBarbutton'] = ['backend/Creator/add', 'Add'];
        $data['AddButton'] = ['backend/Creator/creatorapproval', 'Approval (' . $data['approval_pending'] . ') '];
        template('creator/index', $data);
    }

    public function creatorapproval()
    {      

        $data = [
            'title' => 'Creator Management',
            'AllCreator' => $this->Creator_model->AllCreator(0),
            'Creatorapproved' => $this->Creator_model->AllCreator(1),
            'Creatorrejected' => $this->Creator_model->AllCreator(2)
        ];
        // echo "<pre>";print_r($data);exit;
        //$data['SideBarbutton'] = ['backend/Creator/add', 'Add'];
        template('creator/approval', $data);
    }
    
    public function ChangeStatus()
    {
        $id=$this->input->post('id');
        if ($this->Creator_model->ChangeStatus($id)) {
           echo "true";
        } else {
           echo "false";
        }
    }

    public function add()
    {
      $data = [
          'title' => 'Add Creator',
          'AllAreaInterest' => $this->Area_interest_model->AllAreaInterest(),
          'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
          'AllHobby'        => $this->Hobby_model->AllHobbyList(),
          'AllOccupation' => $this->Occupation_model->AllOccupationList(),
          'AllEducation' => $this->Education_model->AllEducationList(),
      ];
      template('creator/add', $data);
    }

    public function insertcourse()
    {
      $this->load->library('upload');
      $image1 = '';
      $files = $_FILES;
      if(!empty($_FILES['image1']['name']))
      {           
          $_FILES['image1']['name']= $files['image1']['name'];
          $_FILES['image1']['type']= $files['image1']['type'];
          $_FILES['image1']['tmp_name']= $files['image1']['tmp_name'];
          $_FILES['image1']['error']= $files['image1']['error'];
          $_FILES['image1']['size']= $files['image1']['size'];    

          $config = array();
          $config['upload_path'] = './uploads/data/content/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['max_size']      = '10000';
          $config['overwrite']     = FALSE;
          $this->upload->initialize($config);
          $this->upload->do_upload('image1');
          if ( ! $this->upload-> do_upload('image1'))
          {

          }
          else
          { 
            $data = $this->upload->data();
            $image1 = $data['file_name'];
                          
          }
      }

      $video1 = '';
      $files = $_FILES;
      if(!empty($_FILES['video1']['name']))
      {           
          $_FILES['video1']['name']= $files['video1']['name'];
          $_FILES['video1']['type']= $files['video1']['type'];
          $_FILES['video1']['tmp_name']= $files['video1']['tmp_name'];
          $_FILES['video1']['error']= $files['video1']['error'];
          $_FILES['video1']['size']= $files['video1']['size'];    

          $config = array();
          $config['upload_path'] = './uploads/data/content/';
          $config['allowed_types'] = '*';
          $config['max_size']      = '1000000000000000';
          $config['overwrite']     = FALSE;
          $this->upload->initialize($config);
          $this->upload->do_upload('video1');
          if ( ! $this->upload->do_upload('video1'))
          {

          }
          else
          { 
            $data = $this->upload->data();
            $video1 = $data['file_name'];
                          
          }
      }


        $data = [
          'course_name' => $this->input->post('course_name'),
          'title' => $this->input->post('title'),
          'duration' => $this->input->post('duration'),
          //'writer' => $this->input->post('writer'),
          //'language' => $this->input->post('language'),
          //'description' => $this->input->post('description'),
          //'sort' => $this->input->post('serial_no'),
          'price' => $this->input->post('price'),
          'video' => $video1,
          'image' => $image1,
        ];

        //echo "<pre>";print_r($data);exit;

        $InsertSetting = $this->Creator_model->Insertcourse($data);
        if ($InsertSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Course Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        $urls = 'backend/course';
        redirect($urls);
    }

    public function insert()
    {
        $data = [
          'first_name' => $this->input->post('first_name'),
          'email_id' => $this->input->post('email_id'),
          'password' => $this->input->post('password'),
        ];
        //echo "<pre>";print_r($data);exit;

        $InsertSetting = $this->Creator_model->Insert($data);
        if ($InsertSetting) {
            $this->session->set_flashdata('msg', array('message' => 'Creator Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        $urls = 'backend/creator';
        redirect($urls);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Creator',
            'AllAreaInterest' => $this->Area_interest_model->AllAreaInterest(),
            'AllHeardAbout'   => $this->Heard_about_model->AllHeardAboutUs(),
            'AllHobby'        => $this->Hobby_model->AllHobbyList(),
            'AllOccupation' => $this->Occupation_model->AllOccupationList(),
            'AllEducation' => $this->Education_model->AllEducationList(),
            'Creator'=>$this->Creator_model->updatecreator($id),

        ];
        
        template('creator/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = [
          'first_name' => $this->input->post('first_name'),
          'email_id' => $this->input->post('email_id'),
          
        //   'language' => $this->input->post('language'),
        //   'description' => $this->input->post('description'),
        //   'sort' => $this->input->post('serial_no'),
        //   'price' => $this->input->post('price'),
        ];

        $UpdateSetting = $this->Creator_model->Update($data, $id);
        if ($UpdateSetting) {

        //   $this->load->library('upload');
        //   $image1 = '';
        //   $files = $_FILES;
        //   //echo "<pre>";print_r($_FILES['image1']['name']);exit;
        //   if(!empty($_FILES['image1']['name']))
        //   {           
        //       $_FILES['image1']['name']= $files['image1']['name'];
        //       $_FILES['image1']['type']= $files['image1']['type'];
        //       $_FILES['image1']['tmp_name']= $files['image1']['tmp_name'];
        //       $_FILES['image1']['error']= $files['image1']['error'];
        //       $_FILES['image1']['size']= $files['image1']['size'];    

        //       $config = array();
        //       $config['upload_path'] = './data/course/';
        //       $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //       $config['max_size']      = '1000000000';
        //       $config['overwrite']     = FALSE;
        //       $this->upload->initialize($config);
        //       $this->upload->do_upload('image1');
        //       if ( ! $this->upload-> do_upload('image1'))
        //       {
        //         $error = array('error' => $this->upload->display_errors());
        //         print_r($error['error']);
        //         die;
        //       }
        //       else
        //       { 
        //         $data = $this->upload->data();
        //         $image1 = $data['file_name'];
        //         $data1 = array('image'=>$image1);
        //         $UpdateSetting = $this->Course_model->Update($data1, $id);
                              
        //       }
        //   }

        //   $video1 = '';
        //   $files = $_FILES;
        //   if(!empty($_FILES['video1']['name']))
        //   {           
        //       $_FILES['video1']['name']= $files['video1']['name'];
        //       $_FILES['video1']['type']= $files['video1']['type'];
        //       $_FILES['video1']['tmp_name']= $files['video1']['tmp_name'];
        //       $_FILES['video1']['error']= $files['video1']['error'];
        //       $_FILES['video1']['size']= $files['video1']['size'];    

        //       $config = array();
        //       $config['upload_path'] = './data/coursevideo/';
        //       $config['allowed_types'] = '*';
        //       $config['max_size']      = '1000000000000000';
        //       $config['overwrite']     = FALSE;
        //       $this->upload->initialize($config);
        //       $this->upload->do_upload('video1');
        //       if ( ! $this->upload->do_upload('video1'))
        //       {

        //       }
        //       else
        //       { 
        //         $data = $this->upload->data();
        //         $video1 = $data['file_name'];
        //         $data1 = array('videos'=>$video1);
        //         $UpdateSetting = $this->Course_model->Update($data1, $id);
                              
        //       }
        //   }

        $this->session->set_flashdata('msg', array('message' => 'Course Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        $urls = 'backend/creator';
        redirect($urls);
    }

    public function delete($id)
    {
        if ($this->Creator_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Creator Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function viewcourse($id)
    {
        $data=[
            'title'=>'View Course',
            'viewcontent'=>$this->Creator_model->viewcontent($id),
            ];
        $this->form_validation->set_rules('img','Image','required');
        if($this->form_validation->run()== false)
            template('creator/viewcontent', $data);
    }

    public function viewpurchase($id)
    {
        $data=[
            'title'=>'View Creator Purchase',
            'viewpurchase'=>$this->Creator_Purchase_model->viewpurchase($id),
            ];
            // echo '<pre>';
            // print_r($data);
            // exit;
        // $this->form_validation->set_rules('img','Image','required');
        // if($this->form_validation->run()== false)
            template('creator/viewpurchase', $data);
    }

    public function editcontent($id)
    {
        $data=[
            'title'=>'Edit Content',
            'editcontent'=>$this->Creator_model->editcontent($id),
            ];
        $this->form_validation->set_rules('img','Image','required');
        if($this->form_validation->run()== false)
            template('creator/editcontent', $data);
    }

    public function updatecontent()
    {
        $id=$this->input->post('creator_id');
        // print_r($content_id); exit;
        $image = '';
        if (!empty($_FILES["image"]['name'])) {
            //die('i m here');
            $config['upload_path'] = './uploads/data/content/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '10000';
//            $config['max_width'] = '2000';
//            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {

                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/creator');
            } else {

                $file = $this->upload->data();
                $image = $file['file_name'];
            }
        }
        // print_r($image); exit;
        $UpdateContent = $this->Creator_model->updatecontent($id,$image);
        if ($UpdateContent) {
            $this->session->set_flashdata('msg', array('message' => 'content Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/creator');


    }
    
    public function course()
    {      

        $data = [
            'title' => 'Creator Course List',
            'Course' => $this->Creator_model->CourseList()
        ];
        // echo "<pre>";print_r($data);exit;
        $data['SideBarbutton'] = ['backend/creator/addcourse', 'Add Course'];
        // $data['AddButton'] = ['backend/Creator/creatorapproval', 'Approval'];
        template('creator/courselist', $data);
    }

    public function addcourse()
    {
        $data = [
            'title' => 'Add Course',
        ];
        template('creator/addcourse', $data);
    }

    


    public function ReasonUpdate()
    {
        $data = [
            'reason' => $this->input->post('reason'),
            'status' => 2,
            'isUpdated' => date('Y-m-d H:i:s')
        ];
        $TableMaster = $this->Creator_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($TableMaster) {
          echo "true";
        } else {           
            echo "false";
        }
 
    }

    public function deletecontent($id)
    {
        if ($this->Creator_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Creator-content Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function export_excel($id)
    {
        // $data = $this->Creator_model->ExportCreatorTransaction($id);
        $data = $this->Creator_Purchase_model->viewpurchase($id);
        // echo '<pre>';
        // print_r($data);
        // die('i am here');
        $file = new Spreadsheet();

        $active_sheet = $file->getActiveSheet();
        $active_sheet->setCellValue('A1', 'Serial Number');
        $active_sheet->setCellValue('B1', 'Creator Name');
        $active_sheet->setCellValue('C1', 'Course Name');
        $active_sheet->setCellValue('D1', 'Payable Amount');
        $active_sheet->setCellValue('E1', 'Admin Commission');
        $active_sheet->setCellValue('F1', ' Total Amount');
        $active_sheet->setCellValue('G1', 'Remaining Amount');
        $active_sheet->setCellValue('H1', 'Added Date');
       
        $count = 2;
        $i = 1;
        foreach ($data as $row) {

            // $date_of_birth = new DateTime($row->date_of_birth);
            // $today_age = new DateTime('today');;
            // $age = $date_of_birth->diff($today_age)->y;

            $active_sheet->setCellValue('A' . $count, $i++);
            $active_sheet->setCellValue('B' . $count, $row->first_name);
            $active_sheet->setCellValue('C' . $count, $row->course_name);
            // $active_sheet->setCellValue('D' . $count, $row->username);
            $active_sheet->setCellValue('D' . $count, $row->payable);
            $active_sheet->setCellValue('E' . $count, $row->admin_commission);
            $active_sheet->setCellValue('F' . $count, $row->amount);
            $active_sheet->setCellValue('G' . $count, $row->remaining_amount);
            $active_sheet->setCellValue('H' . $count, $row->created_at);
           
            $count = $count + 1;
        }
        ob_end_clean();
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

        $file_name = time() . '.' . strtolower('Xlsx');

        $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

        readfile($file_name);

        unlink($file_name);

        exit;
    }
}