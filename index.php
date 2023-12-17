<?php
session_start();
//session_regenerate_id(true);
$_SESSION['LastActiveTime'] = time();

if (!isset($title)) {
  $title = "TU Course Repo Home";
}

define('INCLUDED', true);
include_once("./assets/header.php");
?>
<!-- Main content here 
<div class="main_image p-2">
  <img src="<?= $rootdr ?>assets/images/MainView.png" alt="Main Image" class="center">
</div> -->
<div class="main_image p-2"
  style="background-image: url('<?= $rootdr ?>assets/images/MainView.png'); background-size: cover; background-position: center; height: 550px;">
  <form action="#" method="get" id="searchForm" class="center p-2">
    <div class="form-group row mb-2">
      <div class="col center">
        <label for="Department" class="form-label"><span class="text-danger">*</span>School</label>
        <select id="School" name="School" class="form-select" onchange="getDepartments()">
          <option value="">Select School</option>
          <?php
          $schools = [
            'SOE' => 'School of Engineering',
            'HSS' => 'Humanities & Social Sciences',
            'SOM' => 'Management Sciences',
            'SOS' => 'Science'
          ];

          foreach ($schools as $schoolId => $schoolName) {
            echo "<option value='{$schoolId}'>{$schoolName}</option>";
          }
          ?>
        </select>
      </div>

      <div class="col">
        <label for="Department" class="form-label"><span class="text-danger">*</span>Department</label>
        <select id="Department" name="Department" class="form-select" onchange="getPrograms()">
          <option value="">Select Department</option>
          <!-- Departments will be populated dynamically based on the selected school using JavaScript -->
        </select>
      </div>

      <div class="col">
        <label for="Program" class="form-label">Program</label>
        <select id="Program" name="Program" class="form-select">
          <option value="">Select Program</option>
          <!-- Programs will be populated dynamically based on the selected department using JavaScript -->
        </select>
      </div>
    </div>
  </form>

  <div id="Course" class="p-2"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

  function getDepartments() {
    var schoolId = $("#School").val();

    $.ajax({
      type: "GET",
      url: "./scripts/get_departments.php", // Make sure to create this file to handle AJAX request
      data: { schoolId: schoolId },
      success: function (response) {
        $("#Department").html(response);
      }
    });
  }

  function getPrograms() {
    var departmentId = $("#Department").val();

    $.ajax({
      type: "GET",
      url: "./scripts/get_programs.php", // Create this file to handle AJAX request
      data: { departmentId: departmentId },
      success: function (response) {
        $("#Program").html(response);

        getCourses();
      }
    });
  }

  function getCourses() {
    var departmentId = $("#Department").val();

    $.ajax({
      type: "GET",
      url: "./scripts/get_courses.php", // Create this file to handle AJAX request
      data: { departmentId: departmentId },
      success: function (response) {
        $("#Course").html(response);
      }
    });
  }
</script>

<?php
include_once("./assets/footer.php");
?>