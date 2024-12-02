<?php
$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$nama = $_POST['nama'];
$bank = $_POST['bank'];
$jumlah = $_POST['jumlah'];
$tanggal = date('Y-m-d');
if(isset($_POST['kirim'])) {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    if($lokasi_foto=="") {
        $query =mysqli_query($koneksi, "INSERT INTO `pembayaran` (`nama`,`bank`,`jumlah`,`tanggal`) VALUES ('$nama','$bank','$jumlah','$tanggal')");
    } else {
        move_uploaded_file($lokasi_foto, "img/$nama_foto");
        $query1 =mysqli_query($koneksi, "INSERT INTO `pembayaran` (`nama`,`bank`,`jumlah`,tanggal`,`foto`) VALUES
('$nama','$bank','$jumlah','$tanggal','$nama_foto')");
    }
    //var_dump($_FILES['foto']); die;
    echo"<script>alert('Terimaksi Data Akan Kami Proses');
			window.location='index.php?page=status/status';
			</script>";
}

?> 