<?php
require_once("../main_function.php");

require_once("class/organization.php");
$org=new Organization;
$obj=new operation;
	if(isset($_GET['profileID'])){
		$profileID=ID_decode($_GET['profileID']);
		$row=$obj->detailsarchclientRequest($profileID);


	}

	if (isset($_POST['submit'])) {

	$id = $_POST['profileID'];
	$header_image = $_FILES['files']['name'][0];
	$gallery = $_FILES['gallery']['name'][0];
	$contact_number = $_POST['contact_number'];
	$intro_text = $_POST['intro_text'];
	$web_link = $_POST['web_link'];
	$fb_link = $_POST['fb_link'];
	$bname = $_POST['bname'];
	$institute_name = $_POST['institute_name'];
	$institute_type = $_POST['institute_type'];
	$bed_qty = $_POST['bed_qty'];
	$req_type = $_POST['req_type'];
	$name = $_POST['name'];
	$desig = $_POST['desig'];
	$mobile = $_POST['mobile'];
	$email = $_POST['bed_qty'];
	$district = $_POST['bed_qty'];
	$thana = $_POST['bed_qty'];
	$slug_url = create_slug($_POST['slug_url']);
	$approved_status = $_POST['approved_status'];	  

    $valid_formats = array("jpg", "png", "gif", "bmp");
    $max_file_size = 1024*4200; //4000 kb / 4MB			    
    $path = SITE_ROOT.DS."uploads".DS."archProfileImage".DS; // Upload directory    
		
			if (!empty($header_image)) {
				//remobe previous image  working
				// $filename = $row->header_image;
				  if (file_exists($path.'header'.DS.$row->header_image)) {
				    unlink($path.'header'.DS.$row->header_image); 
				  } 
				$image_stack=array();   
			
			    $image_name_in_arry="";

			  
			    // Loop $_FILES to execute all files
			  if ($_FILES['files']['size'] != 0 && $_FILES['files']['error'] != 0){

			    foreach ($_FILES['files']['name'] as $f => $name) 
			    {  
			        $file_tmp =$_FILES['files']['tmp_name'][$f];
			        $file_name = $_FILES['files']['name'][$f];
			        $file_type = $_FILES['files']['type'][$f];
			        $file_size = $_FILES['files']['size'][$f];
			    
			        $ext = pathinfo($file_name, PATHINFO_EXTENSION); // get the file extension name like png jpg
			        if ($_FILES['files']['error'][$f] == 4) {
			            continue; // Skip file if any error found
			        }          
			        if ($_FILES['files']['error'][$f] == 0) {              
			     
			                if(move_uploaded_file($file_tmp,$path.'header'.DS.$file_name))
			                    $new_dir= uniqid().rand(1000, 9999).".".$ext;                
			                    $new_name = rename($path.'header'.DS.$file_name,$path.'header'.DS.$new_dir) ; // rename file name
			                    array_push($image_stack,$new_dir); // file name store in array          
			                }               
			    }
			    

			    $image_name_in_arry=implode(",", $image_stack);
		    
		  } 

		$header_imageNew=$image_name_in_arry;
		}else{
			$image =$_POST['previousImage'];
		}

	if (!empty($header_imageNew)) {
	    	 	$header_image = $header_imageNew;
	    	 }else{
	    	 	$header_image= $row->header_image;
	    	 }

	//image upload at gallery
    // Loop $_FILES to execute all files
    	if (!empty($gallery)) {
    		
    		//remobe previous image  working
				$filename = explode(',', $row->gallery);
					foreach ($filename as $value) {
						if (file_exists($path.'gallery'.DS.$value)) {
                           unlink($path.'gallery'.DS.$value);					    
					     } 
					 }
                  
                   $image_stack=array();				  
				    /*$path =  SITE_ROOT.DS."website".DS."images".DS."slide".DS;*/ // Upload directory
				  
				   $image_name_in_arry="";
				    	 if ($_FILES['gallery']['size'] != 0 && $_FILES['gallery']['error'] != 0){

				    foreach ($_FILES['gallery']['name'] as $f => $name) 
				    {  
				        $file_tmp =$_FILES['gallery']['tmp_name'][$f];
				        $file_name = $_FILES['gallery']['name'][$f];
				        $file_type = $_FILES['gallery']['type'][$f];
				        $file_size = $_FILES['gallery']['size'][$f];				    
				        $ext = pathinfo($file_name, PATHINFO_EXTENSION); // get the file extension name like png jpg
				        if ($_FILES['gallery']['error'][$f] == 4) {
				            continue; // Skip file if any error found
				        }          
				        if ($_FILES['gallery']['error'][$f] == 0) { 				     
				                if(move_uploaded_file($file_tmp,$path.'gallery'.DS.$file_name))
				                    $new_dir= uniqid().rand(1000, 9999).".".$ext;                
				                    $new_name = rename($path.'gallery'.DS.$file_name,$path.'gallery'.DS.$new_dir) ; // rename file name
				                    array_push($image_stack,$new_dir); // file name store in array 
				                }               
				    }
				    $image_name_in_arry=implode(",", $image_stack);
				  } 
					$galleryNew=$image_name_in_arry;

			    	 }else{
			    	 
			    	 	$galleryImage = $_POST['galleryImage'];

				    	
			    	 }

			    	 if(!empty($galleryNew)) {
			    	 	$gallery = $galleryNew;
			    	 }else{
			    	 	$gallery= $row->gallery;
			    	 }
			

	$data = array(

		'header_image'=>$header_image,
		'gallery'=>$gallery,
		'contact_number'=>$contact_number,
		'intro_text'=>$intro_text,
		'web_link'=>$web_link,
		'fb_link'=>$fb_link,
		'bname'=>$bname,
		'slug_url'=>$slug_url,
		'institute_name'=>$institute_name,
		'institute_type'=>$institute_type,
		'bed_qty'=>$bed_qty,
		'req_type'=>$req_type,
		'name'=>$name,
		'desig'=>$desig,
		'mobile'=>$mobile,
		'email'=>$email,
		'district'=>$district,
		'thana'=>$thana
		
		//'gallery'=>$gallery

	);


$update = QB::table('arch_client_req_tbl')->where('id', '=', $id)->update($data);
$district=$obj->get_district();
$msg=2;
$reqID=ID_encode($id);
echo"<script> window.location.replace('arch-web-info-view.php?profileID=$reqID&msg=$msg');</script>";
      

}

