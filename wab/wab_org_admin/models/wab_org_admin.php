<?php
    // Org Registration
    function insert_organization_registration_data($data){
        
        $add_date = date('Y-m-d: H:i:s');
        $insert_sql_org = "INSERT INTO organization_tbl
                                        SET      organization_number = ".$data['organization_number'].",
                                                    organization_name = '".$data['organization_name']."',
                                                    primary_address = '".$data['primary_address']."',
                                                    optional_address = '".$data['optional_address']."',
                                                    organization_phone = '".$data['organization_phone']."',
                                                    organization_admin_user = '".$data['organization_admin_user']."',
                                                    organization_admin_password = '".$data['organization_admin_password']."',
                                                    add_date = '$add_date'";
                                                    mysql_query($insert_sql_org);
                                                    
                                                    if(mysql_insert_id()>0){
                                                        
                                                        $org_id = mysql_insert_id();
                                                        $insert_sql_member = "INSERT INTO member_tbl
                                                                                    SET      organization_id = $org_id,
                                                                                    user_type='Administrator',
                                                                                    member_pnr = '".$data['member_pnr']."',
                                                                                    member_first_name = '".$data['member_first_name']."',
                                                                                    member_last_name = '".$data['member_last_name']."',
                                                                                    member_user_name = '".$data['organization_admin_user']."',
                                                                                    member_login_password = '".$data['organization_admin_password']."',
                                                                                    member_email = '".$data['member_email']."',
                                                                                    member_cell_phone = '".$data['member_cell_phone']."',
                                                                                    member_address = '".$data['member_address']."',
                                                                                    add_date = '$add_date'";
                                                                                    mysql_query($insert_sql_member);
                                                                                    
                                                                                     if(mysql_insert_id()>0){
                                                                                         return TRUE;
                                                                                     }
                                                                                     else{
                                                                                         return FALSE;
                                                                                     }                                                   
                                                    }
                                                    else{
                                                            return FALSE;
                                                    }
    }
                            
// Member Registration
function insert_member_registration_data($data){

    $add_date = date('Y-m-d: H:i:s');
    
    $insert_sql_member = "INSERT INTO member_tbl
            SET      organization_id = '".$data['org_id']."',
            member_pnr = '".$data['member_pnr']."',
            member_first_name = '".$data['member_first_name']."',
            member_last_name = '".$data['member_last_name']."',
            membership_expire_date = '".$data['membership_expire_date']."',
            member_user_name = '".$data['member_user_name']."',
            member_login_password = '".$data['member_login_password']."',
            member_email = '".$data['member_email']."',
            member_type_id = '".$data['member_type_id']."',
            member_address = '".$data['member_address']."',
            add_date = '$add_date'";
    mysql_query($insert_sql_member);

    if(mysql_insert_id()>0){
    return TRUE;
    }
    else{
    return FALSE;
    }                                                   

}
           

//Data exists or not

    function  is_exists($lang_file,$table_name,$field_name,$value){
        include($lang_file);
        $query = "SELECT * from $table_name WHERE $field_name='$value'";
        $result = mysql_query($query);
        if(mysql_num_rows($result)>=1){
            if($field_name=="organization_number"){
                $error['organization_number_error']= $language['organization_number_exists'];
            }
            elseif($field_name=="organization_name"){
                $error['organization_name_error']= $language['organization_name_exists'];
            }
            elseif($field_name=="member_email"){
                $error['member_email_error']= $language['member_email_exists'];
            }
            elseif($field_name=="member_user_name"||$field_name=="organization_admin_user"){
                $error['organization_admin_user_error']= $language['username_exists'];
            }
            elseif($field_name=="member_pnr"){
                $error['member_pnr_error']= $language['member_pnr_exists'];
            }
            
            return $error;
        }
    }
    
