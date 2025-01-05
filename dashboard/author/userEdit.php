<?php 
    include "content/edit.php";
    session_start();
    if (!isset($_SESSION["role"])){
       header("Location: /goobnote/index.php");
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
    <title>User Dashboard - Edit Post</title>
    <link rel="stylesheet" href="content.css" />
</head>
<body>
<form action="" method="POST">
    <div class="container">
        <div class="back-arrow">
            <a href="<?= $previousPage; ?>" class="arrow">&larr;</a>
        </div>
        <input type="text" name="judul" class="title-input" placeholder="Judul Postingan...." value="<?=$data['judul'] ?>" required>
        <textarea class="content" name="content" placeholder="Konten...." required>
            <?= $data['content']; ?>
        </textarea>
        <!-- <div class="char-count">0/100</div> -->
        <button type="submit" name="submit" class="post-button">Update</button>
    </div>
    </form>
    
</body>
</html>