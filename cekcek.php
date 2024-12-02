<?php

include "function/koneksi.php";
session_start();
$id_pembeli = $_SESSION['pembeli']['id_pembeli'];
$tanggal = date('Y-m-d');
$belanja = $_POST['belanja'];
$ongkos = $_POST['ongkos'];
$kodepos=$_POST['kodepos'];
$kurir=$_POST['kurir'];
$subtotal = $belanja + $ongkos;


if(isset($_POST['simpan'])) {
    //simpan alamat pengiriman
    $sq2 = $koneksi->query("INSERT INTO `tbl_alamat` (`id_pembeli`, `tanggal_peng`,  `kode_pos`, `total_belanja`, `ongkos`, `kurir`, `total_kes`) VALUES ('$id_pembeli','$tanggal','$kodepos','$belanja','$ongkos','$kurir','$subtotal')");

    if($sq2) {
        //pengambilan data dari tabel pembelian
        $cekkranjang = $koneksi->query("SELECT * FROM pembelian_barang a LEFT JOIN tbl_product b ON a.id_barang = b.id_barang WHERE id_pembeli='$id_pembeli'");

        if($cekkranjang) {
            while($array = $cekkranjang->fetch_array()) {
                // echo $array['id_barang'];
                //simpan data transaksi
                $sql=$koneksi->query("INSERT INTO `tbl_transaksi` (`id_barang`,`id_pembeli`,`tanggal_b`) VALUES ('$array[id_barang]','$id_pembeli','$tanggal')");

                if($sql) {
                    //hapus dari tabel pembelian
                    $sql2=$koneksi->query("DELETE FROM pembelian_barang WHERE id_cart = '$array[id_cart]'");
                    echo"<script>alert('Checkout Berhasil Silahkan Cek Status Barang.');
                        window.location='index.php?page=status/status';
                     </script>";
                } else {
                    echo "Error : " . mysqli_error($koneksi);
                }
            }
        } else {
            echo "Error : " . mysqli_error($koneksi);
        }
    } else {
        echo "Error : " . mysqli_error($koneksi);
    }

}
