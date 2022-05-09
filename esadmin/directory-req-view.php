<?php
require_once("../main_function.php");
require_once("class/organization.php");
$org=new Organization;
$obj=new operation;
$users= $obj->get_all_users();
$district=$obj->get_district();
$path =  SITE_ROOT.DS."uploads".DS."archProfileImage".DS;
$galleryPath=$path."gallery".DS; 
$headerPath=$path."header".DS; 

if(isset($_GET['id'])){
	$reqId=ID_decode($_GET['id']);
	$result = $obj->detailsarchclientRequest($reqId);
	

  }

if(isset($_GET['del'])){
	$obj->delete_arch_client_request($_GET['del']);
}

if(isset($_GET["delReqImageId"])){
	   $delReqImageId=ID_decode($_GET['delReqImageId']);
	   $result = $obj->detailsarchclientRequest($delReqImageId);
	   $delImageName=$_GET["filename"];
	   $getGallery = explode(',',$result->gallery);
	  
	   $updateImage=array(); 
	     foreach ($getGallery as $value){
               if($value == $delImageName){    
                         
              if (file_exists($galleryPath.$value)) {
               	unlink($galleryPath.$value);
          
               }}else{
              
               	$updateImage[]=$value;
               
               }
				}
					$updateImage=implode(",", $updateImage);

						$data= array("gallery"=>$updateImage);
						

		QB::table('arch_client_req_tbl')->where('id',$delReqImageId)->update($data);
	$_SESSION['message'] = "You have deleted successfully";
    $archUpdate= ID_encode($delReqImageId);
	echo"<script> window.location.replace('directory-req-view.php?id=$archUpdate');</script>";
}




if(isset($_POST['submit'])){

if(!empty($_FILES['files']['name'][0])){
	$header_image = $_FILES['files']['name'][0];
}else{
	$header_image =NULL;
}
if(!empty($_FILES['gallery']['name'][0])){
	$gallery = $_FILES['gallery']['name'][0];
}else{
	$gallery =NULL;
}

	if (!empty($header_image)) {
				//remobe previous image  working
				$filename = $result->header_image;
			
				  if (file_exists($headerPath.$result->header_image)) {

				    unlink($headerPath.$result->header_image); 
				  } else {
				    echo 'Could not delete '.$filename.', file does not exist';
				  }
				$image_stack=array();   
			    $valid_formats = array("jpg", "png", "gif", "bmp");
			    $max_file_size = 1024*4200; //4000 kb / 4MB
			    /*$path =  SITE_ROOT.DS."website".DS."images".DS."slide".DS;*/ // Upload directory
			  
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
			     
			                if(move_uploaded_file($file_tmp,$path.$file_name))
			                    $new_dir= uniqid().rand(1000, 9999).".".$ext;                
			                    $new_name = rename($path.$file_name,$path."header".DS.$new_dir) ; // rename file name
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
			    	 	$header_image= $result->header_image;
			    	 }

	//image upload at gallery
    // Loop $_FILES to execute all files
    	if (!empty($gallery)) {
    		
    		//remobe previous image  working
				$filename = explode(',', $result->gallery);
					foreach ($filename as $value) {
						if (file_exists($galleryPath.$value)) {

					    unlink($galleryPath.$value); 
					  } else {
					    echo 'Could not delete '.$value.', file does not exist';
					  }
					}



			    	$image_stack=array();   
				    $valid_formats = array("jpg", "png", "gif", "bmp");
				    $max_file_size = 1024*4200; //4000 kb / 4MB
				    /*$path =  SITE_ROOT.DS."website".DS."images".DS."slide".DS;*/ // Upload directory
				    // Upload directory
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
				                if(move_uploaded_file($file_tmp,$path.$file_name))
				                    $new_dir= uniqid().rand(1000, 9999).".".$ext;                
				                    $new_name = rename($path.$file_name,$path."gallery".DS.$new_dir) ; // rename file name
				                    array_push($image_stack,$new_dir); // file name store in array 
				                }               
				    }
				    $image_name_in_arry=implode(",", $image_stack);
				  } 
					$galleryNew=$image_name_in_arry;

			    	 }else{
			    	 	//$gallery = $_POST['galleryImage'];
			    	 	//$getGallery=implode(",", $gallery);
			    	 	$galleryImage = $_POST['galleryImage'];

				    	
			    	 }

			    	 if(!empty($galleryNew)) {
			    	 	$gallery = $galleryNew;
			    	 }else{
			    	 	$gallery= $result->gallery;
			    	 }


	$_POST['header_image'] = $header_image;
	$_POST['gallery'] = $gallery;

	$obj->update_arch_req($_POST);

	$_SESSION['message'] = "You have updated successfully";
    $archUpdate= ID_encode($_POST['archUpdate']);
  	echo"<script> window.location.replace('directory-req-view.
  	php?id=$archUpdate');</script>";

}

