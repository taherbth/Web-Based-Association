<?php

include_once("header_view.php");
 
 ?>
  <?php include_once("left_menu_nav_view.php"); ?>
				   </div><!-- End: body_content_left-->
		<!-- Start: body_content_entire-->
        <div class="body_content_entire">
        <h3 style="text-align:center;"> <?php echo $language['organization_mainboard_text'];?></h3>
        
                    <div class="article_div">
                    <?php if(mysql_num_rows($article_data)>0){
                        while($row=mysql_fetch_array($article_data)){
                            if($row['article_category_id']!=$article_category_id){
                                    $category_name = get_article_category_name_by_id($row['article_category_id']);
                                    echo '<br/><div class="article_category">'.$category_name.'</div>';
                                    echo "<hr /><br/>";
                            }
                            $article_category_id= $row['article_category_id'];   
                            //echo $row['article_id'];   
                        ?>                    
                        
                        <div class="article_title">
                        <?php if($can_comment){?>
                            <a href="index.php?controller=article_comment&article_id=<?php echo $row['article_id'];?>">
                        <?php } else{?> <a href="#"><?php }?>

                        <?php echo $row['article_title'];?></a></div>
                        <div class="article_heading"><?php echo $row['article_headings'];?></div>
                        <div class="article_footer"><?php echo $language['article_posted_by_text'].": ".$row['member_first_name']."&nbsp;".$row['member_last_name'].
                        "&nbsp;&nbsp;";?> <?php echo $language['article_expire_date_text'].": ".date("Y-m-d",$row['article_expire_date'])."&nbsp;&nbsp;";?> 
                        <?php echo $language['article_importance_text'].": ".$row['article_importance'];?></div>
                        <br/>
                        
                    <?php   } } else echo '<div class="no_article">'.$language['no_article_in_mainboard_text'].'</div>';?>
                    </div>
        
                </div><!-- End: body_content_entire-->

			</div><!-- End: body_content_design-->
		</div><!-- End: body_content-->


	
<?php include_once("footer_view.php"); ?>