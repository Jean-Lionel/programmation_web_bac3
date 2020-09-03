<?php

use App\Db\Connection;

require '../vendor/autoload.php';

$error = "";

if(isset($_POST['connect'])){

	$pdo = Connection::getPdo();

	extract($_POST);

	$password_hach = sha1($password);

	$sql = "SELECT * FROM agents WHERE login ='$userName' and password='$password_hach'";

	$result = $pdo->query($sql);
	$user = $result->fetch();

	// var_dump($user);

	// die();
	if($user){
		if(session_status() === PHP_SESSION_NONE){
			session_start();
		}

		$_SESSION['user'] = $user;

		header('Location: index.php');
	}else{
		$error  = "Vos identifiants sont incorrectés";
	}

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">

</head>
<body>


	<div class="form">
	
		
		<form action="" method="post">
			<input type="text" name="userName" placeholder="Utilisateur">
			<input type="password" name="password" placeholder="Mot de pass">

			<div class="button-group">
				<input type="submit" name="connect" value="Login">
			</div>

		</form>

		<div class="error" id="error">
			<?php if($error): ?>

				<span><?= $error ?></span>

			<?php endif ?>
			
		</div>

		
	</div>

	
	
</body>
</html>