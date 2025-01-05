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
    <title>User Dashboard - Add Post</title>
    <link rel="stylesheet" href="content.css" />
</head>
<body>
    <form action="" method="POST">
    <div class="container">
        <div class="back-arrow">
            <a href="<?= $previousPage; ?>" class="arrow">&larr;</a>
        </div>
        <input type="text" name="judul" class="title-input" placeholder="Judul Postingan...." required>
        <textarea class="content" name="content" placeholder="Konten...." required></textarea>
        <!-- <div class="char-count">0/100</div> -->
        <button type="submit" name="submit" class="post-button">Posting</button>
    </div>
    </form>
</body>
</html>