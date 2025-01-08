<?php
// include "Blogpage/content/tampilContents.php";
session_start();
if (!isset($_SESSION["role"])) {
    $isLoggedIn = false;  
} else {
    $isLoggedIn = true;  
    $path = $_SESSION["role"];
    header('Location: /spiral/Blogpage/index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spiral</title>
    <link rel="stylesheet" href="home.css">
    <script type="text/javascript" src="script.js" defer></script>
</head>


<body>
    <header class="header" id="navbar">
      <div class="logo">
        <img src="/spiral/img/removebg.png" alt="Spiral Logo" class="logo-img" />
        <h1 onclick="window.location.href='/spiral/home.php'" style="cursor:pointer;">Spiral</h1>
      </div>

      <?php if (!$isLoggedIn): ?>
      <button
        class="dashboard-button hover-me"
        onclick="window.location.href='/spiral/auth/login.php'"
      >
        Sign In
      </button>
      <button
        class="dashboard-button-clr"
        onclick="window.location.href='/spiral/auth/register.php'"
      >
        Get Started
      </button>
      <?php endif ?>
    </header>
    <nav class="navbar">
      <strong><span>Home</span></strong>
      <button id="open-sidebar" onclick="openSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#c9c9c9">
                <path
                    d="M165.13-254.62q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.86q7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.87q-7.22 7.12-17.9 7.12H165.13Zm0-200.25q-10.68 0-17.9-7.27-7.23-7.26-7.23-17.99 0-10.74 7.23-17.87 7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.27 7.23 7.26 7.23 17.99 0 10.74-7.23 17.87-7.22 7.13-17.9 7.13H165.13Zm0-200.26q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.87q7.22-7.12 17.9-7.12h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.86q-7.22 7.13-17.9 7.13H165.13Z" />
            </svg>
        </button>
    </nav>

    <main>
        <section class="main-content">
            <div class="text">
                <h1>Spiral</h1>
                <p>Spiral hadir dengan tampilan modern dan intuitif, memudahkan pengguna untuk membaca, menulis, dan berkolaborasi.</p>
                <a href="/spiral/auth/login.php" class="btn">Masuk</a>
            </div>
            <div class="image">
                <img src="img/spirallogo.jpg" alt="spiral" />
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Spiral - All Right Reserved.</p>
    </footer>
</body>
</html>
