<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - View Contact Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="../style.css">
    
</style>
</head>
<body class="bg-light">
    <div class="container">

        <!-- <h1 class="text-center mt-3" style="color: #ff0000;">View Contact Form Data</h1> -->
        <h1 class="text-center mt-3" style="color: #ff0000; font-weight: bold;">Contacted User Information</h1>

        <?php
        $select_query = "SELECT * FROM contact_form_data";
        $result_query = mysqli_query($con, $select_query);
        
        if (mysqli_num_rows($result_query) > 0) {
            echo "<table class='table table-bordered'>";
            echo "<tr>
            <th>Name</th>
            <th>Email</th><th>Message</th><th>Submission Date & Time</th></tr>";
            while ($row = mysqli_fetch_assoc($result_query)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "<td>" . $row['submission_date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No contact form data available.</p>";
        }
        ?>


    </div>
</body>
</html>
