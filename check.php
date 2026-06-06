<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajithkumar";

// Create connection
$conn =new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT RegNo,StudentName,feesAmount,BillNo FROM newdata1"; // Change "users" to your table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>RegNo</th><th>StudentName</th><th>feesAmount</th><th>BillNo</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["RegNo"] . "</td><td>" . $row["StudentName"] . "</td><td>" . $row["feesAmount"]  .  "</td><td>" . $row["BillNo"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}


//$conn->close();


$conn->close();

// Retrieve form data
//$RegNo = $_POST['RegNo'];
//$StudentName = $_POST['StudentName'];
//$BUSFeesAmount = $_POST['BUSFeesAmount'];
//$BUSBillNo = $_POST['BUSBillNo'];
//$BUSStage = $_POST['BUSStage'];
//username=$_POST['username'];
//$passwor=$_POST['password'];

// Insert data into the database
//$sql = "INSERT INTO logindata(username,password)VAlue('$username','$password')";
//$sql="SELECT * FROM logindata";
//if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
//} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
//}

// Close connection
//$conn->close();
?>