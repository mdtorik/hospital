<?php
require_once("main_function.php");
/*include_once('connect.php');*/
include_once("header.php");
include_once('pagination.php');
$obj=new operation;
// if(isset($_GET['id'])){
//   $reqId=ID_decode($_GET['id']);

// }

     //if(isset($_GET["search"])) { 

       $institute_name = isset($_GET["institute_name"]) ? $_GET["institute_name"] : NULL;
       $institute_type = isset($_GET["institute_type"]) ? $_GET["institute_type"] : NULL;
       $district = isset($_GET["district"]) ? $_GET["district"] : NULL;
      
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
           
        $statement .= "ORDER BY arch_client_req_tbl.hits DESC";
        $query = QB::query("SELECT arch_client_req_tbl.*,  district.name as districtName, thana.name as thanaName FROM {$statement}  LIMIT {$startpoint} , {$per_page}")->get();
        
 
       /* $total_search_customer = QB::query("SELECT COUNT(arch_client_req_tbl.id) as num FROM {$statement} ")->first();
        $total_active_customer = $total_search_customer->num;*/

//}

  //midle add
  $images = array('home-bottom-Banner-1.jpg', 'list-bottom-Banner-1.jpg', 'image2.jpg','image3.jpg');
  $random_image = array_rand($images);   
//bottom add
  $vedio = array(SITE_URL.'assets/midle/list-bottom-Banner-1.jpg','https://www.youtube.com/embed/VviXy2PANAc' );
  $random_vedio = array_rand($vedio);


?>		
<style type="text/css">
  /*Pagination*/
  .pagination{
    display: flex;
  }
