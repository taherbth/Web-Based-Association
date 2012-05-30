<?php
      
        
    if(isset($_POST['register'])){
        $data['organization_number']            =$_POST['organization_number'];
        $data['organization_name']                =$_POST['organization_name'];
        $data['primary_address']                    =$_POST['primary_address'];
        $data['optional_address']                    =$_POST['optional_address'];
        $data['organization_phone']                = $_POST['organization_phone'];
        $data['member_first_name']               = $_POST['member_first_name'];
        $data['member_last_name']                = $_POST['member_last_name'];
        $data['member_cell_phone']               =$_POST['member_cell_phone'];
        $data['member_email']                       =$_POST['member_email'];
        $data['organization_admin_user']       =$_POST['organization_admin_user'];
        $data['member_pnr']                          =$_POST['member_pnr'];
        $data['member_address']                   = $_POST['member_address'];
        $error_response                                 = org_registration_form_validation($data,$lang_file);
        
        $org_registration_response=array();
                        
        if(sizeof($error_response)<=0){
            $error_response = is_exists($lang_file,$table_name="organization_tbl",$field_name="organization_number",$value=$data['organization_number'],"","");
            if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="organization_tbl",$field_name="organization_name",$value=$data['organization_name'],"","");
            }
            if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="member_tbl",$field_name="member_email",$value=$data['member_email'],"","");
            }
            if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="member_tbl",$field_name="member_user_name",$value=$data['organization_admin_user'],"","");
            }
            if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="organization_tbl",$field_name="organization_admin_user",$value=$data['organization_admin_user'],"","");
            }
             if(sizeof($error_response)<=0){
                $error_response = is_exists($lang_file,$table_name="member_tbl",$field_name="member_pnr",$value=$data['member_pnr'],"","");
            }
            if(sizeof($error_response)<=0){
                $login_password =  mt_rand(1028438, 9999999);
                echo $data['login_password']=$login_password;
                $data['organization_admin_password'] = encrypt($login_password,'whateveryouwant');                
                $org_registration_response = insert_organization_registration_data($data);
            }
        }
        
        if($org_registration_response){
            $data = send_org_registration_confirmation_email($data);
        }
        
   }
   
   include_once("./views/registration_view.php");
   

?>