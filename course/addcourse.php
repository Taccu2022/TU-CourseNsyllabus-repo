<?php
session_start();

if (!isset($title)) {
  $title = "Add New Course";
}

if (!isset($rootdr)) {
  $rootdr = "./../";
}

define('INCLUDED', true);

// Check if the admin is logged in
if (!isset($_SESSION['email'])) {
  // Get the current URL
  $currentUrl = "$_SERVER[REQUEST_URI]";

  // Redirect to login page with the current URL as a redirect parameter
  header("Location: " . $rootdr . "login.php?redirect=" . urlencode($currentUrl));
  exit();
}


// Include your header
include_once($rootdr . "/assets/header.php");
?>

<!-- Main content here -->

<div class="container mt-2 mb-5">
  <h2>Add New Course</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- Course Information -->
    <div class="form-group row mb-2">
      <div class="col center">
        <label for="courseID" class="form-label">Course ID: <span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="courseID" required placeholder="Enter Course ID">
      </div>
      <div class="col">
        <label for="courseName" class="form-label">Course Name: <span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="courseName" required placeholder="Enter Course Name">
      </div>
      <div class="col">
        <label for="credit" class="form-label">Credit: <span style="color: red;">*</span></label>
        <input type="number" class="form-control" name="credit" required placeholder="Enter Credit">
      </div>
    </div>

    <!-- Teaching Mode -->
    <div class="mb-3">
      <label for="teachingMode" class="form-label">Teaching Mode: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="teachingMode" required placeholder="Enter Teaching Mode">
    </div>

    <!-- Course Outcomes -->
    <div class="form-group row mb-2">
      <div class="col center">
        <label for="co1" class="form-label">CO1: <span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="co1" required placeholder="Enter CO1">

      </div>
      <div class="col">

        <label for="co2" class="form-label">CO2: <span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="co2" required placeholder="Enter CO2">
      </div>
      <div class="col">
        <label for="co3" class="form-label">CO3: <span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="co3" required placeholder="Enter CO3">

      </div>
      <div class="col">
        <label for="co4" class="form-label">CO4: <span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="co4" required placeholder="Enter CO4">

      </div>
    </div>

    <!-- Book Information -->
    <div class="mb-3">
      <label for="bookID" class="form-label">Book ID: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="bookID" required placeholder="Enter Book ID">
    </div>
    <div class="mb-3">
      <label for="book1" class="form-label">Book1: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="book1" required placeholder="Enter Book1">
    </div>
    <div class="mb-3">
      <label for="book2" class="form-label">Book2: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="book2" required placeholder="Enter Book2">
    </div>
    <div class="mb-3">
      <label for="book3" class="form-label">Book3: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="book3" required placeholder="Enter Book3">
    </div>
    <div class="mb-3">
      <label for="book4" class="form-label">Book4: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="book4" required placeholder="Enter Book4">
    </div>

    <!-- Unit Information -->
    <div class="mb-3">
      <label for="unitID" class="form-label">Unit ID: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="unitID" required placeholder="Enter Unit ID">
    </div>
    <div class="mb-3">
      <label for="unit1" class="form-label">Unit1: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="unit1" required placeholder="Enter Unit1">
    </div>
    <div class="mb-3">
      <label for="unit2" class="form-label">Unit2: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="unit2" required placeholder="Enter Unit2">
    </div>
    <div class="mb-3">
      <label for="unit3" class="form-label">Unit3: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="unit3" required placeholder="Enter Unit3">
    </div>
    <div class="mb-3">
      <label for="unit4" class="form-label">Unit4: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="unit4" required placeholder="Enter Unit4">
    </div>
    <div class="mb-3">
      <label for="unit5" class="form-label">Unit5: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="unit5" required placeholder="Enter Unit5">
    </div>

    <!-- Syllabus Information -->
    <div class="mb-3">
      <label for="syllabusID" class="form-label">Syllabus ID: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="syllabusID" required placeholder="Enter Syllabus ID">
    </div>
    <div class="mb-3">
      <label for="unit" class="form-label">Unit: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="unit" required placeholder="Enter Unit">
    </div>
    <div class="mb-3">
      <label for="syllabusObjective" class="form-label">Syllabus Objective: <span style="color: red;">*</span></label>
      <textarea class="form-control" name="syllabusObjective" required
        placeholder="Enter Syllabus Objective"></textarea>
    </div>
    <div class="mb-3">
      <label for="version" class="form-label">Version: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="version" required placeholder="Enter Version">
    </div>
    <div class="mb-3">
      <label for="approvedBy" class="form-label">Approved By: <span style="color: red;">*</span></label>
      <input type="text" class="form-control" name="approvedBy" required placeholder="Enter Approved By">
    </div>
    <div class="mb-3">
      <label for="approvedDate" class="form-label">Approved Date: <span style="color: red;">*</span></label>
      <input type="date" class="form-control" name="approvedDate" required placeholder="Select Approved Date">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>

