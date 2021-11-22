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
	table td{
		border: solid 1px black;
	}

		body{
		display: flex;
		justify-content: center;
		align-content: center;

	}
	
</style>
</head>
<body>

<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'moduleconnexion';

$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion

if(isset($_SESSION['login'])){

	$quest = " SELECT * FROM utilisateurs ";

	$req = mysqli_query($conn,$quest);

	$res = mysqli_fetch_all($req, MYSQLI_ASSOC); 


		foreach ($res as $k2 => $v2){
			foreach($v2 as $k3 => $v3){
			}
		}
}
?>

<table>
	<tr>

<?php

foreach($res[0] as $k => $v){
	echo '<td>'. $k . '</td>';
}


foreach ($res as $k2 => $v2){
	echo '<tr>';
	foreach($v2 as $k3 => $v3){
		echo '<td>'. $v3 .' '. '</td>';
		}
}

?>

</tr>
</table>
</body>
</html>
