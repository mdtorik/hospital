<?php
   include_once("main_function.php");
   $obj = new operation;
	include_once("header.php");
 
   //get(  '/users' ,  'directory/users.php'  );

      $statement = "arch_client_req_tbl LEFT JOIN district ON arch_client_req_tbl.district = district.id  ORDER BY arch_client_req_tbl.hits DESC";
      
      $query = QB::query("SELECT arch_client_req_tbl.*,  district.name as districtName FROM {$statement} LIMIT 16 ");
      $mostviewed = $query->get();


     $district_list= QB::query(" SELECT * FROM district ORDER BY name ASC")->get();
     //top org
     $top_hospital = QB::query("SELECT special_org.*, header_image,bed_qty,institute_name,slug_url,org_address FROM special_org LEFT JOIN arch_client_req_tbl ON special_org.reqID = arch_client_req_tbl.id WHERE top_org = '1' AND special_org.status='1'")->get();
     //featured org
     $featured_org = QB::query("SELECT t2.*,  t3.name as districtName, t1.top_org,t1.featured_org FROM special_org t1 LEFT JOIN arch_client_req_tbl t2 ON t1.reqID=t2.id LEFT JOIN district t3 ON t2.district = t3.id WHERE t1.featured_org = '1' AND t1.status='1' LIMIT 16 ")->get();

   $totalHospital=QB::query("SELECT COUNT(id) as num FROM `arch_client_req_tbl` WHERE org_type='1'")->first();
   $totalClinic=QB::query("SELECT COUNT(id) as num FROM `arch_client_req_tbl` WHERE org_type='2'")->first();
   $totalDaigonostic=QB::query("SELECT COUNT(id) as num FROM `arch_client_req_tbl` WHERE org_type='3'")->first();
   $latestBlog=QB::query("SELECT *  FROM `web_articles` limit 3")->get();
   $topBlog = QB::query("SELECT * FROM web_articles ORDER BY web_articles.hits DESC")->get();

  
?>		

<!-- Slider Starts -->
<section class="hero-slider">
   <div class="single-slider">
      <div class="container">
         <div class="row ">
            <div class="col-lg-6 co-12">
               <div class="home-slider">
                  <div class="hero-text">
                     <span class="small-title wow fadeInUp" data-wow-delay=".3s">Hospital</span>
                     <h1 class="wow fadeInUp" data-wow-delay=".5s"><span>Find Nearest</span><br>Medical Facilities</h1>
                     <p class="wow fadeInUp" data-wow-delay=".7s">Instantly search the hospital near your location.</p>
                     <div class="button wow fadeInUp" data-wow-delay=".9s">
                        <a href="<?php echo SITE_URL; ?>list?institute_name=&district=&institute_type=1&search=search" target="_blank"  class="btn mouse-dir">Discover More <span class="dir-part"></span></a>
                     </div>
                  </div>
                  <div class="hero-text">
                     <span class="small-title">Clinic</span>
                     <h1><span>Find Nearest</span><br> Clinic Facilities</h1>
                     <p>Quickly find the clinic near your area.</p>
                     <div class="button">
                        <a href="<?php echo SITE_URL; ?>list?institute_name=&district=&institute_type=2&search=search" target="_blank" class="btn mouse-dir">Discover More <span class="dir-part"></span></a>
                     </div>
                  </div>
                  <div class="hero-text">
                     <span class="small-title">Diagnostic Center</span>
                     <h1><span>Find Nearest</span><br> Diagnostic Center</h1>
                     <p>Instantly find out the diagnostic center near your location</p>
                     <div class="button">
                        <a href="<?php echo SITE_URL; ?>list?institute_name=&district=&institute_type=3&search=search" target="_blank" class="btn mouse-dir">Discover More <span class="dir-part"></span></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Slider Ends -->

<!-- Search Section Starts -->
<section id="searchSection">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <div class="searchSectionWrapper">
               <form action="<?php echo SITE_URL ?>list">
                  <h3>Start Your Search</h3>
                  <input class="searchSection form-control" placeholder="Search By Hospital/Clinic Name"   name="institute_name" size="100">
                  <a href="<?php echo SITE_URL ?>list?institute_name=&district=&institute_type=&search=search" target="_blank" class="btn mouse-dir"><button type="submit" name="search" value="search" class="btn btn-primary">Search</button></a>  
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Search Section Ends -->

