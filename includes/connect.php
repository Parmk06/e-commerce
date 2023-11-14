<?php

$con=mysqli_connect('localhost','root','','e-commerce');
if(!$con){
   die("Connection failed: " . mysqli_connect_error());
   //die(mysqli_error($con));
}
?> 