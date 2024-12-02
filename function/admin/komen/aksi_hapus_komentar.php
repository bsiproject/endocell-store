<?php
include("Koneksi.php");
$id = $_GET['id'];
mysqli_query($koneksi, " DELETE FROM tbl_komen WHERE id_komen='$id' ");
echo
    "<script>alert('Data Terhapus');
        window.location='/penjualan_konter/function/admin/halaman.php?page=product/data_komentar';
    </script>";
