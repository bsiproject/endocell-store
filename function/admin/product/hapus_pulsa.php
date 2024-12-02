<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$id = $_GET['id'];
mysqli_query($koneksi, " DELETE FROM tbl_pulsa WHERE id_pulsa='$id' ");

echo"<script>alert('terhapus');
			window.location='/penjualan_konter/function/admin/halaman.php?page=product/data_pulsaregular';
			</script>";
