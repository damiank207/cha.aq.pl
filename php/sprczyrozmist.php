<?php
session_start();
include_once('inc/dbConnect.inc.php');
    $user_id = $_SESSION['uID'];
    if(isset($_POST['udataas']) && !empty($_POST['udataas'])){
        $udataas=mysql_real_escape_string($_POST['udataas']);
        echo $udataas;
    }else{
        echo $udataas;
        echo "sprczyrozmist.php > crash na klikaniu albo costam ";
        //return "DUPA WOLOWA";
    }
    //koniec zmienne ustalone

    if($udataas!=$user_id)
    {  
    $q= mysql_query("SELECT c_id FROM conversation WHERE (user_one='$user_id' and  user_two='$udataas') or (user_one='$udataas' and user_two='$user_id') ") or die(mysql_error());
    $time=time();
    $ip=$_SERVER['REMOTE_ADDR'];
        if(mysql_num_rows($q)==0) { 
        $query = mysql_query("INSERT INTO conversation (user_one,user_two,ip,time) VALUES ('$user_id','$udataas','$ip','$time')") or die(mysql_error());
        $q=mysql_query("SELECT c_id FROM conversation WHERE (user_one='$user_id' and user_two='$udataas') ORDER BY c_id DESC limit 1");
        $v=mysql_fetch_array($q);
        //echo $v['c_id'];
        }else{
        $v=mysql_fetch_array($q);
        //echo $v['c_id'];
        }
    }

$udataas = "";

?>

