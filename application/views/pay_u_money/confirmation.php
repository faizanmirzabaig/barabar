<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= 'Checkout' . ' | ' . PROJECT_NAME ?></title>
	<meta content="Admin Dashboard" name="description">
   <meta content="Themesbrand" name="author">
   <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
  
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
	<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>

</head>
<body>

<div class="container mt-5">
	<div class="row">
        <div class="col-md-2"></div>  
        <div class="col-md-8">
        	<div class="card">
        		<h5 class="card-header bg-success text-white">Checkout Confirmation</h5>
        		<div class="card-body">
        			<form action="<?php echo $action; ?>/_payment" method="post" id="payuForm" name="payuForm">
		                <input type="hidden" name="key" value="<?php echo $mkey; ?>" />
		                <input type="hidden" name="txnid" value="<?php echo $tid; ?>" />
		                <input type="hidden" name="udf1" value="<?php echo $admin_id; ?>" />
		                <input type="hidden" name="udf2" value="<?php echo $course_id; ?>" />
						<div class="form-group">
							<label class="control-label">Payable Amount</label>
		                    <input class="form-control" name="amount" value="<?php echo $payable; ?>"  readonly/>
		                </div>
						<div class="form-group">
							<label class="control-label">Admin Commission</label>
		                    <input class="form-control" name="amount" value="<?php echo $admin_commission; ?>"  readonly/>
		                </div>
		                <div class="form-group">
							<label class="control-label">Total Payable Amount (Payable Amount + Admin Commission)</label>
		                    <input class="form-control" name="amount" value="<?php echo $amount; ?>"  readonly/>
		                </div>
						
						
		                <div class="form-group hidden d-none">
							<label class="control-label">Your Name</label>
		                    <input class="form-control" name="firstname" id="firstname" value="<?php echo $name; ?>" readonly/>
		                </div>
		                <div class="form-group d-none">
							<label class="control-label">Email</label>
		                    <input class="form-control" name="email" id="email" value="<?php echo $mailid; ?>" readonly/>
		                </div>
		                <!-- <div class="form-group d-none">
							<label class="control-label">Phone</label>
		                    <input class="form-control" name="phone" value="<?/*php echo $phoneno;*/ ?>" readonly />
		                </div> -->
		                <div class="form-group d-none">
							<label class="control-label"> Booking Info</label>
		                    <textarea class="form-control" name="productinfo" readonly><?php echo $productinfo; ?></textarea>
		                </div>
		                <!-- <div class="form-group d-none">
							<label class="control-label">Address</label>
		                    <input class="form-control" name="address1" value="<?php /*echo $address;*/ ?>" readonly/>     
		                </div> -->
		                <div class="form-group">
							<input name="surl" value="<?php echo $sucess; ?>" size="64" type="hidden" />
		                    <input name="furl" value="<?php echo $failure; ?>" size="64" type="hidden" />  
		                    <!-- <input type="hidden" name="service_provider" value="payu_paisa" size="64" /> -->
		                    <!-- <input name="curl" value="<?php /*echo $cancel; */?> " type="hidden" /> -->
		                </div>
						<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
		                <div class="form-group float-right">
		                	<input type="submit" value="Pay <?php echo $amount; ?> Rs" class="btn btn-success" />
		                </div>
		            </form> 
        		</div>
        	</div>
        	                                   
        </div>
        <div class="col-md-2"></div>
    </div>

</div> 

</body>
</html>