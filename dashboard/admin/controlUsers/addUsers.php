<?php 
        include "function/tambah.php";
        session_start();
        if (!isset($_SESSION["role"])) {
            header("Location: /spiral/index.php");
            exit();
        } elseif ($_SESSION["role"] != "admin") {
            $path = $_SESSION["role"];
            header("Location: /spiral/dashboard/$path/index.php");
            exit();
        }

        if (isset($_POST["submit"])) {
            if (tambah($_POST) > 0) {
                echo "<script>
                    alert('User berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>";
            } else {
                echo "<script>
                    alert('User gagal ditambahkan');
                    document.location.href = 'index.php';
                </script>";
            }
        }

        

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" required"><br>
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" required"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required"><br>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" required"><br>
        <label for="role">Role</label><br>
        <select name="role" id="role" required>
            <option value="" disabled selected>Select a role</option>
            <option value="admin">Admin</option>
            <option value="author">Author</option>
        </select><br><br>
        
        <button type="submit" name="submit">Tambah</button>
        
    </form>
</body>
</html>