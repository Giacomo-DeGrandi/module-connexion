<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>
	<style type="text/css">	

	body{
		display: flex;
		justify-content: center;
		align-content: center;
	}

	</style>
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


				if (	(isset($_POST["login"])) && $_POST['login'] != ''){				// check if empty and exists
					if (	(isset($_POST["password"])) && $_POST['password'] != '') {

						foreach($res as $k => $v){
							//echo $v['login'];
							foreach($v as $k2 => $v2){

									var_dump($v2);
									
									/*
									if(	(isset($_POST['password']) == $v2))	{


									$_SESSION['connected'][]=$_POST['login'];	
									header('Location: profil.php');

									}	*/
							}
						}	
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

?>

</body>
</html>
