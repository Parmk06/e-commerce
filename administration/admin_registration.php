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