<?php
require_once("../main_function.php");
$obj=new operation;
require_once("class/organization.php");
$org=new Organization;


if(isset($_GET['id'])){
//$result=$obj->detailsarchclientRequest($_GET['id']);
        $result=ID_decode($_GET['id']);
		$row=$obj->detailsarchclientRequest($result);
}


 

$users= $obj->get_all_users();
$district=$obj->get_district();
// $comment=$obj->arch_last_five_comments($result->id);
if(isset($_POST['submit'])){

		$header_image = $_FILES['files']['name'][0];	
		$gallery = $_FILES['gallery']['name'][0];
		   
		$image_stack=array();   
	    $valid_formats = array("jpg","jpeg", "png", "gif", "bmp");
	    $max_file_size = 1024*4200; //4000 kb / 4MB
	    /*$path =  SITE_ROOT.DS."website".DS."images".DS."slide".DS;*/ // Upload directory			   
	    $path = SITE_ROOT.DS."uploads".DS."archProfileImage".DS;
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

	$header_image=$image_name_in_arry;
		

	//image upload at gallery
    // Loop $_FILES to execute all files
    	
                  
                   $image_stack=array();   
				    $valid_formats = array("jpg","jpeg", "png", "gif", "bmp");
				    $max_file_size = 1024*4200; //4000 kb / 4MB
				    /*$path =  SITE_ROOT.DS."website".DS."images".DS."slide".DS;*/ // Upload directory
				   
				   $path = SITE_ROOT.DS."uploads".DS."archProfileImage".DS;
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
					$gallery=$image_name_in_arry;

			    	 

	$_POST['header_image'] = $header_image;
	$_POST['gallery'] = $gallery;
	// var_dump($_POST);
	// exit();

	$org->set_directory_arch_request_from_admin($_POST);
// var_dump($_POST);exit();
    
	
}


include_once("header.php");
include_once("menu.php");
?>	
	<div class="main-panel">
		<div class="container">
			<div class="page-inner">			
				<h4 class="page-title">Arch New  Directory Request</h4>
				<div class="row arch-demo-page">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="card card-with-nav">
							<div class="card-header">
			
							</div>
						<div class="card-body">
							<form  method="POST" action="" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Organization Name <sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" required="" name="institute_name" placeholder="Organization Name">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Bangla Name <sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" required="" name="bname" placeholder="Bangla Name">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>SLug Url</label>
											<input type="text" class="form-control" name="slug_url" placeholder="Slug Url">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Organization Contact Number</label>
											<input type="text" class="form-control" name="contact_number" placeholder="Organization Contact Number">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group form-group-default">
											<label>Organization Type <sup style="color: red; ">*</sup></label>
											<div class="select2-input">	
												<select required name="institute_type" class="form-control basic">
												    <option value=""> Select Type</option>							
												    <?php foreach($obj->arch_type_list() AS $key => $value){ ?>
												    <option value="<?php echo $key;?>" <?php if(!empty($result->org_type)){ if($key==$result->org_type){echo "SELECTED"; }} ?>><?php echo $value;?></option>
												    <?php } ?>	
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group form-group-default">
											<label>Beds No <sup style="color: red; ">*</sup></label>
											<input type="number" required="" class="form-control" name="student_qty" placeholder="Beds No" >
										</div>
									</div>
																			
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Website Link</label>
											<input type="text" class="form-control" name="web_link" placeholder="Website Link ">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Facebook Link</label>
											<input type="text" class="form-control" name="fb_link" placeholder="Facebook Link" >
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group form-group-default">
											<label>Approved Status <sup style="color: red; ">*</sup></label>
											<select class="form-control js-example-basic-single" required="" name="approved_status" id="status_id" >
									              <option value="">Select</option>
									              <option value="1">Pending</option>
									              <option value="2">Approved</option>
									              <option value="3">Complain</option>
								            </select>
										</div>
									</div>
								    							
								<div class="col-md-2">
									<div class="form-group form-group-default">	
										<div class="select2-input">
											<select name="req_type" class="form-control basic">
												<option value="">Query Type</option>
												<option value="Price">Price</option>
												<option value="Demo">Demo</option>
												<option value="camp">Campaign</option>
												<option value="Refer">Refer</option>							
											</select>
										</div>	
									</div>	
								</div>
								<div class="col-md-3">
									 	<div class="form-group form-group-default">
										 	<label>District <sup style="color: red; ">*</sup></label>	
										 	<div class="select2-input">								        
					                         	<select id="addDistricts" required="" name="district_id" class="form-control basic4" required>
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
										<div class="form-group form-group-default">
											<label>Thana</label>
											<div class="select2-input">		
					                          	<select id="addThanas" name="thana_id" class="form-control basic5">
					                            	<option value="">Select district first </option>            
					                          	</select>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group form-group-default">
										   <label>Address</label>
										   <textarea name="institute_add" class="form-control"></textarea>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label> Contact Name <sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" name="name" placeholder="Contact Name. ex. Manager Name" required="">
									
										</div>
									</div>
								   	<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Designation<sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" name="desig" placeholder="Designation" required="">							
										</div>
									</div>									
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Mobile number <sup style="color: red; ">*</sup></label>
											<input type="number" class="form-control" name="mobile" placeholder="Mobile Number" required="">
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Email <sup style="color: red; ">*</sup></label>
											<input type="text" class="form-control" name="email" placeholder="Email" required="">
										</div>
									</div>
								 	
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Header Image</label>
											<input type="file" class="form-control" id="" name="files[]">
											
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Galerry Image </label>
											
											<input name="gallery[]" class="form-control" type="file" multiple="multiple" />
										
										</div>
									</div>
									
							
									<div class="col-md-6">
										<div class="form-group form-group-default">
										   <label>Remark</label>
						            	   <textarea name="remarks" class="form-control" placeholder="Remarks write here" rows="3"></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group form-group-default">
										   <label>Introduction Text</label>
						            	   <textarea name="intro_text" id="local-upload" class="form-control" placeholder="Introduction text" rows="3"></textarea>
										</div>
									</div>
					         	</div>
								<div class="text-right mt-3 mb-3">
						        	<button type="submit" name="submit" class="btn btn-success btn-rounded btn-login">Save </button>						
									<a href="arch-request.php" class="btn btn-warning btn-rounded">Back</a>
								</div>
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
</script>
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