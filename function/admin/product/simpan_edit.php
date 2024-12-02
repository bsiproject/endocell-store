<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_error());
$id = $_POST['id_barang'];
$kd_barang = $_POST['kd_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$garansi = $_POST['garansi'];
$id_kategori = $_POST['id_kategori'];
$jumlah = $_POST['jumlah'];
$berat = $_POST['berat'];
$tgl = $_POST['tgl'];
if(isset($_POST['edit'])) {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $tipe_foto = $_FILES['foto']['type'];
    if($lokasi_foto=="") {
        $query=mysqli_query($koneksi, "UPDATE `tbl_product`SET
			`kd_barang` = '$kd_barang',
			`nama_barang` = '$nama_barang',
			`harga` = '$harga',
			`garansi` = '$garansi',
			`id_kategori` = '$id_kategori',
			`jumlah` = '$jumlah',
			`berat` = '$berat',
			`tgl` = '$tgl'
			WHERE `id_barang` = '$id' 
			");
    } else {
        move_uploaded_file($lokasi_foto, "images1/$nama_foto");
        $query=mysqli_query($koneksi, "UPDATE `tbl_product`SET
			`kd_barang` = '$kd_barang',
			`nama_barang` = '$nama_barang',
			`harga` = '$harga',
			`garansi` = '$garansi',
			`id_kategori` = '$id_kategori',
			`jumlah` = '$jumlah',
			`berat` = '$berat',
			`tgl` = '$tgl',
			`foto` = '$nama_foto' 
			WHERE `id_barang` = '$id' 
			");
    }

}
echo "<script>alert('tersimpan');
			window.location='/penjualan_konter/function/admin/halaman.php?page=product/data_product';
			</script>";
