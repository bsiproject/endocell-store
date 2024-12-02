<?php
session_start();
if (!isset($_SESSION['pembeli']['id_pembeli'])){
	echo"<script>alert ('Anda belum login, silahkan login dulu!')
           window.location='index.php';</script>";
}else 
	if(isset($_SESSION['pembeli']['id_pembeli'])){
?>
 <!-- <pre><?php echo print_r($_SESSION['pembeli']);?></pre> -->
<!--<pre><?php echo print_r($_POST['tampil']);?></pre> -->
	<br/>
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
			<h3>Keranjang Belanja <?php echo date('d-m-Y');?></h3>
			<form method="POST" action="aksi_checkpulsa.php"  enctype='multipart/form-data'>
			<table class="table">
				<tbody>
					<?php
						include "function/koneksi.php";
						$id_pembeli=$_SESSION['pembeli']['id_pembeli'];
						$tampil=$koneksi->query("SELECT * FROM cart a LEFT JOIN tbl_pulsa b ON a.id_pulsa = b.id_pulsa WHERE id_pembeli='$id_pembeli' ");
						$no=1;
						while($data=$tampil->fetch_array()) { ?>
						<div class="form-group">
						<tr>
							<td> </td>
							
							<td width="30%">
								<input class="form-control" type="hidden" name="idbrg" readonly="readonly" value="<?php echo $data['id_pulsa'];?>">
								<input class="form-control" type="hidden" name="" readonly="readonly" value="<?php echo $data['nama_barang'];?>">
							</td>
							<td width="20%"><input class="form-control" type="hidden" name="" readonly="readonly" value="Rp.<?php echo number_format($data['harga']);?>"></td>
							<td width="10%"><input class="form-control" type="hidden" name="" readonly="readonly" value="<?php echo $data['berat'];?>"></td>
							<td><input class="form-control" type="hidden" name="" readonly="readonly" value="<?php echo $data['qty'];?>"></td>
							<td width="20%"><input class="form-control" type="hidden" name="" readonly="readonly" value="Rp.<?php echo number_format($data['qty']*$data['harga']); ?>"></td>
							<?php $total +=$data['qty']*$data['harga'];?>
						</tr>
					<?php
					
						}
					?>
					<td><input class="form-control" type="hidden" name="total" readonly="readonly" value="Rp.<?php echo number_format($total) ?>"></td>
					<?php
						include "function/koneksi.php";
						$id_pembeli=$_SESSION['pembeli']['id_pembeli'];
						$tampil=$koneksi->query("SELECT * FROM cart a LEFT JOIN tbl_pulsa b ON a.id_pulsa = b.id_pulsa WHERE id_pembeli='$id_pembeli' ");
						$no=1;
						while($data=$tampil->fetch_array()) { ?>
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row product_image">
										<img src="function/admin/product/images1/<?php echo $data['foto'] ?>" width="240px" height="260">
									</div>
								<div class="row product_name">
									<h4><a href="#" value="" data-toggle="" data-target="#"><?php echo $data['nama_barang']; ?></a></h4>
							</div>
						<div class="row product_footer">
							<p class="pull-left"><b>Rp.<?php echo number_format($data['harga']); ?></b></p>
						</div>
						<a href="index.php?page=delete_item&id=<?php echo $data['id_keranjang'];?>" class="fa fa-trash-o">Hapus</a>
					</div>
				</div>
			</div>
						<?php } ?>
						<tr>
									<td colspan="4">TOTAL BELANJA</td>
									<td><input class="form-control" type="text" name="" readonly="readonly" value="Rp.<?php echo number_format($total) ?>"></td>
								</tr>
					<tr>
						<td>
							<input class="form-control" readonly="readonly" type="hidden" name="total" value="Rp.<?php echo $total ?>">	
							<input class="form-control" readonly="readonly" type="hidden" name="" value="Rp.<?php echo number_format($total) ?>">
						</td>
					</tr>
						</div>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
			<a href="aksi_checkpulsa.php?id=<?php echo $data['id_pembeli']; ?>" class="btn btn-success" type="submit" name="simpan" ><span class="glyphicon glyphicon-check">Checkout</span></a>
		</form>
		</div>
	</div>
</div>
</body>
</html>
					<?php } ?>