
<!-- Pencarian-->
	<div class="container">
		<h2>Hasil Pencarian: <?php echo $cari ?></h2>
		<br>
		<div class="row">
			<?php foreach ($data as $cari=> $value): ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="function/admin/product/images1/<?php echo $value['foto'] ?>" width="120px" height="150px">						<div class="caption">
							<h3><?php echo $value['nama_barang']; ?></h3>
							<h4>Rp.<?php echo number_format($value['harga']); ?></h4>
							<p class="pull-left"><b><?php echo $data['harga']; ?></b></p><br>
							<a href="add_cart.php?id=<?php echo $data['id_barang']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Beli</a>

							</div>
						
													
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	<!-- -->