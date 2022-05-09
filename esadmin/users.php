<?php
require_once("../main_function.php");
require_once("class/organization.php");
require_once("pagination.php");
 $obj=new operation;
 $obj_org= new Organization;
 
$users= $obj->get_all_users();



if(isset($_POST['submit'])){

	$obj->set_campaign_list($_POST);
	
}
if(isset($_GET["search"])) {

		 $firstName = (isset($_GET['firstName']) ? $_GET['firstName'] : '');
    	 $email = (isset($_GET['email']) ? $_GET['email'] : '');;
    	 $firstNum=(isset($_GET['firstNum']) ? $_GET['firstNum'] : '');
    	 $access_group=(isset($_GET['access_group']) ? $_GET['access_group'] : '');
		// var_dump($firstName);
		// exit();

  

	  
        $whereArr = array();
        if($firstName != "") $whereArr[] = "firstName LIKE '%$firstName%' OR firstName LIKE '%$firstName%' ";        
        if($email != "") $whereArr[] = " email = '{$email}'";
        if($firstNum != "") $whereArr[] = "firstNum = '{$firstNum}'";
        if($access_group != "") $whereArr[] = "roleId = '{$access_group}'";


        
        
        
        $whereStr = implode(" AND ", $whereArr);

        if(!empty($whereStr)){
			$statement = "user_tbl WHERE {$whereStr} "; 
		}else{
			$statement = "user_tbl ";
		}	
           
           
        $statement .= " ORDER BY user_id DESC";
        $customers = QB::query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}")->get();
                
        $total_search_customer = QB::query("SELECT COUNT(user_id ) as num FROM {$statement} ")->first();
        $total_active_customer= $total_search_customer->num;

	}

	
	
include_once("header.php");
include_once("menu.php");
    ?>
     <style type="text/css">
/*Custom Checkbox Style*/
/* Customize the label (the checkbox-wrapper) */
.checkbox-wrapper {
    display: block;
    position: relative;
    padding-left: 25px;
    margin-bottom: 5px;
    cursor: pointer;
    font-size: 17px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.checkbox-wrapper input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.table .checkbox-wrapper .checkmark {
    border-radius: 2px;
}
/* Create a custom checkbox */
.checkbox-wrapper .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #ccc;
}

/* On mouse-over, add a grey background color */
.checkbox-wrapper:hover input ~ .checkmark {
	background-color: #ddd;
}

/* When the checkbox is checked, add a Green background */
.checkbox-wrapper input:checked ~ .checkmark {
	background-color: #007bff;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkbox-wrapper .checkmark:after {
	content: "";
	position: absolute;
	display: none;
}

