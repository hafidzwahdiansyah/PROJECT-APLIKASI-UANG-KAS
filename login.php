<?php
session_start();
include 'koneksi.php';

if (isset($_POST['username'])) {

  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $cek_petugas = mysqli_query($koneksi, "SELECT*FROM petugas WHERE username='$username' AND password='$password'");

  if (mysqli_num_rows($cek_petugas) > 0) {
    
    $_SESSION['user'] = mysqli_fetch_array($cek_petugas);
    echo '<script>alert("Selamat, anda berhasil login");location.href="index.php";</script>';
  }else{
    $cek_anggota = mysqli_query($koneksi, "SELECT*FROM anggota WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($cek_anggota) > 0) {
    
        
    $_SESSION['user'] = mysqli_fetch_array($cek_anggota);
        echo '<script>alert("Selamat, anda berhasil login");location.href="index.php";</script>';

    }else{
      echo '<script>alert("Username/password salah");</script>';
    }

  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login - Aplikasi Uang Kas</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

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
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/img/avatar/avatar-1.png" alt="logo" width="80" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="exampleInputPassword1" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" onclick="myFunction()">
                      <label class="custom-control-label" for="remember-me">Tampilkan password</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="login" tabindex="4">
                      Login
                    </button>
                  </div>
                  <div class="mt-5 text-muted text-center">
                    Belum mempunyai akun? <a href="register.php">Daftar disini</a>
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
    <script>
        function myFunction() {
            var x = document.getElementById("exampleInputPassword1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>