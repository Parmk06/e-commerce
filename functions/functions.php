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
                      <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
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
    // $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $product_image=$row['product_image'];
    $product_price=$row['product_price'];

    echo "<div class='col-md-4 mb-2'>
          <div class='card'>
                      <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                      <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$description</p>
                      <p class='card-text'>Price: $$product_price</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info' style='color: white; background-color: #007bff; padding: 5px 10px; text-decoration: none;'>Add to cart</a>
                      
                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View</a>
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

?>