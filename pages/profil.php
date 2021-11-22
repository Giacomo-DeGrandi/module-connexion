<?php 

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil</title>
<style>

	<?php 


	?>
	table td{
		border: solid 1px black;
	}
	body{
		display: flex;
		justify-content: center;
		align-content: center;
	}
	input::placeholder {
  	color: black;
	}

</style>
</head>
<body>
	<table>
		<tr>

<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'moduleconnexion';

$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion

if(isset($_SESSION['login'])){

	$quest = " SELECT login FROM utilisateurs ";

	$req = mysqli_query($conn,$quest);

	$res = mysqli_fetch_all($req); 

	foreach ($res as $k2 => $v2){
		foreach($v2 as $k3 => $v3){
			if($v3 == $_SESSION['login']){

					echo 'HI '. $v3 . ' you\'re now logged in';
					
					$login = $v3;	//just to make it cleares

					$quest2 = " SELECT * FROM utilisateurs WHERE login = '$login' ";

					$req2 = mysqli_query($conn,$quest2);

					$res2 = mysqli_fetch_all($req2, MYSQLI_ASSOC); 



					echo '<br/>';

					foreach($res2[0] as $k => $v){
						echo '<td>'. $k . '</td>';
							}

					foreach ($res2 as $k4 => $v4){
						echo '<tr>';
						foreach($v4 as $k5 => $v5){
							echo '<td>'. $v5 .' '. '</td>';
							}
					}
			} 
		}
	}
}


?>

</tr>

	

</body>
</html>