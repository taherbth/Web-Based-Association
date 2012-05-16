<?php
     
         
//password encryption
    function encrypt($text,$salt) 
    { 
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,$salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))); 
    } 
//password decryption
    function decrypt($text,$salt) 
    { 
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))); 
    } 
    

//Member_Login Form validation 
function member_login_form_validation($data){
       $error=array();
       if(empty($data['user_name'])){
			$error['user_name_error']= "User name can not be empty!!";
		}
		if(empty($data['password'])){
			$error['user_password_error']= "Password can not be empty!!";
		}
        return $error;
}

//Member_Registration Form validation 
    function member_registration_form_validation($data,$lang_file){
        include($lang_file);
        $error=array();
      		
		if(empty($data['member_first_name'])){
			$error['member_first_name_error']= $language['member_first_name_error_text'];
		}
		if(empty($data['member_last_name'])){
			$error['member_last_name_error']= $language['member_last_name_error_text'];
		}
		
		if(empty($data['member_email'])){
			$error['member_email_error']= $language['member_email_error_text'];
		}
        if(empty($data['member_user_name'])){
			 $error['organization_admin_user_error']= $language['organization_admin_user_error_text'];
		}
        if(empty($data['member_pnr'])){
			$error['member_pnr_error']=  $language['member_pnr_error_text'];
		}  
                   
        if(empty($data['member_address'])){
			$error['member_address_error']= $language['member_address_error_text'];
		}        
		if($data['member_email']){
            if (!preg_match("/^([a-zA-Z0-9])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/", $data['member_email']))
            
				$error['member_email_error']=$language['member_invalid_email_error_text'];
		}
        
        return $error;
    }
    
//Article Post form validation
function article_post_form_validation($data,$lang_file){
        include($lang_file);
        $error=array();
      		
		if(empty($data['article_title'])){
			$error['article_title_error']= $language['article_title_error_text'];
		}
		if(empty($data['article_headings'])){
			$error['article_headings_error']= $language['article_headings_error_text'];
		}
		if(empty($data['article_text'])){
			$error['article_text_error']=$language['article_text_error_text'];
		}
		if(empty($data['article_category_id'])){
			$error['article_category_error']= $language['article_category_error_text'];
		}
        if(empty($data['article_importance'])){
			$error['article_importance_error']= $language['article_importance_error_text'];
		}
        if(empty($data['article_add_date'])){
			$error['article_add_date_error']=  $language['article_add_date_error_text'];
		}  
        if(empty($data['article_expire_date'])){
			$error['article_expire_date_error']=  $language['article_expire_date_error_text'];
		}               
        return $error;
    }


//Article posting notification email...

function send_article_posting_email($lang_file,$data,$member_data){
    include($lang_file);
    $success=FALSE;
    $emailfrom ="admin@logic-coder.com";   
    $subject=$language['article_posted_email_subject_text']." | ".$language['site_heading_text']."\n\n";
    
    $message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$language['site_heading_text'].".</span></td></tr></table>"."\n\n";
	$message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
	$message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>".$language['article_posted_email_subject_text']." | ".$language['site_heading_text'].".</b></td></tr></table>"."\n";
	
   // $data['last_inserted_article_id']
    if($data['article_posting_notification']=="only_notification"){
        $message2="<p>".$language['new_article_posted_text']." (".$data['organization_name'] .")'s ".$language['new_article_posted_main_board_with_text']." : </p>"."\n";
        $message2 .="<p style='font-weight:bold;font-size:14px;'>".$language['article_title_text'].": <a style='font-weight:bold;font-size:14px;' href='".$data['BASE_URL']."/index.php?controller=article_comment&article_id=".$data['last_inserted_article_id']."'>".$data['article_title'] ."</a></p>"."\n";
        $message2 .="<p>".$language['article_can_see_message_text']."</p>"."\n";
        
        $message3="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$language['site_heading_text'].".</span></td></tr></table>"."\n\n";
	    $message3 .= "</body></html>\n";
        
        $header  = "From: ".$language['site_heading_text']."<".$emailfrom.">\r\n";
        $header .= "Reply-To:".$emailfrom."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
        $header .= "This is a multi-part message in MIME format.\r\n";
        $header .= "--".$uid."\r\n";
        $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
        $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        
    }
    elseif($data['article_posting_notification']=="whole_article"){
        $message2="<p>".$language['new_article_posted_text']." (".$data['organization_name'] .")'s ".$language['new_article_posted_main_board_with_text']." : </p>"."\n";
        $message2 .="<p style='font-weight:bold;font-size:14px;'>".$language['article_category_text'].": ".$data['article_category_name']."</p>"."\n\n";        
        $message2 .="<p style='font-weight:bold;font-size:14px;'>".$language['article_title_text'].": <a style='font-weight:bold;font-size:14px;' href='".$data['BASE_URL']."/index.php?controller=article_comment&article_id=".$data['last_inserted_article_id']."'>".$data['article_title'] ."</a></p>"."\n\n";
        $message2 .="<p style='font-weight:bold;font-size:14px;'>".$language['article_heading_text'].": ".$data['article_headings'] ."</p>"."\n\n";
        $message2 .="<p style='font-weight:bold;font-size:14px;'>".$language['article_text'].": ".$data['article_text'] ."</p>"."\n\n";
        $message2 .="<p>".$language['article_can_see_message_text']."</p>"."\n";
        
        $message3="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$language['site_heading_text'].".</span></td></tr></table>"."\n\n";
	    $message3 .= "</body></html>\n";
        
        $header  = "From: ".$language['site_heading_text']."<".$emailfrom.">\r\n";
        $header .= "Reply-To:".$emailfrom."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
        $header .= "This is a multi-part message in MIME format.\r\n";
        $header .= "--".$uid."\r\n";
        $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
        $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        
    }
        
    if(mysql_num_rows($member_data)>0){
        while($row= mysql_fetch_array($member_data)){
           
            $message4=$message."<p>".$language['email_dear_text']." ".$row['member_first_name'].",</p>"."\n";
            $message4 .= $message2;
            $message4 .= $message3;            
            $header2= $header.$message4."\r\n\r\n";
            $header2 .= "--".$uid."\r\n";
            $header2 .= "Content-Transfer-Encoding: base64\r\n";
            //echo $message4;
            $message4="";
            $header2="";
            if(mail($member_data['member_email'], $subject,"",$header2)){
                $success=TRUE;
            }            
        }    
        
    }
    $data=array();
    $data['success']=$success;
    return $data;    
   
	/*if(mail($data['member_email'], $subject,"",$header))
	 {   
          $data=array();
     	  $data['msg2']="Your registration successful !! A confirmation email sent to your email with your login information.";
	 }
	else
	{
		 $data['msg2']="";
	}*/
    
    
}

?>