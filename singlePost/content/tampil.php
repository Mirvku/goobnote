<?php
include("../lib/connection.php");
function tampil($id)
{
    global $conn;
    $query = "SELECT 
        contents.judul, 
        contents.content,
        contents.created_at,     
        users.nama 
    FROM 
        contents 
    INNER JOIN 
        users 
    ON 
        contents.author_id = users.id
    WHERE 
        contents.id = $id
    ";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
