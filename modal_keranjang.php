<!-- Modal -->
<div id="modal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Keranjang Belanja</h4>
      </div>
      <div class="modal-body">
        <?php
session_start();
if (!isset($_SESSION['pembeli']['id_pembeli'])){
	echo"<script>alert ('Anda belum login, silahkan login dulu!')
           window.location='index.php';</script>";
}else 
	if(isset($_SESSION['pembeli']['id_pembeli'])){
?>
<div class="container">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
		
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<!-- left nav here -->
	      </ul>     
	    </div>
	  </div>
	</nav>
	<div class="row">
		<div class="col-sm-12 ">
			<h3>Cart</h3>
			<form method="POST" action="aksi_check.php"  enctype='multipart/form-data'>
			<table class="table table-bordered table-striped">
				<thead>
					<th>action</th>
					<th>No</th>
					<th>nama</th>
					<th>harga</th>
					<th>berat (kg)</th>
					<th>jumlah</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php
						include "function/koneksi.php";
						$id_pembeli=$_SESSION['pembeli']['id_pembeli'];
						$tampil=$koneksi->query("SELECT * FROM cart a LEFT JOIN tbl_product b ON a.id_barang = b.id_barang WHERE id_pembeli='$id_pembeli' ");
						$no=1;
						while($data=$tampil->fetch_array()) { ?>
						<div class="form-group">
						<tr>
							<td><a href="index.php?page=delete_item&id=<?php echo $data['id_keranjang'];?>" class="fa fa-trash-o">Hapus</a> </td>
							<td><?php echo $no++; ?></td>
							<td width="30%">
								<input class="form-control" type="hidden" name="idbrg" readonly="readonly" value="<?php echo $data['id_barang'];?>">
								<input class="form-control" type="text" name="" readonly="readonly" value="<?php echo $data['nama_barang'];?>">
							</td>
							<td width="20%"><input class="form-control" type="text" name="" readonly="readonly" value="Rp.<?php echo number_format($data['harga']);?>"></td>
							<td width="10%"><input class="form-control" type="text" name="" readonly="readonly" value="<?php echo $data['berat'];?>"></td>
							<td><input class="form-control" type="text" name="" readonly="readonly" value="<?php echo $data['qty'];?>"></td>
							<td width="20%"><input class="form-control" type="text" name="" readonly="readonly" value="Rp.<?php echo number_format($data['qty']*$data['harga']); ?>"></td>
							<?php $total +=$data['qty']*$data['harga'];?>
						</tr>
					<?php
					
						}
					?>
					<tr>
						<th colspan="6">Total</th>
						<td>
							<input class="form-control" readonly="readonly" type="hidden" name="total" value="Rp.<?php echo $total ?>">	
							<input class="form-control" readonly="readonly" type="text" name="" value="Rp.<?php echo number_format($total) ?>">
						</td>
					</tr>
						</div>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
			<a href="aksi_check.php?id=<?php echo $data['id_pembeli']; ?>" class="btn btn-success" type="submit" name="simpan" ><span class="glyphicon glyphicon-check">Checkout</span></a>
		</form>
		</div>
	</div>
</div>
<?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>