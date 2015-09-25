<?php
session_start();
include_once('inc/dbConnect.inc.php');
        $message=array();
        if(isset($_POST['logino']) && !empty($_POST['logino'])){
            $login=mysql_real_escape_string($_POST['logino']);
        }else{
            $message[]=' dodawanie.php > crash na loginie ';
        }

        if(isset($_POST['passo']) && !empty($_POST['passo'])){
            $pass=mysql_real_escape_string($_POST['passo']);
        }else{
            $message[]=' dodawanie.php > crash na pass ';
        }

        $countError=count($message);

        if($countError > 0){
             for($i=0;$i<$countError;$i++){
                      echo ucwords($message[$i]).' i ';
             }
        }else{
            $query="SELECT * FROM users WHERE username='$login' AND password='$pass'";

            $res=mysql_query($query);
            $checkUser=mysql_num_rows($res);
            if($checkUser > 0){
                 $_SESSION['LOGIN_STATUS']=true;
                 ini_set('session.cookie_lifetime', 0);
                 $_SESSION['LOGIN']=$login;
                 echo 'correct';
            }else{
                 echo ucwords(' dodawanie.php > wstaw poprawne dane ');
            }
        }

?>

