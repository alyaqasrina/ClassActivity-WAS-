<?php
$host = 'localhost';
$dbname = 'assignment_1';
$username = 'root';
$password = '';

// Create database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Define error messages array
 $errors = [];  


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from form
    $name = $_POST["name"];
    $matricNo = $_POST["matricNo"];
    $email = $_POST["email"];
    $currAdd = $_POST["currAdd"];
    $homeAdd = $_POST["homeAdd"];
    $mobile = $_POST["mobile"];
    $home = $_POST["home"];

    // Regular expression patterns
    $namePattern = '/^[a-zA-Z\s]+$/'; // Only letters and spaces allowed
    $matricPattern = '/^\d{7}$/'; // 7 digits allowed
    $emailPattern = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/'; // Valid email format
    $phonePattern = '/^\d{10}$/'; // 10 digits allowed
    $addressPattern ='/^[A-Za-z0-9\s,.]+(?:\d{5})?.*/'; // Only letters, numbers, spaces, commas, and periods allowed

    // Validate each field
    if (!preg_match($namePattern, $name)) {
        $errors['name'] = "Full Name must contain only letters and spaces.";
    }
    if (!preg_match($matricPattern, $matricNo)) {
        $errors['matricNo'] = "Matric No must be 8 digits long.";
    }
    if (!preg_match($emailPattern, $email)) {
        $errors['email'] = "Invalid email address.";
    }
    if (!preg_match($addressPattern, $homeAdd)) {
        $errors['homeAdd'] = "Home Address must contain only letters and spaces.";
    }
    if (!preg_match($addressPattern, $currAdd)) {
        $errors['currAdd'] = "Current Address must contain only letters and spaces.";
    }
    if (!preg_match($phonePattern, $mobile)) {
        $errors['mobile'] = "Mobile phone number must be 10 digits long.";
    }
    if (!preg_match($phonePattern, $home)) {
        $errors['home'] = "Home phone number must be 10 digits long.";
    }

    $stmt = $conn->prepare("INSERT INTO student (name, matricNo, email, homeAdd, currAdd, mobile, home) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $matricNo, $email, $homeAdd, $currAdd, $mobile, $home);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Form created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No data posted with HTTP POST.";
}

