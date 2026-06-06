<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ajithkumar";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

$conn->close();

// Connect to the new database
$conn = new mysqli($servername, $username, $password, "ajithkumar");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create hallticket table
$sql = "CREATE TABLE IF NOT EXISTS hallticket (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    roll_number VARCHAR(50) NOT NULL,
    exam_date DATE NOT NULL,
    exam_center VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table hallticket created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Insert dummy data
$sql = "INSERT INTO hallticket (student_name, roll_number, exam_date, exam_center, subject) VALUES 
('John Doe', '123', '2026-06-01', 'Center A', 'Mathematics'),
('Jane Smith', '456', '2026-06-02', 'Center B', 'Physics')
ON DUPLICATE KEY UPDATE student_name=student_name";

if ($conn->query($sql) === TRUE) {
    echo "Dummy data inserted successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

$conn->close();
?>
