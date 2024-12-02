<?php

$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$kd_barang = $_POST['kd_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$garansi = $_POST['garansi'];
$id_kategori = $_POST['id_kategori'];
$jumlah = $_POST['jumlah'];
$berat = $_POST['berat'];
$tgl = $_POST['tgl'];
$ket = $_POST['ket'];
if(isset($_POST['simpan'])) {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $tipe_foto = $_FILES['foto']['type'];
    if($lokasi_foto=="") {
        $query =mysqli_query($koneksi, "INSERT INTO tbl_product kd_barang,nama_barang,harga,id_kategori,kategori,jumlah,berat,tgl,ket VALUES '$kd_barang','$nama_barang','$harga','$garansi','$id_kategori','$jumlah','$berat','$tgl','$ket'");
    } else {
        move_uploaded_file($lokasi_foto, "images1/$nama_foto");
        $query =mysqli_query($koneksi, "INSERT INTO `tbl_product` (
  `kd_barang`,
  `nama_barang`,
  `harga`,
  `garansi`,
  `id_kategori`,
  `jumlah`,
  `berat`,
  `tgl`,
  `ket`,
  `foto`
)  VALUES ('$kd_barang','$nama_barang','$harga','$garansi','$id_kategori','$jumlah','$berat','$tgl','$ket','$nama_foto')");
    }
    echo"<script>alert('tersimpan');
			window.location='/penjualan_konter/function/admin/halaman.php?page=product/data_product';
			</script>";
}
