<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORG ADMIN</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="loginbox">
		<div id="login-box-top"></div>
		<div id="login-box-body">
			<div id="error">
				<?php
					/*if($msg)
					{					  	
						echo "<div class='login_error_msg'>$msg</div>";						
					}
					if($msg && $msg2=="")
					{
						echo "<div class='login_regular_msg'>$msg</div>";
						$_REQUEST['msg'] = NULL;													
					}*/
				?> 
			</div>
		  	<h1>Login to Admin Panel</h1>
			<div class="userbox">
            <?php
            if(sizeof($error_response)<=0){
                if(isset($_SESSION['user_name']) && empty($_SESSION['user_name'])){ ?> <div style="color:red; margin:10px 0px 0px 112px;clear:both"><?php echo "Bad username or password!!";}
            }?></div>
                <form name="login" id="login" method="post" action="" enctype="multipart/form-data">

				<div class="itembox">
					<label for="name" class="login-uname">User Name:</label>
					<label><input name="username" type="text" id="name" class="login-inpuiitem" value=""/></label>
                </div><div style="color:red; margin-left:112px;clear:both"><?php if(isset($error_response['user_name_error'])){echo $error_response['user_name_error'];}?></div>
                    <br />
				<div class="itembox">
					<label for="pword" class="login-uname">Password:</label>
					<label><input name="password" type="password" id="pword" class="login-inpuiitem" value=""/></label>
                </div>
                <div style="color:red; margin-left:112px;clear:both"><?php if(isset($error_response['user_password_error'])){echo $error_response['user_password_error'];}?></div>       
<br />
				<div class="itembox top10">
					<label for="sumbit"><input name="login" type="submit" value="Login" id="login" class="submit-btn" /> Or   <a href="index.php?controller=registration" style="font-size:15px; font-weight:bold;">Registration</a></label>
				</div><br />
				</form>
                  	<div class="itembox forgate-box top10"><a href="forgot_pass.php">Forgot your password?</a>  </div>
					<div class="itembox forgate-box"></div>
				<div class="clear">&nbsp;</div>

			</div>
		</div>
		<div id="login-box-bottom"><a href="#" target="_blank">Powered by Logic-coder.<br/></a></div><!--copywright-->
	</div>

</body>
</html>
