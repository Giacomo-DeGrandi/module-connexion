<?php

			$servername = 'localhost';
			$username = 'root';
			$password = '';
			$database = 'moduleconnexion';
			
			$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion



if( (isset($_POST['login'])&& ($_POST['login']) != '') &&
	 	(isset($_POST['prenom'])&& ($_POST['prenom']) != '') &&
	 	(isset($_POST['nom'])&& ($_POST['nom']) != '') &&
	 	(isset($_POST['password'])&& ($_POST['password']) != '')){

			$login = $_POST['login'];
			$prenom = $_POST['prenom'];
			$nom = $_POST['nom'];
			$password = $_POST['password'];

			$quest= " INSERT INTO utilisateurs( login, prenom, nom, password) VALUES ('$login','$prenom','$nom','$password') ";

			$req = mysqli_query($conn,$quest);

			if(isset($_POST['submit'])){
			
			header( "Location: connexion.php" );

			}

	} else {

		echo 'Fill up all the fields';
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription</title>
	<style type="text/css">	
	</style>
</head>
<body>
<header>
</header>
<main>
	<form action='' method='post'>		
		<input type="text" name="login" placeholder="login" ><br>
		<input type="text" name="prenom" placeholder="prenom"><br>
		<input type="text" name="nom" placeholder="nom" ><br>
		<input type="text" name="password" placeholder="password"><br>
		<input type="text" name="passwordconf" placeholder="confirm_password" ><br><br>
		<input type="submit" name="submit" value="send">
	</form>
	<br>
	<a href="../index.php" target="_top">go back to the home page </a>
</main>
</body>
</html>

