<?php      
        include_once("../main_function.php");
        include_once("class/organization.php");
        $obj = new operation;
        $org = new Organization;

 if (isset($_GET['status'])) {
  if(session_destroy()){
  header("Location: index.php");
}
}

       $today = date('y-m-d');
        $from_date = isset($_GET["from_date"]) ? $_GET['from_date'] : NULL;
        $toDay = isset($_GET["today_date"]) ? $_GET['today_date'] : NULL;

    	 if(!empty($from_date)){ 
	     $fromDate = DateTime::createFromFormat('d/m/Y', $from_date);
	     $fromToDate= $fromDate->format('Y-m-d');
	       }
    	 if(!empty($toDay)){ 
	     $date = DateTime::createFromFormat('d/m/Y', $toDay);
	     $to_date= $date->format('Y-m-d');
	       }

	     $whereArr = array();
	       if(!empty($to_date)){
        if($to_date != "") $whereArr[] = " DATE(time) BETWEEN  '" . $fromToDate . "' AND  '" . $to_date . "'";
         }

        
        
        $whereStr = implode(" AND ", $whereArr);
        if(!empty($whereStr)){
			$statement = "log_web  WHERE {$whereStr}  "; 
		}else{
			$statement = "log_web";
		}	
           
        $getUser = QB::query("SELECT * FROM {$statement} GROUP BY userby")->get(); 
    
        //All Status
         $statusApproved = QB::query("SELECT COUNT(id) as num FROM arch_client_req_tbl WHERE approved_status = '2'")->first();
         $statusPending = QB::query("SELECT COUNT(id) as num FROM arch_client_req_tbl WHERE approved_status = '1'")->first();
         $statusComplain = QB::query("SELECT COUNT(id) as num FROM arch_client_req_tbl WHERE approved_status = '3'")->first();

        //total Organization
        $date = date('y-m-d');
        $totalOrg = QB::query("SELECT COUNT(id) as num FROM arch_client_req_tbl ")->first();
        //today inserts
        $todayArchUpdated = QB::query("SELECT COUNT(DISTINCT req_id) as num FROM log_web WHERE DATE(time) = '$date' AND req_type='2' AND type='2' ")->first();
        $todayWittyUpdated = QB::query("SELECT COUNT(DISTINCT req_id) as num FROM log_web WHERE DATE(time) = '$date' AND req_type='1' AND type='2' ")->first();
       
        //total hospital
        $totalHospital = QB::query("SELECT COUNT(id) as num FROM arch_client_req_tbl WHERE org_type = '1' ")->first();
        //total Clinic
        $totalClinic = QB::query("SELECT COUNT(id) as num FROM arch_client_req_tbl WHERE org_type = '2'")->first();
        //totalDiagnostic and Others
        $totalDiagnostic = QB::query("SELECT COUNT(id) as num FROM arch_client_req_tbl WHERE org_type = '3' ")->first();
        $others = QB::query("SELECT COUNT(id) as num FROM arch_client_req_tbl WHERE org_type = '4' ")->first();
       // $diagnosticAndOther = $totalDiagnostic->num+$others->num;
       
        //top and featured
		$top = QB::query("SELECT COUNT(id) as num FROM special_org WHERE top_org = '1' ")->first();
		$featured = QB::query("SELECT COUNT(id) as num FROM special_org WHERE featured_org ='1' ")->first();
		//$getUser = QB::query("SELECT * FROM `log_web` GROUP BY userby")->get();
		// var_dump($getUser);
		// exit();
		

        
	
include_once("header.php");
include_once("menu.php")
;
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

.bgColor{
	background-color:#1fba93;
}
.card{
	border: 1px solid white;
	border-radius: 10px;
}
</style>

