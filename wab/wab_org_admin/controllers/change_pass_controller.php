<?php

     if(isset($_POST['change_pass'])){
         
        if(isset($_SESSION['organization_id']) && !empty($_SESSION['organization_id'])){
                $data['organization_id'] = $_SESSION['organization_id'];                
                $data['user_name'] = $_SESSION['user_name'];
        }
               
         
         $data['old_pass']         = $_POST['old_pass'];
         $data['new_pass']       = $_POST['new_pass'];
         $data['confirm_pass'] = $_POST['confirm_pass'];
         
         $error_response = change_pass_form_validation($data,$lang_file);
         
          if(sizeof($error_response)<=0){              
               $admin_info = get_admin_member_info($data['user_name'],$data['organization_id']);
               if(mysql_num_rows($admin_info)>0){
                   $row = mysql_fetch_array($admin_info);
                   $admin_pass = $row['organization_admin_password'];
                }
                
              $data['old_pass'] = encrypt($data['old_pass'],'whateveryouwant');      
               
              if($data['new_pass'] !=$data['confirm_pass'] ){$data['msg2'] ="Password dose not match !! <br>";}
			  if($data['old_pass']!=$admin_pass ){$data['msg2'] .="Old password dose not match !! <br>";}
              
              //////////
                if($data['msg2']==''){
                    
                    $data['new_pass'] = encrypt($data['new_pass'],'whateveryouwant');      
                    $success = update_admin_password($data);
                    if($success){
                        //unset($_SESSION['organization_id']);
                        //unset($_SESSION['member_id']);
                        $data['msg']="Password change successfull!!!<br/>";
                    }
                    
                }
              /////////
              
         }
       
   }
              
  include_once("./views/change_pass_view.php");
                        
?>