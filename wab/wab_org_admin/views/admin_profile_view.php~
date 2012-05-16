<?php

include_once("header_view.php");
 if(mysql_num_rows($organization_data)>0){
       $data = mysql_fetch_array($organization_data);
}
 ?>
 <?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
				<!-- Start: body_content_entire-->
				<div class="body_content_entire_module_add">
                    <div class='module_add_msg'></div>		
                    <div class="registration_form">
                    <h3 style="text-align:center;margin-bottom:10px;" > <?php echo $language['organization_profile_text'];?></h3>
                             <div class="org_info" style="width:375px;">
                                <fieldset>
                                    <legend><?php echo $language['organization_info_text'];?></legend>
                                    <div class="label_div"><label for="Org_info" class="label"><?php echo $language['org_no_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['organization_number'];?></div>
                                    <div class="error_msg"></div>
					
                                    <div class="label_div"><label for="Org_info" class="label"><?php echo $language['org_name_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['organization_name'];?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="Org_info" class="label"><?php echo $language['org_category_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo get_org_category_name_by_cat_id($data['organization_category_id']);?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="Org_info" class="label"><?php echo $language['org_primary_address_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['primary_address'];?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="Org_info" class="label"><?php echo $language['org_optional_address_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['optional_address'];?></div>
                                    <div class="error_msg"></div>

                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['org_phone_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['organization_phone'];?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['org_fax_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['organization_fax'];?></div>
                                    <div class="error_msg"></div>                                    
                                </fieldset>
                            </div>
                            <div class="admin_user_info" style="width:400px;">
                                <fieldset>
                                    <legend><?php echo $language['admin_user_info_text'];?></legend>
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['member_title_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['member_title'];?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_first_name_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['member_first_name'];?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_last_name_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['member_last_name'];?></div>
                                    <div class="error_msg"></div>
                                                                        
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_mobile_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['member_cell_phone'];?></div>
                                    <div class="error_msg"></div>
                                                                
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_phone_text'];?>: </label></div>
                                    <div class="input_field_div"><?php if($data['member_home_phone']){echo $data['member_home_phone'];}else echo "N/A";?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_email_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['member_email'];?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_username_name_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['organization_admin_user'];?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_user_type_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['user_type'];?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_pno_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['member_pnr'];?></div>
                                    <div class="error_msg"></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_address_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $data['member_address'];?></div>
                                    <div class="error_msg"></div>
                                                                       
                                    
                                </fieldset>
                            </div>
                            </div>
                            <div class="submit_btn" style="margin-left:533px;"> <a href="index.php?controller=admin_profile&update_id=<?php echo $data['organization_id'];?>"> <button class="edit_profile" value="Edit" name="edit">Edit</button></a> </div>
                           
                    </div>
					
                    </div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->

<?php include_once("footer_view.php"); ?>
