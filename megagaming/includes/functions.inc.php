<!-- HENRI LOUW ZDV351JB3 
This is my php function file that has a bunch of functions for validating Registration and
Login details aswell as communicating with the database -->
<?php

// This function is to make sure none of the Registration fields are empty
function emptyInputSignup($name, $email, $phonenum, $pwd) {
    $result = '';
    if (empty($name) || empty($email) || empty($phonenum) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// This function is to make sure the email is not already in use 
function emailExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Register.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

// This function is used to create the user and insert the information in the respectfull columns 
// in the database table called users
function createUser($conn, $name, $email, $phonenum, $pwd) {
    $sql = "INSERT INTO users (userName, userEmail, userPhone, userPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Register.php?error=stmtfailed");
        exit();
    }
    
    $hasedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phonenum, $hasedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Login.php");
    exit();
}

// This function makes sure none of the fields on Login screen 
// is empty
function emptyInputLogin($email, $pwd) {
    $result = '';
    if (empty($email) || (empty($pwd))) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// This function compares the user input with the database to make sure they enter
// valid information
function loginUser($conn, $username, $pwd) {
  $emailExists = emailExists($conn, $username);

  if ($emailExists === false) {
    header("location: ../Login.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $emailExists["userPwd"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location: ../Login.php?error=wronglogin");
    exit();
  }
  else if ($checkPwd === true) {
    session_start();
    $_SESSION["userid"] = $emailExists["usersId"];
    $_SESSION["useruid"] = $emailExists["userEmail"];
    header("location: ../index.php");
    exit();
  }
}