<?php
$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$id = $_GET['id'];
$pilih = mysqli_query($koneksi, "SELECT * FROM tbl_product WHERE id_barang=$id");
?>
<div class="container">
  <h2>Edit Data Product</h2>
  <form action="product/simpan_edit.php" method="POST" enctype="multipart/form-data">
   <?php while ($data = mysqli_fetch_array($pilih)) { ?>
    <div class="form-group">
      <label for="kd_brg">Kode Product</label>
	   <input type="hidden" name="id_barang" value="<?php echo $data['id_barang'] ?>">
      <input type="text" class="form-control" value="<?php echo $data['kd_barang'] ?>" name="kd_barang">
    </div>
    <div class="form-group">
      <label for="nama">Nama Product</label>
      <input type="text" class="form-control" value="<?php echo $data['nama_barang'] ?>" name="nama_barang">
    </div>
	<div class="form-group">
      <label for="kd_brg">Harga</label>
      <input type="text" class="form-control" value="<?php echo $data['harga'] ?>" name="harga">
    </div>
    <div class="form-group">
      <label for="nama">Garansi</label>
      <input type="text" class="form-control" value="<?php echo $data['garansi'] ?>" name="garansi">
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
      <label for="">Jumlah</label>
      <input type="text" class="form-control" value="<?php echo $data['jumlah'] ?>" name="jumlah">
    </div>
	<div class="form-group">
      <label for="">Berat</label>
      <input type="text" class="form-control" value="<?php echo $data['berat'] ?>" name="berat">
    </div>
  <div class="form-group">
      <label for="">Tanggal</label>
      <input type="date" class="form-control" value="<?php echo $data['tgl'] ?>" name="tgl">
    </div>
    <div class="form-group">
      <label for="">Keterangan</label>
      <textarea type="text" class="form-control" value="<?php echo $data['ket'] ?>" name="ket"></textarea>
    </div>
	<div class="form-group">
      <label for="kd_brg">Foto</label>
      <input type="file" placeholder="Foto" name="foto">
    </div>
    <input type="submit" name="edit" value="Proses" class="btn btn-warning">
   <?php } ?>
</form>
</div>