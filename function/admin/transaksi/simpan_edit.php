<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_error());
//$id_alamat = $_GET['id_alamat'];
$status = $_POST['status'];
$id_alamat=$_POST['id_alamat'];
if(isset($_POST['edit'])) {
    //echo $data['status'];
    $query=mysqli_query($koneksi, "UPDATE `tbl_alamat` SET `status` = '$status' WHERE `id_alamat` = '$id_alamat' ;");

    echo "<script>alert('tersimpan');
			window.location='/penjualan_konter/function/admin/halaman.php?page=transaksi/data_transaksi';
			</script>";
}
