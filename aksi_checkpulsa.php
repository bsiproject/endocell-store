<?php
session_start();
include "function/koneksi.php";
$id_pembeli=$_SESSION['pembeli']['id_pembeli'];
$tanggal=date('Y-m-d');
$total = 0;
$cekkranjang = $koneksi->query("SELECT * FROM cart a LEFT JOIN tbl_pulsa b ON a.id_pulsa = b.id_pulsa WHERE id_pembeli='$id_pembeli'");
while($array = $cekkranjang->fetch_array())
{
    $total += $array['qty'] * $array['hargapulsa'];
   
    $sql=$koneksi->query("INSERT INTO `pembelian_barang` (`id_pembeli`,`id_pulsa`,`total`,`tanggal`) VALUES ('$id_pembeli','$array[id_pulsa]','$total','$tanggal')");
	//edit stok
	$ambik =$koneksi->query("UPDATE `tbl_pulsa` SET `isi_pulsa` = '$array[jumlah]'-1 WHERE `id_pulsa` = '$array[id_pulsa]'") ;
	// hapus data di tabel keranjang
	$sql1=$koneksi->query("DELETE FROM cart WHERE id_keranjang = '$array[id_keranjang]'");
    echo"<script>alert('Transaksi Berhasil');
    window.location='index.php?page=checkout';
    </script>";

}


?>