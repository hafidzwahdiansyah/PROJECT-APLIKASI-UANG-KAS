<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM pemasukan WHERE id_pemasukan=$id");
if ($query) {
	echo '<script>alert("Data berhasil di hapus."); location.href="pemasukan.php";</script>';
}else{
		echo '<script>alert("Data gagal di hapus."); location.href="pemasukan.php";</script>';

}

?>