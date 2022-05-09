<?php
	include_once('main_function.php');
	include_once('connect.php');
	$obj=new operation;

	if (isset($_GET['id'])) {
	 	$id = ID_decode($_GET['id']);
	 	$query = QB::table('arch_client_req_tbl')->where('id', '=', $id);
  		$row = $query->first();
	 } 


 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Data Veiw</title>
 	<link rel="stylesheet" type="text/css" href="design.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css">
		
		.web{
			text-decoration: none;
		}
	</style>
 </head>
 <body>
 	 
<section class="text-center m-5">
	<h3 class="border-bottom text-primary"><?php echo $row->institute_name; ?></h3>
</section>
	
<section class="mx-auto">
	<div class="container">

		<div class="row">

	  <div class="border-bottom col-8">
	  	<h2 class="text-center m-5 border-bottom">Some Achivement</h2>
	  	<div id="carouselExampleControls" class="carousel slide mx-auto" data-ride="carousel">
		  <div class="carousel-inner">
		  	<?php  
		  		$getGallery = explode(',', $row->gallery);
		  		// var_dump($getGallery);
		  		// exit();

		  		if (isset($getGallery)) { ?>
		  			<div class="carousel-item active">
				      <img style="height: 400px;" class="d-block w-100" src="uploads/archProfileImage/gallery/<?php echo $getGallery['0']; ?>" alt="First slide">
				    </div>
				    <div class="carousel-item">
				      <img style="height: 400px;" class="d-block w-100" src="uploads/archProfileImage/gallery/<?php echo $getGallery['1']; ?>" alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      <img style="height: 400px;" class="d-block w-100" src="uploads/archProfileImage/gallery/<?php echo $getGallery['2']; ?>" alt="Third slide">
				    </div>
				  		

		  	<?php } ?>
					    
		     
		  </div>
		  
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	  	<div class="text-center m-5">
	  		<h3>About Us</h3>
	  		<p><?php echo $row->intro_text; ?></p>
	  	</div>
	  	
	  </div>
	  <div class="col-4">
	  	<h2 class="text-center m-5 border-bottom">At a glance</h2>
	  	<div class="card" style="width: 18rem;">
		 	<img class="card-img-top" style="width: 286px;height: 180px;" src="uploads/archProfileImage/header/<?php echo $row->header_image; ?>">

		  <div class="card-body">
		    <h5 class="border-bottom">Contact Information</h5>
		    <label class="border-bottom"><span class="" >Location-</span><?php echo $row->org_address ?></label><br>
		    <label class="border-bottom"><span class="" >Phone-</span><?php echo $row->mobile ?></label><br>
		    <label class="border-bottom"><span class="" >Email</span>:<?php echo $row->email ?></label>
		    <label class="border-bottom"><a class="web" href="<?php echo $row->web_link ?>">Website</a></label>

		  </div>
		</div>
	  </div>
	</div>
	<button class="btn btn-success text-white"><a href="list-view.php">Back</a></button>
	</div>
</section>
<section>
	
</section>
	



 </body>
 </html>