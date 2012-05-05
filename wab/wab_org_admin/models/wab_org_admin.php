<?php
    
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
            return TRUE;
        }
        else{
                $sql_login = "SELECT * FROM member_tbl WHERE user_type='Administrator' AND (member_email='".$data['user_name']."' OR member_pnr='".$data['user_name']."') AND member_login_password='".$data['password']."'";
                $result = mysql_query($sql_login);
                 if(mysql_num_rows($result)>=1){
                    return TRUE;
                }
                else{return FALSE;}
            }
}

?>