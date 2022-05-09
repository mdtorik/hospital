<?php
require_once("../main_function.php");
$obj=new operation;

require_once("class/organization.php");
$org=new Organization;

if(isset($_GET['id'])){
	$res=ID_decode($_GET['id']);
	$result=$obj->detailsAndupdateProfile($res);

}

if(isset($_POST['submit'])){
	
	$obj->update_user($_POST);
	$_SESSION['message'] = "You have updated successfully";
    header("location:users.php");
}
	include_once("header.php");
	include_once("menu.php");
?>	
	<div class="main-panel">
		<?php if(isset($result)){ ?>
		<div class="container">
			<div class="page-inner">
				<a  onclick="return confirm('Are you sure want to delete?')" href="?id=<?php 
					echo $result->user_id; ?>"  class="btn btn-danger btn-sm pull-right">Delete</a>
				<h4 class="page-title"><?php echo $result->firstName.' '.$result->lastName; ?> Profile</h4>
	    	  <?PHP	if(isset($_GET['msg'])){?>
			<div class='alert alert-success fade in col-md-6 offset-md-3' role='alert'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <?php echo $_GET['msg']; ?></div>	
			  <?php } ?> 
			  
				<div class="row">
					<div class="col-md-8">
						
						<div class="card card-with-nav">
							<div class="card-header">
						<!-- 		<div class="row row-nav-line">
									<ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
										<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Timeline</a> </li>
										<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
										<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
									</ul>
								</div> -->
							</div>
							<div class="card-body">
							<form  method="POST" action="" >
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>First Name <sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" name="fname" placeholder="Name" value="<?php echo $result->firstName  ?>" required="">
											<input type="hidden" class="form-control" name="id" value="<?php echo $result->user_id  ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Last Name <sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" name="lname" placeholder="Name" value="<?php echo $result->lastName ?>" required="">
										</div>
									</div>									
								</div>							
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Mobile number <sup style="color: red; ">*</sup></label>
											<input type="number" class="form-control" name="fnum" placeholder="enter the mobile number" value="<?php echo $result->firstNum  ?>" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Cell Number  </label>
											<input type="number" class="form-control" name="lnum" placeholder="enter the cell number" value="<?php echo $result->lastNum  ?>">
										</div>
									</div>							
								</div>
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Email <sup style="color: red; ">*</sup></label>
											<input type="email" class="form-control" name="email" placeholder="enter the email" value="<?php echo $result->email ?>" required="">
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Password <sup style="color: red; ">*</sup></label>
											<input type="password" class="form-control" name="password" placeholder="Enter the password" >
										</div>
									</div>
									
							<!-- 		<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Birth Date</label>
											<input type="text" class="form-control" id="datepicker" name="datepicker" value="01/01/1985" placeholder="Birth Date">
										</div>
									</div> -->
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Department</label>
										<input type="text" class="form-control" name="dept" placeholder="enter the department" value="<?php echo $result->depart ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Designations</label>
										<input type="text" class="form-control" name="desig" placeholder="enter the department" value="<?php echo $result->desig  ?>">
										</div>
									</div>																							
								</div>

								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>User Access Role</label>
										  	<select class="form-control" name="roleId" required="">
											 	<option value="">Select User Access Role</option>
											 	<?php foreach ($org->USER_ACL_LIST() as $key => $acl) { ?>
											 	<option value="<?php echo $key; ?>"<?php if($result->roleId==$key){echo "SELECTED"; } ?>><?php echo $acl; ?></option>
											 <?php } ?>
										  	</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Status</label>
										  	<select class="form-control" name="status">
											 	<option value="1" <?php if($result->status==1){echo "SELECTED"; } ?>>Active</option>
											 	<option value="0" <?php if($result->status==0){echo "SELECTED"; } ?>>Inactive</option>
										  	</select>
										</div>
									</div>
								</div>
						
								<div class="text-right mt-3 mb-3">
								 	<button onclick='return confirm_alert(this);' type="submit" name="submit" class="btn btn-success btn-rounded btn-login">Save</button>	
									<a href="users.php" class="btn btn-warning btn-rounded">Back</a>
								</div>
							</form>
						</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-profile">
							<!-- background and profile image link -->
			<!-- 				<div class="card-header" style="background-image: url('assets/img/blogpost.jpg')">
								<div class="profile-picture">
									<div class="avatar avatar-xl">
										<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
									</div>
								</div>
							</div> -->
							<div class="card-body">
								<div class="user-profile text-center">
									<div class="name"><?php echo $result->firstName.''.$result->lastName; ?></div>
									<div class="job"><?php echo $result->email; ?></div>
									<div class="desc"><?php echo $result->firstNum; ?></div>
									<div class="social-media">
										<a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
											<span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
										</a>
										<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
											<span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
										</a>
										<a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
											<span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
										</a>
										<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
											<span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
										</a>
									</div>
									<div class="view-profile">
										<a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
									</div>
								</div>
							</div>
							<!-- <div class="card-footer">
								<div class="row user-stats text-center">
									<div class="col">
										<div class="number">125</div>
										<div class="title">Post</div>
									</div>
									<div class="col">
										<div class="number">25K</div>
										<div class="title">Followers</div>
									</div>
									<div class="col">
										<div class="number">134</div>
										<div class="title">Following</div>
									</div>
								</div>
							</div> -->
						</div>
					</div>

				</div>
			</div>
		</div>
		<?php } ?>
<?php
	include_once("footer.php");
?>	
<script>
function confirm_alert(node) {
  return confirm("Are you sure want to Update");
}

</script>