<?php
    
    if(isset($_SESSION['user_name'])){
            unset($_SESSION['user_name']);
            include_once("./views/login_view.php");
    }
           
?>