<?php
$servername = "localhost";
$username = "root";  // Change if needed
$password = "";      // Change if needed
$dbname = "ajithkumar"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$roll_number = "";
$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_number = $_POST['roll_number'];
    $sql = "SELECT * FROM hallticket WHERE roll_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $roll_number);
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
    <title>Student Hall Ticket</title>
    <link rel="stylesheet" href="hall.css"> 
</head>
<body>
    <div class="container">
        <h2>Search Your Hall Ticket</h2>
        <form method="POST">
            <input type="text" name="roll_number" placeholder="Enter Roll Number" required>
            <button type="submit">Search</button>
        </form>

        <?php if ($result && $result->num_rows > 0) { 
            $row = $result->fetch_assoc(); ?>
            
            <div class="hallticket">
                <h3>Student Hall Ticket</h3>
                <table>
                    <tr>
                        <th>Student Name</th>
                        <td><?php echo $row['student_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Roll Number</th>
                        <td><?php echo $row['roll_number']; ?></td>
                    </tr>
                    <tr>
                        <th>Exam Date</th>
                        <td><?php echo $row['exam_date']; ?></td>
                    </tr>
                    <tr>
                        <th>Exam Center</th>
                        <td><?php echo $row['exam_center']; ?></td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td><?php echo $row['subject']; ?></td>
                    </tr>
                </table>
                <button onclick="printHallTicket()">Print</button>
            </div>
        <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <p>No hall ticket found!</p>
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




