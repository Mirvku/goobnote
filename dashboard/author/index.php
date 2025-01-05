<?php
include "content/tampil.php";
 session_start();
 if (!isset($_SESSION["role"])){
    header("Location: /goobnote/index.php");
    exit(); 
 }elseif ($_SESSION["role"] != "author") {
    $path = $_SESSION["role"];
    header("Location: /goobnote/dashboard/$path/index.php");
    exit();
 }
 
 $data = tampil($_SESSION['id']);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="header">
        <div class="spiral-font">
            <img src="spiral logo.png" alt="Spiral Logo" class="logo-img" />
            <span>Spiral</span>
        </div>
        <a href="dashboard.html" class="dashboard-button">Dashboard</a>
    </div>
    <div class="sub-header">Dashboard User</div>
    
    <div class="content">
        <button class="back-button">&larr; Back</button>
        <div class="user-title-container">
            <div class="user-title">Hello, <?php echo ucfirst($_SESSION['nama']);?></div>
            <a href="/goobnote/dashboard/author/userPosting.php" class="write-button">Write</a>
        </div>

        <?php if (empty($data)) : ?>
            <p>Kamu belum memposting apapun</p>
        <?php endif ?>


        <?php foreach ($data as $posting) : ?>
        <div class="post-list">
            <!-- Post Item 1 -->
            <div class="post-item">
                <div class="post-header">
                    <h3><?= $posting['judul']; ?></h3>
                    <div class="post-actions">
                        <a href="/goobnote/dashboard/author/userEdit.php?id=<?php echo $posting['id']; ?>" class="update">Update</a>
                        <a href="/goobnote/dashboard/author/content/delete.php?id=<?php echo $posting['id']; ?>" class="delete">Delete</a>
                    </div>
                </div>
                <p>
                <?= substr($posting['content'], 0, 300); ?>..
                </p>
                <div class="post-footer">
                    <span><?= date("F j, Y", strtotime($posting['created_at'])); ?></span>
                    <a href="/goobnote/singlePost/index.php?id=<?= $posting['id']; ?>"><b>Lebih Lanjut</b></a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
    
</body>
</html>