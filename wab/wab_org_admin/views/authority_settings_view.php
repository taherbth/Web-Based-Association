<?php

include_once("header_view.php");
 
 ?>
  <?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
		<!-- Start: body_content_entire-->
				<div class="body_content_entire">
				</div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->

<!-- Start: body_content_entire-->
				<div class="body_content_entire">
					<h1>Authority Settings: To member Type</h1><br />
                    <h4>[Please select a member type from dropdown menu and click NEXT]</h4><br />
					<form name="authority" method="post" action="">
                     Member Type : 
                     
                     <select name="member_type">
                            <option value="">Select Member Type</option>
                            
                            <?php  if(mysql_num_rows($member_type)>=1){
                                while ($row = mysql_fetch_assoc($member_type)) {
                                                                 
                            ?>
                                <option value="<?php echo $row['member_type_id'];?>"><?php echo $row['member_type_name'];?></option>
                            	<?php } } ?>					
                    </select><br />
						
                        <input name="next" type="submit" value="Next>>" id="submit-btn" class="button" style="margin-left:92px;"/>
					</form>
					
					  
				 	<br class="clear" />  
				</div> <!-- End: body_content_entire-->

		
<?php include_once("footer_view.php"); ?>