<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['user'])) {
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Aplikasi Uang Kas</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

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
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
              </div>
              <p style="text-align: center; color:grey;">No incoming messages</p>
             
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
              
              </div>
              <p style="text-align: center; color:grey;">No notifications come in</p>

              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>                 

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img src="images/<?php echo $_SESSION['user']['gambar']; ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"> <?php
                   echo isset($_SESSION['user']['nama_anggota']) ? $_SESSION['user']['nama_anggota'] : $_SESSION['user']['nama_petugas'];
                   ?>                        
</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            <?php
            if ($_SESSION['user']['level'] !='anggota')  {
            ?>
            
              <a href="profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <?php
            }
            ?>
          

             <?php
            if ($_SESSION['user']['level'] !='bendahara')
              if ($_SESSION['user']['level'] !='petugas')
              if ($_SESSION['user']['level'] !='admin')
             {
            
            ?>
             <a href="profile_anggota.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <?php
            }
            ?>

              
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
        <a href="index.php"><img src="logokaskelas.png" width="220"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php"><img src="logokas.png" width="60"></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown ">
              <a href="index.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
             
            </li>
            <li class="menu-header">Pages</li>
            
         <?php
            if ($_SESSION['user']['level'] !='bendahara')
              if ($_SESSION['user']['level'] !='petugas')
              if ($_SESSION['user']['level'] !='anggota')
             {
            
            ?>
            
             <li class="dropdown ">
              <a href="petugas.php" class="nav-link"><i class="fas fa-address-card"></i><span>Data Petugas</span></a>
            </li> 
            <?php
          }
          ?>
           <?php
            if ($_SESSION['user']['level'] !='anggota')  {
            ?>
             <li class="dropdown">
              <a href="anggota.php" class="nav-link"><i class="fas fa-user"></i><span>Data Anggota</span></a>
            </li>
            <li class="dropdown ">
              <a href="pemasukan.php" class="nav-link"><i class="fas fa-book"></i><span>Data Pemasukan</span></a>
            </li>
             <li class="dropdown ">
              <a href="pengeluaran.php" class="nav-link"><i class="fas fa-book"></i><span>Data Pengeluaran</span></a>
            </li>
          
            <li class="dropdown active">
              <a href="laporan.php" class="nav-link"><i class="fas fa-file-invoice"></i><span>Laporan</span></a>
            </li>
            <?php 
          }
          ?>
             <?php
            if ($_SESSION['user']['level'] !='admin') 
            if ($_SESSION['user']['level'] !='bendahara') 
            if ($_SESSION['user']['level'] !='petugas') {
            
          ?>
            
            <li class="dropdown">
              <a href="history_prib.php" class="nav-link"><i class="fas fa-history"></i><span>History</span></a>
            </li>
            <?php
          }
            ?>
         
         
          
         
            <li class="dropdown">
              <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>
           
      </div>
  </ul>
  </aside>
    </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Uang Kas Tunggakan</h1>
                <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#" style="color: grey;">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="laporan.php">Laporan</a></div>
              <div class="breadcrumb-item active"><a href="tunggakan.php">Tunggakan</a></div>
                </div>
            </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                        <a href="laporan.php"  class="btn btn-primary" style="font-weight: bold;">Kembali</a><br><br><br>
                        <form>
                           <div class="form-group">
                        <label style="font-size: 13px; font-weight:bold;">Nominal :</label>
                        <input type="text" class="form-control" required="" name="gambar">
                        <div class="card-footer text-right">
                      <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan</button>
                      <button class="btn btn-secondary" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                    </div>

                           </div>
                     
                        </form>
                            <table class="table table-striped" id="table-1">
                            <thead style="font-weight: bold; font-size:16px; background-color:#6777ef;">
                            <tr>
                        <th style="color: white;">No</th>
                        <th style="color: white;">Nama</th>
                        <th style="color: white;">Total Bayar</th>
                        <th style="color: white;">Tunggakan</th>
                        
                    </tr>
                        </thead>
                         <tbody style="font-weight: bold;"> 
                       <?php
                      $i =1;
                      $query = mysqli_query($koneksi,"SELECT*FROM kas");
                      while ($data = mysqli_fetch_array($query)) {
                       
                      ?>    
                      <tr>
                                              
                       <td><?php echo $i;?></td>
                       <td><img src="images/<?php echo $data['gambar']; ?>" alt="" width="60" height="60" ></td>
                       <td><?php echo $data['username'];?></td>
                       <td><?php echo $data['nama_petugas'];?></td>
                      
                       <?php
                       $i++;
                     }
                     ?>
                      </tr>
                        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Aplikasi Uang Kas
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
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
  <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-datatables.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>