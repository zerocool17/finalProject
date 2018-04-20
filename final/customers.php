<?php

// Create and include a configuration file with the database connection
include('/includes/config.php');

// Include functions for application
include('/includes/functions.php');

if(isset($_GET['search-term'])) {
  $searchTerm = '%' . $_GET['search-term'] . '%';
}
else {
  // set the searchTerm to everything.
  $searchTerm = '%%';
}

$customers = searchCustomers($searchTerm, $database);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pesky Critter Removal</title>

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
                <hr>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                <h2>Search by Customer Last Name</h2>
                <form method="GET">
                  <input type="text" class="form-control" name="search-term" placeholder="Search..." /><br>
                  <input type="submit" class="btn btn-secondary"/>
                  <a href="addCustomer.php?action=add" class="btn btn-secondary">Add Customer</a>
                </form>
                <br>
                <br>

            </div>
            <hr>
            <?php foreach($customers as $customer) : ?>
              <p>Customer ID: <?php echo $customer['customerid']; ?></p>
              <p><?php echo $customer['firstname'] . '&nbsp' . $customer['lastname']; ?></p>
              <p><?php echo $customer['address'] . '&nbsp' . $customer['city'] . '&nbsp' . $customer['state_name'] . '&nbsp' . $customer['zipcode']; ?></p>
              <a href="addCustomer.php?action=edit&customerid=<?php echo $customer['customerid'] ?>" class="btn btn-secondary">Edit Customer</a><br />
              <hr>
            <?php endforeach?>
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