<div class="main-panel">
	<div class="container">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title"> <span class="text-success">Arch Directory</span> <span class="text-danger">Dashboard</span> 
				</h4>
			<?PHP	if(isset($_GET['msg'])){?>
				<div class='alert alert-success fade in col-md-6 offset-md-3' role='alert'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <?php echo $_GET['msg']; ?>
				</div>	
			  <?php } ?> 		
			</div>
			<div class="card"> 
				<div class="row text-center text-white m-2">
					<!-- Status Count -->
					<div class="col-lg-3 ">
						<div class="card" style="width: 18rem; height: 12rem;">
							<div class="card-header bg-danger">
								<h2 class="border-bottom">Directory Status</h2>
							</div>
						  <div class="card-body">
						    <a style="text-decoration: none" target="_blink" href="directory-list.php?name=&institute_type=&info=&district=&approved_status=2&from_date=&today_date=&search=Search"><h6>Approved Status:<?php echo $statusApproved->num; ?></h6></a>
						    <a style="text-decoration: none" target="_blink" href="directory-list.php?name=&institute_type=&info=&district=&approved_status=1&from_date=&today_date=&search=Search"><h6>Pending Satatus: <?php echo $statusPending->num; ?></h6></a>
						    <a style="text-decoration: none" target="_blink" href="directory-list.php?name=&institute_type=&info=&district=&approved_status=3&from_date=&today_date=&search=Search"><h6>Complain Satatus: <?php echo $statusComplain->num; ?></h6></a>
						  </div>
						</div>
					</div>
					<!-- Top And Featured Count -->
					<div class="col-lg-3">
						<div class="card" style="width: 18rem; height: 12rem;">
							<div class="card-header bg-warning">
								<h2 class="border-bottom">Top & Featured Hospital</h2>
							</div>
						  <div class="card-body">
						    <a target="_blink" href="featured.php?type=2&institute_name=&status=All+Status&top_org=1&featured_org=All+Featured&search=Search"><h4>Top Hospital: <?php echo $top->num; ?></h4></a>
						  	<a target="_blink" href="featured.php?type=2&institute_name=&status=All+Status&top_org=All+Top&featured_org=1&search=Search"><h4>Featured Hospital: <?php echo $featured->num; ?></h4></a></div>
						</div>
					</div>
					<!-- Hospital/Clinic/Diagnostic Count -->
					<div class="col-lg-3">
						<div class="card" style="width: 18rem; height: 12rem;">
							<div class="card-header bg-success">
								<h2 class="border-bottom">Organization Type</h2>
							</div>
						  <div class="card-body">
						    <div class="row">
						    	<div class="col-lg-6"><a target="_blink" href="directory-list.php?name=&institute_type=1&info=&district=&approved_status=&from_date=&today_date=&search=Search"><h4>Hospitsl: <?php echo $totalHospital->num; ?></h4></a></div>
							    <div class="col-lg-6"><a target="_blink" href="directory-list.php?name=&institute_type=2&info=&district=&approved_status=&from_date=&today_date=&search=Search"><h4>Clinic: <?php echo $totalClinic->num; ?></h4></a></div>
							    <div class="col-lg-6"><a target="_blink" href="directory-list.php?name=&institute_type=3&info=&district=&approved_status=&from_date=&today_date=&search=Search"><h4>Diagnostic: <?php echo $totalDiagnostic->num; ?></h4></a></div>
							    <div class="col-lg-6"><a target="_blink" href="directory-list.php?name=&institute_type=4&info=&district=&approved_status=&from_date=&today_date=&search=Search"><h4>Others: <?php echo $others->num; ?></h4></a></div>
						    </div>
						  </div>
						</div>
					</div>
					<!-- Today arch And Witty Count -->
					<div class="col-lg-3">
						<div class="card" style="width: 18rem; height: 12rem;">
							<div class="card-header bg-info">
								<h2 class="border-bottom">Today Updated Request</h2>
							</div>
						  <div class="card-body text-danger">
						    <h4>Arch : <?php echo $todayArchUpdated->num; ?></h4>
						    <h4>Witty : <?php echo $todayWittyUpdated->num; ?></h4>
						  </div>
						</div>
					</div>					
				</div>
			
			</div>

			<div class="card border border-rounded" >
				<div>
					<h1 class=" text-danger">User Activity Info</h1>
				</div>
				
				<form method="GET" action="">
					<div class="row m-2">
						<div class="col-12 col-md-6 col-lg-4 col">
							<div class="form-group date-wrapper">											
								<div class="input-group">
									<input type="text" class="form-control" id="datepicker2" value="<?php if(isset($_GET["from_date"])){ echo $_GET['from_date'] ; }?>" name="from_date" placeholder="Search By Update From Date(etc. DD/MM/YYYY)" required="">
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="fa fa-calendar"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 col">
							<div class="form-group date-wrapper">											
								<div class="input-group">
									<input type="text" class="form-control" id="datepicker3" value="<?php if(isset($_GET["today_date"])){ echo $_GET['today_date'] ; }?>" name="today_date" placeholder="Search By Update To Date (etc. DD/MM/YYYY)" required="">
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="fa fa-calendar"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-1 col-xl-4 col-12">
							<div class="form-group">
								<input type="submit" name="search" class="btnSearch btn btn-primary" value="Search">
							</div>
						</div>
				</form>
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th title="Arch Or Witty">Type</th>
								<th title="Total Reaquest">Req</th>
								<th title="Total Publish">Publish</th>
								<th title="Total Update">Update</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($getUser as $data){ ?>
								<tr>
									<td><?php 
									if(!empty($data->userby)){
								    	 $reqBy=$obj->detailsAndupdateProfile($data->userby);
								    	 echo $reqBy->firstName;
								    }
									?></td>
									<td><?php if($data->req_type=='2'){ echo "Arch"; }else{ echo "Witty"; } ?></td>
									<td><?php 
										if (!empty($fromToDate)) {
											$reqCount = $org->request_count($data->userby,$data->req_type,$fromToDate,$to_date);
											echo $reqCount->num;
										}else{
											$reqCount = $org->request_count($data->userby,$data->req_type,$fromToDate=$today,$to_date=$today);
										echo $reqCount->num;
										}
									
									 ?></td>
									 <td>
									 	<?php 
							
									 		$totalPublish = $org->statusWiseReqLog($data->userby,1,$data->req_type,$fromToDate,$to_date);
											echo $totalPublish->num;
										
									 	 ?>
									 </td>
									 <td>
									 	<?php 
									 		$totalUpdate = $org->statusWiseReqLog($data->userby,2,$data->req_type,$fromToDate,$to_date);
									 		echo $totalUpdate->num;

									 	 ?>
									 </td>
								</tr>	
							<?php } ?>
						</tbody>
					</table>
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

