<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>
</head>
<body>
	<form action='' method='post'>
			<input type="text" name="login" placeholder="login" ><br>
			<input type="text" name="password" placeholder="password"><br>
	<input type="submit" name="submit" value='Log In'>
	</form>

<?php

// MySql part

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'moduleconnexion';

$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion

$quest = "SELECT login, password FROM utilisateurs "; 

$req = mysqli_query($conn,$quest);

$res = mysqli_fetch_all($req, MYSQLI_ASSOC);


if (	(isset($_POST["login"])) && $_POST['login'] != ''){
	if (	(isset($_POST["password"])) && $_POST['password'] != '') {

		$_SESSION["login"][] = $_POST["login"];

		$_SESSION["password"][] = $_POST["password"];

		foreach($res as $v){
			if($v == $_POST["login"] or $v == $_POST["password"]){
				$_SESSION["login"]++;
				$_SESSION["password"]++;
			}
		}
		
		if (isset($_POST['submit'])){

			header( "Location: profil.php" );
		}
	}
}




?>

</body>
</html>
