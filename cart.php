<?php

session_start();
include('includes/connect.php');
include('functions/functions.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selectUserQuery = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $selectUserQuery);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {
            session_start(); 
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];

            echo "<script>alert('Login successful. You are now logged in.')</script>";
            echo "<script>window.location.href='cart.php';</script>";
        } else {
            echo "<script>alert('Invalid email or password. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('User not found. Please register or check your email.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .cart_img {
            width: 100px;
            height: 90px;
            object-fit: contain;
        }   
    </style>

</head>
<body>
    <!-- navbar -->
<div class="container-fluid p-0">
        <!-- fist child -->
        <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <img src="./images/e-commerce-logo.png" alt="" class="logo" >
    
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
        <li class="nav-item">
          <a class="nav-link" href="cart.php" style="color: black;"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
  
      </ul>

    </div>
  </div>
</nav>

<!-- calling cart function-->
<?php
cart();
?>



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

<!--fourth child-table --->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class ="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan= "2">Operations</th>
              </tr>
            </thead>
            <tbody>
<?php
   
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address= '$get_ip_add'";
    $result= mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="Select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $price_table=$row_product_price['product_price'];
        $product_title=$row_product_price['product_title'];
        $product_image=$row_product_price['product_image'];
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    
?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./images/<?php echo $product_image?>" alt="" class= "cart_img" ></td>
                    <!-- <td><input type="text" name="qty" id="" class="form-input w-50"></td> -->
                    <td><input type="text" name="qty[<?php echo $product_id; ?>]" id="" class="form-input w-50" value="1"></td>

<?php
if (isset($_POST['update_cart'])) {
    $get_ip_add = getIPAddress();
    $total_price = 0;

    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
    $result = mysqli_query($con, $cart_query);

    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
        $result_products = mysqli_query($con, $select_products);

        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = $row_product_price['product_price'];
            $product_title = $row_product_price['product_title'];
            $product_image = $row_product_price['product_image'];

            if (isset($_POST['qty'][$product_id])) {
                $quantity = max(0, (int)$_POST['qty'][$product_id]);

                $update_cart = "UPDATE `cart_details` SET quantity = $quantity WHERE ip_address = '$get_ip_add' AND product_id = $product_id";
                $result_products_quantity = mysqli_query($con, $update_cart);

                $product_values = $product_price * $quantity;
            } else {
                $quantity = $row['quantity'];
                $product_values = $product_price * $quantity;
            }

            // total price of products
            $total_price += $product_values;
        }
    }
}
?>


                    <td><?php echo $price_table?></td>
                    <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id?>"></td>
                    <td>
                        <!-- <button class = "bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                        <input type="submit" value="Update Cart" class= "bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                        <!-- <button class ="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                        <input type="submit" value="Remove Cart" class= "bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                </tr>
 <?php    }}?>
            </tbody>
        </table>
        <!----subtotal---->
        <div class="d-flex mb-5">
          <h4 class="px-3">Subtotal: <strong class="" style="color: red;"><?php echo $total_price?><strong></h4>
          <a href="index.php" class="btn btn-info mx-3">Continue Shopping</a>
          <!-- <a href="index.php" class="btn btn-secondary mx-3">Checkout</a> -->

          <a href="<?php echo isset($_SESSION['username']) ? 'checkout.php' : 'login.php'; ?>" class="btn btn-secondary mx-3">
    <?php echo isset($_SESSION['username']) ? 'Checkout' : 'Checkout'; ?>
</a>
        </div>
    </div>
</div>
</form>  
<!---fucntion to remove data--->
 <?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['remove_item'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item= remove_cart_item();


 ?>

<!-- row end -->
    </div>

<!-- col end -->
  </div>

</div>


<div class="bg-warning p-3 text-right">
  <p style="color: black;">© PY- Electronics.</p>
</div>



</div>

<!-- bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

</body>
</html>