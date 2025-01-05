<?php
include "function/tampil.php";
session_start();
if (!isset($_SESSION["role"])) {
    header("Location: /goobnote/index.php");
    exit();
} elseif ($_SESSION["role"] != "admin") {
    $path = $_SESSION["role"];
    header("Location: /goobnote/dashboard/$path/index.php");
    exit();
}

$data = tampil();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Control Users</h1>
    <table border="1" width="30%">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data as $user) : ?>
            <tr>
                <td><?= $user["id"]; ?></td>
                <td><?= $user["nama"]; ?></td>
                <td><?= $user["username"]; ?></td>
                <td><?= $user["role"]; ?></td>
                <td>
                    <a href="/goobnote/dashboard/admin/controlUsers/editUsers.php?id=<?= $user["id"]; ?>">Edit</a> |
                    <a href="/goobnote/dashboard/admin/controlUsers/function/delete.php?id=<?= $user["id"]; ?>" onclick="return confirm('Yakin ingin menghapus Users ini?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="/goobnote/dashboard/admin/controlUsers/addUsers.php"><button>Tambah Users</button></a>
    <a href="/goobnote/dashboard/admin/index.php">Back</a>
</body>

</html>