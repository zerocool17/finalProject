<?php

// Create and include a configuration file with the database connection
include('/includes/config.php');

// Include functions for application
include('/includes/functions.php');

// Get type of form either add or edit from the URL (ex. form.php?action=add) using the newly written get function
$action = $_GET['action'];

// Dynamically list the available states as options in the drop down.
$states = getStates($database);

// Dynamically list the available customers as options in the drop down.
$customers = getCustomers($database);

// Dynamically list the available employees as options in the drop down.
$employees = getEmployees($database);

// Dynamically list the available animals as options in the drop down.
$animals = getAnimals($database);

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zipCode = $_POST['zipCode'];
  $state = $_POST['state'];

	if($action == 'add') {
		// Insert customer
		$sql = file_get_contents('sql/insertCustomer.sql');
		$params = array(
			'firstname' => $firstName,
			'lastname' => $lastName,
			'address' => $address,
			'city' => $city,
      'zipcode' => $zipCode,
      'state' => $state
		);

    $statement = $database->prepare($sql);
    $statement->execute($params);

  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Pesky Customer</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('/includes/menu.php'); ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Pesky Critter Removal</h1>
                <div>
                <h2>Add New Order Item</h2>
                <form action="" method="POST">
                  <div>
                    <form method="GET">
                      <div>
												<label>Customer:</label>
                        <select class="form-control" name="customer">
                          <?php foreach ($customers as $customer) : ?>
                            <option selected value="<?php echo $customer['customerid'] ?>"><?php echo $customer['firstname'] . '&nbsp' . $customer['lastname'] ?></option>
                          <?php endforeach?>
                        </select>
												<br>
                      </div>
											<div>
												<label>Employee:</label>
												<select class="form-control" name="employee">
													<?php foreach ($employees as $employee) : ?>
														<option selected value="<?php echo $employee['employeeid'] ?>"><?php echo $employee['firstname'] . '&nbsp' . $employee['lastname'] ?></option>
													<?php endforeach?>
												</select>
												<br>
											</div>
											<div>
												<label>Animal:</label>
												<select class="form-control" name="animal">
													<?php foreach ($animals as $animal) : ?>
														<option selected value="<?php echo $animal['animalid'] ?>"><?php echo $animal['name'] ?></option>
													<?php endforeach?>
												</select>
												<br>
											</div>
											<div>
												<label>Number of Animals Caught:</label>
		                    <input type="text" class="form-control" name="numberCaught" />
		                  </div>
		                  <div>
                    </form>
                  </div>
                  <br>
                  <div>
                    <input type="submit" class="btn btn-secondary"/>
                  </div>
                </form>
              <div>
                <br>
                <br>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
              </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
