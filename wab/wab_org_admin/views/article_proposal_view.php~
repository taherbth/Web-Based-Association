<?php

include_once("header_view.php");
 
 ?>
  <?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
		<!-- Start: body_content_entire-->
        <div class="body_content_entire">
        <h3 style="text-align:center;"> <?php echo $language['organization_mainboard_text'];?></h3>
        
                    <div class="article_div">
                    <?php if(mysql_num_rows($article_proposal)>0){
                        while($row=mysql_fetch_array($article_proposal)){
                           
                            if($row['organization_id']!=$org_id){
                                    $organization_name = get_organization_name_by_id($row['organization_id']);
                                    echo '<br/><div class="org_name">'.$organization_name.'</div>';
                                    echo "<hr /><br/>";
                            }
                            $org_id= $row['organization_id'];   
                            
                        ?>                    
                        
                        <div class="article_category"><p><?php echo get_article_category_name_by_id($row['article_category_id']);?></p></div>
                        <div class="article_title"><p><?php echo $row['article_title'];?></p></div>
                        <div class="article_heading"><label for="admin_info" class="label" style="width:4em;font-weight:bold;"><?php echo $language['article_heading_text'];?>: </label><?php echo $row['article_headings'];?></div>
                        <div class="article_heading"><label for="admin_info" class="label" style="width:4em;font-weight:bold;"><?php echo $language['article_text'];?>: </label><?php echo $row['article_text'];?></div>
                        <div class="article_footer"><?php echo $language['article_posted_by_text'].": ".$row['member_first_name']."&nbsp;".$row['member_last_name'].
                        "&nbsp;&nbsp;";?> <?php echo $language['article_expire_date_text'].": ".date("Y-m-d",$row['article_expire_date'])."&nbsp;&nbsp;";?> 
                            <?php echo $language['article_importance_text'].": ".$row['article_importance'];?>
                            <div class="article_approved_link"><a href="index.php?controller=article_proposal&proposal_approved=<?php echo $row['article_id'];?>"><button class="a" value="Approve" name="approve">Approve</button></a>
                            <a href="index.php?controller=article_proposal&proposal_denied=<?php echo $row['article_id'];?>">
                            <button class="a" value="Deny" name="deny">Deny</button></a></div>
                            
                        </div>
                        
                        <br/>
                        
                    <?php   } } else echo '<div class="no_article">'.$language['no_article_in_mainboard_text'].'</div>';?>
                    </div>
        
                </div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->


	
<?php include_once("footer_view.php"); ?>