<?php

     if(isset($_POST['article'])){
       
         if(isset($_SESSION['organization_id']) && !empty($_SESSION['organization_id'])){
                $data['organization_id'] = $_SESSION['organization_id'];
                $data['member_id'] = $_SESSION['member_id'];
        }
        
        $data['article_title']                                = $_POST['article_title'];
        $data['article_headings']                       = $_POST['article_headings'];
        $data['article_text']                               = $_POST['article_text'];
        $data['article_category_id']                   = $_POST['article_category_id'];
        $data['article_importance']                   = $_POST['article_importance'];
        $data['proposal_approved']                   = $_POST['proposal_approved'];
        $create_article                                       = $_POST['create_article'];
        $data['article_add_date']                       = $_POST['article_add_date'];
        $data['article_expire_date']                   = $_POST['article_expire_date'];   
        $data['article_posting_notification']       = $_POST['article_posting_notification'];   
                        
        $error_response                                    = article_post_form_validation($data,$lang_file);
        
        $article_post_response=array();
                        
        if(sizeof($error_response)<=0){
             $expire_date = explode("-",$_POST['article_expire_date']);
             $data['article_expire_date'] = mktime(0,0,0,$expire_date[1],$expire_date[2],$expire_date[0]);
             $error_response = is_exists($lang_file,$table_name="article_tbl",$field_name="article_title",$value=$data['article_title']);
           
            if(sizeof($error_response)<=0){
                 $article_post_response = insert_article_posting_data($data);
                 
                 if($article_post_response){
                     if(!empty($data['article_posting_notification'])){
                         $data['BASE_URL']=$config['BASE_URL'];
                         $data['last_inserted_article_id']=$article_post_response;
                         $data['article_category_name']=get_article_category_name_by_id($data['article_category_id']);
                         $data['organization_name'] = get_organization_name_by_id($data['organization_id']);
                         $member_data = get_all_member_by_org_id($data['organization_id']);
                         $article_posting_notification = send_article_posting_email($lang_file,$data,$member_data);
                         //$data['success']=TRUE;
                         if($data['success']){
                             $update_aticle_tbl = update_article_tbl($data['last_inserted_article_id'],$data['article_posting_notification']);
                        }
                     }
                     $data = array();
                     if($create_article){
                        $data['msg2'] = $language['article_post_successful'];
                     }
                     else{
                        $data['msg2'] = $language['proposal_send_successful'];
                     }
                }
               else{
                   if($create_article){
                        $data['msg2'] = $language['article_post_failed'];
                   }
                  else{
                        $data['msg2'] = $language['proposal_send_failed'];
                   }
                }
            }
        }
        
   }
   
    $count=0;
    if(mysql_num_rows($member_type_authority)>0){        
            while($row_one = mysql_fetch_array($member_type_authority_one)){
                if($row_one['module_function_html_id']=="create_article" || $row_one['module_function_html_id']=="send_proposal_for_article_post"){
                        if($row_one['module_function_html_id']=="create_article"){
                            $proposal_approved =1;
                        }
                        $article_category = get_article_category();                        
                        include_once("./views/create_article_view.php");
                        exit;
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