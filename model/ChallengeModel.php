<?php

function createCustomer($firstname, $lastname, $password, $address, $city, $zipcode, $telephone, $mobile, $email)
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$password = $_POST['password'];
	$hash = md5($password);
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
	$telephone = $_POST['telephone'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$role = "customer";
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO customers(firstname, lastname, password, address, city, zipcode, telephone, mobile, email, role) VALUES (:firstname, :lastname, :password, :address, :city, :zipcode, :telephone, :mobile, :email, :role)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':password' => $hash,
		':address' => $address,
		':city' => $city,
		':zipcode' => $zipcode,
		':telephone' => $telephone,
		':mobile' => $mobile,
		':email' => $email,
		':role' => $role
	));

	$db = null;
	
	return true;
}

function createEmployee($firstname, $lastname, $telephone, $mobile, $email, $password)
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$password = $_POST['password'];
	$hash = md5($password);
	$telephone = $_POST['telephone'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$role = "employee";
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO employees(firstname, lastname, telephone, mobile, email, password, role) VALUES (:firstname, :lastname, :telephone, :mobile, :email, :password, :role)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':password' => $hash,
		':telephone' => $telephone,
		':mobile' => $mobile,
		':email' => $email,
		':role' => $role
	));

	$db = null;
	
	return true;
}

function loginUser($email, $password)
{
	$db = openDatabaseConnection();

	$email = $_POST['email'];
	$password = md5($_POST['password']);

    $result1 = $db->prepare("SELECT * FROM customers WHERE email = '$email' AND  password = '$password'");
    $result1->execute();
 	$row = $result1->fetch(PDO::FETCH_ASSOC);
 	$rowCount = $result1->rowCount();
 	if($rowCount == 0)
 	{
 		$result2 = $db->prepare("SELECT * FROM employees WHERE email = '$email' AND  password = '$password'");
    	$result2->execute();
    	$row = $result2->fetch(PDO::FETCH_ASSOC);
 		$rowCount2 = $result2->rowCount();
 		if($rowCount2 == 1)
 		{
 			$_SESSION['userId'] = $row['id'];
			$_SESSION['logged in'] = true;
			$_SESSION['email'] = $email;
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
			$_SESSION['telephone'] = $row['telephone'];
			$_SESSION['mobile'] = $row['mobile'];
			$_SESSION['role'] = $row['role'];
			$db = null;
			return true;
 		}
 	}
    elseif($rowCount == 1)
	{
		$_SESSION['userId'] = $row['id'];
		$_SESSION['logged in'] = true;
		$_SESSION['email'] = $email;
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['address'] = $row['address'];
		$_SESSION['city'] = $row['city'];
		$_SESSION['zipcode'] = $row['zipcode'];
		$_SESSION['telephone'] = $row['telephone'];
		$_SESSION['mobile'] = $row['mobile'];
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

function createErrorArray()
{
	if (!isset($_SESSION['errors']))
	{
		$_SESSION['errors'] = [];
	}
	else
	{
		return true;
	}
}

function createInfoArray()
{
	if (!isset($_SESSION['info']))
	{
		$_SESSION['info'] = [];
	}
	else
	{
		return true;
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

function getAllEmployees()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM employees";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function createAppointment($_date, $_time, $employee_id)
{
	$_date = $_POST['_date'];
	$_time = $_POST['_time'];
	$employee_id = $_POST['employee_id'];
	$customer_id = $_SESSION['userId'];
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO appointments(_date, _time, employee_id, customer_id) VALUES (:_date, :_time, :employee_id, :customer_id)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':_date' => $_date,
		':_time' => $_time,
		':employee_id' => $employee_id,
		':customer_id' => $customer_id
	));

	$db = null;
	
	return true;
}

function checkIfAppointmentExists($_date, $_time, $employee_id)
{
	$_date = $_POST['_date'];
	$_time = $_POST['_time'];
	$employee_id = $_POST['employee_id'];
	
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM appointments WHERE _date = '$_date' AND _time = '$_time' AND employee_id = '$employee_id'";
	$query = $db->prepare($sql);
	$query->execute(array(
		':_date' => $_date,
		':_time' => $_time,
		':employee_id' => $employee_id,
	));
	$row = $query->fetch(PDO::FETCH_ASSOC);
 	$rowCount = $query->rowCount();

	$db = null;
	
	if($rowCount > 0)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

