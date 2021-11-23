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
<main >
	<header>
		<form action='' method="post">
			<input type="submit" name="disconnect" value="disconnect" class="buttons1">
		</form>
	</header>
	<h1> Hi Admin </h1>

<?php

echo "<h3>users</h3>";


$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'moduleconnexion';

$conn = mysqli_connect($servername, $username, $password, $database);	// establish my connexion


	$quest = " SELECT id,login,prenom,nom FROM utilisateurs ";

	$req = mysqli_query($conn,$quest);

	$res = mysqli_fetch_all($req, MYSQLI_ASSOC); 


		foreach ($res as $k2 => $v2){
			foreach($v2 as $k3 => $v3){
			}
		}

?>
	<div id="wrappermainadmin">
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

	<div id="userupdate">
		<h2>choose a user to update:</h2>
		<form action='' method="post">
			<input type="text" name="idup" placeholder="choose id" >
			<input type="submit" name="search" value="search" class="buttons1">
		</form>

<?php



if(isset($_POST['idup'])){
	foreach ($res as $k2 => $v2){
		foreach($v2 as $k3 => $v3){
			if($_POST['idup'] == $v3 ){

				$tempid = $_POST['idup'];

			}
		}
	}

	if( $tempid = $_POST['idup']){

		echo '<div id="changedetails">';
		echo '<br><form action="" method="post" >	
					<input type="text" name="login" placeholder="new login" ><br>
					<input type="text" name="prenom" placeholder="new prenom"><br>
					<input type="text" name="nom" placeholder="new nom"><br>
					<input type="password" name="password" placeholder="new password">
					<br>
					<input type="submit" name="submit" value="send" class="buttons1">
				</form>';
		echo '</div>';
	}
}

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

								$quest2= "UPDATE utilisateurs SET login = '$login', prenom = '$prenom', nom = '$nom', password = '$password' WHERE login = '$tempid' ";

								$req2 = mysqli_query($conn,$quest2);

								if(isset($_POST['submit'])){

									header( "Location: adimin.php" );
								}	

						}	else { 	echo 'error . all fields are required';	}						//**isset($_POST['pass.	
					}	else {	echo 'error . log in name alreasy exists';	}							//**if($v !== $_POST['l..
				}
			}
} 



?>
		</div>   <!--userupdate -->
	</div> <!--mainwrapper div -->
</main>
</body>
</html>
