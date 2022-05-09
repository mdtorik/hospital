<?php
require_once("../main_function.php");
$obj=new operation;

$userID = $_SESSION['user_id'];
$time = date("Y-m-d");

if(isset($_GET['magazineId'])){

     $magazineId= ID_decode($_GET['magazineId']);       
     $slide = QB::query("SELECT * FROM web_articles WHERE id='$magazineId'")->first();  
    }

if(isset($_POST["save_slide"])){

    $image_stack=array();   
    $valid_formats = array("jpg", "png", "gif", "bmp");
    $max_file_size = 1024*4200; //4000 kb / 4MB
    $path = SITE_ROOT."/uploads/blog/"; // Upload directory
   $image_name_in_arry="";
    // Loop $_FILES to execute all files
  if ($_FILES['fils']['size'] != 0 && $_FILES['fils']['error'] != 0){
  
    foreach ($_FILES['fils']['name'] as $f => $name) 
    {  
        $file_tmp =$_FILES['fils']['tmp_name'][$f];
        $file_name = $_FILES['fils']['name'][$f];
        $file_type = $_FILES['fils']['type'][$f];
        $file_size = $_FILES['fils']['size'][$f];
    
        $ext = pathinfo($file_name, PATHINFO_EXTENSION); // get the file extension name like png jpg
        if ($_FILES['fils']['error'][$f] == 4) {
            continue; // Skip file if any error found
        }          
        if ($_FILES['fils']['error'][$f] == 0) {              
     
                if(move_uploaded_file($file_tmp,$path.$file_name))
                    $new_dir= uniqid().rand(1000, 9999).".".$ext;                
                    $new_name = rename($path.$file_name,$path.$new_dir) ; // rename file name
                    array_push($image_stack,$new_dir); // file name store in array          
            
        }               
    }
    

    $image_name_in_arry=implode(",", $image_stack);
  } 

  if(!empty($image_name_in_arry)){
   $attach=$image_name_in_arry;
  }elseif(!empty($_POST["old_slide"])){
    $attach=$_POST["old_slide"];
  }else{
    $attach="";
  }

    if(!empty($image_name_in_arry) && !empty($_POST["old_slide"]) ){  
    $path = SITE_ROOT."uploads/blog";
    $old_image=$_POST['old_slide'];
    @unlink($path.$old_image);
  }
 
 $title=$_POST['title'];

 if(!empty($_POST["slug"])){
$slug = create_bangla_slug($_POST["slug"]);
}else{
  $slug = create_bangla_slug($title);
}

 /*$slug=strtolower(str_replace(' ', '_', $slug));*/
 $pubdate=$obj->convert_date($_POST['pdate']);
 $status=$_POST['status'];
 $body=$_POST['body'];
 $dateTime=date("Y-m-d");
 if(isset($_POST['magazineId'])&& !empty($_POST['magazineId'])){
          $preslug=$_POST['preslug'];         
          
          if($preslug!=$slug){
              $ck = QB::query("SELECT * FROM web_articles WHERE slug='$slug'")->first();
             if(!empty($ck)){
                $slug=$slug.rand(10,100);
               }
          }
      }else{
         $ck = QB::query("SELECT * FROM web_articles WHERE slug='$slug'")->first();
         if(!empty($ck)){
            $slug=$slug.rand(10,100);
         }
      } 

$data=array("title"=> $title,
            "slug"=>$slug,
            "pubdate"=>$pubdate, 
            "body"=>$body, 
            "attach"=>$attach,
            "modified"=>$dateTime,
            "modifier"=>$userID,           
            "status"=>$status
           
        );
       
        if(isset($_POST['magazineId'])&& !empty($_POST['magazineId'])){
         $slide_id=$_POST['magazineId'] ;
         QB::table('web_articles')->where('id', $slide_id)->update($data);
          $magazineId=ID_encode($slide_id);
          $_SESSION['message'] = "Save successfully";
          echo"<script> window.location.replace('blog-update.php?magazineId=$magazineId');</script>";
          //$flash->success("Blog Save Successfully.","index.php?page=blog-new&magazineId={$magazineId}");  

        }else{
            $insert_id= QB::table('web_articles')->insert($data);
       		//$flash->success("Blog Save Successfully.","index.php?page=blog-list"); 

        }
     
  
   
}



