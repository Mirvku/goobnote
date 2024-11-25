<?php
include "../lib/connection.php";

function tampilContents(){
    global $conn;
    $query = "
        SELECT 
            contents.judul, 
            contents.content,
            contents.created_at, 
            contents.id,    
            users.nama 
        FROM 
            contents 
        INNER JOIN 
            users 
        ON 
            contents.author_id = users.id
        ORDER BY 
            contents.created_at DESC
    ";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}





?>
