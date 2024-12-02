<?php

session_start();
include "function/koneksi.php";
$id_pembeli=$_SESSION['pembeli']['id_pembeli'];
$tanggal=date('Y-m-d');
$total = 0;
$cekkranjang = $koneksi->query("SELECT * FROM cart a LEFT JOIN tbl_product b ON a.id_barang = b.id_barang WHERE id_pembeli='$id_pembeli'");
while($array = $cekkranjang->fetch_array()) {
    $total += $array['qty'] * $array['harga'];

    $sql=$koneksi->query("INSERT INTO `pembelian_barang` (`id_pembeli`,`id_barang`,`total`,`tanggal`) VALUES ('$id_pembeli','$array[id_barang]','$total','$tanggal')");
    //edit stok
    $ambik =$koneksi->query("UPDATE `tbl_product` SET `jumlah` = '$array[jumlah]'-1 WHERE `id_barang` = '$array[id_barang]'") ;
    // hapus data di tabel keranjang
    // $sql1=$koneksi->query("DELETE FROM cart WHERE id_keranjang = '$array[id_keranjang]'");
    echo"<script>alert('Transaksi Berhasil');
    window.location='index.php?page=checkout';
    </script>";

}
