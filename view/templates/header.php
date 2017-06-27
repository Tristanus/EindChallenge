<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Studenten app</title>	
	<link rel="stylesheet" href="<?= URL ?>">
</head>
<body>
	<nav>
	<ul>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] == "Student"): ?>

		<li><a href="<?= URL ?>home/index">Home</a></li>
		<li><a href="<?= URL ?>challenge/logOut">Uitloggen</a></li>

<?php ; elseif (isset($_SESSION['role']) && $_SESSION['role'] == "Docent"): ?>

		<li><a href="<?= URL ?>home/index">Home</a></li>
		<li><a href="<?= URL ?>challenge/logOut">Uitloggen</a></li>
		<li><a href="<?= URL ?>challenge/examsIndex">Plan examen</a></li>

<?php ; else: ?>

		<li><a href="<?= URL ?>home/index">Home</a></li>
		<li><a href="<?= URL ?>challenge/login">Login</a></li>
		<li><a href="<?= URL ?>challenge/register">Registreren</a></li>

<?php endif; ?>

	</ul>
	</nav>
