<?php 
    include "../../lib/connection.php";

    function totalContents() {
        global $conn;
        $query = "SELECT count(*) as total FROM contents ";
        $result = mysqli_query($conn, $query);
        $rows = $result->fetch_assoc();
        return $rows['total'];
    }

?>