<?php
require('../fpdf186/fpdf.php');
include('../config/database.php');

class PDF extends FPDF
{
  function Header()
  {
    $this->SetFont('Arial', 'B', 16);
    $this->Cell(0, 10, 'Course Details', 0, 1, 'C');
  }

  function ChapterTitle($title)
  {
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0, 10, $title, 0, 1, 'L');
  }

  function ChapterBody($body)
  {
    $this->SetFont('Arial', '', 12);
    $this->MultiCell(0, 10, $body);
  }

  function ChapterList($list)
  {
    $this->SetFont('Arial', '', 12);
    $this->Ln(5);
    $this->Cell(0, 10, $list, 0, 1);
  }
}

if (!isset($_GET['CourseID'])) {
  header("Location: ../index.php");
  exit();
}

$CourseID = $_GET['CourseID'];
$title = "Course " . $CourseID;

// Create database connection
$obj = new DbConnect();
$conn = $obj->conn;

$sql = "SELECT * FROM course_details_view WHERE Course_ID = ?";
if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("s", $CourseID);

  if ($stmt->execute()) {
    $result = $stmt->get_result();
    $courses = $result->fetch_all(MYSQLI_ASSOC);
  }
}

if (!empty($courses)) {
  $row = $courses[0];

  // Create PDF
  $pdf = new PDF();
  $pdf->AddPage();

  // Course Title
  $pdf->ChapterTitle($row['Course_ID'] . ': ' . $row['Course_name']);

  // Course Credits and Teaching Mode
  $pdf->ChapterBody('Credit: ' . $row['Credit'] . ' (' . $row['TeachingMode'] . ')');

  // Course Outcomes
  $pdf->ChapterTitle('Course Outcomes');
  $pdf->ChapterList('At the completion of this course, the students should be able to do the following:');
  for ($i = 1; $i <= 5; $i++) {
    $coKey = 'CO' . $i;
    if (isset($row[$coKey])) {
      $pdf->ChapterBody('  - ' . $row[$coKey]);
    }
  }

  // Abstract
  $pdf->ChapterTitle('Abstract');
  $pdf->ChapterBody((isset($row['Syllabus_Objective']) ? $row['Syllabus_Objective'] : 'No abstract available'));

  // Course Contents
  $pdf->ChapterTitle('Course Contents');
  for ($i = 1; $i <= 5; $i++) {
    $unitKey = 'unit_' . $i;
    if (isset($row[$unitKey])) {
      $contents = explode(';', $row[$unitKey]);
      foreach ($contents as $content) {
        $pdf->ChapterBody('  - ' . trim($content));
      }
    }
  }

  // Text Books
  $pdf->ChapterTitle('Text Books');
  for ($i = 1; $i <= 2; $i++) {
    $bookKey = 'Book' . $i;
    if (isset($row[$bookKey])) {
      $pdf->ChapterBody('  - ' . $row[$bookKey]);
    }
  }

  // Course Reference Books
  $pdf->ChapterTitle('Reference Books');
  for ($i = 3; $i <= 6; $i++) {
    $bookKey = 'Book' . $i;
    if (isset($row[$bookKey])) {
      $pdf->ChapterBody('  - ' . $row[$bookKey]);
    }
  }

  // Approved By and Approved Date as Watermark
  $pdf->SetTextColor(200, 200, 200); // Set color to light gray with reduced opacity (alpha)
  $pdf->SetFont('Arial', 'I', 12); // Set font to italic

  // $pdf->ChapterTitle('Approval Information');
  $pdf->ChapterBody('Approved By: ' . ($row['Approved_by'] ?? 'N/A'));
  $pdf->ChapterBody('Approved Date: ' . ($row['Approved_date'] ?? 'N/A'));

  // Reset color and font
  $pdf->SetTextColor(0, 0, 0); // Reset color to black
  $pdf->SetFont('Arial', '', 12); // Reset font to normal

  // Output PDF
  $pdf->Output($row['Course_name'], 'I');
} else {
  echo 'No data found.';
}

// Close the database connection
$obj->closeConnection();
?>