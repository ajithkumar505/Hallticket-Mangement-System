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
                rgb(40, 255, 130)    /* Soft Blue */

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
      h2 pre ,marquee{
            color:rgb(255, 0, 0);
            
        }
    </style>
</head>
<h2><pre>STUDENT  TNP  LIST  UPLOAD</pre></h2>

<marquee>Admin Enter the student TNP LIST Each subject_code</marquee>
<!-- Form to input new fee structure -->
    <form action=""method="post">
   
    <label for="StudentName">Student Name:</label>
    <input type="text" id="StudentName"name="StudentName" required><br><br>

    <label for="RollNumber">Roll Number:</label>
    <input type="text" id="RollNumber"name="RollNumber" required><br><br>

    <label for="Subjectcode">subject_code:</label>
    <input type="text" id="Subjectcode" name="Subjectcode" required><br><br>

    <!--label for="MIDMark">MID_Mark:</label>
    <input type="number" id="MIDMark"name="MIDMark"required><br><br>
    <label for="ENDMark">END_Mark:</label>
    <input type="text" id="ENDMark"name="ENDMark" required><br><br>

    <label for="EligbleMark">Eligble_Mark:</label>
    <input type="text" id="EligbleMark"name="EligbleMark" required><br--><br>
    
    <label for="TNPLIST">TNP_LIST:</label>
    <input type="text" id="TNPLIST"name="TNPLIST" required><br><br>

    <input type="submit" value="ADD   STUDENT    DATA ">
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

//Retrieve form data

$StudentName = $_POST['StudentName']??'';
$RollNumberr = $_POST['RollNumber']??'';
$Subjectcode = $_POST['Subjectcode']??'';
$MIDMark = $_POST['MIDMark']??'';
$ENDMark = $_POST['ENDMark']??'';
$EligbleMark =$_POST['EligbleMark']??'';
$TNPLIST = $_POST['TNPLIST']??'';

// Insert data into the database
$sql = "INSERT INTO anptnplist (StudentName,RollNumber,Subjectcode,MIDMark,ENDMark,EligbleMark,TNPLIST) VALUES ('$StudentName','$RollNumberr','$Subjectcode','$MIDMark','$ENDMark','$EligbleMark','$TNPLIST')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
</body>
</html>