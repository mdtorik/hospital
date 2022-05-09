<?php
	
   include_once('main_function.php');
 
   $obj=new operation;

   // $current_visit = QB::query("SELECT hits FROM arch_client_req_tbl")->first();
   // $newVisit = $current_visit+1;

  

   if (isset($slug)) {
     /* $slug =$$slug;*/
      $statement = "arch_client_req_tbl LEFT JOIN district ON arch_client_req_tbl.district = district.id LEFT JOIN thana ON arch_client_req_tbl.thana = thana.id WHERE arch_client_req_tbl.slug_url = '{$slug}' ";
      $query = QB::query("SELECT arch_client_req_tbl.*,  district.name as districtName, thana.name as thanaName FROM {$statement}");
      $row = $query->first();
      // var_dump($row);
      // exit();
       $update = QB::query("UPDATE arch_client_req_tbl SET hits = hits+1 WHERE arch_client_req_tbl.slug_url = '{$slug}' ");
    }


    include_once("header.php");
?>		
<div class="directoryListViewPage">
   <div class="breadcrumbs" data-stellar-background-ratio="0.5">
      <div class="container">
         <div class="row">
            <!-- <div class="col-lg-6 col-md-6 col-12">
               <div class="breadcrumbs-content left">
                  <h1 class="page-title">Hospital Details</h1>
                  <p>Know about us before you work with us</p>
               </div>
            </div> -->
            <div class="col-lg-6 col-md-6 col-12">
               <div class="breadcrumbs-content "> <!-- right -->
                  <ul class="breadcrumb-nav">
                     <li><a href="<?php echo SITE_URL; ?>"><h3>Home</h3></a></li>
                     <li><h3><?php  echo $row->institute_name; ?></h3></li>
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
               <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="detailsPic mb-30 wow fadeInUp" data-wow-delay=".4s">
                      <?php if (!empty($row->header_image)){ ?>
                       <img src="<?php echo SITE_URL; ?>uploads/archProfileImage/header/<?php  echo $row->header_image; ?>">
                      <?php }else{ ?>
                         <img src="<?php echo SITE_URL; ?>uploads/archProfileImage/header/default.png">
                       <?php } ?>
                    
                     <div class="hospitalNameAddress">
                        <h4><?php  echo $row->institute_name; ?></h4>
                        <h6><?php echo $row->districtName; ?></h6>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <!-- List Item Starts -->
                  <div class="service-details mb-30 wow fadeInUp" data-wow-delay=".5s">
                     <div class="content-body clearfix">
                        <div class="detailView-item">
                           <div class="">                              
                              <div class="detailViewContent">
                                 <h4 class="banglaName"><?php echo $row->bname; ?></h4>
                                 <div class="row">
                                    <?php if(!empty($row->org_type)){ ?>
                                   <div class="col-lg-2">
                                     <h5><i class="fas fa-building"></i> Type: <span><?php echo  $obj->return_arch_type_list($row->org_type);  ?></span></h5>
                                   </div>
                                <?php } ?>
                                <?php if(!empty($row->contact_number)){ ?>
                                    <div class="col-lg-5">
                                        <h5 class="mobileNumber"><i class="fas fa-mobile fa-fw"></i> Contact: <span><?php echo $row->contact_number; ?></span></h5>
                                    </div>
                                 <?php } ?>
                                   <?php if(!empty($row->web_link)){ ?>
                                    <div class="col-lg-5">
                                        <h5 class="mobileNumber"><i class="fas fa-globe fa-fw"></i> 
                                          Website: 
                                         <span>
                                          <a href="<?php echo $row->web_link; ?>" target="_blank">
                                            <?php 
                                                if (substr($row->web_link, 0, 8) == "https://"){
                                                  echo $row->web_link;
                                                  }else{
                                                    echo 'https://'.$row->web_link;
                                                  }
                                           ?></a>
                                                
                                        </span>
                                      </h5>
                                    </div>
                                 <?php }else{ ?>
                                   <div class="col-lg-5">
                                        <h5 class="mobileNumber"><i class="fas fa-globe fa-fw"></i> 
                                          <a href="<?php echo SITE_URL; ?>profile/<?php echo $row->slug_url; ?>">Website:</a> 
                                      </h5>
                                    </div>
                                  <?php } ?>

                                 </div>
                                 <div class="row hospitalAddress">
                                    <div class="col"><i class="fas fa-map fa-fw"></i> Address:<?php if(!empty($row->org_address)){ echo $row->org_address; } ?>,
                                    <?php if(!empty($row->thanaName)){ echo $row->thanaName; } ?>,
                                    <?php if(!empty($row->districtName)){ echo $row->districtName; } ?>
                                    </div>
                                    
                                 </div>
                                 <?php if(!empty($row->intro_text)){ ?>
                                 <h5 class="intro">Introduction</h5>
                                 <p><?php echo $row->intro_text; ?></p>
                                <?php }else{ ?>
                                    <h5 class="intro">Introduction</h5>
                                    <p><?php echo " $row->institute_name One of the most famous hospitals in $row->districtName, it has been using modern technology for a long time to provide proper services to different types of patients."; ?></p>   
                                <?php } ?>
                                 <div class="galleryImage">
                                    <h5>Gallery</h5>
                                    <ul>
                                        <!--   <li><a href="http://192.168.1.3/amarhms/assets/images/feature-image.jpg" class="glightbox"><img src="http://192.168.1.3/amarhms/assets/images/feature-image.jpg"></a></li> -->
                                        <?php 
                                        if (!empty($row->gallery)) {
                                           $getGallery = explode(',',$row->gallery); ?>
                                           <?php foreach ($getGallery as $value): ?>
                                            
                                              <li><a href="" class="glightbox"><img src= "<?php echo SITE_URL; ?>uploads/archProfileImage/gallery/<?php echo $value; ?>"></a> </li>


                                          <?php endforeach ?>
                                       <?php } ?>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- List Item Ends -->
               </div>                             
            </div>
            <div class="row">
           
                <?php 

                        if (!empty($row->fb_link)) { ?>

                           <div class="col-lg-5">
                              <div class="facebookWrapper mb-30 wow fadeInUp" data-wow-delay=".4s">
                                 <div class="fbFrameWrapper">
                                    <iframe src="<?php echo $row->fb_link ?>" width="420" height="450" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                          
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-7">
                              <div class="contact-map mb-30 wow fadeInUp" data-wow-delay=".4s">
                                 <iframe id="gmap_canvas" src="<?php echo $row->mlink; ?>" width="600" height="490" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                              </div>
                           </div> 
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="softwareadSection wow fadeInUp" data-wow-delay=".5s">
                                 <a href="http://www.amarhms.com/"><img src="<?php echo SITE_URL; ?>assets/images/software-ad.svg" alt="software-ad" width="100%" height="500"></a>
                              </div>
                           </div>
                                  <?php   }else{ ?>
                                       <div class="col-lg-12">
                              <div class="contact-map mb-30 wow fadeInUp" data-wow-delay=".4s">
                                 <iframe id="gmap_canvas" src="<?php echo $row->mlink; ?>" width="600" height="490" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                              </div>
                           </div> 
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="softwareadSection wow fadeInUp" data-wow-delay=".5s">
                                 <a href="http://www.amarhms.com/"><img src="<?php echo SITE_URL; ?>assets/images/software-ad.svg" alt="software-ad" width="100%" height="500"></a>
                              </div>
                           </div>
                                    

                                <?php }  ?>
            </div>
         </div>
      </section>
   </aside>
</div>
   

<?php
	include_once("footer.php");
?>
<script type="text/javascript">
   var lightbox = GLightbox();
      lightbox.on('open', (target) => {
       console.log('lightbox opened');
   });
</script>