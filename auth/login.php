<?php
    include("../lib/connection.php");
    session_start();

    if (isset($_SESSION["role"])) {
        if ($_SESSION["role"] == "author") {
            header("Location: /goobnote/dashboard/author/index.php");
            exit();
        } else if ($_SESSION["role"] == "admin") {
            header("Location: /goobnote/dashboard/admin/index.php");
            exit();
        }
    }

    $previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/home.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome back - Sign In</title>
    <link rel="stylesheet" href="loginn.css"/>
</head>
<body>
    <header>
      <div class="header-top">
        <img src="/goobnote/img/spirallogo.jpg" class="logo" />
        <div class="title">Spiral</div>
      </div>
      <div class="header-bottom"></div>
    </header>
    <main>
      <div class="card">
        <div class="back-button">
        <a href="<?php echo $previousPage; ?>"><span>&larr;</span></a>
        </div>

        <h1>Sign In</h1>
        <p class="subtitle">
          Hey, enter your details to login to your account.
        </p>

        <form action="login.php" method="post" name="form_login" class="login-form">
          <div class="input-group">
            <img src="/spiral/img/username.png" alt="username" class="input-icon" />
            <input type="text" id="username" name="username" placeholder="Username" />
          </div>

          <div class="input-group">
            <img src="/spiral/img/password.png" alt="password" class="input-icon" />
            <input type="password" id="password" name="password" placeholder="Password" />
            <img src="/spiral/img/eye.png" alt="show password" class="toggle-password" />
          </div>

          <button type="submit" name="submit" >Sign In</button>

          <p class="register-text">
            Don't have an account?
            <a href="/spiral/auth/register.php">Register now!</a>
          </p>
        </form>
      </div>
    </main>

    <footer>
      <p>&copy; 2024 Spiral - All Right Reserved.</p>
    </footer>

    <?php
        if(isset($_POST["submit"])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = hash("sha256", $_POST["password"]);

            $result = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION["id"] = $row["id"];
                $_SESSION["nama"] = $row["nama"];
                $_SESSION["role"] = $row["role"];

                if ($_SESSION["role"] == "admin") {
                    header("Location: /goobnote/Blogpage/index.php");
                }
                else if ($_SESSION["role"] == "author") {
                    header("Location: /goobnote/Blogpage/index.php");
                }
            }
            else {
                echo "<script>alert('Username atau password Anda salah. Silakan coba lagi!')</script>";
            }
        } 
    ?>
</body>
</html>