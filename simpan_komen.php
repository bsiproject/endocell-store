<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart');
session_start();
$id_pembeli = $_SESSION['pembeli']['id_pembeli'];
$tanggal = date('Y-m-d');
$komentar =$_POST['komentar'];

if(isset($_POST['simpan'])) {
    $query=$koneksi->query("INSERT INTO `tbl_komen` (`id_pembeli`,`komentar`,`tanggal`) VALUES ('$id_pembeli','$komentar','$tanggal') ");
    $_SESSION['pesan'] = 'Komentar berhasil di tambahkan';
    header('location:index.php');
    var_dump($query);
    die;
}
