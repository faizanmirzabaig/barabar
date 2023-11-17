<?php
class SurveyType extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Survey_type_model');
    }
}