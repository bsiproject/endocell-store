<?php

if(isset($_POST['bayar'])) {
    $_SESSION['pembeli']['id_pembeli'];
    $id_ongkir= $_POST['id_ongkir'];
    $tgl=date('Y-m-d');
    $ambil=$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir' ");
    $ongkir=$ambil->fetch_assoc();
    $tarif=$ongkir['tarif'];
    $total_pembelian=$total + $tarif;

}
