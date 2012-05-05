<?php

include_once('../common/config/config.php');
include_once('../common/include/function.php');
include_once('models/wab_org_admin.php');

$controller = $_REQUEST['controller'];

if(empty($controller))
    $controller='index';

if($controller!="logout" && (isset($_SESSION['user_name']) && !empty($_SESSION['user_name']))){
    $controller='admin_home';
}
include_once('controllers/'.$controller."_controller.php");


?>
