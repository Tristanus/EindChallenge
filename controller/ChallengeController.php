<?php

require(ROOT . "model/ChallengeModel.php");

function login()
{	
	if ( IsLoggedInSession()==true ) {
		$_SESSION['errors'][] .= "U heeft al ingelogd!";
		render("home/index");
		exit();
	}
	else {
		if(isset($_POST["email"]) && isset($_POST["password"])) {
			if(loginUser($_POST['email'], $_POST['password']))
			{
				header("Location:" . URL . "home/index");
				exit();
			}else{
				render("challenge/login");
				$_SESSION['errors'][] .= "Sorry er is iets mis gegaan. Probeer opnieuw!";
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
	if ( IsLoggedInSession()==true ) {
		$_SESSION['errors'][] .= "U heeft al ingelogd!";
		render("home/index");
		exit();
	}
	else
	{
		render("challenge/register");
	}
}

function registerSave()
{
	if ( IsLoggedInSession()==true ) {
		$_SESSION['errors'][] .= "U heeft al ingelogd!";
		render("home/index");
		exit();
	}
	else 
	{
		if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['password']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['zipcode']) || empty($_POST['telephone']) || empty($_POST['mobile']) || empty($_POST['email']))
		{
			$_SESSION['errors'][] .= "U heeft een veld niet ingevuld.";
			render("challenge/register");
			exit();
		}

		// if fields are filled, call function
		if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['zipcode']) && isset($_POST['telephone']) && isset($_POST['mobile']) && isset($_POST['email']))
		{
			createCustomer($_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['address'], $_POST['city'], $_POST['zipcode'], $_POST['telephone'], $_POST['mobile'], $_POST['email']);
			header("Location:" . URL . "home/index");
		}
	}
}

function create()
{
	if (isset($_SESSION['logged in']) && $_SESSION['role'] == "employee")
	{
		render("challenge/create");
	}
	else
	{
		$_SESSION['errors'][] .= "U heeft geen toegang tot deze pagina.";
		render("home/index");
	}
	
}

function createSave()
{
	if (!createEmployee($_POST['firstname'], $_POST['lastname'], $_POST['telephone'],  $_POST['mobile'], $_POST['email'], $_POST['password'])) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "home/index");
}

function priceList()
{
	render("challenge/priceList");
}

function makeAppointment()
{
	if (!IsLoggedInSession())
	{
		$_SESSION['errors'][] .= "U moet ingelogd zijn om een afspraak te maken.";
		render("home/index");
		exit();
	}
	else
	{
		render("challenge/makeAppointment", array(
		'employees' => getAllEmployees()
		));
	}
}

function saveAppointment()
{
	if (!IsLoggedInSession())
	{
		$_SESSION['errors'][] .= "U moet ingelogd zijn om een afspraak te maken.";
		render("home/index");
		exit();
	}
	else 
	{
		if (empty($_POST['_date']) || empty($_POST['_time']) || empty($_POST['employee_id']))
		{
			$_SESSION['errors'][] .= "U heeft niet alle velden ingevuld.";
			header("Location:" . URL . "challenge/makeAppointment");
			exit();
		}
		// if fields are filled, call function
		elseif(isset($_POST['_date']) && isset($_POST['_time']) && isset($_POST['employee_id']))
		{
			if(checkIfAppointmentExists($_POST['_date'], $_POST['_time'], $_POST['employee_id']) == false)
			{
				createAppointment($_POST['_date'], $_POST['_time'], $_POST['employee_id']);
				$_SESSION['info'][] .= "U heeft gereserveerd voor een afspraak.";
				header("Location:" . URL . "home/index");
			}
			else
			{
				$_SESSION['errors'][] .= "Deze tijd en datum zijn al bezet voor deze kapster.";
				header("Location:" . URL . "challenge/makeAppointment");
			}
		}
	}
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