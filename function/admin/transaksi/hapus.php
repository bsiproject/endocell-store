<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$id = $_GET['id'];
mysqli_query($koneksi, " DELETE FROM pembayaran WHERE id_pembayaran='$id' ");

echo"<script>alert('terhapus');
			window.location='/penjualan_konter/function/admin/halaman.php?page=transaksi/bukti_transaksi';
			</script>";
