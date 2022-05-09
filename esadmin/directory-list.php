<?php
require_once("../main_function.php");
// require_once("perpage.php");
require_once("pagination.php");
 $obj=new operation;
 
$users= $obj->get_all_users();

	if (isset($_POST['submit'])) {
	
		$reqId = $_POST['inputId'];
		//$featured_org = $_POST['featured_org'];
		$getValue = QB::table('special_org')->where('reqID','=',$reqId)->where('type',2)
		->first();


		if (!empty($getValue)) {
			 $update="This Featured  All Ready Inserted";
			 echo"<script> window.location.replace('directory-list.php?msg=$update');</script>";
		}else{

			$obj->special_org($_POST);
			$update="The Featured Inserted Successfully";
			 echo"<script> window.location.replace('directory-list.php?msg=$update');</script>";
		}
		

			//$obj->special_org($_POST);
		 
	}

	// if(isset($_GET["search"])) {

	// 	 $name = $_GET["name"];
 //    	 $approved_status = $_GET["approved_status"];
 //    	 $institute_type=$_GET["institute_type"];
 //    	 $district=$_GET["district"];
 //    	 $webInfo = $_GET["info"];
 //   	 	 $from_date = $_GET['from_date'];
 //    	 $today =$_GET['today_date'];

		$name = isset($_GET["name"]) ? $_GET['name'] : NULL;
		$approved_status = isset($_GET["approved_status"]) ? $_GET['approved_status'] : NULL;
		$institute_type = isset($_GET["institute_type"]) ? $_GET['institute_type'] : NULL;
		$district = isset($_GET["district"]) ? $_GET['district'] : NULL;
		$webInfo = isset($_GET["info"]) ? $_GET['info'] : NULL;
		$from_date = isset($_GET["from_date"]) ? $_GET['from_date'] : NULL;
		$today = isset($_GET["today_date"]) ? $_GET['today_date'] : NULL;

    	 if(!empty($from_date)){ 
	     $fromDate = DateTime::createFromFormat('d/m/Y', $from_date);
	     $fromToDate= $fromDate->format('Y-m-d');
	       }
    	 if(!empty($today)){ 
	     $date = DateTime::createFromFormat('d/m/Y', $today);
	     $to_date= $date->format('Y-m-d');
	       }
	     

	  
        $whereArr = array();
        
        if($name != "") $whereArr[] = "name LIKE '%$name%' OR institute_name LIKE '%$name%' ";        
        if($approved_status != "") $whereArr[] = " approved_status = '{$approved_status}'";
        if($institute_type != "") $whereArr[] = "org_type = '{$institute_type}'";

          if($webInfo=='1'){
         	$whereArr[] = " header_image !='' AND gallery !='' AND contact_number !='' AND intro_text !='' AND web_link !='' AND fb_link !='' ";
         }elseif($webInfo=='2'){
         	$whereArr[] = " header_image ='' AND gallery ='' AND contact_number ='' AND intro_text ='' AND web_link ='' AND fb_link ='' ";
       	}
       
        if($district != "") $whereArr[] = " district = '{$district}'";
      
        if(!empty($to_date)){
        if($to_date != "") $whereArr[] = "DATE(req_date) BETWEEN  '" . $fromToDate . "' AND  '" . $to_date . "'";
         }

        
        $whereStr = implode(" AND ", $whereArr);
        	
        if(!empty($whereStr)){
			$statement = "arch_client_req_tbl LEFT JOIN special_org ON arch_client_req_tbl.id = special_org.reqID WHERE {$whereStr}  "; 
		}else{
			$statement = "arch_client_req_tbl LEFT JOIN special_org ON arch_client_req_tbl.id = special_org.reqID ";
		}	
           
           
        $statement .= " ORDER BY arch_client_req_tbl.id DESC";
        $customers = QB::query("SELECT arch_client_req_tbl.*, reqID FROM {$statement} LIMIT {$startpoint} , {$per_page}")->get(); 
           
        $total_search_customer = QB::query("SELECT COUNT(arch_client_req_tbl.id) as num FROM {$statement} ")->first();
        $total_active_customer= $total_search_customer->num;

	//}
	
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
			<a href="directory-org-request-new" target="_blank" class="btn btn-sm btn-info pull-right text-white">New Request</a>
			<div class="page-header">
				<h4 class="page-title"> <span class="text-success">Arch Directory</span> <span class="text-danger">Request List</span> </h4>
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
											<input type="text" placeholder="Search By Hospital/Clinic Name" name="name" class="form-control" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
										
										</div>
									</div>
									<div class="col-12 col-md-6 col-lg-3 col">
										<div class="form-group">	
											<div class="select2-input">
												<select  name="institute_type" class="form-control basic2">
													<option value="">All Institute Type</option>							
												
													<option value="1" <?php if(isset($_GET["institute_type"]) && $_GET["institute_type"]=="1"){ echo "SELECTED"; } ?>>Hospital</option>  
				                                    <option value="2" <?php if(isset($_GET["institute_type"]) && $_GET["institute_type"]=="2"){ echo "SELECTED"; } ?>>Clinic</option>
				                                    <option value="3" <?php if(isset($_GET["institute_type"]) && $_GET["institute_type"]=="3"){ echo "SELECTED"; } ?>>Diaganostic</option>
				                                    <option value="4" <?php if(isset($_GET["institute_type"]) && $_GET["institute_type"]=="4"){ echo "SELECTED"; } ?>>Others</option>
												</select>
											</div>	
										</div>	
									</div>
									<div class="col-12 col-md-6 col-lg-2 col">
										<div class="form-group">	
											<div class="select2-input">
												<select  name="info" class="select2-input form-control basic2">
													<option value="">All Web Info</option>							
													<?php foreach($obj->info() AS $key => $value){ ?>
													<option value="<?php echo $key;?>" <?php if(isset($_GET["info"])){if($_GET["info"]==$key){echo "SELECTED";}} ?>><?php echo $value;?></option>
													<?php } ?>
													
												</select>
											</div>	
										</div>	
									</div>
									<div class="col-12 col-md-6 col-lg-2 col">
										<div class="form-group">	
											<div class="select2-input">
												<select  name="district" class="form-control basic2">
													<option value="">All District</option>							
													<?php foreach($obj->get_district() AS $key => $value){ ?>
													<option value="<?php echo $value->id;?>" <?php if(isset($_GET["district"])){if($_GET["district"]==$value->id){echo "SELECTED";}} ?>><?php echo $value->name;?></option>
													<?php } ?>	
												</select>
											</div>
										</div>	
									</div>
									<div class="col-12 col-md-6 col-lg-2 col">
										<div class="form-group">	
											<div class="select2-input">										
												<select name="approved_status" class="form-control basic">
													<option value="">All Status</option>
													<option value="1" <?php if(isset($_GET["approved_status"])){if($_GET["approved_status"]=="1"){echo "SELECTED";}} ?> >Pending</option>
													<option value="2" <?php if(isset($_GET["approved_status"])){if($_GET["approved_status"]=="2"){echo "SELECTED";}} ?>>Approved</option>
													<option value="3" <?php if(isset($_GET["approved_status"])){if($_GET["approved_status"]=="3"){echo "SELECTED";}} ?>>Complain</option>
													
												</select>
											</div>	
										</div>	
									</div>
							
									<div class="col-12 col-md-6 col-lg-3 col">
										<div class="form-group date-wrapper">											
											<div class="input-group">
												<input type="text" class="form-control" id="datepicker2" value="<?php if(isset($_GET["from_date"])){ echo $_GET['from_date'] ; }?>" name="from_date" placeholder="Request From Date (etc. DD/MM/YYYY)">
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="fa fa-calendar"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 col-md-6 col-lg-3 col">
										<div class="form-group date-wrapper">											
											<div class="input-group">
												<input type="text" class="form-control" id="datepicker3" value="<?php if(isset($_GET["today_date"])){ echo $_GET['today_date'] ; }?>" name="today_date" placeholder="Request To Date (etc.DD/MM/YYYY)">
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="fa fa-calendar"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
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
											<th>Organization</th>
											<th title="Organization Type">Type</th>
											<th title="Organization Contact Number">Contact</th>
											<th>District</th>	
											<th title="Directory Header Image">Header</th>										
											<th title="Directory Gallery Image">Gallery</th>
										    <th title="Organization Website Link">SITE</th>
										    <th title="Organization Facebook Link">FB</th>
										    <th title="Directory Status">Status</th>
										    <th>Hits No</th>
										    <th>Info</th>
										    <th>Special</th>					
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
                                      // $reqId=$data->id;
                                            
									  ?> 
										<tr>
											<td><?php echo $start; ?></td>
											<td><a href="directory-org-request-view.php?id=<?php echo ID_encode($data->id); ?>" target="_blank"><?php echo $data->institute_name;  ?></a></td>
											<td><?php echo  $obj->return_arch_type_list($data->org_type);  ?></td>	
											
						
											<td>
												<?php if (!$data->contact_number) {
													echo "<span> <font color=red>No</font> </span>";
												}else{
													echo 'Yes';
												 
												}?>
											</td>
											<td><?php  if(!empty($data->district)){ $district= $obj->return_district($data->district); 
                                               echo $district->name;}else{ echo "NA";}
											  ?>
											</td>	
											<td>
												<?php if (!$data->header_image) {
													echo "<span> <font color=red>No</font> </span>";
												}else{
													echo 'Yes';
												 
												}?>
											</td>
											<td>
												<?php if (!$data->gallery) {
													echo "<span> <font color=red>No</font> </span>";
												}else{
													echo 'Yes';
												 
												}?>
											</td>
											<td><?php 
												if (!$data->web_link) {
													echo "<span> <font color=red>No </font> </span>";
												}else{
													echo '<a target="_blank" href="'.$data->web_link.'"> Yes</a>';
												}

											 ?>
											 	
											 </td>
											 <td><?php 
												if (!$data->fb_link) {
													echo "<span> <font color=red>No </font> </span>";
												}else{
													echo '<a target="_blank" href="'.$data->fb_link.'"> Yes</a>';
												}

											 ?>
											 	
											</td>
											<td>
											<?php if ($data->approved_status =='2'){
												echo '<a href="'.SITE_URL.'profile/'.$data->slug_url.'">Approved</a>';
												 }else{  
												echo $obj->return_arch_status($data->approved_status);

												} ?>
											</td>
											<!-- <td><?php echo $obj->return_arch_status($data->approved_status); ?></td> -->
											<td><?php echo $data->hits; ?></td>
											<?php 
											
											if(!empty($data->update_by)){ 
											   $assign=$obj->detailsAndupdateProfile($data->update_by);
											   if(!empty($assign)){
											   $update=" Update By : ". $assign->firstName.''.$assign->lastName;
											 }else{
											 	$update= "";
											 }
											  }else{
												$update= "";
											  }

											     if(!empty($data->update_date)){ 
											     $update_date =" Update Date : ". $obj->return_times($data->update_date);
									     	     }else{
									     	 	 $update_date="";
									     	     }
											  
											     $req_date= $obj->return_times($data->req_date);
		                                        if($data->req_by!='0'){
												    	 $reqBy=$obj->detailsAndupdateProfile($data->req_by);
												    	 $reqBy=$reqBy->firstName;
												    }else{
												    	$reqBy="System";
												    }

											     if(!empty($data->next_followup_date)){ 
											        $next_f_date="Followup Date : ".$obj->return_convert_date($data->next_followup_date);
											     }else{
											        $next_f_date="";
											     } ?>									 	

										  	<td>
											  	<div class="btn btn-info btn-sm info-popover" data-trigger="hover" data-html="true" data-container="body" data-toggle="popover" data-placement="left" data-content="<p><?php echo "Request Date : .$req_date."; ?></p> " >
												  <i class="fa fa-info-circle" aria-hidden="true"></i>
												</div>
										  	</td>
										  	<td>
												<?php 
													if (!empty($data->reqID)) {
														echo  '<a style="text-decoration: none;" href="featured_update.php?reqid='.ID_encode($data->id).'&&type='.ID_encode(2).'" title="Feature Update"> Update</a>';	
													}else{
													echo '<button class="btn-xs btn-info text-white"><a href="#myModal" class="trash" data-id="'.$data->id.'" role="button" data-toggle="modal">
			    											<i class="fa fa-trash-o" title="Add In Top & Featured List">Add</i></a></button>';
														
													}

												 ?>
											</td>
										</tr>
										<?php  	} ?>		
									</tbody>
								</table>
						
							</form>
								<?php 
                        
			                       if(isset($_GET["name"])){
			                        $curPageUrl=curPageURL();
			                       }else{
			                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			                      
			                        $curPageUrl=$actual_link."?name=&institute_type=&info=&district=&approved_status=&from_date=&today_date=&search=Search";
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
							<div class="col-lg-6 text-danger text-center"><h1>No data found</h1></div>
					<?php } ?>				
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
<?php include_once("footer.php");?>

