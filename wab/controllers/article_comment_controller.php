<?php


     if(isset($_POST['comment'])){
       
         if(isset($_SESSION['organization_id']) && !empty($_SESSION['organization_id'])){
                $data['organization_id'] = $_SESSION['organization_id'];
                $data['member_id'] = $_SESSION['member_id'];
        }
        
        $article_data = get_main_board_article($_SESSION['organization_id'],$_REQUEST['article_id']);
        $article_comment_data = get_article_comment($_SESSION['organization_id'],$_REQUEST['article_id']);
        
       
        if(mysql_num_rows($article_data)>0){
            $row_article = mysql_fetch_array($article_data);
        }
        
        $data['article_comment']     = $_POST['article_comment'];
        $data['article_id']                 = $_POST['article_id'];
        
        if(empty($data['article_comment'])){
			$error_response['article_comment_error']= $language['article_comment_error_text'];
		}
        
        $article_comment_response=array();
                        
        if(sizeof($error_response)<=0){
                       
            if(sizeof($error_response)<=0){
                 $article_comment_response = insert_article_comment_data($data,$row_article);
                 if($article_comment_response){
                     $data = array();
                     $data['msg2'] = $language['article_comment_post_successful'];
                }
               else{
                    $data['msg2'] = $language['article_comment_post_faled'];
                }
            }
        }
        
   }
   
    $count=0;
    if(mysql_num_rows($member_type_authority_one)>0){
        
            while($row_one = mysql_fetch_array($member_type_authority_one)){
                if($row_one['module_function_html_id']=="make_comments_on_article"){
                    if(isset($_SESSION['member_id']) && !empty($_SESSION['member_id'])){
                          $article_data = get_main_board_article($_SESSION['organization_id'],$_REQUEST['article_id']);
                          $article_comment_data = get_article_comment($_SESSION['organization_id'],$_REQUEST['article_id']);
                          include_once("./views/article_comment_view.php");
                          exit;
                    }
                    
                }
                else{
                            $count++;
                      }
            }   
           
    }
    
     if($count){
                         echo "<div style='color:red;'>".$language['unauthorized_access_org_presentation_page']."</div>";
                         exit;
            }
   
?>