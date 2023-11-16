<?php

session_start();
include('../includes/connect.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $selectAdminQuery = "SELECT * FROM admin_login WHERE username='$username'";
    $result = mysqli_query($con, $selectAdminQuery);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $row['username']; 

            echo "<script>alert('Login successful. You are now logged in as an admin.')</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Invalid username or password. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('Admin not found. Please check your credentials.')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            padding: 50px;
            background-color: #F0dd71;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group-text {
            color: black;
            padding-right: 10px;
        }

        .form-control {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
        }

        .my-button {
            background-color: #007bff;
            margin-right: 15px;
            margin-bottom: 15px;
            border: none;
            padding: 8px;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
        }

        .my-button a {
            text-decoration: none;
            color: white;
        }

        .register-link {
            font-size: 14px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center" style="color: #007bff; padding: 0px; font-size: 28px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">SAP Admin Login</h3>
        <h2 class="text-center" style="color: red;">Log In</h2>
        <form action="" method="post" class="mb-2">
            <div class="input-group">
                <label for="username" class="input-group-text" id="basic-addon2"><i class="fa-solid fa-user"></i> Username:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="parmKaur" aria-label="Username" aria-describedby="basic-addon2">
            </div>
            <div class="input-group">
                <label for="password" class="input-group-text" id="basic-addon3"><i class="fa-solid fa-lock"></i> Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="" aria-label="Password" aria-describedby="basic-addon3">
            </div>
            <button class="my-button" style="font-size: 20px;" name="login">Login</button>
        </form>
    </div>
</body>
</html>
