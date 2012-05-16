<?php
include_once('../common/config/config.php');
    if(isset($_SESSION['user_name'])){
            unset($_SESSION['user_name']);    
            header('Location:index.php');
    }
           
?>