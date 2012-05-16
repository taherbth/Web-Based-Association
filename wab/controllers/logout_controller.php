<?php
    if(isset($_SESSION['member_name'])){
            unset($_SESSION['member_name']);
            include_once("./views/index_view.php");
    }
           
?>