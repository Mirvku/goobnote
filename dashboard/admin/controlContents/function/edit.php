<?php
include("../../../lib/connection.php");

function tampilbyId($id)
{
    global $conn;

    $query = "SELECT * FROM contents WHERE id = ?";
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


    $judul = $data['judul'];
    $content = $data['content'];


    $query = "UPDATE contents SET judul = ?, content = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);


    mysqli_stmt_bind_param($stmt, "ssi", $judul, $content, $id);


    mysqli_stmt_execute($stmt);


    $affectedRows = mysqli_stmt_affected_rows($stmt);

    mysqli_stmt_close($stmt);

    return $affectedRows;
}
