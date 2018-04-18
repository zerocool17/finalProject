<?php

// Create and include a configuration file with the database connection
include('/includes/config.php');

// Include functions for application
include('/includes/functions.php');

// Get type of form either add or edit from the URL (ex. form.php?action=add) using the newly written get function
$action = $_GET['action'];

// Get animal id from the url.
$animalID = get('animalid');

// Initially set animal to null.
$animal = null;

// If animal id is not empty, get animal record into $animal variable from the database
//     Set $animal equal to the first animal in $animal
if(!empty($animalID)) {
	$sql = file_get_contents('sql/getAnimal.sql');
	$params = array(
		'animalid' => $animalID
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$animals = $statement->fetchAll(PDO::FETCH_ASSOC);

	$animal = $animals[0];
}

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$animalName = $_POST['animalName'];
	$cost = $_POST['cost'];

	if($action == 'add') {
		// Insert customer
		$sql = file_get_contents('sql/insertAnimal.sql');
		$params = array(
			'name' => $animalName,
			'cost' => $cost
		);

    $statement = $database->prepare($sql);
    $statement->execute($params);

  }
	elseif ($action == 'edit') {
		// Update animal
		$sql = file_get_contents('sql/updateAnimal.sql');
		$params = array(
			'animalid' => $animalID,
			'name' => $animalName,
			'cost' => $cost
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
                <h2>Animal</h2>
                <form action="" method="POST">
                  <div>
										<?php if($action == 'add') : ?>
											<input type="text" class="form-control" name="animalName" placeholder="Animal" /><br
										<?php else : ?>
											<input type="text" class="form-control" name="animalName" value="<?php echo $animal['name'] ?>"/><br>
										<?php endif; ?>
                  </div>
                  <div>
										<?php if($action == 'add') : ?>
											<input type="text" class="form-control" name="cost" placeholder="Cost" /><br>
										<?php else : ?>
											<input type="text" class="form-control" name="cost" value="<?php echo $animal['cost'] ?>"/><br>
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
