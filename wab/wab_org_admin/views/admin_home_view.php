<?php

include_once("header_view.php");
 
 ?>
		<!-- Start: body_content-->
		<div class="body_content">
			<!-- Start: body_content_design-->
			<div class="body_content_design">
				<!-- Start: body_content_left-->
				<div class="body_content_left">
					<span style="font-size:14px; margin-bottom:30px; color:#4f5155; font-weight:bold;">
				    <?php
						if(isset($_SESSION['user_name'])){
							echo "LogedIn as Admin"."&nbsp;&nbsp;".date("Y-m-d");
						}
					?>
					</span>
					<?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
				
				<!-- Start: body_content_entire-->
				<div class="body_content_entire">
				</div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->


	
<?php include_once("footer_view.php"); ?>