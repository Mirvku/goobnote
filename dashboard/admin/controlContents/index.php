<?php 
include "function/tampil.php";

session_start();
if (!isset($_SESSION["role"])) {
    header("Location: /spiral/index.php");
    exit();
} elseif ($_SESSION["role"] != "admin") {
    $path = $_SESSION["role"];
    header("Location: /spiral/dashboard/$path/index.php");
    exit();
}

$data = tampil();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Contents</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions a {
            text-decoration: none;
            padding: 5px 10px;
            color: white;
            border-radius: 3px;
        }
        .view {
            background-color: #2196F3;
        }
        .edit {
            background-color: #4CAF50;
        }
        .delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Control Contents</h1>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Content</th>
                <th>Username</th>
                <th>Tanggal Posting</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $posting) : ?>
                <tr>
                    <td><?= $posting['judul']; ?></td>
                    <td><?= substr($posting['content'], 0, 50) . '...'; ?></td>
                    <td><?= $posting['username']; ?></td>
                    <td><?= date("F j, Y", strtotime($posting['created_at'])); ?></td>
                    <td class="actions">
                        <a class="view" href="/spiral/singlePost/index.php?id=<?= $posting['id']; ?>">view</a>
                        <a class="edit" href="/spiral/dashboard/admin/controlContents/contentEdit.php?id=<?= $posting['id']; ?>">Edit</a>
                        <a class="delete" href="/spiral/dashboard/admin/controlContents/function/delete.php?id=<?= $posting['id']; ?>" 
                           onclick="return confirm('Yakin ingin menghapus konten ini?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="/spiral/dashboard/admin/index.php">Back</a>
</body>
</html>
