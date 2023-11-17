<?php
include('../includes/connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users</title>
    <!-- No Bootstrap link -->
</head>

<body>
<div class="center-title">
        <h1>List of Users</h1>
    </div>


    <?php
    $selectUsersQuery = "SELECT * FROM users";
    $result = mysqli_query($con, $selectUsersQuery);

    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1">
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['username'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['registration_date'] . '</td>
                </tr>';
        }

        echo '</table>';
    } else {
        echo 'No users found.';
    }
    ?>
</body>
</html>
