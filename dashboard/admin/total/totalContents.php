<?php 
    include "../../lib/connection.php";

    function totalContents() {
        global $conn;
        $query = "SELECT * FROM contents ";
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

?>