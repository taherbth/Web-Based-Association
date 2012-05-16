<?php
  
    $count=0;
    if(mysql_num_rows($member_type_authority_one)>0){
        
            while($row_one = mysql_fetch_array($member_type_authority_one)){
                if($row_one['module_function_html_id']=="access_org_presentation_page"){
                    if(isset($_SESSION['member_id']) && !empty($_SESSION['member_id'])){
                          $org_data = get_organization_data_by_member_id($_SESSION['member_id']);
                          if(mysql_num_rows($org_data)>0){
                              $row_org = mysql_fetch_array($org_data);
                              $org_category_name = get_org_category_name_by_cat_id($row_org['organization_category_id']);
                              include_once("./views/org_presentation_view.php");
                              exit;
                          }
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
   // include_once("./views/org_presentation_view.php");
?>