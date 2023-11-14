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

function get_unique_categories(){

    global $con;

    //condition to check isset or not

    if(isset($_GET['category'])){

        $category_id=$_GET['category'];

    $select_query="Select * from `devices` where category_id=$category_id"; //0 to 9 is limit of products on one page
    $result_query=mysqli_query($con,$select_query);

    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<h2 class = 'text-center text-danger mt-4'> Sorry! No Stock available for this category</h2>";
      echo "<h2 class = 'text-center text-danger'> :-( </h2>";

    }

    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){

      $device_id=$row['device_id'];
      $device_title=$row['device_title'];
      $device_description=$row['product_description'];
      // $product_keywords=$row['product_keywords'];
      $device_id=$row['category_id'];
      $device_image=$row['product_image'];
      $device_price=$row['product_price'];

      echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                        <img src='./admin_area/product_images/$device_image' class='card-img-top' alt='$$device_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$device_title</h5>
                        <p class='card-text'>$device_description</p>
                        <p class='card-text'>Price: $$device_price</p>
                        <a href='index.php?add_to_cart = $device_id' class='btn btn-info'>Add to cart</a>
                        <a href='product_details.php?product_id=$device_id' class='btn btn-secondary'>View more</a>
                        </div>
        </div>
      </div>";
      // We can remove "<a href='#' class='btn btn-secondary'>View more</a>" as we will not have other pictures to view more
      
    }
}

}
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
   getdevices()
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

