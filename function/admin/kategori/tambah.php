<div class="container">
  <h2>Input Data Product</h2>
  <form action="kategori/simpan_kategori.php" method="POST" enctype="multipart/form-data">
	 <div class="form-group">
      <label for="kategori">Ktegori</label>
      <input type="text" class="form-control" placeholder="Kategori" name="kategori">
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