<?php 
    include ("../../lib/connection.php");
    function tambah($data, $id){
        global $conn;
        $judul = htmlspecialchars($data['judul']);
        $content = htmlspecialchars($data['content']);

        $query = "INSERT INTO contents (judul, content, author_id) VALUES ('$judul', '$content', '$id')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
?>