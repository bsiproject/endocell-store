<div class="container">
  <h2>Input Data Karyawan</h2>
  <form action="karyawan/simpan_kar.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="kd_brg">Nama Karyawan</label>
      <input type="text" class="form-control" placeholder="Nama Karyawan" name="nama_kar">
    </div>
    <div class="form-group">
      <label for="nama">Email</label>
      <input type="email" class="form-control"  placeholder="Email" name="email">
    </div>
	<div class="form-group">
      <label for="kd_brg">Alamat</label>
      <textarea type="text" class="form-control" placeholder="Alamat" name="alamat"></textarea>
    </div>
    <div class="form-group">
      <label for="nama">Username</label>
      <input type="text" class="form-control" placeholder="Username" name="username">
    </div>
	<div class="form-group">
      <label for="nama">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
	<div class="form-group">
      <label for="kd_brg">Foto</label>
      <input type="file" placeholder="Foto" name="foto">
    </div>
    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
</form>
</div>