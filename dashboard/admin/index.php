<?php
include "total/totalUsers.php";
include "total/totalContents.php";
session_start();
if (!isset($_SESSION["role"])) {
    header("Location: /spiral/index.php");
    exit();
}elseif ($_SESSION["role"] != "admin") {
    $path = $_SESSION["role"];
    header("Location: /spiral/dashboard/$path/index.php");
    exit();
}
$users = totalUsers();
$contents = totalContents();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>HEY <?php echo ucfirst($_SESSION['nama']);?>!</h1>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
    <a href="/spiral/Blogpage/index.php"><button>Back</button></a><br>
    <a href="controlUsers/index.php">Control Users</a>
    <a href="controlContents/index.php">Control Contents</a>
    <h1>Total Users</h1>
    <?= count($users) ?>
    <h1>Total Contents</h1>
    <?= count($contents); ?>
</body>

</html>