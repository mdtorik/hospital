<?php

require_once("../main_function.php");
$obj=new operation;

if(isset($_GET['id'])){
	$reqId=ID_decode($_GET['id']);
	$res = $obj->get_featured($reqId);
}

if(isset($_GET["reqid"]) && isset($_GET["type"])){
	$reqId=ID_decode($_GET['reqid']);
	$type=ID_decode($_GET["type"]);
	
	$res=$obj->get_fetured_request($reqId,$type);
  if(empty($res)){
  	echo"<script> window.location.replace('arch-request.php');</script>";
  }

}

if(isset($_POST['submit'])){

	$obj->featured_update($_POST); 

 $_SESSION['message'] = "Save successfully";
 $feturedId= ID_encode($_POST['feturedId']);
  echo"<script> window.location.replace('featured_update.php?id=$feturedId');</script>";

}

include_once("header.php");
include_once("menu.php");
?>
<div class="main-panel">
<div class="container">
<div class="page-inner">
<!-- <div class='alert alert-success fade in col-md-6 offset-md-3' role='alert'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <?php echo $_GET['msg']; ?></div> -->
<div class="page-header">
<h4 class="page-title"> <span class="text-success"><?php 
    if ($res->type == '2') {
    	echo "Arch";
    }else if($res->type == '1'){
    	echo "Witty";
    }
 ?> Directory </span><span class="text-danger"><?php echo $res->institute_name;  ?></span> Top And Featured Update</span> </h4>
<?PHP	if(isset($_GET['msg'])){?>
<div class='alert alert-success fade in col-md-6 offset-md-3' role='alert'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <?php echo $_GET['msg']; ?></div>	
<?php } ?> 	

	
</div>
<?php if(isset($_SESSION['message'])): ?>
  <div class="alert alert-success">
  <?php echo $_SESSION['message']; ?>
  </div>
<?php endif; ?>
<div class="row arch-demo-page">
	<div class="col-xl-12 col-lg-12 col-md-12">
		<div class="card card-with-nav">
			<div class="card-header">
			</div>
		<div class="card-body">
			<form  method="POST" action="" enctype="" >
				<div class="row">
					<div class="col-lg-6">
						<div class="card border border-primary" style="width: 35rem;">
							 <div class="card-header bg-primary">Details Information</div>
						  	<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
								<input type="hidden" value="<?php echo $res->id; ?>" name="feturedId">
										<label>ORGANIZATION NAME:</label> 
										<h4 class="text-success"><?php echo $res->institute_name; ?></h4>
										<label >CONTACT NAME:</label>
								    	<h5 class="font-weight-bold"><?php echo $res->contactName ?></h5>
									</div >
									<div class="col-lg-6">
										<label>ORGANIZATION ADDRESS:</label>
										<h5 class="font-weight-bold"><?php echo $res->org_address; ?>,<?php echo $res->districtName; ?></h5>
									</div>
								</div>
						 	</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group date-wrapper">
								    <label >Top Organization</label>
								     <select class="form-control js-example-basic-single" name="top_org" id="status_id" value="" >
								     	<option>Select Top</option>
									    <option value="1" <?php if(isset($res->top_org)){if($res->top_org=="1"){echo "SELECTED";}} ?>>Yes</option>
									    <option value="0" <?php if(isset($res->top_org)){if($res->top_org=="0"){echo "SELECTED";}} ?>>No</option>
								     </select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group date-wrapper">
								    <label >Featured Organization</label>
								     <select class="form-control js-example-basic-single" name="featured_org" id="status_id" value="" >
								     	<option>Select Featured</option>
									    <option value="1" <?php if(isset($res->featured_org)){if($res->featured_org=="1"){echo "SELECTED";}} ?>>Yes</option>
									    <option value="0" <?php if(isset($res->featured_org)){if($res->featured_org=="0"){echo "SELECTED";}} ?>>No</option>
								     </select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group date-wrapper">
								    <label >Status </label>
								     <select class="form-control js-example-basic-single" name="status" id="status_id" value="" >
								     	<option>Select Status</option>
									    <option value="1" <?php if(isset($res)){if($res->status=="1"){ echo "SELECTED"; }} ?>>Approved</option>
									    <option value="0" <?php if(isset($res)){if($res->status=="0"){ echo "SELECTED"; }} ?>>Canceled</option>
								     </select>
								</div>
							</div>
							<div class="col-md-12 text-right " style="margin-top: 10px;">
								<button onclick='return confirm_alert(this);' type="submit" name="submit" class="btn btn-success btn-rounded btn-login">Save </button>
								<a href="featured.php" class="btn btn-warning btn-rounded">Back</a>
							</div>
			         	</div>
					</div>
				</div>

	         	<!-- Row Ends -->
			</form>
		</div>
		</div>
	</div>
	<!-- Comment Section Starts -->

	<!--  Document Section Starts-->


