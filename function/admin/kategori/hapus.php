<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$id = $_GET['id'];
mysqli_query($koneksi, " DELETE FROM tbl_kategori WHERE id_kategori='$id' ");

echo"<script>alert('terhapus');
			window.location='/penjualan_konter/function/admin/halaman.php?page=kategori/data_kategori';
			</script>";
