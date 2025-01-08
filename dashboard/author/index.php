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
 $previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/default-page.php';
 
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
    <header class="header" id="navbar">
        <div class="logo">
            <img src="/spiral/img/removebg.png" alt="Spiral Logo" class="logo-img" />
            <h1 onclick="window.location.href='/spiral/home.php'" style="cursor:pointer;">Spiral</h1>
        </div>

        <button
            class="dashboard-button hover-me"
            onclick="window.location.href='/spiral/home.php'"
        >
            Home
        </button>
        
        <div class="">
        <form action="logout.php" method="POST" id="form">
                <a href="javascript:{}" onclick="document.getElementById('form').submit();" class="dashboard-button  hover-me">Logout</a>
        </form>
        </div>
        </header>
        <nav class="navbar">
        <strong><span>User Dashboard</span></strong>
        <button id="open-sidebar" onclick="openSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#c9c9c9">
                    <path
                        d="M165.13-254.62q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.86q7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.87q-7.22 7.12-17.9 7.12H165.13Zm0-200.25q-10.68 0-17.9-7.27-7.23-7.26-7.23-17.99 0-10.74 7.23-17.87 7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.27 7.23 7.26 7.23 17.99 0 10.74-7.23 17.87-7.22 7.13-17.9 7.13H165.13Zm0-200.26q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.87q7.22-7.12 17.9-7.12h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.86q-7.22 7.13-17.9 7.13H165.13Z" />
                </svg>
        </button>
    </nav>

    
    
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