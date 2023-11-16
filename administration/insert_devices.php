<?php

include('../includes/connect.php');
if(isset($_POST['insert_devices'])){

    $device_title=$_POST['device_title'];
    $device_description=$_POST['device_description'];
    $device_keywords=$_POST['device_keywords'];
    $device_category=$_POST['device_category'];
    $device_price=$_POST['device_price'];
    $device_status='true';

    //accessing image
    $device_image=$_FILES['device_image']['name'];

    //accessing image temp name
    $tmp_image=$_FILES['device_image']['tmp_name'];

    //checking if it is empty
    if($device_title=='' or $device_description=='' or $device_keywords=='' or $device_category=='' or $device_price=='' or $device_image==''){

        echo"<script>alert('Please fill all the available fields!')</script>";
        exit();

    }else{
            move_uploaded_file($tmp_image,"./_images/$device_image");

            //insert products
            $insert_devices="insert into `devices` (device_title,device_description,device_keywords,category_id,device_image,device_price,date,status) values ('$device_title','$description','$device_keywords','$device_category','$device_image','$device_price',NOW(),'$device_status')";

            $result_query=mysqli_query($con,$insert_devices);
            if($result_query){

                echo "<script>alert('Successfully inserted the devices')</script>";

        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Devices - Admin Dashboard</title>

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

</head>

<body class="bg-secondary" >
    <div class="container">

        <h1 class="text-center mt-3" style="color: palevioletred;">Insert Devices</h1>
        <!-- form -->

        <!-- title -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="device_title" class="form-label">Device Title</label>
                <input type="text" name="device_title" id="device_title" class="form-control" placeholder="Enter device title" autocomplete="off" required="required"> 
            </div>
        

        <!-- description -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Device description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter device description" autocomplete="off" required="required"> 
            </div>

        <!-- keywords -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="device_keywords" class="form-label">Device keywords</label>
                <input type="text" name="device_keywords" id="device_keywords" class="form-control" placeholder="Enter device keywords" autocomplete="off" required="required"> 
            </div>

        <!-- categories -->

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="device_category" id="" class="form-select">

                    <option value="">Select a Categories</option>

                    <?php
                    
                    $select_query="Select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];

                        echo "<option value='$category_id'>$category_title</option>";
                    } 

                    ?>

                </select>
            </div>

            <!-- Image -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="device_image" class="form-label">Device Image</label>
                <input type="file" name="device_image" id="device_image" class="form-control" required="required"> 
            </div>

            <!-- price -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="device_price" class="form-label">Device price</label>
                <input type="text" name="device_price" id="device_price" class="form-control" placeholder="Enter device price" autocomplete="off" required="required"> 
            </div>

            <!-- submit -->

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_device" class="btn btn-dark mb-3 px-3" value="Insert Device">
            </div>
        </form>

    </div>
    
</body>
</html>