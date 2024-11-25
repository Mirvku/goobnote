<?php
include "content/tampil.php";
 session_start();
 if (!isset($_SESSION["role"])){
    header("Location: /spiral/index.php");
    exit(); 
 }elseif ($_SESSION["role"] != "author") {
    $path = $_SESSION["role"];
    header("Location: /spiral/dashboard/$path/index.php");
    exit();
 }
 
 $data = tampil($_SESSION['id']);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .postingan {
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>HEY <?php echo ucfirst($_SESSION['nama']);?>!</h1>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
    <div class="buatPosting">
        <a href="/spiral/dashboard/author/userPosting.php"><button>Buat Postingan</button></a>
    </div>
    <a href="/spiral/Blogpage/index.php"><button>Back</button></a>

    <h1>Postingan mu</h1>
    
    <?php if (empty($data)) : ?>
        <p>Kamu belum memposting apapun</p>
    <?php endif ?>

    <?php foreach ($data as $posting) : ?>
        <div class="postingan">
            <h2><?= $posting['judul']; ?></h2>
            <a href="/spiral/dashboard/author/userEdit.php?id=<?php echo $posting['id']; ?>">Edit</a>
            <a href="/spiral/dashboard/author/content/delete.php?id=<?php echo $posting['id']; ?>">Delete</a>
            <p><?= substr($posting['content'], 0, 300); ?> ..</p>
            <p><?= date("F j, Y", strtotime($posting['created_at'])); ?></p>
            <a href="/spiral/singlePost/index.php?id=<?= $posting['id']; ?>">lebih lanjut</a>

        </div> 
    <?php endforeach ?>
    
    
</body>
</html>