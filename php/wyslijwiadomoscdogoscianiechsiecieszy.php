<?php
session_start();
include_once('inc/dbConnect.inc.php');
    $user_id = $_SESSION['uID'];
    if(isset($_POST['wiadomosctekstowa']) && !empty($_POST['wiadomosctekstowa']) && isset($_POST['stringus']) && !empty($_POST['stringus'])){
        $wiadomosctekstowa=mysql_real_escape_string($_POST['wiadomosctekstowa']);
        $stringus=mysql_real_escape_string($_POST['stringus']);
    }else{
        echo "wyslijwiadomoscdogoscianiechsiecieszy.php > crash na klikaniu albo costam ";
        return "DUPA WOLOWA";
    }
    //koniec zmienne ustalone

        $q= mysql_query("SELECT c_id FROM conversation WHERE (user_one='$user_id' and  user_two='$wiadomosctekstowa') or (user_one='$wiadomosctekstowa' and user_two='$user_id') ") or die(mysql_error());
        $time=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        echo "stringus: ".$stringus."/n";
        if(mysql_num_rows($q)!=0) { 
            $v=mysql_fetch_array($q);
            $vv=$v['c_id'];
            $query = mysql_query("INSERT INTO conversation_reply (reply,user_id_fk,ip,time,c_id_fk) VALUES ('$stringus','$user_id','$ip','$time','$vv')") or die(mysql_error());
            $v=mysql_fetch_array($q);
        }else{
            echo "ale wyjebało błąd, olaboga";
        }
    



?>

