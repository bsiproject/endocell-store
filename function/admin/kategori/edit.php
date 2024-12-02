<?php
$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$id = $_GET['id'];
$pilih = mysqli_query($koneksi, "SELECT * FROM tbl_kategori WHERE id_kategori=$id");
?>
<div class="container">
  <h2>Edit Data Product</h2>
  <form action="kategori/simpan_edit.php" method="POST" enctype="multipart/form-data">
   <?php while ($data = mysqli_fetch_array($pilih)) { ?>
	<div class="form-group">
      <label for="nama">Kategori</label>
      <input type="text" class="form-control" value="<?php echo $data['kategori'] ?>" name="kategori">
    </div>
    <input type="submit" name="edit" value="Edit" class="btn btn-warning">
   <?php } ?>
</form>
</div>