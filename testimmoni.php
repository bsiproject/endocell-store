<!-- testimonials -->
<?php
    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div id="pesan" class="alert alert-success" style="display:none;">'.$_SESSION['pesan'].'</div>';
    }
    $_SESSION['pesan'] = '';
    ?>
	<div class="container">
		<h3>Isikan Komentar Anda</h3><br>
		<div class="form-group">
			<div class="table-sriped">
			<form action="simpan_komen.php" method="POST">
				<table>
					<tr>
						<td width="30%"><h5>Nama : <?php echo $_SESSION['pembeli']['nama']; ?></h5></td>
						<td width="30%"><h5>Email : <?php echo $_SESSION['pembeli']['email']; ?></h5></td>
					</tr>
					<tr>
						<td colspan="2"><textarea class="form-control" type="text" name="komentar" placeholder="Isikan Komentar Anda."></textarea>
					</tr>
					<tr>
						<td colspan="2"><button width="20%" type="submit" name="simpan" class="btn btn-warning">Kirim</button>
					</tr>
				</table>
			</form>
			</div>
		</div>
	
	<?php
	$ambil=$koneksi->query("SELECT * FROM tbl_komen a LEFT JOIN pembeli b ON a.id_pembeli=b.id_pembeli  ");
	while($data=$ambil->fetch_array()){
	?>
<div class="media">
  <div class="media-left">
    <a class="glyphicon glyphicon-user" style="font-size:50px;"></a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><h3><?php echo $data['nama'];?> </h3></h4>
    <p><?php echo $data['email'] ?></p>
	<blockquote>
    <p><?php echo $data['komentar'];?></p>
    <footer><?php echo $data['tanggal'] ?></footer>
  </blockquote>
  </div>
</div>
</div>
	<?php } ?>