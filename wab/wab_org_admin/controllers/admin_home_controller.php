<?php
             
    if(isset($_SESSION['user_name'])){
         include("./views/admin_home_view.php");
    }
    else{
        header('Location:index.php?');
    }
   

?>