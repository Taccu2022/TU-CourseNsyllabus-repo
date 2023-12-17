<?php
$servername = "localhost";
$username = "root";
$pass = "";
$database = "courserepo";

$conn = new mysqli($servername, $username, $pass, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate a random password for the admin
// $password = bin2hex(random_bytes(8));
$password = '@Admin2022';

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Admin email
$adminID = 'admin1234@test.com';

$query = "INSERT INTO admins (admin_id, password) VALUES (?, ?)";

if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("ss", $adminID, $hashedPassword);

    if ($stmt->execute()) {
        echo "Admin created successfully.<br>";
        echo "Admin ID: " . $adminID . "<br>";
        echo "Password: " . $password . "<br>";
        echo "Hashed Password: " . $hashedPassword;
    } else {
        echo "Error creating admin: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$conn->close();
?>

<?php 
    // echo htmlspecialchars(str_replace("dashboard.php", "form/scripts/addmember.php", $_SERVER['PHP_SELF']))
    // Convert illegal input value to legal value format
    // function legal_input($value)
    // {
    //   $value = trim($value);
    //   $value = stripslashes($value);
    //   $value = htmlspecialchars($value);
    //   return $value;
    // }
?>
