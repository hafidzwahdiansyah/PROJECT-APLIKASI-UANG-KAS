<?php 
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sign Up - Aplikasi Perpustakaan Digital</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="logokaskelas.png" alt="logo" width="250">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                 <form method="post" enctype="multipart/form-data">
                           <?php
                if (isset($_POST['nama_anggota'])) {
                  
                  $nama_anggota = $_POST['nama_anggota'];
                  $username = $_POST['username'];
                  $password = md5( $_POST['password']);
                  $alamat = $_POST['alamat'];
                  $level = $_POST['level'];
                  $gambar = $_FILES['gambar'];
                  $nama_gambar = $gambar['name'];
                  move_uploaded_file($gambar['tmp_name'],'images/'.$gambar['name']);

                  $query = mysqli_query($koneksi, "INSERT INTO anggota(nama_anggota,username,password,alamat,level,gambar) VALUES('$nama_anggota','$username','$password','$alamat', '$level','$nama_gambar')");

                  if ($query) {
                    echo '<script>alert("Tambah data berhasil")</script>';
                  }else{
                    echo '<script>alert("Tambah data gagal")</script>';
                  }
                }

                ?>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="username">Username :</label>
                      <input id="username" type="text" class="form-control" name="username" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="password">Password :</label>
                      <input id="password" type="password" class="form-control" name="password">
                    </div>
                  </div>

                  <div class="form-group">
                    <label >Foto Profile :</label>
                    <input type="file" class="form-control" name="gambar">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label >Nama Lengkap :</label>
                    <input  type="text" class="form-control" name="nama_anggota">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <input id="alamat" type="text" class="form-control" name="alamat">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="level">Level :</label>
                    <select class="form-control" name="level">
                      <option value="anggota">Anggota</option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
             
                  </div>

        

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                  <div class="mt-5 text-muted text-center">
              Sudah mempunyai akun? <a href="login.php">Login</a>
            </div>
                </form>
              </div>
            </div>
            
       
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>