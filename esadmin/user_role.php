<?php

require_once("../main_function.php");
//require_once("../connect.php");
require_once("class/organization.php");
$obj=new operation;
$org = new organization;

if(isset($_POST['submit'])){
	$role = $_POST['role'];
		/*$getRole= QB::("SELECT * FROM user_role ")->WHERE('role', '=', $role)->first();*/
		$getRole=QB::table('user_role')->where('role','=',$role)->first();
		
		if (!empty($getRole)) {
			//echo "<div class="col-lg-6">Failed</div>";
			$_SESSION['message'] = "User Role has been Allredy Exit";
      		header("location:user_role.php");
			//     $update="User Role has been Inserted";
				// echo"<script> window.location.replace('user_role.php?msg=$update');</script>";
		}else{
		$obj->set_role($_POST);
		if ($obj->set_role($_POST)) {
			$_SESSION['message'] = "You have updated successfully";
     		header("location:user_role.php");
		}
	}
	
}
$result=$obj->get_all_role();



include_once("header.php");
include_once("menu.php");
 ?>
	<div class="main-panel">
		<div class="container">
			<div class="page-inner">
	       <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#myModal"> Add Role </button>		
			<div class="page-header">
             <h4 class="page-title">Role List</h4>
             <?PHP	if(isset($_GET['msg'])){?>
			<div class='alert alert-success fade in col-md-6 offset-md-3' role='alert'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <?php echo $_GET['msg']; ?></div>	
			  <?php } ?> 
			</div>
			<?php if(isset($_SESSION['message'])): ?>
			     <div class="alert alert-success">
			     <?php echo $_SESSION['message']; ?>
			     </div>
			<?php endif; ?>
			<?php unset($_SESSION['message']); ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
						<!-- 	<div class="card-header">
								<h4 class="card-title">Basic</h4>
							</div> -->
							<div class="card-body">
								<div class="table-responsive">
									<table id="basic-datatables" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Name</th>
												<th>Option</th>										
											</tr>
										</thead>
										<tbody>
										  

											<?php foreach ($result as  $value) { ?>
											<tr>
								             <td><?php echo $value->role ?></td>
								             <?php if ($value->id!=3) { ?>
								             <td><a href="user_role_view.php?id=<?php echo $value->id; ?>" class="btn btn-info btn-xs">Details</a></td>
								               <?php } ?>
											</tr>										
											<?php } ?>										
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
			</div>


			<!-- The Modal -->
			<div class="modal fade" id="myModal">
			    <div class="modal-dialog">
			      <div class="modal-content">      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Add new Role</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <form method="POST" action="">
			        <!-- Modal body -->
				        <div class="modal-body">
					        <div class="form-group">
					            <label for="p-in" class="col-md-3 label-heading">Name</label>
					            <div class="col-md-8 ui-front">
					                <input required="" type="text" class="form-control" name="role" value="">
					            </div>
					       </div>
				        </div>        
				        <!-- Modal footer -->
				        <div class="modal-footer">
				         <input type="submit" name="submit" class="btn btn-primary btn-xs" value="Add">
				          <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
				        </div>
				    </form>        
			      </div>
			    </div>
			</div>

   

<?php
	include_once("footer.php");
?>