</div>
</div>
</div>
<style type="text/css">
	.sms textarea.form-control {
	    resize: none;
	    border: 2px solid #7fd000;
	    box-shadow: 0 10px 19px -10px #7fd000;
	    margin-bottom: 15px;
	    transition: all .35s ease-in 0s;
	}
	.sms textarea.form-control:focus {
	    box-shadow: 0 10px 19px -10px #29b3e7;
	}
	ul#sms-counter {
	    padding: 0;
	    list-style: none;
	}
	ul#sms-counter>li {
	    display: initial;
	    padding: 0 5px;
	    font-weight: 600;
	}
	ul#sms-counter>li>span {
	    color: red;
	}
	.sms-note {
	    background: #F5F5F5;
	    border-radius: 10px;
	    padding: 10px 10px;
	}
	.sms-note p {
	    margin-bottom: 5px;
	}
</style>
<style type="text/css">
.arch-demo-page .card-body>form>.row>div {
padding: 0 5px;
}
.select2-input .select2{
width: auto!important;
}
.arch-demo-page .form-group, .arch-demo-page .form-check{
padding: 0;
margin-bottom: 5px;
}
.arch-demo-page .form-group label, .arch-demo-page .form-check label {
text-transform: uppercase;
color: #848484!important;
font-weight: normal;
font-size: 12px!important;
margin-bottom: 5px;
}
.arch-demo-page .form-control {
padding: 5px;
}
.arch-demo-page .form-control, .arch-demo-page .select2-container--bootstrap .select2-selection--single{
height: 35px!important;
}
.arch-demo-page .select2-container--bootstrap .select2-selection {
border: 1px solid #ebedf2;
padding: 5px;
}
.arch-demo-page .form-group.date-wrapper {
padding: 0;
}
.arch-demo-page .campaignsName {
margin-bottom: 5px;
display: inline-block;
font-size: 12px;
}
.arch-demo-page .campaignsName:first-child{
background: #E8F1FA;
color: #1976D2;
font-weight: 600;
padding: 2px 5px;
border-radius: 5px;
}
.arch-demo-page .campaignsName:nth-child(2){
background: #FFF4E5;
color: #FF9706;
font-weight: 600;
padding: 2px 5px;
border-radius: 5px;
}
.arch-demo-page .campaignsName:nth-child(3){
background: #F6ECF8;
color: #AE4DBE;
font-weight: 600;
padding: 2px 5px;
border-radius: 5px;
}
.arch-demo-page .campaignsName:nth-child(4){
background: #e5f7ec;
color: #00b44a;
font-weight: 600;
padding: 2px 5px;
border-radius: 5px;
}
.arch-demo-page .campaignsName:last-child{
background: #fdeded;
color: #ef5350;
font-weight: 600;
padding: 2px 5px;
border-radius: 5px;
}
.arch-demo-page textarea.orgAddress {
min-height: 35px;
}
.arch-demo-page textarea.remarks {
min-height: 5em;
}
.arch-demo-page textarea{
width: 100%;
resize: vertical!important;
border-color: #ebedf2;
}
.arch-demo-page textarea:focus{
border-color: #3e93ff;
}
.btn {
padding: 5px 20px;
}
/*Show/Hide Comment Section*/
.arch-demo-page .write-sms-button {
	font-weight: 600;
	color: #1976D2;
	cursor: pointer;
	margin-bottom: 5px;
	outline: 0;
}
.arch-demo-page #sms-section {
	overflow: hidden;
	display: none;
}
.arch-demo-page #comment-section {
	overflow: hidden;
	display: none;
}
.arch-demo-page textarea.comments {
	min-height: 5em!important;
}
.colorGrey {
	color: #777;
	font-weight: 700;
}

@media (min-width: 1200px){
	/*Main Form & Comment Section Height*/
	.card.card-with-nav, .card.commentCard {
		min-height: 58em;
	}
	/*Email and Latest SMS Card*/
	.card.emailCard, .card.latestSMSCard {
		min-height: 38em;
	}

}
</style>

<?php include_once("footer.php"); ?>
<script>
function confirm_alert(node) {
  return confirm("Are you sure want to Update");
}

</script>