<?php
// Include your footer
include_once($rootdr . "/assets/footer.php");
?>


<?php

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Extracting form data
  $courseID = $_POST['courseID'];
  $courseName = $_POST['courseName'];
  $credit = $_POST['credit'];
  $teachingMode = $_POST['teachingMode'];
  $co1 = $_POST['co1'];
  $co2 = $_POST['co2'];
  $co3 = $_POST['co3'];
  $co4 = $_POST['co4'];
  $bookID = $_POST['bookID'];
  $book1 = $_POST['book1'];
  $book2 = $_POST['book2'];
  $book3 = $_POST['book3'];
  $book4 = $_POST['book4'];
  $unitID = $_POST['unitID'];
  $unit1 = $_POST['unit1'];
  $unit2 = $_POST['unit2'];
  $unit3 = $_POST['unit3'];
  $unit4 = $_POST['unit4'];
  $unit5 = $_POST['unit5'];
  $syllabusID = $_POST['syllabusID'];
  $unit = $_POST['unit'];
  $syllabusObjective = $_POST['syllabusObjective'];
  $version = $_POST['version'];
  $approvedBy = $_POST['approvedBy'];
  $approvedDate = $_POST['approvedDate'];
  var_dump($_POST);

  // Generate unique COIDs for each course outcome
  $coIDs = ["CO1", "CO2", "CO3", "CO4"];

  foreach ($coIDs as $index => $coID) {
    // Construct COID dynamically by concatenating course ID and outcome number
    $dynamicCOID = $courseID . ($index + 1);  // Add 1 to start outcome numbering from 1

    // Use $dynamicCOID in your SQL query
    $sqlCourseOutcome = "INSERT INTO `course_outcome` (`COID`, `Course`, `$coID`)
                        VALUES ('$dynamicCOID', '$courseID', '$_POST[$coID]')";
    $conn->query($sqlCourseOutcome);
  }

  // Insert data into the respective tables
  $sqlCourse = "INSERT INTO `course` (`Course_ID`, `Course_name`, `Credit`, `Lecture`, `Tutorial`, `Practical`, `Department`, `Course_type`, `course_start`)
                  VALUES ('$courseID', '$courseName', $credit, 3, 0, 1, 'CSE', 'Core', '2000-01-03')";

  $sqlCourseOutcome = "INSERT INTO `course_outcome` (`COID`, `Course`, `CO1`, `CO2`, `CO3`, `CO4`)
                        VALUES ('COO1', '$courseID', '$co1', '$co2', '$co3', '$co4')";

  $sqlBook = "INSERT INTO `book` (`Book_ID`, `Book1`, `Book2`, `Book3`, `Book4`)
                VALUES ('$bookID', '$book1', '$book2', '$book3', '$book4')";

  $sqlUnit = "INSERT INTO `unit` (`Unit_ID`, `unit_1`, `unit_2`, `unit_3`, `unit_4`, `unit_5`)
                VALUES ('$unitID', '$unit1', '$unit2', '$unit3', '$unit4', '$unit5')";

  $sqlSyllabus = "INSERT INTO `syllabus` (`Syllabus_ID`, `Unit`, `Syllabus_Objective`, `Version`, `Approved_by`, `Approved_date`)
                    VALUES ('$syllabusID', '$unitID', '$syllabusObjective', '$version', '$approvedBy', '$approvedDate')";

  // Assuming you have a database connection object $conn
  if (
    $conn->query($sqlCourse) === TRUE &&
    $conn->query($sqlBook) === TRUE &&
    $conn->query($sqlUnit) === TRUE &&
    $conn->query($sqlSyllabus) === TRUE
  ) {
    echo "Data inserted successfully!";
  } else {
    echo "Error: " . $conn->error;
  }
}


?>