<!-- Quick Info Starts -->
<section id="fun-facts" class="fun-facts overlay">
   <div class="fun-inner">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
               <div class="single-fun wow fadeIn" data-wow-delay=".3s">
                  <div class="head">
                     <div class="icon"><i class="fas fa-hospital"></i>
                     </div>
                     <div class="counter"><span id="secondo1" class="countup" cup-end="<?php if(!empty($totalHospital)){  echo $totalHospital->num; } ?>"><?php  if(!empty($totalHospital)){ echo $totalHospital->num; } ?></span>+
                     </div>
                     <h2>Hospital</h2>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
               <div class="single-fun wow fadeIn" data-wow-delay=".5s">
                  <div class="head">
                     <div class="icon"><i class="fas fa-clinic-medical"></i></div>
                     <div class="counter"><span id="secondo2" class="countup" cup-end="<?php  if(!empty($totalClinic)){  echo $totalClinic->num; } ?>"><?php if(!empty($totalClinic)){echo $totalClinic->num; } ?></span>+
                     </div>
                     <h2>Clinic</h2>
                  </div>
               </div>

            </div>
            <div class="col-lg-4 col-md-6 col-12">

               <div class="single-fun wow fadeIn" data-wow-delay=".7s">
                  <div class="head">
                     <div class="icon"><i class="fas fa-flask"></i></div>
                     <div class="counter"><span id="secondo3" class="countup" cup-end="<?php   if(!empty($totalDaigonostic)){ echo $totalDaigonostic->num; } ?>"><?php   if(!empty($totalDaigonostic)){ echo $totalDaigonostic->num; } ?></span>+</div>
                     <h2>Diagnostic Center</h2>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
</section>
<!-- Quick Info Ends -->

<!-- Top Hospitals Starts -->
<section id="testimonials" class="section testimonials">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 offset-lg-2 col-12">
            <div class="section-title">
               <!-- <span class="wow fadeInDown" data-wow-delay=".2s">What saye's Our Clients</span> -->
               <h2 class="wow fadeInUp" data-wow-delay=".4s">Top Hospitals</h2>
               <!-- <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p> -->
            </div>
         </div>
      </div>
      <div class="row">
         <div class=" col-12">
            <div class="testimonial-slider wow fadeInUp" data-wow-delay=".4s">

               <?php if (!empty($top_hospital)) {
                 
                ?>

                  <?php foreach ($top_hospital as $value){ ?>
                        <div class="single-testimonial">
                           <div class="client2">
                              <a href="<?php echo SITE_URL; ?>list/<?php echo $value->slug_url; ?>"><img style="height: 236px;" src="<?php echo SITE_URL; ?>uploads/archProfileImage/header/<?php echo $value->header_image; ?>"></a>
                           </div>
                           <div class="hospital-info">
                              <a href="<?php echo SITE_URL; ?>list/<?php echo $value->slug_url; ?>"><h4 class="hospitalName"><?php echo $value->institute_name; ?></h4></a>
                              <i class="lni lni-quotation"></i>
                              <div class="bottom">
                                 <h4 class="name">Location<span><?php echo $value->org_address ?></span></h4>
                              </div>
                           </div>
                        </div>
                  <?php  } } ?>

            </div>
         </div>
      </div>
   </div>
   <img class="shape1 wow fadeInLeft" data-wow-delay=".8s" src="<?php echo SITE_URL; ?>assets/images/testi-shape1.png" alt="#">
</section>
<!-- Top Hospitals Ends -->


<!-- Most Viewed Hospitals Starts -->
<section id="mostViewedHospital" class="pt-120 pb-120">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-12">
            <div class="section-title">
               <!-- <span class="wow fadeInDown" data-wow-delay=".2s">What saye's Our Clients</span> -->
               <h2 class="wow fadeInUp" data-wow-delay=".4s">Most Viewed Hospitals</h2>
               <!-- <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p> -->
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="mostViewedHospitalWrapper wow fadeInUp" data-wow-delay=".4s">               
               <div class="row">
                 <?php foreach ($mostviewed as $value){ ?>
                     <div class="col-lg-3 col-md-6">
                     <a href="#" target="_blank">
                        <div class="mostViewedHospitalItem clearfix">
                           <div class="hospitalPic">
                              <a target="_blank" href="<?php echo SITE_URL; ?>list/<?php echo $value->slug_url; ?>">
                                 <?php if(!empty($value->header_image)){ ?>
                                    <img src="<?php echo SITE_URL; ?>uploads/archProfileImage/header/<?php echo $value->header_image; ?>">
                                 <?php }else{ ?>
                                    <img src="<?php echo SITE_URL; ?>uploads/archProfileImage/header/default.png">
                                 <?php } ?>
                              </a>
                           </div>
                           <div class="hospitalContent">
                            <a target="_blank" href="<?php echo SITE_URL; ?>list/<?php echo $value->slug_url; ?>"><h6><?php echo $value->institute_name; ?></h6></a>
                             
                              <h6><?php echo $value->districtName; ?></h6>
                           </div>
                        </div>
                     </a>
                  </div>
                 <?php } ?>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Most Viewed Hospitals Ends -->

