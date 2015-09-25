<?
session_start();
include_once('inc/dbConnect.inc.php');
$helpujaca = $_SESSION['uID'];
	$query_uno = "SELECT * FROM friends
				WHERE (friend_one='$helpujaca' AND status='1')";
	$query_uno_EXE = mysql_query($query_uno);

	while($row_uno = mysql_fetch_assoc($query_uno_EXE)) {

		$zm_help_uno = $row_uno['friend_two'];
		$query_names_uno = "SELECT * FROM users WHERE
						  user_id='$zm_help_uno'";
		$query_names_uno_EXE = mysql_query($query_names_uno);
		$rew_uno = mysql_fetch_assoc($query_names_uno_EXE);

		if($rew_uno['img_path'].length){ $zmiennacodziala = $rew_uno['img_path']; } else { $zmiennacodziala = "Bonsai_IMG_6426.jpg"; }

		echo "<li class='lister' data-img='".$zmiennacodziala."' data-user='".$rew_uno['user_id']."'><span class='imiee'>".$rew_uno['imie']."</span> <span class='ksywaa' style=''>".$rew_uno['ksywa']."</span> <span class='nazwiskoo'>".$rew_uno['nazwisko']."</span></li>";
				echo " ";
	}

	$query_duo = "SELECT * FROM friends
					WHERE (friend_two='$helpujaca' AND status='1')";
	$query_duo_EXE = mysql_query($query_duo);

	while($row_duo = mysql_fetch_assoc($query_duo_EXE)) {
		$zm_help_duo = $row_duo['friend_one'];
		$query_names_duo = "SELECT * FROM users WHERE
							user_id='$zm_help_duo'";
		$query_names_duo_EXE = mysql_query($query_names_duo);
		$rew_duo = mysql_fetch_assoc($query_names_duo_EXE);

		if($rew_duo['img_path'].length){ $zmiennacodziala = $rew_duo['img_path']; } else { $zmiennacodziala = "Bonsai_IMG_6426.jpg"; }

		echo "<li class='lister' data-img='".$zmiennacodziala."' data-user='".$rew_duo['user_id']."'><span class='imiee'>".$rew_duo['imie']."</span> <span class='ksywaa' style=''>".$rew_duo['ksywa']."</span> <span class='nazwiskoo'>".$rew_duo['nazwisko']."</span></li>";
				echo " ";
	}

//  Zl0dziejeH@sel:)

?>