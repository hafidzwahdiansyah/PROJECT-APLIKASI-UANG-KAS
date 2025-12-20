<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['user'])) {
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cetak Pemasukan</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div class = "invoice-wrapper" id = "print-area">
            <div class = "invoice">
                <div class = "invoice-container">
                    <div class = "invoice-head">
                        <div class = "invoice-head-top">
                            <div class = "invoice-head-top-left text-start">
                                <img src = "logokaskelas.png" style="width:250px;">
                            </div>
                            <div class = "invoice-head-top-right text-end">
                                <h3 style="color:#6777ef; font-size: 25px;">XII RPL B</h3>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-middle">
                            <div class = "invoice-head-middle-left text-start">
                                <p><span class = "text-bold">Date</span>: <?php echo date('d-m-y'); ?></p>
                            </div>
                          
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-bottom">
                            <div class = "invoice-head-bottom-left">
                                <ul>
                                    <li class = 'text-bold'>Petugas :</li>
                                    <li><?php echo $_SESSION['user']['nama_petugas']; ?></li>
                                   
                                </ul>
                            </div>
                          
                        </div>
                    </div>
                    <div class = "overflow-view">
                        <div class = "invoice-body">
                            <table>
                                <thead>
                                    <tr>
                                            <th class="bold">No</th>
                                            <th class="bold">Petugas</th>
                                            <th class="bold">Tanggal Pengeluaran</th>
                                            <th class="bold">Keterangan</th>
                                            <th class="bold">Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                      $i =1;
                      $query = mysqli_query($koneksi,"SELECT*FROM pengeluaran left join petugas on petugas.id_petugas=pengeluaran.id_petugas");
                      while ($data = mysqli_fetch_array($query)) {
                       
                      ?>    
                      <tr>
                                              
                       <td><?php echo $i;?></td>
                       <td><?php echo $data['nama_petugas'];?></td>
                       <td><?php echo $data['tanggal_pengeluaran'];?></td>
                       <td><?php echo $data['keterangan'];?></td>
                        <td>Rp. <?php echo number_format( $data['jmlh_pengeluaran']);?></td>

                   
                       <?php
                       $i++;
                     }
                     ?>
                      </tr>
                                
                                </tbody>
                            </table>
                            <div class = "invoice-body-bottom">
                                    <div class = "invoice-body-info-item">
                                    <div class = "info-item-td text-end text-bold">Total:</div>
                                      <?php
                                  $query = mysqli_query($koneksi,"SELECT*FROM pengeluaran");
                                  $total = 0;
                                  while ($data = mysqli_fetch_array($query)) {
                                   $total += $data['jmlh_pengeluaran'];
                                  ?> 
                                  <?php 
                                }
                                ?>
                                    <div class = "info-item-td text-end">
                                         Rp. <?php echo number_format($total);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "invoice-foot text-center">
                        <p><span class = "text-bold text-center">NOTE:&nbsp;</span>This is computer generated receipt and does not require physical signature.</p>

                        <div class = "invoice-btns">
                            <button type = "button" class = "invoice-btn" onclick="printInvoice()">
                                <span>
                                    <i class="fa-solid fa-print"></i>
                                </span>
                                <span>Print</span>
                            </button>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src = "script.js"></script>
    </body>
</html>