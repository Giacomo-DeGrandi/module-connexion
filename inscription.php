<?php


// Connection to database 

		$servername = 'localhost:3306';
		$username = 'giditree';
		$password = 'admin.io';
		$database = 'carlo-de-grandi-giacomo_modconnection';
			
			$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion


// Pose my conditions to validate forms if all fields are filled

			// I start with login to check if it already exist , if it exists, i send an error message
			// like this i don't have to stay checking the connection form and relate it to the id but is sufficient the login name 

if (isset($_POST['login'])&& ($_POST['login']) != '') { 


			$quest = "SELECT login FROM utilisateurs "; 

			$req = mysqli_query($conn,$quest);

			$res = mysqli_fetch_all($req, MYSQLI_ASSOC);

			for($i=0; $i<isset($res[$i]); $i++){
				foreach($res[$i] as $k => $v){	
					if($v !== $_POST['login']){

			// Here i continue posing my conditions

						if  (   (isset($_POST['prenom']) and ($_POST['prenom']) != '') and
								 	(isset($_POST['nom']) and ($_POST['nom']) != '') and
								 	(isset($_POST['password']) and ($_POST['password']) != '') and
									(isset($_POST['passwordconf']) and ($_POST['passwordconf']) != '') )  {	//**
								if( $_POST['password'] == $_POST['passwordconf']){ 

									/* Remember to validate the password. */

									/* Create the new password hash. */


									$login = $_POST['login'];
									$prenom = $_POST['prenom'];
									$nom = $_POST['nom']; 
									$password = $_POST['password'];

									$quest2= " INSERT INTO utilisateurs( login, prenom, nom, password) VALUES ('$login','$prenom','$nom','$password') ";

									$req2 = mysqli_query($conn,$quest2);

									if(isset($_POST['submit'])){
									
										header( "Location: connexion.php" );

									}	
								} else { echo 'error . passwords are not matching'; }
						}	else { 	echo 'error . all fields are required';	}						//**isset($_POST['pass.	
					}	else {	echo '<h4>error . log in name alreasy exists</h4>';	}							//**if($v !== $_POST['l..
				}
			}
} 


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="livreor.css" rel="stylesheet"> 
	<title>Inscription</title>
</head>
<body id="iscbody">
<header>
</header>
<main>
	<h1>SIGN UP</h1>
	<form action='' method='post'>	
		<input type="text" name="login" placeholder="login" ><br>
		<input type="text" name="prenom" placeholder="prenom"><br>
		<input type="text" name="nom" placeholder="nom" ><br>
		<input type="password" name="password" placeholder="password"><br>
		<input type="password" name="passwordconf" placeholder="confirm_password" ><br><br>
		<input type="submit" name="submit" value="send" class="buttons1">
	</form>
	<br>
	<a href="../index.php" target="_top">go back to the home page </a>
	<br><br>
	<a href="connexion.php" target="_top">Already Signed Up? Log in </a>
	<footer>
			<p>giditree<p>
				<a href="https://github.com/Giacomo-DeGrandi">mon github</a> 
	</footer>
</main>
</body>
</html>

