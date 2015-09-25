<?php
session_start();
include_once('inc/dbConnect.inc.php');

        $messager=array();
        if(isset($_POST['loginor']) && !empty($_POST['loginor'])){
            $loginor = mysql_real_escape_string($_POST['loginor']);
        } else{
            $messager[]=' wpisz login! ';
        }


        if(isset($_POST['passor']) && !empty($_POST['passor'])){
            $passor=mysql_real_escape_string($_POST['passor']);
        }else{
            $messager[]=' hasło samo się nie wypełni ;) ';
        }


        if(isset($_POST['imi']) && !empty($_POST['imi'])){
            $imi=mysql_real_escape_string($_POST['imi']);
        }else{
            $messager[]=' wpisz swoje imię ';
        }


        if(isset($_POST['naz']) && !empty($_POST['naz'])){
            $naz=mysql_real_escape_string($_POST['naz']);
        }else{
            $messager[]=' jak nie chcesz to wpisz pierwszą literę nazwiska ';
        }


        if(isset($_POST['ksywa']) && !empty($_POST['ksywa'])){
            $ksywa=mysql_real_escape_string($_POST['ksywa']);
        }else{
            $messager[]=' po tagu można wyszukiwać osoby ';
        }


        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email=mysql_real_escape_string($_POST['email']);
        }else{
            $messager[]=' email to podstawa ';
        }

        $countErrorer=count($messager);

        if($countErrorer > 0){
            for($i=0;$i<$countErrorer;$i++){
                echo ucwords($messager[$i]). ' & ';
            }
            echo " Popraw to. ";
        }else{
            $jquery="SELECT * FROM users WHERE username='$loginor'";
            $res=mysql_query($jquery);
            $checkUser=mysql_num_rows($res);
            if($checkUser > 0){
            } else {
                $query = mysql_query("INSERT INTO users (username, password, imie, nazwisko, email, ksywa) VALUES ('$loginor','$passor','$imi','$naz','$email','$ksywa')") or die(mysql_error());
            }
        }

?>

