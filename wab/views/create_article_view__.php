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
                                
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['article_title_text'];?>: </label></div>
                                    <div class="input_field_div"><input type="text" name="article_title" id="article_title" value="<?php echo $data['article_title'];?>"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['article_title_error'])){echo $error_response['article_title_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['article_heading_text'];?>: </label></div>
                                    <div class="input_field_div"><textarea id="article_headings" name="article_headings" rows="15" cols="80" style="width: 500px; height:250px;"><?php echo $data['article_headings'];?></textarea>
                                     </div>
                                    <div class="error_msg"><?php if(isset($error_response['article_headings_error'])){echo $error_response['article_headings_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['article_category_text'];?>: </label></div>
                                    <div class="input_field_div">
                                        <select name="article_category_id" style="width:207px;">
                                            <option value=""><?php echo $language['article_category_select_text'];?></option>
                                            <?php  if(mysql_num_rows($article_category)>=1){ 
                                                    while ($row = mysql_fetch_assoc($article_category)) {
                                                                     
                                                    ?>
                                            <option value="<?php echo $row['article_category_id'];?>" <?php if($data['article_category_id']==$row['article_category_id']) {?> selected='selected' <?php }?>><?php echo $row['article_category_name'];?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="error_msg"><?php if(isset($error_response['article_category_error'])){echo $error_response['article_category_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['article_importance_text'];?>: </label></div>
                                    <div class="input_field_div">
                                        <select name="article_importance" style="width:207px;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="error_msg"><?php if(isset($error_response['article_importance_error'])){echo $error_response['article_importance_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['article_add_date_text'];?>: </label></div>
                                    <div class="input_field_div"><input class="login-inpuiitem" type="text" name="article_add_date" id="article_add_date" value="<?php echo date('Y-m-d');?>" onclick="ds_sh(this)"
                                    readonly="readonly"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['article_add_date_error'])){echo $error_response['article_add_date_error'];}?></div>
                                    
                                    <div class="label_div"><label for="admin_info" class="label"><?php echo $language['article_expire_date_text'];?>: </label></div>
                                    <div class="input_field_div"><input class="login-inpuiitem" type="text" name="article_expire_date" id="article_expire_date" value="<?php echo date('Y-m-d');?>" onclick="ds_sh(this)"
                                    readonly="readonly"/></div>
                                    <div class="error_msg"><?php if(isset($error_response['article_expire_date_error'])){echo $error_response['article_expire_date_error'];}?></div>
                                    <div class="submit" style="margin-left:165px;padding-bottom:20px;"> <input type="submit" name="article" value="<?php echo "&nbsp;&nbsp;".$language['article_btn_text']."&nbsp;&nbsp;";?>"/> </div>

                            </div>
                            </div>
                        </form>
                    </div>
					
                    </div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->

<?php include_once("footer_view.php"); ?>
