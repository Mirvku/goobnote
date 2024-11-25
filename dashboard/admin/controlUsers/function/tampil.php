<?php
include "../../../lib/connection.php";

function tampil()
{
    global $conn;
    $query = "SELECT * FROM users ";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
