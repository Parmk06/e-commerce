<!-- Connect file -->
<?php

include('includes/connect.php');
include('functions/common_function.php');

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


    <!-- CSS Files -->
    <link rel="stylesheet" href="style.css">
    <style>
      /* Write the codes over here in case it does not work at Style.css as of catches */
    </style>

</head>
<body>
    <!-- navbar -->
<div class="container-fluid p-0">
        <!-- fist child -->
        <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <img src="./images/e-commerce-logo" alt="" class="logo">
    
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <li class="nav-item">
          <a class="nav-link"  href="index.php" style="color: black;">Home</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="users_registration.php" style="color: black;">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" style="color: black;">Contact</a>
        </li>
      
      </ul>
      
      <form class="d-flex" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" >
      </form>
    </div>
  </div>
</nav>




<!-- Second Child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

<ul class="navbar-nav me-auto">

<li class="nav-item">
  <a class="nav-link" href="#">Welcome guest!</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#">Login</a>
</li>
</ul>
</nav>


<!-- Forth Child -->

<div class="row px-1">


    <!-- Side Nav -->
<div class="col-md-2 bg-secondary p-0">
     <ul class="navbar-nav me-auto text-center">  

     <li class="nav-item bg-warning">
      <a href="#" class="nav-link text-dark"><h4>Categories</h4></a>
     </li> 

<?php

     getcategories();

?>

     </ul>
</div>


    <!-- Products -->
<div class="col-md-10">
    <div class="row">

<!-- Fetching Products -->

    <?php

    // Calling functins    
    get_unique_categories();
    search_product();

    ?>
<!-- row end -->
    </div>

<!-- col end -->
  </div>




</div>


<!-- Last Child -->
<!-- LIKE EDEMAMMA -->

<div class="bg-info p-3 text-right">
  <p>© PY-Electronics</p>
</div>



</div>

<!-- bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

</body>
</html>