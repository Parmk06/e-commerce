<!-- Connect file -->
<?php

session_start(); // session has started
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    echo "<script>alert('You have been successfully logged out.')</script>";
    
}

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
   
</head>
<style>
        .container {
            max-width: 500px; 
            padding: 50px;
            background-color: #FFC0CB;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-control {
            font-size: 18px; 
        }

        .logo{
            width: 100px; 
            height: auto; 
        }
    </style>
    <body>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid">
                <img src="./images/e-commerce-logo.jpg" alt="" class="logo">
                
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
                </div>   
            </div>
        </div>
 
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

    <div class="row px-1">




    <!-- Side Nav -->
    <div class="col-md-2 bg-secondary p-0">
        <ul class="navbar-nav me-auto text-center">  

        <li class="nav-item bg-warning">
        <a href="#" class="nav-link text-dark"><h4>Categories</h4></a>
        </li>

         <?php 
        function getcategories(){

        global $con;

        $select_categories = "Select * from `categories`";

        $result_categories = mysqli_query($con,$select_categories);
        // $row_data = mysqli_fetch_assoc($result_categories);
        // echo $row_data['category_title'];
        // echo $row_data['category_title'];
        
        while($row_data = mysqli_fetch_assoc($result_categories)){
        
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        // echo $category_title;
        echo " <li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>";
        }

    }
    ?>

    </ul>
    </div>

     <!-- Products -->
<div class="col-md-10">
    <div class="row">

<!-- Fetching Products -->
   <?php
   getproducts();
   get_unique_categories();
    ?>

<!-- row end -->
    </div>

<!-- col end -->
  </div>

</div>

    <!----footer----->
        <div class="bg-secondary p-3 text-right bg-secondary">
        <p>© PYElectronics- All Rights Reserved.</p>
        </div>

    </div>



<!-- bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

</body>
</html>

