<?php

include_once("header_view.php");
 
 ?>
  <?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
		<!-- Start: body_content_entire-->
        <h3 style="text-align:center;"> <?php echo $language['organization_info_text'];?></h3>
				<div class="member_info">
                                
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['org_no_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $row_org['organization_number'];?></div><br/>
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['org_name_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $row_org['organization_name'];?></div><br/>
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['org_category_text'];?>: </label></div>
                                    <div class="input_field_div"><?php if($org_category_name)echo $org_category_name;?></div><br/>
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['org_profile_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $row_org['organization_profile_text'];?></div><br/>  
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['admin_user_address_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $row_org['primary_address'];?></div><br/>
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['org_phone_text'];?>: </label></div>
                                    <div class="input_field_div"><?php echo $row_org['organization_phone'];?></div><br/>

                            </div>
                            </div>
                </div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->


	
<?php include_once("footer_view.php"); ?>