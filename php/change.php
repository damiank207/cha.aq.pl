<?php
session_start();
include_once('inc/dbConnect.inc.php');
	
    $user_id = $_SESSION['uID'];
    foreach ($_POST as $key => $value) {
    	if ($key=="email"){
            $query="SELECT * FROM users WHERE email='$value'";
            $res=mysql_query($query) or die ("Error in query: $query. ".mysql_error());
            $checkUser=mysql_num_rows($res);
            if($checkUser > 0){
                echo "0";
            }else{$query="UPDATE users SET email='$value' WHERE user_id='$user_id'";
                $res=mysql_query($query) or die ("Error in query: $query. ".mysql_error());
                echo "1";}
        }else if ($key=="ksywa"){
            $query="SELECT * FROM users WHERE ksywa='$value'";
            $res=mysql_query($query) or die ("Error in query: $query. ".mysql_error());
            $checkUser=mysql_num_rows($res);
            if($checkUser > 0){
                echo "0";
            }else{$query="UPDATE users SET ksywa='$value' WHERE user_id='$user_id'";
                $res=mysql_query($query) or die ("Error in query: $query. ".mysql_error());
                echo "1";}
        }else if ($key=="imi"){
        	$query="UPDATE users SET imie='$value' WHERE user_id='$user_id'";
            $res=mysql_query($query) or die ("Error in query: $query. ".mysql_error());
            echo "1";
    	}else if ($key=="naz"){
    		$query="UPDATE users SET nazwisko='$value' WHERE user_id='$user_id'";
            $res=mysql_query($query) or die ("Error in query: $query. ".mysql_error());
            echo "1";
        }else if ($key=="pass"){
            $query="UPDATE users SET password='$value' WHERE user_id='$user_id'";
            $res=mysql_query($query) or die ("Error in query: $query. ".mysql_error());
            echo "1";
        }else if ($key=="mini"){
            $query="UPDATE users SET img_path='$value' WHERE user_id='$user_id'";
            $res=mysql_query($query) or die ("Error in query: $query. ".mysql_error());
            echo "1";}
        
    }

?>