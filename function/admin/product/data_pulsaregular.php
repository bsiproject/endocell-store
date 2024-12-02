<?php
session_start();
if(!isset($_SESSION['admin']['id_admin'])) {
    echo"<script>alert('silahkan login terlebih dahulu');
		window.location='../index.php';
		</script>";
} elseif(isset($_SESSION['admin']['id_admin'])) {
    ?>
<div class="container">
  <h2>Data Product</h2>
							<a href="halaman.php?page=product/tambahpulsa" style="opacity: 1;"><img src="icon/tambahdata.png" alt=""></a></li>
  <div class="table-responsive">
  <?php
      $koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
    $qry=mysqli_query($koneksi, "SELECT * FROM tbl_pulsa  a LEFT JOIN tbl_kategori b ON a.id_kategori=b.id_kategori WHERE a.id_kategori='11'");
    ?>
    <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Pulsa</th>
        <th>Nama Operator</th>
        <th>Isi Pulsa</th>
    		<th>Harga</th>
    		<th>Kategori</th>
    		<th>Tanggal</th>
        <th>Foto</th>
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
        <td><?php echo $data['kd_pulsa'] ?></td>
        <td><?php echo $data['nama_operator'] ?></td>
		<td><?php echo $data['isi_pulsa'] ?></td>
    <td><?php echo $data['hargapulsa'] ?></td>
		<td><?php echo $data['kategori'] ?></td>
		<td><?php echo $data['tanggal'] ?></td>
    <td><?php echo $data['foto'] ?></td>
        <td><img width="50px" height="50px" src="product/images1/<?php echo $data['foto']; ?>"></td>
		<td><a href="halaman.php?page=product/edit_pulsa&id=<?php echo $data['id_pulsa'] ?>" class="btn btn-primary col-sm-5 fa fa-pencil fa-1x"></a>
			<a href="halaman.php?page=product/hapus_pulsa&id=<?php echo $data['id_pulsa'] ?>" class="btn btn-danger col-sm-5 fa fa-trash-o fa-1x"></a>
		</td>
      </tr>
	  <?php } ?>
    </tbody>
  </table>
  </div>
</div>
	<?php } ?>