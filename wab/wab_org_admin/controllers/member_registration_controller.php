<?php
             
  
   if(isset($_POST['register'])){
       
         if(isset($_SESSION['organization_id'])){
           $data['org_id'] = $_SESSION['organization_id'];
           $data['org_name'] = get_organization_name_by_id($data['org_id']);
        }
        
        $data['member_first_name']                = $_POST['member_first_name'];
        $data['member_last_name']                 = $_POST['member_last_name'];
        $data['membership_expire_date']        = $_POST['membership_expire_date'];
        $data['member_email']                        = $_POST['member_email'];
        $data['member_user_name']               = $_POST['member_user_name'];
        $data['member_pnr']                           = $_POST['member_pnr'];
        $data['member_type_id']                     = $_POST['member_type_id'];
        $data['member_address']                    = $_POST['member_address'];
        $error_response                                  = member_registration_form_validation($data,$lang_file);
        
        $member_registration_response=array();
                        
        if(sizeof($error_response)<=0){
  
            $error_response = is_exists($lang_file,$table_name="member_tbl",$field_name="member_email",$value=$data['member_email'],"","");
           
            if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="member_tbl",$field_name="member_user_name",$value=$data['member_user_name'],"","");
            }
            if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="organization_tbl",$field_name="organization_admin_user",$value=$data['member_user_name'],"","");
            }
             if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="member_tbl",$field_name="member_pnr",$value=$data['member_pnr'],"","");
            }
            if(sizeof($error_response)<=0){
                $login_password =  mt_rand(1028438, 9999999);
                $data['login_password']=$login_password;
                $data['member_login_password'] = encrypt($login_password,'whateveryouwant');                
                $member_registration_response = insert_member_registration_data($data);
            }
        }
        
        if($member_registration_response){
            $data = send_member_registration_confirmation_email($data);
        }
   }
   
       if(isset($_SESSION['user_name'])){
         $member_type = get_membertype();
         include("./views/member_registration_view.php");
    }
    else{
        header('Location:index.php?');
    }
  
?>