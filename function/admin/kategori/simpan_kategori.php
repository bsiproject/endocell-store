<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$kategori = $_POST['kategori'];

$query =mysqli_query($koneksi, "INSERT INTO `tbl_kategori` ( `kategori`) 
			VALUES
			  ( '$kategori') ;
			");
echo"<script>alert('tersimpan');
			window.location='/penjualan_konter/function/admin/halaman.php?page=kategori/data_kategori';
			</script>";
