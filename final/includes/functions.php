<?php

function getStates($database) {
	// Dynamically list the available states as options in the drop down.
	$sql = file_get_contents('sql/select_states.sql');

	$statement = $database->prepare($sql);
	$statement->execute();

	$states= $statement->fetchAll(PDO::FETCH_ASSOC);
	return $states;
}

function getCustomers($database) {
	// Dynamically list the available states as options in the drop down.
	$sql = file_get_contents('sql/selectCustomers.sql');

	$statement = $database->prepare($sql);
	$statement->execute();

	$customers = $statement->fetchAll(PDO::FETCH_ASSOC);

	return $customers;
}

function getEmployees($database) {
	// Dynamically list the available states as options in the drop down.
	$sql = file_get_contents('sql/selectEmployees.sql');

	$statement = $database->prepare($sql);
	$statement->execute();

	$employees = $statement->fetchAll(PDO::FETCH_ASSOC);

	return $employees;
}

function searchAnimals($term, $database) {
	// Dynamically list the available states as options in the drop down.
	$sql = file_get_contents('sql/searchAnimals.sql');

	$statement = $database->prepare($sql);
	$statement->execute();

	$animals = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $animals;
}

function searchCustomers($term, $database) {
  $sql = file_get_contents('sql/searchCustomers.sql');
  $params = array (
    'searchTerm' => $term
  );

  //run database query and get the results
  //loop over the results
  $statement = $database->prepare($sql);
  $statement->execute($params);

  $customers = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $customers;

}

function searchEmployees($term, $database) {
  $sql = file_get_contents('sql/searchEmployees.sql');
  $params = array (
    'searchTerm' => $term
  );

  //run database query and get the results
  //loop over the results
  $statement = $database->prepare($sql);
  $statement->execute($params);

  $employees = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $employees;

}

function searchOrders($term, $database) {
  $sql = file_get_contents('sql/searchOrders.sql');
  $params = array (
    'searchTerm' => $term
  );

  //run database query and get the results
  //loop over the results
  $statement = $database->prepare($sql);
  $statement->execute($params);

  $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $orders;

}


/*
- Create a function named get() that:
	- takes a parameter holding a $_GET key as a string
	- if the GET variable isset, return the GET variable
	- else return an empty string
*/
function get($key) {
    if(isset($_GET[$key])) {
        return $_GET[$key];
    }
    else {
        return '';
    }
}


?>
