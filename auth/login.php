<?php
    include("../lib/connection.php");
    session_start();

    if (isset($_SESSION["role"])) {
        if ($_SESSION["role"] == "author") {
            header("Location: /goobnote_2/dashboard/user/index.php");
            exit();
        } else if ($_SESSION["role"] == "admin") {
            header("Location: /goobnote_2/dashboard/admin/index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GoobNote</title>
</head>
<body>
    <h2>Halaman Login</h2>
    <form action="login.php" method="post" name="form_login">
        <table border="0">
            <tr>
                <td><span>Username</span></td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td><span>Password</span></td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Login"></td>
            </tr>
        </table>
    </form>

    <p>Belum punya akun? <a href="/goobnote_2/auth/register.php">daftar</a></p>

    <?php
        if(isset($_POST["submit"])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = hash("sha256", $_POST["password"]);

            $result = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION["nama"] = $row["nama"];
                $_SESSION["role"] = $row["role"];

                if ($_SESSION["role"] == "admin") {
                    header("Location: /goobnote_2/dashboard/admin/index.php");
                }
                else if ($_SESSION["role"] == "author") {
                    header("Location: /goobnote_2/dashboard/user/index.php");
                }
            }
            else {
                echo "<script>alert('Username atau password Anda salah. Silakan coba lagi!')</script>";
            }
        } 
    ?>
</body>
</html>