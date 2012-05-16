<?php
	session_start();
   
    
	/*mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("wab") or die(mysql_error());*/
	
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
                $lang_file ="./language/swedish/sw.php"; 		
            }
            elseif($_SESSION['site_language']=="eng"){
                $lang_file ="./language/english/eng.php"; 
            }
            include($lang_file);
    }
    //End of Load Language file...
    
       
    $config = array();
    $config['site_name']  = $language['site_heading_text'];
    $config['BASE_URL']   = 'http://localhost/wab';
    $config['BASE_DIR']	    = $_SERVER['DOCUMENT_ROOT']."/wab";

    $Config_host = 'localhost';
    $Config_user = 'root';
    $Config_password = '';
    $Config_db = 'wab';
    
     

$dbcon = @mysql_pconnect($Config_host, $Config_user, $Config_password) or die(mysql_error());
mysql_select_db($Config_db) or die(mysql_error());

?>