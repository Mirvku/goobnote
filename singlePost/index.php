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
    <script src="login.js" text="text/javascript" defer></script>
  </head>
  <body>
    <!-- Header -->
    <header class="header" id="navbar">
      <div class="logo">
        <img src="/spiral/img/removebg.png" alt="Spiral Logo" class="logo-img" />
        <h1 onclick="window.location.href='/spiral/home.php'" style="cursor:pointer;">Spiral</h1>
      </div>

      <button
        class="dashboard-button hover-me"
        onclick="window.location.href='/spiral/home.php'">
        Home
      </button>
    </header>
    <nav class="navbar">
      <strong><span>Login</span></strong>
      <button id="open-sidebar" onclick="openSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#c9c9c9">
                <path
                    d="M165.13-254.62q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.86q7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.87q-7.22 7.12-17.9 7.12H165.13Zm0-200.25q-10.68 0-17.9-7.27-7.23-7.26-7.23-17.99 0-10.74 7.23-17.87 7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.27 7.23 7.26 7.23 17.99 0 10.74-7.23 17.87-7.22 7.13-17.9 7.13H165.13Zm0-200.26q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.87q7.22-7.12 17.9-7.12h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.86q-7.22 7.13-17.9 7.13H165.13Z" />
            </svg>
        </button>
    </nav>

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
