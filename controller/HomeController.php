<?php

require(ROOT . "model/ChallengeModel.php");

function index()
{
	if (isset($_SESSION['role']) && $_SESSION['role'] == "Docent")
	{
		render("home/index", array(
			'users' => getAllUsers()
		));
	}
	else
	{
		render("home/index");
	}	
}