<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="myModalLabel">Add In Top & Featured List</h3>
        </div>
        <div class="modal-body">
            <form method="post" action="">
          	<div class="d-flex">
          		<input type="hidden" id="feed_id" name="inputId" />
     
				<div class="col-12 col-md-6 col-lg-4 col">
					<h2>Top</h2>
					<div class="form-group">	
						<div class="select2-input">
							<select  name="top_org" class="form-control basic2">
								<option>Select</option>
							  	<option value="1" >Yes</option>
							  	<option value="0" >No</option>	
							</select>
						</div>	
					</div>	
				</div>
				<div class="col-12 col-md-12 col-lg-4 col">
					<h2>Featured</h2>
					<div class="form-group">	
						<div class="select2-input">
							<select  name="featured_org" class="form-control basic2">
								<option>Select</option>
							  	<option value="1" >Yes</option>
							  	<option value="0" >No</option>	
							</select>
						</div>	
					</div>	
				</div>
          	</div>
          	<button name="submit" type="submit" class="btn btn-primary m-3">Save</button>
          	<button type="button" class="btn btn-secondary m-3" data-dismiss="modal">Close</button>
        	
        </form>
        </div>
      </div>
    </div>
</div>
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
<script type="text/javascript">
	$(document).ready(function () {
    $('body').on('click', '.trash',function(){
        document.getElementById("feed_id").value = $(this).attr('data-id');
           /* console.log($(this).attr('data-id'));*/
        });
    });
</script>
