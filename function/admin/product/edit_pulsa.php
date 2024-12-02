<?php
$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$id = $_GET['id'];
$pilih = mysqli_query($koneksi, "SELECT * FROM tbl_pulsa WHERE id_pulsa=$id");
?>
<div class="container">
  <h2>Edit Data Product</h2>
  <form action="product/simpan_editpulsa.php" method="POST" enctype="multipart/form-data">
   <?php while ($data = mysqli_fetch_array($pilih)) { ?>
    <div class="form-group">
      <label for="kd_brg">Kode Pulsa</label>
	   <input type="hidden" name="id_pulsa" value="<?php echo $data['id_pulsa'] ?>">
      <input type="text" class="form-control" value="<?php echo $data['kd_pulsa'] ?>" name="kd_pulsa">
    </div>
    <div class="form-group">
      <label for="nama">Nama Operator</label>
      <input type="text" class="form-control" value="<?php echo $data['nama_operator'] ?>" name="nama_operator">
    </div>
    <div class="form-group">
      <label for="nama">Isi Pulsa</label>
      <input type="text" class="form-control" value="<?php echo $data['isi_pulsa'] ?>" name="isi_pulsa">
    </div>
	<div class="form-group">
      <label for="kd_brg">Harga</label>
      <input type="text" class="form-control" value="<?php echo $data['hargapulsa'] ?>" name="hargapulsa">
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
      <label for="">Tanggal</label>
      <input type="date" class="form-control" value="<?php echo $data['tanggal'] ?>" name="tanggal">
    </div>
	<div class="form-group">
      <label for="kd_brg">Foto</label>
      <input type="file" placeholder="Foto" name="foto">
    </div>
    <input type="submit" name="edit" value="Proses" class="btn btn-warning">
   <?php } ?>
</form>
</div>