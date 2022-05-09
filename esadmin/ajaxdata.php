<?php 
// Include the database config file 
require_once("../main_function.php");
    $obj=new operation;
    $states = array();
    $country_id= $_GET['district_id'];           
    $states = $obj->getStateRows($country_id);      
   echo json_encode($states);
?>