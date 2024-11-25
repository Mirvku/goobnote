<?php
include "content/tampilContents.php";
session_start();
if (!isset($_SESSION["role"])) {
    $isLoggedIn = false;  
} else {
    $isLoggedIn = true;  
    $path = $_SESSION["role"];
    $contents = tampilContents();
}

$contents = tampilContents();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Spiral Blog</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>

    <header class="header">
      <div class="logo">
        <img src="/spiral/img/removebg.png" alt="Spiral Logo" class="logo-img" />
        <h1>Spiral</h1>
      </div>

      <?php if (!$isLoggedIn): ?>
      <button
        class="dashboard-button"
        onclick="window.location.href='/spiral/auth/login.php'"
      >
        Login
      </button>
      <?php endif ?>

      <?php if ($isLoggedIn): ?>
      <button
        class="dashboard-button"
        onclick="window.location.href='/spiral/dashboard/<?php echo $path; ?>/index.php'"
      >
        Dashboard
      </button>
      <?php endif; ?>
    </header>
    <nav class="navbar">
      <strong><span>Blog</span></strong>
    </nav>

    
    
    <main class="post-container">
      <div class="post-grid">
      <?php foreach ($contents as $content) : ?>
        <article class="post-card">
          <h2 class="post-title"><?= $content['judul'] ?></h2>
          <p class="post-content">
          <?= substr($content['content'], 0, 100); ?> ..
          </p>
          <div class="post-footer">
            <div class="post-author">
            <?= $content['nama'] ?>
              <span class="post-date"><?= date("F j, Y", strtotime($content['created_at'])); ?></span>
            </div>
            <a href="/spiral/singlePost/index.php?id=<?= $content['id'] ?>" class="post-link">Lebih Lanjut</a>
          </div>
        </article>
        <?php endforeach ?>

        <!-- Tambahkan artikel lainnya -->
      </div>
    </main>
  </body>
</html>
