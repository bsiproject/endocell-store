<div class="container">
  <h2>Data Karyawan</h2>
							<a href="halaman.php?page=karyawan/tambah" style="opacity: 1;"><img src="icon/tambahdata.png" alt=""></a></li>
  <div class="table-responsive">
  <?php
    $koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
  $qry=mysqli_query($koneksi, "SELECT * FROM tbl_karyawan");
  ?>
    <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Karyawan</th>
        <th>Email</th>
		<th>alamat</th>
        <th>Username</th>
        <th>Foto</th> 
		<th>Aksi</th>
      </tr>
    </thead>
	<?php
    $no=1;
  while($data= mysqli_fetch_array($qry)) {
      ?>
    <tbody>     
      <tr class="info">
        <td><?php echo $no++ ?> </td>
        <td><?php echo $data['nama_kar'] ?></td>
        <td><?php echo $data['email'] ?></td>
		<td><?php echo $data['alamat'] ?></td>
        <td><?php echo $data['username'] ?></td>
        <td><img width="50px" height="50px" src="karyawan/images4/<?php echo $data['foto']; ?>"></td>
		<td><a href="halaman.php?page=karyawan/edit&id=<?php echo $data['id_kar'] ?>" class="btn btn-primary col-sm-5 fa fa-pencil fa-1x"></a>
			<a href="halaman.php?page=karyawan/hapus&id=<?php echo $data['id_kar'] ?>" class="btn btn-danger col-sm-5 fa fa-trash-o fa-1x"></a>
		</td>
      </tr>
	  <?php } ?>
    </tbody>
  </table>
  </div>
</div>