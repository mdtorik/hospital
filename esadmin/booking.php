<?php
require_once("../main_function.php");
$obj=new operation;
require_once("class/organization.php");
$org=new Organization;



$district=$obj->get_district();
$specialist = $db->result_all("SELECT * FROM `doctor_group`");



include_once("header.php");
include_once("menu.php");
?>	
<div class="main-panel">
	<div class="container">
		<div class="page-inner">			
			<h4 class="page-title">Doctor appoinment</h4>
			<div class="row arch-demo-page">
				<div class="col-lg-3"></div>
				<div class="col-xl-6 col-lg-6 col-md-12">
					<div class="card card-with-nav">	
						<div class="card-body">
							<h3 class="text-center bg-primary headmy p-3">Doctors Appointment</h3>
            				<p class="text-center mt-3">Àppointment date : <strong>March 22,2022</strong> </p>
							<form  method="POST" action="" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-lg-6 mt-2">
					                    <label>Choose Branch </label> 
					                    <div class="form-group">
					                        <div class="d-flex">
					                            <span class="icon "><i class="fas fa-list"></i></span>
						                        <select name="type" class="form-control" id="country" > 
						                            <option value="">Choose Branch</option>            
						                        </select>
					                        </div>
					                    </div>
					                </div>	
									<div class="col-lg-6">
									 	<label>District <sup style="color: red; ">*</sup></label>	
									 	<div class=" form-group select2-input">	
										 	<div class="d-flex">
						                        <span class="icon "><i class="fas fa-list"></i></span>							        
					                         	<select id="addDistricts" required="" name="district_id" class="form-control " required>
						                            <option value="">Select District</option>
						                              <?php if(!empty($specialist)){
						                              foreach($specialist as $row){ ?>
						                            <option value="<?php echo $row->id ?>" <?php if(!empty($result->specialist)){if($result->specialist==$row->id){echo "SELECTED"; }} ?>><?php echo $row->name ?></option>
						                              <?php  }}else{
						                                   echo '<option value="">Country not available</option>';
						                              }?>
					                         	</select>
					                         </div>
										</div>
								 	</div>	
								 	<div class="col-lg-12">
										<label>Thana</label>
										<div class=" form-group select2-input">	
											<div class="d-flex">
						                        <span class="icon "><i class="fas fa-list"></i></span>
					                          	<select id="addThanas" name="thana_id" class="form-control">
					                            	<option value="">Select district first </option>            
					                          	</select>
					                          </div>
										</div>
									</div>
									<div class="col-lg-12 mt-2 mb-2">
					                    <label>Note</label> 
					                    <div class="form-group">
					                        <div class="d-flex">
					                            <span class="icon"><i class="fas fa-user-md"></i></span>
					                            <input class="form-control" type="text" name="notes" placeholder="Notes">
					                        </div>
					                    </div>
					                </div>
					                <ul class="nav nav-tabs" id="myTab" role="tablist">
									  <li class="nav-item">
									    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
									  </li>
									  <li class="nav-item">
									    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
									  </li>
									</ul>
									<div class="tab-content" id="myTabContent">
									  	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						                  <form action="" method="POST">
						                        <div class="row">
						                            <div class="col-lg-3">
						                                <label>Name</label> 
						                                <div class="form-group">
						                                    <input class="form-control" type="text" name="" placeholder="name"> 
						                                </div> 
						                            </div>
						                            <div class="col-lg-3">
						                              <label>Phone</label> 
						                                <div class="form-group">
						                                    <input class="form-control" type="text" name="" placeholder="phone">
						                                </div>
						                            </div>
						                            <div class="col-lg-2">
						                              <label>Age</label> 
						                                <div class="form-group">
						                                    <input class="form-control" type="number" name="" placeholder="age">
						                                </div>
						                            </div>
						                            <div class="col-lg-2">
						                              <label>Gender</label> 
						                                <div class="form-group">
						                                    <select class="form-control">
						                                        <option>Others</option>
						                                        <option>Male</option>
						                                        <option>Female</option>
						                                    </select>
						                                </div>
						                            </div>
						                        </div>
						                  </form>
						                </div>
									  	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						                    <form action="" method="POST">
						                        <div class="row">
						                            <div class="col-lg-4">
						                                <label>Phone</label> 
						                                <div class="form-group">
						                                    <input class="form-control" type="text" name="" placeholder="phone"> 
						                                </div> 
						                            </div>
						                            <div class="col-lg-4">
						                                <label>Password</label> 
						                                <div class="form-group">
						                                    <input class="form-control" type="password" name="" placeholder="password">
						                                </div>
						                            </div>
						                        </div>
						                    </form>
						                </div>
						                <div class="mt-5">
						                    <input type="checkbox" name="">  <span>I agree all terms and condition</span>
						                </div>
						                <div class=" text-center mt-3">
						                    <input class="btn-search" type="submit" name="submit" value="Confirm Appointment">
						                </div>
									  	
									</div>
					            </div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3"></div>
			</div>

				
		</div>
	</div>
</div>

<style type="text/css">
    .headmy {
    border-radius: 5px;
    margin: 0px !important;
    margin-top: 10px !important;
    color: white;
}
.btn-search {
    background: #4285F4;
    border: none;
    color: #fff;
    padding: 7px 15px;
    border-radius: 20px;
    text-transform: uppercase;
    outline: 0;
    transition: all .35s ease-in-out 0s;
}
.icon{
    padding: 10px;
    border: 1px solid;
    border-radius: 5px;
    
}
.top-header{
    margin-bottom: 200px;
}
</style>

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