<!-- Featured Hospitals Starts -->
<section id="featuredHospital" class="section testimonials">
   <div class="shadyBg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-12">
               <div class="section-title">
                  <h2 class="wow fadeInUp" data-wow-delay=".4s">Featured Hospitals</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="featuredHospitalWrapper wow fadeInUp" data-wow-delay=".4s">               
                  <div class="row">
                     <?php foreach ($featured_org as $value){ ?>
                        <div class="col-lg-3 col-md-6">
                           <a href="<?php echo SITE_URL; ?>list/<?php echo $value->slug_url; ?>" target="_blank">
                              <div class="mostViewedHospitalItem clearfix">
                                 <div class="hospitalPic">
                                    <img src="<?php echo SITE_URL; ?>uploads/archProfileImage/header/<?php echo $value->header_image; ?>">
                                 </div>
                                 <div class="hospitalContent">
                                    <h4><?php echo $value->institute_name; ?></h4>
                                    <h6><?php echo $value->districtName; ?></h6>
                                 </div>
                              </div>
                           </a>
                        </div>
                     <?php } ?>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Featured Hospitals Ends -->

<section id="zileWiseHospital" class="section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <div class="section-title">
               <h2 class="wow fadeInUp" data-wow-delay=".4s">Zila Wise Hospitals</h2>
            </div>
            <div class="row">
               <?php foreach ($district_list as $key => $zila) {
               $numberOfzila= QB::query(" SELECT COUNT(arch_client_req_tbl.id) as num FROM arch_client_req_tbl WHERE district='$zila->id' ")->first();
                ?>
               <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                  <ul>
                     
                     <li><i class="fas fa-angle-double-right"></i> <a href="<?php echo SITE_URL ?>list-view?institute_name=&district=<?php echo $zila->id; ?>&institute_type=&search=search" target="_blank"> <?php echo $zila->name; ?> (<?php echo $numberOfzila->num; ?>)</a></li>
                    
                  </ul>             
               </div>
                <?php } ?>
            </div>
         </div>
         <!-- <div class="col-lg-4 col-md-12">
            <div class="topBlog">
               <div class="section-title">
                  <h2 class="wow fadeInUp" data-wow-delay=".4s">Top Blogs</h2>
               </div>
               <div class="topBlogWrapper wow fadeInUp" data-wow-delay=".5s">
                  <ul>
                     <?php foreach ($topBlog as $value){ ?>
                        <li><a href="<?php echo SITE_URL; ?>blog/<?php echo $value->slug; ?>"><div class="topBlogpic"><img src="<?php echo SITE_URL ?>uploads/blog/<?php echo $value->attach ?>"></div> <h6 class="topBlogTitle"><?php echo $value->title ?><br><span class="blogTime"><?php echo $value->pubdate ?></span></h6></a>
                     </li>
                     <?php } ?>
                     

                  </ul>
               </div>
            </div>
         </div> -->
      </div>
   </div>
</section>

<!-- <section id="blogSection">
   <div class="latest-news-area section">
      <div class="letast-news-grid">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 offset-lg-2 col-12">
                  <div class="section-title">
                     <h2 class="wow fadeInUp" data-wow-delay=".4s">Latest Blog Post</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <?php foreach ($latestBlog as $value) { ?>
                     <div class="col-lg-4 col-md-6 col-12">
                        <div class="letest-news-item wow fadeInUp" data-wow-delay=".4s">
                           <div class="image">
                              <a href="<?php echo SITE_URL; ?>blog/<?php echo $value->slug; ?>"><img src="<?php echo SITE_URL ?>uploads/blog/<?php echo $value->attach ?>" alt="#"></a>
                           </div>
                           <div class="content-body">
                              <div class="meta-details">
                                 <a href="#" class="meta-list"><i class="lni lni-user"></i><span><?php echo $obj->return_user($value->modifier); ?></span></a>
                                 <a href="#" class="meta-list"><i class="lni lni-calendar"></i><span><?php echo $value->pubdate; ?></span></a>
                              </div>
                              <h4 class="title"><a href="<?php echo SITE_URL; ?>blog/<?php echo $value->slug; ?>"><?php echo $value->title ?></a></h4>
                              <p><?php echo substr($value->body, 0, 500) ; ?>.</p>
                              <div class="button">
                                 <a class="btn mouse-dir white-bg" href="<?php echo SITE_URL; ?>blog/<?php echo $value->slug; ?>">Read More <span class="dir-part"></span></a>
                              </div>
                           </div>
                        </div>
                     </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</section> -->


			
<?php
	include_once("footer.php");
?>
<script type="text/javascript">
   //======== Home Slider
    var slider = new tns({
        container: '.home-slider',
        slideBy: 'page',
        autoplay: true,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: true,
        controls: false,
        controlsText: [
            '<i class="lni lni-arrow-left prev"></i>',
            '<i class="lni lni-arrow-right next"></i>'
        ],
        responsive: {
            1200: {
                items: 1,
            },
            992: {
                items: 1,
            },
            0: {
                items: 1,
            }

        }
    });
</script>   