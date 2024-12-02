<div class="container">
  <h2>Input Data Pulsa</h2>
  <form action="product/simpan_pulsa.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="kd_barang">Kode Pulsa</label>
      <input type="text" class="form-control" placeholder="kode Pulsa" name="kd_pulsa">
    </div>
    <div class="form-group">
      <label for="nama_barang">Nama Operator</label>
      <input type="text" class="form-control"  placeholder="Nama Operator" name="nama_operator">
    </div>
    <div class="form-group">
      <label for="nama_barang">Isi Pulsa</label>
      <input type="text" class="form-control"  placeholder="Isi Pulsa" name="isi_pulsa">
    </div>
	<div class="form-group">
      <label for="harga">Harga Pulsa</label>
      <input type="text" class="form-control" placeholder="Harga" name="hargapulsa">
    </div>
    <div class="form-group ">
        <label class="control-label">Nama Kategori</label>
        <select name="id_kategori" class="form-control1">
            <?php include("Koneksi.php");
            $query = mysqli_query($koneksi, " SELECT * FROM tbl_kategori");
            while ($data = mysqli_fetch_assoc($query)) {
                echo "<option value=\"$data[id_kategori]\">$data[kategori]</option>";
            }
            ?>
        </select>
    </div>
  <div class="form-group">
      <label for="kategori">Tanggal</label>
      <input type="date" class="form-control" placeholder="tgl" name="tanggal">
    </div>
	<div class="form-group">
      <label for="foto">Foto</label>
      <input type="file" placeholder="Foto" name="foto">
    </div>
    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
</form>
</div>

<?php 
if(isset($_GET['nama'])){
	if($_GET['nama'] == "kosong"){
		echo "<h4 style='color:red'>Nama Belum Di Masukkan !</h4>";
	}
}
?>