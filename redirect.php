<?php 
include_once("main_function.php");

if(!empty($slug)){
	include_once('details-view.php');
}

if(!empty($blogSlug)){
	   $blogSlug= urldecode($blogSlug);
  		/* echo $blogSlug;*/
  		$new=''.$blogSlug.'';
	include_once('blog-details.php');
}

if(!empty($blog)){
	   //$blog= urldecode($blog);
  		/* echo $blogSlug;*/
  		$new=''.$blog.'';
	include_once('esadmin/blog-update.php');
}


 ?>