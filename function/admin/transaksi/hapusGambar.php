<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$id = $_GET['id'];
mysqli_query($koneksi, " DELETE FROM `file` WHERE `file` = '$id' ");

echo"<script>alert('terhapus');
			window.location='?page=transaksi/bukti_transaksi';
			</script>";
