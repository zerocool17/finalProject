

<?php
  $username = 'englandg1';
  $password = 'faj3sWef';

  $database = new PDO('mysql:host=localhost;dbname=db_spring18_englandg1', $username, $password);

  //autoload
  function my_autoloader($class) {
  	include 'Classes/class.' . $class . ".php";
  }

  spl_autoload_register('my_autoloader');

  // Start the session
  session_start();

  $current_url = basename($_SERVER['REQUEST_URI']);


  // if employeeid is not set in the session and current URL not login.php redirect to login page
  if (!isset($_SESSION["customerID"]) && $current_url != 'login.php') {
      header("Location: login.php");
  }

  // Else if session key customerID is set get $customer from the database
  elseif (isset($_SESSION["employeeid"])) {
    $employee1 = new Employee($_SESSION["employeeid"], $database);


  }

 ?>
