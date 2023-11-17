<?php


class PayUMoney extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Course_model');
	}

	public function checkout($course_id)
	{
		$course_data=$this->Course_model->course_by_id($course_id);
		$amount =  $course_data->reward_point;
		$no_of_user =  $course_data->no_of_usr;
		if ($no_of_user > 1) {
			$am_usr =  $amount * $no_of_user;
			$percentage = (10 / 100) * $am_usr;
			$total_amount= $am_usr+$percentage;
		} else {
			$am_usr = $amount;
			$percentage = 0;
			$total_amount= $am_usr+$percentage;
		}
		
		$product_info = $course_data->name;
		$customer_name = 'faizan';
		$customer_email = 'faizan@gmail.com';
		// $customer_mobile = '7304094851';
		// $customer_address = 'faizantest12346';

		//payumoney details


		$MERCHANT_KEY = MERCHANT_KEY; //change  merchant with yours
		$SALT = SALT;  //change salt with yours 

		// $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		// $txnid =  $course_id;

		$admin_id=$this->session->userdata('admin_id');

		$txnid = $course_id . '-' . $admin_id;

		//optional udf values 
		$udf1 = $admin_id;
		$udf2 = $course_id;
		$udf3 = '';
		$udf4 = '';
		$udf5 = '';

		$hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $total_amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;

		$hash = strtolower(hash('sha512', $hashstring));

		$success = base_url() . 'backend/Status';
		$fail = base_url() . 'backend/Status';
		$cancel = base_url() . 'backend/Status';


		$data = array(
			'mkey' => $MERCHANT_KEY,
			'tid' => $txnid,
			'hash' => $hash,
			'name' => $customer_name,
			'reward_point' => $amount,
			'payable' => $am_usr,
			'admin_commission' => $percentage,
			'amount' => $total_amount,
			'remaining_amount' => $am_usr,
			'productinfo' => $product_info,
			'mailid' => $customer_email,
			'admin_id' => $udf1,
			'course_id' => $udf2,
			// 'phoneno' => $customer_mobile,
			// 'address' => $customer_address,
			'action' => "https://test.payu.in", //for live change action  https://secure.payu.in
			'sucess' => $success,
			'failure' => $fail,
			'cancel' => $cancel
		);
		// print_r($data);
		// die('im here');
		$this->load->view('pay_u_money/confirmation', $data);
	}

	// public function failure()
	// {
	// 	$this->load->view('pay_u_money/failure');
	// }
}
