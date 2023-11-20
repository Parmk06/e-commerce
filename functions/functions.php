<?php
include('./includes/connect.php');


function get_unique_categories(){

  global $con;

  //condition to check isset or not

  if(isset($_GET['category'])){

      $category_id=$_GET['category'];

  $select_query="Select * from `products` where category_id=$category_id"; //0 to 9 is limit of products on one page
  $result_query=mysqli_query($con,$select_query);

  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo "<h2 class = 'text-center text-danger mt-4'> Sorry! No Stock available for this category</h2>";
    echo "<h2 class = 'text-center text-danger'> :-( </h2>";

  }

  // $row=mysqli_fetch_assoc($result_query);
  // echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query)){

    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $description=$row['description'];
    // $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $product_image=$row['product_image'];
    $product_price=$row['product_price'];

    echo "<div class='col-md-4 mb-2'>
          <div class='card'>
                      <img src='./administration/product_images/$product_image' class='card-img-top' alt='$product_title'>
                      <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$description</p>
                      <p class='card-text'>Price: $$product_price</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                      </div>
      </div>
    </div>";
  
    
  }
}

}

//searching function
function search_product() {
  global $con;

  // Check if 'search_data_product' is set in the URL
  if (isset($_GET['search_data_product'])) {
      // Get the search keyword
      $search_data_value = $_GET['search_data_product'];
      
      $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
      $result_query = mysqli_query($con, $search_query);
      $num_of_rows = mysqli_num_rows($result_query);

      if ($num_of_rows == 0) {
          echo "<h2 class='text-center text-danger'>Sorry! No results match your search. No products found!</h2>";
      } else {
          while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $description = $row['description'];
              $category_id = $row['category_id'];
              $product_image = $row['product_image'];
              $product_price = $row['product_price'];

              echo "<div class='col-md-4 mb-2'>
                  <div class='card'>
                      <img src='./administration/product_images/$product_image' class='card-img-top' alt='$product_title'>
                      <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$description</p>
                          <p class='card-text'>Price: $$product_price</p>
                          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                      </div>
                  </div>
              </div>";
          }
      }
  }
}
       

function getproducts(){

  global $con;

  //condition to check isset or not

  if(!isset($_GET['category'])){

  $select_query="Select * from `products` order by rand() LIMIT 0,9"; //0 to 9 is limit of products on one page
  $result_query=mysqli_query($con,$select_query);
  // $row=mysqli_fetch_assoc($result_query);
  // echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query)){

    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $description=$row['description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $product_image=$row['product_image'];
    $product_price=$row['product_price'];

    echo "<div class='col-md-4 mb-2'>
          <div class='card'>
                      <img src='./administration/product_images/$product_image' class='card-img-top' alt='$product_title'>
                      <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$description</p>
                      <p class='card-text'>Price: $$product_price</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info' style='color: white; background-color: #007bff; padding: 5px 10px; text-decoration: none;'>Add to cart</a>
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
   
    while($row_data = mysqli_fetch_assoc($result_categories)){
    
      $category_title = $row_data['category_title'];
      $category_id = $row_data['category_id'];
      // echo $category_title;
      echo " <li class='nav-item'>
      <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
     </li>";
    }

}
//get ip address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
  //whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
  }  
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
  
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and
     product_id='$get_product_id'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows>0){
    echo "<script>alert('This item is already presented in the cart')
    </script>";
    echo"<script>window.open('index.php','_self')</script>";
      }else{
        $insert_query="insert into `cart_details` (product_id,ip_address,
         quantity) values($get_product_id, '$get_ip_add',0)";
         $result_query=mysqli_query($con,$insert_query);
         echo "<script>alert('Item is added to the cart')
         </script>";
         echo"<script>window.open('index.php','_self')</script>";
      }
  }
  }
  //funxtion to get cart items quantity
  function cart_item(){
    if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_add = getIPAddress();
      $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
      }else{
        global $con;
        $get_ip_add = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }
    
  
  
    //function totat cart price
    function total_cart_price(){
      global $con;
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
          $product_values=array_sum($product_price);
          $total_price+=$product_values;
        }
      }
      echo $total_price;
    }
  
  
  
  

?>