//Org_admin Login Verification
function verify_org_admin_login($data){
    $sql_login = "SELECT * FROM organization_tbl WHERE organization_admin_user='".$data['user_name']."' AND organization_admin_password='".$data['password']."'";
    $result = mysql_query($sql_login);
        if(mysql_num_rows($result)>=1){
           $row = mysql_fetch_assoc($result);
           return $row['organization_id'];
        }
        else{
                $sql_login = "SELECT * FROM member_tbl WHERE user_type='Administrator' AND (member_email='".$data['user_name']."' OR member_pnr='".$data['user_name']."') AND member_login_password='".$data['password']."'";
                $result = mysql_query($sql_login);
                 if(mysql_num_rows($result)>=1){
                     $row = mysql_fetch_assoc($result);
                     return $row['organization_id'];
                }
                else{return FALSE;}
            }
}

//Get all member type
function get_membertype(){
    $sql_member_type = "SELECT * FROM member_type_tbl";
    $result = mysql_query($sql_member_type);
    return $result;
  
}

//Get all module functions
function get_all_module_functions(){
     $sql_module_functions = "SELECT * FROM module_function_name_tbl";
     $result = mysql_query($sql_module_functions);
     return $result;
}

//Check module function access exists or not in module_function_access_tbl
// If not exists then it will insert on this table
function check_module_function_access_exists_or_not($org_id,$member_type_id){
    $add_date = date('Y-m-d: H:i:s');
    $sql_module_function = "SELECT * FROM module_function_name_tbl";
    $result_module_function = mysql_query($sql_module_function);
    if(mysql_num_rows($result_module_function )>0){
        while ($row = mysql_fetch_assoc($result_module_function)) {
            $sql_function_access = "SELECT * FROM module_function_access_tbl 
                                                    WHERE module_function_id='".$row['module_function_id']."' AND 
                                                    organization_id='".$org_id."' AND member_type_id='".$member_type_id."'";

            $result_function_access = mysql_query($sql_function_access);
            if(mysql_num_rows($result_function_access)<=0){
                $sql_function_access_insert = "INSERT INTO module_function_access_tbl
                                                                  SET module_function_id='".$row['module_function_id']."',
                                                                         module_function_html_id = '".$row['module_function_html_id']."',
                                                                         organization_id='".$org_id."',
                                                                         member_type_id='".$member_type_id."',
                                                                         add_date = '".$add_date."'";
                 mysql_query($sql_function_access_insert);
            }
            
        }
    }
    return TRUE;
}

// Get all function_access data for particular user_type and organization
function get_all_module_function_access($org_id,$member_type_id){
    $sql_function_access = "SELECT * FROM module_function_access_tbl mfac, module_function_name_tbl mf WHERE (mfac.organization_id='".$org_id."' AND mfac.member_type_id='".$member_type_id."') AND (mfac.module_function_id=mf.module_function_id)";
    $result =  mysql_query($sql_function_access);
    return  $result; 
}

//Get User type name by id
function get_user_type_name_by_id($member_type_id){
    $sql_member_type = "SELECT member_type_name FROM member_type_tbl WHERE member_type_id='".$member_type_id."'";
    $result =  mysql_query($sql_member_type);
     if(mysql_num_rows($result)>0){
        $row = mysql_fetch_assoc($result);
        return $row['member_type_name'];
    }
}
                                                                                                                                     
// Update module function access 
function update_module_function_access($org_id,$member_type_id,$module_function_access_id){
    $sql_function_access = "UPDATE module_function_access_tbl SET module_function_access=1 
                                            WHERE 	organization_id='".$org_id."' AND 
                                            member_type_id='".$member_type_id."' AND 
                                            module_function_access_id IN ($module_function_access_id)";
   $result =  mysql_query($sql_function_access);
   
   $sql_function_access = "UPDATE module_function_access_tbl SET module_function_access=0
                                            WHERE 	organization_id='".$org_id."' AND 
                                            member_type_id='".$member_type_id."' ";
                                            
    if(!empty($module_function_access_id)){
        $sql_function_access.=" AND module_function_access_id NOT IN ($module_function_access_id)";
    }
   $result =  mysql_query($sql_function_access);
   
   return TRUE;
}

//Get org name by org id
function get_organization_name_by_id($org_id){
    $sql_organization = "SELECT * FROM organization_tbl WHERE organization_id='".$org_id."'";
    $result =  mysql_query($sql_organization);
     if(mysql_num_rows($result)>0){
        $row = mysql_fetch_assoc($result);
        return $row['organization_name'];
    }
}

?>

