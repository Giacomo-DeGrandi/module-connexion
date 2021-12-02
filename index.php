<?php


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
</header> 
<main>
	<h1> welcome to the hall</h1><br>
	<a href="inscription.php" target="_top">SIGN UP </a>
	<br><br>
	<a href="connexion.php" target="_top">LOG IN</a>
	<br><br><br><br>
	<div id="onlineusers">
		<table>
			<h4> connected users </h4>

<?php

$servername = 'localhost:3306';
$username = 'giditree1';
$password = 'admin.io';
$database = 'carlo-de-grandi-giacomo_moduleconnexion'; 

$conn = mysqli_connect($servername, $username, $password, $database);

	$quest = " SELECT login,status,statusad FROM utilisateurs ";

	$req = mysqli_query($conn,$quest); 

/* fetch associative array */
while ($row = mysqli_fetch_row($req)) {
	if($row[1] == 0){
			
			echo '<tr>';
			echo '<td>'.$row[0].'</td>';			
			echo '<td>'.' 🔴'.'</td>';
			echo '</tr>';

	} elseif ($row[1] == 1){

			echo '<tr>';
			echo '<td>'.$row[0].'</td>';			
			echo '<td>'.' 🟢'.'</td>';
			echo '</tr>';
	}

}

	/*


	foreach($res as $k => $v){
		foreach($v as $k2 => $v2){
			if(($v2['status']==0) or ($v2['statusad']==0)){

						echo '<tr>';
						echo '<td>'.$v2.'</td>';
						echo '<td>'.' 🔴'.'</td>';
						echo '</tr>';

			} elseif (($v2['status']==1) or ($v2['statusad']==1)){

						echo '<tr>';
						echo '<td>'.$v2.'</td>';
						echo '<td>'.' 🟢'.'</td>';
						echo '</tr>';

			}
		}
	}


} elseif (isset($_SESSION['login'])){
			for($i=0; $i<isset($_SESSION['id']); $i++){
				for($c=0; $c<isset($_SESSION['login']); $c++){

						echo '<tr>';
						echo '<td>'.$_SESSION['login'].'</td>';
						echo '<td>'.' 🟢 '.'</td>';
						echo '</tr>';
				}

			}
			for($c=0; $c<isset($_SESSION['adminconnected']); $c++){

						echo '<tr>';
						echo '<td>'.'<h2>Admin</h2>'.'</td>';
						echo '<td>'.' 🟢 '.'</td>';
						echo '</tr>';
			}

}	else {	echo '<h2>looks like there is nobody connected right now 😧 </h2>';		}

*/

?>
		</table>
	</div>
		<footer>
			<p>giditree<p>&#160;
				<a href="https://github.com/Giacomo-DeGrandi">mon github</a>
		</footer>
</main>
</body>
</html>