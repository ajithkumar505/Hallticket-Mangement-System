<?php
$servername = "localhost";
$username = "root";  // Change if needed
$password = "";      // Change if needed
$dbname = "ajithkumar"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$RollNumber = "";
$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $RollNumber = $_POST['RollNumber'];
    $sql = "SELECT * FROM anptnplist WHERE RollNumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $RollNumber);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ANP AND TNP LIST</title>
    <link rel="stylesheet" href="hall.css"> 
</head>
<body>
    <div class="container">
        <h2>Search Your  TNP LIST</h2>
        <form method="POST">
            <input type="text" name="RollNumber" placeholder="Enter Roll Number" required>
            <button type="submit">Search</button>
        </form>

        <?php if ($result && $result->num_rows > 0) { 
            $row = $result->fetch_assoc(); ?>
            
            <div class="hallticket">
                <h3>Student tNP LIST</h3>
                <table>
                    <tr>
                        <th>Student Name</th>
                        <td><?php echo $row['StudentName']; ?></td>
                    </tr>
                    <tr>
                        <th>Roll Number</th>
                        <td><?php echo $row['RollNumber']; ?></td>
                    </tr>
                    <tr>
                        <th>Subject code</th>
                        <td><?php echo $row['Subjectcode']; ?></td>
                    </tr>
                    <!--tr>
                        <th>MID MARK</th>
                        <td><?php echo $row['MIDMark']; ?></td>
                    </tr>
                    <tr>
                        <th>END MARK </th>
                        <td><?php echo $row['ENDMark']; ?></td>
                    </tr>
                    <tr>
                        <th>ELIGBLE MARK 4.2  </th>
                        <td><?php echo $row['EligbleMark']; ?></td>
                    </tr-->
                    <tr>
                        <th id="cs">TNP LIST  </th>
                        <td id="cd"><?php echo $row['TNPLIST']; ?></td>
                    </tr>
                </table>
                <button onclick="printHallTicket()">Print</button>
            </div>
        <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <p>NOT UPLOAD FOR YOUR MARK LIST</p>
        <?php } ?>
    </div>

    <script>
        function printHallTicket() {
            window.print();
        }
    </script>
</body>
</html>
<?php $conn->close(); ?>




