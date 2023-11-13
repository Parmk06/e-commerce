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
            max-width: 500;
            padding: 50px;
            background-color: #FFC0CB; 
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
            margin-bottom: 30px;
        }

        .input-group-text {
            color: black;

            padding-right: 10px;
        }

        .form-control {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 20px;
        }
        .my-button {
            background-color: #007bff;
            margin-right: 15px;
            margin-bottom: 15px;
            border: none;
            padding: 10px;
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
        <h3 class="text-center" style="color: #007bff; padding: 0px; font-size: 28px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">PY-Electronics</h3>
       
        <h2 class="text-center" style="color: black;">Log In</h2>
        <form action="" method="post" class="mb-2">
            <div class="input-group">
                <label for="email" class="input-group-text" id="basic-addon2"><i class="fa-solid fa-envelope"></i> Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="parminder@gmail.com" aria-label="Email" aria-describedby="basic-addon2">
            </div>
            
        </form>
        <p style="font-size: 14px;">Don't have an account? <a class="register-link" href="users_registration.php">Create Account</a></p>
    </div>
</body>
</html>