<?php 
        include ("../../../../lib/connection.php");
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        header("Location: /goobnote/dashboard/admin/controlUsers/index.php");

?>