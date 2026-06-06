<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <style>
        
         body{
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
         .containerbody {
            font-family: Arial, sans-serif;
             background-color:rgb(242, 247, 241);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color:rgb(242, 247, 241);
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
             
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #ff0000;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Admin Login</h2>
        <form action="match.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username"name="username" name="username"required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" name="password"name="password"required>

            <input type="submit" value="Login"value="Login">
           <!--div class="forgot-password"-->
                <!--a href="http://localhost:3000/adminbus.php">Forgot your password?</a-->
            </div>
        </form>
    </div>

</body>
</html>
