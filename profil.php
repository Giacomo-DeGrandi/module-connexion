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
	<header>
		<form action='' method="post">
		<input type="submit" name="disconnect" value="disconnect" class="buttons1">
		</form>
	</header>
	<main id="mainpro">	
		<div id="wrapper">
			<div id='maindiv'>		
<?php

$myidnow = $_SESSION['id'];			//init my id to recall sessions
/*
$servername = 'localhost:3306';
$username = 'giditree';
$password = 'admin.io';
$database = 'carlo-de-grandi-giacomo_modconnection';
*/
$servername = 'localhost:3306';
$username = 'giditree1';
$password = 'admin.io';
$database = 'carlo-de-grandi-giacomo_moduleconnexion';

$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion

	$quest = " SELECT login FROM utilisateurs WHERE id = '$myidnow' ";

	$req = mysqli_query($conn,$quest);

	$res = mysqli_fetch_all($req); 

	//echo $res[0][0];

	// My HI USER PART

	echo '<div id="tablediv">'; 

	echo '<h1> hi '. $res[0][0] . ' you\'re now logged in </h1>';

	$login= $res[0][0];

	$quest2 = " SELECT id,login,nom,prenom,password FROM utilisateurs WHERE id = '$myidnow' ";

	$req2 = mysqli_query($conn,$quest2);

	$res2 = mysqli_fetch_all($req2, MYSQLI_ASSOC); 

	echo '<h4> Your personal informations are </h4><hr><br>';

	echo '<table><tr>';

		foreach($res2[0] as $k => $v){
			echo '<th>'. $k . '</th>';
				}

		foreach ($res2 as $k4 => $v4){
			echo '<tr>';
			foreach($v4 as $k5 => $v5){
				echo '<td>'. $v5 .' '. '</td>';
				}
		}

?>
						</tr>
					</table>
				</div> <!-- first maintable div -->

		</div>  <!-- main div -->
	</div>
			<div id="wrapform">
				<div id="formdiv">
					<h3> Update your personal information here </h3>
					<form action='' method='post'>	
						<input type="text" name="login" placeholder="login" ><br>
						<input type="text" name="nom" placeholder="nom"><br>
						<input type="text" name="prenom" placeholder="prenom"><br>
						<input type="password" name="password" placeholder="password"><br>
						<br>
						<input type="submit" name="submit" value="send" class="buttons1">
					</form>
				</div>
			</div>
<?php	

if (isset($_POST['login'])&& ($_POST['login']) != '') { 

			$login = $_POST['login']; 

			$quest = "SELECT login,id FROM utilisateurs WHERE login = '$login'"; 

			$req = mysqli_query($conn, $quest);

			$res = mysqli_fetch_all($req);

			if (mysqli_num_rows($req) != 0){
				echo '<h4>this username already exists. please choose another username</h4>';
				return;
			} else { 		if  (   (isset($_POST['nom']) and ($_POST['nom']) != '') and
								 	(isset($_POST['prenom']) and ($_POST['prenom']) != '') and
								 	(isset($_POST['password']) and ($_POST['password']) != '')	)	{	//**

								$login = $_POST['login'];
								$prenom = $_POST['prenom'];
								$nom = $_POST['nom']; 
								$password = $_POST['password'];
								$id = $myidnow;

								$quest2= "UPDATE utilisateurs SET login = '$login', prenom = '$prenom', nom = '$nom', password = '$password' WHERE id = '$myidnow'";

								$req2 = mysqli_query($conn,$quest2);

								if(isset($_POST['submit'])){

									$quest3= "UPDATE utilisateurs SET status = 0 WHERE login = '$login' "; //disconnect when finished

									$req3 = mysqli_query($conn,$quest3);

									header('Location: profil.php');

								}	
						}	else { 	echo 'error . all fields are required';	}					
			}
} 

$_SESSION['id']= $myidnow;

if (isset($_POST['disconnect'])){
	 
	$quest2= "UPDATE utilisateurs SET status = 0 WHERE login = '$login' ";

	$req2 = mysqli_query($conn,$quest2);

	header("Location: connexion.php");
}

?>
		
		<footer>
			<p>giditree<p>
				<a href="https://github.com/Giacomo-DeGrandi">mon github</a>
		</footer>
		</main>
</body>
</html>

