<?php

// require('./../config/database.php');
$obj = new DbConnect();
$conn = $obj->conn;

if (isset($_GET["redirect"])) {
  $redirect = urldecode($_GET["redirect"]);
} else {
  $redirect = "index.php";
}

// By default, error messages are empty
$call_login = $set_email = $emailErr = $passErr = '';

extract($_POST);

if (isset($login)) {
  // Input fields are Validated with regular expression
  $validEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";

  // Email Address Validation
  if (empty($email)) {
    $emailErr = "Email is Required";
  } elseif (!preg_match($validEmail, $email)) {
    $emailErr = "Invalid Email Address";
  } else {
    $emailErr = true;
  }
  // Password validation
  if (empty($password)) {
    $passErr = "Password is Required";
  } else {
    $passErr = true;
  }
  // Check all fields are valid or not
  if ($emailErr === true && $passErr === true) {
    // Legal input values
    $email = legal_input($email);
    $password = legal_input($password);
    // Sql Query to insert user data into the database table
    $db = $conn; // Database connection
    $call_login = login($db, $email, $password, $redirect);
  } else {
    $set_email = $email;
  }
}

// Convert illegal input value to legal value format
function legal_input($value)
{
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}

// Function to check valid login data into the database table
function login($db, $email, $password, $redirect)
{
  // Retrieve hashed password from the database
  $query = "SELECT password FROM admins WHERE admin_id = ?";
  if ($stmt = $db->prepare($query)) {
    $stmt->bind_param("s", $email);
    $hashedPassword = "";

    if ($stmt->execute()) {
      $stmt->bind_result($hashedPassword);

      if ($stmt->fetch()) {
        // Verify the password
        if (password_verify($password, $hashedPassword)) {
          session_start();
          $_SESSION['email'] = $email;
          header("location:" . $redirect);
          exit();
        } else {
          return "Invalid password";
        }
      } else {
        return "Admin not found";
      }
    } else {
      return "Error executing statement: " . $stmt->error;
    }

    // $stmt->close();
  } else {
    return "Error preparing statement: " . $db->error;
  }
}
$obj->closeConnection();
?>