<?php
// Include your database connection script here
include('../config/database.php');
$obj = new DbConnect();
$conn = $obj->conn;

if (isset($_GET['departmentId'])) {
  $departmentId = $_GET['departmentId'];

  $query = "SELECT Course_ID, Course_name FROM course WHERE Department = ?";
  if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("s", $departmentId);

    if ($stmt->execute()) {
      $result = $stmt->get_result();
      $courses = $result->fetch_all(MYSQLI_ASSOC);
      // var_dump($courses);
      $count = 1;
      $table = '<table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Sr</th>
                      <th scope="col">Course ID</th>
                      <th scope="col">Course Name</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">';
      foreach ($courses as $course) {
        $table .= '<tr>
                    <th scope="row">' . $count . '</th>
                    <td><a href="./course/details.php?CourseID=' . $course['Course_ID'] . '">' . $course['Course_ID'] . '</a></td>
                    <td>' . $course['Course_name'] . '</td>
                  </tr>';
        $count++;
      }
      $table . '</tbody> </table>';
      echo $table;
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