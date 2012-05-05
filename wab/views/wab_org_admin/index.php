<?php $this->load->view('siteadmin/header');
	 $MODULE_NAME 	  = array(
              'name'      => 'MODULE_NAME',
              'id'        => 'MODULE_NAME',
              'class'     => 'login-inpuiitem'              
         );	 
			
	 $submit = array(
	       'name'    => 'submit',
	       'id'      => 'submit',
	       'value'   => 'Save',
	       'type'    => 'submit',
	       'class'   => 'submit-btn'
	  );
	  
	  $labelattributes=array('class'=>'label');
 ?>
<body>
	<!-- Start: pagediv is for whole page-->
	<div class="pagediv">
		<!-- Start: headerdiv is for header section-->
		<div class="headerdiv">
			<!-- Start: logo_header is for header logo-->
			<div class="logo_header">
				<!-- Start: logo is for header logo-->
				<div class="logo">
					<p id="logo_text"><?php echo anchor(base_url(),'Foreningstavlan.se'); ?></p>
				</div><!-- End: logo is for header logo-->
			</div><!-- End: logo_header is for header logo-->
			<!-- Start: login_form is for user login-->
			
		</div><!-- End: headerdiv is for header section-->

		<!-- Start: body_content-->
		<div class="body_content">
			<!-- Start: body_content_design-->
			<div class="body_content_design">
				<!-- Start: body_content_left-->
				<div class="body_content_left_module_add">
						<?php $this->load->view('siteadmin/left_menu_nav'); ?>
				</div><!-- End: body_content_left-->
				
				<!-- Start: body_content_entire-->
				<div class="body_content_entire_module_add">
                <?php
                    echo "<div class='module_add_msg'>".$this->session->flashdata('module_add_message')."</div>";				
                ?>
					<table width="710" border="0" cellspacing="0" cellpadding="0" class="salesdata">
					 <?php
			   			echo form_open('siteadmin/home/moduleadd_process')."\n"; 
             				 ?>
						<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
              
						      <tbody>
							      <tr>
								  <td valign="top" width=100><?=form_label('Module Name * :','MODULE_NAME',$labelattributes);?></td>
								  <td valign="top"><?=form_input($MODULE_NAME);?></td>
							       </tr>
								<tr><td colspan="2">&nbsp;</td></tr>         
								<tr>
								  <td></td>
								  <td><?=form_submit($submit);?>   
								  </td>
								</tr>                
						      </tbody>            
					    </table>
					<?php echo form_close(); ?>
				       </table>
				</div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->

<?php $this->load->view('siteadmin/footer'); ?>
