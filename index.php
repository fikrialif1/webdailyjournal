<?php
include "koneksi.php"; 
?>
<!doctype html>
<html lang="en">

<head>
  <title>My Daily Journal</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="dark.css">

  <style>  
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            margin-bottom: 330px; /* Margin bottom by footer height */
        }

        

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 350px; /* Set the fixed height of the footer here */ 
        }
    </style>  

</head>

<body class="bg-white">

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
<?php
session_start();
?>
            <li class="nav-item dropdown">
            <?php if (isset($_SESSION['username'])): ?>
              <!-- Jika sudah login, tampilkan dropdown dengan nama pengguna -->
              <a class="nav-link dropdown-toggle text-primary fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['username'] ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="admin.php">Profile</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            <?php else: ?>
              <!-- Jika belum login, tampilkan "Log In" -->
              <a class="nav-link" href="admin.php">Log In</a>
            <?php endif; ?>
            </li> 
        </ul>
        </div>
    </div>
    </nav>
    <!-- nav end -->

  <!-- Gallery -->
  <section class="container" id="gallery">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <?php
        // Query untuk mengambil gambar yang di-upload
        $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
        $hasil = $conn->query($sql);

        $counter = 0;
        while ($row = $hasil->fetch_assoc()) {
          // Menambahkan button untuk setiap gambar
          echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $counter . '" class="' . ($counter === 0 ? 'active' : '') . '" aria-current="' . ($counter === 0 ? 'true' : 'false') . '" aria-label="Slide ' . ($counter + 1) . '"></button>';
          $counter++;
        }
        ?>
      </div>
      <div class="carousel-inner">
        <?php
        $counter = 0;
        // Mengatur ulang pointer ke awal data hasil query
        $hasil->data_seek(0);

        while ($row = $hasil->fetch_assoc()) {
          $activeClass = ($counter === 0) ? 'active' : ''; // Gambar pertama akan aktif
        ?>
          <div class="carousel-item <?= $activeClass ?>">
            <img src="img-gallery/<?= $row['gambar'] ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="p-3 rounded-3 text-dark" id="nav-brand"><?= htmlspecialchars($row['judul']) ?></h2>
            </div>
          </div>
        <?php
          $counter++;
        }
        ?>
      </div>
      <button class=" carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <!-- gallery end -->

  <!-- home -->

  <section id="hero" class=" py-5">
    <div id="pembungkus-hero" class="container d-flex justify-content-between align-items-center gap-2">

      <div class="kiri text-dark">
        <h1 class="text-warning text-title">Kuliner Soto Nusantara</h1>
        <p class="mw-p fw-bold text-dark" id="text">Soto adalah makanan khas Indonesia seperti sop yang terbuat dari kaldu daging
          dan sayuran. Daging yang paling sering digunakan adalah daging sapi dan daging ayam.</p>
      </div>
      <div class="kanan">
        <img
          src="https://images.unsplash.com/photo-1681378128359-a5c2492a3535?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8c290b3xlbnwwfHwwfHx8MA%3D%3De"
          alt="" style="width: 120%;" class="rounded-3">

      </div>
    </div>

  </section>

  <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3 text-warning">Article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->




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

  


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

  <script src="dark_mode.js" type="text/JavaScript"></script>


</body>

</html>