<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_error());
$id = $_POST['id_pulsa'];
$kd_pulsa = $_POST['kd_pulsa'];
$nama_operator = $_POST['nama_operator'];
$hargapulsa = $_POST['hargapulsa'];
$isi_pulsa = $_POST['isi_pulsa'];
$id_kategori = $_POST['id_kategori'];
$tanggal = $_POST['tanggal'];
if(isset($_POST['edit'])) {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $tipe_foto = $_FILES['foto']['type'];
    if($lokasi_foto=="") {
        $query=mysqli_query($koneksi, "UPDATE `tbl_pulsa`SET
			`kd_pulsa` = '$kd_pulsa',
			`nama_operator` = '$nama_operator',
			`hargapulsa` = '$hargapulsa',
			`isi_pulsa` = '$isi_pulsa',
			`id_kategori` = '$id_kategori',
			`tanggal` = '$tanggal'
			WHERE `id_pulsa` = '$id' 
			");
    } else {
        move_uploaded_file($lokasi_foto, "images1/$nama_foto");
        $query=mysqli_query($koneksi, "UPDATE `tbl_pulsa`SET
			`kd_pulsa` = '$kd_pulsa',
			`nama_operator` = '$nama_operator',
			`hargapulsa` = '$hargapulsa',
			`isi_pulsa` = '$isi_pulsa',
			`id_kategori` = '$id_kategori',
			`tanggal` = '$tanggal',
			`foto` = '$nama_foto' 
			WHERE `id_pulsa` = '$id' 
			");
    }

}
echo "<script>alert('tersimpan');
			window.location='/penjualan_konter/function/admin/halaman.php?page=product/data_pulsaregular';
			</script>";
