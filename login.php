<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $username = $_POST['user'];

     //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
     $password = md5($_POST['pass']);

     //prepared statement
     $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

     //parameter binding 
     $stmt->bind_param("ss", $username, $password); //username string dan password string

     //database executes the statement
     $stmt->execute();

     //menampung hasil eksekusi
     $hasil = $stmt->get_result();

     //mengambil baris dari hasil sebagai array asosiatif
     $row = $hasil->fetch_array(MYSQLI_ASSOC);

     //check apakah ada baris hasil data user yang cocok
     if (!empty($row)) {
          //jika ada, simpan variable username pada session
          $_SESSION['username'] = $row['username'];

          //mengalihkan ke halaman admin
          header("location:admin.php");
     } else {
          //jika tidak ada (gagal), alihkan kembali ke halaman login
          header("location:login.php");
     }

     //menutup koneksi database
     $stmt->close();
     $conn->close();
} else {
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
  <link href="stylelogin.css" rel="stylesheet"> 
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <form action="" method="POST">
    <div class="container">
    <h2>Login</h2>
    <div class="username">
      <label for="user">Username:</label>
      <input type="text" id="user" name="user" required>
    </div>
    <div class="pw">
      <label for="pass">Password:</label>
      <input type="password" id="pass" name="pass" required>
    </div>
    <div class="tombol">
      <button type="submit">Login</button>
    </div>
    </div>
  </form>
</body>
</html>
<?php } ?>