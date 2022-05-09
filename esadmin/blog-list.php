<?php
require_once("../main_function.php");
// require_once("perpage.php");
require_once("pagination.php");
$obj=new operation;

if(isset($_GET["title"])) {
    
        $title = isset($_GET["title"]) ? $_GET["title"] : NULL;
        $status = isset($_GET["status"]) ? $_GET["status"] : 1;

        $from_date = isset($_GET["from_date"]) ? $obj->convert_date($_GET["from_date"]) : NULL;
        $to_date = isset($_GET["to_date"]) ? $obj->convert_date($_GET["to_date"]) : NULL;
       
    
        $statement = " `web_articles` t1 WHERE t1.status='$status' "; 
        empty($title) ? NULL : $statement .= " AND t1.title like '%".$title."%' ";
       if(!empty($from_date) && !empty($to_date)){
            $statement .= " AND t1.pubdate BETWEEN '$from_date' AND '$to_date' ";
        }
       
        $statement .= " ORDER BY t1.id DESC ";
        $blog_lists = QB::query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}")->get();
        $blog_info = QB::query("SELECT COUNT(t1.id) as num FROM {$statement} ")->first();

        $total_active_customer = $blog_info->num;
        
}

if(isset($_GET['magazineId'])){
    $magazineId= ID_decode($_GET['magazineId']);
   
     QB::table('web_articles')->where('id',$magazineId)->delete();
     //header("location:blog_list.php"); 
}
 
  if(isset($_POST['save_moduleInfo'])){

    $data=array("title"=>$_POST['title'],
                "status"=>$_POST['status']
             );
         $section=$_POST['section'];   

        if(isset($_POST['moduleID'])&& !empty($_POST['moduleID'])){
         $module_id=$_POST['moduleID'] ;
         QB::table('web_module')->where('id', $module_id)->update($data);
         }
     
 $flash->success("Section Info Save Successfully.","index.php?page=news-list&title=&status=1&from_date=&to_date=&search_slide=Search"); 
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
			<a href="blog-new" target="_blank" class="btn btn-sm btn-info pull-right text-white">New Blog</a>
			<div class="page-header">
				<h4 class="page-title"> <span class="text-success">Arch Directory</span> <span class="text-danger">Blog Post</span> </h4>
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
										<div class="col-12 col-md-6 col-lg-2 col">
											<div class="form-group">
												 <input type="text" class="form-control" name="title" placeholder="Post Title"  <?php if(isset($_GET['title']) && !empty($_GET['title'])) { echo 'value="'.$_GET['title']. '"'; } ?>/>
											
											</div>
										</div>
                                        <div class="col-12 col-md-6 col-lg-2 col">
											<div class="form-group">
												<select name="status" class="form-control chosen-select">
                                                    <option value="1"<?php if(isset($_GET['status']) && $_GET['status']=='1'){ echo "SELECTED"; } ?>>Published</option>
                                                    <option value="0"<?php if(isset($_GET['status']) && $_GET['status']=='0'){ echo "SELECTED"; } ?>>Unpublished</option>                                                                               
                                                </select>										
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-2 col">
                                            <div class="form-group date-wrapper ">                                           
                                                <div class="input-group">
                                                     <input placeholder="Start Date" type="text" name="from_date"  title="Appointment Date" class="form-control" id="date1" value="<?php if(isset($_GET["from_date"])){ echo $_GET['from_date'] ; }?>" style="margin: 0;"/> 
                                                    <div class="input-group-append">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-12 col-md-6 col-lg-2 col">
                                        <div class="form-group date-wrapper">                                           
                                            <div class="input-group">
                                                <input placeholder="End Date" type="text"   title="Appointment Date" class="form-control" id="date1" value="<?php if(isset($_GET["today_date"])){ echo $_GET['today_date'] ; }?>" name="today_date" style="margin: 0;"/> 
                                                <div class="input-group-append">
                                                    
                                                </div>
                                            </div>
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
				<?php	if(!empty($blog_lists)){  ?>
						<div class="arch-table-wrapper">
							 <!-- Search Quick Info Section Ends -->
                            <div class="table-responsive">
                                <form method="post" action="">
                                    <table class="table table-striped" id="table">
                                    <thead>  
                                    <th>SN</th>                             
                                        <th class="text-left">Title</th> 
                                        <th>File</th>                                                          
                                        <th style="text-align: center;">Status</th> 
                                        <th>Published</th>                        
                                        <th>Modified</th>                        
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                            <?php

                              
                               $sn = 0;
                            // $sn = ($per_page*$page)-$per_page; 
                                        foreach($blog_lists as $slide) { $sn=$sn+1; ?>
                                        <tr class="gradeA"> 
                                        <td><?php echo $sn++; ?></td>                                  
                                            <td class="text-left"><a href="blog-update.php?page=blog-update&magazineId=<?php echo ID_encode($slide->id); ?>" target="_blank"><?php echo $slide->title; ?></a></td>
                                            <td><?php if(!empty($slide->attach)){ echo "Yes"; }else{ echo "No"; } ?></td>
                                            <td><?php echo $obj->return_blog_status_list($slide->status); ?></td>
                                            <td><?php echo $obj->return_convert_date($slide->pubdate); ?></td>
                                            <td><?php echo $obj->return_modified_convert_date($slide->modified); ?></td>
                                            <td class="avoid">
                                                <!----- Dropdown Options Starts ----->
                                                <div class="dropdown action-menu" id="purchaseList">
                                                    <button class="text-success btn btn-default " type="button" id="optionmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="optionmenu">
                                                      <li class="text-success"><a  href="blog-update.php?magazineId=<?php echo ID_encode($slide->id); ?>" target="_blank">Details</a></li>
                                                        <li><a href="?magazineId=<?php echo ID_encode($slide->id); ?>"  onclick = "if (! confirm('Are you sure you want to delete ?')) { return false; }" target="_blank">Delete</a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <!----- Dropdown Options Ends ----->
                                            </td>
                                        </tr>
                                        <?php } ?>
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
                        
                          
                           <?php  }  ?>	
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

