<?php

session_start();
include('includes/connect.php');
include('functions/functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PY-Electronics</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!-- CSS Files -->
 <link rel="stylesheet" href="style.css">
    <style>
    
main {
    padding: 20px;
    background-color: #f5f5f5;
}

h2 {
    font-size: 24px;
    color: #333;
}

p {
    font-size: 16px;
    color: #666;
}

ul {
    list-style: none;
    padding: 0;
}

li {
    font-size: 16px;
    color: #666;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    font-size: 16px;
    color: #333;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
    
   
</head>
<body>
    <!-- navbar -->
<div class="container-fluid p-0">
        <!-- fist child -->
        <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <img src="./images/SAP_logo.png" alt="" class="logo">
    
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


      <li class="nav-item">
          <a class="nav-link"  href="index.php" style="color: black;">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="registration.php" style="color: black;">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" style="color: black;">Contact</a>
        </li>
        
       
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data_product">
        <input type="submit" value="Search" class="btn btn-outline-light" style="color: black;" >
      </form>
    </div>
  </div>
</nav>



<!-- Second Child -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

<ul class="navbar-nav me-auto">
  
 <?php
    if (isset($_SESSION['username'])) {
        echo '<li class="nav-item">
                <a class="nav-link" href="#" style="color: white;">Welcome, ' . $_SESSION['username'] .  '</a>
              </li>';
    } else {
        echo '<li class="nav-item">
                <a class="nav-link" href="#" style="color: white;">Welcome guest!</a>
              </li>';
    }
    ?> 


<li class="nav-item">
  <a class="nav-link" href="login.php" style="color: white;">Login</a>
</li>
</ul>

<ul class="navbar-nav ml-auto">
<li class="nav-item">
  <a class="nav-link" href="logout.php" style="color: white;">Log Out</a>
</li>
  </ul>

</nav>




<!-- Third Child -->
<div class="bg-light">
  <!-- <h3 class="text-center">SAP Conscious Clothing</h3> -->
  <!-- <p class="text-center"> Experience the Cultures Through Our Exquisite Attire Collection</p> -->
<h3 class="text-center" style="color: #007bff; padding: 5px; font-size: 36px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">PY-Electronics</h3>

</div>


<!-- Forth Child -->
<main>
        <h2>Contact Information</h2>
        <p>Feel free to reach out to us with any questions or inquiries:</p>
        <ul>
            <li>Email: contact@pyelectronics.com</li>
            <li>Phone: (123) 456-7890</li>
            <li>Address: 123 Electronics Road, Mumbai, Maharashtra, India</li>
        </ul>

        
        <h2>Contact Form</h2>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea><br>
            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $insert_query = "INSERT INTO contact_form_data (name, email, message, submission_date) VALUES (?, ?, ?, NOW())";
    $stmt = mysqli_prepare($con, $insert_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Your message has been successfully submitted. We will get back to you soon.');</script>";
        } else {
            echo "<script>alert('There was an error submitting your message. Please try again.');</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('There was an error preparing the statement. Please try again.');</script>";
    }
}
?>


            <button type="submit" name="submit">Submit</button>

            

        </form>
    </main>





<!-- Last Child -->

<div class="bg-info p-3 text-right bg-warning">
  <p style="color: black;">© PY-Electronics- All Rights Reserved.</p>
</div>
</div>

<!-- bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

</body>
</html>