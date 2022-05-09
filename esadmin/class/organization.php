<?php 
/*include '../connect.php';*/
/**
 * 
 */

class Organization{ 
      
public function USER_ACL_LIST(){
  return array( 
  "1"=>"Admin",
  "4"=> "Sr. Executive",
  "5"=> "Executive",
  "6"=> "Support",
  "7"=> "Freelancer",                                            
  "8"=> "Other Staff (No Access)"
 ); 
}

                                                     
  /**
 * Return user access name
**/     
public static function return_access($access_group){  
        switch ($access_group) {
           case 1: return "Admin";
           case 4: return "Sr. Executive";
           case 5: return "Executive";
           case 6: return "Support";
           case 7: return "Freelancer";
           case 8: return "Other Staff (No Access)";
        }    
    } 

    public function update_directory_arch_req($post){
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

       if($post['slug_url']!=$post['pre_slug']){
         $slug_url= create_slug($post['slug_url']);
         $query = QB::table('arch_client_req_tbl')->where('slug_url','=',$slug_url);
         $ck_slug = $query->first();
         if(!empty($ck_slug)){
           $rand=rand(10,100);
           $slug_url= $ck_slug->slug_url.'_'.$rand;
         }
       }else{
        $slug_url=$post['pre_slug'];
       }

       global $gtime;

       if (empty($post['student_qty'])) {

        $post['student_qty']=1;
       }

       $headerImage=!empty($post['header_image']) ? $post['header_image']: NULL;
       $galleryImage=!empty($post['gallery']) ? $post['gallery']: NULL;
        $data= array(
                      "name"=>$post['name'],
                      "institute_name"=>$post['institute_name'],
                      "org_type"=>$post['institute_type'],
                      "org_address"=>$post['institute_add'],
                      "bed_qty"=>$post['student_qty'],                   
                      "contact_number"=>$post['contact_number'],
                      "district"=>$post['district_id'],
                      "desig"=>$post['desig'],
                      "thana"=>$thana,
                      "update_date"=>$gtime,
                      "update_by"=>$post['update_by'],
                      "bname" =>$post['bname'],
                      "slug_url" =>$slug_url,
                      "web_link" =>$post['web_link'],
                      "fb_link" =>$post['fb_link'],
                      "approved_status" =>$post['approved_status'],
                      "header_image" =>$headerImage,
                      "gallery"=>$galleryImage,
                      "intro_text"=>$post['intro_text'],
                      "mlink"=>$post['mlink']
                     
                    );


        
        $id=$post['id'];
        QB::table('arch_client_req_tbl')->where('id',$id)->update($data);
        $query = QB::table('log_web')->where('req_id','=',$id)->where('req_type','=','2')->where('type','=','1');
        $ck_log = $query->first();

        if(empty($ck_log) && $post['approved_status']=='2'){
        web_log_insert(2,$id,1);
        }else{
        web_log_insert(2,$id,2);
        }
        $id=ID_encode($id);
         $update="2";

        echo"<script> window.location.replace('directory-org-request-view.php?id=$id&msg=$update');</script>";
    }

