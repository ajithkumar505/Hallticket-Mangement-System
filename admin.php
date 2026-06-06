<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Structure Admin Input</title>
    <style>
        body {
            background:linear-gradient(
                to right,
                rgb(224, 242, 254),   /* Light Sky Blue */
                rgb(44, 237, 251)    /* Soft Blue */

            );
            font-family: Arial, sans-serif;
            margin: 20px;
           
        }
        h2 pre{

            text-align: center;
            color:hsl(0, 100.00%, 50.00%);
            margin-bottom: 20px;
            text-transform: uppercase;
            font-family: 'Times New Roman', Times, serif;
            font-size: 200%;
            text-decoration: underline hsl(0, 100.00%, 50.00%); 
           
        }
        h2 pre:hover{
            color:rgb(0, 24, 243);
            animation-name: animate-background;
        }
        @keyframes animate-background{
            0%{
                background-color: orange;
            }
            100%{
                background-color: greenyellow;
            }
        }
        .form-container{
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color:rgb(240, 226, 226);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgb(0, 0,0,0.1);
        }
        label{
            color:rgb(255, 0, 0);
            font-size:26px;
            font-weight: bold;
            margin-bottom: 5px;
          text-align: center;
           text-transform: uppercase;
          font-family: 'Times New Roman', Times, serif;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
            border: 2px solid rgb(0, 4, 255);
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;

        }
        input[type="submit"] {
            color:rgb(255, 0, 0);
            padding:20px;
            padding-left:10px;
            background-color:rgb(0, 38, 255);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 30%;
            text-transform: uppercase;
            font-family: 'Times New Roman', Times, serif;
            margin-left: 35%;
        }
        input[type="submit"]:hover {
            background-color:rgb(255, 0, 0);
            text-transform: uppercase;
            font-family: 'Times New Roman', Times, serif;
        }
        .form-container input[type="text"]:focus, .form-container input[type="number"]:focus{
            outline:none;
            border-color:rgb(255, 0, 0);
           
        }
        marquee{
            color:rgb(4, 4, 4);
            
        }
    </style>
</head>
<h2><pre>TUTION-Fees Structure Input</pre></h2>

<!-- Form to input new fee structure -->
    <form action="admin.php"method="post">
    <label for="RegNo">RegNO:</label>
    <input type="text" id="RegNO"name="RegNo" required><br><br>
    <label for="StudentName">StudentName:</label>
    <input type="text" id="StudentName"name="StudentName" required><br><br>

    <label for="feesAmount">feesAmount:</label>
    <input type="number" id="feesAmount"name="feesAmount" required><br><br>

    <label for="BillNo">BillNo:</label>
    <input type="number" id="BillNo"name="BillNo"required><br><br>

    <input type="submit" value="Add Fee">
    </form>
    <?php
// Database configuration
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

// Retrieve form data
$RegNo = $_POST['RegNo'];
$StudentName = $_POST['StudentName'];
$feesAmount = $_POST['feesAmount'];
$BillNo = $_POST['BillNo'];

// Insert data into the database
$sql = "INSERT INTO newdata1 (RegNo,StudentName,feesAmount,BillNo) VALUES ('$RegNo','$StudentName','$feesAmount','$BillNo')";

if ($conn->query($sql) === TRUE) {
    echo 
    '<h1 text-align="center">"New record created successfully"</h1>'
    ;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
</body>
</html>