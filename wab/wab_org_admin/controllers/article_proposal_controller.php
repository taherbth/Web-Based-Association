<?php

if($_REQUEST['proposal_approved']){
    $proposal_approved_id = $_REQUEST['proposal_approved'];
    update_article_tbl($proposal_approved_id,"proposal_approved",1);
}
elseif($_REQUEST['proposal_denied']){
    $proposal_denied_id = $_REQUEST['proposal_denied'];
    update_article_tbl($proposal_denied_id,"proposal_denied",1);
}

if(isset($_SESSION['user_name'])){
         $article_proposal = get_proposal_article();
         include("./views/article_proposal_view.php");
}
else{
    header('Location:index.php?');
}
  
?>