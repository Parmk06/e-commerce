<?php
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Categories</title>
</head>
<style>
     body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 10;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

         h1 {
            color: #ff0000;
            text-align: center;
        } 

         table {
            width: 50%;
            border-collapse: collapse;
            margin: 0 auto; 
            background-color: #fff;
            
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        p {
            text-align: center;
            font-weight: bold;
        }

        .container {
            margin-top: 20px;
            margin-bottom: 20px;
        } 
</style>
<body>
<div class="center-title">
        <h1>List of Categories</h1>
    </div>

    <?php
    $selectCategoriesQuery = "SELECT * FROM categories";
    $result = mysqli_query($con, $selectCategoriesQuery);

    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1">
                <tr>
                    <th>Category Id</th>
                    <th>Category Title</th>

                </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['category_id'] . '</td>
                    <td>' . $row['category_title'] . '</td>

                </tr>';
        }

        echo '</table>';
    } else {
        echo 'No categories found.';
    }
    ?>
</body>
</html>