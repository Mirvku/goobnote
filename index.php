<?php
include("./lib/connection.php");

$result = mysqli_query($conn,"select * from users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoobNote</title>
</head>
<body>
    <h1>Hey... this is an example... huhahahahahahaha</h1>
    <table width="40%" border="1">
        <thead>
           <tr>
            <th>Email</th>
            <th>Username</th>
            <th>role</th>
           </tr>
        </thead>
        <tbody>
            <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['role']."</td>";
                    echo "<tr>";
                }
            ?>
        </tbody>
    </table>
    <a href="/goobnote_2/auth/login.php">Login</a>
    <br>
    <a href="/goobnote_2/auth/register.php">Register    </a>
</body>
</html>