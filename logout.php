<?php
session_start();
session_destroy();

?>

<script type="text/javascript">
	alert("Anda telah keluar dari halaman");
	location.href="login.php";
</script>