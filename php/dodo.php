<?php
session_start();
include_once('inc/dbConnect.inc.php');
	$message=array();
	if(isset($_POST['ksywq']) && !empty($_POST['ksywq'])){
			$ksywq=mysql_real_escape_string($_POST['ksywq']);
	}else{
			$message[]=' dodo.php > crash na wpisaniu ';
	}
	$countError=count($message);

	if($countError > 0){
		for($i=0;$i<$countError;$i++){
			echo ucwords($message[$i]).' :( ';
		}
	}else{
		$query = "SELECT user_id FROM users WHERE ksywa='$ksywq'";
		$user_id = $_SESSION['uID'];
		$res = mysql_query($query);
		$checkUser=mysql_num_rows($res);
		$row = mysql_fetch_assoc($res);
		$friend_id = $row["user_id"];
		if($checkUser < 1){
			echo "3";
		}else{
			$query_f = "SELECT 'friend_one','friend_two','status' 
				FROM friends WHERE
				(friend_one='$user_id' AND friend_two='$friend_id')
				OR
				(friend_one='$friend_id' AND friend_two='$user_id')";
			$query_f_EXE = mysql_query($query_f);
			$test_1 = mysql_num_rows($query_f_EXE);
			if( $test_1 > 0 ){
					echo "1";
			}else{
				$query_x = "INSERT INTO friends
					(friend_one,friend_two) 
					VALUES
					('$user_id','$friend_id');";
				$query_x_EXE = mysql_query($query_x);
				echo "0";
			}
		}
	}
?>