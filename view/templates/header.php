<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kappert</title>
	<link rel="stylesheet" href="<?= URL ?>css/bootstrap-3.3.7.css">
	<link rel="stylesheet" href="<?= URL ?>">
</head>
<body>
	<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= URL ?>home/index">Home</a>
            </div>

            <ul class="nav navbar-nav">

<?php if(isset($_SESSION['logged in']) && $_SESSION['role'] == 'employee'): ?>

                <li><a href="<?= URL ?>challenge/create">Kapper toevoegen</a></li>

<?php endif; ?>

	        </ul>

            <!-- navbar part that's on the right side -->
            <ul class="nav navbar-nav navbar-right">

<?php if(isset($_SESSION['logged in'])): ?>

				<li><a>Welkom, <?= $_SESSION['firstname']; ?></a></li>
				<li><a href="<?= URL ?>challenge/logout">Logout</a></li>

<?php ; else: ?>

            	<li><a href="<?= URL ?>challenge/register">Registreer</a></li>
                <li><a href="<?= URL ?>challenge/login">Login</a></li>

<?php endif; ?>

            </ul>
        </div>
	</nav>

    <?php
        // if errors found, print them
        if (isset($_SESSION['errors']) && is_array($_SESSION['errors']) && sizeof($_SESSION['errors'])>0 ) {
            echo '<div class="alert alert-danger alert-dismissable">
                <strong>Fout!</strong> <ul>';
            foreach($_SESSION['errors'] as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul></div>';
            // errors are shown. now remove them from session
            $_SESSION['errors'] = [];
        }
    ?>