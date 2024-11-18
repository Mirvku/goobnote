<?php
    include("../lib/connection.php");
    session_start();

    if (isset($_SESSION["role"])) {
        if ($_SESSION["role"] == "author") {
            header("Location: /goobnote_2/dashboard/user/index.php");
        } else if ($_SESSION["role"] == "admin") {
            header("Location: /goobnote_2/dashboard/admin/index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GoobNote</title>
</head>
<body>
    <h2>Halaman Register</h2>
    <form action="register.php" method="post" name="form_register">
        <table border="0">
            <tr>
                <td><span>Nama Lengkap</span></td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td><span>Email</span></td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td><span>Username</span></td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td><span>Password</span></td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Register"></td>
            </tr>
        </table>
    </form>
    <p>Sudah punya akun? <a href="/goobnote_2/auth/login.php">Login</a></p>

    <?php
        if(isset($_POST["submit"])) {
            $nama      = $_POST["nama"];
            $email      = $_POST["email"];
            $username   = $_POST["username"];
            $password   = hash("sha256", $_POST["password"]);

            $result = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
            if (!$result->num_rows > 0) {
                $add = mysqli_query($conn,"INSERT INTO users (nama, email, username, password, role) VALUES ('$nama','$email', '$username', '$password', 'author')");
                if($add) {
                    echo "<script>alert('Pendaftaran berhasil!')</script>";
                    $username = "";
                    $nama = "";
                    $email = "";
                    $_POST['password'] = "";
                    header("Location: /goobnote_2/auth/login.php");
                }
                else {
                    echo "<script>alert('Maaf, terjadi kesalahan.')</script>";
                }
            }
            else {
                echo "<script>alert('Username sudah digunakan!')</script>";
            }
        } 
    ?>
</body>
</html>