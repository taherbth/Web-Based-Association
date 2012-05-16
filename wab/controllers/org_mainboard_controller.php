<?php

    $count=0;
    if(mysql_num_rows($member_type_authority_one)>0){
        
            while($row_one = mysql_fetch_array($member_type_authority_one)){
                if($row_one['module_function_html_id']=="access_org_main_board"){
                    if(isset($_SESSION['member_id']) && !empty($_SESSION['member_id'])){
                          $article_data = get_main_board_article($_SESSION['organization_id'],"");
                          
                             /*$org_category_name = get_org_category_name_by_cat_id($row_org['organization_category_id']);*/
                              include_once("./views/org_mainboard_view.php");
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