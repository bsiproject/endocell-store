<?php
$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$id = $_GET['id'];
$pilih = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id_kar=$id");
?>
<div class="container">
  <h2>Edit Data Karyawan</h2>
  <form action="karyawan/simpan_edit.php" method="POST" enctype="multipart/form-data">
   <?php while ($data = mysqli_fetch_array($pilih)) { ?>
    <div class="form-group">
      <label for="">Nama Karyawan</label>
	   <input type="hidden" name="id_kar" value="<?php echo $data['id_kar'] ?>">
      <input type="text" class="form-control" value="<?php echo $data['nama_kar'] ?>" name="nama_kar">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" class="form-control" value="<?php echo $data['email'] ?>" name="email">
    </div>
	<div class="form-group">
      <label for="">Alamat</label>
      <input type="text" class="form-control" value="<?php echo $data['alamat'] ?>" name="alamat">
    </div>
    <div class="form-group">
      <label for="">Username</label>
      <input type="text" class="form-control" value="<?php echo $data['username'] ?>" name="username">
    </div>
	<div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" value="<?php echo $data['password'] ?>" name="password">
    </div>
	<div class="form-group">
      <label for="">Foto</label>
      <input type="file" placeholder="Foto" name="foto">
    </div>
    <input type="submit" name="edit" value="Edit" class="btn btn-warning">
   <?php } ?>
</form>
</div>