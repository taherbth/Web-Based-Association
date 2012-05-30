<?php
    include_once("header_view.php"); 
 ?>
 <?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
				<!-- Start: body_content_entire-->
				<div class="body_content_entire_module_add">
                    <div class='module_add_msg'></div>		
                    <div class="registration_form">
                    <h3 style="text-align:center;"> <?php //echo $language['member_registration_text'];?></h3>
                    <div class="success_message" style="color:red;"><?php if(isset($data['msg2'])){echo $data['msg2'];}?></div>
                    <div class="success_message"><?php if(isset($data['msg'])){echo $data['msg']; }?></div>
                        <form name="registration" id="registration" method="post" action="" enctype="multipart/form-data">
                            
                            <div class="member_info">
                                
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['old_pass_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="old_pass" id="old_pass" value=""/></div>
                                    <div class="error_msg"><?php if(isset($error_response['old_pass_error'])){echo $error_response['old_pass_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['new_pass_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="new_pass" id="new_pass" value=""/></div>
                                    <div class="error_msg"><?php if(isset($error_response['new_pass_error'])){echo $error_response['new_pass_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['confirm_pass_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="confirm_pass" id="confirm_pass" value=""/></div>
                                    <div class="error_msg"><?php if(isset($error_response['confirm_pass_error'])){echo $error_response['confirm_pass_error'];}?></div>
                                    <div class="submit" style="margin-left:152px;padding-bottom:20px;"> <input type="submit" name="change_pass" value="<?php echo $language['change_pass_text'];?>"/></div>
                                                                       
                            </div>
                            </div>
                        </form>
                    </div>
					
                    </div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->

<?php include_once("footer_view.php"); ?>
