<?php
session_start();
session_regenerate_id(true);
$_SESSION['LastActiveTime'] = time();

$rootdr = "./../";
if (!isset($_GET['CourseID'])) {
  header("location: " . $rootdr);
}

$CourseID = $_GET['CourseID'];
$title = "Course " . $CourseID;

define('INCLUDED', true);
include_once($rootdr . 'assets/header.php');

include('../config/database.php');
$obj = new DbConnect();
$conn = $obj->conn;

$sql = "SELECT * FROM course_details_view WHERE Course_ID = ?";
if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("s", $CourseID);

  if ($stmt->execute()) {
    $result = $stmt->get_result();
    $courses = $result->fetch_all(MYSQLI_ASSOC);
    // var_dump($courses);
  }
}
if (!empty($courses)) {
  $row = $courses[0];  // Access the first element of the array

  // Export Button
  echo '<div class="mt-3 p-2 d-flex justify-content-end">';
  echo '<a class="btn btn-primary" href="pdf.php?CourseID=' . $row['Course_ID'] . '" target="_blank">Export to PDF</a>';
  echo '</div>';

  // Display the data in the desired format
  echo '<div class="container ">';
  echo '<h1>' . $row['Course_ID'] . ' ' . $row['Course_name'] . '</h1>';
  echo '<p><strong>Credits:</strong> ' . $row['Credit'] . ' (' . $row['TeachingMode'] . ')</p>';

  echo '<h2>Course Outcomes:</h2>';
  echo '<p>At the completion of this course, the students should be able to do the following:</p>';
  echo '<ul>';
  for ($i = 1; $i <= 5; $i++) {
    $coKey = 'CO' . $i;
    if (isset($row[$coKey])) {
      echo '<li>' . $row[$coKey] . '</li>';
    }
  }
  echo '</ul>';

  echo '<h2>Abstract:</h2>';
  echo '<p>' . (isset($row['Syllabus_Objective']) ? $row['Syllabus_Objective'] : 'No abstract available') . '</p>';

  echo '<h2>Course Contents:</h2>';
  echo '<ul>';
  for ($i = 1; $i <= 5; $i++) {
    $unitKey = 'unit_' . $i;
    if (isset($row[$unitKey])) {
      $contents = explode(';', $row[$unitKey]);
      foreach ($contents as $content) {
        echo '<li>' . trim($content) . '</li>';
      }
    }
  }
  echo '</ul>';

  echo '<h2>Text Books:</h2>';
  echo '<ol>';
  for ($i = 1; $i <= 2; $i++) {
    $bookKey = 'Book' . $i;
    if (isset($row[$bookKey])) {
      echo '<li>' . $row[$bookKey] . '</li>';
    }
  }
  echo '</ol>';

  echo '<h2>Reference Books:</h2>';
  echo '<ol>';
  for ($i = 3; $i <= 6; $i++) {
    $bookKey = 'Book' . $i;
    if (isset($row[$bookKey])) {
      echo '<li>' . $row[$bookKey] . '</li>';
    }
  }
  echo '</ol>';
  echo '<div class="mt-3">';
  echo '<p class="watermark"><strong>Approved By:</strong> ' . ($row['Approved_by'] ?? 'N/A') . '</p>';
  echo '<p class="watermark"><strong>Approved Date:</strong> ' . ($row['Approved_date'] ?? 'N/A') . '</p>';
  echo '</div>';

  echo '</div>';
} else {
  echo 'No data found.';
}

$obj->closeConnection();
include_once($rootdr . 'assets/footer.php');
?>