<?php 
    include "function/edit.php";
    session_start();
    if (!isset($_SESSION["role"])) {
        header("Location: /goobnote/index.php");
        exit();
    } elseif ($_SESSION["role"] != "admin") {
        $path = $_SESSION["role"];
        header("Location: /goobnote/dashboard/$path/index.php");
        exit();
    }
    $id = $_GET['id'];
    $data = tampilbyId($id)[0];
     if (isset($_POST["submit"])) {
        if (edit($_POST, $id) > 0) {
            echo "<script>
                alert('Postingan berhasil diupdate');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Postingan gagal diupdate');
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
        <input type="text" name="email" id="email" required value="<?=$data['email'] ?>"><br>
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" required value="<?=$data['username'] ?>"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required"><br>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" required value="<?=$data['nama'] ?>"><br>
        <label for="role">Role</label>
        <select name="role" id="role" required>
            <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="author" <?= $data['role'] == 'author' ? 'selected' : '' ?>>Author</option>
        </select><br><br>
        
        <button type="submit" name="submit">Update</button>
        
    </form>
    
</body>
</html>