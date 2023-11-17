<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 text-center">
				<div class="card">
					<h4 class="card-header">Transaction <label for="failure" class="badge badge-danger">Failed</label></h4>
					<div class="card-body">
						<?php
						echo "<p class='mb-0'>Your order status is " . $status . "..</br>";
						echo "<p ><span class='text-danger'>Failed Due to " . $field9 . "</span></br>";
						echo "Your transaction id for this transaction is " . $txnid . ". <br>Contact our customer support.</p>";
						echo "<a  href='" . base_url() . "backend/Course' class='btn btn-sm text-center btn-info'>Go Back</a>";
						?>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
