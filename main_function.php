<?php 
include 'connect.php';
/**
 * 
 */

class operation{ 



// price and demo for one function

public function insert_arch_demo($post,$type){

if($type=="Price"){
$query= QB::table('settings')->where('name','=','auto_assign_user_arch_price');
$result=$query->first();
}else{
$query= QB::table('settings')->where('name','=','auto_assign_user_arch_demo');
$result=$query->first();
}
$status=3;
global $gtime;
$data=array(
           "name"=>$post['fname'],
           "desig"=>"N/A",
           "mobile"=>$post['pnumber'],
           "email"=>$post['email'],
           "institute_name"=>$post['institutename'],
           "bed_qty"=>$post['bedno'],
           "org_address"=>$post['instituteaddress'],
           "org_type"=>$post['institutetype'],             
           "req_type"=>$type,           
           "district"=>$post['district_id'],
           "thana"=>$post['thana_id'], 
           "status"=>$status,
           "assign_to"=>$result->value,       
           "req_date"=>$gtime
              );

QB::table('arch_client_req_tbl')->insert($data);

}


public function login_function($data){

	$email=$data['username'];
	$password=$data['password'];
	$query= QB::table('user_tbl')->where('email','=',$email);
	$result=$query->first();
if(!empty($result->password)){
if(password_verify($password,$result->password)){
  $_SESSION['email']=$result->email;
  $_SESSION['user_id']=$result->user_id;
  $_SESSION['userLogin'] = "Loggedin";
  $_SESSION['name']=$result->firstName.' '.$result->lastName;
  //unset( $_SESSION['errorMessage'] );
  echo"<script> window.location.replace('dashboard.php');</script>";
  }else{	
  $_SESSION['errorMessage'] = "Please Enter Valied Email Or password"; 
  }
  }else{	
	$_SESSION['errorMessage'] = "Please Enter Valied Email Or password";	
    }
}



public function user_registration($data='')
{
	$email=$data['email'];
	$query= QB::table('user_tbl')->where('email','=',$email);
	$result=$query->first();
if(empty($result)){ 
		global $gtime;
	$password=$data['password'];	
	$pass = password_hash($password, PASSWORD_DEFAULT);
	$data= array(
		      "firstName"=>$data['fname'],
		      "lastName"=>$data['lname'],
		      "firstNum"=>$data['fnum'],
		      "lastNum"=>$data['lnum'],
		      "email"=>$data['email'],
		      "password"=>$pass,
		      "depart"=>$data['dept'],
		      "desig"=>$data['desig'],
		      "status"=>$data['status'],
		      "mydate"=>$gtime,
		      "orderby" =>$data['orderby']
	         );
   $insertId =QB::table('user_tbl')->insert($data);
   $insert="Request has been Added";
 echo"<script> window.location.replace('index.php?id=$insertId&msg=$insert');</script>";

}else{    

	 echo"<script> window.location.replace('add-user.php');</script>";
}

}

public function get_all_users(){
	$query = QB::table('user_tbl')->where('status','=',1)->orderBy('orderby','ASC')->select('*');
	return $result = $query->get();
}

public function return_user($id){
		$query= QB::table('user_tbl')->where('user_id','=',$id);
		$getResult=$query->first();
		return $getResult->firstName;
		// QB::table('user_tbl')->where('user_id','=',$id)->first();
		// $id=ID_encode($id);
		//  $update="Request has been updated";

		// echo"<script> window.location.replace('users.php?id=$id&dem=Arch&msg=$update');</script>";
}

public function detailsAndupdateProfile($id){
		$query= QB::table('user_tbl')->where('user_id','=',$id);
		
		return $result=$query->first();
		// QB::table('user_tbl')->where('user_id','=',$id)->first();
		// $id=ID_encode($id);
		//  $update="Request has been updated";

		// echo"<script> window.location.replace('users.php?id=$id&dem=Arch&msg=$update');</script>";
}


public function update_user($data='')
	{
	// date_default_timezone_set("Asia/Dhaka");	
    	global $gtime;
	$password=$data['password'];
	$id= $data['id'];	
	$pass = password_hash($password, PASSWORD_DEFAULT);
	$data= array(
	      "firstName"=>$data['fname'],
	      "lastName"=>$data['lname'],
	      "firstNum"=>$data['fnum'],
	      "lastNum"=>$data['lnum'],
	      "email"=>$data['email'],
	      "password"=>$pass,
	      "depart"=>$data['dept'],
	      "desig"=>$data['desig'],
	      "status"=>$data['status'],
	      "mydate"=>$gtime
	    );

    QB::table('user_tbl')->where('user_id',$id)->update($data);
	// $update="Request has been updated";
	// echo"<script> window.location.replace('user-profile.php?id=$id&msg=$update');</script>";
	}

public function user_delete($id){
	QB::table('user_tbl')->where('user_id',$id)->delete();
	echo"<script> window.location.replace('user-list.php');</script>";
	}
	
public function detailsarchclientRequest($id){
	$query = QB::table('arch_client_req_tbl')->where('id','=',$id);
	return $result = $query->first();
	}


public function convert_date($date="") {
   if (!empty($date)) {
       return date("Y-m-d",strtotime($date));
    }else {
       return  "";
    }  
}
public function return_convert_date($date="") {
  if (!empty($date)) {
    return date("d-m-Y",strtotime($date));
  } else {
    return  "";
  }  
}
public function return_modified_convert_date($date="") {
  if (!empty($date)) {
    return date("d-m-Y h:i:s",strtotime($date));
  } else {
    return  "";
  }  
}

	

public function update_arch_req($post){
	 	// date_default_timezone_set("Asia/Dhaka");
	   if(!empty($post['thana_id'])){
	   	$thana=$post['thana_id'];
	   }else{
	   	if(!empty($post['pre_thana_id'])){ 
	   	$thana=$post['pre_thana_id'];
	   }else{
	   	$thana=0;
	   }
	   }




       global $gtime;

       if (empty($post['student_qty'])) {

       	$post['student_qty']=1;
       }
		$data= array(
					  "name"=>$post['name'],
					  //"mobile"=>$post['mobile'],
					  //"email"=>$post['email'],
					  "institute_name"=>$post['institute_name'],
					  "org_type"=>$post['institute_type'],
					  "org_address"=>$post['institute_add'],
					  "bed_qty"=>$post['student_qty'],
					  //"req_type"=>$post['req_type'],					  
					  "contact_number"=>$post['contact_number'],
					  //"status"=>$post['status'],
					  "intro_text"=>$post['intro_text'],
					  "district"=>$post['district_id'],
					  "desig"=>$post['desig'],
					  "thana"=>$thana,
					  //"next_followup_date"=>$nf_date,	
					  //"last_followup_date"=>$lf_date,
					  "update_date"=>$gtime,
					  "update_by"=>$post['update_by'],
					  "bname" =>$post['bname'],
					  "slug_url" =>create_slug($post['slug_url']),
					  "web_link" =>$post['web_link'],
					  "fb_link" =>$post['fb_link'],
					  "approved_status" =>$post['approved_status'],
					  "header_image" =>$post['header_image'],
					  "gallery"=>$post['gallery']
					 
				    );



		$id=$post['id'];
		QB::table('arch_client_req_tbl')->where('id',$id)->update($data);
		// $id=ID_encode($id);
		// $update="Request has been updated";

		// echo"<script> window.location.replace('arch-demo-view.php?id=$id&dem=Arch&msg=$update');</script>";
	}

public function delete_arch_client_request($id){
		QB::table('arch_client_req_tbl')->where('id',$id)->delete();
		echo"<script> window.location.replace('witty-request.php');</script>";
	}


public function get_district(){
	    $query = QB::table('district')->select('*');
        return $result = $query->get();
    }


public function getStateRows($district_id){
		$query = QB::table('thana')->where('district_id','=',$district_id);
    	return $result = $query->get();

    }

        

public function type_list() {
	  return array(
			"1"=>"Bangla M",
			"2"=>"English V",
			"3"=>"English M",
			"4"=>"Madrasah",
			"5"=>"Polytechnic"
		);
	}
public function font_type_list() {
	  	return array(
			"1"=>"Bangla Medium",
			"2"=>"English Version",
			"3"=>"English Medium",
			"4"=>"Madrasah",
			"5"=>"Polytechnic Institute"
	    );
	}

public function return_type($id){
	  switch ($id) {
    case 1: 
          return  "Bangla M"; break;
    case 2: 
          return  "English V"; break;
    case 3: 
          return  "English M"; break;
    case 4: 
          return  "Madrasah"; break;
    case 5: 
          return  "Polytechnic"; break;

		default :
			return "";		
    }
}

public function arch_type_list(){
	return array(
           "1"=>"Hospital",
           "2"=>"Clinic",
           "3"=>"Diagnostic",
           "4"=>"Other"

	);
}


public function font_arch_type_list(){
	return array(
           "1"=>"Hospital",
           "2"=>"Clinic",
           "3"=>"Diagnostic Center",
           "4"=>"Other"

	);
}

public function return_arch_type_list($id){
	  switch ($id) {
    case 1: 
          return  "Hospital"; break;
    case 2: 
          return  "Clinic"; break;
    case 3: 
          return  "Diagnostic"; break;
    case 4: 
          return  "Other"; break;

		default :
			return "";		
    }
}
public function return_blog_status_list($id){
	  switch ($id) {
    case 1: 
          return  "Published"; break;
    case 0: 
          return  "Unpublished"; break;
   
		default :
			return "";		
    }
}

public function return_arch_type_icon($id){
	     switch ($id) {
			    case 1: 			         
			        return  '<i class="fas fa-hospital-symbol"></i>'; break;
			    case 2: 			          
			          return  '<i class="fas fa-briefcase-medical"></i>'; break;
			    case 3: 
			           return  '<i class="fas fa-x-ray"></i>'; break;
			    case 4: 
			         return  '<i class="fas fa-hospital"></i>'; break;

					default :
						return "";		
    }
}

public function return_query_icon($query){
	     switch ($query) {
			    case 'Price': 			         
			        return  '<i class="far fa-money-bill-alt"></i>'; break;
			    case 'Demo': 			          
			          return  '<i class="fas fa-laptop"></i>'; break;
			    case 'camp': 
			           return  '<i class="fas fa-bullhorn"></i>'; break;
			    case 'Refer': 
			         return  '<i class="fas fa-hand-holding-heart"></i>'; break;

					default :
						return "";		
    }
}




