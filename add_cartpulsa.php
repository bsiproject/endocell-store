<?php

session_start();
if (!isset($_SESSION['pembeli']['id_pembeli'])) {
    echo"<script>alert ('Anda belum login, silahkan login dulu!')
           window.location='index.php';</script>";
} elseif(isset($_SESSION['pembeli']['id_pembeli'])) {
    include "function/koneksi.php";
    // session_start();
    $_SESSION['pembeli'];
    $id_barang = $_GET['id'];
    $id_pembeli=$_SESSION['pembeli']['id_pembeli'];
    $tanggal=date('Y-m-d');
    $beli= + 1;


    // echo 'Barang : ' . $id_barang . ' - ';
    // echo 'Pembeli : ' . $id_pembeli . ' - ';
    // echo 'Tanggal : ' . $tanggal . ' - ';
    // echo 'Beli : ' . $beli . ' - ';
    // echo 'Foto : ' . $foto . ' - ';


    $ambil=$koneksi->query("INSERT INTO `cart` (`id_pulsa`,`id_pembeli`,`tanggal`,`qty`) VALUES ('$id_barang','$id_pembeli','$tanggal','$beli') ");


    //periksa apakah produk sudah ada dalam keranjang
    if(!in_array($_GET['id'], $_SESSION['cart'])) {
        array_push($_SESSION['cart'], $_GET['id']);
        $_SESSION['message'] = 'Product Ditambahkan Kedalam Keranjang';
    } else {
        $_SESSION['message'] = 'Product Sudah Ada Di Dalam Keranjang';
    }

    //echo $_SESSION['cart'], $_GET['id'];
    header('location: index.php');
}
