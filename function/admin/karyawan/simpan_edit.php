<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_error());
$id = $_POST['id_kar'];
$nama_kar = $_POST['nama_kar'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];
if(isset($_POST['edit'])) {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $tipe_foto = $_FILES['foto']['type'];
    if($lokasi_foto=="") {
        $query=mysqli_query($koneksi, "UPDATE `tbl_karyawan`SET
			`nama_kar` = '$nama_kar',
			`email` = '$email',
			`alamat` = '$alamat',
			`username` = '$username',
			`password` = '$password',
			WHERE `id_kar` = '$id' 
			");
    } else {
        move_uploaded_file($lokasi_foto, "images4/$nama_foto");
        $query=mysqli_query($koneksi, "UPDATE `tbl_karyawan`SET
			`nama_kar` = '$nama_kar',
			`email` = '$email',
			`alamat` = '$alamat',
			`username` = '$username',
			`password` = '$password',
			`foto` = '$nama_foto' 
			WHERE `id_kar` = '$id' 
			");
    }

}
echo "<script>alert('tersimpan');
			window.location='/penjualan_konter/function/admin/halaman.php?page=karyawan/data_kar';
			</script>";
