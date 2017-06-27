<?php

require(ROOT . "model/ChallengeModel.php");

function login()
{	
	if ( IsLoggedInSession()==true ) {
		echo "U heeft al ingelogd!";
		render("home/index");
		exit();
	}
	else {
		if(isset($_POST["username"]) && isset($_POST["password"])) {
			if(loginUser($_POST['username'], $_POST['password']))
			{
				header("Location:" . URL . "home/index");
				exit();
			}else{
				render("challenge/login");
				echo 'ownee het is een fout help';
				exit();
			}
		}
		else
		{
			render("challenge/login");
			exit();
		}
	}
}


function register()
{
	render("challenge/register");
}

function registerSave()
{
	if ( IsLoggedInSession()==true ) {
		echo "U bent al ingelogd!";
		render("home/index");
		exit();
	}
	else 
	{
		if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']))
		{
			echo 'U heeft een veld niet ingevuld';
			render("challenge/register");
			exit();
		}

		// if fields are filled, call function
		if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
		{
			createUser($_POST['firstname'], $_POST['lastname'], $_POST['username'],  $_POST['password'], $_POST['email']);
			header("Location:" . URL . "home/index");
			exit();
		}
	}
}

function create()
{
	render("challenge/create");
}

function createSave()
{
	if (!createUser($_POST['firstname'], $_POST['lastname'], $_POST['username'],  $_POST['password'], $_POST['email'], $_POST['role'])) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "home/index");
}

function edit($id)
{
	render("challenge/edit", array(
		'user' => getUser($id)
	));
}

function editSave()
{
	if (isset($_POST['id']) &&isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['role']))
	{
		editUser($_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['username'],  $_POST['password'], $_POST['email'], $_POST['role']);
		header("Location:" . URL . "home/index");
		exit();
	}
	else
	{
		echo "Oops something went wrong!";
	}
}

function delete($id)
{
	if (!deleteUser($id))
	{
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "home/index");
}

function examsIndex()
{
	if (isset($_SESSION['role']) && $_SESSION['role'] == "Docent")
	{
		render("challenge/exams", array(
			'exams' => getAllExams()
		));
	}
	else
	{
		render("home/index");
	}
}

function createExam()
{
	render("challenge/createExam");
}

function createExamSave()
{
	if (!createNewExam($_POST['subject'], $_POST['_time'], $_POST['examinator_1'],  $_POST['examinator_2']))
	{
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "challenge/examsIndex");
}