<?php

// Create and include a configuration file with the database connection
include('/includes/config.php');

// Include functions for application
include('/includes/functions.php');

// Get type of form either add or edit from the URL (ex. form.php?action=add) using the newly written get function
$action = $_GET['action'];

// Get customer id from the url.
$customerID = get('customerid');

// Initially set animal to null.
$customer = null;

// If customer id is not empty, get customer record into $customer variable from the database
//     Set $customer equal to the first animal in $animal
if(!empty($customerID)) {
	$sql = file_get_contents('sql/getCustomer.sql');
	$params = array(
		'customerid' => $customerID
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$customers = $statement->fetchAll(PDO::FETCH_ASSOC);

	$customer = $customers[0];
}

// Dynamically list the available states as options in the drop down.
$states = getStates($database);

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
      'stateid' => $state
		);

    $statement = $database->prepare($sql);
    $statement->execute($params);
  }

	elseif ($action == 'edit') {
		// Update customer
		$sql = file_get_contents('sql/updateCustomer.sql');
		$params = array(
			'customerid' => $customerID,
			'firstname' => $firstName,
			'lastname' => $lastName,
			'address' => $address,
			'city' => $city,
      'zipcode' => $zipCode,
      'stateid' => $state
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
                <h2>Customer</h2>
                <form action="" method="POST">
                  <div>
										<?php if($action == 'add') : ?>
											<input type="text" class="form-control" name="firstName" placeholder="First Name" /><br>
										<?php else : ?>
											<input type="text" class="form-control" name="firstName" value="<?php echo $customer['firstname'] ?>"/><br>
										<?php endif; ?>
                  </div>
                  <div>
										<?php if($action == 'add') : ?>
											<input type="text" class="form-control" name="lastName" placeholder="Last Name" /><br>
										<?php else : ?>
											<input type="text" class="form-control" name="lastName" value="<?php echo $customer['lastname'] ?>"/><br>
										<?php endif; ?>
                  </div>
                  <div>
										<?php if($action == 'add') : ?>
                    <input type="text" class="form-control" name="address" placeholder="Address" /><br>
										<?php else : ?>
											<input type="text" class="form-control" name="address" value="<?php echo $customer['address'] ?>"/><br>
										<?php endif; ?>
                  </div>
                  <div>
										<?php if($action == 'add') : ?>
											<input type="text" class="form-control" name="city" placeholder="City" /><br>
										<?php else : ?>
											<input type="text" class="form-control" name="city" value="<?php echo $customer['city'] ?>"/><br>
										<?php endif; ?>
                  </div>
                  <div>
										<?php if($action == 'add') : ?>
											<input type="number" class="form-control" name="zipCode" placeholder="Zip Code" /><br>
										<?php else : ?>
											<input type="text" class="form-control" name="zipCode" value="<?php echo $customer['zipcode'] ?>"/><br>
										<?php endif; ?>
                  </div>
                  <div>
										<?php if($action == 'add') : ?>
											<select class="form-control" name="state">
												<?php foreach ($states as $state) : ?>
													<option selected value="<?php echo $state['stateid'] ?>"><?php echo $state['state_name'] ?></option>
												<?php endforeach?>
											</select>
										<?php else : ?>
											<select class="form-control" name="state">
												<?php foreach ($states as $state) : ?>
													<option selected value="<?php echo $state['stateid'] ?>"><?php echo $state['state_name'] ?></option>
												<?php endforeach?>
											</select>
										<?php endif; ?>
									</div>
                  <br>
                  <div>
                    <input type="submit" class="btn btn-secondary"/>
                  </div>
                </form>
                <br>
                <br>
              <div>
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
