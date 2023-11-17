<?php
class Donation extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model(['Student_model','School_model','Feeds_model','Event_model']);
        $this->load->model('Donation_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Donation List',
            'donation' => $this->Donation_model->donationlist(),
        ];
        template('donation/index',$data);
    }
}