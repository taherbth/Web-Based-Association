<?php

include_once("header_view.php");
 
 ?>
		<?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
<!-- Start: body_content_entire-->
				<div class="body_content_entire">
					<h1>Authority Settings: To user Type</h1><br />
					<form name="authority" method="post" action="">
                     <h1>User Type : <?php echo $member_type_name;?></h1>
                     <br/>
						<b>Access List</b><br />
                        
                        <?php  if(mysql_num_rows($module_function_access_list)>=1){
                                while ($row = mysql_fetch_assoc($module_function_access_list)) {
                                                                 
                        ?>
                        <input type="checkbox" name='module_function_access_id[]' value='<?php echo $row['module_function_access_id'];?>' <?php if($row['module_function_access']){ ?> checked <?php }?>/> <?php echo $row['module_function_name'];?><br />							
					    <?php } } ?>	
                        <input type="hidden" name="member_type" value="<?php echo $member_type_id;?>" />
                        <input name="save_changes" type="submit" value="Save Changes" id="submit-btn" class="button" />
					</form>
					
					  
				 	<br class="clear" />  
				</div> <!-- End: body_content_entire-->

		
<?php include_once("footer_view.php"); ?>