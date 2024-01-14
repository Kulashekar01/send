<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $rollNo = $_POST['roll_no'];
    $studentName = $_POST['student_name'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $mobileNumber = $_POST['mobile_number'];

    // Validate numerical input
    if (!is_numeric($rollNo) || $rollNo <= 0 || !is_numeric($mobileNumber) || $mobileNumber <= 0) {
        die("Invalid input values");
    }

    // Insert data into the database using backticks for column names
    $sql = "INSERT INTO students (`roll_no`, `student name`, `course`, `year`, `section`, `mobile number`) 
            VALUES ('$rollNo', '$studentName', '$course', '$year', '$section', '$mobileNumber')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
