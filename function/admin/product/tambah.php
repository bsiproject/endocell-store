<div class="container">
  <h2>Input Data Product</h2>
  <form action="product/simpan_product.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="kd_barang">Kode Product</label>
      <input type="text" class="form-control" placeholder="kode Barang" name="kd_barang">
    </div>
    <div class="form-group">
      <label for="nama_barang">Nama Product</label>
      <input type="text" class="form-control"  placeholder="Nama Product" name="nama_barang">
    </div>
	<div class="form-group">
      <label for="harga">Harga</label>
      <input type="text" class="form-control" placeholder="Harga" name="harga">
    </div>
    <div class="form-group">
      <label for="garansi">Garansi</label>
      <input type="text" class="form-control" placeholder="Garansi" name="garansi">
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
      <label for="kategori">Jumlah</label>
      <input type="text" class="form-control" placeholder="Jumlah" name="jumlah">
    </div>
    <div class="form-group">
      <label for="kategori">Berat</label>
      <input type="text" class="form-control" placeholder="Berat" name="berat">
    </div>
  <div class="form-group">
      <label for="kategori">Tanggal</label>
      <input type="date" class="form-control" placeholder="tgl" name="tgl">
    </div>
  <div class="form-group">
      <label for="kategori">Keterangan</label>
      <textarea type="text" class="form-control" placeholder="Keterangan" name="ket"></textarea>
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