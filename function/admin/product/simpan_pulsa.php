<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$kd_pulsa = $_POST['kd_pulsa'];
$nama_operator = $_POST['nama_operator'];
$hargapulsa = $_POST['hargapulsa'];
$isi_pulsa = $_POST['isi_pulsa'];
$id_kategori = $_POST['id_kategori'];
$tanggal = $_POST['tanggal'];
if(isset($_POST['simpan'])) {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $tipe_foto = $_FILES['foto']['type'];
    if($lokasi_foto=="") {
        $query =mysqli_query($koneksi, "INSERT INTO tbl_pulsa kd_pulsa,nama_operator,hargapulsa,isi_pulsa,id_kategori,tanggal VALUES '$kd_pulsa','$nama_operator','$hargapulsa','$isi_pulsa','$id_kategori','$tanggal'");
    } else {
        move_uploaded_file($lokasi_foto, "images1/$nama_foto");
        $query =mysqli_query($koneksi, "INSERT INTO `tbl_pulsa` (
  `kd_pulsa`,
  `nama_operator`,
  `hargapulsa`,
  `isi_pulsa`,
  `id_kategori`,
  `tanggal`,
  `foto`
)  VALUES ('$kd_pulsa','$nama_operator','$hargapulsa','$isi_pulsa','$id_kategori','$tanggal','$nama_foto')");
    }
    echo"<script>alert('tersimpan');
			window.location='/penjualan_konter/function/admin/halaman.php?page=product/data_pulsaregular';
			</script>";
}
