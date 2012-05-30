<ul>        
        <li><a href="index.php?controller=admin_home"><?php echo $language['admin_menu_home'];?></a></li>
        <li><a href="index.php?controller=admin_profile"><?php echo $language['admin_menu_profile'];?></a></li>
        <li><a href="index.php?controller=authority_settings"><?php echo $language['admin_menu_authority_settings'];?></a></li>
        <li><a href="index.php?controller=member_registration"><?php echo $language['admin_menu_member_registration'];?></a></li>
        <li><a href="index.php?controller=article_proposal">
        <?php echo $language['admin_menu_article_proposal']; if(mysql_num_rows($article_proposal)>0){ echo "(".mysql_num_rows($article_proposal).")";} else echo "(0)";?>
        </a></li>
        <li><a href='index.php?controller=change_pass'><?php echo $language['user_password'];?></a></li>    
        <li><a href="logout.php"><?php echo $language['admin_menu_logout'];?></a></li>
        
        
</ul>