 public function return_times($datetime="") {
  if (!empty($datetime)){
    return date("d-m-Y h:i A",strtotime($datetime));
  } else {
    return  "";
  }  
}  

    

public function get_user_name($id){
	  $query = QB::table('user_tbl')->where('user_id','=',$id);
      $result = $query->first();
     return $result->firstName.' '.$result->lastName;
}


 public function get_orgname($value='')
{
      $query=QB::table('arch_client_req_tbl')->where('institute_name', 'LIKE', '%'.$value.'%')->limit(10);
      return $result = $query->get();

}


  public function set_arch_request_from_admin($post='')
    {
    	// date_default_timezone_set("Asia/Dhaka");
    	if(!empty($post['nf_date'])){          
         $str =$post['nf_date'];
         $date = DateTime::createFromFormat('d/m/Y', $str);
         $nf_date= $date->format('Y-m-d');
           
           }else{
           $nf_date=null;
        } 

    if(!empty($post['lf_date'])){     
         $str =$post['lf_date'];
		 $date = DateTime::createFromFormat('d/m/Y', $str);
		 $lf_date= $date->format('Y-m-d');
        }else{
        	$lf_date=null;
        }

       if(!empty($post['thana_id'])){
       	$thana=$post['thana_id'];
       }else{
       	$thana=null;
       }

      global $gtime;
      $user_id=$_SESSION['user_id'];
		$data= array(
					  "name"=>$post['name'],
					  "mobile"=>$post['mobile'],
					  "email"=>$post['email'],
					  "institute_name"=>$post['institute_name'],
					  "org_type"=>$post['institute_type'],
					  "org_address"=>$post['institute_add'],
					  "bed_qty"=>$post['student_qty'],
					  "req_type"=>$post['req_type'],
					  "approved_status"=>$post['approved_status'],
					  "remarks"=>$post['remarks'],
					  "district"=>$post['district_id'],
					  "desig"=>$post['desig'],
					  "thana"=>$thana,
					  "req_date"=>$gtime,
					   "req_by"=>$user_id,
					   'header_image'=>$post['header_image'],
					   'gallery'=>$post['gallery'],
						'contact_number'=>$post['contact_number'],
						'intro_text'=>$post['intro_text'],
						'web_link'=>$post['web_link'],
						'fb_link'=>$post['fb_link'],
						'bname'=>$post['bname'],
						'slug_url'=>create_slug($post['slug_url']),
						'approved_status'=>$post['approved_status']	,
						'mlink'=>$post['mlink'],
						'hits'=>'1'
							 
				    );

	   $insertId=QB::table('arch_client_req_tbl')->insert($data);
	   $insert="Request has been Added";
	   $insertId=ID_encode($insertId);
	   echo"<script> window.location.replace('directory-list.php?id=$insertId&msg=$insert');</script>";

    } 

