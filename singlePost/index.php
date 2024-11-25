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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Konten</title>
    <style>
        body {
            font-family: medium-content-sans-serif-font;
        }

        .preserved-format {
            white-space: pre-wrap; /* Pertahankan spasi dan baris baru */
            font-family: medium-content-sans-serif-font;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
        <?php foreach ($data as $content): ?>
            <h1><?= $content['judul']; ?></h1>
            <p><?= $content['nama']; ?></p>
            <p><?= date("F j, Y", strtotime($content['created_at'])); ?></p>
            <div class="preserved-format"><?= $content['content']; ?></div>
        <?php endforeach; ?>
    <a href="<?= $previousPage; ?>">Kembali</a>
</body>
</html>
