<?php
session_start();
include_once('inc/dbConnect.inc.php');
	
    foreach ($_POST as $key => $value) {
    	if ($key=="loginor"){
    		$query="SELECT * FROM users WHERE username='$value'";
        	$res=mysql_query($query);
            $checkUser=mysql_num_rows($res);
            if($checkUser > 0){
                echo 'Takie dane są już w użyciu';
            }else{echo "1";}
        }else if ($key=="ksywa"){
    		$query="SELECT * FROM users WHERE ksywa='$value'";
        	$res=mysql_query($query);
            $checkUser=mysql_num_rows($res);
            if($checkUser > 0){
                echo 'Takie dane są już w użyciu';
            }else{echo "1";}
        }else if ($key=="email"){
    		$query="SELECT * FROM users WHERE email='$value'";
        	$res=mysql_query($query);
            $checkUser=mysql_num_rows($res);
            if($checkUser > 0){
                echo 'Takie dane są już w użyciu';
            }else{echo "1";}
        }else if ($key=="passor"){
        	echo "1";
    	}else if ($key=="imi"){
    		echo "1";
   	 	}else if ($key=="naz"){
   	 		echo "1";}
        
    }

?>