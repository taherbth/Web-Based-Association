<?php

     if(isset($_POST['change_pass'])){
         
        if(isset($_SESSION['organization_id']) && !empty($_SESSION['organization_id'])){
                $data['organization_id'] = $_SESSION['organization_id'];
                $data['member_id'] = $_SESSION['member_id'];
        }
               
         
         $data['old_pass']         = $_POST['old_pass'];
         $data['new_pass']       = $_POST['new_pass'];
         $data['confirm_pass'] = $_POST['confirm_pass'];
         
         $error_response = change_pass_form_validation($data,$lang_file);
         
          if(sizeof($error_response)<=0){              
               $member_info = get_member_info($data['member_id'],$data['organization_id']);
               if(mysql_num_rows($member_info)>0){
                   $row = mysql_fetch_array($member_info);
                   $member_pass = $row['member_login_password'];
                }
                
                $data['old_pass'] = encrypt($data['old_pass'],'whateveryouwant');      
               
              if($data['new_pass'] !=$data['confirm_pass'] ){$data['msg2'] ="Password dose not match !! <br>";}
			  if($data['old_pass']!=$member_pass ){$data['msg2'] .="Old password dose not match !! <br>";}
              
              //////////
                if($data['msg2']==''){
                    
                    $data['new_pass'] = encrypt($data['new_pass'],'whateveryouwant');      
                    $success = update_member_password($data);
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