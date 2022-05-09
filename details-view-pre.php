<?php
	//include_once("header.php");
   include_once('main_function.php');
   include_once('connect.php');
   $obj=new operation;

   if (isset($_GET['slug'])) {
      $slug =$_GET['slug'];
      $statement = "arch_client_req_tbl LEFT JOIN district ON arch_client_req_tbl.district = district.id LEFT JOIN thana ON arch_client_req_tbl.thana = thana.id WHERE arch_client_req_tbl.slug_url = '{$slug}' ";
      $query = QB::query("SELECT arch_client_req_tbl.*,  district.name as districtName, thana.name as thanaName FROM {$statement}");
      $row = $query->first();
      // var_dump($row);
      // exit();
    }

?>		
<div class="directoryListViewPage">
   <div class="breadcrumbs" data-stellar-background-ratio="0.5">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
               <div class="breadcrumbs-content left">
                  <h1 class="page-title">Hospital Details</h1>
                  <!-- <p>Know about us before you work with us</p> -->
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
               <div class="breadcrumbs-content right">
                  <ul class="breadcrumb-nav">
                     <li><a href="index">Home</a></li>
                     <li>Hospital Details</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>

   <aside class="commom-style directoryDetailsView">
      <section class="service-single pt-60 pb-60">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-12">
                  <div class="detailsPic mb-30">
                     <img src="http://192.168.1.3/amarhms/assets/images/feature-image.jpg">
                  </div>
                  <div class="detailSocialInfo whiteBg">
                     <div class="text-center">
                        <span class="commonButton websiteButton"><a href="<?php  echo $row->web_link; ?>">Website <i class="fas fa-external"></i></a></span> <span class="commonButton fbButton"><a href="<?php  echo $row->fb_link; ?>"><i class="lni lni-facebook-oval"></i> Facebook</a></span>
                     </div>
                     <h5><i class="fas fa-building"></i> Type: <span><?php echo  $obj->return_arch_type_list($row->org_type);  ?></span></h5>
                     <h5>Total Bed: <span><?php echo $row->bed_qty; ?></span></h5>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <!-- List Item Starts -->
                  <div class="service-details mb-30 wow fadeInUp" data-wow-delay=".2s">
                     <div class="content-body">
                        <div class="detailView-item">
                           <div class="">                              
                              <div class="detailViewContent">
                                 <h4><?php echo $row->institute_name; ?></h4>
                                 <h5><span>Address:</span> <?php echo $row->org_address; ?>, <span>Thana: <?php echo $row->thanaName; ?></span>, <span>District:</span><?php echo $row->districtName; ?></h5>
                                 <h5>Mobile: <span class="mobileNumber"><?php echo $row->mobile; ?></span></h5>
                                 <h5></h5>
                                 <p><?php echo $row->intro_text; ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- List Item Ends -->
               </div>
               <div class="col-lg-3 col-md-3 col-sm-12 col-12">
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