include_once("header.php");
include_once("menu.php");
?>
<div class="main-panel">
<div class="container">
<div class="page-inner">

<h4 class="page-title"><span class="fgRed"></span> <span class="colorOrange"><a href="arch-demo-view?id=<?php echo $row->id; ?>" target='_blank'><?php echo $row->institute_name ?> </a></span> Web Info</h4>
<?PHP
if(isset($_GET['msg'])){
   if($_GET['msg']=='3'){
   	$_GET['msg']="Campaign Deleted Successfully";

   }elseif($_GET['msg']=='1'){
   	 	$_GET['msg']="Add Successfully";
   }elseif($_GET['msg']=='2'){
     	$_GET['msg']="Update Successfully";
   }elseif ($_GET['msg']=='11') {
   		$_GET['msg']="Already Exist";
   }
	?>
<div class='alert alert-success fade in col-md-6 offset-md-3' role='alert'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <?php echo $_GET['msg']; ?></div>
<?php
}
// unset($_SESSION['msg']);
// echo "<pre>";
// var_dump($result);
// echo "</pre>";

?>


<div class="row arch-demo-page">
	<div class="col-xl-12 col-lg-12 col-md-12">
		<div class="card card-with-nav">
			<div class="card-header">

			</div>
		<div class="card-body">
			<form  method="POST" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label>Organization Name</label>
							<input type="text" class="form-control" name="institute_name" placeholder="Organization Name" value="<?php echo $row->institute_name ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Type</label>
							<div class="select2-input">
								<select required name="institute_type" class="form-control basic">
								    <option value="">Select Type</option>
								    <?php foreach($obj->arch_type_list() AS $key => $value){ ?>
								    <option value="<?php echo $key;?>" <?php if(!empty($row->org_type)){ if($key==$row->org_type){echo "SELECTED"; }} ?>><?php echo $value;?></option>
								    <?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Beds</label>
							<input type="number" class="form-control" name="bed_qty" placeholder="Beds No" value="<?php echo $row->bed_qty ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						    <label >Bangla Name</label>
						    <input type="text" class="form-control" placeholder="Bangla Name" name="bname" value="<?php echo $row->bname; ?>" >
						   <input type="hidden" class="form-control" placeholder="" name="profileID" value="<?php echo $row->id; ?>" >
						  </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						    <label >Contact Number</label>
						    <input class="form-control" placeholder="018XXXXXXXX,...," name="contact_number" value="<?php echo $row->contact_number; ?>" >
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Query Type</label>
							<div class="select2-input">
								<select name="req_type" class="form-control basic">
									<option value="">Query Type</option>
									<option value="Price" <?php if(isset($row->req_type)){if($row->req_type=="Price"){echo "SELECTED";}} ?>>Price</option>
									<option value="Demo" <?php if(isset($row->req_type)){if($row->req_type=="Demo"){echo "SELECTED";}} ?>>Demo</option>
								    <option value="camp" <?php if(isset($row->req_type)){if($row->req_type=="camp"){echo "SELECTED";}} ?>>Campaign</option>
								    <option value="Refer" <?php if(isset($row->req_type)){if($row->req_type=="Refer"){echo "SELECTED";}} ?>>Refer</option>
								</select>
							</div>
						</div>
					</div>
	
					<div class="col-md-4">
						<div class="form-group">
							<label>Name <sup style="color: red; ">*</sup></label>
							<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $row->name  ?>" required="">
							<input type="hidden" class="form-control" name="id" value="<?php echo $row->id  ?>">
							<input type="hidden" class="form-control" name="pre_thana_id" value="<?php echo $row->thana  ?>">
						   <input type="hidden" class="form-control" name="update_by" value="<?php echo $_SESSION['user_id']  ?>">
						</div>
					</div>
				   	<div class="col-md-3">
						<div class="form-group">
							<label>Designation<sup style="color: red; ">*</sup></label>
							<input type="text" class="form-control" name="desig" placeholder="Designation" value="<?php echo $row->desig  ?>" required="">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Mobile number <sup style="color: red; ">*</sup></label>
							<input type="number" class="form-control" name="mobile" placeholder="Mobile Number" value="<?php echo $row->mobile ?>" required="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Email <sup style="color: red; ">*</sup></label>
							<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $row->email ?>" required="">
						</div>
					</div>
					<div class="col-md-4">
					 	<div class="form-group">
						 	<label>District</label>
						 	<div class="select2-input">
                   	<select id="addDistricts" name="district_id" class="form-control basic4" required>
                          <option value="">Select District</option>
                          <?php if(!empty($district)){
                          foreach($district as $row){ ?>

                          <option value="<?php echo $row->id ?>" <?php if(!empty($row->district)){if($row->district==$row->id){echo "SELECTED"; }} ?>><?php echo $row->name ?></option>
                          <?php  }}else{
                               echo '<option value="">Country not available</option>';
                          }?>
                   	</select>
							</div>
						</div>
				 	</div>
				 	<div class="col-md-4">
						<div class="form-group">
							<label>Thana</label>
							<div class="select2-input">
                       	<select id="addThanas" name="thana_id" class="form-control basic5">
                         	<option value=""><?php if(!empty($row->thana)){$thana_name= $obj->get_thana_name($row->thana); echo $thana_name->name;}else{?> Select district first <?php  } ?> </option>
                       	</select>
							 </div>
						 </div>
					</div>
					<div class="col-md-4">
						<div class="form-group date-wrapper">
						    <label >Slug Url</label>
						    <input class="form-control" placeholder="" name="slug_url" value="<?php echo create_slug($row->institute_name); ?>" >
						  </div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
						    <label >Website Link</label>
						    <input class="form-control" placeholder="Website Link" name="web_link" value="<?php echo $row->web_link; ?>" >
						  </div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						    <label >Facebook Link</label>
						    <input class="form-control" placeholder="Facebook Link" name="fb_link" value="<?php echo $row->fb_link; ?>" >
						  </div>
					</div>

					<div class="col-md-3">
						<div class="form-group date-wrapper">
					  	<label>Approved Status</label>
				            <select class="form-control js-example-basic-single" name="approved_status" id="status_id" value="<?php echo $row->approved_status; ?>">
					              <option value="">Select</option>
					              <option value="1">Pending</option>
					              <option value="2" >Approved</option>
					              <option value="3" >Complain</option>
				            </select>
				        </div>
					 </div>
					 <div class="col-md-4">  
						<div class="form-group">
						    <label >Header Image</label>
						    
						    <input type="file" class="form-control" id="" name="files[]">
						    <input type="hidden" name="previousImage" value="<?php echo $row->header_image; ?>"> 
						</div>
						 <div class="form-group">
						 	<?php if(!empty($row->header_image)){ ?>
						    <img name="header_image" style='width: 50px; height: 50px;' src="<?php echo "../uploads".DS."archProfileImage".DS."header".DS.$row->header_image; ?>">
						    <?php } ?>
						 </div>
					</div>

					<div class="col-md-8">
						 <div class="form-group">						   
						    	<label >Gallery Image</label>							 
							    <img name="header_image" style='width: 50px; height: 50px;' src="images/<?php echo $row->header_image; ?>">
							    <input name="gallery[]" class="form-control" type="file" multiple="multiple" />
                                <input type="hidden" name="galleryImage[]" value="<?php echo $row->gallery; ?>">
						   
						  </div>
						  <div class="form-group">
						  	 <?php 
							    if (!empty($row->gallery)) {
								    $getGallery = explode(',',$row->gallery); ?>
								    <?php foreach ($getGallery as $value): ?>
										<img name="gallery" style="width: 50px; height:50px;" src="<?php echo "../uploads".DS."archProfileImage".DS."gallery".DS.$value; ?>">
									<?php endforeach ?>
								<?php } ?>
						  </div>
					</div>
							
				   	<div class="col-md-12">
						<div class="form-group">
						    <label >Introduction Text</label>						   
						  <textarea name="intro_text" id="local-upload" class="form-control"  rows="25"><?php echo $row->intro_text; ?></textarea>
						  </div>

					</div>
                 <div class="col-md-12">
					<div class="form-group pull-right">
						<button type="submit" name="submit" class="btn btn-success btn-rounded btn-login">Save </button>
						<a href="display.php" class="btn btn-warning btn-rounded">Back</a>
					</div>
					</div>


					
	         	</div>
	         	<!-- Row Ends -->
			</form>
		</div>
		</div>
	</div>

</div>
</div>
</div>
<?php include_once("footer.php"); ?>
<script src="assets/js/plugin/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
tinymce.init({
  	selector: 'textarea#local-upload',
  	plugins: 'image code',
  	toolbar: 'undo redo | image code',

	/* without images_upload_url set, Upload tab won't show up*/
  	images_upload_url: 'postAcceptor.php',
	automatic_uploads : false,

	/* we override default upload handler to simulate successful upload*/
  	images_upload_handler: function (blobInfo, success, failure) {
    setTimeout(function () {
      /* no matter what you upload, we will turn it into TinyMCE logo :)*/
      success('');
    }, 2000);
  }
});
</script>
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
		min-height: 40em;
	}
	/*Email and Latest SMS Card*/
	.card.emailCard, .card.latestSMSCard {
		min-height: 35em;
	}
}
</style>

<?php include_once("footer.php"); ?>

<script type="text/javascript">
$(document).ready(function(){
/* Populate data to state dropdown */
$('#addDistricts').on('change',function(){
var countryID = $(this).val();
if(countryID){
$.ajax({
 type:'GET',
 url:'../witty/ajaxdata.php',
 data:'district_id='+countryID,
 success:function(data){
    $('#addThanas').html('<option value="">Select Thana</option>');
    var dataObj = jQuery.parseJSON(data);
    if(dataObj){
        $(dataObj).each(function(){
            var option = $('<option />');
            option.attr('value', this.id).text(this.name);
            $('#addThanas').append(option);
        });

    }else{

        $('#addThanas').html('<option value="">State not available</option>');
    }
}
});
}else{
$('#addThanas').html('<option value="">Select country first</option>');
}
});
});

//Show/Hide Comment Section
function myFunction() {
var x = document.getElementById("sms-section");
if (x.style.display === "block") {
x.style.display = "none";
} else {
x.style.display = "block";
}
}
</script>

