<?php

// including connect file
include('./includes/connect.php');


function getdevices(){

    global $con;

    //condition to check isset or not

    if(!isset($_GET['category'])){

    $select_query="Select * from `devices` order by rand() LIMIT 0,9"; //0 to 9 is limit of products on one page
    $result_query=mysqli_query($con,$select_query);
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){

      $device_id=$row['device_id'];
      $device_title=$row['device_title'];
      $device_description=$row['device_description'];
      // $product_keywords=$row['product_keywords'];
      $category_id=$row['category_id'];
      $device_image=$row['device_image'];
      $device_price=$row['device_price'];

      echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                        <img src='./administration/device_images/$device_image' class='card-img-top' alt='$device_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$device_title</h5>
                        <p class='card-text'>$device_description</p>
                        <p class='card-text'>Price: $$device_price</p>
                        <a href='index.php?add_to_cart=$device_id' class='btn btn-info' style='color: white; background-color: #007bff; padding: 5px 10px; text-decoration: none;'>Add to cart</a>
                        
                        <a href='product_details.php?product_id=$device_id' class='btn btn-secondary'>View</a>
                        </div>
        </div>
      </div>";
     
      
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

}
