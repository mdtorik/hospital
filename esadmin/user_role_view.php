<?php
require_once("../main_function.php");
$obj=new operation;


if(isset($_POST['submit'])){

	   $role = $_POST['role'];
	
		$getRole=QB::table('user_role')->where('role','=',$role)->first();
		
		if (!empty($getRole)) {
			 $_SESSION['message'] = "The Role alrady Exit";
    	header("location:user_role.php");
		}else{
		$obj->set_update($_POST);
		$_SESSION['message'] = "You have updated successfully";
    	header("location:user_role.php");
	}

}

if(isset($_GET['id'])){
 $res= $obj->get_role_one($_GET['id']);

}


include_once("header.php");
include_once("menu.php");
 ?>
	<div class="main-panel">
	<div class="container">
		<div class="page-inner view-status-page">
	     	<a onclick="return confirm('Are you sure want to delete?')" href="?status_id=<?php echo $res->id ?>"  class="btn btn-danger btn-xs pull-right">Delete</a>	
			<div class="page-header">
		       	<h4 class="page-title">Update Status</h4>	
			</div>
		       <?PHP	if(isset($_GET['msg'])){?>
			<div class='alert alert-success fade in col-md-6 offset-md-3' role='alert'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <?php echo $_GET['msg']; ?>
			</div>
			  <?php } ?> 	 
			<div class="row">
				<div class="col-md-12">
					<div class="card">	
				        <form method="POST" action="">
					        <div class="card-body">
					        	<div class="row">
						        	<div class="col-md-4">
								        <div class="form-group">
								            <label for="p-in" class="">Name</label>
								            <div class="">
								                <input type="text" class="form-control" name="role" value="<?php echo $res->role; ?>">
								                <input type="hidden" class="form-control" name="id" value="<?php echo $res->id; ?>">
								            </div>
								       	</div>
							       	</div>
							       	<div class="col-md-2">
							       		<div class="d-flex form-group">
							       			<input onclick='return confirm_alert(this);' type="submit" name="submit" class="btn btn-warning" value="Update">
							       			 
							       			<!--  <button  onclick='return confirm_alert(this);' class=" btn btn-success mt-4"><a href="user_role.php">Update</a></button> -->
								       	</div>
							       	</div>
							       	<div class="col-md-2">
							       		<div class="d-flex form-group">
							       			<button class=" btn btn-danger mt-4"><a href="user_role.php">Back</a></button>
								       	</div>
							       	</div>
						       	</div>
					        </div>	
				     	</form>   
					</div>
				</div>
			</div>					
		</div>
	</div>
<?php include_once("footer.php");?>
<script>
function confirm_alert(node) {
  return confirm("Are you sure want to Update");
}

</script>