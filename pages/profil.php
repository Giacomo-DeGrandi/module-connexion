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
	<header id="profil_header">
		<form action='' method="post">
		<input type="submit" name="disconnect" value="disconnect" class="buttons1">
		</form>
	</header>
	<main>

<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'moduleconnexion';

$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion

	$quest = " SELECT login,id FROM utilisateurs ";

	$req = mysqli_query($conn,$quest);

	$res = mysqli_fetch_all($req); 

	
	$_SESSION['id']=$res[0][1];
	$_SESSION['login']=$res[0][0];

if(isset($_SESSION['login'])){			//||isset($_SESSION['connected'])

	foreach ($res as $k2 => $v2){
		foreach($v2 as $k3 => $v3){
			if($v3 == $_SESSION['login']){

					echo '<h1>hi '. $v3 . ' you\'re now logged in </h1>';
					
					$login = $v3;	//just to make it clear

					$quest2 = " SELECT * FROM utilisateurs WHERE login = '$login' ";

					$req2 = mysqli_query($conn,$quest2);

					$res2 = mysqli_fetch_all($req2, MYSQLI_ASSOC); 

					echo '<h4> Your personal informations are </h4><br>';

					echo '<div id="tablediv">  <table><tr>';

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
		</table>
	</div> <!-- first main div -->
	<div id="formdiv">
		<h3> Update your personal information here </h3>
		<form action='' method='post'>	
			<input type="text" name="login" placeholder="login" ><br>
			<input type="text" name="prenom" placeholder="prenom"><br>
			<input type="text" name="nom" placeholder="nom" ><br>
			<input type="password" name="password" placeholder="password"><br>
			<br>
			<input type="submit" name="submit" value="send" class="buttons1">
		</form>
	</div>

<?php	

if (isset($_POST['login'])&& ($_POST['login']) != '') { 

			$quest = "SELECT login FROM utilisateurs "; 

			$req = mysqli_query($conn,$quest);

			$res = mysqli_fetch_all($req, MYSQLI_ASSOC);

			for($i=0; $i<isset($res[$i]); $i++){
				foreach($res[$i] as $k => $v){	
					if($v !== $_POST['login']){
						if  (   (isset($_POST['prenom']) and ($_POST['prenom']) != '') and
								 	(isset($_POST['nom']) and ($_POST['nom']) != '') and
								 	(isset($_POST['password']) and ($_POST['password']) != '')	)	{	//**

								$login = $_POST['login'];
								$prenom = $_POST['prenom'];
								$nom = $_POST['nom']; 
								$password = $_POST['password'];
								$myid = $_SESSION['login'];

								$quest2= "UPDATE utilisateurs SET login = '$login', prenom = '$prenom', nom = '$nom', password = '$password' WHERE login = '$myid'";

								$_POST['login'] = $nulog;

								$req2 = mysqli_query($conn,$quest2);

								if(isset($_POST['submit'])){		
									header( "Location: profil.php" );
								}	
						}	else { 	echo 'error . all fields are required';	}						//**isset($_POST['pass.	
					}	else {	echo 'error . log in name alreasy exists';	}							//**if($v !== $_POST['l..
				}
			}
} 

if (isset($_POST['disconnect'])){
	unset($_SESSION['login']);
	header("Location: connexion.php");
}

?>
	<main>
</body>
</html>

