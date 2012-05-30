<?php
include_once('./config/config.php');
include_once('./include/function.php');
include('models/wab_member.php');

//8149681 emdad----userend
//462529496 nazmul----userend

//4215496 admin: taherbth


//4219547 admin_live_site: emdad
//3290295 user_live_site: raju

//admin 4753816
$controller = "";
if(isset($_SESSION['member_name'])){
    $controller = $_REQUEST['controller'];
}

if(empty($controller) && (isset($_SESSION['member_name']) && !empty($_SESSION['member_name']))){
    $controller='index';
}


if(isset($_SESSION['member_name']) && !empty($_SESSION['member_name'])){
    $member_type_authority = get_member_type_authority($_SESSION['member_id']);
    $member_type_authority_one = get_member_type_authority($_SESSION['member_id']);
}

if(empty($controller))
    $controller='index';    
include_once('controllers/'.$controller."_controller.php");
?>
