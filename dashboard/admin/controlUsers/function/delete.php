<?php 
        include ("../../../../lib/connection.php");
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        header("Location: /spiral/dashboard/admin/controlUsers/index.php");

?>