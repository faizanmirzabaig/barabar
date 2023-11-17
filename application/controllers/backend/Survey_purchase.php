<?php
class Survey_purchase extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Survey_purchase_model','Survey_share_model','Users_model'));

    }

}