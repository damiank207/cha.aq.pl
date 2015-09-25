<?
session_start();
include_once('inc/dbConnect.inc.php');
$helpujaca = $_SESSION['uID'];
				$message=array();
				if(isset($_POST['znajomy']) && !empty($_POST['znajomy'])){
						$znajomy=mysql_real_escape_string($_POST['znajomy']);
				}else{
						$message[]=' acznaj.php > daj znac jak doszedles do tego bledu ';
				}
				$countError=count($message);

				if($countError > 0){
							for($i=0;$i<$countError;$i++){
											echo ucwords($message[$i]).' :( ';
							}
				}else{
				$query = "UPDATE friends SET status=1
							WHERE friend_one='$znajomy' AND friend_two='$helpujaca'";
				$res = mysql_query($query);
				echo "1";
				}

?>