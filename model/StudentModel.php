<?php

function getStudent($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM students WHERE student_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllStudents() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM students";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function editStudent() 
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($gender) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE students SET student_firstname = :firstname, student_lastname = :lastname, student_gender = :gender WHERE student_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':gender' => $gender,
		':id' => $id));

	$db = null;
	
	return true;
}

function deleteStudent($id = null) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM students WHERE student_id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	return true;
}

function createStudent() 
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($gender) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO students(student_firstname, student_lastname, student_gender) VALUES (:firstname, :lastname, :gender)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':gender' => $gender));

	$db = null;
	
	return true;
}
