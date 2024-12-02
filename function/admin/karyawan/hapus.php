<?php
$koneksi=mysqli_connect('localhost','root','','gemafajar_penjualan') or die (mysqli_connect_error());
$id = $_GET['id'];
mysqli_query($koneksi, " DELETE FROM tbl_product WHERE id_barang='$id' ");

		echo"<script>alert('terhapus');
			window.location='/penjualan_konter/function/admin/halaman.php?page=product/data_product';
			</script>";
?>