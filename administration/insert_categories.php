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
    $tmp_image=$_FILES['device_image']['tmp_name']
}
?>