
<?php
session_start();
if (!isset($_SESSION['pembeli']['id_pembeli'])) {
    echo"<script>alert ('Anda belum login, silahkan login dulu!')
           window.location='index.php';</script>";
} elseif(isset($_SESSION['pembeli']['id_pembeli'])) {
    ?>
<div class="container">
  <h2>Status Pemesanan</h2>
           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pemesan</th>
		<th>Telpon</th>
		<th>Tanggal Pesan</th>
		<th>alamat Tujuan</th>
		<th>Kode Pos</th>
        <th>Kurir</th>
        <th>Belanja</th>
		<th>Ongkir</th>
		<th>Total</th>
		<th>Status</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
	<?php
        $no=1;
    $id_pembeli=$_SESSION['pembeli']['id_pembeli'];

    $koneksi=new mysqli('localhost', 'root', '', 'db_sparepart');
    $ambil=$koneksi->query("SELECT * FROM tbl_alamat a LEFT JOIN pembeli b ON a.id_pembeli=b.id_pembeli WHERE a.id_pembeli='$id_pembeli' ");
    while($data=$ambil->fetch_assoc()) {
        ?>
      <tr>
		<td><?php echo $no++ ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['telpon']; ?></td>
		<td><?php echo $data['tanggal_peng']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
		<td><?php echo $data['kode_pos']; ?></td>
		<td><?php echo $data['kurir']; ?></td>
        <td>Rp. <?php echo number_format($data['total_belanja']); ?></td>
		<td>Rp. <?php echo number_format($data['ongkos']); ?></td>
		<td>Rp. <?php echo number_format($data['total_kes']); ?></td>
		<td><?php echo $data['status']; ?></td>

		<td>
		<?php if($data['status']=="Sedang Diproses"):?>
		<a href="index.php?page=pembayaran&id=<?php echo $data['id_alamat'];?>" class="btn btn-success">Pembayaran</a>
		<?php endif ?>
		<?php if($data['status']=="Sedang Dikirim"):?>
		<a href="nota.php?id=<?php echo $data['id_alamat'];?>" class="btn btn-primary">Nota</a>
		<?php endif ?>
		</td>

      </tr>
	<?php }  ?>
    </tbody>
  </table>
</div>
	<?php } ?>