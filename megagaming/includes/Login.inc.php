<!-- HENRI LOUW ZDV351JB3 
This file handles all the user login functions -->


<!-- The code below checks for the submit button and if it is clicked
it runs all the login functions found in functions.inc.php -->
<?php
if (isset($_POST["submit"])) {
    
    $username = $_POST["email"]; 
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../Login.php?error=emptyinput");
        exit();
      }

    loginUser($conn, $username, $pwd);
  }

  else {
    header("location: ../Login.php");
    exit();
  }


