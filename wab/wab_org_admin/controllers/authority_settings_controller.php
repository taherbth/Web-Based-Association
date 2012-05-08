<?php
    
    $member_type = get_membertype();
    
    if(isset($_POST['next']) && $_POST['member_type']!=NULL){
        
        if(isset($_SESSION['organization_id'])){
           $org_id = $_SESSION['organization_id'];
        }
        
        $member_type_id = $_POST['member_type'];
        $success_msg = check_module_function_access_exists_or_not($org_id,$member_type_id);
        if($success_msg){
            $member_type_name = get_user_type_name_by_id($member_type_id);
            $module_function_access_list = get_all_module_function_access($org_id,$member_type_id);
            include_once("./views/save_authority_settings_view.php");
            exit;
        }
}
    
     if(isset($_POST['save_changes'])){
         if(isset($_SESSION['organization_id'])){
           $org_id = $_SESSION['organization_id'];
         }
         $member_type_id = $_POST['member_type'];
         $module_function_access_id = $_POST['module_function_access_id'];
         if(sizeof($module_function_access_id)>0){
            $module_function_access_id = implode(",",$module_function_access_id);
         }
         $update_message = update_module_function_access($org_id,$member_type_id,$module_function_access_id); 
         
         if($update_message){
            $member_type_name = get_user_type_name_by_id($member_type_id);
            $module_function_access_list = get_all_module_function_access($org_id,$member_type_id);
            include_once("./views/save_authority_settings_view.php");
         }
         exit;
}
        
    include_once("./views/authority_settings_view.php");
?>