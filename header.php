<?php 
	// include("email_functions.php");
	require_once("page_seo.php");

	

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8" />
   <meta http-equiv="x-ua-compatible" content="ie=edge" />
   <title><?php 
   if(isset($row->institute_name)){
     echo $row->institute_name; 
 	}elseif (isset($value->title)) {
   		echo $value->title;
   	}
   else
   	{ echo $title; } ?>
   		
   	</title>
  	<meta name="description" content="
  	<?php 	if(isset($row)){ ?>
  	<?php if(!empty($row->intro_text)){
  		echo $row->intro_text;
  		
  	 }else{
  	 	echo $row->institute_name;
  	 	echo ',',$row->thanaName;
  	 	echo ',',$row->districtName;
  	 } ?>
  		


  	 <?php }?>
  	">
   <meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="keywords" content="<?php echo $keywords;?>">
	<meta name="author" content="Esteem Soft Limited">
	<meta name="owner" content="Esteem Soft Limited">
	<meta name="Copyright" content="Esteem Soft Limited"/>
	<meta name="distribution" content="Global" />
		
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="article">
	<link rel="canonical" href="<?php echo $canonical;?>"/>		
	<meta property="og:title" content="<?php echo $ogTitle;?>">
	<meta property="og:description" content="<?php echo $ogDescription;?>">
	<meta property="og:url" content="<?php echo $ogURL;?>">
	<meta property="og:site_name" content="<?php echo $ogSiteName;?>">
	<meta name="twitter:title" content="<?php echo $twitterTitle;?>"/>
	<meta name="twitter:description" content="<?php echo $twitterDescription;?>" />

	<meta name="Googlebot" content="all" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL; ?>assets/images/favicon.svg" />

   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

   <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/bootstrap.min.css" />
   <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/LineIcons.2.0.css" />
   <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/fontawesome-free-5.15.4-web/css/all.css" />
   <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/animate.css" />
   <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/tiny-slider.css" />
   <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/glightbox.min.css" />
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	

   <!-- <link rel="stylesheet" href="assets/css/main.css" /> -->
   <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/main-normal.css" />
   <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/reset.css" />
   <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/responsive.css" />
</head>


<body>
        <!--[if lte IE 9]>
	      <p class="browserupgrade">
	        You are using an <strong>outdated</strong> browser. Please
	        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
	        your experience and security.
	      </p>
	    <![endif]-->
		
		<div class="preloader">
			<div class="preloader-inner">
				<div class="preloader-icon">
					<span></span>
					<span></span>
				</div>
			</div>
		</div>


		<header class="header navbar-area">
		   <div class="toolbar-area">
		      <div class="container">
		         <div class="row">
		            <div class="col-lg-8 col-md-9 col-12">
		               <div class="toolbar-contact">
		                  <p><i class="fas fa-envelope"></i><a href="mailto:#"><span class="__cf_email__" data-cfemail="c8a1a6aea788b1a7bdbabfadaabba1bcade6aba7a5">sales@esteemsoftbd.com</span></a></p>
		                  <p><i class="fas fa-phone-alt"></i><a href="tel:+8801844004911">01844004911</a></p>
		                  <p><i class="fas fa-map-marker-alt"></i> H-77, Road-2, Block-A, Bashundhara R/A</p>
		               </div>
		            </div>
		            <div class="col-lg-4 col-md-3 col-12">
		               <div class="toolbar-sl-share">
	                  	<ul>
		                     <li><a target="_blank" href="https://www.facebook.com/esteemsoft"><i class="fab fa-facebook-f"></i></a></li>
		                     <li><a target="_blank" href="https://twitter.com/esteemsoft"><i class="fab fa-twitter"></i></a></li>
		                     <li><a target="_blank" href="https://www.linkedin.com/company/esteemsoftbd/mycompany/"><i class="fab fa-linkedin-in"></i></a></li>
		                     <li><a target="_blank" href="https://www.youtube.com/esteemsoftlimited"><i class="fab fa-youtube"></i></a></li>
	                  	</ul>
		               </div>
		            </div>
		         </div>
		      </div>
		   </div>

		   <div class="container">
		      <div class="row align-items-center">
		         <div class="col-lg-12">
		            <div class="nav-inner">
		               <nav class="navbar navbar-expand-lg">
		                  <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
		                     <img src="<?php echo SITE_URL; ?>assets/images/logo.svg" alt="Logo">
		                  </a>
		                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		                     <span class="toggler-icon"></span>
		                     <span class="toggler-icon"></span>
		                     <span class="toggler-icon"></span>
		                  </button>
		                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
		                     <ul id="nav" class="navbar-nav ms-auto">
		                        <li class="nav-item">
		                           <a class="page-scroll" href="<?php echo SITE_URL; ?>">Home</a>
		                        </li>
		                        <li class="nav-item">
		                           <a class="page-scroll" href="<?php echo SITE_URL; ?>list">Directory List</a>
		                        </li>    
		                      <!--   <li class="nav-item"> -->
<!-- 		                           <a class="page-scroll" href=" echo SITE_URL; ?>blog-list">Blog</a> -->
		                       <!--  </li>  -->                   
		                        <li class="nav-item">
		                           <a class="page-scroll" href="<?php echo SITE_URL; ?>contact">Contact</a>
		                        </li>
		                     </ul>
		                  </div>
		                  <!-- <div class="button">
		                     <a href="contact" class="btn white-bg mouse-dir">Get a Quote <span class="dir-part"></span></a>
		                  </div> -->
		               </nav>
		            </div>
		         </div>
		      </div>
		   </div>
		</header>



		
		
		