/* Show the checkmark when checked */
.checkbox-wrapper input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.checkbox-wrapper .checkmark:after {
    left: 7px;
    top: 2px;
    width: 7px;
    height: 14px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

.checkbox.checkbox-wrapper {
    line-height: normal;
}
.checkbox.checkbox-wrapper label {
    padding: 0;
    font-size: 15px;
}
/*Custom Checkbox Style*/

.text-right.mt-3.mb-3 {
    padding-right: 10px;
}
</style>
<div class="main-panel">
	<div class="container">
		<div class="page-inner">
			<!-- <a href="new-request-arch.php" target="_blank" class="btn btn-sm btn-info pull-right text-white">New Request</a> -->
			<div class="page-header">
				<h4 class="page-title"> <span class="text-success">Arch Directory</span> <span class="text-danger">User List</span> </h4>
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
						<div class="card-header">
							<form name="frmSearch" method="GET" action="" class="arch-request-form">
							<div class="search-box">
								<div class="row">
									<div class="col-12 col-md-6 col-lg-3 col">
										<div class="form-group">
											<input type="text" placeholder="Name" name="firstName" class="form-control" value="<?php echo isset($_GET['firstName']) ? $_GET['firstName'] : ''; ?>">
										
										</div>
									</div>
									<div class="col-12 col-md-6 col-lg-3 col">
										<div class="form-group">
											<input type="text" placeholder="Email" name="email" class="form-control" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
										
										</div>
									</div>
									<div class="col-12 col-md-6 col-lg-3 col">
										<div class="form-group">
											<input type="text" placeholder="Mobile" name="firstNum" class="form-control" value="<?php echo isset($_GET['firstNum']) ? $_GET['firstNum'] : ''; ?>">
										
										</div>
									</div>
									<div class="col-12 col-md-6 col-lg-2 col">
										<div class="form-group">	
											<div class="select2-input">
												<select  name="access_group" class="form-control basic2">
													<option value="">Access Group</option>							
													<?php foreach($obj_org->USER_ACL_LIST() AS $key => $value){ ?>
													<option value="<?php echo $key;?>" <?php if(isset($_GET["access_group"])){if($_GET["access_group"]==$key){echo "SELECTED";}} ?>><?php echo $value;?></option>
													<?php } ?>	
												</select>
											</div>	
										</div>	
									</div>
									<!-- <div class="col-12 col-md-6 col-lg-3 col">
										<div class="form-group">
											<input type="text" placeholder="Access Group" name="name" class="form-control" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
										
										</div>
									</div> -->
									
									<div class="col-lg-1 col-xl-1 col-12">
										<div class="form-group">
											<input type="submit" name="search" class="btnSearch btn btn-primary" value="Search">
										</div>
									</div>
									<!-- <div class="col-lg-3 col-xl-2 col">
										<div class="form-group">
											<input type="reset" class="btnSearch btn btn-secondary btn-block" value="Reset" onclick="window.location='witty-request.php'">
										</div>	
									</div>	 -->
								</div>	
								</div>	
							</form>	
							</div>
						<!-- id="basic-datatables" -->
				<?php	if(!empty($customers)){  ?>
						<div class="arch-table-wrapper">
							<div class="table-responsive">
								<form method="post" action="">
								<table id="basic-datatables" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>SN</th>
											<th>Name</th>
											<th>Mobile</th>
											<th>Email</th>
											<th>Department</th>
											<th>Designation</th>	
											<th>Access Group</th>										
											<th>Status</th>
											<th>Option</th>
												
										</tr>
									</thead>						
									<tbody>
									<?php 
                                       $start=0;
							          if(isset($_GET['pages'])){
								           $page=$_GET['pages'];
								           $start=($page-1)*$per_page;
								        }
									 foreach ($customers as $data) { $start+=1;
                                       
                                            
									  ?> 
										<tr>
											<td><?php echo $start; ?></td>
											<td><?php echo $data->firstName; ?></td>
											<td><?php echo $data->firstNum; ?></td>
											<td><?php echo $data->email ; ?></td>
											<td><?php echo $data->depart; ?></td>
											<td><?php echo $data->desig; ?></td>
											<td><?php  if(!empty($data->roleId)){ 
												$roleId= $obj_org->return_access($data->roleId); 
                                                     echo $roleId;
                                                 }else{ 
                                                 	echo "NA";}
											  ?>
											</td>	
											<td><?php echo $obj->user_status_list($data->status); ?></td>
											<td><button type="button" class="btn-xs btn-success"><a target="_blank" href="user-profile.php?id=<?php echo ID_encode($data->user_id); ?>"><i class="fas fa-angle-double-right"></i></a></button></td>
											
										</tr>
										<?php   } ?>		
									</tbody>
								</table>
						
							</form>
							<?php 
								echo '<div class="pagination-wrapper">'; 
								echo '<div class="col-md-12">';
								echo pagination($statement,$per_page,$page,curPageURL());  ?>
								<p><?php if(!empty($total_active_customer)){ echo "Total Result :  ".$total_active_customer; } ?></p>
									</div>
								 </div>									  
							</div>
						</div>
					<?php } ?>					
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
<?php include_once("footer.php");?>
<style type="text/css">
	.data-content{
		font-size: 8px;
	}
</style>
<script type="text/javascript">
	//to check all checkboxes
$(document).on("change","#check_all",function(){
	$("input[class=case]:checkbox").prop("checked", $(this).is(":checked"));
});
</script>