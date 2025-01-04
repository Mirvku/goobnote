<?php
include "../../lib/connection.php";

function totalUsers()
{
    global $conn;
    $query = "SELECT count(*) as total FROM users ";
    $result = mysqli_query($conn, $query);
    $rows = $result->fetch_assoc();
    return $rows['total'];
}
