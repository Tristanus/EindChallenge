<?php

require(ROOT . "model/ChallengeModel.php");

function index()
{
	createErrorArray();
	createInfoArray();
	render("home/index");	
}