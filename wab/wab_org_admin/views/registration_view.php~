<?php

include_once("header_view.php");
 
 ?>
				   </div><!-- End: body_content_left-->
				<!-- Start: body_content_entire-->
				<div class="body_content_entire_module_add">
                    <div class='module_add_msg'></div>		
                    <div class="registration_form">
                    <h3 style="margin-left:50px;"> <?php echo $language['registration_text'];?></h3>
                    <div class="success_message"><?php if(isset($data['msg2'])){echo $data['msg2'];}?></div>
                        <form name="registration" id="registration" method="post" action="" enctype="multipart/form-data">
                            <div class="org_info">
                                <fieldset>
                                    <legend><?php echo $language['organization_info_text'];?></legend>
                                    <div class="label_div"><label for="Org_info" class="label"><?php echo $language['org_no_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="organization_number" id="organization_number" value="<?php echo $data['organization_number'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['organization_number_error'])){echo $error_response['organization_number_error'];}?></div>
					
                                    <div class="label_div"><label for="Org_info" class="label"><?php echo $language['org_name_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="organization_name" id="organization_name" value="<?php echo $data['organization_name'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['organization_name_error'])){echo $error_response['organization_name_error'];}?></div>
                                    
                                    <div class="label_div"><label for="Org_info" class="label"><?php echo $language['org_primary_address_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="primary_address" id="primary_address" value="<?php echo $data['primary_address'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['primary_address_error'])){echo $error_response['primary_address_error'];}?></div>
                                    
                                    <div class="label_div"><label for="Org_info" class="label"><?php echo $language['org_optional_address_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="optional_address" id="optional_address" value="<?php echo $data['optional_address'];?>"/></div>
                                    <div class="error_msg"></div>

                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['org_phone_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="organization_phone" id="organization_phone" value="<?php echo $data['organization_phone'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['organization_phone_error'])){echo $error_response['organization_phone_error'];}?></div>
                                </fieldset>
                            </div>
                            <div class="admin_user_info">
                                <fieldset>
                                    <legend><?php echo $language['admin_user_info_text'];?></legend>
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_first_name_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_first_name" id="member_first_name" value="<?php echo $data['member_first_name'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_first_name_error'])){echo $error_response['member_first_name_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_last_name_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_last_name" id="member_last_name" value="<?php echo $data['member_last_name'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_last_name_error'])){echo $error_response['member_last_name_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_mobile_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_cell_phone" id="member_cell_phone" value="<?php echo $data['member_cell_phone'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_cell_phone_error'])){echo $error_response['member_cell_phone_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_email_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_email" id="member_email" value="<?php echo $data['member_email'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_email_error'])){echo $error_response['member_email_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_username_name_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="organization_admin_user" id="organization_admin_user" value="<?php echo $data['organization_admin_user'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['organization_admin_user_error'])){echo $error_response['organization_admin_user_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_pno_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_pnr" id="member_pnr" value="<?php echo $data['member_pnr'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_pnr_error'])){echo $error_response['member_pnr_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_address_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="member_address" id="member_address" value="<?php echo $data['member_address'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['member_address_error'])){echo $error_response['member_address_error'];}?></div>
                                </fieldset>
                            </div>
                            </div>
                            <div class="submit_btn"> <input type="submit" name="register" value="<?php echo $language['register_btn_text'];?>"/> Or <a href="index.php" style="font-size:15px; font-weight:bold;">Login</a></div>
                        </form>
                    </div>
					
                    </div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->

<?php include_once("footer_view.php"); ?>
