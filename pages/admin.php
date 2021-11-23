<?php 

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="modcon.css" rel="stylesheet"> 
</head>
<body>
<main id="adminmain">
	<header>
		<form action='' method="post">
			<input type="submit" name="disconnect" value="disconnect" class="buttons1">
		</form>
	</header>
	<h1> Hi Admin </h1>

<?php

echo "<p>users</p>";


$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'moduleconnexion';

$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion


	$quest = " SELECT * FROM utilisateurs ";

	$req = mysqli_query($conn,$quest);

	$res = mysqli_fetch_all($req, MYSQLI_ASSOC); 


		foreach ($res as $k2 => $v2){
			foreach($v2 as $k3 => $v3){
			}
		}

?>

<table id="admintable">
	<tr>

<?php

foreach($res[0] as $k => $v){
	echo '<th>'. $k . '</th>';
}


foreach ($res as $k2 => $v2){
	echo '<tr>';
	foreach($v2 as $k3 => $v3){
		echo '<td>'. $v3 .' '. '</td>';
		}
}

if (isset($_POST['disconnect'])){
	unset($_SESSION['login']);
	unset($_SESSION['adminconnected']);
	header("Location: connexion.php");
}

?>

</tr>
</table>

<h2>choose a user to update:</h2>
	<form action='' method="post">
		<input type="text" name="login" placeholder="login name" ><br>
	</form>

<?php

if(isset($_POST['login'])){

}


?>

</main>
</body>
</html>
