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

	$quest2= "UPDATE utilisateurs SET status = 0 WHERE login = 'admin' ";

	$req2 = mysqli_query($conn,$quest2);

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


if(isset($_POST['idup'])&& ($_POST['idup']) != ''){
	if(isset($_POST['search'])){
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
							<input type="text" name="login2" placeholder="new login" ><br>
							<input type="text" name="prenom2" placeholder="new prenom"><br>
							<input type="text" name="nom2" placeholder="new nom"><br>
							<input type="text" name="confirmid" placeholder="confirm id">
							<br>
							<input type="submit" name="submit2" value="send" class="buttons1">
						</form>';
				echo '</div>';
			}

			$quest = "SELECT * FROM utilisateurs WHERE id = $tempid "; 

			$req = mysqli_query($conn,$quest);

			$res = mysqli_fetch_all($req, MYSQLI_ASSOC);

			echo '<table id="minitableadmin">';

			foreach($res[0] as $k => $v){
				echo '<th>'. $k .'</th>';
					}

			foreach($res as $b => $a){
					echo '<tr>';

				foreach($a as $r => $s){
					echo '<td>'. $s .' '. '</td>';
				}
			}
	}
} else { echo 'enter id'; }

echo '</tr></table id="tableuserup">';


if (isset($_POST['login2'])&& ($_POST['login2']) != '') { 

			//check if username already exists

			$login = $_POST['login2']; 

			$quest = "SELECT login FROM utilisateurs WHERE login = '$login'"; 

			$req = mysqli_query($conn, $quest);

			if (mysqli_num_rows($req) != 0){
				echo '<h4>this username already exists. please choose another username</h4>';
			} else { 
							if  (   (isset($_POST['prenom2']) and ($_POST['prenom2']) != '') and
									 	(isset($_POST['nom2']) and ($_POST['nom2']) != '') and
									 	(isset($_POST['confirmid']) and ($_POST['confirmid']) != '')	)	{	//**															

											if(isset($_POST['submit2'])){

												$login = $_POST['login2'];
												$prenom = $_POST['prenom2'];
												$nom = $_POST['nom2']; 
												$id2 = $_POST['confirmid'];

												$quest2= "UPDATE utilisateurs SET login = '$login', prenom = '$prenom', nom = '$nom', status = 0, statusad = 0 WHERE id = '$id2' ";

												mysqli_query($conn,$quest2);

												header( "Location: admin.php" );
											}	

							}	else { 	echo 'error . all fields are required';	}						//**isset($_POST['pass.	 
			}
} 

?>
		</div>   <!--userupdate -->
	</div> <!--mainwrapper div -->
	<footer>
			<p>giditree<p>
				<a href="https://github.com/Giacomo-DeGrandi">mon github</a>
		</footer>
</main>
</body>
</html>
