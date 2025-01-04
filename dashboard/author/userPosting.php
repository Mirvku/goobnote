<?php  
    include "content/tambah.php";
    session_start();
     if (!isset($_SESSION["role"])){
        header("Location: /goobnote/index.php");
        exit(); 
     }

     if (isset($_POST["submit"])) {
        if (tambah($_POST, $_SESSION['id']) > 0) {
            echo "<script>
                alert('Postingan berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Postingan gagal ditambahkan');
                document.location.href = 'index.php';
            </script>";
        }
    }
    $previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/default-page.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="<?= $previousPage; ?>">Back</a>
    <form action="" method="POST">
        <label for="judul">Judul</label><br>
        <input type="text" name="judul" id="judul" required><br>
        <label for="content">Content</label><br>
        <textarea name="content" id="content" cols="30" rows="10" required></textarea><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>