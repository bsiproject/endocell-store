<div class="container">
  <h2>Data Komentar</h2>
  <div class="table-responsive">
  <?php
  $koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
  $qry=mysqli_query($koneksi, "SELECT * FROM tbl_komen a LEFT JOIN pembeli b ON a.id_pembeli=b.id_pembeli");
  ?>
    <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
		<th>Email</th>
        <th>Komentar</th>
        <th>Tanggal</th> 
		<th>Aksi</th>
      </tr>
    </thead>
    <tbody>   
    <?php
    $no=1;
  while($data= mysqli_fetch_array($qry)) {
      ?>  
      <tr class="info">
        <td><?php echo $no++ ?> </td>
        <td><?php echo $data['nama'] ?></td>
		<td><?php echo $data['email'] ?></td>
        <td><?php echo $data['komentar'] ?></td>
		<td><?php echo $data['tanggal'] ?></td>
		<td>
			<a href="halaman.php?page=komen/aksi_hapus_komentar&id=<?php echo $data['id_komen'] ?>" class="btn btn-danger col-sm-5 fa fa-trash-o fa-1x"></a>
		</td>
      </tr>
	  <?php } ?>
    </tbody>
  </table>
  </div>
</div>