    public function arch_direc_request_from($post='')
    {

       if(!empty($post['thana_id'])){
       	$thana=$post['thana_id'];
       }else{
       	$thana=null;
       }

      global $gtime;
      $user_id=$_SESSION['user_id'];
		$data= array(
					  "name"=>$post['name'],
					  "mobile"=>$post['mobile'],
					  "email"=>$post['email'],
					  "institute_name"=>$post['institute_name'],
					  "org_type"=>$post['institute_type'],
					  "org_address"=>$post['institute_add'],
					  "bed_qty"=>$post['student_qty'],
					  "req_type"=>'demo',
					  "remarks"=>$post['remarks'],
					  "district"=>$post['district_id'],
					  "desig"=>$post['desig'],
					  "thana"=>$thana,
					  "req_date"=>$gtime,
					  "req_by"=>$user_id,
					  "header_image"=>$post['header_image'],
						"gallery"=>$post['gallery'],
						"contact_number"=>$post['contact_number'],
						"intro_text"=>$post['intro_text'],
						"web_link"=>$post['web_link'],
						"fb_link"=>$post['fb_link'],
						"bname"=>$post['bname'],
						"slug_url"=>create_slug($post['institute_name']),
						"approved_status"=>'1'	,
							 
				    );

	   $insertId=QB::table('arch_client_req_tbl')->insert($data);
	   $insert="Request has been Added";
	   $insertId=ID_encode($insertId);
	   //$eid = ID_encode(['id']);
	  // echo"<script> window.location.replace('arch-directory-request.php?id=$insertId&msg=$insert');</script>";
	   //echo"<script> window.location.replace('./arch-demo-view.php?id=$insertId&msg=$insert');</script>";

    }

