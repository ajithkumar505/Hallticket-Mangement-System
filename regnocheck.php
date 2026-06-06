<?php
// Database connection details
$servername = "localhost";
$username = "root";  // your MySQL username
$password = "";      // your MySQL password
$dbname = "ajithkumar"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
if($_SERVER["REQUEST_METHOD"]=="POST"){

$input_RegNo = $_POST['RegNo'];

$sql = "SELECT RegNo,StudentName,FeesAmount,BillNo FROM newdata1 WHERE RegNo=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s" ,$input_RegNo);

$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) //{
    //$user = $result->fetch_assoc();
//}else {
    ///echo "Username not found!";

//}

$feesAmount= 7;
$RegNo= 8;  // The ID of the person you want to select
//$sql = "SELECT * FROM newdata1 WHERE  RegNO=?";

//$result = $conn->query($sql);

// Check if there's a result
if ($result->num_rows > 0) {
    echo'<h1 style="color:green;text-align:520px;">SEM Fees Details</h1>';
    echo'<table border="1" style="color:blue;text-align:center;align:center;border: 4px solid black;">
    <tr>
       <th style="border: 2px solid red;"> <h1>RegNo </h1></th>
        <th style="border: 2px solid red;"> <h1>StudentName </h1></th>
        <th style="border: 2px solid red;"> <h1>FeesAmount </h1></th>
       
        <th style="border: 2px solid red;"> <h1>BillNo </h1></th>
       
    </tr>';

    // Output data of the selected person
    while($row = $result->fetch_assoc()) {
      echo"<tr>
        <td style='padding:10px;'>" . $row["RegNo"] . "</td>;
       <td>" . $row["StudentName"] . "</td>;
          <td>" . $row["FeesAmount"] . "</td>;
         <td>" . $row["BillNo"] . "</td>;
         </tr>";
        //echo "<tr><td>" . $row["RegNo"] . "</td><td>" . $row["StudentName"] . "</td><td>" . $row["feesAmount"]  .  "</td><td>" . $row["BillNo"]."</td></tr>";
        // add other fields as needed
    }
} 
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
if($_SERVER["REQUEST_METHOD"]=="POST"){

$input_RegNo = $_POST['RegNo'];

$sql = "SELECT RegNo,StudentName,BUSFeesAmount,BUSBillNo,BUSStage FROM bus1 WHERE RegNo=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s" ,$input_RegNo);

$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) //{
    //$user = $result->fetch_assoc();
//}else {
    ///echo "Username not found!";

//}

$feesAmount= 7;
$RegNo= 8;  // The ID of the person you want to select
//$sql = "SELECT * FROM newdata1 WHERE  RegNO=?";

//$result = $conn->query($sql);

// Check if there's a result
if ($result->num_rows > 0) {
    
    echo'<table border="1" style="color:#85031A;text-align:center;align:center;border: 3px solid black;">
    <tr >
        <th style="border: 2px solid red;"><h1>RegNo</h1></th>
        <th  style="border: 2px solid red;"><h1>StudentName</h1></th>
        <th  style="border: 2px solid red;"><h1>BUSFeesAmount</h1></th>
        
        <th  style="border: 2px solid red;"><h1>BUSBillNo</h1></th>
        <th  style="border: 2px solid red;"><h1>BUSStage</h1></th>
    </tr>';


    // Output data of the selected person
    while($row = $result->fetch_assoc()) {
        echo'<h1 style="color:#101675;text-align:left;font-size=100;">BUS Fees Details';
        echo"<tr>
        <td>" . $row["RegNo"] . "</td>;
       <td>" . $row["StudentName"] . "</td>;
          <td>" . $row["BUSFeesAmount"] . "</td>;
         
         <td>" . $row["BUSBillNo"] . "</td>;
         <td>" . $row["BUSStage"] . "</td>;
         </tr>";
         //header("location:regno.php");
        //echo "<tr><td>" . $row["RegNo"] . "</td><td>" . $row["StudentName"] . "</td><td>" . $row["feesAmount"]  .  "</td><td>" . $row["BillNo"]."</td></tr>";
        // add other fields as needed
    }
    echo"</table>";
    echo  "<h1 style='color:black;text-align:center;font-size=100;'>SHOW FEES DEATIALS! <a href='http://localhost:3000/hallticket.php'>DOWNLOAD HALL TICKET</a></h1>";
    //header("location:homeweb.php");
    //exit();
} else {
    echo '<table border="1"style="margin:auto;"><tr><th><h1 style="color:red"> please enter the correct regno enter</h1></th></tr></table>';
   
}
}
// Close the connection
$conn->close();
?>



