<?php

include(__DIR__ . '/../includes/connect.php');

if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //accessing image
    $product_image=$_FILES['product_image']['name'];

    //accessing image temp name
    $tmp_image=$_FILES['product_image']['tmp_name'];

    //checking if it is empty
    if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_price=='' or $product_image==''){

        echo"<script>alert('Please fill all the available fields!')</script>";
        exit();

    }else{
            move_uploaded_file($tmp_image,"./product_images/$product_image");

            //insert products
            $insert_products="insert into `products` (product_title,product_description,product_keywords,category_id,product_image,product_price,date,status) values ('$product_title','$description','$product_keywords','$product_category','$product_image','$product_price',NOW(),'$product_status')";

            $result_query=mysqli_query($con,$insert_products);
            if($result_query){

                echo "<script>alert('Successfully inserted the products')</script>";

        }

    }

    


}

?>