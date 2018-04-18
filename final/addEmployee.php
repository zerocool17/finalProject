<?php

// Create and include a configuration file with the database connection
include('/includes/config.php');

// Include functions for application
include('/includes/functions.php');

// Get type of form either add or edit from the URL (ex. form.php?action=add) using the newly written get function
$action = $_GET['action'];

// Dynamically list the available states as options in the drop down.
$states = getStates($database);

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$firstName = $_POST['empFirstName'];
	$lastName = $_POST['empLastName'];
	$address = $_POST['empAddress'];
	$city = $_POST['empCity'];
	$zipCode = $_POST['empZipCode'];
  $state = $_POST['empState'];

	if($action == 'add') {
		// Insert customer
		$sql = file_get_contents('sql/insertEmployee.sql');
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

    <title>Add Pesky Employee</title>

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
                <h2>Add New Employee</h2>
                <form action="" method="POST">
                  <div>
                    <input type="text" class="form-control" name="empFirstName" placeholder="First Name" /><br>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="empLastName" placeholder="Last Name" /><br>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="empAddress" placeholder="Address" /><br>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="empCity" placeholder="City" /><br>
                  </div>
                  <div>
                    <input type="number" class="form-control" name="empZipCode" placeholder="Zip Code" /><br>
                  </div>
                  <div>
                    <select class="form-control" name="empState">
                      <?php foreach ($states as $state) : ?>
                        <option selected value="<?php echo $state['stateid'] ?>"><?php echo $state['state_name'] ?></option>
                      <?php endforeach?>
                    </select>
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