    public function get_thana_name($id){
    	 $query= QB::table('thana')->where('id','=', $id);
      return $result=$query->first();

    }

    public function return_district($id){
	$query= QB::table('district')->where('id','=', $id);
          return $result=$query->first();
}





public function get_settings_value($data){
	$query= QB::table('settings')->where('name','=',$data);
	$result=$query->first();
	return $result->value;
}

  

  public function get_setting($name){
           	$result= QB::table('settings')->select('*')->where('name',$name)->first();
           	if(!empty($result)){
           		return $result->value;
           	}
           	} 
   public function update_setting($name, $value){
          
             $data=array("value"=>$value);
           	QB::table('settings')->where('name',$name)->update($data);     

           }

//my function
   public function set_role($post=''){
		    	$data= array(
							  "role"=>$post['role'],							   
						    );
			    $insertId=QB::table('user_role')->insert($data);
			 //     $update="User Role has been Inserted";
				// echo"<script> window.location.replace('user_role.php?msg=$update');</script>";
		}
	public function set_update($post='')
		    {
				
				$data= array(
							  "role"=>$post['role'],							   
						    );
			    $id=$post['id'];
				QB::table('user_role')->where('id',$id)->update($data);
				//echo"<script> window.location.replace('user_role.php');</script>";
				//  $update="User Role has been updated";
				// echo"<script> window.location.replace('user_role.php?msg=$update');</script>";
				
		    }
    public function get_role_one($id) {
    	$query = QB::table('user_role')->where('id',$id);
    	 return $result = $query->first();
    }  

