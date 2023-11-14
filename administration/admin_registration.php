<?php
include('../includes/connect.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check if username already exist
    $checkUsernameQuery = "SELECT * FROM admin_login WHERE username='$username'";
    $checkResult = mysqli_query($con, $checkUsernameQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertAdminQuery = "INSERT INTO admin_login (username, password) VALUES ('$username', '$hashedPassword')";
        $insertResult = mysqli_query($con, $insertAdminQuery);

        if ($insertResult) {
            echo "<script>alert('Admin registration successful. You can now log in.')</script>";
        } else {
            echo "<script>alert('Admin registration failed. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('Username is already in use. Please choose a different username.')</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 90px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h3 {
            color: #007bff;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #333;
            margin-top: 10px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group-label {
            display: flex;
            align-items: center;
            background-color: #007bff;
            color: #fff;
            padding: 8px;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .input-group-label i {
            margin-right: 10px;
        }

        .form-control {
            width: 100%;
            padding: 15px;
                        font-size: 18px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .my-button {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .my-button:hover {
            background-color: #0056b3;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    
</head>
<body>
    <div class="container">
        <h3 class="text-center">Admin Registration</h3>
        <h2 class="text-center">Register as Admin</h2>
        <form action="" method="post" class="mb-2">
            <div class="input-group">
                <label for="username" class="input-group-text"><i class="fa-solid fa-user"></i> Username:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter a username" required>
            </div>
            <div class="input-group">
                <label for="password" class="input-group-text"><i class="fa-solid fa-lock"></i> Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password" required>
            </div>
            <button class="my-button" style="font-size: 20px;" name="register">Register</button>
        </form>
    </div>
</body>
</html>