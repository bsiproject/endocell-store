<div class="container">
  <h2>Data Kategori</h2>
							<a href="halaman.php?page=kategori/tambah" style="opacity: 1;"><img src="icon/tambahdata.png" alt=""></a></li>
  <div class="table-responsive">
  <?php
    $koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
  $qry=mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
  ?>
    <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
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
        <td><?php echo $data['kategori'] ?></td>
		<td><a href="halaman.php?page=kategori/edit&id=<?php echo $data['id_kategori'] ?>" class="btn btn-primary col-sm-5 fa fa-pencil fa-1x"></a>
			<a href="halaman.php?page=kategori/hapus&id=<?php echo $data['id_kategori'] ?>" class="btn btn-danger col-sm-5 fa fa-trash-o fa-1x"></a>
		</td>
      </tr>
	  <?php } ?>
    </tbody>
  </table>
  </div>
</div>