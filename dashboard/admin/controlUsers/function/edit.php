<?php
include("../../../lib/connection.php");
function tampilbyId($id)
{
    global $conn;

    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    mysqli_stmt_close($stmt);

    return $rows;
}

function edit($data, $id)
{
    global $conn;

    // Mengambil data dari parameter $data
    $email = $data['email'];
    $username = $data['username'];
    $password = $data['password'];
    $nama = $data['nama'];
    $role = $data['role'];

    if (!empty($password)) {
        $hashedPassword = hash("sha256", $password);
    } else {
        $queryOldPassword = "SELECT password FROM users WHERE id = ?";
        $stmtOldPassword = mysqli_prepare($conn, $queryOldPassword);
        mysqli_stmt_bind_param($stmtOldPassword, "i", $id);
        mysqli_stmt_execute($stmtOldPassword);
        mysqli_stmt_bind_result($stmtOldPassword, $hashedPassword);
        mysqli_stmt_fetch($stmtOldPassword);
        mysqli_stmt_close($stmtOldPassword);
    }

    $query = "UPDATE users SET email = ?, username = ?, password = ?, nama = ?, role = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);


    mysqli_stmt_bind_param($stmt, "sssssi", $email, $username, $hashedPassword, $nama, $role, $id);


    mysqli_stmt_execute($stmt);


    $affectedRows = mysqli_stmt_affected_rows($stmt);


    mysqli_stmt_close($stmt);

    return $affectedRows;
}
