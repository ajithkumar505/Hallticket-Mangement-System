<?php
// Database connection details
$servername = "localhost";
$username = "root";  // your MySQL username
$password = "";      // your MySQL password
$dbname = "ajithkumar"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$feesAmount= 7;
$RegNo= 8;  // The ID of the person you want to select
$sql = "SELECT * FROM newdata1 WHERE  RegNO='21CSA104'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of the selected person
    while($row = $result->fetch_assoc()) {
        echo "RegNo: " . $row["RegNo"] . "<br>";
        echo "StudentName: " . $row["StudentName"] . "<br>";
        echo "feesAmount: " . $row["feesAmount"] . "<br>";
        echo "BillNo: " . $row["BillNo"] . "<br>";
    
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
