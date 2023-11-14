<?php
include('includes/connect.php');
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
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Invalid email or password. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('User not found. Please register or check your email.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
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
            border: 1px solid #e0e0e0;
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
            color: black;
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
            padding: 12px;
            font-size: 16px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .my-button {
            background-color: #007bff;
            color: #fff;
            padding: 14px;
            font-size: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .my-button:hover {
            background-color: #0056b3;
        }

        .register-link {
            color: #007bff;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        p {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center" style="color: #007bff; padding: 0px; font-size: 28px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">PY-Electronics</h3>
        <h2 class="text-center" style="color: black;">Log In</h2>
        <form action="" method="post" class="mb-2">
            <div class="input-group">
                <label for="email" class="input-group-text" id="basic-addon2"><i class="fa-solid fa-envelope"></i> Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="parminder@gmail.com" aria-label="Email" aria-describedby="basic-addon2">
            </div>
            <div class="input-group">
                <label for="password" class="input-group-text" id="basic-addon3"><i class="fa-solid fa-lock"></i> Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="" aria-label="Password" aria-describedby="basic-addon3">
            </div>
            <button class="my-button" style="font-size: 20px;" name="login">Login</button>
        </form>
        <p style="font-size: 14px;">Don't have an account? <a class="register-link" href="registration.php">Create Account</a></p>
    </div>
</body>
</html>