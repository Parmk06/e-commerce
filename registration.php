<?php

include('includes/connect.php');
//adding database queries shortly
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password']; // Changed to match the name attribute in the HTML form
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    if ($password !== $confirmPassword) {
        echo "<script>alert('Your password and confirm password do not match.')</script>";
    } else {
        $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $checkEmailQuery);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email already registered. Please log in.')</script>";
        } else {
            // Modified INSERT query to exclude 'confirm_password'
            $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
            if (mysqli_query($con, $insertQuery)) {
                echo "<script>alert('Your account has been registered successfully. Please log in yourself to continue.')</script>";
                echo "<script>window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Registration failed. Please try again later.')</script>";
            }
        }
    }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<style>
        body {
            background-color: #ff69b4;
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
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
            margin-bottom: 10px;
        }

        h2 {
            color: red;
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
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            
        }

        .my-button {
            background-color: #007bff;
            color: #fff;
            padding: 14px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .my-button:hover {
            background-color: #0056b3;
        }
    </style>
</style>
<body class="bg-secondary">
<div class="container">
    <h3 class="text-center" style="color: black; padding: 0px; font-size: 28px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
        PY-Electronics
    </h3>

    <h2 class="text-center" style="color: red;">
        Registration
    </h2>

    <form action="" method="post" class="mb-2">
        <div class="input-group">
            <label for="username" class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-user"></i> Full Name:
            </label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Parminder" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group">
            <label for="email" class="input-group-text" id="basic-addon2">
                <i class="fa-solid fa-envelope"></i> Email:
            </label>
            <input type="email" class="form-control" name="email" id="email" placeholder="parminder@gmail.com" aria-label="Email" aria-describedby="basic-addon2">
        </div>

        <div class="input-group">
            <label for="password" class="input-group-text" id="basic-addon3">
                <i class="fa-solid fa-lock"></i> Password:
            </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="" aria-label="Password" aria-describedby="basic-addon3">
        </div>
        
        <!-- New Confirm Password input field -->
        <div class="input-group">
            <label for="confirm-password" class="input-group-text" id="basic-addon4">
                <i class="fa-solid fa-lock"></i> Confirm Password:
            </label>
            <input type="password" class="form-control" name="confirm_password" id="confirm-password" placeholder="" aria-label="Confirm Password" aria-describedby="basic-addon4">
        </div>

        <!-- <div class="my-button"> -->
        <button class="my-button" style="font-size: 14px;" name="register">
            Register Your Account
        </button>
    </form>
</div>


