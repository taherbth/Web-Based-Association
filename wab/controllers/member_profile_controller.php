<?php         
  
  if(isset($_POST['update'])){
        $data['member_id']                             = $_POST['member_id'];
        $data['organization_id']                       = $_POST['organization_id'];
        $data['user_type']                                = $_POST['user_type'];
        $data['member_title']                           =$_POST['member_title'];
        $data['member_first_name']                = $_POST['member_first_name'];
        $data['member_last_name']                 = $_POST['member_last_name'];        
        $data['member_email']                        = $_POST['member_email'];
        $data['member_user_name']               = $_POST['member_user_name'];
        $data['member_pnr']                           = $_POST['member_pnr'];        
        $data['member_home_phone']            = $_POST['member_home_phone'];        
        $data['member_cell_phone']                = $_POST['member_cell_phone'];        
        $data['member_address']                    = $_POST['member_address'];
        $error_response                                  = member_registration_form_validation($data,$lang_file);
        
        $member_registration_response=array();   
        $data_update=array();
                        
        if(sizeof($error_response)<=0){
           
            $error_response = is_exists($lang_file,$table_name="member_tbl",$field_name="member_email",$value=$data['member_email'],$field_not_chk="member_id",$data['member_id']);
           
            if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="member_tbl",$field_name="member_user_name",$value=$data['member_user_name'],$field_not_chk="member_id",$data['member_id']);
            }
            if(sizeof($error_response)<=0){
                if($data['user_type']=="Administrator"){
                    $error_response = is_exists($lang_file,$table_name="organization_tbl",$field_name="organization_admin_user",$value=$data['member_user_name'],$field_not_chk="organization_id",$data['organization_id']);
                }
                else{
                        $error_response = is_exists($lang_file,$table_name="organization_tbl",$field_name="organization_admin_user",$value=$data['member_user_name'],$field_not_chk="","");
                }
           }
             if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="member_tbl",$field_name="member_pnr",$value=$data['member_pnr'],$field_not_chk="member_id",$data['member_id']);
            }
            
            if(sizeof($error_response)<=0){
                $member_profile_update_response = update_member_profile_data($data);
                if($member_profile_update_response){
                    $data_update['mgs2']=$language['member_profile_update_text'];
                }
                
                
                $member_id = $_SESSION['member_id'];   
                $organization_id = $_SESSION['organization_id'];   
                $member_data = get_member_info($member_id,$organization_id);
                include("./views/member_profile_view.php");
                exit;
            }
        }
 }
   if(isset($_REQUEST['update_id'])){
           $org_id = $_REQUEST['update_id'];       
           $organization_data = get_org_admin_info($org_id);           
           include("./views/admin_profile_update_view.php");     
           exit;
   }
   
    if(isset($_SESSION['member_id'])){
           $member_id = $_SESSION['member_id'];   
           $organization_id = $_SESSION['organization_id'];   
           $member_data = get_member_info($member_id,$organization_id);
           include("./views/member_profile_view.php");
    }
    else{
        header('Location:index.php?');
    }
?>