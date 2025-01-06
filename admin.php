<?php
session_start();

include "koneksi.php";  

//check jika belum ada user yang login arahkan ke halaman login
if (!isset($_SESSION['username'])) { 
	header("location:login.php"); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Daily Journal | Admin</title>
    <link rel="icon" href="img/logo.png" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
    /> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dark.css">
   
   

</head>
<body>
     <!-- nav begin -->
     <nav class="navbar navbar-expand-sm sticky-top bg-memu">
    <div class="container">
        <a class="navbar-brand" target="_blank" href=".">Soto Nusantara</a>
        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
        <li class="nav-item">
    <a class="nav-link" href="admin.php?page=dashboard">Dashboard</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="admin.php?page=article">Article</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="admin.php?page=gallery">Gallery</a>
</li>
<li>
  <!-- button dark mode -->
  <button id="darkmode">
<label class="switch" >
  <span class="sun"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="#ffd43b"><circle r="5" cy="12" cx="12"></circle><path d="m21 13h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm-17 0h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm13.66-5.66a1 1 0 0 1 -.66-.29 1 1 0 0 1 0-1.41l.71-.71a1 1 0 1 1 1.41 1.41l-.71.71a1 1 0 0 1 -.75.29zm-12.02 12.02a1 1 0 0 1 -.71-.29 1 1 0 0 1 0-1.41l.71-.66a1 1 0 0 1 1.41 1.41l-.71.71a1 1 0 0 1 -.7.24zm6.36-14.36a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm0 17a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm-5.66-14.66a1 1 0 0 1 -.7-.29l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.29zm12.02 12.02a1 1 0 0 1 -.7-.29l-.66-.71a1 1 0 0 1 1.36-1.36l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.24z"></path></g></svg></span>
  <span class="moon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="m223.5 32c-123.5 0-223.5 100.3-223.5 224s100 224 223.5 224c60.6 0 115.5-24.2 155.8-63.4 5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6-96.9 0-175.5-78.8-175.5-176 0-65.8 36-123.1 89.3-153.3 6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"></path></svg></span>   
  <input type="checkbox" class="input" onclick="document.getElementById('darkmode').click()">
  <span class="slider"></span>
</label>
      </button>
</li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-danger fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['username']?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
                </ul>
            </li> 
        </ul>
        </div>
    </div>
    </nav>
    <!-- nav end -->
    <!-- content begin -->
<section id="content" class="p-5">
    <div class="container">
        <?php
        if(isset($_GET['page'])){
        ?>
            <h4 class="lead display-6 pb-2 border-bottom border-warning text-dark" id="text"><?= ucfirst($_GET['page'])?></h4>
            <?php
            include($_GET['page'].".php");
        }else{
        ?>
            <h4 class="lead display-6 pb-2 border-bottom border-warning">Dashboard</h4>
            <?php
            include("dashboard.php");
        }
        ?>
    </div>
</section>
<!-- content end -->

    <!-- footer -->
  <footer class="bg-memu">
    <div class="footer container">

      <!--Profil-->
      <div class="profil">
        <h1>Fikri Alif</h1>
        <p>Hubungi Saya</p>
        <span class="d-flex gap-2">
          <i class="bi bi-envelope-fill"></i>
          <p class="m-0">kapallaud@gmail.com</p>
        </span>
        <span class="d-flex gap-2">
          <i class="bi bi-telephone-fill"></i>
          <p class="m-0">+62 864 0975 342 </p>
        </span>
        <span class="d-flex gap-2">
          <i class="bi bi-geo-alt-fill"></i>
          <p class="m-0">Semarang, Jawa Tengah</p>
        </span>
      </div>
      <!-- Kategori Tulisan -->
      <div class="kategoritulisan">
        <h1>Kategori Tulisan</h1>
        <p class="m-0">Kuliner</p>
        <p class="m-0">macam-macam soto</p>
      </div>
      <!-- Tautan -->
      <div class="tautan">
        <h1>Tautan</h1>
        <a class="d-block text-dark text-decoration-none" href="#galeri">Gallery</a>
        <a class="d-block text-dark text-decoration-none" href="#hero">Home</a>
        <a class="d-block text-dark text-decoration-none" href="#article">Artikel</a>
      </div>
    </div>
    <hr>
    <div class="container text-center">
      <span class="fs-3">
        <i class="bi bi-nintendo-switch"></i>
        <i class="bi bi-playstation"></i>
        <i class="bi bi-twitch"></i>
        <i class="bi bi-spotify"></i>
      </span>
      <span>
        <p>&copy;Muhammad Fikri Alif Karim 2025</p>
      </span>
    </div>
  
  </footer>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
    ></script>

    <script src="dark_mode.js" type="text/JavaScript"></script>
</body>
</html> 