<!-- HENRI LOUW ZDV351JB3 
This file handles all the user register functions -->


<!-- The code below checks for the submit button and if it is clicked
it runs all the register functions found in functions.inc.php -->
<?php

if (isset($_POST["submit"])) {
    
  $name = $_POST["name"]; 
  $email = $_POST["email"]; 
  $phonenum = $_POST["phonenum"]; 
  $pwd = $_POST["pwd"]; 

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputSignup($name, $email, $phonenum, $pwd) !== false) {
    header("location: ../Register.php?error=emptyinput");
    exit();
  }

  if (emailExists($conn, $email) !== false) {
    header("location: ../Register.php?error=emailtaken");
    exit();
  }

  createUser($conn, $name, $email, $phonenum, $pwd);

}

else {
    header("location: ../Login.php");
    exit();
}


