<?php
include('includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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

      
    </style>
    
</head>
<body>
    <div class="container">
        <h3 class="text-center" style="color: #007bff; padding: 0px; font-size: 28px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">SAP Conscious Clothing</h3>
        <p class="text-center" style="font-size: 14px; color: #333; font-family: 'Arial', sans-serif; font-weight: normal;">Experience the Cultures Through Our Exquisite Attire Collection</p>
        <h2 class="text-center" style="color: red;">Log In</h2>
        <form action="" method="post" class="mb-2">
            <div class="input-group">
                <label for="email" class="input-group-text" id="basic-addon2"><i class="fa-solid fa-envelope"></i> Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="patel@icloud.com" aria-label="Email" aria-describedby="basic-addon2">
            </div>
            <div class="input-group">
                <label for="password" class="input-group-text" id="basic-addon3"><i class="fa-solid fa-lock"></i> Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="" aria-label="Password" aria-describedby="basic-addon3">
            </div>
            <button class="my-button" style="font-size: 20px;" name="login">Login</button>
        </form>
        <p style="font-size: 14px;">Don't have an account? <a class="register-link" href="users_registration.php">Create SAP Account</a></p>
    </div>
</body>
</html>