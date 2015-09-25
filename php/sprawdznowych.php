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
                $q= mysql_query("SELECT * FROM conversation_reply R WHERE (c_id_fk='$p') and (user_id_fk!='$user_id') and (msg_stat_1=0) ORDER BY R.cr_id ASC") or die(mysql_error());
                $f= mysql_query("UPDATE conversation_reply SET msg_stat_1=1 WHERE (c_id_fk='$p') and (user_id_fk!='$user_id') and (msg_stat_1=0)");
                while($rew = mysql_fetch_assoc($q)){            
                    if($rew['user_id_fk']==$user_id){
                        echo "<div class='mes' data-time='".$rew['time']."'><div class='pon'><div class='wiad'><p class='b'>".$rew['reply']."</p></div></div></div>"."\n";
                    }
                    else{
                        echo "<div class='mes' data-time='".$rew['time']."'><div class='pop'><div class='wiad'><p class='c'>".$rew['reply']."</p></div></div></div>"."\n";
                    }
        }
    }else{
        echo "sprawdznowych.php > crash na klikaniu albo costam ";
        return "DUPA WOLOWA";
    }
?>

