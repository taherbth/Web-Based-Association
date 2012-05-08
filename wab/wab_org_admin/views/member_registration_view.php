<?php

include_once("header_view.php");
 
 ?>
 <?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
				<!-- Start: body_content_entire-->
				<div class="body_content_entire_module_add">
                    <div class='module_add_msg'></div>		
                    <div class="registration_form">
                    <h3 style="text-align:center;"> <?php echo $language['member_registration_text'];?></h3>
                    <div class="success_message"><?php if(isset($data['msg2'])){echo $data['msg2'];}?></div>
                        <form name="registration" id="registration" method="post" action="" enctype="multipart/form-data">
                            
                            <div class="member_info">
                                
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_first_name_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_first_name" id="member_first_name" value="<?php echo $data['member_first_name'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_first_name_error'])){echo $error_response['member_first_name_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_last_name_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_last_name" id="member_last_name" value="<?php echo $data['member_last_name'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_last_name_error'])){echo $error_response['member_last_name_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['member_ship_expire_date_text'];?>: </label></div>
                                    <div class="input_field_div"><input class="login-inpuiitem" type="text" name="membership_expire_date" id="membership_expire_date" value="<?php echo date('Y-m-d');?>" onclick="ds_sh(this)"
                                    readonly="readonly"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['membership_expire_date_error'])){echo $error_response['membership_expire_date_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_email_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_email" id="member_email" value="<?php echo $data['member_email'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_email_error'])){echo $error_response['member_email_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_username_name_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_user_name" id="member_user_name" value="<?php echo $data['member_user_name'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['organization_admin_user_error'])){echo $error_response['organization_admin_user_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_pno_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_pnr" id="member_pnr" value="<?php echo $data['member_pnr'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_pnr_error'])){echo $error_response['member_pnr_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['member_type_text'];?>: </label></div>
                                    <div class="input_field_div">
                                        <select name="member_type_id" style="width:207px;">
                                            <option value="">Select Member Type</option>
                                            <?php  if(mysql_num_rows($member_type)>=1){ 
                                                    while ($row = mysql_fetch_assoc($member_type)) {
                                                                     
                                                    ?>
                                            <option value="<?php echo $row['member_type_id'];?>" <?php if($data['member_type_id']==$row['member_type_id']) {?> selected='selected' <?php }?>><?php echo $row['member_type_name'];?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="error_msg"><?php if(isset($error_response['member_type_error'])){echo $error_response['member_type_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_address_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_address" id="member_address" value="<?php echo $data['member_address'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_address_error'])){echo $error_response['member_address_error'];}?></div>
                                    <div class="submit" style="margin-left:165px;padding-bottom:20px;"> <input type="submit" name="register" value="<?php echo $language['register_btn_text'];?>"/> </div>

                            </div>
                            </div>
                        </form>
                    </div>
					
                    </div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->

<?php include_once("footer_view.php"); ?>
