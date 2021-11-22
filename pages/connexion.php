<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="modcon.css" rel="stylesheet"> 
	<title>Connexion</title>
</head>
<body id="connbody">
	<form action='' method='post'>
			<input type="text" name="login" placeholder="login" ><br>
			<input type="password" name="password" placeholder="password"><br>
	<input type="submit" name="submit" value="Log In" class="buttons1">
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

		$admincheck=0;

		$usercheck=0;


				if (	(isset($_POST["login"])) and $_POST['login'] != ''){				// check if empty and exists
					if (	(isset($_POST["password"])) and $_POST['password'] != '') {

						foreach($res as $k => $v){

							if( $_POST['login'] === $v['login'] and	$_POST['login'] !== 'admin' ){

								$usercheck++;

							} elseif ($_POST['login'] === 'admin') {	
								
								$admincheck++;

							}

							if ($_POST['password'] === $v['password'] and $_POST['password'] !== 'admin' ){

								$usercheck++;

									if ($usercheck === 2 ){

										$_SESSION['connected']=$_POST['login'];
										$_SESSION['login']=$_POST['login'];


										header( 'Location: profil.php');
									}

							}	elseif ($_POST['login'] === 'admin') {

								$admincheck++;

								if ($admincheck === 2){

									$_SESSION['adminconnected']=$_POST['login'];

										header( 'Location: admin.php');
								}
							}
						}	// foreach 

					}	else {	echo 'please insert your password'; }
				}	else { echo 'please insert your login name';}


							//if(	(isset($_POST['login']) === $v))	{
							//	if(	(isset($_POST['password']) === $v))	{

									//	$_SESSION['connected'][]=$_POST['submit']; 

									//	$_SESSION['login'][]=$_POST['login']; 

									//	header('Location: profil.php');
										
									//}	else {
									//	echo '<a href="inscription.php">Subscribe to Log In</a>';
									//}
							//}
				/*


								if ($_POST['login'] === 'admin' ) {

								$admincheck++;
							 
								} 

								if ($_POST['password'] === 'admin' )  {	

											$admincheck++; 

											if( $admincheck === 2 ){

												header( 'Location: admin.php');
											}
										}


								*/


?>

</body>
</html>
