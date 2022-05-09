<?php
require_once("../main_function.php");
$obj=new operation;



if(isset($_POST['submit'])){

	$obj->user_registration($_POST);
    
}

include_once("header.php");
include_once("menu.php");
?>	
	<div class="main-panel">
		<div class="container">
			<div class="page-inner">			
				<h4 class="page-title">Arch New Request</h4>
				<div class="row arch-demo-page">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="card card-with-nav">
							<div class="card-header">
			
							</div>
						<div class="card-body">
							<form  method="POST" action="" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Frist Name</label>
											<input type="text" class="form-control" name="fname" placeholder="Frist Name" value="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Last Name</label>
											<input type="text" class="form-control" name="lname" placeholder="Last Name">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>First Number</label>
											<input type="text" class="form-control" name="fnum" placeholder="Contact Number" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Last Number</label>
											<input type="text" class="form-control" name="lnum" placeholder="Last Number" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>EMail</label>
											<input type="text" class="form-control" name="email" placeholder="Email" >
										</div>
									</div>										
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Password</label>
											<input type="password" class="form-control" name="password" placeholder="Password ">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Department</label>
											<input type="text" class="form-control" name="dept" placeholder="Department" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label> Designation<sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" name="desig" placeholder="Designation" >
									
										</div>
									</div>
								  								
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Status<sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" name="status" placeholder="Status">
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>OrderBy<sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" name="orderby" placeholder="OrderBy">
										</div>
									</div>	
								<div class="text-right mt-3 mb-3">
						        	<button type="submit" name="submit" class="btn btn-success btn-rounded btn-login">Save </button>						
								</div>
							</form>
						</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>
<?php include_once("footer.php"); ?>