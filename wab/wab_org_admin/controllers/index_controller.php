<?php

if(isset($_POST['login'])){
    $data['user_name'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $error_response  = org_login_form_validation($data);
    
    if(sizeof($error_response)<=0){
        $data['password'] = encrypt($data['password'],'whateveryouwant');           
        $login_response = verify_org_admin_login($data);
        if($login_response){
                $_SESSION['user_name']=$data['user_name'];
                header('Location:index.php?controller=admin_home');
            }
        else{
               $_SESSION['user_name']="";
        }
    }
}
    include_once("./views/login_view.php");
?>