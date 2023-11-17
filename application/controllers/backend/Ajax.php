<?php
class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Ajax_model',
            'Users_model'

        ]);
    }

    // public function GetCity()
    // {
    //     $id = $this->input->post('state_id');
    //     $data = $this->Post_model->AllCity($id);

    //     echo json_encode($data);
    // }

    public function DeleteRecord()
    {
        $RecordId = $this->url_encrypt->decode($this->input->post('id'));
        $Table = $this->url_encrypt->decode($this->input->post('type'));
        $DeleteRecord = $this->Ajax_model->DeleteRecord($RecordId, $Table);
        if ($DeleteRecord) {
            echo 'Record Deleted Successfully';
        } else {
            echo 'Something Went Wrong';
        }
    }

    public function CheckExisting()
    {
        $Data = $_POST;
        $id = $this->url_encrypt->decode($this->input->post('id'));
        $type = $this->url_encrypt->decode($this->input->post('type'));
        $Columename = key($Data);
        $ColumeValue = reset($Data);
        $Check = $this->Ajax_model->Check_exsiting($id, $type, $Columename, $ColumeValue);
        if ($Check) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function CheckExistingEmail()
    {
        $Data = $_POST;
        $id = $this->url_encrypt->decode($this->input->post('id'));
        $type = $this->url_encrypt->decode($this->input->post('type'));
        $Columename = key($Data);
        $ColumeValue = reset($Data);
        $Check = $this->Ajax_model->Check_exsiting($id, $type, $Columename, $ColumeValue);
        if ($Check) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function CheckExistingAdminEmail()
    {
        // die('i m hwere');
        $Data = $_POST;
        $id = $this->input->post('id');
        $email_id = $this->input->post('email_id');
        // print_r($email_id);
        // die('ui m here');
        // return;


        $Check = $this->Ajax_model->Check_exsiting_admin_email($email_id, $id);
        if ($Check) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function ContentType()
    {
        // $content_type = $this->url_encrypt->decode($this->input->post('content_type'));
        $content_type = $this->input->post('content_type');
        switch ($content_type) {
            case VIDEO:
                echo json_encode(array('status' => 200, 'content_type' => 'video', 'type' => VIDEO));
                break;
            case IMAGE:
                echo json_encode(['status' => 200, 'content_type' => 'image', 'type' => IMAGE]);
                break;
            case PDF:
                echo json_encode(['status' => 200, 'content_type' => 'pdf', 'type' => PDF]);
                break;
            default:
                //   code to be executed if n is different from all labels;
        }
    }
    public function user_onchange()
    {
        //    print_r( $this->input->post('selectedPinCodes'));
        //    echo explode($this->input->post('selectedPinCodes'));
        $pincode = $this->input->post('pincode');
        if ($pincode) {
            $pincode_str = implode(',', $pincode);
        }else {
            $pincode_str = ''; // Set to empty string if pincode is not provided
        }
        $min_age = $this->input->post('min_age');
        $max_age = $this->input->post('max_age');
        $male = $this->input->post('male');
        $female = $this->input->post('female');
        $occupation = $this->input->post('occupation');
        $education = $this->input->post('education');
        $hobby = $this->input->post('hobby');
        $heard_about_us = $this->input->post('heard_about_us');
        $area_of_interest = $this->input->post('area_of_interest');
        
        
        $Check = $this->Ajax_model->user_on_change($pincode_str,$min_age,$max_age,$male,$female,$occupation,$education,$hobby,$heard_about_us,$area_of_interest);
        
        if($Check){
            return true;
        }
        else{
            return false;
        }

    }

    public function all_user_onchange(){
        $Check = $this->Users_model->AllUser();
        echo $Check;

    }
}
