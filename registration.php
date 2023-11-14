<?php

include('includes/connect.php');
//adding database queries shortly


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<div class="container">
    <h3 class="text-center" style="color: #007bff; padding: 0px; font-size: 28px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
        PY-Electronics
    </h3>

    <h2 class="text-center" style="color: red;">
        Registration
    </h2>

    <form action="" method="post" class="mb-2">
        <div class="input-group">
            <label for="username" class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-user"></i> Name:
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

        <!-- <div class="my-button"> -->
        <button class="my-button" style="font-size: 20px;" name="register">
            Register Your Account
        </button>
    </form>
</div>


