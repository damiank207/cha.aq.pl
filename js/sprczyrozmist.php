<?php
session_start();
include_once('inc/dbConnect.inc.php');
        $message=array();
        if(isset($_POST['udataas']) && !empty($_POST['udataas'])){
            $udataas=mysql_real_escape_string($_POST['udataas']);
            echo $udataas;
        }else{
            $message[]=' sprczyrozmist.php > crash na klikaniu albo costam ';
        }



?>

