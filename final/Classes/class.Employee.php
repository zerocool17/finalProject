<?php

Class Employee {
	protected $employeeID;
	public $employeeName;
	protected $database;

	function __construct($employeeID, $database) {
		$this->employeeID = $employeeID;
		$this->database = $database;


$sql = file_get_contents('sql/getEmployee.sql');
	$params = array(
		'employee' => $_SESSION["employeeid"]
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$employees = $statement->fetchAll(PDO::FETCH_ASSOC);

	$employee = $employees[0];
	$this->employeeName = $employee['firstname'] . "&nbsp" . $employee['lastname'];


	}

}

	?>
