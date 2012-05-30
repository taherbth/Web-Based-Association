<?php

if(isset($_POST['login'])){
    $data['user_name'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $error_response  = member_login_form_validation($data);
    
    if(sizeof($error_response)<=0){
        $data['password'] = encrypt($data['password'],'whateveryouwant');           
        $login_response = verify_member_login($data);
        if(!empty($login_response)){
                $_SESSION['member_id']=$login_response['member_id'];
                $_SESSION['organization_id']=$login_response['organization_id'];
                $_SESSION['member_name']=$data['user_name'];
                $_SESSION['login_success_message']=$language['login_success_message_text'] ;
                $member_type_authority = get_member_type_authority($_SESSION['member_id']);
                
                
                //header('Location:index.php?controller=admin_home');
                
            }
        else{
               $_SESSION['user_error']=$language['user_login_error'];
        }
    }
}
    include_once("./views/index_view.php");
?>