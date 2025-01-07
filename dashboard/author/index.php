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
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="header">
        <div class="spiral-font">
            <img src="/spiral/img/removebg.png" alt="Spiral Logo" class="logo-img" />
            <span>Spiral</span>
        </div>
        <div class="nav-items">
            <form action="logout.php" method="POST" id="form">
                <a href="javascript:{}" onclick="document.getElementById('form').submit();" class="dashboard-button">Logout</a>
            </form>
        </div>
    </div>
    <div class="sub-header">Dashboard User</div>
    
    <div class="content">
        <a href="/spiral/Blogpage/index.php" style="text-decoration: none; color: black;" class="back-button">&larr; Back</a>
        <div class="user-title-container">
            <div class="user-title">Hello, <?php echo ucfirst($_SESSION['nama']);?></div>
            <a href="/spiral/dashboard/author/userPosting.php" class="write-button">Write</a>
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
                        <a href="/spiral/dashboard/author/userEdit.php?id=<?php echo $posting['id']; ?>" class="update">Update</a>
                        <a href="/spiral/dashboard/author/content/delete.php?id=<?php echo $posting['id']; ?>" class="delete">Delete</a>
                    </div>
                </div>
                <p>
                <?= substr($posting['content'], 0, 300); ?>..
                </p>
                <div class="post-footer">
                    <span><?= date("F j, Y", strtotime($posting['created_at'])); ?></span>
                    <a href="/spiral/singlePost/index.php?id=<?= $posting['id']; ?>"><b>Lebih Lanjut</b></a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
    
</body>
</html>