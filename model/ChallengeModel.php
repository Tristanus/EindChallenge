<?php

function createUser($firstname, $lastname, $username, $password, $email)
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$username = isset($_POST['username']) ? $_POST['username'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;
	$hash = md5($password);
	$email = isset($_POST['email']) ? $_POST['email'] : null;

	if (isset($_POST['role']))
	{
		$role = $_POST['role'];
	}
	else
	{
		$role = "Student";
	}
	
	$db = openDatabaseConnection();


	$sql = "INSERT INTO users(firstname, lastname, username, password, email, role) VALUES (:firstname, :lastname, :username, :password, :email, :role)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':username' => $username,
		':password' => $hash,
		':email' => $email,
		':role' => $role
	));

	$db = null;
	
	return true;
}

function loginUser($username, $password)
{
	$db = openDatabaseConnection();

	$username = $_POST['username'];
	$password = md5($_POST['password']);

    $result1 = $db->prepare("SELECT * FROM users WHERE username = '$username' AND  password = '$password'");
 	$result1->execute();
 	$row = $result1->fetch(PDO::FETCH_ASSOC);
 	$rowCount = $result1->rowCount();

    if($rowCount == 1 )
	{
		$_SESSION['userId'] = $row['id'];
		$_SESSION['logged in'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['role'] = $row['role'];
		$db = null;
		return true;
	}
	else
	{
		$db = null;
		return false;
	}
}

function IsLoggedInSession()
{
	if (isset($_SESSION['userId'])==false || empty($_SESSION['userId']) ) {
		return 0;
	}
	else
	{
		return 1;
	}
}

function LogOut()
{
	echo "Logged out";
	header("location: ". URL ."home/index");

	unset($_SESSION['userId'], $_SESSION['username']);
	$_SESSION['logged in'] = false;
	$_SESSION = [];
}

function getAllUsers()
{
	$db = openDatabaseConnection();

	$role = "Student";

	$sql = "SELECT * FROM users";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getUser($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM users WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function editUser($id, $firstname, $lastname, $username, $password, $email, $role)
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hash = md5($password);
	$email = $_POST['email'];
	$role = $_POST['role'];
	$id = $_POST['id'];

	$db = openDatabaseConnection();

	$sql = "UPDATE users SET firstname=:firstname, lastname=:lastname, username=:username, password=:password, email=:email, role=:role WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':username' => $username,
		':password' => $hash,
		':email' => $email,
		':role' => $role,
		':id' => $id
		));

	$db = null;
}

function deleteUser($id) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM users WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	return true;
}

function getAllExams()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM exams";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function createNewExam($subject, $_time, $examinator_1, $examinator_2)
{
	$subject = $_POST['subject'];
	$_time = $_POST['_time'];
	$examinator_1 = $_POST['examinator_1'];
	$examinator_2 = $_POST['examinator_2'];
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO exams(subject, _time, examinator_1, examinator_2) VALUES (:subject, :_time, :examinator_1, :examinator_2)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':subject' => $subject,
		':_time' => $_time,
		':examinator_1' => $examinator_1,
		':examinator_2' => $examinator_2
	));

	$db = null;
	
	return true;
}