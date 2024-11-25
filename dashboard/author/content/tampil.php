<?php 
    include ("../../lib/connection.php");
    function tampil($id){
        global $conn;
        $query = "SELECT * FROM contents WHERE author_id = '$id'";
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
        
    }

?>