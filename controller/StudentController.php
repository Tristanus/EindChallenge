<?php

require(ROOT . "model/StudentModel.php");

function index()
{
	render("student/index", array(
		'students' => getAllStudents()
	));
}

function create()
{
	render("student/create");
}

function createSave()
{
	if (!createStudent()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "student/index");
}

function edit($id)
{
	render("student/edit", array(
		'student' => getStudent($id)
	));
}

function editSave()
{
	if (!editStudent()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "student/index");
} 

function delete($id)
{
	if (!deleteStudent($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "student/index");
}
