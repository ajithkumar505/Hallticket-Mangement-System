
<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "ajithkumar"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password']; // Encrypt password

// Insert user into the database
$sql = "INSERT INTO access (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    header("location:userlogin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
  
 