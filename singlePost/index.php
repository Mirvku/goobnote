<?php
include "content/tampil.php";

// Ambil halaman sebelumnya atau gunakan default
$previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/default-page.php';

// Ambil ID dari parameter URL
$id = $_GET['id'];

// Ambil data berdasarkan ID
$data = tampil($id);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Single Post - Spiral</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="header-top">
        <img src="/goobnote/img/removebg.png" class="logo" />
        <b><div class="title">Spiral</div></b>
        <button class="dashboard-btn">Dashboard</button>
      </div>
    </header>

    <!-- header bottom -->
    <div class="header-bottom">
      <h2>Single Post</h2>
    </div>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Back Button -->
      <button class="back-btn">
        <a href="<?= $previousPage; ?>" style="font-size: 26px; color: black; text-decoration: none;">&larr;</a>
      </button>

      <!-- Post Content -->
      <article class="post">
    <?php foreach ($data as $content): ?>
        <h1 class="post-title"><?= $content['judul']; ?></h1>

        <div class="post-meta">
          <div class="author">
            <span class="author-name"><?= $content['nama']; ?></span>
          </div>
          <time class="date"><?= date("F j, Y", strtotime(datetime: $content['created_at'])); ?></time>
        </div>

        <hr class="post-divider" />

        <div class="post-content">
          <p>
          <?= $content['content']; ?>
          </p>
        </div>
    <?php endforeach; ?>
      </article>
    </main>
  </body>
</html>