    public function set_directory_arch_request_from_admin($post){        

       if(!empty($post['thana_id'])){
        $thana=$post['thana_id'];
       }else{
        $thana=null;
       }

       if(!empty($post['slug_url'])){
       $slug= create_slug($post['slug_url']);
        $query = QB::table('arch_client_req_tbl')->where('slug_url','=',$slug);
         $ck_slug = $query->first();
         if(!empty($ck_slug)){
           $rand=rand(10,100);
           $slug= $ck_slug->slug_url.'_'.$rand;
         }

       }else{
         $slug= create_slug($post['institute_name']);
         $query = QB::table('arch_client_req_tbl')->where('slug_url','=',$slug);
         $ck_slug = $query->first();
         if(!empty($ck_slug)){
           $rand=rand(10,100);
           $slug= $ck_slug->slug_url.'_'.$rand;
         }
       }

      global $gtime;
      $user_id=$_SESSION['user_id'];
     $headerImage=!empty($post['header_image']) ? $post['header_image']: NULL;
     $galleryImage=!empty($post['gallery']) ? $post['gallery']: NULL;

     if(empty($post['req_type'])){
      $req_type='camp';
     }else{
       $req_type=$post['req_type'];
     }
        $data= array(
                        "name"=>$post['name'],
                        "mobile"=>$post['mobile'],
                        "email"=>$post['email'],
                        "institute_name"=>$post['institute_name'],
                        "org_type"=>$post['institute_type'],
                        "org_address"=>$post['institute_add'],
                        "bed_qty"=>$post['student_qty'],
                        "req_type"=>$req_type,
                        "status"=>6,
                        "remarks"=>$post['remarks'],
                        "district"=>$post['district_id'],
                        "desig"=>$post['desig'],
                        "thana"=>$thana,
                        "req_date"=>$gtime,
                        "req_by"=>$user_id,
                        'header_image'=>$headerImage,
                        'gallery'=>$galleryImage,
                        'contact_number'=>$post['contact_number'],
                        'intro_text'=>$post['intro_text'],
                        'web_link'=>$post['web_link'],
                        'fb_link'=>$post['fb_link'],
                        'bname'=>$post['bname'],
                        'slug_url'=>$slug,
                        'approved_status'=>$post['approved_status'],
                        'mlink'=>$post['mlink'],
                         'hits'=>'1'  
                             
                    );

       $insertId=QB::table('arch_client_req_tbl')->insert($data);
       $insert="Request has been Added";
      if($post['approved_status']=='2'){
       web_log_insert(2,$insertId,1);
       }else{
       web_log_insert(2,$insertId,2);
     }
       $insertId=ID_encode($insertId);
       echo"<script> window.location.replace('directory-org-request-view.php?id=$insertId&msg=$insert');</script>";
    }
    
    public function request_count($id,$type,$fromDate=NULL,$date=NULL){
      $today=date("Y-m-d");
    if (empty($fromDate)&& empty($date)) {
      $query = QB::query("SELECT COUNT(DISTINCT req_id) as num FROM log_web WHERE userby = '$id' AND req_type ='$type' AND DATE(time) = '$today'");
    }else{
      $query = QB::query("SELECT COUNT(DISTINCT req_id) as num FROM log_web WHERE userby = '$id' AND req_type ='$type' AND (DATE(time) BETWEEN  ' {$fromDate}' AND '{$date}') ");
    }
    return $result=$query->first();
  
  }

/*statusType=1 for publish 2 for update*/


  public function statusWiseReqLog($id,$statusType,$type,$fromDate=NULL,$date=NULL){
    $today=date("Y-m-d");
   
    if($statusType=='1'){
   
    if(empty($fromDate)&& empty($date)) {
      $query = QB::query("SELECT COUNT(DISTINCT req_id) as num FROM log_web WHERE userby = '$id' AND type = '$statusType' AND req_type ='$type' AND DATE(time) = '$today'");
    }else{
      $query = QB::query("SELECT COUNT(DISTINCT req_id) as num FROM log_web WHERE userby = '$id' AND type = '$statusType' AND req_type ='$type' AND (DATE(time) BETWEEN  ' {$fromDate}' AND '{$date}')");
    }
  
  }else{
    
    if(empty($fromDate)&& empty($date)) {
      $query = QB::query("SELECT COUNT(req_id) as num FROM log_web WHERE userby = '$id' AND type = '$statusType' AND req_type ='$type' AND DATE(time) = '$today'");
    }else{
      $query = QB::query("SELECT COUNT(req_id) as num FROM log_web WHERE userby = '$id' AND type = '$statusType' AND req_type ='$type' AND (DATE(time) BETWEEN  ' {$fromDate}' AND '{$date}')");
    }

    }
    
    return $result=$query->first();
  
  }



}


