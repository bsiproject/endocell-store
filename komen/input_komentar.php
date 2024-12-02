<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-warning">
        <label class="control-label" for="inputWarning1">Nama</label>
        <input type="text" name="nama" class="form-control1" id="inputWarning1">
    </div>
    <div class="form-group has-warning">
        <label class="control-label" for="inputWarning1">Komentar</label>
        <textarea type="text" name="komentar" class="form-control1" id="inputWarning1"></textarea>
    </div>
    <div class="form-group has-warning">
        <label class="control-label" for="inputWarning1">Foto</label>
        <input type="file" name="foto" class="" id="inputWarning1">
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <button type="submit" name="simpan" class="btn-success btn">Simpan</button>
            <button type="reset" class="btn-warning btn">Cancel</button>
        </div>
    </div>
</form>
<?php
$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
if (isset($_POST['simpan'])) {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $tipe_foto = $_FILES['foto']['type'];

    if ($lokasi_foto == "") {
        $query = mysqli_query($koneksi, "INSERT INTO tbl_komentar set  nama = '$_POST[nama]',
                                                komentar = '$_POST[komentar]'");
    } else {
        move_uploaded_file($lokasi_foto, "images/$nama_foto");
        $query = mysqli_query($koneksi, "INSERT INTO tbl_komentar set  nama = '$_POST[nama]',
                                                komentar = '$_POST[komentar]',
                                                foto = '$nama_foto'");
    }
    echo
        "<script>
        window.location='./index.php';
        </script>";
}
?>