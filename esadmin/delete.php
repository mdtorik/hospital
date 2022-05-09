<?php 
require_once("../main_function.php");
$obj=new operation;
if (isset($_GET['id'])) {
	$idDelete = $_GET['id'];
	$result = $obj->delete_featured($idDelete);
	$_SESSION['message'] = "You have Deleted successfully";
    header("location:featured.php");

}

 ?>