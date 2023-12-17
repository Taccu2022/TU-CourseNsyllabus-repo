<?php
// Include your database connection script here
include('../config/database.php');
$obj = new DbConnect();
$conn = $obj->conn;

if (isset($_GET['departmentId'])) {
  $departmentId = $_GET['departmentId'];

  $query = "SELECT Program_ID, Program_Name FROM program WHERE Department = ?";
  if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("s", $departmentId);

    if ($stmt->execute()) {
      $result = $stmt->get_result();
      $programs = $result->fetch_all(MYSQLI_ASSOC);
      echo "<option value=''>Select Program</option>";
      foreach ($programs as $program) {
        echo "<option value='{$program['Program_ID']}'>{$program['Program_Name']}</option>";
      }
    } else {
      // Handle the error
      echo "Error executing query: " . $stmt->error;
    }
  } else {
    // Handle the error
    echo "Error preparing statement: " . $conn->error;
  }
}

$obj->closeConnection();
?>