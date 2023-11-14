<?php

include('../includes/connect.php');
if(isset($_POST['insert_device'])){

    $product_title=$_POST['device_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['device_keywords'];
    $product_category=$_POST['device_category'];
    $product_price=$_POST['device_price'];
    $product_status='true';

    //accessing image
    $product_image=$_FILES['device_image']['name'];

    //accessing image temp name
    $tmp_image=$_FILES['device_image']['tmp_name'];

    //checking if it is empty
    if($device_title=='' or $description=='' or $device_keywords=='' or $device_category=='' or $device_price=='' or $device_image==''){

        echo"<script>alert('Please fill all the available fields!')</script>";
        exit();

    }else{
            move_uploaded_file($tmp_image,"./product_images/$device_image");

            //insert products
            $insert_devices="insert into `products` (product_title,product_description,product_keywords,category_id,product_image,product_price,date,status) values ('$product_title','$description','$product_keywords','$product_category','$product_image','$product_price',NOW(),'$product_status')";

            $result_query=mysqli_query($con,$insert_devices);
            if($result_query){

                echo "<script>alert('Successfully inserted the products')</script>";

        }

    }

    


}
}
?>