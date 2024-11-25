<?php 
include "../../../lib/connection.php";

function tampil() {
    global $conn;
    $query = "SELECT 
            contents.judul, 
            contents.content,
            contents.created_at, 
            contents.id,    
            users.username 
        FROM 
            contents 
        INNER JOIN 
            users 
        ON 
            contents.author_id = users.id
    ";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>