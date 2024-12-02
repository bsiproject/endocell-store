<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$nama_kar = $_POST['nama_kar'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['simpan'])) {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $tipe_foto = $_FILES['foto']['type'];
    if($lokasi_foto=="") {
        $query =mysqli_query($koneksi, "INSERT INTO tbl_karyawan nama_kar,email,alamat,username,password  VALUES '$nama_kar','$email','$alamat','$username','$password'");
    } else {
        move_uploaded_file($lokasi_foto, "images4/$nama_foto");
        $query =mysqli_query($koneksi, "INSERT INTO `tbl_karyawan` (
  `nama_kar`,
  `email`,
  `alamat`,
  `username`,
  `password`,
  `foto`
)  VALUES 
('$nama_kar','$email','$alamat','$username','$password','$nama_foto')");
    }
    echo"<script>alert('tersimpan');
			window.location='/penjualan_konter/function/admin/halaman.php?page=karyawan/data_kar';
			</script>";
}
