<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">

    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">
    
    <style>
    .my-button {
        background-color: #007bff;
        margin-right: 15px;
        margin-bottom: 15px;
        border: none;
        padding: 5px;
        border-radius: 5px;
        display: inline-block;
        text-align: center;
    }

    .my-button a {
        text-decoration: none;
        color: white;
    }
    </style>
</head>
<body>
    <!-- navbar -->
<div class="container-fluid p-0">
    <!-- First child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">

            <img src="../images/admin-logo" alt="" class="logo">

            <nav class="navbar navbar-expand-lg">
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link" style="color: black;">
                            <B><h5>Welcome!, <?php echo $_SESSION['admin_username']; ?></h5></B>
                        </a>
                    </li>
                </ul>

            </nav>

        </div>
    </nav>
</div>
<div class="bg-light">
        <h3 class="text-center p-2" style="color: black; padding: 5px; font-size: 36px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">Manage Details</h3>
    </div>

    <!-- Third Child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-5"> 
                <a href="#"><img src="../images/admin-logo.jpg" alt="" class="admin_image"></a>
                <p class="text-light text-center">Admin SAP</p>
            </div>

            <div class="button text-center">
            
                <button class="my-button" ><a href="insert_product.php" class="nav-link">Insert Products</a></button>

                <button class="my-button"><a href="index.php?insert_category" class="nav-link">Insert Categories</a></button>

                <button class="my-button"><a href="view_categories.php" class="nav-link">View Categories</a></button>

                <button class="my-button"><a href="" class="nav-link">All Orders</a></button>

                <button class="my-button"><a href="logout_admin.php" class="nav-link">Logout</a></button> 
            </div>
        </div>
    </div>
    
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
             include('insert_categories.php');
        }
        ?>
     </div>
 <!---footer-->
    <div class="bg-info p-3 text-right bg-secondary">
    <p>© PY-Electronics</p>
    </div>

</div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" rel="stylesheet"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

</body>
</html>