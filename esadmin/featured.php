<?php
require_once("../main_function.php");
// require_once("perpage.php");
require_once("pagination.php");
$obj=new operation;

   	
		$institute_name = isset($_GET["institute_name"]) ? $_GET['institute_name'] : NULL;
		$type = isset($_GET["type"]) ? $_GET['type'] : NULL;
		$status = isset($_GET["status"]) ? $_GET['status'] : NULL;
		$featured_org = isset($_GET["featured_org"]) ? $_GET['featured_org'] : NULL;
    	$top_org = isset($_GET["top_org"]) ? $_GET['top_org'] : NULL;
    	if($type=='1'){    		
	    $tbl="witty_client_req_tbl";
    	}elseif($type=='2'){
	    $tbl="arch_client_req_tbl";
	  }else{
	  	$tbl="arch_client_req_tbl";
	  }
        $whereArr = array();
        if($institute_name != "") $whereArr[] = " institute_name LIKE '%$institute_name%' ";
        //if($status != "") $whereArr[] = " special_org.status = '{$status}'";
         if($type =='2'){
         	$whereArr[] = " type !='' ";
         }elseif($type =='1'){
         	$whereArr[] = "type ='' ";
       	}

       	if($status =='1'){
         	$whereArr[] = " special_org.status !='' ";
         }elseif($status =='0'){
         	$whereArr[] = "special_org.status ='' ";
       	}
       	if($top_org =='1'){
         	$whereArr[] = " top_org !='' ";
         }elseif($top_org =='0'){
         	$whereArr[] = "top_org ='' ";
       	}

       	if($featured_org =='1'){
         	$whereArr[] = " featured_org !='' ";
         }elseif($featured_org =='0'){
         	$whereArr[] = "featured_org ='' ";
       	}
       
        
        
        $whereStr = implode(" AND ", $whereArr);

        if(!empty($whereStr)){
			$statement = "special_org LEFT JOIN {$tbl} ON special_org.reqID = {$tbl}.id WHERE {$whereStr} "; 
		}else{
			$statement = "special_org LEFT JOIN {$tbl} ON special_org.reqID = {$tbl}.id ";
		}	
           
           
        $statement .= " ORDER BY special_org.id DESC";
        $customers = QB::query("SELECT special_org.*, {$tbl}.institute_name FROM {$statement} LIMIT {$startpoint} , {$per_page}")->get();

        $total_search_customer = QB::query("SELECT COUNT(special_org.id) as num FROM {$statement} ")->first();
        $total_active_customer= $total_search_customer->num;

	
        
	
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
			<div class="page-header">
				<h4 class="page-title"> <span class="text-success">Arch Directory</span> <span class="text-danger">Featured List</span> </h4>
			<?PHP	if(isset($_GET['msg'])){?>
			<div class='alert alert-success fade in col-md-6 offset-md-3' role='alert'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <?php echo $_GET['msg']; ?></div>	
			  <?php } ?> 		
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<form name="frmSearch" method="GET" action="" class="arch-request-form">
								<div class="search-box">
									<div class="row">
										<div class="col-12 col-md-6 col-lg-2 col">
											<div class="form-group">
												<select  name="type" class="form-control" required="">
													<option value="2" <?php if(isset($_GET["type"]) && $_GET["type"]=="2"){ echo "SELECTED"; } ?>>Arch</option>	
													<option value="1" <?php if(isset($_GET["type"]) && $_GET["type"]=="1"){ echo "SELECTED"; } ?>>Witty</option>	
												</select>
											
											</div>
										</div>

										<div class="col-12 col-md-6 col-lg-3 col">
											<div class="form-group ">
												<input type="text" placeholder="Search By Hospital/Clinic 
												Name" name="institute_name" class="form-control" value="<?php echo isset($_GET['institute_name']) ? $_GET['institute_name'] : ''; ?>">
											
											</div>
										</div>
										
										<div class="col-12 col-md-6 col-lg-2 col">
											<div class="form-group">
												<select  name="status" class="form-control">
													<option value="">All Status</option>
													<option value="1" <?php if(isset($_GET["status"]) && $_GET["status"]=="1"){ echo "SELECTED"; } ?>>Approved</option>	
													<option value="0" <?php if(isset($_GET["status"]) && $_GET["status"]=="0"){ echo "SELECTED"; } ?>>Canceled</option>	
												</select>										
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-2 col">
											<div class="form-group">
												<select  name="top_org" class=" form-control" >
													<option value="">All Top</option>
													<option value="1" <?php if(isset($_GET["top_org"]) && $_GET["top_org"]=="1"){ echo "SELECTED"; } ?>>Yes</option>	
													<option value="0" <?php if(isset($_GET["top_org"]) && $_GET["top_org"]=="0"){ echo "SELECTED"; } ?>>No</option>	
												</select>
											
											</div>

										</div>
										<div class="col-12 col-md-6 col-lg-2 col">
											<div class="form-group">
												<select  name="featured_org" class="form-control" >
													<option value="">All Featured</option>
													<option value="1" <?php if(isset($_GET["featured_org"]) && $_GET["featured_org"]=="1"){ echo "SELECTED"; } ?>>Yes</option>	
													<option value="0" <?php if(isset($_GET["featured_org"]) && $_GET["featured_org"]=="0"){ echo "SELECTED"; } ?>>No</option>	
												</select>
											
											</div>
										</div>
										<div class="col-lg-1 col-xl-1 col-12">
										<div class="form-group">
											<input type="submit" name="search" class="btnSearch btn btn-primary" value="Search">
										</div>
									</div>
									</div>	
								</div>	
							</form>	
						</div>
						<!-- id="basic-datatables" -->
				<?php	if(!empty($customers)){  ?>
						<div class="arch-table-wrapper">
							<div class="table-responsive">
								<form method="post" action="">
								<table id="basic-datatables" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>SN</th>
											<th>Organization</th>
											<th>Top Organization</th>
											<th>Featured Organization</th>
											<th>Status</th>
											<th>Action</th>					
										</tr>
									</thead>						
									<tbody>
									<?php 
                                       $start=0;
							          if(isset($_GET['pages'])){
								           $page=$_GET['pages'];
								           $start=($page-1)*$per_page;
								        }
									 foreach ($customers as $data) {

									  $start+=1;
                                      
                                            
									  ?> 
										<tr>
											<td><?php echo $start; ?></td>
											<td><?php echo $data->institute_name; ?></td>										
											
											<td><?php echo  $obj->return_featured_list($data->top_org); ?></td>
											 <td><?php echo  $obj->return_featured_list($data->featured_org); ?></td>
											
											<td>
												<?php echo $obj->featured_type_list($data->status); ?>

											</td>
											<td class="text-center">
												<div class="container">  
											        <div class="dropdown">  
											            <button class="btn-primary btn-xs"  data-toggle="dropdown">  
											               <i class="fas fa-angle-double-down"></i>
											            </button>  
											            <div class="dropdown-menu">  
											                <a target="_blank" class="dropdown-item text-success" href="featured_update.php?id=<?php echo ID_encode($data->id); ?>"> <i class="fas fa-edit"></i> Edit </a>  
											                <a class="dropdown-item text-success" onclick='return confirm_alert(this);' href="delete.php?id=<?php echo $data->id; ?>"> <i class="far fa-trash-alt"></i> Delete</a>  
											               
											            </div>  
											        </div>  
											    </div>
												<!-- <i class="fas fa-angle-double-down"></i>
												<button class=" mr-0 btn btn-success btn-rounded btn-login"><a href="featured_update.php?id=<?php echo $data->id; ?>">Update</a></button>
												<button class=" mr-0 btn btn-danger btn-rounded"><a href="delete.php?id=<?php echo $data->id; ?>"  onclick='return confirm_alert(this);'>Delete</a></button> -->
											</td>
										</tr>
										<?php   } ?>		
									</tbody>
								</table>
						
							</form>
								 <?php 
                        
			                       if(isset($_GET["institute_name"])){
			                        $curPageUrl=curPageURL();
			                       }else{
			                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			                      
			                        $curPageUrl=$actual_link;
			                       }
			                          echo '<div class="pagination-wrapper">'; 
			                          echo '<div class="col-md-12">';
			                          echo pagination($statement,$per_page,$page,$curPageUrl);
			                    
			                        
			                      ?>
								<p><?php if(!empty($total_active_customer)){ echo "Total Result :  ".$total_active_customer; } ?></p>
									</div>
								 </div>									  
							</div>
						</div>
					<?php }else{ ?>
						<div class="col-lg-6 text-danger text-center"><h1>No Data Found</h1></div>
					<?php } ?>					
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
<?php include_once("footer.php");?>
<script>
    
    setTimeout(function() {
        let alert = document.querySelector(".alert");
            alert.remove();
    }, 3000);
    // In your Javascript (external .js resource or <script> tag)

//     $(document).ready(function() {
//     $('.select').select2();
// });
    
</script>
<script>
function confirm_alert(node) {
  return confirm("Are you sure want to delete");
}

</script>