include_once("header.php");
include_once("menu.php");
?>
<div class="main-panel">
<div class="container">
<div class="page-inner">
<h4 class="page-title"><span class="fgRed"><?php echo "Arch".'  '.$result->req_type; ?></span> <span class="colorOrange">Request from <span class="text-success"><?php echo $result->institute_name; ?></span></span></h4>

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


?>
<?php if(isset($_SESSION['message'])): ?>
 <div class="alert alert-success">
 <?php echo $_SESSION['message']; ?>
 </div>
<?php endif; ?>

<?php if(!empty($result)){ ?>

<div class="row arch-demo-page">
	<div class="col-xl-12 col-lg-12 col-md-12">
		<div class="card card-with-nav">
			<div class="card-header">
			</div>
		<div class="card-body">
			<form  method="POST" action="" enctype="multipart/form-data" >
				<div class="row">
					<input type="hidden" value="<?php echo $result->id; ?>" name="archUpdate">
					<div class="col-md-3">
						<div class="form-group">
							<label>Organization Name</label>
							<input type="text" class="form-control" name="institute_name" placeholder="Organization Name"  value="<?php echo $result->institute_name; ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						    <label >Bangla Name</label>
						    <input type="text" class="form-control" placeholder="Bangla Name" name="bname" value="<?php echo $result->bname; ?>" >
						   <input type="hidden" class="form-control" placeholder="" name="profileID" value="<?php echo $result->id; ?>" >
						  </div>
					</div>
					<div class="col-md-3">
						<div class="form-group date-wrapper">
						    <label >Slug Url</label>
						    <input class="form-control" placeholder="" name="slug_url" value="<?php echo create_slug($result->institute_name); ?>" >
						  </div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Type</label>
							<div class="select2-input">
								<select required name="institute_type" class="form-control basic">
								    <option value="">Select Type</option>
								    <?php foreach($obj->arch_type_list() AS $key => $value){ ?>
								    <option value="<?php echo $key;?>" <?php if(!empty($result->org_type)){ if($key==$result->org_type){echo "SELECTED"; }} ?>><?php echo $value;?></option>
								    <?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Beds</label>
							<input type="number" class="form-control" name="student_qty" placeholder="Beds No" value="<?php echo $result->bed_qty; ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label> Contact Name <sup style="color: red; ">*</sup></label>
							<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $result->name  ?>" required="">
							<input type="hidden" class="form-control" name="id" value="<?php echo $result->id  ?>">
							<input type="hidden" class="form-control" name="pre_thana_id" value="<?php echo $result->thana  ?>">
						   <input type="hidden" class="form-control" name="update_by" value="<?php echo $_SESSION['user_id']  ?>">
						</div>
					</div>
				   	<div class="col-md-3">
						<div class="form-group">
							<label>Designation<sup style="color: red; ">*</sup></label>
							<input type="text" class="form-control" name="desig" placeholder="Designation" value="<?php echo $result->desig  ?>" required="">
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group date-wrapper">
					  	<label>Approved Status</label>
				            <select class="form-control js-example-basic-single" name="approved_status" id="status_id" value="" >
					              <option value="">Select</option>
					              <option value="1" <?php if(isset($result->approved_status)){if($result->approved_status=="1"){echo "SELECTED";}} ?>>Pending</option>
					              <option value="2" <?php if(isset($result->approved_status)){if($result->approved_status=="2"){echo "SELECTED";}} ?>>Approved</option>
					              <option value="3" <?php if(isset($result->approved_status)){if($result->approved_status=="3"){echo "SELECTED";}} ?>>Complain</option>
				            </select>
				        </div>
					 </div>

					<div class="col-md-3">
						<div class="form-group">
						    <label >Website Link</label>
						    <input class="form-control" placeholder="Website Link" name="web_link" value="<?php echo $result->web_link; ?>" >
						  </div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						    <label >Facebook Link</label>
						    <input class="form-control" placeholder="Facebook Link" name="fb_link" value="<?php echo $result->fb_link; ?>" >
						</div>
					</div>
					<div class="col-md-3">
					 	<div class="form-group">
						 	<label>District</label>
						 	<div class="select2-input">
                   	<select id="addDistricts" name="district_id" class="form-control basic4" required>
                          <option value="">Select District</option>
                          <?php if(!empty($district)){
                          foreach($district as $row){ ?>
                          <option value="<?php echo $row->id ?>" <?php if(!empty($result->district)){if($result->district==$row->id){echo "SELECTED"; }} ?>><?php echo $row->name ?></option>
                          <?php  }}else{
                               echo '<option value="">Country not available</option>';
                          }?>
                   	</select>
							</div>
						</div>
				 	</div>
				 	<div class="col-md-3">
						<div class="form-group">
							<label>Thana</label>
							<div class="select2-input">
                       	<select id="addThanas" name="thana_id" class="form-control basic5">
                         	<option value=""><?php if(!empty($result->thana)){$thana_name= $obj->get_thana_name($result->thana); echo $thana_name->name;}else{?> Select district first <?php  } ?> </option>	
                       	</select>
							 </div>
						 </div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						   <label>Address</label>
						   <textarea name="institute_add" class="orgAddress" rows="1"><?php echo $result->org_address ?></textarea>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Contact <sup style="color: red; ">*</sup></label>
							<input type="text" class="form-control" name="contact_number"  value="<?php echo $result->contact_number ?>" required="">
						</div>
					</div>
					<div class="col-md-3">  
						<div class="form-group">
						    <label >Header Image</label>
						    
						    <input type="file" class="form-control" id="" name="files[]">
						    <input type="hidden" name="previousImage" value="<?php echo $result->header_image; ?>"> 
						</div>
						 <div class="form-group">
						 	<?php if(!empty($result->header_image)){ ?>
						    <img name="header_image" style='width: 50px; height: 50px;' src="../uploads/archProfileImage/header/<?php echo $result->header_image; ?>">
						    <?php } ?>
						 </div>
					</div>
					<div class="col-md-3">
						 <div class="form-group">						   
						    	<label >Gallery Image</label>							 
							    <input name="gallery[]" class="form-control" type="file" multiple="multiple" />
                                <input type="hidden" name="galleryImage[]" value="<?php echo $result->gallery; ?>">						   
						  </div>
						  <div class="form-group">
						  	 <?php 
							    if (!empty($result->gallery)) {
								    $getGallery = explode(',',$result->gallery); ?>
								    <?php foreach ($getGallery as $value): ?>
										<img name="gallery" style="width: 50px; height:50px;" src="../uploads/archProfileImage/gallery/<?php echo $value; ?>"><sup><a href="?delReqImageId=<?php echo ID_encode($result->id); ?>&filename=<?php echo $value; ?>" style="color: red;" onclick="if (! confirm('Do you want to delete ?')) { return false; }" >X</a></sup>
									<?php endforeach ?>
								<?php } ?>
						  </div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
						   <label>Introduction Text</label>
		            	   <textarea name="intro_text" class="form-control summernote" id="summernote" placeholder=" write here" rows="53" ><?php echo $result->intro_text ?></textarea>
						</div>
					</div>
					<div class="col-md-6 text-right" style="margin-top: 10px;">
						<button onclick='return confirm_alert(this);' type="submit" name="submit" class="btn btn-success btn-rounded btn-login">Save </button>
						<a href="arch-request.php" class="btn btn-warning btn-rounded">Back</a>
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
<?php } ?>
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
<script src="assets/js/sms_counter.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
/* Populate data to state dropdown */
$('#addDistricts').on('change',function(){
var countryID = $(this).val();
if(countryID){
$.ajax({
 type:'GET',
 url:'ajaxdata.php',
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
function myFunction($id) {
var x = document.getElementById($id);
if (x.style.display === "block") {
x.style.display = "none";
} else {
x.style.display = "block";
}
}


$(".clumn").select2({
  tags: true
});
$(".clumn").on("select2:select", function (evt) {
  var element = evt.params.data.element;
  var $element = $(element);
  $(this).focus();
  
  $element.detach();
  $(this).append($element);
  $(this).trigger("change");
});



 $('#smstemp_id').on('change', function(){
        var smstempID = $(this).val();
        if(smstempID){
            $.ajax({
                type:'POST',
                url:'ajax-query.php',
                data:'tempSmsId='+smstempID,
                success:function(html){
                    $('#tempMessage').html(html);                    
                    $("#tempMessage").countSms("#sms-counter");
                }
            });
        }else{
        	$('#tempMessage').html("");
        	
        }
    });
// Sms counter
	 $("#tempMessage").countSms("#sms-counter");
</script>
<!-- text area -->
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
<script>
function confirm_alert(node) {
  return confirm("Are you sure want to Update");
}

</script>
<script type="text/javascript">
	$(document).ready(function() {
  $('#summernote').summernote();
});
</script>
<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Request Add In Campaign</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form method="POST" action="">
        <!-- Modal body -->
        <div class="modal-body">
	        <div class="form-group">
	            <label for="p-in" class="col-md-3 label-heading">Campaign</label>
	            <div class="col-md-8 ui-front">
            		<select class="form-control" name="campaign_id" required="">
							<option value="">Select Campaign <sup style="color: red">*</sup></option>
							<?php foreach ($campaignList as $camp) { ?>
							<option value="<?php echo $camp->id ?>"><?php echo $camp->camp_name ?></option>
							<?php } ?>
						</select>
	            </div>
	       </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
        	<input type="hidden" name="reqID" value="<?php echo $_GET["id"]; ?> ">
         <input type="submit" name="campaignAdd" class="btn btn-primary btn-xs" value="Add">
          <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>