<?php
include_once('./config/config.php');
    if(isset($_SESSION['member_name'])){
            unset($_SESSION['member_name']);    
            header('Location:index.php');
    }
           
?>