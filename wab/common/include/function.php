<?php
    //Org_Registration Form validation 
    function org_registration_form_validation($data,$lang_file){
        include($lang_file);
        $error=array();
       if(empty($data['organization_number'])){
			$error['organization_number_error']= $language['organization_number_error_text'];
		}
		if(empty($data['organization_name'])){
			$error['organization_name_error']= $language['organization_name_error_text'];
		}
		if(empty($data['primary_address'])){
			$error['primary_address_error']= $language['primary_address_error_text'];
		}
		if(empty($data['organization_phone'])){
			$error['organization_phone_error']= $language['organization_phone_error_text'];
		}
		if(empty($data['member_first_name'])){
			$error['member_first_name_error']= $language['member_first_name_error_text'];
		}
		if(empty($data['member_last_name'])){
			$error['member_last_name_error']= $language['member_last_name_error_text'];
		}
		if(empty($data['member_cell_phone'])){
			$error['member_cell_phone_error']=$language['member_cell_phone_error_text'];
		}
		if(empty($data['member_email'])){
			$error['member_email_error']= $language['member_email_error_text'];
		}
        if(empty($data['organization_admin_user'])){
			$error['organization_admin_user_error']= $language['organization_admin_user_error_text'];
		}
        if(empty($data['member_pnr'])){
			$error['member_pnr_error']=  $language['member_pnr_error_text'];
		}
        if(empty($data['member_address'])){
			$error['member_address_error']= $language['member_address_error_text'];
		}
        
		if($data['member_email']){
            if (!preg_match("/^([a-zA-Z0-9_.])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/", $data['member_email']))
            
				$error['member_email_error']=$language['member_invalid_email_error_text'];
		}
        
        return $error;
    }
    
         
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
    

//Org Registration confirmation email...

function send_org_registration_confirmation_email($data){
    
    $emailfrom ="admin@logic-coder.com";
   
    $subject="Registration Confirmation | Web Association Board"."\n\n";
	
	$message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>Web Association Board.</span></td></tr></table>"."\n\n";
	$message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
	$message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>Registration Confirmation | Web Association Board.</b></td></tr></table>"."\n";
	
	$message .="<p>Dear ".$data['member_first_name'].",</p>"."\n";
    $message .="<p>Congratulations!! Your Organization is successfully registered in our system.</p>"."\n";
	
    $message .= "<p>Your Organization details :"."</p>\n";
    $message .="<p><b>Organization No :  </b>".$data['organization_number']."</p>\n";
	$message .="<p><b>Organization Name :  </b>".$data['organization_name']."</p>\n";
	$message .="<p><b>Admin User :  </b>".$data['organization_admin_user']."</p>\n";
	$message .="<p><b>Password : </b>".$data['login_password']."</p>\n";
    
	$message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>Web Association Board.</span></td></tr></table>"."\n\n";
	$message .= "</body></html>\n";
	
	
    $header  = "From: Web Association Board <".$emailfrom.">\r\n";
    $header .= "Reply-To:".$emailfrom."\r\n";
    
    $uid = md5(uniqid(time()));
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Transfer-Encoding: base64\r\n";
  
    //echo $message;
    //echo $data['member_email'];
    
	if(mail($data['member_email'], $subject,"",$header))
	 {   
          $data=array();
     	  $data['msg2']="Your registration successful !! A confirmation email sent to your email with your login information.";
	 }
	else
	{
		 $data['msg2']="";
	}
    
    return $data;    
}

//Member Registration confirmation email...

function send_member_registration_confirmation_email($data){
    
    $emailfrom ="admin@logic-coder.com";
   
    $subject="Registration Confirmation | Web Association Board"."\n\n";
	
	$message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>Web Association Board.</span></td></tr></table>"."\n\n";
	$message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
	$message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>Registration Confirmation | Web Association Board.</b></td></tr></table>"."\n";
	
	$message .="<p>Dear ".$data['member_first_name'].",</p>"."\n";
    $message .="<p>Congratulations!! You are successfully registered with the Organization (".$data['org_name'] .")</p>"."\n";
	
    $message .= "<p>Your login details :"."</p>\n";
    $message .="<p><b>User :  </b>".$data['member_user_name']."</p>\n";
	$message .="<p><b>Password : </b>".$data['login_password']."</p>\n";
    
	$message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>Web Association Board.</span></td></tr></table>"."\n\n";
	$message .= "</body></html>\n";
	
    $uid = md5(uniqid(time()));
    $header  = "From: Web Association Board <".$emailfrom.">\r\n";
    $header .= "Reply-To:".$emailfrom."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Transfer-Encoding: base64\r\n";
  
    //echo $message;
    //echo $data['member_email'];
	if(mail($data['member_email'], $subject,"",$header))
	 {   
          $data=array();
     	  $data['msg2']="Member registration successful !! A confirmation email sent to member email with his/her login information.";
	 }
	else
	{
		 $data['msg2']="";
	}
    
    return $data;    
}


//Change pass Form validation 
function change_pass_form_validation($data){
       $error=array();
       if(empty($data['old_pass'])){
			$error['old_pass_error']= "Old password can not be empty!!";
		}
        
        if(empty($data['new_pass'])){
			$error['new_pass_error']= "New password can not be empty!!";
		}
        
		if(empty($data['confirm_pass'])){
			$error['confirm_pass_error']= "Confirm password can not be empty!!";
		}
        return $error;
}

//Org_Login Form validation 
function org_login_form_validation($data){
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
		if(empty($data['membership_expire_date'])){
			$error['membership_expire_date_error']=$language['membership_expire_date_error_text'];
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
        if(empty($data['member_type_id'])){
			$error['member_type_error']=  $language['member_type_error_text'];
		}               
        if(empty($data['member_address'])){
			$error['member_address_error']= $language['member_address_error_text'];
		}        
		if($data['member_email']){
            if (!preg_match("/^([a-zA-Z0-9_.])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/", $data['member_email']))
            
				$error['member_email_error']=$language['member_invalid_email_error_text'];
		}
        
        return $error;
    }

?>