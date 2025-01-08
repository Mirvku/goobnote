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
    <title>Dashboard - Content Controls</title>
    <link rel="stylesheet" href="../style/style.css">
    <script type="text/javascript" src="../script.js" defer></script>
</head>
<body>
    <nav id="sidebar">
        <ul>
            <li>
                <span class="logo">SPIRAL</span>
                <button onclick="toggleSidebar()" id="toggle-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e8eaed">
                        <path
                            d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z" />
                    </svg>
                </button>
            </li>
            <li class="active">
                <a href="/spiral/dashboard/admin/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e8eaed">
                        <path
                            d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
                    </svg>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="/spiral/dashboard/admin/controlUsers/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#c9c9c9">
                        <path
                            d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                    </svg>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="/spiral/dashboard/admin/controlContents/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#c9c9c9">
                        <path
                            d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h360v80H200v560h560v-360h80v360q0 33-23.5 56.5T760-120H200Zm120-160v-80h320v80H320Zm0-120v-80h320v80H320Zm0-120v-80h320v80H320Zm360-80v-80h-80v-80h80v-80h80v80h80v80h-80v80h-80Z" />
                    </svg>
                    <span>Posts</span>
                </a>
            </li>
            <li>
                <form action="../logout.php" method="POST" id="form">
                    <a href="javascript:{}" onclick="document.getElementById('form').submit();" id="logout-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e8eaed">
                            <path
                                d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                        </svg>
                        <span>Logout</span>
                    </a>
                </form>
            </li>
        </ul>
        <div class="logout">
            <form action="../logout.php" method="POST" id="form">
                <a href="javascript:{}" onclick="document.getElementById('form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e8eaed">
                        <path
                            d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                    </svg>
                    <span>Logout</span>
                </a>
            </form>
         
        </div>
    </nav>
    <main>
        <h1>Posts Control</h1>
        <table class="table-content">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Content</th>
                    <th>Username</th>
                    <th>Tanggal Posting</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $posting) : ?>
                <tr>
                    <td><?= (strlen($posting['judul']) >= 50 ? substr($posting['content'], 0, 50) . '...' :  $posting['judul']);?></td>
                    <td><?= substr($posting['content'], 0, 50) . '...'; ?></td>
                    <td><?= $posting['username']; ?></td>
                    <td><?= date("F j, Y", strtotime($posting['created_at'])); ?></td>
                    <td class="action">
                        <a href="/spiral/singlePost/index.php?id=<?= $posting['id']; ?>">View</a>
                        <a href="/spiral/dashboard/admin/controlContents/contentEdit.php?id=<?= $posting['id']; ?>" class="edit">Edit</a>
                        <a href="/spiral/dashboard/admin/controlContents/function/delete.php?id=<?= $posting['id']; ?>" 
                           onclick="return confirm('Yakin ingin menghapus konten ini?');" class="delete">Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <!-- <a href="../form.html" class="add-btn">Tambah Content</a> -->
    </main>
</body>
</html>
