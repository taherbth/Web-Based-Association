<?php
	session_start();
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("wab") or die(mysql_error());
    
	
	$lang="";	
	if(isset($_REQUEST['site_language'])){
		 $lang=$_REQUEST['site_language'];	
    }
	
	if($lang=="" && !isset($_SESSION['site_language'])){
		$_SESSION['site_language']= "sw";
	}
	elseif(($lang!="" && isset($_SESSION['site_language'])) && ($_SESSION['site_language']!=$lang)){
		$_SESSION['site_language']= $lang;
	}
		
    //Load Language file...
    if(isset($_SESSION['site_language'])){
            if($_SESSION['site_language']=="sw"){
                $lang_file ="../common/language/swedish/sw.php"; 		
            }
            elseif($_SESSION['site_language']=="eng"){
                $lang_file ="../common/language/english/eng.php"; 
            }
            include($lang_file);
    }
    //End of Load Language file...

?>