include_once("header.php");
include_once("menu.php");
?>	
	<div class="main-panel">
		<div class="container">
			<div class="page-inner">			
				<h4 class="page-title"><span class="text-success">Arch</span> Blog Request</h4>
        <?php if(isset($_SESSION['message'])): ?>
          <div class="alert alert-success">
          <?php echo $_SESSION['message']; ?>
          </div>
        <?php endif; ?>
        <?php unset($_SESSION['message']); ?>
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
											
											<label>Title *</label>
                      <input type="text" class="form-control" required="" name="title" placeholder="Post Title" value="<?php if(isset($slide)){ echo $slide->title; } ?>" >
                      <input type="hidden" name="magazineId" value="<?php if(isset($slide)){ echo $slide->id; } ?>" >
		                                    
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Slug/URL*</label>
                      <input type="text" class="form-control" name="slug" placeholder="Post Slug" value="<?php if(isset($slide)){ echo $slide->slug; } ?>" >                                     
                      <input type="hidden" name="preslug" value="<?php if(isset($slide)){ echo $slide->slug; } ?>">                                     
		                                   
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Publication Date *</label>
                       <!-- <input type="text" class="form-control" required="" id="date2" name="pdate"  value="<?php if(isset($slide)){ echo $slide->modified; } ?>" > -->
                      <input type="text" name="pdate"  title="Appointment Date" class="form-control" id="date1" value="<?php if(isset($slide)){ echo $obj->return_convert_date($slide->pubdate); }else{ echo date('d-m-Y'); } ?>" /> 
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Status</label>   
											<select name="status" class="form-control chosen-select">
                        <option value="1"<?php if(isset($slide)){ if($slide->status=="1"){ echo "SELECTED"; }} ?>>Published</option>
                        <option value="0"<?php if(isset($slide)){ if($slide->status=="0"){ echo "SELECTED"; }} ?>>Unpublished</option>
                      </select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Attach File</label>                                     
                      <input type="file"  name="fils[]" />
										</div>
									</div>	

									<?php if(!empty($slide->attach)){ ?>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>Current Blog Image</label><br> 
                      <div class="fileinput-new img-thumbnail">                                    
                          <img src="<?php echo SITE_URL;?>uploads/blog/<?php echo !empty($slide->attach) ? $slide->attach : "default.png" ; ?>" alt="<?php echo $slide->title; ?>"  alt="patient-avatar" style="max-width:85px;max-height:80px;">
                      </div>
                     <input type="hidden" name="old_slide" value="<?php echo $slide->attach; ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											Last Modified: <?php 
                      $id = $_SESSION['user_id'];
                      //echo $id;
                      $query = QB::query("SELECT firstname FROM user_tbl WHERE user_id = '$id'")->first();
                      echo $query->firstname;
												
											 ?>
										</div>
									</div>

									 <?php } ?>  
									<div class="col-md-12">
										<div  class="form-group form-group-default">
											<label>Magazine Body / Content</label>
                      <textarea  id="summernote" class="form-control summernote" name="body"  rows="250" id="message"><?php echo isset($slide->body) ? $slide->body : "" ?></textarea>
										</div>
									</div>
								    <div class="col-md-3">
										<div class="form-group form-group-default">
											<input type="submit" name="save_slide" onclick="if (! confirm('Do you want to save ?')) { return false; }" class="btn-save avoid" value="Save">
											</div>
										</div>
								</div>						
								
								   	
							</form>
						</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>
<?php include_once("footer.php"); ?>

<script type="text/javascript">
	// close windows after selecting date
$(".form-control").on("changeDate", function(e){
	$(this).datepicker("hide");
});


if ($("#date1").length){
    $("#date1").datepicker({
        format: "dd-mm-yyyy"
    });
}

if ($("#date2").length){
    $("#date2").datepicker({
        format: "dd-mm-yyyy"
    });
}
if ($("#date3").length){
    $("#date3").datepicker({
        format: "dd-mm-yyyy"
    });
}

//turn off autocomplete for date fields
$('#date1').attr('autocomplete','off');
$('#date2').attr('autocomplete','off');
$('#date3').attr('autocomplete','off');
</script>
<script type="text/javascript">
	$(document).ready(function() {
  $('#summernote').summernote();
});
</script>
