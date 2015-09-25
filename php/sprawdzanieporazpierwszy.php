<?php
session_start();
include_once('inc/dbConnect.inc.php');
    $user_id = $_SESSION['uID'];
    if(isset($_POST['tenid']) && !empty($_POST['tenid'])){
        $tenid=mysql_real_escape_string($_POST['tenid']);
        $k=mysql_query("SELECT * FROM conversation WHERE (user_one='$user_id' and user_two='$tenid') or (user_two='$user_id' and user_one='$tenid')");
        if(!$k){
            die('nie moge: '.mysql_error());
        }else{
            $kk = mysql_fetch_row($k);
            $p=$kk[0];
        }
                $f= mysql_query("UPDATE conversation_reply SET msg_stat_1=1 WHERE (c_id_fk='$p') and (user_id_fk!='$user_id') and (msg_stat_1=0)");
                $q= mysql_query("SELECT * FROM (SELECT * FROM conversation_reply R WHERE R.c_id_fk='$p' ORDER BY R.cr_id DESC LIMIT 20) R ORDER BY R.cr_id ASC") or die(mysql_error());
                //rsort($q);
                while($rew = mysql_fetch_assoc($q)){
                    if($rew['user_id_fk']==$user_id){
                        echo "<div class='mes' data-time='".$rew['time']."'><div class='pon'><div class='wiad'><p class='b'>".$rew['reply']."</p></div></div></div>"."\n";
                    }
                    else{
                        echo "<div class='mes' data-time='".$rew['time']."'><div class='pop'><div class='wiad'><p class='c'>".$rew['reply']."</p></div></div></div>"."\n";
                    }
                
            /*
                while($row = mysql_fetch_assoc($q)){
                    $hell = "c_id: ".$row['c_id']." user_one: ".$row['user_one']." user_two: ".$row['user_two']." cr_id: ".$row['cr_id']." user_id_fk: ".$row['user_id_fk']." c_id_fk: ".$row['c_id_fk']." msg_stat_1: ".$row['msg_stat_1']." msg_stat_2: ".$row['msg_stat_2']." reply: ".$row['reply']."\n";
                }
            */
        }
    }else{
        echo "sprawdzanieporazpierwszy.php > crash na klikaniu albo costam ";
        return "DUPA WOLOWA";
    }
    //koniec zmienne ustalone

/*
                echo "1";
        $time=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        if(mysql_num_rows($q)!=0) { 
                echo "2";
        $v=mysql_fetch_array($q);
                echo "3";
                echo $v['c_id'];
        $vv=$v['c_id'];
                echo "4";
        $query = mysql_query("INSERT INTO conversation_reply (reply,user_id_fk,ip,time,c_id_fk) VALUES ('$tenid','$user_id','$ip','$time','$vv')") or die(mysql_error());
        $v=mysql_fetch_array($q);
                echo "5";
        echo $v['c_id'];
        }else{
        echo "ale wyjebało błąd, olaboga";
        }
    

*/

?>