ul.pagination li a {
    padding: .5rem .75rem;
    border: 1px solid #dee2e6;
}
.pagination > li > a.active {
    background-color: #007bff!important;
    border-color: #007bff!important;
    color: #fff!important;
}
ul.pagination li a:hover{
  background: #efefef;
  color: #007bff;
  text-decoration: none;
}
li.page_info {
    padding-right: 10px;
}
/*Pagination*/
</style>
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
                     <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
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
                              <!-- <input type="text" name="" class="form-control" placeholder="Enter Hospital/Clinic Name"> -->
                               <input type="text" placeholder="Name or Hospital/Clinic" name="institute_name" class="form-control" value="<?php echo isset($_GET['institute_name']) ? $_GET['institute_name'] : ''; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group ">
                              <select name="district" class="form-control select2-input">
                                 <option value="">All District</option>
                                    <?php foreach($obj->get_district() AS $key => $value){ ?>
                                       <option value="<?php echo $value->id;?>" <?php if(isset($_GET["district"])){if($_GET["district"]==$value->id){echo "SELECTED";}} ?>><?php echo $value->name;?></option>
                                       <?php } ?>  
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <select name="institute_type" class="form-control">
                                 <option value="">All Healthcare Type</option>
                                    <option value="1" <?php if(isset($_GET["institute_type"]) && $_GET["institute_type"]=="1"){ echo "SELECTED"; } ?>>Hospital</option>  
                                    <option value="2" <?php if(isset($_GET["institute_type"]) && $_GET["institute_type"]=="2"){ echo "SELECTED"; } ?>>Clinic</option>
                                    <option value="3" <?php if(isset($_GET["institute_type"]) && $_GET["institute_type"]=="3"){ echo "SELECTED"; } ?>>Diaganostic</option>
                                    <option value="4" <?php if(isset($_GET["institute_type"]) && $_GET["institute_type"]=="4"){ echo "SELECTED"; } ?>>Others</option>
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

                  <?php $i=1; foreach ($query as $value){ ?>
                     
                  <div class="service-details mb-30 wow fadeInUp" data-wow-delay=".2s">
                     <div class="content-body">
                      
                        <div class="listView-item">
                           <div class="row">
                              <div class="listPic col-lg-3 col-md-3 col-12">
                                <?php if(!empty($value->header_image)) {?>
                                  <a target="_blank" href="<?php echo SITE_URL ?>profile/<?php echo $value->slug_url; ?>"><img src="<?php SITE_URL; ?>uploads/archProfileImage/header/<?php echo $value->header_image ?>"></a>
                                <?php  }else{ ?>
                                   <a target="_blank" href="<?php echo SITE_URL ?>profile/<?php echo $value->slug_url; ?>"><img src="<?php SITE_URL; ?>uploads/archProfileImage/header/default.png"></a>
                                   
                                <?php } ?>
                              </div>
                              <div class="listViewContent col-lg-9 col-md-9 col-12">
                                 <h1><a target="_blank" href="<?php echo SITE_URL ?>profile/<?php echo $value->slug_url; ?>"><?php echo $value->institute_name; ?></a> <a target="_blank" href="<?php echo SITE_URL ?>profile/<?php echo $value->slug_url; ?>" class="btn btn-view">View Profile</a></h1> 
                                 <h5><i class="lni lni-hospital"></i> Type: <span class="textBold" style="min-width: 15em;"> <?php echo  $obj->return_arch_type_list($value->org_type);  ?></span> <span class="textBold"><i class="lni lni-apartment"></i> Bed: <?php echo $value->bed_qty; ?></span></h5>
                                 <h5><span class="textBold" style="min-width: 19.5em;"><i class="lni lni-map-marker"></i> Thana: <?php echo $value->thanaName; ?>, </span><span class="textBold"><i class="lni lni-map-marker"></i> District: <?php echo $value->districtName; ?></span></h5>
                                 <!-- <p><?php echo $value->intro_text ?></p> -->
                                 <p><?php 
                                 
                                    if (!empty($value->intro_text)) {
                                      echo limit_to_numwords($value->intro_text,20); 
                                    }else{
                                      echo " $value->institute_name One of the most famous hospitals in $value->districtName, it has been using modern technology for a long time to provide proper services to different types of patients.";
                                    }
                                 ?></p>
                              </div>
                              <!-- <div class="col-lg-2 col-md-2 col-12">
                                 
                              </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php if($i%10==0){ 
                        echo '<img style="width:100%;" src="'.SITE_URL.'assets/midle/'.$images[$random_image].'" />';
                   } ?> 
                  <?php $i++; }  } ?>
                    <div>
                     <?php 
                        
                       if(isset($_GET["institute_name"])){
                        $curPageUrl=curPageURL();
                       }else{
                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                      
                        $curPageUrl=$actual_link."?institute_name=&district=&institute_type=&search=search&";
                       }
                          echo '<div class="pagination-wrapper">'; 
                          echo '<div class="col-md-12">';
                          echo pagination($statement,$per_page,$page,$curPageUrl);
                    
                        
                      ?>
                   
                    </div>
                     </div>
                   </div>
                  
                </div>
                  
                    <!-- List Item Ends -->
                    
               
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                  <div class="service-details softwareadSection mb-30 wow fadeInUp" data-wow-delay=".2s">
                     <a href="http://www.amarhms.com/"><img src="<?php echo SITE_URL; ?>assets/images/software-ad.jpg" alt="software-ad"></a>
                  </div>
                  <div class="service-details softwareadSection mb-30 wow fadeInUp" data-wow-delay=".2s">
                     <a href="http://www.amarhms.com/"><img src="<?php echo SITE_URL; ?>assets/midle/Right-Banner-1.jpg" alt="software-ad"></a>
                  </div>
                  <div class="service-details softwareadSection mb-30 wow fadeInUp" data-wow-delay=".2s">
                     <a href="http://www.amarhms.com/"><img src="<?php echo SITE_URL; ?>assets/images/software-ad.jpg" alt="software-ad"></a>
                  </div>
                </div>
              </div>     
          </div>
      </section>
      <section>
       
        <div class="row justify-content-center align-items-center m-5">
         <?php $ext = pathinfo($vedio[$random_vedio], PATHINFO_EXTENSION);
            if($ext == 'jpg'){ ?>
               <img width="420" height="420" src="<?php echo $vedio[$random_vedio]?>">
            <?php }else{ ?>
          <iframe width="420" height="420" src="<?php echo $vedio[$random_vedio]?>">
          </iframe>
         <?php } ?>
        </div>
      </section>
   </aside>
</div>

<?php
	include_once("footer.php");
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2-input').select2();
});
</script>