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
            session_start();
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
