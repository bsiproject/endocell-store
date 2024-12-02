<?php
include "function/koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, " DELETE FROM cart WHERE id_keranjang='$id' ");
echo"<script>alert('terhapus');
			window.location='index.php?page=view_cart';
			</script>";
?>