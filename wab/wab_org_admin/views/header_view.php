<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Web Association Board</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!-- Start: pagediv is for whole page-->
	<div class="pagediv">
		<!-- Start: headerdiv is for header section-->
		<div class="headerdiv">
			<!-- Start: logo_header is for header logo-->
			<div class="logo_header">
				<!-- Start: logo is for header logo-->
				<div class="logo">
					<p id="logo_text"><?php echo $language['logo_text'];?></p>
				</div><!-- End: logo is for header logo-->
			</div><!-- End: logo_header is for header logo-->
			<!-- Start: login_form is for user login-->
            <!-- Start: languagebg-->
			<div class="languagebg">
					<form name="langselect" id="langselect" method="post">                        
						<select name="site_language" onChange="document.langselect.submit()" class="selang"> 
							<option value="sw" <?php if((isset($_SESSION['site_language']) && $_SESSION['site_language']=="sw")){?> selected="selected" <?php }?>>Swedish</option> 
							<option value="eng" <?php if(isset($_SESSION['site_language']) && $_SESSION['site_language']=="eng"){?> selected="selected" <?php }?>>English</option> 
						</select>
					</form>
          </div> <!-- End: languagebg-->
                
		</div><!-- End: headerdiv is for header section-->


