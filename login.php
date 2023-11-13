<?php
include('includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    
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