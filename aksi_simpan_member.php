<?php

$koneksi=new mysqli('localhost', 'root', '', 'db_sparepart');
if(isset($_POST['simpan'])) {
    $nama=$_POST['nama'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $telpon=$_POST['telpon'];
    $alamat=$_POST['alamat'];

    $pilih = mysqli_query($koneksi, "INSERT INTO `pembeli` (
  `nama`,
  `email`,
  `password`,
  `telpon`,
  `alamat`
) 
VALUES
  (
    '$nama',
    '$email',
    '$password',
    '$telpon',
    '$alamat'
  )");
    echo "<script>alert('Selamat Sekarang Anda Telah Menjadi Member');
		window.location='index.php';
		</script>";
}