     public function get_all_role() {
    	$query = QB::table('user_role')->select('*');
    	 return $result = $query->get();
    }  
    public function get_featured($id){                  
			
    	$query= QB::query("SELECT t1.*,t2.org_address, t2.name as contactName, t2.institute_name, t3.name as districtName FROM special_org t1 LEFT JOIN arch_client_req_tbl t2 ON t1.reqID=t2.id LEFT JOIN district t3 ON t2.district = t3.id WHERE t1.id='$id'");    
	        return $result = $query->first();
	}
public function get_fetured_request($id,$type){                  
			
    	$query= QB::query("SELECT t1.*,t2.org_address, t2.name as contactName, t2.institute_name, t3.name as districtName FROM special_org t1 LEFT JOIN arch_client_req_tbl t2 ON t1.reqID=t2.id LEFT JOIN district t3 ON t2.district = t3.id WHERE t1.reqID='$id' AND t1.type='$type'");    
	        return $result = $query->first();
	}
	public function info() {
	return array (
		"1" => "Yes",
		"2" =>"No"
	);
}
public function featured () {
	return array (
		"1" => "Yes",
		"0" =>"No"
	);
}
public function arch_featured_list(){
	return array(
           "1"=>"Hospital"

	);
}
public function sf_type_list () {
	return array (
		"1" => "Witty",
		"2" =>"Arch"
	);
}
public function featured_type_list($id){
		  switch ($id) {
	case 0:
    	  return "Canceled"; break;	  	
    case 1: 
          return  "Approved"; break;	        
		default :
			return "";	
    }
}public function user_status_list($id){
		  switch ($id) {
	case 0:
    	  return "Inactive"; break;	  	
    case 1: 
          return  "Active"; break;	        
		default :
			return "";	
    }
}
public function featured_update($post='')
    {
		
		$data= array(
					  "top_org"=>$post['top_org'],
					  "featured_org"=>$post['featured_org'],
					  "status"=>$post['status']							   
				    );
	    
	   $feturedId = $post['feturedId'];
  QB::table('special_org')->where('id',$feturedId)->update($data);
		
    }
public function return_arch_status($id){
	  switch ($id) {
    case 1: 
          return  "Pending "; break;
    case 2: 
          return  "Approved"; break;
    case 3: 
          return  "Complain"; break;

		default :
			return "";		
    }
} 

public function delete_featured($id){
		QB::table('special_org')->where('id',$id)->delete();
		// $delete = "Featured Deleted Succesfully";
		// echo"<script> window.location.replace('featured.php?msg=$delete');</script>";
} 
public function delete_blog($id){
		QB::table('web_articles')->where('id',$id)->delete();
		// $delete = "Featured Deleted Succesfully";
		// echo"<script> window.location.replace('featured.php?msg=$delete');</script>";
}    
public function return_featured_list($id){
	  switch ($id) {
    case 0: 
          return  "No"; break;
    case 1: 
          return  "Yes"; break;

		default :
			return "";		
    }
}   

public function special_org($post='')
    {

		$data= array(
					"reqID" =>$post['inputId'],
					"type"=>'2',
					"top_org"=>$post['top_org'],
					"featured_org"=>$post['featured_org'],
					"status"=>'1',
					 );

	   $insertId=QB::table('special_org')->insert($data);

    }  

//update satart here
}

/*function ID_encode($id,$salt=NULL){
    return base64_encode($id);
}

function ID_decode($encoded_id,$salt=NULL){
    return base64_decode($encoded_id);
}*/

/*website module function*/

/* function create_slug($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}*/
function create_bangla_slug($text){
  $text = preg_replace('/\s+/u', '-', trim($text));

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}





