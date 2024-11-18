<?php
 session_start();
 if (!isset($_SESSION["role"])){
    header("Location: /goobnote_2/index.php");
    exit(); 
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HEY ADMIN!</h1>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>