
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="modcon.css" rel="stylesheet"> 
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
<?php


// Connection to database 

$servername = 'localhost:3306';
$username = 'giditree1';
$password = 'admin.io';
$database = 'carlo-de-grandi-giacomo_moduleconnexion'; 
			
			$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion


if  ((isset($_POST['login']) and ($_POST['login']) != '')){

			//check if username already exists

			$login = $_POST['login']; 

			$quest = "SELECT login FROM utilisateurs WHERE login = '$login'"; 

			$req = mysqli_query($conn, $quest);

			$res = mysqli_fetch_all($req);

			if (mysqli_num_rows($req) != 0){
				echo '<h4>this username already exists. please choose another username</h4>';
				return;
			} else { 	
				if  (   (isset($_POST['prenom']) and ($_POST['prenom']) != '') and
								 	(isset($_POST['nom']) and ($_POST['nom']) != '') and
								 	(isset($_POST['password']) and ($_POST['password']) != '') and
									(isset($_POST['passwordconf']) and ($_POST['passwordconf']) != '') )  {	
								if( $_POST['password'] === $_POST['passwordconf']){
									if(isset($_POST['submit'])){

										$login = $_POST['login'];
										$prenom = $_POST['prenom'];
										$nom = $_POST['nom']; 
										$password = $_POST['password'];
										$status = 0;
										$statusad =0;

										$quest2= " INSERT INTO utilisateurs( login, prenom, nom, password, status, statusad) VALUES ('$login','$prenom','$nom','$password', '$status', '$statusad' ) ";

										$req2 = mysqli_query($conn,$quest2);

										header( "Location: connexion.php" );

									}	
								} else { echo '<span class="ads"> passwords don\'t match </span>';
								}
				} else {  echo '<span class="ads"> please insert your details </span>'; 
				}
			}
}



?>

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

