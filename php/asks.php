<?
session_start();
include_once('inc/dbConnect.inc.php');

$user_id = $_SESSION['uID'];
$query_akt = "SELECT * FROM friends WHERE
			   friend_two='$user_id' AND status='0'";
$query_akt_EXE = mysql_query($query_akt);

while($row = mysql_fetch_assoc($query_akt_EXE)) {
	$zm_help = $row['friend_one'];
	$query_names = "SELECT * FROM users WHERE
					  user_id='$zm_help'";
	$query_names_EXE = mysql_query($query_names);
	$rew = mysql_fetch_assoc($query_names_EXE);

echo "<div class='listaznajcodod' style='color:#fff; line-height: 40px;width: 250px;
height: 40px;background-color: rgba(127, 255, 212, 0.28);text-align: center;
margin-left: auto;margin-right: auto;margin-bottom: 5px;' 
data-user='".$rew['user_id']."'>".$rew['imie']." ".$rew['nazwisko']."</div>";
}


?>