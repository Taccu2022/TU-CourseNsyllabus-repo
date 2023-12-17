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

$query = "SELECT * FROM course WHERE Course_ID = ?";
if ($stmt = $conn->prepare($query)) {
  $stmt->bind_param("s", $CourseID);

  if ($stmt->execute()) {
    $result = $stmt->get_result();
    $courses = $result->fetch_all(MYSQLI_ASSOC);
    // var_dump($courses);
  }
}
if (!empty($courses)) {
  ?>
  <!-- Main content here -->
  <div class="container mt-5">
    <h2>
      <?= $title ?>
    </h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Course ID</th>
          <th>Course Name</th>
          <th>Credit</th>
          <th>Lecture</th>
          <th>Tutorial</th>
          <th>Practical</th>
          <th>Syllabus</th>
          <th>Department</th>
          <th>Course Type</th>
          <th>Course Start</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($courses as $course): ?>
          <tr>
            <td>
              <?= $course['Course_ID'] ?>
            </td>
            <td>
              <?= $course['Course_name'] ?>
            </td>
            <td>
              <?= $course['Credit'] ?>
            </td>
            <td>
              <?= $course['Lecture'] ?>
            </td>
            <td>
              <?= $course['Tutorial'] ?>
            </td>
            <td>
              <?= $course['Practical'] ?>
            </td>
            <td>
              <?= $course['Syllabus'] ?>
            </td>
            <td>
              <?= $course['Department'] ?>
            </td>
            <td>
              <?= $course['Course_type'] ?>
            </td>
            <td>
              <?= $course['course_start'] ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="container mt-5 ">
    <h1>CO215: Computer Organization Lab</h1>
    <p><strong>Credit:</strong> 1 (0L-0T-1P)</p>
    <p><strong>Prerequisites:</strong> CO103, CO104</p>

    <h2>Course Outcomes:</h2>
    <ul>
      <li>CO1. Get a better understanding of constructing processor functional modules from digital devices.</li>
      <li>CO2. Get hands-on experience of writing and executing programs in Machine Level and Assembly Level programming.
      </li>
      <li>CO3. A good understanding of the issues of writing computer programs at machine level and Assembly level.</li>
      <li>CO4. Better understanding of design options and trade-offs.</li>
      <li>CO5. Ability to develop digital systems.</li>
    </ul>

    <h2>Abstract:</h2>
    <p>This course is comprised of a laboratory component that is to be covered in parallel to Computer Architecture and
      Organization (CO212). The course is aimed at providing a practical understanding of building the functional units
      and their integration and for appreciation of the issues on programming at the machine level.</p>

    <h2>Course Contents:</h2>
    <ul>
      <li>Circuit Design and Simulation: Register, Counter, Adder, Multiplier, Data Paths, Control Unit, ALU etc.</li>
      <li>Introduction to 8086 family microprocessors, Architecture of 8086 – Register set, Concept of segments, use of
        the register set, use of stack, Instruction set, PSW Flags.</li>
      <li>8086 assembly language programming: Software interrupts, Data Input/Output, Arithmetic Operations, String
        Handling, Branching, Looping, showing conditional and unconditional branches, and LOOP instruction, Creating
        Subroutines.</li>
    </ul>

    <h2>List of Laboratory Assignments:</h2>
    <h3>Set 1: Designing CPU components using a Simulator:</h3>
    <ul>
      <li>Register, Counter</li>
      <li>Adder, Multiplier</li>
      <li>Data Paths, Control Unit</li>
      <li>ALU, Memory unit</li>
    </ul>

    <h3>Set 2: 8086 Assembly Language Programming:</h3>
    <ul>
      <li>Taking keyboard input for characters and numbers, Displaying and working with multi-digit number, Arithmetic
        operations</li>
      <li>Comparison operators, conditional and unconditional jumps, loops</li>
      <li>Working with an array of numbers and strings of characters, finding average/mean of numbers, searching</li>
      <li>Writing Procedures, passing and returning values, use of stack</li>
    </ul>

    <h2>Text Books:</h2>
    <ol>
      <li>Computer System Architecture, Mano M. M, Pearson.</li>
      <li>Guide to Assembly Language Programming in Linux, Sivarama Dandamudi, Springer</li>
    </ol>

    <h2>Reference Books:</h2>
    <ol>
      <li>IBM PC Assembly Language and Programming, Peter Abel, 3e, PHI.</li>
      <li>Computer Organization and Design: The Hardware/Software Interface, Patterson and Hennessy, Elsevier.</li>
      <li>Computer Organization and Architecture: Designing for Performance 9E, William Stallings, Pearson Education.</li>
      <li>Computer Organization, Hamacher, Zaky, Vranesic, McGrawHill.</li>
    </ol>

  </div>

  <?php
} else {
  echo '<p>No course found for the given Course ID.</p>';
}
$obj->closeConnection();
include_once($rootdr . 'assets/footer.php');
?>