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