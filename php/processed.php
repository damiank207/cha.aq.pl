<?php
session_start();
include_once('inc/dbConnect.inc.php');
        $message=array();
        if(isset($_POST['logino']) && !empty($_POST['logino'])){
            $login=mysql_real_escape_string($_POST['logino']);
        }else{
            $message[]=' Lcrash na loginie ';
        }

        if(isset($_POST['passo']) && !empty($_POST['passo'])){
            $pass=mysql_real_escape_string($_POST['passo']);
        }else{
            $message[]=' Lcrash na pass ';
        }

        $countError=count($message);

        if($countError > 0){
             for($i=0;$i<$countError;$i++){
                      echo ucwords($message[$i]).' i ';
             }
        }else{
            $query="SELECT * FROM users WHERE username='$login' AND password='$pass'";
            $querry_dwa="SELECT user_id FROM users WHERE username='$login'";
            $res_dwa = mysql_query($querry_dwa);
            $res_dwarow = mysql_fetch_assoc($res_dwa);
            $res=mysql_query($query);
            $resrow = mysql_fetch_assoc($res);
            $checkUser=mysql_num_rows($res);
            if($checkUser > 0){
                 $_SESSION['LOGIN_STATUS']=true;
                 ini_set('session.cookie_lifetime', 0);
                 $_SESSION['LOGIN']=$login;
                 $_SESSION['uID']=$res_dwarow["user_id"];
                 echo 'correct';
            }else{
                 echo ucwords(' Lwstaw poprawne dane ');
            }
        }

?>

