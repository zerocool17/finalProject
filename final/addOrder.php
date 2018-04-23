<?php

// Create and include a configuration file with the database connection
include('/includes/config.php');

// Include functions for application
include('/includes/functions.php');

// Get type of form either add or edit from the URL (ex. form.php?action=add) using the newly written get function
$action = $_GET['action'];

// Get the order id from the url.
$getOrderID = get('orderid');

// Dynamically list the available customers as options in the drop down.
$customers = getCustomers($database);

// Dynamically list the available employees as options in the drop down.
$employees = getEmployees($database);

//Set current date.
$currentDate = date("Y/m/d");

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$customer = $_POST['customerid'];
	$employee = $_POST['employeeid'];
	$startdate = $_POST['startDate'];
	$description = $_POST['description'];
	$setUpPrice = $_POST['setUpPrice'];


	if($action == 'add') {
		// Insert order
		$sql = file_get_contents('sql/insertOrder.sql');
		$params = array(
			'customerid' => $customer,
			'employeeid' => $employee,
			'startdate' => $currentDate,
			'description' => $description,
			'setupprice' => $setUpPrice,
			'totalprice' => $setUpPrice
		);

    $statement = $database->prepare($sql);
    $statement->execute($params);

  }
	// Update order info.
	elseif ($action == 'edit') {

	}

	// Redirect to the orders.php file
	header('location: orders.php');
	die();
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
                <h2>Add New Order</h2>
                <form action="" method="POST">
                  <div>
                      <div>
												<label>Customer:</label>
                        <select class="form-control" name="customerid">
                          <?php foreach ($customers as $customer) : ?>
                            <option selected value="<?php echo $customer['customerid'] ?>"><?php echo $customer['firstname'] . '&nbsp' . $customer['lastname'] ?></option>
                          <?php endforeach ?>
                        </select>
												<br>
                      </div>
											<div>
												<label>Employee:</label>
												<select class="form-control" name="employeeid">
													<?php foreach ($employees as $employee) : ?>
														<option selected value="<?php echo $employee['employeeid'] ?>"><?php echo $employee['firstname'] . '&nbsp' . $employee['lastname'] ?></option>
													<?php endforeach ?>
												</select>
												<br>
											</div>
											<div>
												<label>Date of Work:</label>
												<input type="text" class="form-control" name="startDate" placeholder="<?php echo $currentDate; ?>"/><br>
											</div>
											<div>
												<label>Description:</label>
												<textarea class="form-control" rows = "3" maxlength = "500" name = "description"></textarea>
												<br>
											</div>
											<div>
												<label>Set Up Cost:</label>
												<input type="number" step="any" min="1.00" max="9999.99" name="setUpPrice" class="form-control"/><br>
											</div>
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
