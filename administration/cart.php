<?php

session_start();
include('includes/connect.php');
include('functions/functions.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selectUserQuery = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $selectUserQuery);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {
            session_start(); 
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];

            echo "<script>alert('Login successful. You are now logged in.')</script>";
            echo "<script>window.location.href='cart.php';</script>";
        } else {
            echo "<script>alert('Invalid email or password. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('User not found. Please register or check your email.')</script>";
    }
}
?>