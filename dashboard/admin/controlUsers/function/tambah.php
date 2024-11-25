<?php 
    include ("../../../lib/connection.php");
    function tambah($data){
        global $conn;
        $email = htmlspecialchars($data['email']);
        $username = htmlspecialchars($data['username']);
        $password = hash("sha256", $data['password']); 
        $nama = htmlspecialchars($data['nama']);
        $role = htmlspecialchars($data['role']);

        $query = "INSERT INTO users VALUES ('', '$email', '$username', '$password', '$nama', '$role')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
?>