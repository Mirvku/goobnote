<?php
$db_host        = 'localhost';
$db_username    = 'root';
$db_pass        = '';
$db_name        = '';

$mysqli = mysqli_connect($db_host,$db_username, $db_pass, $db_name);

if (mysqli_connect_errno()) {
    echo 'Error: '. mysqli_connect_error();
}
?>