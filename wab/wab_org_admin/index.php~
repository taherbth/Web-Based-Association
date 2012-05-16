<?php

// 890924833 Test
// -305112754  admin
//890924833 emdad----userend
//462529496 nazmul----userend
include_once('../common/config/config.php');
include_once('../common/include/function.php');
include_once('models/wab_org_admin.php');

$controller = $_REQUEST['controller'];
if(isset($_SESSION['user_name'])){
    $controller = $_REQUEST['controller'];
    $article_proposal = get_proposal_article();
}


elseif(empty($_SESSION['user_name']) && $controller!="registration"){
    $controller = "";
}

if(empty($controller) && (isset($_SESSION['user_name']) && !empty($_SESSION['user_name']))){
    $controller='admin_home';
}



if(empty($controller))
    $controller='index';    
include_once('controllers/'.$controller."_controller.php");


?>
