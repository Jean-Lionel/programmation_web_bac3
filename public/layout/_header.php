<?php

use App\Db\Validation;
require_once '../vendor/autoload.php';


Validation::check_connected_user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>PROJET MINI BANQUE</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style_client.css">
	
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/sweetalert2.all.min.js"></script>
	
</head>
<body>
	<!-- <div>
		<h1>Total cleaning</h1>
	</div> -->
	<div class="navigation" onhover="toggleMenu()">
		<ul>
			<li>
				<a href="index.php">
					<span class="icon"><i class="fa fa-home"></i></span>
					<span class="title">Client</span>
				</a>
			</li>
			<li>
				<a href="agent.php">
					<span class="icon"><i class="fa fa-user"></i></span>
					<span class="title">Agent</span>
				</a>
			</li>
			<li>
				<a href="operation.php">
					<span class="icon"><i class="fa fa-comments"></i></span>
					<span class="title">opération</span>
				</a>
			</li>
			<li>
				<a href="help.php">
					<span class="icon"><i class="fa fa-question-circle"></i></span>
					<span class="title">Aide</span>
				</a>
			</li>
			<li>
				<a href="static.php">
					<span class="icon"><i class="fa fa-cogs"></i></i></span>
					<span class="title">Statics</span>
				</a>
			</li>
			<!-- <li>
				<a href="#">
					<span class="icon"><i class="fa fa-lock"></i></span>
					<span class="title">Password</span>
				</a>
			</li> -->
			<li>
				<a href="logout.php">
					<span class="icon"><i class="fa fa-sign-out"></i></span>
					<span class="title">Sign out</span>
				</a>
			</li>
		</ul>
	</div>

	<div class="toggle" onclick="toggleMenu()">
		
	</div>

	<div class="section">
		<header class="h-titre" style="display: flex; justify-content: space-around;">
			<div>
				<h1>Mini Bank </h1>
			</div>
			
			<div>
				<h4 style="background: gold; color: #000; padding: 5px;">

					<span class="icon"><i class="fa fa-user"></i></span>
				<?= $_SESSION['user']['nom'] ?> - <?= $_SESSION['user']['prenom'] ?> est connecté(e)
			</h4>
			</div>
		</header>


		<div class="container-fluid">