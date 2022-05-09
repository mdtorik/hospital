<?php
require_once("main_function.php");
include_once('connect.php');
include_once('pagination.php');
$obj=new operation;
// if(isset($_GET['id'])){
//   $reqId=ID_decode($_GET['id']);

// }

if(isset($_GET["search"])) {

       $institute_name = $_GET["institute_name"];
       $institute_type=$_GET["institute_type"];
       $district=$_GET["district"];
      
       if(!empty($today)){ 
        $date = DateTime::createFromFormat('d/m/Y', $today);
        $to_date= $date->format('Y-m-d');
          }
        if(!empty($from_date)){ 
        $fromDate = DateTime::createFromFormat('d/m/Y', $from_date);
        $fromToDate= $fromDate->format('Y-m-d');
          }
        $whereArr = array();
        if($institute_name != "") $whereArr[] = " institute_name LIKE '%$institute_name%' ";        
        if($institute_type != "") $whereArr[] = "org_type = '{$institute_type}'";
        if($district != "") $whereArr[] = " district = '{$district}'";
       
         
    
        
        $whereStr = implode(" AND ", $whereArr);
        if(!empty($whereStr)){
         $statement = "arch_client_req_tbl  LEFT JOIN district ON arch_client_req_tbl.district = district.id LEFT JOIN thana ON arch_client_req_tbl.thana = thana.id where {$whereStr} ";  
      }else{
         $statement = "arch_client_req_tbl LEFT JOIN district ON arch_client_req_tbl.district = district.id LEFT JOIN thana ON arch_client_req_tbl.thana = thana.id "; 
      }  
           
        $statement .= " ORDER BY arch_client_req_tbl.id DESC";
        $query = QB::query("SELECT arch_client_req_tbl.*,  district.name as districtName, thana.name as thanaName FROM {$statement}  LIMIT {$startpoint} , {$per_page}")->get();
        //$id = ID_encode($statement);  
        // var_dump($query);
        // exit();   
        $total_search_customer = QB::query("SELECT COUNT(arch_client_req_tbl.id) as num FROM {$statement} ")->first();
        $total_active_customer= $total_search_customer->num;

   }


?>		
<div class="directoryListViewPage">
   <div class="breadcrumbs" data-stellar-background-ratio="0.5">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
               <div class="breadcrumbs-content left">
                  <h1 class="page-title">Hospital List</h1>
                  <!-- <p>Know about us before you work with us</p> -->
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
               <div class="breadcrumbs-content right">
                  <ul class="breadcrumb-nav">
                     <li><a href="index">Home</a></li>
                     <li>Hospital List</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>

   <aside class="commom-style directoryListView">
      <section class="section service-single">
         <form action="" >
            <div class="container">
               <div class="service-details">
                  <div class="content-body">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <input type="text" placeholder="Name or Organization" name="institute_name" class="form-control" value="<?php echo isset($_GET['institute_name']) ? $_GET['institute_name'] : ''; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <select name="district" class="form-control">
                                 <option value="">Select District</option>
                                    <?php foreach($obj->get_district() AS $key => $value){ ?>
                                       <option value="<?php echo $value->id;?>" <?php if(isset($_GET["district"])){if($_GET["district"]==$value->id){echo "SELECTED";}} ?>><?php echo $value->name;?></option>
                                       <?php } ?>  
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <select name="institute_type" class="form-control">
                                 <option value="">Healthcare Type</option>
                                 <?php foreach($obj->arch_type_list() AS $key => $value){ ?>
                                       <option value="<?php echo $key;?>" <?php if(isset($_GET["institute_type"])){if($_GET["institute_type"]==$key){echo "SELECTED";}} ?>><?php echo $value;?></option>
                                       <?php } ?>  
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <button type="submit" name="search" value="search" class="btn btn-primary">Search</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </section>


      <section class="service-single">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                  <!-- List Item Starts -->
               <?php if (isset($query)) {   ?>

                  <?php foreach ($query as $value): ?>
                  <div class="service-details mb-30 wow fadeInUp" data-wow-delay=".2s">
                     <div class="content-body">
                        <div class="listView-item">
                           <div class="row">
                              <div class="listPic col-lg-2 col-md-2 col-12">
                                 <img src="uploads/archProfileImage/header/<?php echo $value->header_image ?>">
                              </div>
                              <div class="listViewContent col-lg-8 col-md-8 col-12">
                                 <h4><?php echo $value->institute_name; ?></h4>
                                 <h5><i class="lni lni-hospital"></i> Type: <span class="textBold"><?php echo  $obj->return_arch_type_list($value->org_type);  ?></span> | <i class="lni lni-apartment"></i> Bed: <span class="textBold"><?php echo $value->bed_qty; ?></span></h5>
                                 <h5><i class="lni lni-map-marker"></i><span><?php echo $value->org_address; ?>, </span><span class="textBold"><?php echo $value->thanaName; ?>, </span><span class="textBold"><?php echo $value->districtName; ?></span></h5>
                                 <p><?php echo $value->intro_text ?></p>
                              </div>
                              <div class="col-lg-2 col-md-2 col-12">
                                 <a target="_blank" href="details-view.php?slug=<?php echo $value->slug_url; ?>" class="btn btn-view">View Profile</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endforeach ?>
                  <?php 
                        echo '<div class="pagination-wrapper">'; 
                        echo '<div class="col-md-12">';
                        echo pagination($statement,$per_page,$page,curPageURL());  ?>
                        <p><?php if(!empty($total_active_customer)){ echo "Total Result :  ".$total_active_customer; } ?></p>
            <?php } ?>
                 
                  <!-- List Item Ends -->
               </div>
               <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                  <div class="service-details softwareadSection mb-30 wow fadeInUp" data-wow-delay=".2s">
                     <a href="http://www.amarhms.com/"><img src="assets/images/software-ad.jpg" alt="software-ad"></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </aside>
</div>
   

<?php
	//include_once("footer.php");
?>