<?php

include_once("comment_header_view.php");
 
 ?>
  <?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
		<!-- Start: body_content_entire-->
        <div class="body_content_entire">
        <h3 style="text-align:center;"> <?php echo $language['organization_mainboard_text'];?></h3>
        
                    <div class="article_div">
                    <?php if(mysql_num_rows($article_data)>0){
                                $row=mysql_fetch_array($article_data);
                                $category_name = get_article_category_name_by_id($row['article_category_id']);
                                echo '<br/><div class="article_category">'.$category_name.'</div>';
                                echo "<hr /><br/>";
                        ?>                    
                        <div class="article_title"> <a href="#"><?php echo $row['article_title'];?></a></div>
                        <div class="article_heading"><?php echo $row['article_text'];?></div>
                        <div class="article_footer"><?php echo $language['article_posted_by_text'].": ".$row['member_first_name']."&nbsp;".$row['member_last_name'].
                        "&nbsp;&nbsp;";?> <?php echo $language['article_expire_date_text'].": ".date("Y-m-d",$row['article_expire_date'])."&nbsp;&nbsp;";?> 
                        <?php echo $language['article_importance_text'].": ".$row['article_importance'];?></div>
                        <br/>
                        
                            <div class="comments_article">
                                    <div class="comments_text"> <?php echo $language['comments_text']?></div>
                                    <?php if(mysql_num_rows($article_comment_data)>0){?>
                                    <div class="comments_area"> 
                                        <div class="comment">
                                        <ul class="outer_ul">
                                            <li class="outer_ul_list">
                                             <ul class="comment_list">
                                                    <?php while($row_article_comments = mysql_fetch_array($article_comment_data)){
                                                                        $member_name = get_member_name_by_member_id($row_article_comments['comment_member_id']);
                                                        ?>
                                                                        <li>
                                                                             <div class="member_comment"><img src=""/> Image<a href="#member_profile">
                                                                                    <?php echo $member_name;?></a> 
                                                                                    <?php echo $row_article_comments['comment'];?>
                                                                             </div>
                                                                        </li>
                                                            <div class="clear"></div>
                                                    <?php }?>
                                                </ul>
                                              </li>
                                              <?php }?>
                                              <li style="border:none;"><form method="post" name="comment_on_article" action="">
                                            <div class="comment_box"><textarea name="article_comment"></textarea></div>
                                            <?php if(isset($data['msg2'])){?><div class="success_message"><?php echo $data['msg2'];?></div><?php }?>
                                            <?php if(isset($error_response['article_comment_error'])){?><div class="success_message" style="color:red;"><?php echo $error_response['article_comment_error'];?></div><?php }?>
                                            <div><input type="hidden" name="article_id" value="<?php echo $row['article_id'];?>"></div>
                                            <div class="comment_btn"><input type="submit" name="comment" value="<?php echo $language['comment_post_btn_text'];?>"></div>
                                    </form></li>
                                            </ul>
                                            </div>
                                    </div> 
                                    
                            </div>
                        
                    <?php } else echo '<div class="no_article">'.$language['no_article_in_mainboard_text'].'</div>';?>
                    </div>
        
                </div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->


	
<?php include_once("footer_view.php"); ?>