<ul>        
<?php if(isset($_SESSION['member_name']) && !empty($_SESSION['member_name'])) { ?>
    <li><a href="index.php?controller=member_profile"><?php echo $language['admin_menu_profile'];?></a></li>
            <?php  if(mysql_num_rows($member_type_authority)>0){
                                $can_comment=FALSE;
                                $create_article=FALSE;
                                $article_posting_notification_via_email=FALSE;
                                $send_whole_article_via_email=FALSE;
                                while($row = mysql_fetch_array($member_type_authority)){
                                    
                                    if($row['module_function_html_id']=="access_org_presentation_page"){
                                        echo "<li><a href='index.php?controller=org_presentation'>".$language['org_presentation_page_link']."</a></li>   ";
                                    }
                                    if($row['module_function_html_id']=="access_org_main_board"){
                                        echo "<li><a href='index.php?controller=org_mainboard'>".$language['org_main_board_link']."</a></li>   ";
                                    }
                                    if($row['module_function_html_id']=="create_article"){
                                        $create_article=TRUE;
                                        echo "<li><a href='index.php?controller=create_article'>".$language['article_create_link']."</a></li>   ";
                                    }
                                    elseif($row['module_function_html_id']=="send_proposal_for_article_post" && !$create_article){
                                        echo "<li><a href='index.php?controller=create_article'>".$language['send_proposal_for_article_post_link']."</a></li>   ";
                                    }
                                    if($row['module_function_html_id']=="make_comments_on_article"){
                                        $can_comment=TRUE;
                                    }
                                    if($row['module_function_html_id']=="article_posting_notification_via_email"){
                                        $article_posting_notification_via_email=TRUE;
                                    }
                                    if($row['module_function_html_id']=="send_whole_article_via_email"){
                                        $send_whole_article_via_email=TRUE;
                                    }
                                }      
                        }
            ?>
    
    <li><a href="logout.php"><?php echo $language['admin_menu_logout'];?></a></li>   
<?php } else {?>
        
    <li><a href="index.php?"><?php echo $language['member_login'];?></a></li>
    <?php }?>
    
   
        
        
</ul>