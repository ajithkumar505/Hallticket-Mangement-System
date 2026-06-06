<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "\n");
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS ajithkumar";
if ($conn->query($sql) === TRUE) {
    echo "Database ajithkumar verified/created successfully.\n";
} else {
    die("Error creating database: " . $conn->error . "\n");
}
$conn->close();

// Reconnect to the database
$conn = new mysqli($servername, $username, $password, "ajithkumar");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "\n");
}

// 1. Create hallticket table
$sql = "CREATE TABLE IF NOT EXISTS hallticket (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    roll_number VARCHAR(50) NOT NULL UNIQUE,
    exam_date DATE NOT NULL,
    exam_center VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'hallticket' ready.\n";
} else {
    echo "Error 'hallticket': " . $conn->error . "\n";
}

// 2. Create access table (student logins)
$sql = "CREATE TABLE IF NOT EXISTS access (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'access' ready.\n";
} else {
    echo "Error 'access': " . $conn->error . "\n";
}

// 3. Create newdata1 table (tuition fees)
$sql = "CREATE TABLE IF NOT EXISTS newdata1 (
    RegNo VARCHAR(50) PRIMARY KEY,
    StudentName VARCHAR(100) NOT NULL,
    feesAmount DECIMAL(10,2) NOT NULL,
    BillNo INT NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'newdata1' ready.\n";
} else {
    echo "Error 'newdata1': " . $conn->error . "\n";
}

// 4. Create bus1 table (bus fees)
$sql = "CREATE TABLE IF NOT EXISTS bus1 (
    RegNo VARCHAR(50) PRIMARY KEY,
    StudentName VARCHAR(100) NOT NULL,
    BUSFeesAmount DECIMAL(10,2) NOT NULL,
    BUSBillNo INT NOT NULL,
    BUSStage VARCHAR(100) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'bus1' ready.\n";
} else {
    echo "Error 'bus1': " . $conn->error . "\n";
}

// 5. Create anptnplist table (placement list)
$sql = "CREATE TABLE IF NOT EXISTS anptnplist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    StudentName VARCHAR(100) NOT NULL,
    RollNumber VARCHAR(50) NOT NULL,
    Subjectcode VARCHAR(50) NOT NULL,
    MIDMark VARCHAR(50) DEFAULT '',
    ENDMark VARCHAR(50) DEFAULT '',
    EligbleMark VARCHAR(50) DEFAULT '',
    TNPLIST VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'anptnplist' ready.\n";
} else {
    echo "Error 'anptnplist': " . $conn->error . "\n";
}

// 6. Create logindata1 table (admin login)
$sql = "CREATE TABLE IF NOT EXISTS logindata1 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'logindata1' ready.\n";
} else {
    echo "Error 'logindata1': " . $conn->error . "\n";
}

// Insert admin credentials if empty
$res = $conn->query("SELECT * FROM logindata1 WHERE username='admin'");
if ($res && $res->num_rows == 0) {
    $conn->query("INSERT INTO logindata1 (username, password) VALUES ('admin', 'admin')");
    echo "Default admin user 'admin'/'admin' inserted.\n";
}

// Insert default student login 'ajith'/'ajith'
$res = $conn->query("SELECT * FROM access WHERE username='ajith'");
if ($res && $res->num_rows == 0) {
    $conn->query("INSERT INTO access (username, password) VALUES ('ajith', 'ajith')");
    echo "Default student user 'ajith'/'ajith' inserted.\n";
}

// Insert dummy student registration number '21CSA104' for fees
$res = $conn->query("SELECT * FROM newdata1 WHERE RegNo='21CSA104'");
if ($res && $res->num_rows == 0) {
    $conn->query("INSERT INTO newdata1 (RegNo, StudentName, feesAmount, BillNo) VALUES ('21CSA104', 'AJITH KUMAR', 15000.00, 1001)");
    echo "Default tuition fees for '21CSA104' inserted.\n";
}

$res = $conn->query("SELECT * FROM bus1 WHERE RegNo='21CSA104'");
if ($res && $res->num_rows == 0) {
    $conn->query("INSERT INTO bus1 (RegNo, StudentName, BUSFeesAmount, BUSBillNo, BUSStage) VALUES ('21CSA104', 'AJITH KUMAR', 5500.00, 2001, 'THANJAVUR')");
    echo "Default bus fees for '21CSA104' inserted.\n";
}

// Insert default hallticket
$res = $conn->query("SELECT * FROM hallticket WHERE roll_number='21CSA104'");
if ($res && $res->num_rows == 0) {
    $conn->query("INSERT INTO hallticket (student_name, roll_number, exam_date, exam_center, subject) VALUES ('AJITH KUMAR', '21CSA104', '2026-06-01', 'AVVM SPC COLLEGE - CENTER A', 'COMPUTER SCIENCE')");
    echo "Default hallticket for '21CSA104' inserted.\n";
}

// Insert default TNP placement record
$res = $conn->query("SELECT * FROM anptnplist WHERE RollNumber='21CSA104'");
if ($res && $res->num_rows == 0) {
    $conn->query("INSERT INTO anptnplist (StudentName, RollNumber, Subjectcode, TNPLIST) VALUES ('AJITH KUMAR', '21CSA104', '21CSA104', 'SELECTED IN TCS OFF-CAMPUS PLACEMENT')");
    echo "Default TNP listing for '21CSA104' inserted.\n";
}

$conn->close();
echo "Database and tables successfully initialized!\n";
?>
